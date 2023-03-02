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
  <title>Admin | Application</title>
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
          <?php
          if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
          }
          unset($_SESSION["msg"]);
          ?>
          <div class="col-12 grid-margin stretch-card">
            <div class="card">

              <div class="card-body dashboard-tabs p-0">

                <ul class="nav nav-tabs px-4" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#upload" role="tab" aria-controls="overview" aria-selected="true">Pending Request</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#logs" role="tab" aria-controls="sales" aria-selected="false">Assign Supervisor</a>
                  </li>

                </ul>
                <div class="tab-content py-0 px-0">
                  <div class="tab-pane fade show active " id="upload" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      <div class="d-flex py-3 flex-grow-1  p-3 item">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Unapproved Request</h4>
                              <?php
                              $sql = "SELECT * FROM `supervisor_application_tbl` WHERE status = '0'";
                              $result = mysqli_query($con, $sql);
                              $num = mysqli_num_rows($result);
                              if ($num < 1) {
                                echo "<b>No Pending Request...</b>";
                              } else {

                              ?>
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Reg No.</th>
                                        <th>Selected Supervisors</th>
                                        <th>Project Title</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $count = 1;
                                      while ($data = mysqli_fetch_assoc($result)) {
                                      ?>
                                        <tr>
                                          <td><?php echo $count;  ?></td>
                                          <td><?php echo $data["regNo"];  ?></td>
                                          <td><?php echo $data["option1"];  ?> - <?php echo $data["option2"];  ?></td>
                                          <td><?php echo $data["topic"];  ?></td>
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
                  <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="sales-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      <div class="d-flex py-3 border-md-right flex-grow-1  p-3 item">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">

                              <h4 class="card-title">Assign Supervisor</h4>
                              <form class="forms-sample" action="./Form_Handler/application.php" method="post">
                                <div class="form-group">
                                  <label for="exampleInputName1">Select Student</label>
                                  <select name="student" class="form-control form-control-sm" required>
                                    <option value="" disabled selected>Choose Student</option>
                                    <?php
                                    $sql1 = "SELECT * FROM `supervisor_application_tbl` WHERE status = '0'";
                                    $res1 = mysqli_query($con, $sql1);
                                    while ($row1 = mysqli_fetch_assoc($res1)) {
                                    ?>
                                      <option value="<?php echo $row1["userId"]; ?>"><?php echo $row1["regNo"]; ?></option>

                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputName1">Select Supervisor</label>
                                  <select name="supervisor" id="" class="form-control form-control-sm" required>
                                    <option value="" disabled selected>Choose Supervisor</option>
                                    <?php
                                    $sql2 = "SELECT * FROM `lecturer_tbl`";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($row2 = mysqli_fetch_assoc($res2)) {
                                    ?>
                                      <option value="<?php echo $row2["id"]; ?>"><?php echo $row2["name"]; ?></option>

                                    <?php
                                    }
                                    ?>

                                  </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2" name="approve">Submit</button>
                              </form>

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