<?php

error_reporting(0);
include("../Auth/checklogin.php");
// include("./Form_Handler/add_lecturer.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Add Supervisor</title>
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
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#upload" role="tab" aria-controls="overview" aria-selected="true">Add supervisor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#supervisor-list" role="tab" aria-controls="sales" aria-selected="false">List of supervisor</a>
                  </li>

                </ul>
                <div class="tab-content py-0 px-0">
                  <div class="tab-pane fade show active " id="upload" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      <div class="d-flex py-3 flex-grow-1  p-3 item">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card">

                            <div class="card-body">
                              <?php
                              if (isset($_SESSION["msg"])) {
                                echo $_SESSION["msg"];
                              }
                              unset($_SESSION["msg"]);
                              ?>
                              <h4 class="card-title">Add supervisor</h4>

                              <form class="forms-sample" action="./Form_Handler/add_lecturer.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label>supervisor Name</label>
                                  <input type="text" name="name" class="form-control" placeholder="Enter supervisor name" required>

                                </div>
                                <div class="form-group">
                                  <label>supervisor Email</label>
                                  <input type="email" name="email" class="form-control" placeholder="Enter supervisor email" required>

                                </div>
                                <div class="form-group">
                                  <label>supervisor Password</label>
                                  <input type="password" name="password" class="form-control" value="12345" required readonly>
                                  <span style="color:red">Note:</span> Default password is 12345

                                </div>

                                <button type="submit" class="btn btn-primary me-2" name="save">Save</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="supervisor-list" role="tabpanel" aria-labelledby="sales-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      <div class="d-flex py-3 border-md-right flex-grow-1  p-3 item">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">List Of Supervisors</h4>
                              <?php
                              $sql = "SELECT * FROM `lecturer_tbl`";
                              $res = mysqli_query($con, $sql);
                              $num = mysqli_num_rows($res);
                              if ($num < 1) {
                                echo "<b>No record find</b>";
                              } else {
                              ?>
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created-At</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $count = 1;
                                      while ($data = mysqli_fetch_assoc($res)) {
                                      ?>
                                      <tr>
                                        <td><?php echo $count;  ?></td>
                                        <td><?php echo $data["name"];  ?></td>
                                        <td><?php echo $data["email"];  ?></td>
                                        <td><?php echo $data["created_at"];  ?></td>
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
                    </div>
                  </div>

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
  <script src="./js/file-upload.js"></script>
</body>

</html>