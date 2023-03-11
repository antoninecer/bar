<html>
<?php
include ('kolackologin.php');
include ('session.php');
include('head.php');
?>

<body>
<?php 
require_once('./inc/connect.php'); 
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
Jak naše aplikace funguje<br>
<br>
Nastavení a založení podniku v systému<br>
Administrátor zaregistruje kub na základě jeho žádosti, kdy tento poskytne své základní kontaktní údaje k tomu nutné. Jde o Název a adresu podniku, email, telefon, <br>
popis podniku a případně požadovaná uživatelská jména. NAstaví se login a heslo pro Superuživatele (SuperUser)<br>
<br>
Nastavení uživatelů<br>
Nastavení dalších uživatelů si provede Superuživatel podniku (majitel / manažer). Superuživatel nemusí být v podniku jen jeden. Tuto osobu zakládá vždy Administrátor na základě autorizovaného požadavku Superuživatele či osoby, oprávněné jednat za podnik, a to z už známého tel. čísla nebo emailu. Administrátor může takový požadavek dále prověřit než jej realizuje.<br>
Superuživatel zakládá v podniku uživatelské účty nižší úrovně (barman a umělec). Může také měnit jeich hesla nebo uživatele nižší úrovně mazat.<br>
<br>
Přihlášení<br>
Barman a umělec se přihlašují jen a pouze načtením QR kódu, umístěného v podniku na neveřejném místě (za barem, v šatně, atp.), Superuživatel  se může přihlásit odkudkoliv, a to i jménem (login) a heslem (password nebo PSW).<br>
<br>
První přihlášení<br>
Při prvním přihlášení musí každý uživatel zadat jméno a heslo. <br>
Systém si zapamatuje přihlášené zařízení a napříště pro něj heslo vyžadovat nebude. <br>
Platnost zapamatování zařízení bude 1 rok. <br>

Platnost jednoho přihlášení bude 12 hodin. Poté bude nutné se znovu přihlásit viz bod 3. a 4.a.<br>
<br>
Cíle a výhody používání aplikace<br>
<br>
Primárním cílem je zpřehlednit výplaty a odměn a provizí umělcům v nočních klubech a tedy zamezit např. nechtěné ztrátě žetonů, kartiček nebo dolarů v průběhu večera a transparentností jejich dočasné evidence (nejméně do konce pracovní doby a realizace jejich vyplacení) zabránit případným sporům umělců a obslužného personálu.<br>
Umělci i obslužný personál uvidí online na svých zařízeních aktuální výdělky.<br>
<br>
</body>
</html>
