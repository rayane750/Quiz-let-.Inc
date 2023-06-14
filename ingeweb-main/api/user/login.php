<?php

session_start();
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare doctor object
$doctor = new User($db);
// $doctor_arr = array();
// set ID property of doctor to be edited
$doctor->email = isset($_POST['email']) ? $_POST['email'] : die();
$doctor->password = isset($_POST['password']) ? base64_encode($_POST['password']) : die();

// read the details of doctor to be edited
$stmt = $doctor->read_email();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $doctor_adm=array(
        "idUser" => $row['idUser'],
        "username" => $row['username'],
        "email" => $row['email'],
        "password" => $row['password'],
        "admin" => $row['admin'],
        "dateRegister" => $row['dateRegister'],
        "image" => $row['image']
    );

    if($doctor_adm["password"]== $doctor->password){
        $_SESSION["email"] = $doctor_adm["email"];
        $_SESSION["username"] = $doctor_adm["username"];
        $_SESSION["idUser"] = $doctor_adm["idUser"];
        $_SESSION["image"] = $doctor_adm["image"];
        $_SESSION["dateRegister"] = $doctor_adm["dateRegister"];

        $doctor_arr=array(
            "status" => true,
            "message" => "Successfully Login!"
        );
    }else{
        $doctor_arr=array(
            "status" => false,
            "message" => "Wrong email or password!"
        );
        unset($_POST["email"]);
        unset($_POST["password"]);
        die();
    }

    print_r(json_encode($doctor_arr));
}




?>