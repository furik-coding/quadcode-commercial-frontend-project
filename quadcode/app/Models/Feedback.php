<?php

namespace App\Models;

use A17\Twill\Repositories\SettingRepository;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'message',
    ];

    public function send()
    {
        $result = $this->save();

        if ($result) {
            $mails = app(SettingRepository::class)->byKey('emails');
            if (!$mails) {
                $mails = 'archy@greasle.com';
            }

            $mailFields = $this->attributes;
            $mailFields['msg'] = $mailFields['message']; // message shadowed by Mail object

            \Mail::send('mail.feedback', $mailFields, function($message) use ($mails) {
                $message
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to($mails)
                    ->subject('Message from ' . env('APP_NAME') . ' site');
            });
        }

        return $result;
    }
}
