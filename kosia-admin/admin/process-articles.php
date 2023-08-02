<?php
session_start();

include '../connect.php';

if (isset($_POST['simpan'])) {
    if ($_POST['simpan'] == "add") {
        $Articles_ID = $_POST['Articles_ID'];
        $Articles_ImageURL = $_FILES['Articles_ImageURL']['name'];
        $Articles_Description= $_POST['Articles_Description'];

        $dir = "../admin/img/";
        $tmpFile = $_FILES['Articles_ImageURL']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $Articles_ImageURL);

        $query = "INSERT INTO articles VALUES('$Articles_ID', '$Articles_ImageURL', '$Articles_Description')";
        $sql = mysqli_query($mysqli, $query);

        $insert = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Added Article',now())";
        $query = mysqli_query($mysqli, $insert);

        if ($sql) {
            header("location: articles.php");
        } else {
            echo $query;
        }
    } else if ($_POST['simpan'] == "update") {
        $Articles_ID       = $_POST['Articles_ID'];
        $Articles_ImageURL     = $_FILES['Articles_ImageURL']['name'];
        $Articles_Description = $_POST['Articles_Description'];

        $dir = "../admin/img/";
        $tmpFile = $_FILES['Articles_ImageURL']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $Articles_ImageURL);

        $query = "UPDATE articles SET Articles_ImageURL='$Articles_ImageURL', Articles_Description='$Articles_Description' WHERE Articles_ID='$Articles_ID'";
        $sql = mysqli_query($mysqli, $query);

        $update = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Update Article[Articles_ID=$Articles_ID]',now())";
        $query = mysqli_query($mysqli,$update);
    }
    header("location: articles.php");
}


if (isset($_GET['delete'])) {
    $Articles_ID = $_GET['Articles_ID'];
    $queryShow = "SELECT * FROM articles WHERE Articles_ID = $Articles_ID";
    $sqlShow = mysqli_query($mysqli, $queryShow);
    $articles = mysqli_fetch_array($sqlShow);

    unlink("../admin/img/" . $articles['Articles_ImageURL']);

    $query2 = "DELETE FROM articles WHERE Articles_ID = $Articles_ID";
    $sql2 = mysqli_query($mysqli, $query2);

    $delete = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Delete Article [Articles_ID=$Articles_ID]', now())";
    $query = mysqli_query($mysqli, $delete);

    if ($sql2) {
        header("location: articles.php");
    } else {
        echo $query2;
    }
}
$query=mysqli_query($mysqli,"select * from articles");
$number=1;
while($row=mysqli_fetch_array($query)){
    $id=$row['Articles_ID'];
    $sql = "UPDATE articles SET Articles_ID=$number WHERE Articles_ID=$id";
    if($mysqli->query($sql) == TRUE){
        echo "Record RESET succesfully<br>";
    }
    $number++;
}
