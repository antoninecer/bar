<?php
	include('session.php');
	require_once('inc/connect.php');
	if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
		$error = "Přidání uživatele";
	} else {
		$error = "Na toto nemáte oprávnění!";
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') && $_POST['typ'] == "ADD" ) {
		$sql = "insert into users ( username, club, password, email, admin) values ('".$_POST['username']."','".$_POST['klub']."','".safe_b64encode($_POST['password'])."','".$_POST['email']."','".strtoupper($_POST['admin'])."');";
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
	include('head.php');
?>
<body>   
      <?php include('menu.php'); ?>
	  <h2 align="center">Users</h2>
	   <?php
	   $radek = 0;
	   echo "<table align='center' border=0>";
	   echo "<tr style='background-color: #e0e0eb'><td>Username</td><td>klub</td><td>Email</td><td>Rights</td><td>Password</td>";
	   if ($_SESSION['admin'] == 'Y' ||$_SESSION['admin'] == 'S' ) { echo "<td>Delete</td>"; }
	   echo "</tr>";
  		$w=""; 
			
		if ($_SESSION['admin']=='S') { $w="where club='".$_SESSION['klub']."'"; }

	   $sql = "SELECT *  FROM users ".$w." order by username";
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
				echo "<td>".$row["username"]."</td>";
				echo "<td>".$row["club"]."</td>";

				echo "<td>".$row["email"]."</td>";
				echo "<td>";
				switch ($row["admin"]) {
					case 'U':
						echo "Umělec";
						break;
					case 'B':
						echo "Barman";
						break;
					case 'Y':
						echo "Administrátor";
						break;
					case 'S':
						echo "Super Uživatel";
						break;
				}
				echo "</td>";
				//echo "<td>".$row["admin"]."</td>";
				if (($_SESSION['admin']=='Y') || ($_SESSION['admin']=='S' )){
					echo "<td><a href='useredit.php?id=".$row["id"]."'><img src='img/edit16.png' title='Edit user'></a></td>";
				 } else {echo "<td></td>";}
				if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
				echo "<td>";
				if ($row["username"] == $_SESSION['login_user']) {
					echo "<img src='img/user16.png' title='Nelze smazat sebe sama' >";
					} 
				else { 
				    echo "<a href='userdel.php?id=".$row["id"]."'><img src='img/delete16.png' title='Smazat'</a>";
					}
				echo "</td>";}
				echo "</tr>";
				}	
		}
		$kluby=[];

  		$w=""; 
 	   	if ($_SESSION['admin']=='S') { $w=" where zkratka='".$_SESSION['klub']."'"; }
 	   	if ($_SESSION['admin']=='Y') { array_push($kluby,""); }
		$sqlkluby="select distinct(zkratka) as klub from kluby".$w;
		$result = $link->query($sqlkluby);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
			array_push($kluby,$row['klub']);
			}}
		?> 
	</table>
	 <hr> 
		 <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Přidání uživatele </b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr>
                  <td align="right">Uživatel :</td><td align="left"><input type = "text" name = "username" /></td>
				 </tr>
				 <tr>
		  <td align="right">Klub :</td><td align="left">
                                  <select name="klub" align="right">
				<?php
				foreach ($kluby as $klub) {
					echo "<option value='".$klub."'>".$klub."</option>";
				}?>				 

				  </select>


</tr>
				 <tr>
                  <td align="right">Email :</td><td align="left"><input type = "text" name = "email" /></td>
				 </tr>
				 <tr> 
                  <td align="right">Heslo :</td><td align="left"><input type = "password" name = "password" /></td>
				 </tr>
				 <tr> 
				  <input type="hidden" name="typ" value="ADD">
				  <td align="right">Oprávnění :</td><td align="left">
				  <select name="admin" id="admin" align="right">
					<option value="U">Umělec</option>
					<option value="B">Barman</option>
				  <?php if ($_SESSION['admin'] == 'Y') {?> 
					<option value="Y">Administráator</option>
					<option value="S" selected>Super Uživatel</option> <?php } ?>
				  </select>
                  </td></tr>
				  
				  <tr><td/><td align="right"><input type = "submit" value = " Potvrď "/>
				  </td></tr>
				  </table>
               </form>
			 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				
            </div>
				
         </div>
			
      </div>	  
   </body>
   
</html>




