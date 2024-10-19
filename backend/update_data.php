<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: ../index.php?session_expired=1");
}
include("../config/confile.php");

$tb_cust = $_SESSION['tb_cust'];

$cust_id = $_SESSION['cust_id'];

// Extract the updated data from the POST request
$updatedData = json_decode(file_get_contents('php://input'), true);

// Construct and execute the SQL update query
$sql = "UPDATE $tb_cust SET ";
foreach ($updatedData as $columnName => $value) {
    $sql .= "$columnName = '$value', ";
}
$sql = rtrim($sql, ', '); // Remove the trailing comma and space
$sql .= " WHERE cust_id = '$cust_id'";

if ($con->query($sql)) {
    echo "Data updated successfully";
} else {
    echo "Error updating data: " . $con->error;
}
?>