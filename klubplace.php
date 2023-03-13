<html>
<?php 
$hlavicka="Přehled o klubu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');
echo "	<h1>Umělci v klubu:</h1>";
$sql="select p.umelec_id,max(p.cas) as cas,u.username,max(p.id) as max from pichacky p join users u on p.umelec_id=u.id where klub_id=".$_SESSION['klub_id']." group by p.umelec_id,u.username";
#select p.umelec_id,p.stav,p.cas,u.username from pichacky p join users u on p.umelec_id=u.id  where klub_id=".$_SESSION['klub_id']." group by umelec_id having max(p.id)";
#echo $sql;
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){                              
      if(stav($_SESSION['klub_id'],$row['umelec_id']) == 'start'){
				echo "<h3>Umělec <a href='check.php?uid=".$row['umelec_id']."&utyp=U'>".$row['username']." Přihlášen od:".$row['cas']."</a></h3>";
			#sem musim vmestnat vypis neuzavrenych polozek umelce
				neuzavrene($_SESSION['klub_id'],$row['umelec_id'],$row['cas']);

			}


    }
  }
}      
#pro managery vypis uctenek z jejich klubu
if ($_SESSION['admin']=='S'){
	echo "<h3>Uzavřené doklady</h3>";
	$sql="select distinct(p.doklad) as doklad,u.cas  from provize p join uctenka u on p.doklad=u.id where p.doklad is not null and p.klub_id=".$_SESSION['klub_id'];
	$result = mysqli_query($link,$sql);            
	if($result = mysqli_query($link, $sql)){       
		if(mysqli_num_rows($result) > 0){            
			echo "<table><tr><th align='left'>vystavena</td></tr>";
			while($row = mysqli_fetch_array($result)){                              
				echo "<tr><td><a href='doklad.php?id=".$row['doklad']."'>".$row['cas']."</a></td></tr>";
			}                                          
			echo "</table><hr>";                       
		}                                            
	}                                              
}

?>
   </body>
</html>
