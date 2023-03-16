<html>
<?php 
$hlavicka="Přehled o klubu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');
if (isset($_POST['mesic'])){
	$kid=$_SESSION['klub_id'];
	$mesic=$_POST['mesic'];
	$uid=$_SESSION['user_id'];
	$rok=$_POST['rok'];	

	switch ($_SESSION['admin']) {
    case 'Y':
				$sql="select concat(min(DATE_FORMAT(p.cas, \"%d.%m.%Y\")),' - ', max(DATE_FORMAT(p.cas, \"%d.%m.%Y\"))) as obdobi,k.klub,p.popis,count(*) as dokladu,sum(p.castka) as celkem,k.mena from provize p join kluby k on p.klub_id=k.id where p.polozka_id=99999 and month(cas)=".$mesic." and year(cas)=".$rok." group by k.klub,p.popis,k.mena;";
        break;
    case 'S':
				$sql="select concat(min(DATE_FORMAT(p.cas, \"%d.%m.%Y\")),' - ', max(DATE_FORMAT(p.cas, \"%d.%m.%Y\"))) as obdobi,k.klub,p.popis,count(*) as dokladu,sum(p.castka) as celkem,k.mena from provize p join kluby k on p.klub_id=k.id where p.polozka_id=99999 and month(p.cas)=".$mesic." and year(cas)=".$rok." and p.klub_id=".$kid."  group by k.klub,p.popis,k.mena;";
        break;
    case 'U':
				$sql="select concat(min(DATE_FORMAT(p.cas, \"%d.%m.%Y\")),' - ', max(DATE_FORMAT(p.cas, \"%d.%m.%Y\"))) as obdobi,k.klub,p.popis,count(*) as dokladu,sum(p.castka) as celkem,k.mena from provize p join kluby k on p.klub_id=k.id where p.polozka_id=99999 and month(p.cas)=".$mesic." and year(cas)=".$rok."  and p.umelec_id=".$uid."  group by k.klub,p.popis,k.mena;";

        break;
}


#echo $sql;
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){
		echo "<table align='center' border=0><tr style='background-color: #e0e0eb'><th>období</th><th>klub</th><th>popis</th><th>dokladů</th><th>celkem</th><th>měna</th></tr>";
    while($row = mysqli_fetch_array($result)){                              
			echo "<tr><td>".$row['obdobi']."</td><td>".$row['klub']."</td><td>".$row['popis']."</td><td>".$row['dokladu']."</td><td>".$row['celkem']."</td><td>".$row['mena']."</td></tr>";
    }
  echo "</table>";
	}
}
}      

?>
<hr>
 <div align = "center">
         <div style = "width:350px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Výběr období</b></div>
        
            <div style = "margin:15px">
               <form action = "" method = "post">
								<table><tr><td><label>Rok :<label></td><td><select name="rok" id="rok">                                                              
<?php     
  $sql="select distinct(year(cas)) as rok from provize;";                                                  
  $result = $link->query($sql);                                                             
    if ($result->num_rows > 0) {                                                            
      while($row = $result->fetch_assoc()) {                                                
        echo "<option value='".$row['rok']."'>".$row['rok']."</option>";
      }   
    }     
?>        
</select></td><td> 
    <label>Měsíc :<label></td><td>                                 
<select name="mesic" id="mesic">                                                                                                                                  
<?php                                              
  $sql="select distinct(month(cas)) as mesic from provize;";                                                  
  $result = $link->query($sql);                                                             
    if ($result->num_rows > 0) {                                                            
      while($row = $result->fetch_assoc()) {                                                
        echo "<option value='".$row['mesic']."'>".$row['mesic']."</option>";
      }                                            
    }                                              
?>                                                 
</select> </td><td>    
    <input type = "submit" value = " Potvrď "></td></tr></table>
               </form>
            </div>
         </div>
      </div>
<?php 

# tady bude pod vyberem casu pro kazdeho neco jineho, admin bude mit seznam smazanych provizi, aby videl, jestli ho kluby proste neberou na hul a superuser tu bude mit pichacky


if ($_SESSION['admin']=='Y' && isset($_POST['mesic'])) {
echo "<hr>";
echo "<h3 align='center'>Report smazaných provizí</h3>";
$sql = "select k.klub,b.username as barman,t.username as umelec,p.polozka_id,p.popis,p.cas,p.castka,p.mena,u.username as smazal,p.smazano from provizedel p join kluby k on klub_id=k.id join users u on p.smazal=u.id join users b on p.barman_id=b.id join users t on p.umelec_id=t.id where month(p.cas)=".$mesic." and year(cas)=".$rok." order by klub,smazano";

#echo $sql;
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){
		echo "<table align='center' border=0><tr style='background-color: #e0e0eb'><th>klub</th><th>barman</th><th>umělec</th><th>popis</th><th>natíženo</th><th>částka</th><th>měna</th><th>smazal</th><th>smazáno</th></tr>";
    while($row = mysqli_fetch_array($result)){                              
			echo "<tr><td>".$row['klub']."</td><td>".$row['barman']."</td><td>".$row['umelec']."</td><td>".$row['popis']."</td><td>".$row['cas']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td><td>".$row['smazal']."</td><td>".$row['smazano']."</td></tr>";
    }
  echo "</table>";
	}
}
} #konec ifu     


if ($_SESSION['admin']=='S' && isset($_POST['mesic'])) {
echo "<hr>";
echo "<h3 align='center'>Report docházky</h3>";
#select u.username as umelec,p.cas,p.stav from pichacky p join users u on p.umelec_id=u.id;
#| umelec         | cas                 | stav  |
$sql = "select u.username as umelec,p.cas,p.stav from pichacky p join users u on p.umelec_id=u.id where month(p.cas)=".$mesic." and year(cas)=".$rok." order by u.username,cas";
#select k.klub,b.username as barman,t.username as umelec,p.polozka_id,p.popis,p.cas,p.castka,p.mena,u.username as smazal,p.smazano from provizedel p join kluby k on klub_id=k.id join users u on p.smazal=u.id join users b on p.barman_id=b.id join users t on p.umelec_id=t.id where month(p.cas)=".$mesic." and year(cas)=".$rok." order by klub,smazano";

#echo $sql;
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){
		echo "<table align='center' border=0><tr style='background-color: #e0e0eb'><th>umělec</th><th>čas</th><th>stav</th></tr>";
    while($row = mysqli_fetch_array($result)){                              
			echo "<tr><td>".$row['umelec']."</td><td>".$row['cas']."</td><td>".$row['stav']."</td></tr>";
    }
  echo "</table>";
	}
}
} #konec ifu     

?>
   </body>
</html>
