<?php
include("../../../DB/db_connection.php");
include("../../Auth/input_validate.php");
session_start();

if(isset($_POST["save"])){
    $name = mysqli_real_escape_string($con, validate($_POST["name"]));
    $email = mysqli_real_escape_string($con, validate($_POST["email"]));
    $password = md5(mysqli_real_escape_string($con, validate($_POST["password"]))) ;

    $sql = "INSERT INTO `lecturer_tbl`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
    $result = mysqli_query($con, $sql);
    if($result){
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Supervisor Added Successful...
      </div>';
        header("location: ../lecturer.php");
    } else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops, something went wrong, try again.
      </div>';
      header("location: ../lecturer.php");

    }
}




?>