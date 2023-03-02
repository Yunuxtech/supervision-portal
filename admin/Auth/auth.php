<?php
include("../../DB/db_connection.php");
include("./input_validate.php");

session_start();
// SIGNIN

if (isset($_POST["LOGIN"])) {
    $email = mysqli_real_escape_string($con, validate($_POST["email"]));
    $password = md5(mysqli_real_escape_string($con, validate($_POST["password"]))) ;

    $sql = "SELECT * FROM `admin_tbl` WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
        $userData = mysqli_fetch_assoc($res);
        $_SESSION["Admin"] = $userData["id"];
        header("location: ../dashboard/index.php");

    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Invalid Email Or Password.
      </div>';
      header("location: ../index.php");
    }



    
    
}
