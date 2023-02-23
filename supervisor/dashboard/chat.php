<?php

error_reporting(0);
include("../Auth_Handler_Admin/checklogin.php");
include("../../DB/db_connection.php");
checklogin();
$supervisorId = $_SESSION["AdminLogin"];
$studentId = $_GET["chatId"];
if (isset($_GET["view"])) {
  $sq = "UPDATE `chat_tbl` SET `status`='1' WHERE receiver_id = '$supervisorId' AND sender_id = '$studentId'";
  mysqli_query($con, $sq);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chatbox</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/supervisor1.jpg" />
  <style>
    img {
      max-width: 100%;
    }

    .inbox_chat {
      height: 550px;
      overflow-y: scroll;
    }

    .active_chat {
      background: #ebebeb;
    }

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }

    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
    }

    .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 3px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 95%;
    }

    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }

    .received_withd_msg {
      width: 57%;
    }

    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 100%;
    }

    .sent_msg p {
      background: #05728f none repeat scroll 0 0;
      border-radius: 3px;
      font-size: 14px;
      margin: 0;
      color: #fff;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }

    .outgoing_msg {
      overflow: hidden;
      margin: 26px 0 26px;
    }

    .sent_msg {
      float: right;
      width: 46%;
    }

    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }

    .type_msg {
      border-top: 1px solid #c4c4c4;
      position: relative;
    }

    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 17px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }

    .messaging {
      padding: 0 0 50px 0;
    }

    .msg_history {
      height: 516px;
      overflow-y: auto;
    }
  </style>
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
                <?php
                // $id = 23; 

                $supervisorId = $_SESSION["AdminLogin"];
                $studentId = $_GET["chatId"];
                $sql = "SELECT * FROM `chat_tbl` WHERE (sender_id = '$supervisorId' AND receiver_id = '$studentId') OR (receiver_id = '$supervisorId' AND sender_id = '$studentId');";
                $query = mysqli_query($con, $sql);
                $num = mysqli_num_rows($query);


                if ($num < 1) {
                ?>
                  Start chatting with your Student... <i class="mdi mdi-emoticon-happy"></i>
                  <div class="mesgs" style="width: 100%;">
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <form action="./Admin_Form_Handler/chat-message.php" method="post">
                          <input type="hidden" name="studentId" id="" value="<?php echo $studentId; ?>">
                          <input type="hidden" name="supervisorId" id="" value="<?php echo $supervisorId; ?>">
                          <input type="text" class="write_msg" placeholder="Type a message" name="message" required />
                          <button class="msg_send_btn" type="submit" name="send-message"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>

                      </div>
                    </div>
                  </div>


                <?php
                } else {
                ?>
                  <div class="mesgs">
                    <div class="msg_history">
                      <?php
                      while ($data = mysqli_fetch_assoc($query)) {
                        if ($data["sender_id"] == $supervisorId) {
                      ?>
                          <div class="outgoing_msg">
                            <div class="sent_msg">
                              <p><?php echo htmlentities($data["message"]); ?></p>
                              <span class="time_date"> <?php echo $data["created_at"]; ?></span>
                            </div>
                          </div>
                        <?php
                        } else {
                        ?>
                          <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="../images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                              <div class="received_withd_msg">
                                <p><?php echo htmlentities($data["message"]); ?></p>
                                <span class="time_date"> <?php echo $data["created_at"]; ?></span>
                              </div>
                            </div>
                          </div>
                      <?php

                        }
                      }
                      ?>
                    </div>
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <form action="./Admin_Form_Handler/chat-message.php" method="post">
                          <input type="hidden" name="studentId" id="" value="<?php echo $studentId; ?>">
                          <input type="hidden" name="supervisorId" id="" value="<?php echo $supervisorId; ?>">
                          <input type="text" class="write_msg" placeholder="Type a message" name="message" required />
                          <button class="msg_send_btn" type="submit" name="send-message"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>
                      </div>
                    </div>
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