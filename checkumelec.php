<?php
 #$sql="select * from kluby where zkratka='".$klub."'";
  #echo $sql."<br>";
  
  #$result = mysqli_query($link,$sql);
  #      if($result = mysqli_query($link, $sql)){
  #              if(mysqli_num_rows($result) > 0){
  #    while($row = mysqli_fetch_array($result)){
	if (!isset($klub) || isset($_SESSION['klub'])) { $klub=$_SESSION['klub']; }
	$kid=kid($klub);
	if (isset($_GET['klub'])){
		$klub=$_GET['klub'];
		echo "<h2>Umělec: <i>".$_SESSION['login_user']."</i> načetl Klub: <i>".$klub."</i></h2>";
	}
	#}}}
#  
$sql = "select p.cas, p.stav from pichacky p join kluby k on p.klub_id=k.id where umelec_id=".$_SESSION['user_id']." and k.zkratka='".$klub."' order by p.id desc limit 1" ;
#$sql="select cas, stav from pichacky where umelec_id=".$_SESSION['user_id']." and klub_id='".$kid."' order by id desc limit 1";
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
#umelec je bud odhlasen, nebo v klubu jeste nebyl
if ($poslednistav=='stop' || $poslednistav=='') {
  echo "<h2>Umělec není přihlášen</h2>";
  echo "<form action = 'check.php' method = 'post'>";
  echo "<input type='hidden' name='typ' value='pichacky'/>";
  echo "<input type='hidden' name='uid' value='".$_SESSION['login_user']."'/>";
  echo "<input type='hidden' name='klub' value='".$klub."'/>";
  echo "<input type='hidden' name='stav' value='start'/>";
  echo "<input type = 'submit' value = 'START'/>"; 
  echo "</form>";
} 
# umelec prihlasen, moznost odhlaseni
if ($poslednistav=='start') {
  echo "<h2>Umělec je přihlášen od ".$datumposlednihostavu."</h2>";
	$_SESSION['klub_id']=$kid;
  echo "<form action = 'check.php' method = 'post'>";
  echo "<input type='hidden' name='typ' value='pichacky'/>";
  echo "<input type='hidden' name='uid' value='".$_SESSION['login_user']."'/>";
  echo "<input type='hidden' name='klub' value='".$klub."'/>";
  echo "<input type='hidden' name='stav' value='stop'/>";
  echo "<input type = 'submit' value = 'STOP'/>"; 
  echo "</form>";



}
#konec umelce
?>
