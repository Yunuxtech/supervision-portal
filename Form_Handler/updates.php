<?php
session_start();
include("../DB/db_connection.php");
include("../Auth_Handler/input_validate.php");

if(isset($_POST["update"])){
    $id = mysqli_real_escape_string($con, validate($_POST["id"])) ;
    $username = mysqli_real_escape_string($con, validate($_POST["username"])) ;
    $email = mysqli_real_escape_string($con,validate($_POST["email"]) );
    $reg = mysqli_real_escape_string($con,validate($_POST["reg"]) ) ;
    
    $sql = "UPDATE `student_tbl` SET `username`='$username',`email`='$email',`reg.no`='$reg' WHERE id = '$id'";
    $res = mysqli_query($con,$sql);
    if($res){
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Profile update successful...
      </div>';
      header("location: ../dashboard/profile.php");

    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops something went wrong...
      </div>';
      header("location: ../dashboard/profile.php");
    }
}

if(isset($_POST["change"])){
    $id = mysqli_real_escape_string($con, validate($_POST["id"])) ;
    $password = md5(mysqli_real_escape_string($con, validate($_POST["password"])))  ;
    $newPassword = md5(mysqli_real_escape_string($con,validate($_POST["newPassword"]) )) ;
    
    $sql = "SELECT * FROM `student_tbl` WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
    if($data["password"] == $password){
        $sql = "UPDATE `student_tbl` SET `password`='$newPassword' WHERE id = '$id'";
        $res = mysqli_query($con,$sql);
        if($res){
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
                Password update successful...
            </div>';
            header("location: ../dashboard/profile.php");

        }else{
            $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
            Ooops something went wrong...
            </div>';
            header("location: ../dashboard/profile.php");

        }
    }else{
        $_SESSION["msg"] = '<div class="alert alert-info alert-dismissible">
        Old password doesnt match...
      </div>';
      header("location: ../dashboard/profile.php");

    }

    
}
