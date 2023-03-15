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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Report transakčních poplatků</b></div>
        
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


   </body>
</html>
