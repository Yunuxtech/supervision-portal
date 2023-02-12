<?php
error_reporting(0);
include("../DB/db_connection.php");
include("../Auth_Handler/checklogin.php");
checklogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Supervisor Application</title>
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
                <h4 class="card-title">Supervisor Application Form</h4>
                <p class="card-description">
                  Supervisor Application Form, Note: All fields are Required
                </p>
                <?php
                if (isset($_SESSION["msg"])) {
                  echo $_SESSION["msg"];
                }
                unset($_SESSION["msg"]);
                ?>

                <?php
                $id = $_SESSION["login"];
                $sql1 = "SELECT * FROM `student_tbl` WHERE id = '$id'";
                $query1 = mysqli_query($con, $sql1);

                $data1 = mysqli_fetch_assoc($query1);
                $reg = $data1["reg.no"];
                $sql2 = "SELECT * FROM `supervisor_application_tbl` WHERE regNo = '$reg'";
                $query2 = mysqli_query($con, $sql2);
                $row = mysqli_num_rows($query2);

                // checking for supervisor 
                $res = mysqli_fetch_assoc($query2);

                if ($row > 0) {
                  if ($res["status"] == 1) {
                    $sql = "SELECT lecturer_tbl.name, assigned_student_tbl.student_id,assigned_student_tbl.supervisor_id  FROM lecturer_tbl INNER JOIN assigned_student_tbl ON lecturer_tbl.id = assigned_student_tbl.supervisor_id WHERE assigned_student_tbl.student_id = '$id'";
                    $query = mysqli_query($con, $sql);
                    $result = mysqli_fetch_assoc($query);
                ?>
                    <div class="alert alert-success alert-dismissible">
                      <strong>Congration, application approved <i class="mdi mdi-emoticon-happymdi mdi-emoticon-happy"></i> </strong>
                      <p style="margin-top: 20px;">Assigned Supervisor: <b><?php echo $result["name"]; ?></b> </p>
                    </div>

                  <?php

                  } else {
                  ?>
                    <div class="alert alert-info alert-dismissible">
                      <strong>Application Successful</strong>
                      <p style="margin-top: 40px;">Note: Application under review</p>
                    </div>
                  <?php
                  }
                } else {
                  ?>
                  <form class="forms-sample" action="../Form_Handler/supervisor-app.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Supervisor Option 1</label>
                      <select name="option1" id="" class="form-control form-control-sm">
                        <option value="">Select Supervisor</option>

                        <?php
                        $sql = "SELECT * FROM `lecturer_tbl` ORDER BY RAND()";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                          <option value="<?php echo $data["name"]; ?>"><?php echo $data["name"];  ?></option>

                        <?php
                        }

                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Supervisor Option 2</label>
                      <select name="option2" id="" class="form-control form-control-sm">
                        <option value="">Select Supervisor</option>

                        <?php
                        $sql = "SELECT * FROM `lecturer_tbl` ORDER BY RAND()";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                          <option value="<?php echo $data["name"]; ?>"><?php echo $data["name"];  ?></option>

                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <?php
                      $id = $_SESSION["login"];
                      $sql = "SELECT * FROM `student_tbl` WHERE id = '$id'";
                      $result = mysqli_query($con, $sql);
                      $data = mysqli_fetch_assoc($result);

                      ?>
                      <label for="exampleInputEmail3">Registration No.</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="reg" readonly value="<?php echo $data["reg.no"];  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Project Topic</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="topic" required placeholder="Project Topic">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Project Summary</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" required name="summary"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" name="apply">Submit</button>

                  </form>

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