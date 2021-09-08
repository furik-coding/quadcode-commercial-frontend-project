<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vacancy_id' => 'nullable|integer',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'nullable|string',
            'cv' => 'nullable|file|max:16000',
            'terms_agree' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => __("validation.Required"),
            'email' => __("validation.Must be a valid email"),
            'numeric' => __("validation.Must be a number"),
        ];
    }
}
