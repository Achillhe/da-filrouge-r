<?php

namespace App\Interfaces;

interface IMailService
{
    public function welcomeMail(array $mailData, string $to);
}

?>