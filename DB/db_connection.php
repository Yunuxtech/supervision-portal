<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db = "supervisor_portal";

$con = mysqli_connect($localhost, $username, $password, $db);
if (!$con) {
    echo "Connection Error: ".mysqli_connect_error();
}

?>