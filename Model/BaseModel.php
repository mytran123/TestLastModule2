<?php

class BaseModel
{
    protected $table;
    protected $dbConnect;

    public function __construct()
    {
        $db = new DB();
        $this->dbConnect = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT*FROM $this->table";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetchAll();
    }
}