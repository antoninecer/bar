<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
			$sql = "delete from proviznipolozky where id = ".$_GET['id'];
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
      <?php if($navrat) { header('Location: provize.php');} ?>
	  <link rel="icon" href="img/monitor.png">
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Smazání provizní položky</h1>
		<?php
		$sql = "SELECT p.id,k.zkratka,p.aktivni,p.obrazek,p.popis,p.castka,p.mena FROM proviznipolozky p join kluby k on p.klub_id=k.id where p.id = ".$_GET['id'];
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$polozka = $row["id"]. " : " .$row['zkratka']. " : ". $row["popis"]. " : ".$row['castka'].$row['mena'] ;
			echo "<center><h2>".$polozka."</h2></center> <br>";
			}
		}	
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Mazání položky</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <input type = "submit" value = " Smazat položku "/><br />
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
