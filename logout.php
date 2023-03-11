<?php
	 ini_set('session.gc_maxlifetime', 36000);
	 session_set_cookie_params(36000);
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
