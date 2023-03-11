<?php
#	include('session.php');
	require_once('inc/connect.php');
	
	
	
    
		$sql = "insert into users ( username, password, email, admin) values ('".$_GET['username']."','".safe_b64encode($_GET['password'])."','".$_GET['email']."','".strtoupper($_GET['admin'])."');";
		echo $sql;
		
		if ($link->query($sql) == TRUE) {
			$_SESSION['error'] =  "New record created successfully";
		} else {
			$_SESSION['error'] = "Error: ". $link->error;
		}
?>



