<html>
<?php 
$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');
#print_r($_SESSION);
echo "	<h1>Vypis z uctu</h1>";
#nacteni predchozich uctenek
# id | umelec_id | cas                 | barman_id |
$sql="select * from uctenka where umelec_id=".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){
		echo "<table><tr><th align='left'>vystavena</td></tr>";                             
    while($row = mysqli_fetch_array($result)){                              
      echo "<tr><td><a href='doklad.php?id=".$row['id']."'>".$row['cas']."</a></td></tr>";
    }
		echo "</table><hr>";
  }
}      
 
#nacteni jestli je umelec prihlaseny, aby se mu mohlo tizit na ucet  
$sql = "select p.cas, p.stav from pichacky p join kluby k on p.klub_id=k.id where umelec_id=".$_SESSION['user_id']." and k.id='".$_SESSION['klub_id']."' order by p.id desc limit 1" ;
#echo $sql; 
# zjisteni co bylo naposled jestli nic, start, nebo stop
$poslednistav='';
$datumposlednihostavu='';
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
    while($row = mysqli_fetch_array($result)){                              
      $poslednistav=$row['stav'];
      $datumposlednihostavu=$row['cas'];
    }
  }
}      
 
#kdyz neni umelec prihlasen, nepujde na nej tizit
if ($poslednistav=='stop' || $poslednistav=='') {
  echo "<h2>Umělec není přihlášen - pozadej jej o prihlaseni</h2><br>";
  echo "v menu stiskni QR kod a vygenerujes pro umelce prihlasovaci sekvenci<br>";
  echo " po prihlaseni umelce proved znovu nascanovani jeho QR kodu<br>";
} 
#kdyz je umelec prihlasen pujde tizit
if ($poslednistav=='start') {
  #echo "<h2>Umělec je přihlášen od ".$datumposlednihostavu."</h2>";
#id | klub_id | barman_id | umelec_id | polozka_id | popis                    | cas                 | castka | mena | doklad 
$sql="select * from provize where klub_id=".$_SESSION['klub_id']." and umelec_id=".$_SESSION['user_id']." and cas >='".$datumposlednihostavu."'";
$celkem=0;
$mena="";
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
		echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td></tr>";	
	
		while($row = mysqli_fetch_array($result)){                              
			echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td></tr>";
			$celkem+=$row['castka'];
			#print_r($row);
			$mena=$row['mena'];
		}
		echo "</table>";       
		echo "Celkem:".$celkem.$mena;                                                  
  }                                                           
}                 
include('checkumelec.php');
}
?>
   </body>
</html>
