<?php
namespace tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use tests\TestCase;
use App\Mail\WelcomeMail;
use App\Models\User;

class EmailTest extends TestCase
{
    use RefreshDatabase;

    public function testEnvoiEmailBienvenueApresCreationUtilisateur()
    {
        Mail::fake();
        
        $requestData = [
            'dateOfBirth' => '01/01/1990',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'MotDePasse123',
        ];

        $response = $this->json('POST', '/api/register', $requestData);

        Mail::assertSent(WelcomeMail::class, function ($mail) {
            return $mail->hasTo('john.doe@example.com');
        });

        // Vérifiez la réponse de l'API
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            'message' => 'Utilisateur cree avec succes',
        ]);
    }
}
