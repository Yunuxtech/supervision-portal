<?php
session_start();
include("../../../DB/db_connection.php");
include("../../Auth_Handler_Admin/input_validate.php");

$uploads_dir = 'upload';
if (isset($_POST["upload"])) {
  $id = $_POST["id"];
  $studentId = $_POST["studentId"];
  $comment = mysqli_real_escape_string($con, validate($_POST["comment"]));

  // file name with a random number so that similar dont get replaced
  $filename = rand(1000, 10000) . "-" . $_FILES["doc-file"]["name"];

  // temporary file name to store file
  $file_tmp = $_FILES["doc-file"]["tmp_name"];

  // TO move the uploaded file to specific location
  move_uploaded_file($file_tmp, $uploads_dir . '/' . $filename);
  $sql = "INSERT INTO `review_logs_tbl`(`student_id`, `supervisor`, `comment`, `document`,`status`) VALUES ('$studentId','$id','$comment','$filename','0')";
  $result = mysqli_query($con, $sql);
  if ($result) {

    $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible">
        Upload Succesful...
      </div>';
    header("location: ../upload.php?uploadId=$studentId");
  } else {
    $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops, something went wrong...
      </div>';
    header("location: ../upload.php?uploadId=$studentId");
  }
}


?>