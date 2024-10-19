<?php
session_start();
include("../config/confile.php");

$uname = $con->real_escape_string($_POST['uname']);
$pwd = $con->real_escape_string($_POST['pwd']);

$_SESSION['auth'] = 0;
$sql = "SELECT * FROM busers WHERE un='$uname' AND pw='$pwd'";
$res = $con->query($sql);

$response = [];

if ($res->num_rows == 1) {
    $row = $res->fetch_assoc();
    $_SESSION['uname'] = $uname;
    $_SESSION['id'] = $row['id'];
    $_SESSION['cn'] = $row['comp_name'];
    $_SESSION['tb_cust'] = "cust_" . $row['id'];
    $_SESSION['auth'] = 1;

    if ($uname == 'admin') {
        $response['status'] = 'admin';
    } else {
        $response['status'] = 'user';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Incorrect username or password';
}

echo json_encode($response);
?>
