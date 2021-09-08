<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Application extends Model
{

    protected $fillable = [
        'vacancyId',
        'firstName',
        'lastName',
        'email',
        'phone',
        'message',
        'file',
    ];

    public $vacancyId;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $message;
    /* @var UploadedFile $file */
    public $file;


    public function send($validated)
    {
        /** @var App\Api\Huntflow $huntflow */
        $huntflow = resolve('App\Api\Huntflow');

        $this->vacancyId = $validated['vacancy_id'];
        $this->firstName = $validated['first_name'];
        $this->lastName = $validated['last_name'];
        $this->email = $validated['email'];
        $this->phone = $validated['phone'];
        $this->message = $validated['message'];
        $this->file = $validated['cv'] ?? null;

        return $huntflow->createApplicant($this);
    }
}
