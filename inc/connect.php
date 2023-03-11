<?php
$link = mysqli_connect("localhost", "popelnice", "TajneHeslo12345*-+", "popelnice");
// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
function safe_b64encode($string) {
	$data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
}
// tuto funkci necbudu pouzivat
function safe_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}


function kid($klub)
{
	global $link;
  $kid="select id from kluby where zkratka='".$klub."'";                                                                                                              
  $kr = $link->query($kid);
  if ($kr->num_rows > 0) {
		while($row = $kr->fetch_assoc()) {
			$klub_id=$row['id'];
    }
  }
	return $klub_id;	  
}

function insert($sql)
{
	global $link;
	if ($link->query($sql) == TRUE) {                                                                                                                                  
    $return =  "Nový záznam přidán";                                                                  
  } else {
		$return = "Error: ". $link->error;                                                                
  }
	return $return;
}

function select($sql)
{
	global $link;
  $result = mysqli_query($link,$sql);
	return $result;
}

function appearance($property, $element)
{
    $sql = "select value from appearance where property='".$property."' and element='".$element."';";
    if($r = mysqli_query($GLOBALS['link'], $sql)){
			if(mysqli_num_rows($r) > 0){
				while($row = mysqli_fetch_array($r)){
					$value = $row['value'];
				}
			}
		}
    return $value;
}

function startsWith($string, $startString) { 
  $len = strlen($startString); 
  return (substr($string, 0, $len) === $startString); 
} 
?>
