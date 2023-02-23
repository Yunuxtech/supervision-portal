<?php
error_reporting(0);

include("../Auth_Handler/checklogin.php");
include("../DB/db_connection.php");
checklogin();

$studentId = $_SESSION["login"];

if (isset($_GET["view"])) {
  $sq = "UPDATE `review_logs_tbl` SET `status`='1' WHERE student_id = '$studentId'";
  mysqli_query($con, $sq);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Review Logs</title>
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
                <h4 class="card-title">Review Logs</h4>
                <?php

                $id = $_SESSION["login"];
                $sql = "SELECT * FROM `review_logs_tbl` WHERE student_id = '$id'";
                $query = mysqli_query($con, $sql);
                $num = mysqli_num_rows($query);

                if ($num < 1) {
                  echo "No Record Found";
                } else {
                ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Log Id
                          </th>
                          <th>
                            Comment
                          </th>
                          <th>
                            File
                          </th>
                          <th>
                            Date
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                          <tr>
                            <td class="py-1">
                              #<?php echo $count;  ?>
                            </td>
                            <td>
                              <?php echo $data["comment"];  ?>
                            </td>
                            <td>
                              <a href="../Form_Handler/download.php?download=<?php echo $data["document"]; ?>" class="nav-link" title="Click to Download" style="color:black"><?php echo $data["document"];  ?></a>

                            </td>
                            <td>
                              <?php echo $data["created_at"];  ?>
                            </td>
                          </tr>

                        <?php
                          $count++;
                        }



                        ?>

                      </tbody>
                    </table>
                  </div>

                <?php
                }

                ?>


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