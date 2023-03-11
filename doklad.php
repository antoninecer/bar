<?php
	echo "<html>";
	include('session.php');
	require_once('inc/connect.php');
	$hlavicka="vypis dokladu";
	include('head.php');

	echo "<body>";
	include('menu.php'); 
	$doklad="X";
	if(isset($_GET['id'])) {
		$doklad=$_GET['id'];
	}
	echo "<h2 align='center'>Výpis dokladu ".$doklad."</h2>";
	$klub="";   
	$kid=0;
	$sql="select * from provize where doklad=".$doklad;
	#echo $sql;
	$celkem=0;      
	$mena="";       
	$result = mysqli_query($link,$sql);                                         
	if($result = mysqli_query($link, $sql)){                              
		if(mysqli_num_rows($result) > 0){                             
			echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td></tr>";  
                
			while($row = mysqli_fetch_array($result)){                              
				echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td></tr>";                                 
				$celkem+=$row['castka'];
				#print_r($row);
				$mena=$row['mena'];
				$kid=$row['klub_id'];
			}           
			echo "</table><br>";       
			echo "Celkem:".$celkem.$mena."<br><br>";                                                  
		}                                                           
	}
	$sql="select * from kluby where id=".$kid;
	$result = mysqli_query($link,$sql);                                         
  if($result = mysqli_query($link, $sql)){                              
    if(mysqli_num_rows($result) > 0){                             
      while($row = mysqli_fetch_array($result)){                              
	      echo "Klub: ".$row['klub'];
			}
		}
	}

	echo "</body>";
	echo "</html>";                 
                




