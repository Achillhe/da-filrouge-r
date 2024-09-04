<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IResetPassword;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $resetPasswordInterface;

    public function __construct(IResetPassword $resetPasswordInterface)
    {
        $this->resetPasswordInterface = $resetPasswordInterface;
    }

    public function mailResetPassword(Request $request)
    {
        $response = $this->resetPasswordInterface->mailResetPassword($request);

        return response()->json($response);
    }

    public function resetPassWord(Request $request)
    {
        $response = $this->resetPasswordInterface->resetPassword($request);

        return response()->json($response);
    }

    public function showResetForm(Request $request, $token)
    {
        $email = $request->input('email');

        return redirect("http://localhost:3000/change-mot-de-passe/$token?email=$email");
    }
}
