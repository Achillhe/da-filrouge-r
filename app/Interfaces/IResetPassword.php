<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface IResetPassword
{
    public function mailResetPassword(Request $request);
    public function resetPassword(Request $request);
}
?>