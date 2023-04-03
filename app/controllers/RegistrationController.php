<?php

namespace controllers;

use attributesRoute\Get;

class RegistrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    #[Get('/login')]
    public function login():void
    {
        if (isset($_SESSION['user'])) {
            header('Location: /profile');
        }
        parent::render('login', ['pageName'=>'Login']);
    }

    #[Get('/register')]
    public function register():void
    {
        if (isset($_SESSION['user'])) {
            header('Location: /profile');
        }
        parent::render('register', ['pageName'=>"Register"]);
    }

    #[Get('/logout')]
    public function logout():void
    {
        session_destroy();
        header('Location: /');
    }

}