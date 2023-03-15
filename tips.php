<html>
<?php 
$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');
#print_r($_SESSION);
echo "<h2>Výpis z účtu</h2><hr>";
echo "Uzavřené účty za posledních 12 hodin:<br>";
#nacteni predchozich uctenek
# id | umelec_id | cas                 | barman_id |
#ukaz kunde jen uctenky za poslednich 12 hodin
$sql="select * from uctenka where umelec_id=".$_SESSION['user_id']." and TIMESTAMPDIFF(MINUTE,cas,now()) < 720";
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
if(mysqli_num_rows($result) > 0){
		echo "<table><tr><th align='left'>vystavena</td></tr>";                             
    while($row = mysqli_fetch_array($result)){                              
      echo "<tr><td><a href='doklad.php?id=".$row['id']."'>".$row['cas']."</a></td></tr>";
    }
		echo "</table>";
  }
}      
echo "<hr>Seznam nevypořádaných položek:";
$sql="select k.klub,p.popis, p.cas, p.castka,p.mena from provize p join kluby k on p.klub_id=k.id where p.umelec_id=".$_SESSION['user_id']." and p.doklad is null order by k.klub,p.id"; 
#| klub | popis     | cas                 | castka | mena |


$celkem=0;
$mena="";
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
    echo "<table><tr style='background-color: #e0e0eb'><td>klub</td><td>datum</td><td>popis</td><td>částka</td><td>měna</td></tr>";  
  
    while($row = mysqli_fetch_array($result)){                              
      echo "<tr><td>".$row['klub']."</td><td>".$row['cas']."</td><td>".$row['popis']."</td><td align='right'>".number_format($row['castka'],2,',','')."</td><td>".$row['mena']."</td></tr>";
      $celkem+=$row['castka'];
      #print_r($row);
      $mena=$row['mena'];
    }
    echo "</table>";       
    echo "Celkem: <b>".number_format($celkem,2,',','').$mena."</b>";                                                  
  }                                                           
}              


 
#nacteni jestli je umelec prihlaseny, aby se mu mohlo tizit na ucet  
#$sql = "select p.cas, p.stav from pichacky p join kluby k on p.klub_id=k.id where umelec_id=".$_SESSION['user_id']." and k.id='".$_SESSION['klub_id']."' order by p.id desc limit 1" ;
#echo $sql; 
# zjisteni co bylo naposled jestli nic, start, nebo stop
#$poslednistav='';
#$datumposlednihostavu='';
#$result = mysqli_query($link,$sql);                                         
#if($result = mysqli_query($link, $sql)){                              
#  if(mysqli_num_rows($result) > 0){                             
#    while($row = mysqli_fetch_array($result)){                              
#      $poslednistav=$row['stav'];
#      $datumposlednihostavu=$row['cas'];
#    }
#  }
#}      
 
#kdyz neni umelec prihlasen, nepujde na nej tizit
#if ($poslednistav=='stop' || $poslednistav=='') {
#  echo "<h2>Umělec není přihlášen - pozadej jej o prihlaseni</h2><br>";
#  echo "v menu stiskni QR kod a vygenerujes pro umelce prihlasovaci sekvenci<br>";
#  echo " po prihlaseni umelce proved znovu nascanovani jeho QR kodu<br>";
#} 
#kdyz je umelec prihlasen pujde tizit
#if ($poslednistav=='start') {
  #echo "<h2>Umělec je přihlášen od ".$datumposlednihostavu."</h2>";
#id | klub_id | barman_id | umelec_id | polozka_id | popis                    | cas                 | castka | mena | doklad 
#$sql="select * from provize where klub_id=".$_SESSION['klub_id']." and umelec_id=".$_SESSION['user_id']." and doklad is null";
#$celkem=0;
#$mena="";
#$result = mysqli_query($link,$sql);                                         
#if($result = mysqli_query($link, $sql)){                              
#  if(mysqli_num_rows($result) > 0){                             
#		echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td></tr>";	
#	
#		while($row = mysqli_fetch_array($result)){                              
#			echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td></tr>";
#			$celkem+=$row['castka'];
			#print_r($row);
#			$mena=$row['mena'];
#		}
#		echo "</table>";       
#		echo "Celkem:".$celkem.$mena;                                                  
#  }                                                           
#}                 
#include('checkumelec.php');
#}
?>
<hr>   </body>
</html>
