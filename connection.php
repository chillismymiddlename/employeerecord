<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "emp_record";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>