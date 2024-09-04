<?php

namespace tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\TestCase;
use App\Models\User;

class RegisterFalseEmailTest extends TestCase
{
    use RefreshDatabase;

    public function testInscriptionEmailFaux()
    {
        //add user in db with false email adress
        $nombreAvant = User::count();
        $response = $this->post('/api/register', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.example.com',
            'password' => 'Password123',
            'dateOfBirth' => '01/01/1999'
            //must fail
        ]);
        
        $nombreApres = User::count();

        //if before and after are not equal it means that we insert a false email in db
        $this->assertEquals($nombreAvant, $nombreApres);
    }
}
