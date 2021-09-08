<?php

namespace App\Http\Controllers;

use A17\Twill\Repositories\SettingRepository;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function createForm(Request $request, $locale)
    {
        if (in_array($locale, config('translatable.locales'))) {
            app()->setLocale($locale);
        }

        return view('site.feedback', [
            'success' => null,
        ]);
    }

    public function sendForm(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'terms_agree' => 'required',
        ], [
            'required' => __('validation.Required'),
            'email' => __('validation.Must be a valid email'),
        ]
        );

        $feedback = new Feedback($request->all());
        $success = $feedback->send();

        if ($request->ajax()) {
            return response()->json(
                ['success' => $success,]
            );
        }

        return view('site.feedback', [
            'success' => $success,
        ]);
    }
}
