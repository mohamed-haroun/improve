<?php

require_once __DIR__ . '/vendor/autoload.php';


use Doctrine\DBAL\DriverManager;

$connectionParams = [
    'dbname' => 'hr',
    'user' => 'root',
    'password' => 'root',
    'host' => 'db',
    'driver' => 'pdo_mysql',
];
try {
    $conn = DriverManager::getConnection($connectionParams);

    $stmt = $conn->prepare("SELECT * FROM employees");

    $result = $stmt->executeQuery();

    var_dump($result->fetchAllAssociative());

}catch (\Doctrine\DBAL\Exception $e) {
    echo $e->getMessage();
}