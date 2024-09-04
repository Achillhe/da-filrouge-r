<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;
use Illuminate\Http\Request;
use App\Interfaces\IMailService;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CreateUserController extends Controller
{
    private $userInterface;
    private $mailService;
    private $userService;

    public function __construct(IUserService $userInterface, IMailService $mailService, IUserService $userService)
    {
        $this->userInterface = $userInterface;
        $this->mailService = $mailService;
        $this->userService = $userService;
    }

    public function __invoke(Request $request)
    {
        try {

            $validateUser = Validator::make($request->all(),
            [
                "dateOfBirth" => 'required',
                "firstName" => 'required',
                "lastName" => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ]);

            $data = $validateUser->validated();

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => "validation error",
                    'errors'=> $validateUser->errors()
                ], 401);
            }

            $token = Str::uuid();
            $data['confirmation_token'] = $token;
            $users = $this->userInterface->createUser($data);
            $email = $data['email'];
            $confirmationUrl = route('confirm-registration', ['token' => $token]);
    
                $mailData =[
                    'title' => 'Mail de confirmation d\'inscription',
                    'body' => 'Votre compte personnel est désormais accessible grâce à votre identifiant.  Cliquez sur le lien suivant pour confirmer votre inscription : ' . $confirmationUrl,
                ];
    
                $to = $email;
    
                $this->mailService->welcomeMail($mailData, $to);

            return response()->json([
                'data' => $users,
                'status' => true,
                'message' => "Utilisateur cree avec succes",
            ], 200);

        } catch (\Exception $ex) {

            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function confirmUser(Request $request, $token)
    {
        try {
            $user = $this->userService->getUserByConfirmationToken($token);
    
            if ($user) {
                $user = $this->userService->confirmUserRegistration($user);
                return redirect('http://localhost:3000/')->with('success', "L'inscription a été confirmée avec succès.");  
                return response()->json([
                    'data' => $user,
                    'status' => true,
                    'message' => "L'inscription a été confirmée avec succès.",
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Aucun utilisateur trouvé avec le token de confirmation fourni.",
                ], 404);
            }
    
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
