<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form $_POST['active'].",".$_POST['admin']
		if ($_SESSION['admin'] == 'Y') {
			$sql = "delete from users  where id = ".$_GET['id'];
			if ($link->query($sql) === TRUE) {
				$_SESSION['error'] =  "Record deleted successfully";
			} else {
				$_SESSION['error'] =  "Error : " . $link->error;
			}
		$navrat=TRUE;
		}	
	}
?>
<html>  
   <head>
      <?php if($navrat) { header('Location: users.php');} ?>
	  <link rel="icon" href="img/monitor.png">
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Smazání uživatele ?</h1>
		<?php
		$sql = "SELECT id, username FROM users where id = ".$_GET['id'];
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$user = $row["id"]. " : " . $row["username"];
			echo "<center><h2>".$user."</h2></center> <br>";
			}
		}	
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Mazání uživatele</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <input type = "submit" value = " Smazat uživatele "/><br />
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
