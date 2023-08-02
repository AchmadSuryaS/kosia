<?php
session_start();

include '../connect.php';

if (isset($_POST['simpan'])) {
    if ($_POST['simpan'] == "add") {
        $Sinopsis_ID = $_POST['Sinopsis_ID'];
        $Sinopsis_ImageURL = $_FILES['Sinopsis_ImageURL']['name'];
        $Sinopsis_Description= $_POST['Sinopsis_Description'];

        $dir = "../admin/img/";
        $tmpFile = $_FILES['Sinopsis_ImageURL']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $Sinopsis_ImageURL);

        $query = "INSERT INTO sinopsis VALUES('$Sinopsis_ID', '$Sinopsis_ImageURL', '$Sinopsis_Description')";
        $sql = mysqli_query($mysqli, $query);

        $insert = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Added Sinopsis',now())";
        $query = mysqli_query($mysqli, $insert);

        if ($sql) {
            header("location: sinopsis.php");
        } else {
            echo $query;
        }
    } else if ($_POST['simpan'] == "update") {
        $Sinopsis_ID       = $_POST['Sinopsis_ID'];
        $Sinopsis_ImageURL     = $_FILES['Sinopsis_ImageURL']['name'];
        $Sinopsis_Description = $_POST['Sinopsis_Description'];

        $dir = "../admin/img/";
        $tmpFile = $_FILES['Sinopsis_ImageURL']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $Sinopsis_ImageURL);

        $query = "UPDATE sinopsis SET Sinopsis_ImageURL='$Sinopsis_ImageURL', Sinopsis_Description='$Sinopsis_Description' WHERE Sinopsis_ID='$Sinopsis_ID'";
        $sql = mysqli_query($mysqli, $query);

        $update = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Update Sinopsis[Sinopsis_ID=$Sinopsis_ID]',now())";
        $query = mysqli_query($mysqli,$update);
    }
    header("location: sinopsis.php");
}


if (isset($_GET['delete'])) {
    $Sinopsis_ID = $_GET['Sinopsis_ID'];
    $queryShow = "SELECT * FROM sinopsis WHERE Sinopsis_ID = $Sinopsis_ID";
    $sqlShow = mysqli_query($mysqli, $queryShow);
    $sinopsis = mysqli_fetch_array($sqlShow);

    unlink("../admin/img/" . $sinopsis['Sinopsis_ImageURL']);

    $query2 = "DELETE FROM sinopsis WHERE Sinopsis_ID = $Sinopsis_ID";
    $sql2 = mysqli_query($mysqli, $query2);

    $delete = "INSERT INTO report (action_user,date_time) values ('User $_SESSION[Username] Successfully Delete Sinopsis [Sinopsis_ID=$Sinopsis_ID]', now())";
    $query = mysqli_query($mysqli, $delete);

    if ($sql2) {
        header("location: sinopsis.php");
    } else {
        echo $query2;
    }
}
$query=mysqli_query($mysqli,"select * from sinopsis");
$number=1;
while($row=mysqli_fetch_array($query)){
    $id=$row['Sinopsis_ID'];
    $sql = "UPDATE sinopsis SET Sinopsis_ID=$number WHERE Sinopsis_ID=$id";
    if($mysqli->query($sql) == TRUE){
        echo "Record RESET succesfully<br>";
    }
    $number++;
}
