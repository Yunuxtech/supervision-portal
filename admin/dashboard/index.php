<?php

error_reporting(0);
include("../Auth/checklogin.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Dashboard</title>
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

    <!-- partial:partials/_navbar.html -->
    <?php include("./includes/nav.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include("./includes/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    <h2>Welcome back,</h2>
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                  $id = $_SESSION["AdminLogin"];
                  $sql  = "SELECT * FROM `student_tbl`";
                  $query = mysqli_query($con, $sql);
                  $num = mysqli_num_rows($query);
                  ?>
                  <p class="card-title">Student(s)</p>
                  <i class="mdi mdi-account" style="font-size: 70px; margin: auto; color:cornflowerblue"></i>
                  <h3># <?php echo $num;  ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                  $sql1 = "SELECT * FROM `lecturer_tbl`";
                  $query1 = mysqli_query($con, $sql1);
                  $num1 = mysqli_num_rows($query1);
                  ?>
                  <p class="card-title">Lecturer(s)</p>
                  <i class="mdi mdi-account-check" style="font-size: 70px; margin: auto; color:cornflowerblue"></i>
                  <h3># <?php echo $num1;  ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                  $sql2 = "SELECT * FROM `assigned_student_tbl`";
                  $query2 = mysqli_query($con, $sql2);
                  $num2 = mysqli_num_rows($query2);
                  ?>
                  <p class="card-title">Assigned Student(s)</p>
                  <i class="mdi mdi-file-check" style="font-size: 70px; margin: auto; color:cornflowerblue;"></i>
                  <h3># <?php echo $num2;  ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                  $sql3 = "SELECT * FROM `supervisor_application_tbl` WHERE status = '0'";
                  $query3 = mysqli_query($con, $sql3);
                  $num3 = mysqli_num_rows($query3);
                  ?>
                  <p class="card-title">Pending Request(s)</p>
                  <i class="mdi mdi-file" style="font-size: 70px; margin: auto; color:cornflowerblue;"></i>
                  <h3># <?php echo $num3;  ?></h3>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>