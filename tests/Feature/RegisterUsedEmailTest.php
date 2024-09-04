<?php

namespace tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use tests\TestCase;
use App\Models\User;

class RegisterUsedEmailTest extends TestCase
{
    use RefreshDatabase;

    public function testInscriptionEchoueAvecEmailExistante()
    {
        // Assurez-vous que la base de données est vide avant le test
        $this->assertCount(0, User::all());

        // Créez un utilisateur fictif dans la base de données avec l'email existant
        User::create([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'utilisateur@example.com',
            'password' => 'Motdepasse123',
            'dateOfBirth' => '10/12/2002'
        ]);

        // Tentez de vous inscrire avec le même email
        $response = $this->post('/api/register', [
            'firstName' => 'Nouveau',
            'lastName' => 'Utilisateur',
            'email' => 'utilisateur@example.com',
            'password' => 'nouveauMotDePasse123',
            'dateOfBirth' => '01/01/1999'
        ]);

        // Assurez-vous que l'inscription échoue et qu'aucun nouvel utilisateur n'est créé
        $this->assertEquals(1, User::count()); // Vérifiez le nombre total d'utilisateurs dans la base de données
    }
}
