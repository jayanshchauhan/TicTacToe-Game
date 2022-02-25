<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$database="userdetails";

$connector=mysqli_connect($servername,$username,$password,$database);
$status="Offline";
$sql1="update game_table set Status='$status' WHERE Status='Online'";
$result1 = mysqli_query($connector,$sql1);

session_unset();
session_destroy();
header("location: index.php");
?>
