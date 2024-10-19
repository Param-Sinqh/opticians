<?php
session_start();
if ($_SESSION['auth'] != 1) {
    header("Location: ../index.php?session_expired=1");
}
include("../config/confile.php");

$comp_name = $con->real_escape_string($_POST['comp_name']);
$email = $con->real_escape_string($_POST['email']);
$phone = $con->real_escape_string($_POST['phone']);
$address = $con->real_escape_string($_POST['address']);
$un = $con->real_escape_string($_POST['un']);
$pw = $con->real_escape_string($_POST['pw']);

$sql = "INSERT INTO busers(comp_name, email, phone, address, un, pw) values('$comp_name', '$email', '$phone', '$address', '$un', '$pw')";
if ($con->query($sql) !== TRUE) {
    die("Error: " . $con->error);
}

$sql = "SELECT id FROM busers WHERE un='$un'";
$res = $con->query($sql);
$row = $res->fetch_assoc();
$id = $row['id'];
$tb_cust = "cust_" . $id;
$sql = "CREATE TABLE IF NOT EXISTS $tb_cust (
        cust_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        cname varchar(200) NOT NULL,
        email varchar(200) DEFAULT NULL,
        pin varchar(10) DEFAULT NULL,
        address TEXT DEFAULT NULL,
        phone varchar(30) DEFAULT NULL,
        date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
        date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        dv_right_sph varchar(10) DEFAULT NULL,
        dv_right_cyl varchar(10) DEFAULT NULL,
        dv_right_axis varchar(10) DEFAULT NULL,
        dv_right_prism varchar(10) DEFAULT NULL,
        dv_right_add varchar(10) DEFAULT NULL,
        dv_left_sph varchar(10) DEFAULT NULL,
        dv_left_cyl varchar(10) DEFAULT NULL,
        dv_left_axis varchar(10) DEFAULT NULL,
        dv_left_prism varchar(10) DEFAULT NULL,
        dv_left_add varchar(10) DEFAULT NULL,
        dv_va varchar(10) DEFAULT NULL,
        dv_pd varchar(10) DEFAULT NULL,
        nv_right_sph varchar(10) DEFAULT NULL,
        nv_right_cyl varchar(10) DEFAULT NULL,
        nv_right_axis varchar(10) DEFAULT NULL,
        nv_right_prism varchar(10) DEFAULT NULL,
        nv_right_add varchar(10) DEFAULT NULL,
        nv_left_sph varchar(10) DEFAULT NULL,
        nv_left_cyl varchar(10) DEFAULT NULL,
        nv_left_axis varchar(10) DEFAULT NULL,
        nv_left_prism varchar(10) DEFAULT NULL,
        nv_left_add varchar(10) DEFAULT NULL,
        nv_va varchar(10) DEFAULT NULL,
        nv_pd varchar(10) DEFAULT NULL,
        bc varchar(10) DEFAULT NULL,
        dia varchar(10) DEFAULT NULL
        )
    ";

if ($con->query($sql)) {
    header("Location: ../reg.php");
} else {
    die("Error creating table: " . $con->error);
}

exit();

?>