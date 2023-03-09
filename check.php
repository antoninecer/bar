<html>
<?php
require_once('./inc/connect.php');
include ('kolackologin.php');
include ('head.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['typ'] == "pichacky" ) {
echo "POST <br>";
		print_r($_POST);
echo "<br>Session <br>";
print_r($_SESSION);						
			$kid=kid($_POST['klub']);
      $sqli = "insert into pichacky (klub_id,umelec_id,cas,stav) values (".$kid.",".$_SESSION['user_id'].",now(),'start')";
      #echo $sqli;
			echo insert($sqli);
		}
}
?>
   <body>
<?php
include('menu.php');
$utyp=isset($_GET['utyp'])? $_GET['utyp'] : 0;
$uid=isset($_GET['uid'])? $_GET['uid'] : 0;
$klub=isset($_GET['klub'])? $_GET['klub'] : 0;
$uname="";
#tady budou bloky Barman Nacte Umelce, Umelec nacte Klub, Spravce nacte Umelce, Spravce nacte Barmana

if ($_SESSION['admin'] == 'B' && $utyp=='U') {
	include('checkbarman.php');
}


if ($_SESSION['admin'] == 'S' && $utyp=='U') {
	$sql="select * from users where id=".$uid;
	#echo $sql."<br>";
	
	$result = mysqli_query($link,$sql);
        if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
	echo "<h2>Super User: ".$_SESSION['login_user']." nacetl umelce: ".$row['username']."</h2>";
}}}
echo " tady bude nevim co";


}


# umelec nacte QR klubu
if ($_SESSION['admin'] == 'U' && $klub!==0) {
	include ('checkumelec.php');
}



?>
   </body>
</html>
