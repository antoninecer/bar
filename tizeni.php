<?php
require_once('./inc/connect.php');
include ('kolackologin.php');
include ('head.php'); 
include('menu.php');                         
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['typ'] == "ADD" ) {
#echo "POST <br>";     
#print_r($_POST);  
#echo "<br>Session <br>";
#print_r($_SESSION);    
#echo "<brGET<br>";
#print_r($_GET);

      #$kid=kid($_SESSION['klub']);
			$kid=$_POST['kid'];
			$uid=$_POST['uid'];
			$pid=$_POST['pid'];
			$popis="";
			$castka="";
			$mena="";

$sql="select * from proviznipolozky where id=".$pid;
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
    while($row = mysqli_fetch_array($result)){                              
      $popis=$row['popis'];
      $castka=$row['castka'];
			$mena=$row['mena'];
    }
  }
}      


 $sqli = "insert into provize (klub_id,barman_id,umelec_id,polozka_id,popis,cas,castka,mena) values (".$kid.",".$_SESSION['user_id'].",".$uid.",".$pid.",'".$popis."',now(),".$castka.",'".$mena."')";
      #echo $sqli;    
      echo "<h2 style='color:red;'>".insert($sqli)."</h2>";
			header("Refresh: 2; URL=check.php?utyp=U&uid=".$uid."&klub=".$_SESSION['klub']); 
	}                 
}                     
$uid=$_GET['uid']; #umelec komu se bude tizit
$kid=$_GET['kid']; #idklubu polozky
$pid=$_GET['pid']; #polozka


#nacteni jestli je umelec prihlaseny, aby se mu mohlo tizit na ucet  
$sql = "select p.cas, p.stav from pichacky p join kluby k on p.klub_id=k.id where umelec_id=".$uid." and k.zkratka='".$_SESSION['klub']."' order by p.id desc limit 1" ;
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
  echo "<h2>Umělec je přihlášen od ".$datumposlednihostavu."</h2>";

$sql="select * from proviznipolozky where id=".$pid;                                                                                                                               
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                                   
  if(mysqli_num_rows($result) > 0){                                        
    while($row = mysqli_fetch_array($result)){                              
      $popis=$row['popis'];                         
      $castka=$row['castka'];                       
      $mena=$row['mena'];                           
    }                                               
  }                                                 
} 
echo "Na ucet umelce ".$uid." jde ".$popis." za ".$castka.$mena;

 if($_SERVER["REQUEST_METHOD"] != "POST") {
?>

  <div style = "margin:30px">
               <form action = "" method = "post">
    <input type="hidden" name="typ" value="ADD">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
    <input type="hidden" name="kid" value="<?php echo $kid; ?>">
    <input type = "submit" value = " Potvrď "/><br>
               </form>
            </div>

<?php
}
                                                                                                                                       
# $sqli = "insert into provize (klub_id,barman_id,umelec_id,polozka_id,popis,cas,castka,mena) values (".$_POST['kid'].",".$_SESSION['user_id'].",".$_POST['uid'].",".$_POST['pid'].",'".$popis."',now(),".$castka.",'".$mena."')";

}
#konec tizeni
?>
