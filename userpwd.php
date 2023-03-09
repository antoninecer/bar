<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$stranka = 'users.php';
		$nactiuser= "SELECT * FROM users where id=".$_GET['id'];
		$result = $link->query($nactiuser);
                if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$klub=$row['club'];
			}}
echo "klub:".$klub." ! a nactiuser je :".$nactiuser;
 if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S' && $_SESSION['klub']==$klub ) || ($_SESSION['user_id']==$_GET['id'])) {
			$hashed_password = safe_b64encode($_POST["password"]);
			$sql = "update users set password ='".$hashed_password."' where id = ".$_GET['id'];
			if ($link->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error update record: " . $link->error;
			}
		$navrat=TRUE;
		}
	}
?>
<html>  
   <head>
      <?php if($navrat) { header('Location: '.$stranka);} ?>
	  <link rel="icon" href="img/monitor.png">
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Change password </h1>
		<?php
		$sql = "SELECT id, username, admin FROM users where id = ".$_GET['id'];
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Change password</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
					<label>New Password:</label><input type = "password" name = "password" class = "box"/><br /><br />
					<input type = "submit" value = " Update "/><br />
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
