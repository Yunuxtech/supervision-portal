<?php
session_start();
include("../DB/db_connection.php");
include("../Auth_Handler/input_validate.php");

if(isset($_POST["apply"])){
    $option1 = mysqli_real_escape_string($con, validate($_POST["option1"])) ;
    $option2 = mysqli_real_escape_string($con,validate($_POST["option2"]) );
    $reg = mysqli_real_escape_string($con,validate($_POST["reg"]) ) ;
    $topic = mysqli_real_escape_string($con,validate($_POST["topic"]) ) ;
    $summary = mysqli_real_escape_string($con, validate($_POST["summary"])) ;

    $sql = "INSERT INTO `supervisor_application_tbl`( `regNo`, `option1`, `option2`, `topic`, `summary`,`status`) VALUES ('$reg','$option1','$option2','$topic','$summary','0')";
    $res = mysqli_query($con, $sql);
    if($res){

      //   $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
      //   Application Succesful...
      // </div>';
      header("location: ../dashboard/supervisor-application.php");
    }else{
      $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops something went wrong.
      </div>';
      header("location: ../dashboard/supervisor-application.php");
    }



}
