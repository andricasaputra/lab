<?php

namespace Lab\config;

class Database
{
    private static $connection;
    private static $instance;
    private $host     = "localhost";
    private $username = "";
    private $password = "";
    private $database = "";

    public static function getInstance()
    {
        if (!self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        self::$connection = new \mysqli($this->host, $this->username, $this->password, $this->database);

        if (self::$connection->connect_error) {

            trigger_error("Failed to connect to MySQL: " . self::$connection->connect_error, E_USER_ERROR);

        }

    }

    public function getConnection()
    {

        return self::$connection;

    }

    public static function destroy()
    {

        self::$connection->close();
    }

}
