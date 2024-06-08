<?php

$dbhost = "localhost";
$dbuser = "D1273865";
$dbpassword = "";
$dbname = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>