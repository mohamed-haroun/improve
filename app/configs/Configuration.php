<?php

namespace configs;

class Configuration
{
    private static array $db_config;
    public function __construct(public array $configs)
    {
        self::$db_config = [
            'host' => $this->configs['DB_HOST'],
            'dbname' => $this->configs['DB_SCHEMA'],
            'user' => $this->configs['DB_USER'],
            'password' => $this->configs['DB_PASSWORD'],
            'driver' => "pdo_mysql"
        ];
    }

    public static function dbConfig():array
    {
        return self::$db_config;
    }

}