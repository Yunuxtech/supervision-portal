<?php

error_reporting(0);
include("../Auth_Handler_Admin/checklogin.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Supervisor | Application</title>
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
              <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#upload" role="tab" aria-controls="overview" aria-selected="true">Pending</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#logs" role="tab" aria-controls="sales" aria-selected="false">Approved</a>
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

                              <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>User</th>
                                      <th>Product</th>
                                      <th>Sale</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Jacob</td>
                                      <td>Photoshop</td>
                                      <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                                      <td><label class="badge badge-danger">Pending</label></td>
                                    </tr>
                                    <tr>
                                      <td>Messsy</td>
                                      <td>Flash</td>
                                      <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                                      <td><label class="badge badge-warning">In progress</label></td>
                                    </tr>
                                    <tr>
                                      <td>John</td>
                                      <td>Premier</td>
                                      <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                                      <td><label class="badge badge-info">Fixed</label></td>
                                    </tr>
                                    <tr>
                                      <td>Peter</td>
                                      <td>After effects</td>
                                      <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                                      <td><label class="badge badge-success">Completed</label></td>
                                    </tr>
                                    <tr>
                                      <td>Dave</td>
                                      <td>53275535</td>
                                      <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                      <td><label class="badge badge-warning">In progress</label></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
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
                  <h4 class="card-title">Approved</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Sale</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
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