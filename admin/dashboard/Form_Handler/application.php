<?php
session_start();
include("../../../DB/db_connection.php");
include("../../Auth/input_validate.php");

if(isset($_POST["approve"])){
    $student = mysqli_real_escape_string($con, validate($_POST["student"]));
    $supervisor = mysqli_real_escape_string($con, validate($_POST["supervisor"]));
    
    $sql = "INSERT INTO `assigned_student_tbl`(`student_id`, `supervisor_id`) VALUES ('$student','$supervisor')";
    $result = mysqli_query($con,$sql);
    if($result){
        $ql = "UPDATE `supervisor_application_tbl` SET status = '1' WHERE userId = '$student'";
        $res = mysqli_query($con,$ql);
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Student Assigned successful.
      </div>';
      header("location: ../application.php");

    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops something went wrong.
      </div>';
      header("location: ../application.php");
    }
}




?>