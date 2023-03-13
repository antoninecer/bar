<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$stranka = 'users.php';
		$nacti= "SELECT * FROM users where id=".$_GET['id'];
		$result = $link->query($nacti);
                if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$klub=$row['zkratka'];
			}}
 		if ((($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S')) && ($_POST['typ']=='ADD')) {
# id | username          | club   | password            | email                   | admin 
			$pw="";
			if ($_POST['password']!=='') { $pw=" password='".safe_b64encode($_POST['password'])."', "; }
			$sql = "update users set username='".$_POST['username']."', ".$pw." email='".$_POST['email']."' where id = ".$_GET['id'];
			#echo $sql;
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
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Úprava uživatele </h1>
		<?php
		if ($_SESSION['admin'] == 'S') {
      $w=" and club='".$_SESSION['klub']."'";
		}
		$sql = "SELECT * FROM users where id=".$_GET['id'].$w;
         
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$username=$row["username"];
				$password=safe_b64decode($row["password"]);
				$email=$row["email"];
			}
		} else { header('Location: users.php'); }    	
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Úprava uživatele</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
		<label>Username:</label><br><input type = "text" name = "username" class = "box" value=<?php echo "\"".$username."\""; ?> /><br>
		<label>Heslo:<br>(při nevyplnění zůstane heslo nezměněné)</label><br><input type = "password" name = "password" class = "box" value=<?php echo "\"".$castka."\""; ?> /><br>
		<label>Email:</label><br><input type = "text" name = "email" class = "box" value=<?php echo "\"".$email."\""; ?> /><br>
		<input type="hidden" name="typ" value="ADD">
		<input type = "submit" value = " Potvrď "/><br>
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
