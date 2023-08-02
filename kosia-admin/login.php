<?php 
include 'connect.php';
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);


$login = mysqli_query($mysqli, " SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");
$cek = mysqli_num_rows($login);


if($cek > 0){

session_start();
$_SESSION['Username'] = $Username;
$_SESSION['status'] = "login";

$login = "INSERT INTO report (action_user,date_time) values ('User $Username berhasil login',now())";


$query = mysqli_query($mysqli,$login);
header("location:admin/index.php");
}else{
header("location:index.php");
}
