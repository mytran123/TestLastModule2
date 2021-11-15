<?php

class DB
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=Market;charset=utf8";
        $this->username = "root";
        $this->password = "";
    }

    public function connect()
    {
        try {
            $conn = new PDO($this->dsn,$this->username,$this->password);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}