<?php

namespace Lab\config;

class Login extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = Database::getInstance()->getConnection();
    }

    public function masuk($username)
    {

        $query = $this->db->query("SELECT * FROM user WHERE username='$username'") or die($this->db->error);

        return $query;

    }

    public function masuk2($username, $password)
    {

        $query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password='$password'") or die($this->db->error);

        return $query;

    }

}
