<?php

namespace runtime;

use configs\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class DBConnection
{
    public function __construct()
    {
    }

    public static function connect(): Connection
    {
        $configs = Configuration::dbConfig();
//        return new \PDO(
//            "mysql:host={$configs['host']};dbname={$configs['dbname']}",
//            $configs['user'],
//            $configs['password']
//        );

        $conn = null;

        try {
            $conn = DriverManager::getConnection($configs);
        } catch (Exception $e) {
            echo "<p class='text-danger'>{$e->getMessage()}</p>";
        }

        return $conn;
    }
}