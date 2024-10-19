<?php
session_start();
if ($_SESSION['auth'] != 1) {
        header("Location: ../index.php?session_expired=1");
}
include("../config/confile.php");

$cname = $con->real_escape_string($_POST['cname']);
$email = $con->real_escape_string($_POST['email']);
$phone = $con->real_escape_string($_POST['phone']);
$pin = $con->real_escape_string($_POST['pin']);
$address = $con->real_escape_string($_POST['address']);

$dv_right_sph = $con->real_escape_string($_POST['dv_right_sph']);
$dv_right_cyl = $con->real_escape_string($_POST['dv_right_cyl']);
$dv_right_axis = $con->real_escape_string($_POST['dv_right_axis']);
$dv_right_prism = $con->real_escape_string($_POST['dv_right_prism']);
$dv_right_add = $con->real_escape_string($_POST['dv_right_add']);

$dv_left_sph = $con->real_escape_string($_POST['dv_left_sph']);
$dv_left_cyl = $con->real_escape_string($_POST['dv_left_cyl']);
$dv_left_axis = $con->real_escape_string($_POST['dv_left_axis']);
$dv_left_prism = $con->real_escape_string($_POST['dv_left_prism']);
$dv_left_add = $con->real_escape_string($_POST['dv_left_add']);

$dv_va = $con->real_escape_string($_POST['dv_va']);
$dv_pd = $con->real_escape_string($_POST['dv_pd']);

$nv_right_sph = $con->real_escape_string($_POST['nv_right_sph']);
$nv_right_cyl = $con->real_escape_string($_POST['nv_right_cyl']);
$nv_right_axis = $con->real_escape_string($_POST['nv_right_axis']);
$nv_right_prism = $con->real_escape_string($_POST['nv_right_prism']);
$nv_right_add = $con->real_escape_string($_POST['nv_right_add']);

$nv_left_sph = $con->real_escape_string($_POST['nv_left_sph']);
$nv_left_cyl = $con->real_escape_string($_POST['nv_left_cyl']);
$nv_left_axis = $con->real_escape_string($_POST['nv_left_axis']);
$nv_left_prism = $con->real_escape_string($_POST['nv_left_prism']);
$nv_left_add = $con->real_escape_string($_POST['nv_left_add']);

$nv_va = $con->real_escape_string($_POST['nv_va']);
$nv_pd = $con->real_escape_string($_POST['nv_pd']);

$bc = $con->real_escape_string($_POST['bc']);
$dia = $con->real_escape_string($_POST['dia']);

$tb_cust = $_SESSION['tb_cust'];

$sql = "INSERT INTO $tb_cust (cname, email, pin, address, phone, 
        dv_right_sph, dv_right_cyl, dv_right_axis, dv_right_prism, dv_right_add, 
        dv_left_sph, dv_left_cyl, dv_left_axis, dv_left_prism, dv_left_add, 
        dv_va, dv_pd, 
        nv_right_sph, nv_right_cyl, nv_right_axis, nv_right_prism, nv_right_add, 
        nv_left_sph, nv_left_cyl, nv_left_axis, nv_left_prism, nv_left_add, 
        nv_va, nv_pd, 
        bc, dia)
        VALUES ('$cname', '$email', '$pin', '$address', '$phone', 
        '$dv_right_sph', '$dv_right_cyl', '$dv_right_axis', '$dv_right_prism', '$dv_right_add', 
        '$dv_left_sph', '$dv_left_cyl', '$dv_left_axis', '$dv_left_prism', '$dv_left_add', 
        '$dv_va', '$dv_pd', 
        '$nv_right_sph', '$nv_right_cyl', '$nv_right_axis', '$nv_right_prism', '$nv_right_add', 
        '$nv_left_sph', '$nv_left_cyl', '$nv_left_axis', '$nv_left_prism', '$nv_left_add', 
        '$nv_va', '$nv_pd',
        '$bc', '$dia')";


$con->query($sql);

header("Location: ../nc.php#all_cust");
?>