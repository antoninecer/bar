<?php
   require_once('./inc/connect.php');
   
    if(!isset($_SESSION)) 
    { 
		// server should keep session data for seconds 3600=1hour
		ini_set('session.gc_maxlifetime', 36000);
		// each client should remember their session id for EXACTLY 10 hour

		session_set_cookie_params(36000);
    session_start(); 
    } 
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($link,"select username from users where username = '".$user_check."';");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
