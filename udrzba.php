<html>
<?php 
$hlavicka="Vypis z uctu";
include ('kolackologin.php');
include ('head.php');

echo " <body>";
include ('menu.php');
echo "vyresetovani Umelcu k prislusnosti ke klubum";
insert("update users set club='' where admin='U'");

?>
   </body>
</html>
