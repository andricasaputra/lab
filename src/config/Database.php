<?php

namespace Lab\config;

class Database
{
    private static $connection;
    private static $instance;
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "lab_db";

    private function __construct()
    {
      
        self::$connection = new \mysqli($this->host, $this->username, $this->password, $this->database);

        if (! self::$connection) {

            throw new Exception("Error Processing Request", 1);
        }

    }

    public static function getInstance()
    {
        if (!self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {

        return self::$connection;

    }

    public static function destroy()
    {

        return self::$connection->close();

    }

}
