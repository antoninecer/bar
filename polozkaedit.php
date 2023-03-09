<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$stranka = 'provize.php';
		$nacti= "SELECT * FROM proviznipolozky where id=".$_GET['id'];
		$result = $link->query($nacti);
                if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$klub=$row['zkratka'];
			}}
 		if ((($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S')) && ($_POST['typ']=='ADD')) {
#| id | klub_id | aktivni | obrazek             | popis                   | castka | mena 
			$sql = "update proviznipolozky set popis='".$_POST['popis']."',castka='".$_POST['castka']."',mena='".$_POST['mena']."' where id = ".$_GET['id'];
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
      <?php if($navrat) { header('Location: '.$stranka);
} ?>
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Úprava položky </h1>
		<?php
		$sql = "SELECT p.id as id,k.zkratka as klub,p.aktivni as aktivni,p.obrazek as obrazek,p.popis as popis,p.castka as castka,p.mena as mena  FROM proviznipolozky p join kluby k on p.klub_id=k.id where p.id=".$_GET['id'];
         
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$klub=$row["klub"];
				$popis=$row["popis"];
				$castka=$row["castka"];
				$mena=$row["mena"];
				$obrazek=$row["obrazek"];
			echo "<center><h2>".$klub.":".$popis."</h2><img src=".$obrazek."></center> <br>";
			}
		}	
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Úprava položky</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
		<label>Popis:</label><br><input type = "text" name = "popis" class = "box" value=<?php echo "\"".$popis."\""; ?> /><br>
		<label>Částka:</label><br><input type = "text" name = "castka" class = "box" value=<?php echo "\"".$castka."\""; ?> /><br>
		<label>Měna:</label><br><input type = "text" name = "mena" class = "box" value=<?php echo "\"".$mena."\""; ?> /><br>
		<input type="hidden" name="typ" value="ADD">
		<input type = "submit" value = " Potvrď "/><br>
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
