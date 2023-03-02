<?php
include("../DB/db_connection.php");
include("./input_validate.php");

session_start();

// SIGNUP

if (isset($_POST["SIGNUP"])) {

    $username = mysqli_real_escape_string($con, validate($_POST["username"]));
    $email = mysqli_real_escape_string($con, validate($_POST["email"]));
    $reg = mysqli_real_escape_string($con, ($_POST["reg"]));
    $password = md5(mysqli_real_escape_string($con, validate($_POST["password"]))) ;
    $sql = "INSERT INTO `student_tbl`( `username`, `email`, `reg.no`, `password`) VALUES ('$username','$email','$reg','$password')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Registration Succesful.
      </div>';
        header("location: ../register.php");
    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops Something went wrong.
      </div>';
      header("location: ../register.php");

    }
} 

// SIGNIN

if (isset($_POST["LOGIN"])) {
    $email = mysqli_real_escape_string($con, validate($_POST["email"]));
    $password = md5(mysqli_real_escape_string($con, validate($_POST["password"]))) ;

    $sql = "SELECT * FROM `student_tbl` WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
        $userData = mysqli_fetch_assoc($res);
        $_SESSION["login"] = $userData["id"];
        header("location: ../dashboard/index.php");

    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Invalid Email Or Password.
      </div>';
      header("location: ../index.php");
    }



    
    
}
