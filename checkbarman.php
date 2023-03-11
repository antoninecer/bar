<?php
 $sql="select * from users where id=".$uid;                                        
  #echo $sql."<br>";                                                                
                                                                                    
  $result = mysqli_query($link,$sql);                                               
  if($result = mysqli_query($link, $sql)){                                    
	  if(mysqli_num_rows($result) > 0){                                   
      while($row = mysqli_fetch_array($result)){                                    
				echo "<h2>Poslat provizi pro umělce: ".$row['username']."</h2>";                  
				$uname=$row['username'];                                                          
			}
		}
	}                                                                                 
 #echo " tady bude natizeni polozky do transakce uzivatele";                         
 $sql="select u.username,u.id as uid,u.club as uklub,p.id as pid ,p.klub_id as kid,p.obrazek,p.popis,p.castka,p.mena from proviznipolozky p join kluby k on p.klub_id=k.id join users u on k.zkratka=u.club where u.id=".$_SESSION['user_id'].";";
 #echo $sql;                                                                         
 $a=0;                                                                               
 echo "<table border='1'>";                                                          
 $result = mysqli_query($link,$sql);                                                                                                    
 if($result = mysqli_query($link, $sql)){                                                                                         
	if(mysqli_num_rows($result) > 0){                                                                                        
		while($row = mysqli_fetch_array($result)){                                                                                         
			#  echo $_SESSION['login_user']." muze tizit na ucet ".$uname." : ".$row['pid']," : ".$row['kid']," : ".$row['obrazek']," : ".$row['popis']," : ".$row['castka']," : ".$row['mena'],"<br>";
			$a++;                                                                               
			if ($a==1){ echo "<tr>"; }                                                          
			echo "<td>";                                                                        
			echo "<a href='tizeni.php?pid=".$row['pid']."&kid=".$row['kid']."&uid=".$uid."' >"; 
			echo "<img src='".$row['obrazek']."' alt='".$row['popis'].$row['castka']."' width='64' height='64' ><br>".$row['popis']." ".$row['castka'].$row['mena'];
			echo "</a>";                                                                        
			echo "</td>";                                                                                     
			if ($a==3){                                                                         
				echo "</tr>";                                                                       
				$a=0;
			}                                                                             
		}             
		echo "</table>";                                                                    
		echo "<tr><br><h2>";                                                                
		echo "<a href='uzavreni.php?uid=".$uid."'>Vypořádání účtu umělce: ".$uname."</a></h2><br><br>";
	}
 }            



#konec barmana
?>
