<?php
	include('session.php');
	require_once('inc/connect.php');
	if ($_SESSION['admin'] == 'Y' or $_SESSION['admin'] == 'S')  {
		$error = "Pridani platby na rok";
	#	print_r($_POST);
	} else {
		$error = "You are not permited to do this!";
		header("Location: logout.php"); 
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($_SESSION['admin'] == 'Y' or $_SESSION['admin'] == 'S') and isset($_POST['rok']) ) {
		$sql = "insert into odpad ( id_vchod, rok) values (".$_POST['id'].",".($_POST['rok']).");";
		echo $sql;
		if ($link->query($sql) == TRUE) {
			$_SESSION['error'] =  "New record created successfully";
		} else {
			$_SESSION['error'] = "Error: ". $link->error;
		}
    	header("Location: odpad.php");
    	} 
    }
?>
<html>  
   
<?php
	include('head.php');
?>
<body>   
      <?php include('menu.php'); ?>
	  <h2 align="center">Platby</h2>
	   <?php
		$radek = 0;
		$rok=date("Y");
	   echo "<table align='center' border=0>";
	   echo "<tr style='background-color: #e0e0eb'><td>Ulice</td><td>Cislo P</td><td>Cislo O</td><td>Rok</td></tr>";
	   if (isset($_GET['id'])) {
		   $id = $_GET['id'];
	   } else {
		   $id=0;
	   }

	
		$sql = "select v.ulice,v.cislop,v.cisloo,o.id,o.rok from vchody v left outer join odpad o on v.id=o.id_vchod where v.id=".$id;
		#echo $sql;
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
				echo "<td>".$row["rok"]."</td>";
				echo "</tr>";
				}	
		}
		?> 
	</table>
	 <hr> 
		 <div align = "center">
         <div style = "width:330px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Přidání platby na rok </b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr> 
				  <input type="hidden" name="typ" value="ADD">
				  <input type="hidden" name="id" value="<?php echo $id; ?>">
				  <td align="right">Placeno na rok :</td><td align="left">
				  <select name="rok" id="rok" align="right">
				  <option value="<?php echo $rok; ?>"><?php echo $rok;?></option>
				  <option value="<?php echo $rok-1; ?>"><?php echo $rok-1;?></option>
				  </select>
                  </td></tr>
				  
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




