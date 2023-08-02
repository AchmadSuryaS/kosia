<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "dbkosia";

$mysqli = new mysqli("localhost", "root", "", "dbkosia");

if ($mysqli -> connect_errno){
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

?>