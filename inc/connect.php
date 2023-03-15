<?php
#$link = mysqli_connect("localhost", "popelnice", "TajneHeslo12345*-+", "popelnice");
$link = mysqli_connect("localhost", "gastra", "TajneHeslo12345*-+", "gastra");
// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
include('funkce.php');
?>
