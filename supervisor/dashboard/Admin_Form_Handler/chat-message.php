<?php
include("../../../DB/db_connection.php");
include("../../Auth_Handler_Admin/input_validate.php");

if(isset($_POST["send-message"])){
    $studentId = $_POST["studentId"];
    $supervisorId = $_POST["supervisorId"];
    $message = mysqli_real_escape_string($con, validate($_POST["message"]));

    $sql = "INSERT INTO `chat_tbl`(`sender_id`, `receiver_id`, `message`) VALUES ('$supervisorId','$studentId','$message')";
    $result = mysqli_query($con, $sql);
    if($result){
        header("location: ../chat.php?chatId=$studentId");
    } else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops, something went wrong, try again.
      </div>';
      header("location: ../chat.php?chatId=$studentId");

    }
}




?>