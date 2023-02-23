<?php
include("../DB/db_connection.php");
include("../../Auth_Handler/auth.php");
$userId = $_SESSION["login"];

$sql = "SELECT * FROM `student_tbl` WHERE id = '$userId'";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($res);

?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="index.php" style="font-weight:bold; font-family:Brush Script MT, cursive">Supervision Portal</a>
      <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-4 w-100">
      <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown me-1">
        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-message-text mx-0"></i>
          <?php
          $sl = "SELECT * FROM `chat_tbl` WHERE receiver_id = '$userId' AND status = '0'";
          $re = mysqli_query($con, $sl);
          $num =  mysqli_num_rows($re);
          if ($num >= 1) {
          ?>
            <span class="count"></span>
          <?php
          } else {
          ?>
            <span class=""></span>
          <?php
          }


          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
          <?php
          if ($num >= 1) {
            while ($rec = mysqli_fetch_assoc($re)) {
          ?>
              <a class="dropdown-item" href="./chat.php?view=true">

                <div class="">
                  <p class="font-weight-light small-text text-muted mb-0">
                    <?php echo $rec["message"]; ?> <br>
                    <span style="font-size:13px"><?php echo $rec["created_at"]; ?></span>
                  </p>
                </div>
              </a>

            <?php
            }
          } else {

            ?>
            <a class="dropdown-item">
              <div class="">
                <p class="font-weight-light small-text text-muted mb-0">
                  No Unread Messages...
                </p>
              </div>
            </a>
          <?php
          }


          ?>


        </div>
      </li>
      <li class="nav-item dropdown me-4">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-bell mx-0"></i>
          <?php
          $sl1 = "SELECT * FROM `review_logs_tbl` WHERE student_id = '$userId' AND status = '0'";
          $re1 = mysqli_query($con, $sl1);
          $num1 =  mysqli_num_rows($re1);
          if ($num1 >= 1) {
          ?>
            <span class="count"></span>
          <?php
          } else {
          ?>
            <span class=""></span>
          <?php
          }
          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <?php
          if ($num1 >= 1) {
            while ($rec1 = mysqli_fetch_assoc($re1)) {
          ?>
              <a class="dropdown-item" href="./logs.php?view=true">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-file-document-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal"><?php echo $rec1["comment"];  ?></h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                  <?php echo $rec1["created_at"];  ?>
                  </p>
                </div>
              </a>


            <?php
            }
          } else {
            ?>
            <a class="dropdown-item">
              <div class="">
                <h6 class="font-weight-normal">No Notifications</h6>
              </div>
            </a>
          <?php

          }
          ?>

        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="images/faces/face5.jpg" alt="profile" />
          <span class="nav-profile-name"><?php echo $data["username"]; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="./profile.php">
            <i class="mdi mdi-account text-primary"></i>
            Profile
          </a>
          <a class="dropdown-item" href="../Auth_Handler/logout.php">
            <i class="mdi mdi-logout text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>