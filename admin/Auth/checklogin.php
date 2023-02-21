<?php
session_start();
function checklogin(){
    if($_SESSION["Admin"] == ""){
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Please Login.
      </div>';
      header("location: ../index.php");

    }
}


?>