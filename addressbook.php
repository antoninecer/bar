<?php
	include('session.php');
	require_once('inc/connect.php');
	if ($_SESSION['admin'] == 'Y') {
		$error = "Add address";
	} else {
		$error = "You are not Administrator!";
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['admin'] == 'Y' || $_POST['typ'] == "ADD" ) {
		$sql = "insert into vchody ( ulice, cislop, cisloo) values ('".$_POST['ulice']."','".$_POST['cislop']."','".$_POST['cisloo']."');";
		//echo $sql;
		if ($link->query($sql) == TRUE) {
			$_SESSION['error'] =  "New record created successfully";
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
	  <h2 align="center">Adresy</h2>
	   <?php
	   $radek = 0;
	   echo "<table align='center' border=0>";
	   echo "<tr style='background-color: #e0e0eb'><td>Ulice</td><td>Cislo Popisne</td><td>Cislo Orientacni</td><td>Delete</td></tr>";
   
	
		$sql = "SELECT id,ulice,cislop,cisloo FROM vchody order by ulice,cislop";
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
				echo "<td>".$row["ulice"]."</td>";
				echo "<td>".$row["cislop"]."</td>";
				echo "<td>".$row["cisloo"]."</td>";
				echo "<td>";
			    	echo "<a href='vchodydel.php?id=".$row["id"]."'><img src='img/delete16.png' title='Delete'</a>";
				echo "</td>";
				echo "</tr>";
				}	
		}
		?> 
	</table>
	 <hr> 
		 <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Pridani nove adresy </b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr>
                  <td align="right">Ulice :</td><td align="left"><input type = "text" name = "ulice" /></td>
				 </tr>
				 <tr>
                  <td align="right">Cislo Popisne :</td><td align="left"><input type = "text" name = "cislop" /></td>
				 </tr>
				 <tr> 
                  <td align="right">Cislo Orientacni :</td><td align="left"><input type = "text" name = "cisloo" /></td>
				 </tr>
				 <tr> 
				  <input type="hidden" name="typ" value="ADD">
				  <tr><td/><td align="right"><input type = "submit" value = " Submit "/>
				  </td></tr>
				  </table>
               </form>
			 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				
            </div>
				
         </div>
			
      </div>	  
   </body>
   
</html>




