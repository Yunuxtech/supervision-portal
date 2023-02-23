<?php
error_reporting(0);
include("../Auth/checklogin.php");
include("../../DB/db_connection.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/supervisor1.jpg" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("./includes/nav.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include("./includes/sidebar.php"); ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <?php
                if (isset($_SESSION["msg"])) {
                  echo $_SESSION["msg"];
                }
                unset($_SESSION["msg"]);
                ?>
                <h4 class="card-title">Profile</h4>
                <?php
                $id = $_SESSION["Admin"] ;
                $sql = "SELECT * FROM `admin_tbl` WHERE id = '$id'";  
                $result = mysqli_query($con, $sql);
                $data = mysqli_fetch_assoc($result);



                ?>
                <!-- profile update form -->
                <form class="forms-sample mb-4" action="./Form_Handler/updates.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $id; ?>" name="id">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $data["username"];  ?>" placeholder="Full Name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data["email"];  ?>" placeholder="Email" required >
                  </div>
                  <!-- <div class="form-group">
                    <label>Registration No.</label>
                    <input type="text" name="reg" class="form-control" placeholder="Registration No." value="<?php echo $data["reg.no"];  ?>" required readonly>
                  </div> -->
                  <button type="submit" class="btn btn-primary me-2" name="update">Update Profile</button>
                </form>
                <!-- changing password form -->
                <form class="forms-sample mb-4" action="./Form_Handler/updates.php" method="post">
                  <span style="color:brown;" class="mb-4">Note: To change Password</span>
                  <input type="hidden" value="<?php echo $id; ?>" name="id">
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
                  </div>
                  <button type="submit" class="btn btn-primary me-2" name="change">Change Password</button>

                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("./includes/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>