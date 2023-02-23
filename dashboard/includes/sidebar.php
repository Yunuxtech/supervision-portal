<?php
include("../DB/db_connection.php");
include("../../Auth_Handler/auth.php");
$userId = $_SESSION["login"];

$sql = "SELECT * FROM `supervisor_application_tbl` WHERE userId = '$userId'";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($res);

?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./supervisor-application.php">
        <i class="mdi mdi-application menu-icon"></i>
        <span class="menu-title">Supervisor Application</span>
      </a>
    </li>
    <?php
    if ($data["status"] == 1) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="./upload.php">
          <i class="mdi mdi-auto-upload menu-icon"></i>
          <span class="menu-title">Uploads</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./logs.php">
          <i class="mdi mdi-history menu-icon"></i>
          <span class="menu-title">Review Logs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./chat.php">
          <i class="mdi mdi-message-text menu-icon"></i>
          <span class="menu-title">Chatbox </span>
        </a>
      </li>

    <?php
    }

    ?>

    <li class="nav-item">
      <a class="nav-link" href="../Auth_Handler/logout.php">
        <i class="mdi mdi-logout menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>

  </ul>
</nav>