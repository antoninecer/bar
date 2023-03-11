<html>
<?php 
$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');

echo "	<h1>Vypis z uctu</h1>";


echo "<br>Cookies<br>";
print_r($_COOKIE);

echo "<br>Session<br>";
print_r($_SESSION);

?>
   </body>
</html>
