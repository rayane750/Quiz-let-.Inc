<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $idCategory;
    public $difficulty ;
    public $titleCat;
    public $descCat;
    public $photoCat;
    public $dateRegister;
    public $duration;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

}