<?php

class Database
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli("localhost", "root", "", "blog");

        if ($this->conn->connect_error) {
            die("Database connection failed");
        }

        return $this->conn;
    }
}
