<html>
<?php                                                                                                                                                                                                                                                      
include('inc/connect.php')
;$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');
 
echo " <body>";
include ('menu.php');
  if($_SERVER["REQUEST_METHOD"] == "POST") {
		$lastid=0;
    if (($_SESSION['admin'] == 'B' || $_SESSION['admin'] == 'S') && $_POST['typ'] == "ADD" ) {
			/* Start transaction */
			if($_POST['celkem'] != '0') {
#vloz na ucet umelce transakcni fee z klubu
			fee($_POST['uid'],$_SESSION['user_id'],$_SESSION['klub_id']);			


				$sql = "insert into uctenka(umelec_id,cas,barman_id) values (".$_POST['uid'].",now(),".$_SESSION['user_id'].")";
				echo $sql;
				if ($link->query($sql) == TRUE) {
					$sql = "select id from uctenka order by id desc limit 1";
					$result = mysqli_query($link,$sql);
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								$lastid=$row['id'];
							}
						}
					}
					echo "lastid:".$lastid."<br>";
						$sql ="update provize set doklad='".$lastid."' where umelec_id=".$_POST['uid']." and doklad is null";
						echo $sql."<br>";
						$link->query($sql);
			}
			if($_POST['odhlaseni'] == 'odhlasit') {
				$sql="insert into pichacky(klub_id,umelec_id,cas,stav) values (".$_POST['kid'].",".$_POST['uid'].",now(),'stop')";
				echo $sql."<br>";
				$link->query($sql);
			}
		}
	header('Refresh: 4; URL=klubplace.php');	
	}}
  



  $uid=$_GET['uid'];
  $kid=kid($_SESSION['klub']);
#nacteni jestli je umelec prihlaseny, aby se mu mohlo tizit na ucet  
$sql = "select p.cas, p.stav from pichacky p join kluby k on p.klub_id=k.id where umelec_id=".$uid." and k.id='".$kid."' order by p.id desc limit 1" ;
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
#id | klub_id | barman_id | umelec_id | polozka_id | popis                    | cas                 | castka | mena | doklad 
$sql="select * from provize where klub_id=".$kid." and umelec_id=".$uid." and cas >='".$datumposlednihostavu."' and doklad is null";
$celkem=0;
$mena="";
$id=array();
$result = mysqli_query($link,$sql);
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td></tr>";
 
    while($row = mysqli_fetch_array($result)){
      echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td></tr>";
      array_push($id,$row['id']);
			$celkem+=$row['castka'];
      #print_r($row);
      $mena=$row['mena'];
    }
    echo "</table>";
    echo "Celkem:".$celkem.$mena;
  }
} ?>
<hr>
     <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b> Uzavření účtu </b></div>
 
            <div style = "margin:30px">
 
               <form action = "" method = "post">
          <table border="0" cellpadding="1" cellspacing="1" >
         <tr>
          <input type="hidden" name="typ" value="ADD">
          <input type="hidden" name="id" value=<?php echo "'".json_encode($id)."'"; ?>>
          <input type="hidden" name="uid" value=<?php echo "'".$uid."'"; ?>>
          <input type="hidden" name="kid" value=<?php echo "'".$kid."'"; ?>>
          <input type="hidden" name="celkem" value=<?php echo "'".$celkem."'"; ?>>
          <td align="right">Způsob uzavření:</td><td align="left">
          <select name="odhlaseni" id="odhlaseni" align="right">
          <option value="odhlasit">Odhlásit umělce</option>
          <option value="neodhlasovat">Nechat umělce přihlášeného</option>
          </select>
          </td></tr>
 
          <tr><td/><td align="right"><input type = "submit" value = " Potvrď "/>
          </td></tr>
          </table>
               </form>
            </div>
         </div>
      </div><br><br>
<?php
}

 
#konec umelce
?>
</body>
</html>
