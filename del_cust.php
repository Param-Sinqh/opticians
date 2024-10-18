<?php
	session_start();
	if($_SESSION['auth']!=1)
	{
		header("Location: index.php");
	}
	include("confile.php");
	$cust_id = $con->real_escape_string($_GET['cust_id']);
	
	$tb_cust=$_SESSION['tb_cust'];
	
	$sql="delete from $tb_cust where cust_id='$cust_id'";
	$res=$con->query($sql);
	header("Location: nc.php");
?>