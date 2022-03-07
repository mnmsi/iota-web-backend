<?php

class Database {
    // database property
    private $host = 'localhost';
    private $db_name = 'formData';
    private $username = "root";
    private $db_password =  "";
    private $conn;
    // connect database

    public function connect(){
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host='.$this->host . ';dbname=' .$this->db_name, $this->username,$this->db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection Error : " . $e->getMessage();
        }
        return $this->conn;

    }
}