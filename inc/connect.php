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

#funkce vrati klub id podle zkratky hotelu
function kid($klub)
{
	global $link;
  $klub_id=0;
	$kid="select id from kluby where zkratka='".$klub."'";                                                                                                              
  $kr = $link->query($kid);
  if ($kr->num_rows > 0) {
		while($row = $kr->fetch_assoc()) {
			$klub_id=$row['id'];
    }
  }
	return $klub_id;	  
}

#funkce pro zapis do db
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

function neuzavrene($kid,$uid)
{
global $link;
$sql="select * from provize where klub_id=".$kid." and umelec_id=".$uid." and doklad is null";
$celkem=0;
$mena="";
#$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
    echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td></tr>";  
  
    while($row = mysqli_fetch_array($result)){                              
      echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td align='right'>".number_format($row['castka'],2,',','')."</td><td>".$row['mena']."</td></tr>";
      $celkem+=$row['castka'];
      #print_r($row);
      $mena=$row['mena'];
    }
    echo "</table>";       
	  echo "Celkem: <b>".number_format($celkem, 2, ',', '')."</b> ".$mena;                                                  
  }                                                           
}                 

}

#funkce na vraceni meny z klubu
function mena($kid)
{ 
  global $link;
  $sql = "select mena from kluby where id=".$kid ;
  $mena='';
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $mena=$row['mena'];
      }
    }
  }
return $mena;
} 
 

function stav($kid,$uid)
{
	global $link;
	$sql = "select stav from pichacky  where umelec_id=".$uid." and klub_id=".$kid." order by id desc limit 1" ;
	# zjisteni co bylo naposled jestli nic, start, nebo stop
	$poslednistav='';
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$poslednistav=$row['stav'];
			}
		}
	}
	return $poslednistav;
}

function fee($uid,$bid,$kid)
{ 
	
  global $link;

  $sql = "select fee,mena from kluby where id=".$kid ;
  $mena='';
	$castka=0;
	$pid=99999;
	$popis='Transakční poplatek';
	
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $castka=$row['fee']*-1;
        $mena=$row['mena'];
      }
    }
	}
	#tady dojde k natizeni fee na ucet umelce
  $sqli = "insert into provize (klub_id,barman_id,umelec_id,polozka_id,popis,cas,castka,mena) values (".$kid.",".$bid.",".$uid.",".$pid.",'".$popis."',now(),".$castka.",'".$mena."')";                                                                                                                                                                    
 #echo $sqli."<br>";
	echo insert($sqli);      
} 


function uname($uid)
{ 
  global $link;
  $sql = "select username from users where id=".$uid ;
  $uname='';
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $uname=$row['username'];
      }
    }
  }
  return $uname;
} 


function select($sql)
{
	global $link;
  $result = mysqli_query($link,$sql);
	return $result;
}

function appearance($property, $element)
{
    $value='';
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
