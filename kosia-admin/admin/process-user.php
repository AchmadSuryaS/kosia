<?php

session_start();
include '../connect.php';

if (isset($_POST['simpan'])) {
    if ($_POST['simpan'] == "add") {

        $User_ID= $_POST['User_ID'];
        $Name = $_POST['Name'];
        $Username = $_POST['Username'];
        $Password = md5($_POST['Password']);

        $query = "INSERT INTO user VALUES('$User_id', '$Name', '$Username', '$Password')";
        $sql = mysqli_query($mysqli, $query);

        $insert = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Berhasil Menambahkan [Username=$Username]',now())";
        $query = mysqli_query($mysqli,$insert);

        if ($sql) {
            header("location: user.php");
        } else {
            echo $query;
        }
    } 
    else if ($_POST['simpan'] == "update") {
        header("location: user.php");   
        $user_id = $_POST['user_id'];
        $name =  $_POST['name'];
        $username =  $_POST['username'];
        $password =  $_POST['password'];

        $query = "UPDATE user SET User_id='$User_id', Name='$Name', Username='$Username', Password=MD5('$Password') WHERE User_ID='$User_ID';";
        $sql = mysqli_query($mysqli, $query);

        $update = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Berhasil Update [Username=$Username]',now())";
        $query = mysqli_query($mysqli,$update);
    }
    header("location: user.php");
}


if (isset($_GET['delete'])) {
    $User_ID = $_GET['User_ID'];
    $query2 = "DELETE FROM user WHERE User_ID = '$User_ID'";
    $sql2 = mysqli_query($mysqli, $query2);

    $delete = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Berhasil Delete [User_ID=$User_ID]',now())";
    $query = mysqli_query($mysqli,$delete);

    if ($sql2) {
        header("location: user.php");
    } else {
        echo $query2;
    }
}
$query=mysqli_query($mysqli,"select * from user");
$number=1;
while($row=mysqli_fetch_array($query)){
    $id=$row['User_ID'];
    $sql = "UPDATE user SET User_ID=$number WHERE User_ID=$id";
    if($mysqli->query($sql) == TRUE){
        echo "Record RESET succesfully<br>";
    }
    $number++;
}

