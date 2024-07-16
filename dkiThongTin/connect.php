<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "webphp";
$connect = mysqli_connect($server,$user,$pass,$database);
mysqli_query($connect,'set names "utf8"');
?>