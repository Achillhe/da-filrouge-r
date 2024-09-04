<?php

namespace tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\TestCase;
use App\Models\User;

class RegisterFalsePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testInscriptionPasswordFaux()
    {
        //Test add user in db with
        $nombreAvant = User::count();
        $response = $this->post('/api/register', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password',
            //must fail
        ]);
        // save after nb lines
        $nombreApres = User::count();

        //if before and after are not equal it means that we insert a false password in db
        $this->assertEquals($nombreAvant, $nombreApres);
    }
}
