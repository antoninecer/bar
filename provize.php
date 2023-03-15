<?php
	include('session.php');
	require_once('inc/connect.php');
	if ($_SESSION['admin'] == 'Y'|| $_SESSION['admin']=='S') {
		$error = "Přidání provizní položky klubu";
	} else {
		$error = "Na toto nemáte oprávnění!";
		header('Location:index.php');
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') && $_POST['typ'] == "ADD" ) {
			$kid=kid($_POST['klub']);

			$mena=mena($kid);
			$sql = "insert into proviznipolozky (klub_id,aktivni,obrazek,popis,castka,mena) values ('".$kid."',true,'".$_POST['obrazek']."','".$_POST['popis']."','".$_POST['castka']."','".$mena."');";
			#echo $sql;
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
	include('head.php');
?>
<body>   
      <?php include('menu.php'); ?>
	  <h2 align="center">Provizní položky</h2>
	   <?php
	   $radek = 0;
	   echo "<table align='center' border=0>";
	   echo "<tr style='background-color: #e0e0eb'><td>klub</td><td>obrázek</td><td>popis</td><td>částka</td><td>měna</td>"; 
		if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S')){
					echo "<td>upravit</td>";
				 } else {echo "<td></td>";}
				if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
				echo "<td>smazat</td>";}
		   
		   echo "</tr>";
	   $w="";
	   if($_SESSION['admin']=='S') { $w="where k.zkratka='".$_SESSION['klub']."'"; }
	
		$sql = "SELECT p.id as id,k.zkratka as klub,p.aktivni as aktivni,p.obrazek as obrazek,p.popis as popis,p.castka as castka,p.mena as mena  FROM proviznipolozky p join kluby k on p.klub_id=k.id ".$w." order by klub_id,id";
		
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
				#echo "<td>".$row["aktivni"]."</td>";
        echo "<td><img src='".$row['obrazek']."'  width='32' height='32'  /></td>";
				echo "<td>".$row["popis"]."</td>";
				echo "<td align='right'>".$row["castka"]."</td>";
				echo "<td>".$row["mena"]."</td>";
				//echo "<td>".$row["admin"]."</td>";
				if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S' )){
					echo "<td><a href='polozkaedit.php?id=".$row["id"]."'><img src='img/edit16.png' title='Úprava položky'></a></td>";
				 } else {echo "<td></td>";}
				if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
				echo "<td>";
				    echo "<a href='polozkadel.php?id=".$row["id"]."'><img src='img/delete16.png' title='Smazat'></a>";
					}
				echo "</td>";}
				echo "</tr>";
				}	
		
		$kluby=[];
		$w="";
		if($_SESSION['admin']=='S') { $w=" where zkratka='".$_SESSION['klub']."'"; } 
		$sqlkluby="select distinct(zkratka) as klub from kluby".$w;
		$result = $link->query($sqlkluby);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
			array_push($kluby,$row['klub']);
			}}
		?> 
	</table>
<?php if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S')){?>	 <hr> 
		 <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Přidání provizní položky klubu </b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr>
<td>
<?php               
$images = glob('img/menu/*.{jpeg,gif,png}', GLOB_BRACE);
foreach ($images as $image){                                                                                                                                                                                                                                                  
  echo "<img src='".$image."' width='32' height='32'  />";
  echo "<input type='radio' name='obrazek' value='".$image."'>";
}
?>
</td><td><table border='0' cellpadding='1' cellspacing='1'>
<tr>
<td align="right">Klub</td><td align="left"><select name = "klub" />
<?php foreach ($kluby as $klub) { echo "<option value='".$klub."'>".$klub."</option>";}
?></select>
</td> </tr>
				 <tr><td align="right">Aktivní</td><td align="left"><input type = "checkbox" name = "aktivni" checked /></td> </tr>
				 <tr>
</td>
				 <tr><td align="right">Popis</td><td align="left"><input type = "text" name = "popis" /></td> </tr>
				 <tr><td align="right">Cástka</td><td align="left"><input name="castka" pattern="^\d*(\.\d{0,2})?$" />
				  <input type="hidden" name="typ" value="ADD"> 
				  <tr><td/><td align="right"><input type = "submit" value = " Potvrď "/>
				  </td></tr>
				  </table></td></tr></table>

               </form>
			 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div> </div> </div>	  
<?php } ?>
   </body>
   
</html>




