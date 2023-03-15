<?php
	include('session.php');
	require_once('inc/connect.php');
	if ($_SESSION['admin'] == 'Y'|| $_SESSION['admin']=='S') {
		$error = "Úprava klubu";
	} else {
		$error = "Na toto nemáte oprávnění!";
		header('Location:index.php');
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($_SESSION['admin'] == 'Y' ) && $_POST['typ'] == "ADD" ) {
		$sql = "insert into kluby (klub,zkratka,kod,popis,kontakt,ulice,mesto,zeme,mena) values ('".$_POST['klub']."','".$_POST['zkratka']."','".$_POST['kod']."','".$_POST['popis']."','".$_POST['kontakt']."','".$_POST['ulice']."','".$_POST['mesto']."','".$_POST['zeme']."','".$_POST['mena']."');";
		//echo $sql;
		if ($link->query($sql) == TRUE) {
			$_SESSION['error'] =  "Nový záznam přidán";
		} else {
			$_SESSION['error'] = "Error: ". $link->error;
		}
	} 
    }
?>
<html>  
   
<?php
	$hlavicka="Kluby";
	include('head.php');
?>
<body>   
      <?php include('menu.php'); ?>
	  <h2 align="center">Kluby</h2>
	   <?php
	   $radek = 0;
#echo "<br>session<br>";
#print_r($_SESSION);
#echo "<br>cookie<br>";
#print_r($_COOKIE);



	   echo "<table align='center' border=0>";
	   echo "<tr style='background-color: #e0e0eb'><td>klub</td><td>zkratka</td><td>kód</td><td>popis</td><td>kontakt</td><td>ulice</td><td>město</td><td>země</td><td>měna</td>"; 
#jestli je admin, nebo superuser zobraz sloupecek uprav
		if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S' )){
					echo "<td>upravit</td>";
				 } else {echo "<td></td>";}
				if ($_SESSION['admin'] == 'Y') {
				echo "<td>smazat</td>";}
		   
		   echo "</tr>";
	   $w="";
	   if($_SESSION['admin']=='S') { $w="where zkratka='".$_SESSION['klub']."'"; }
	
		$sql = "SELECT *  FROM kluby ".$w." order by klub";
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$radek = $radek + 1;
				if ($radek % 2 == 0) { 
					echo "<tr>";
				 #	style='background-color: #f0f0f5'>"; 
				  } 
				else {  
				  echo "<tr style='background-color:  #ffffff'>";
				  }
				echo "<td>".$row["klub"]."</td>";
				echo "<td>".$row["zkratka"]."</td>";
				echo "<td>".$row["kod"]."</td>";
				echo "<td>".$row["popis"]."</td>";
				echo "<td>".$row["kontakt"]."</td>";
				echo "<td>".$row["ulice"]."</td>";
				echo "<td>".$row["mesto"]."</td>";
				echo "<td>".$row["zeme"]."</td>";
				echo "<td>".$row["mena"]."</td>";

				//echo "<td>".$row["admin"]."</td>";
				if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S')){
					echo "<td><a href='klubedit.php?id=".$row["id"]."'><img src='img/edit16.png' title='Password'></a></td>";
				 } else {echo "<td></td>";}
				if ($_SESSION['admin'] == 'Y') {
				echo "<td>";
				if ($row["zkratka"] == $_SESSION['klub']) {
					echo "<img src='img/user16.png' title='Nelze smazat sebe sama' >";
					} 
				else { 
				    echo "<a href='clubdel.php?id=".$row["id"]."'><img src='img/delete16.png' title='Smazat'</a>";
					}
				echo "</td>";}
				echo "</tr>";
				}	
		}
		$kluby=[];
		array_push($kluby,"");
		$sqlkluby="select distinct(zkratka) as klub from kluby";
		$result = $link->query($sqlkluby);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
			array_push($kluby,$row['klub']);
			}}
		?> 
	</table>
<?php if ($_SESSION['admin']=='Y'){?>	 <hr> 
		 <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Přidání klubu </b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr><td align="right">Klub :</td><td align="left"><input type = "text" name = "klub" /></td> </tr>
				 <tr><td align="right">Zkratka :</td><td align="left"><input type = "text" name = "zkratka" /></td> </tr>
				 <tr><td align="right">Kód :</td><td align="left"><input type = "text" name = "kod" /></td> </tr>
				 <tr><td align="right">Popis :</td><td align="left"><input type = "text" name = "popis" /></td> </tr>
				 <tr><td align="right">Kontakt :</td><td align="left"><input type = "text" name = "kontakt" /></td> </tr>
				 <tr><td align="right">Ulice :</td><td align="left"><input type = "text" name = "ulice" /></td> </tr>
				 <tr><td align="right">Město :</td><td align="left"><input type = "text" name = "mesto" /></td> </tr>
				 <tr><td align="right">Země :</td><td align="left"><input type = "text" name = "zeme" /></td> </tr>
				 <tr><td align="right">Měna :</td><td align="left">
<select name="mena" id="mena">
<?php
	$sql="select * from meny order by mena";
	$result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['mena']."'>".$row['mena']." - ".$row['popis']."</option>";
			}
		}
?>
</select>

				  <input type="hidden" name="typ" value="ADD"> 

				  <tr><td/><td align="right"><input type = "submit" value = " Potvrď "/>
				  </td></tr>
				  </table>
               </form>
			 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div> </div> </div>	  
<?php } ?>
   </body>
   
</html>




