<?php
declare(strict_types=1);
session_start();
use controllers\{HomeController, ProductsController, InvoicesController,RegistrationController,UserController};

// The autoloader of the working classes
include __DIR__ . "/vendor/autoload.php";


// The environment variables loader
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$configs = new \configs\Configuration($_ENV);

$router = new \runtime\Router();

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        ProductsController::class,
        InvoicesController::class,
        RegistrationController::class,
        UserController::class
    ]
);

$router->resolve(strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);