<?php
class Post {
    // database properties
    private $conn;
    private $table = 'users';

    // table properties
    public $id;
    public $name;
    public $email;

    // Constructor with DB

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Post

    public function read(){
        // create query
        $query = "SELECT * FROM " . $this->table  ." ORDER BY id DESC";
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        
        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO " . $this->table . "(name,email) VALUES (:name,:email)";
        // prepare statement

        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(':id',null);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":email",$this->email);
        if($stmt->execute()){
            return true;
        }
        printf("Error:%s./n",$stmt->error);
        return false;
    }
    
}