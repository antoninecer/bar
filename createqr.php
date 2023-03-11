<?php
/**
 * QR Code + Logo Generator
 *
 * http://labs.nticompassinc.com
 */
include ('kolackologin.php');
#include('menu.php');

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$utyp=isset($_SESSION['admin'])? $_SESSION['admin'] : 0;
$uid=isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
$klub=isset($_SESSION['klub'])? $_SESSION['klub'] : 0;

$data = isset($_GET['data']) ? $_GET['data'] : 'http://v.nanavsi.com/bar/check.php?utyp='.$utyp.'&uid='.$uid.'&klub='.$klub;
$size = isset($_GET['size']) ? $_GET['size'] : '500x500';
$logo = isset($_GET['logo']) ? $_GET['logo'] : 'img/tancovani_bez.png';


header('Content-type: image/png');
// Get QR Code image from Google Chart API
// http://code.google.com/apis/chart/infographics/docs/qr_codes.html
$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
if($logo !== FALSE){
	$logo = imagecreatefromstring(file_get_contents($logo));

	$QR_width = imagesx($QR);
	$QR_height = imagesy($QR);
	
	$logo_width = imagesx($logo);
	$logo_height = imagesy($logo);
	
	// Scale logo to fit in the QR Code
	$logo_qr_width = $QR_width/2;
	$scale = $logo_width/$logo_qr_width;
	$logo_qr_height = $logo_height/$scale;
	
	imagecopyresampled($QR, $logo, $QR_width/4, $QR_height/4, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
imagepng($QR);
imagedestroy($QR);
echo $data;
?>
