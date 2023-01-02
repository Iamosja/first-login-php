<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "login";

$conn = mysqli_connect($servername,$user,$pass,$db);

if (!$conn) {
    echo "Error" . mysqli_connect_error();
}
?>