<html>                                                                                                                                                                                                           
<?php
include('inc/connect.php')
;$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');
 
echo " <body>";
include ('menu.php');


	$uid=$_GET['uid'];
	$kid=$_SESSION['klub'];
echo "<h2>".$uid.$kid."</h2><br>";

#konec umelce
?>
</body>
</html>
