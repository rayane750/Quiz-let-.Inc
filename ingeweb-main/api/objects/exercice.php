<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table1_name = "users";
    private $table2
 
    // object properties
    public $idUser;
    public $username;
    public $email;
    public $password;
    public $admin;
    public $dateRegister;
    public $image;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // // read all doctors
    // function read(){
    
    //     // select all query
    //     $query = "SELECT
    //                 `id`, `name`, `email`, `password`, `phone`, `gender`, `specialist`, `created`
    //             FROM
    //                 " . $this->table_name . " 
    //             ORDER BY
    //                 id DESC";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // get single doctor data
    // function read_single(){
    
    //     // select all query
    //     $query = "SELECT
    //                 `id`, `name`, `email`, `password`, `phone`, `gender`, `specialist`, `created`
    //             FROM
    //                 " . $this->table_name . " 
    //             WHERE
    //                 id= '".$this->id."'";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
    
    //     // execute query
    //     $stmt->execute();
    //     return $stmt;
    // }

    // read email
    function read_email(){
        // select all query
        $query = "SELECT
                    `idUser`, `username`, `email`, `password`, `admin`, `dateRegister`, `image`
                FROM
                    " . $this->table_name . " 
                WHERE
                    email= '".$this->email."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create doctor
    // function create(){
    
    //     if($this->isAlreadyExist()){
    //         return false;
    //     }
        
    //     // query to insert record
    //     $query = "INSERT INTO  ". $this->table_name ." 
    //                     (`name`, `email`, `password`, `phone`, `gender`, `specialist`, `created`)
    //               VALUES
    //                     ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->phone."', '".$this->gender."', '".$this->specialist."', '".$this->created."')";
    
    //     // prepare query
    //     $stmt = $this->conn->prepare($query);
    
    //     // execute query
    //     if($stmt->execute()){
    //         $this->id = $this->conn->lastInsertId();
    //         return true;
    //     }

    //     return false;
    // }

    // create doctor
    function authenticate(){
    
        // query to insert record
        $query = "SELECT
        `idUser`, `username`, `email`, `password`, `admin`, `dateRegister`, `image`
    FROM
        " . $this->table_name . " 
    WHERE
        email= '".$this->email."' AND password='".$this->password."'";
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // update doctor 
    // function update(){
    
    //     // query to insert record
    //     $query = "UPDATE
    //                 " . $this->table_name . "
    //             SET
    //                 name='".$this->name."', email='".$this->email."', password='".$this->password."', phone='".$this->phone."', gender='".$this->gender."', specialist='".$this->specialist."'
    //             WHERE
    //                 id='".$this->id."'";
    
    //     // prepare query
    //     $stmt = $this->conn->prepare($query);
    //     // execute query
    //     if($stmt->execute()){
    //         return true;
    //     }
    //     return false;
    // }

    // // delete doctor
    // function delete(){
        
    //     // query to insert record
    //     $query = "DELETE FROM
    //                 " . $this->table_name . "
    //             WHERE
    //                 id= '".$this->id."'";
        
    //     // prepare query
    //     $stmt = $this->conn->prepare($query);
        
    //     // execute query
    //     if($stmt->execute()){
    //         return true;
    //     }
    //     return false;
    // }

    // function isAlreadyExist(){
    //     $query = "SELECT *
    //         FROM
    //             " . $this->table_name . " 
    //         WHERE
    //             email='".$this->email."'";

    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);

    //     // execute query
    //     $stmt->execute();

    //     if($stmt->rowCount() > 0){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
}