<?php
session_start();
include ("confile.php");

$uname = $con->real_escape_string($_POST['uname']);
$pwd = $con->real_escape_string($_POST['pwd']);

$_SESSION['auth'] = 0;
$sql = "select * from busers where un='$uname' and pw='$pwd'";
$res = $con->query($sql);
if ($res->num_rows == 1) {
	$row = $res->fetch_assoc();
	$_SESSION['uname'] = $uname;
	$_SESSION['id'] = $row['id'];
	$_SESSION['cn'] = $row['comp_name'];
	$_SESSION['tb_cust'] = "cust_" . $row['id'];
	$_SESSION['auth'] = 1;
	if ($uname == 'admin') {
		header("Location: admin_welcome.php");
	} else {
		header("Location: home.php");
	}

} else {
	header("Location: index.php?msg=1");
}
?>