<?php
session_start();

// download for students logs
if(!empty($_GET["tag"])){
    $filename = basename($_GET["tag"]);
    $filepath = "upload/".$filename;
    if(!empty($filename) && file_exists($filepath)){
        // file headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");
        readfile($filepath);
        exit();
    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops File dont exist.
      </div>';
      header("location: ../dashboard/upload.php");


    }

}

// download for reviews logs

if(!empty($_GET["download"])){
    $filename = basename($_GET["download"]);
    $filepath = "../supervisor/dashboard/Admin_Form_Handler/upload/".$filename;
    if(!empty($filename) && file_exists($filepath)){
        // file headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");
        readfile($filepath);
        exit();
    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible">
        Ooops File dont exist.
      </div>';
      header("location: ../dashboard/logs.php");


    }

}


?>