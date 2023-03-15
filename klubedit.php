<?php
	include('session.php');
	require_once('inc/connect.php');
	$navrat=FALSE;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$stranka = 'clubs.php';
		$nacti= "SELECT * FROM kluby where id=".$_GET['id'];
		$result = $link->query($nacti);
                if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$klub=$row['zkratka'];
			}}
 		if ((($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S' && $_SESSION['klub']==$klub )) && ($_POST['typ']=='ADD')) {
			$sql = "update kluby set klub ='".$_POST['klub']."', popis='".$_POST['popis']."',kontakt='".$_POST['kontakt']."',ulice='".$_POST['ulice']."',mesto='".$_POST['mesto']."',zeme='".$_POST['zeme']."', mena='".$_POST['mena']."' , fee=".$_POST['fee']." where id = ".$_GET['id'];
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
	  <link rel="icon" href="img/monitor.png">
   </head>
   <body>   
		<?php
		include('menu.php');
		?>
		<h1 align="center">Úprava klubu </h1>
		<?php
		$sql = "SELECT * FROM kluby where id = ".$_GET['id'];
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				# klub                | zkratka | kod    | popis      | kontakt           | ulice                | mesto      | zeme      |
				$klub=$row["klub"];
				$popis=$row["popis"];
				$kontakt=$row["kontakt"];
				$ulice=$row["ulice"];
				$mesto=$row["mesto"];
				$zeme=$row["zeme"];
				$zkratka=$row["zkratka"];
				$fee=$row['fee'];
				$mena=$row['mena'];
			echo "<center><h2>".$klub.":".$zkratka."</h2></center> <br>";
			}
		}	
		?>
		<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Úprava klubu</b></div>
				
            <div style = "margin:30px">
               <form action = "" method = "post">
	       	<label>Název klubu:</label><br><input type = "text" name = "klub" class = "box" value=<?php echo "\"".$klub."\""; ?> /><br>
		<label>Popis:</label><br><input type = "text" name = "popis" class = "box" value=<?php echo "\"".$popis."\""; ?> /><br>
		<label>Kontaktní údaje:</label><br><input type = "text" name = "kontakt" class = "box" value=<?php echo "\"".$kontakt."\""; ?> /><br>
		<label>ulice:</label><br><input type = "text" name = "ulice" class = "box" value=<?php echo "\"".$ulice."\""; ?> /><br>
		<label>Město:</label><br><input type = "text" name = "mesto" class = "box" value=<?php echo "\"".$mesto."\""; ?> /><br>
		<label>Stát:</label><br><input type = "text" name = "zeme" class = "box" value=<?php echo "\"".$zeme."\""; ?> /><br>
		<?php if ($_SESSION['admin'] == 'Y'){
			echo "<label>Transakční provize:</label><br><input type = \"text\" name = \"fee\" class = \"box\" value=\"".$fee."\" /><br>";
		}?>
    <label>Měna :<label><br>                                 
<select name="mena" id="mena">                                                              
<?php     
  $sql="select * from meny order by mena";                                                  
  $result = $link->query($sql);                                                             
    if ($result->num_rows > 0) {                                                            
      while($row = $result->fetch_assoc()) {                                                
        echo "<option value='".$row['mena']."'";
				if ($row['mena'] == $mena) { echo " selected";}
				echo ">".$row['mena']." - ".$row['popis']."</option>";
      }   
    }     
?>        
</select> 
                



		<input type="hidden" name="typ" value="ADD">
		<input type = "submit" value = " Potvrď "/><br>
               </form>
            </div>
         </div>
      </div>
   </body>   
</html>
