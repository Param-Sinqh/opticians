<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php");
}
include("confile.php");

$comp_name = $con->real_escape_string($_POST['comp_name']);
$un = $con->real_escape_string($_POST['un']);
$pw = $con->real_escape_string($_POST['pw']);

$sql = "insert into  busers(comp_name, un, pw) values('$comp_name','$un','$pw')";
$con->query($sql);
$sql = "select id from busers where un='$un'";
$res = $con->query($sql);
$row = $res->fetch_assoc();
$id = $row['id'];
$tb_cust = "cust_" . $id;
$sql = "
        CREATE TABLE IF NOT EXISTS $tb_cust (
        cust_id int(11) NOT NULL AUTO_INCREMENT,
        cname varchar(200) NOT NULL,
        email varchar(200) NOT NULL,
        pin varchar(10) NOT NULL,
        address varchar(255) NOT NULL,
        phone varchar(30) NOT NULL,
        dv_right_sph varchar(10) NOT NULL,
        dv_right_cyl varchar(10) NOT NULL,
        dv_right_axis varchar(10) NOT NULL,
        dv_right_prism varchar(10) NOT NULL,
        dv_right_add varchar(10) NOT NULL,
        dv_left_sph varchar(10) NOT NULL,
        dv_left_cyl varchar(10) NOT NULL,
        dv_left_axis varchar(10) NOT NULL,
        dv_left_prism varchar(10) NOT NULL,
        dv_left_add varchar(10) NOT NULL,
        dv_va varchar(10) NOT NULL,
        dv_pd varchar(10) NOT NULL,
        nv_right_sph varchar(10) NOT NULL,
        nv_right_cyl varchar(10) NOT NULL,
        nv_right_axis varchar(10) NOT NULL,
        nv_right_prism varchar(10) NOT NULL,
        nv_right_add varchar(10) NOT NULL,
        nv_left_sph varchar(10) NOT NULL,
        nv_left_cyl varchar(10) NOT NULL,
        nv_left_axis varchar(10) NOT NULL,
        nv_left_prism varchar(10) NOT NULL,
        nv_left_add varchar(10) NOT NULL,
        nv_va varchar(10) NOT NULL,
        nv_pd varchar(10) NOT NULL,
        PRIMARY KEY (cust_id)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1
    ";

$con->query($sql);
header("Location: reg.php");
?>