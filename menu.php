<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
if (!isset($_SESSION)) {
ini_set( "session.cookie_lifetime",0 );
session_start();
}


?>
<script type="text/javascript">
	function googleTranslateElementInit() {
        	new google.translate.TranslateElement({ pageLanguage: 'cs' }, 'google_translate_element'); }
</script>
<script type="text/javascript">
        var userId = '';
        var ajaxUrl = 'ajax.php';
        var urlPrefix = '';
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<sub>&copy; 2014<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, LLF CZECH LIMITED&nbsp;&reg;&nbsp;&nbsp;All rights reserved.</sub>.
<div id='cssmenu'>
<ul>
			
<?php 
if(isset($_SESSION['login_user']) ) { 
	echo "<li ><b><i><p style='font-size:12px'><a href='userpwd.php?id=".$_SESSION['user_id']."'><img width='24' height='24' src='img/smalluser.png'></a>".$_SESSION['login_user']."</b><br>".kname($_SESSION['klub_id'])." ".fname($_SESSION['admin'])."</p></i></li> ";}
  echo "<li><a href='index.php' title='Domů'><img width='32' height='32' src='img/home.png'></a></li>";
  if(isset($_SESSION['admin']) ) {
	  
  if ($_SESSION['admin'] != 'A') {
# || $_SESSION['admin']=='S') {
		echo "<li><a href='createqr.php?id=".$_SESSION['user_id']."' title='Ukaz QR'><img width='32' height='32' src='img/qr.png'></a></li>";
  }

  if ($_SESSION['admin'] == 'U') {
		echo "<li><a href='tips.php?id=".$_SESSION['user_id']."' title='Ukaz ucet'><img width='32' height='32' src='img/tips.png'></a></li>";
  }

  if ($_SESSION['admin'] == 'Y') {
		echo "<li><a href='klubreport.php' title='Report transakčních poplatků'><img width='32' height='32' src='img/tips.png'></a></li>";
  }

  if ($_SESSION['admin'] == 'B' || $_SESSION['admin']=='S') {
		echo "<li><a href='klubplace.php' title='Přehled o dění'><img width='32' height='32' src='img/tips.png'></a></li>";
  }

  if ($_SESSION['admin'] == 'Y' || $_SESSION['admin'] == 'S') {
       
	
   		echo "<li><a href='clubs.php' title='Kluby'><img width='32' height='32' src='img/nightlife.png'></a></li>";
   		echo "<li><a href='provize.php' title='Provizni polozky'><img width='32' height='32' src='img/menu.png'></a></li>";
		echo "<li><a href='users.php' title='Sprava Uzivatelu'><img width='32' height='32' src='img/users.png'></a></li>";

	 } 
   if ($_SESSION['admin'] == 'Y') {
  }
  } else { 
?>
   
  <?php } ?>
   <li><a href = "logout.php" title="Login / Logout"><img width='32' height='32' src="img/changeuser.png"></a></li>
   <li><a href = "about.php" title="About application"><img width='32' height='32' src="img/help.png"></a></li> 
   <li><div id="google_translate_element"></div></li>
</ul>
</div>
</body>
<html>
