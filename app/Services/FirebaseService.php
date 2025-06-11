<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseService
{
    protected Auth $auth;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/google-services.json'));

        $this->auth = $factory->createAuth();
    }

    public function signIn(string $email, string $password)
    {
        return $this->auth->signInWithEmailAndPassword($email, $password);
    }
}

