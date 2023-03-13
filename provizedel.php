<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
			$sql = "delete from provize where id = ".$_GET['id'];
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
      <?php if($navrat) { header('Location: klubplace.php');} ?>
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Smazání natížené provizní položky</h1>
		<?php
		$sql = "SELECT * FROM provize where id = ".$_GET['id'];
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) 
#| id | klub_id | barman_id | umelec_id | polozka_id | popis                   | cas                 | castka | mena | doklad |
			$polozka = $row["id"]." : ". $row["popis"]." : ".$row['cas']." : ".$row['castka'].$row['mena'] ;
			echo "<center><h2>".$polozka."</h2></center> <br>";
			}
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Mazání natížené položky</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <input type = "submit" value = " Smazat položku "/><br />
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
