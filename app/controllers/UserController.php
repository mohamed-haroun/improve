<?php

namespace controllers;

use attributesRoute\Get;
use attributesRoute\Post;
use runtime\DBConnection;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    #[Get('/profile')]
    public function index():void
    {
        if(!isset($_SESSION['user'])) {
            header("Location: /login");
        }
        parent::render('profile', [
            'pageName' => "Profile",
            'email' => $_SESSION['user']['email'],
            'password' => $_SESSION['user']['user_password']
        ]);
    }

    #[Post('/login')]
    public function login():void
    {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $connection = DBConnection::connect();

        $query = "SELECT * FROM users WHERE email = :email AND user_password = :password";
        $stmt = $connection->prepare($query);

        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);

        $result = $stmt->executeQuery();

        $user = $result->fetchAssociative();


        if (!empty($user)) {
            $_SESSION['user'] = $user;
            header('Location: /profile');
        } else {
            echo "<p>Wrong credentials</p>";
        }
    }

    #[Get('/settings')]
    public function setting():void
    {
        if(!isset($_SESSION['user'])) {
            header("Location: /login");
        }

        parent::render("settings", [
            'pageName' => "settings"
        ]);
    }
}