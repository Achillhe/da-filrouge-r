<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Interfaces\IMailService;

class MailService implements IMailService
{
    public function welcomeMail(array $mailData, string $to)
    {
        Mail::to($to)->send(new WelcomeMail($mailData));
    }
}

?>