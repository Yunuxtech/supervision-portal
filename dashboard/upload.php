<?php
error_reporting(0);

include("../Auth_Handler/checklogin.php");
include("../DB/db_connection.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Uploads</title>
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
                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#upload" role="tab" aria-controls="overview" aria-selected="true">Upload</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#logs" role="tab" aria-controls="sales" aria-selected="false">Upload Logs</a>
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

                              <h4 class="card-title">Upload Form</h4>
                              <?php
                              $id = $_SESSION["login"];
                              $sql1 = "SELECT * FROM `assigned_student_tbl` WHERE student_id = '$id'";
                              $query1 = mysqli_query($con, $sql1);
                              $data1 = mysqli_fetch_assoc($query1);
                              $supervisorId = $data1["supervisor_id"];
                              ?>

                              <form class="forms-sample" action="../Form_Handler/file-upload.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $_SESSION["login"]; ?>" name="id">
                                <input type="hidden" value="<?php echo $supervisorId; ?>" name="supervisorId">
                                <div class="form-group">
                                  <label>File upload</label>
                                  <input type="file" name="doc-file" class="file-upload-default" accept=".doc, .docx" required>
                                  <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Document" required>
                                    <span class="input-group-append">
                                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleTextarea1">Comment</label>
                                  <textarea class="form-control" id="exampleTextarea1" rows="4" name="comment" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary me-2" name="upload">Upload</button>
                              </form>
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
                              <h4 class="card-title">Logs</h4>
                              <?php

                              $id = $_SESSION["login"];
                              $sql = "SELECT * FROM `student_upload_tbl` WHERE student_id = '$id'";
                              $query = mysqli_query($con, $sql);
                              $num = mysqli_num_rows($query);

                              if ($num < 1) {
                                echo "No Record Found";
                              } else {

                              ?>

                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Log Id</th>
                                        <th>Comment</th>
                                        <th>File</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $uploads_dir = 'upload';
                                      $count = 1;
                                      while ($row = mysqli_fetch_assoc($query)) {
                                      ?>
                                        <tr>
                                          <td>#<?php echo $count; ?></td>
                                          <td><?php echo $row["comment"]; ?></td>
                                          <td>
                                            <a href="../Form_Handler/download.php?tag=<?php echo $row["document"]; ?>" class="nav-link" title="click to download" style="color:black"><?php echo $row["document"];   ?></a>
                                          </td>
                                          <td><?php echo $row["created_at"]; ?></td>
                                          <td>
                                            <?php
                                            if ($row["status"] == "0") {
                                            ?>
                                              <label class="badge-danger text-danger">Pending</label>

                                            <?php
                                            } else {
                                            ?>
                                              <label class="badge-danger text-success">Reviewed</label>
                                            <?php
                                            }
                                            ?>

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