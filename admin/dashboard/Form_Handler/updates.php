<?php
session_start();
include("../../../DB/db_connection.php");
include("../../Auth/input_validate.php");

if(isset($_POST["update"])){
    $id = mysqli_real_escape_string($con, validate($_POST["id"])) ;
    $username = mysqli_real_escape_string($con, validate($_POST["username"])) ;
    $email = mysqli_real_escape_string($con,validate($_POST["email"]) );
    
    $sql = "UPDATE `admin_tbl` SET `username`='$username',`email`='$email' WHERE id = '$id'";
    $res = mysqli_query($con,$sql);
    if($res){
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Profile update successful...
      </div>';
      header("location: ../profile.php");

    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops something went wrong...
      </div>';
      header("location: ../profile.php");
    }
}

if(isset($_POST["change"])){
    $id = mysqli_real_escape_string($con, validate($_POST["id"])) ;
    $password = mysqli_real_escape_string($con, validate($_POST["password"])) ;
    $newPassword = mysqli_real_escape_string($con,validate($_POST["newPassword"]) );
    
    $sql = "SELECT * FROM `admin_tbl` WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
    if($data["password"] == $password){
        $sql = "UPDATE `admin_tbl` SET `password`='$newPassword' WHERE id = '$id'";
        $res = mysqli_query($con,$sql);
        if($res){
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
                Password update successful...
            </div>';
            header("location: ../profile.php");

        }else{
            $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
            Ooops something went wrong...
            </div>';
            header("location: ../profile.php");

        }
    }else{
        $_SESSION["msg"] = '<div class="alert alert-info alert-dismissible">
        Old password doesnt match...
      </div>';
      header("location: ../profile.php");

    }

    
}
