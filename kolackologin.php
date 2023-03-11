<?php
session_start();
require_once('./inc/connect.php'); 
if (isset($_COOKIE['bar_password'])) {
	$myusername=$_COOKIE['bar_username'];
	$decode=$_COOKIE['bar_password'];
  $sql = "SELECT * FROM users WHERE username = '".$myusername."' and password = '".$decode."'";
	#echo $sql;
	$result = mysqli_query($link,$sql);
     	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	$id = $row['id'];
        $admin = $row['admin'];
        $uklub = $row['club'];
      	$count = mysqli_num_rows($result);
      	// If result matched $myusername and $mypassword, table row must be 1 row
      	if($count == 1) {
         	$_SESSION['login_user'] = $myusername;
         	$_SESSION['user_id'] = $id;
	 	$_SESSION['admin'] = $admin;
	 	$_SESSION['klub'] = $uklub;
	}
	if (isset($_COOKIE['klub_id'])) {
		$_SESSION['klub_id'] = $_COOKIE['klub_id'];
	}
} else { 
	
	header("Location: logout.php");
}

?>
