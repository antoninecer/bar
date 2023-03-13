<html>
<?php
$hlavicka="Hlavni strana";
include('head.php');
include ('kolackologin.php')
	;?>

<body>
<?php 
include('menu.php'); 

$table='vchody';
if( isset($_GET['sql']) ){
$w=" ".htmlspecialchars($_GET["sql"]);
} else {
$w='';
}     

$celkem='select count(*) as celkem from '.$table.$w;
 
mysqli_close($link);
?>
<p>Vítejte v naší aplikaci, která je určena ke správě odměn a provizí pro tanečnice, hostesky a jiné umělce v nočních klubech.</p>
<br>
<p> V tuto chvíli aplikaci testujeme, proto buďte prosím shovívaví, pokud se objeví nějaká chyba nebo něco nebude fungovat.
<br>
 Naopak budeme velmi rádi, pokud nám případné technické problémy, kterých doufáme, že bude co nejméně, oznámíte a podrobně popíšete, za což vám předem děkujeme.
<br>
<a href="mailto:report@tancovani.com?subject=Problem report!&body=Application has a problem on page ..... when something">Report problem by mail</a>

</p>
</body>
</html>
