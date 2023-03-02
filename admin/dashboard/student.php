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
  <title>Admin | Student</title>
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
                <h4 class="card-title">Assigned Student(s)</h4>

                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          Registration No.
                        </th>
                        <th>
                          Topic
                        </th>
                        <th>
                          Supervisor
                        </th>
                        <th>
                          Date Assigned
                        </th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT supervisor_application_tbl.regNo, supervisor_application_tbl.topic,lecturer_tbl.name,assigned_student_tbl.created_at FROM ((supervisor_application_tbl INNER JOIN assigned_student_tbl ON supervisor_application_tbl.userId = assigned_student_tbl.student_id) INNER JOIN lecturer_tbl ON lecturer_tbl.id = assigned_student_tbl.supervisor_id) WHERE supervisor_application_tbl.status = '1'";
                      $query = mysqli_query($con, $sql);

                      while ($data = mysqli_fetch_assoc($query)) {
                      ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $data["regNo"]; ?>
                          </td>
                          <td>
                            <?php echo $data["topic"]; ?>
                          </td>
                          <td>
                            <?php echo $data["name"]; ?>
                          </td>
                          <td>
                            <?php echo $data["created_at"]; ?>
                          </td>
                        </tr>

                      <?php
                      }

                      ?>


                    </tbody>
                  </table>
                </div>
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