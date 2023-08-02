<?php 
include '../login.php';

$logout = mysqli_query($mysqli, " SELECT * FROM user WHERE Username='$Username'");
$cek = mysqli_num_rows($logout);

session_start();
$Username = $_POST['Username'];
$_SESSION['status'] = "logout";

$logout = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] berhasil logout',now())";

$query = mysqli_query($mysqli,$logout);
session_destroy();

header("location:../index.php");    
?>