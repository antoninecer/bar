<?php
  $sql="select * from users where id=".$uid;
  #echo $sql."<br>";
  
  $result = mysqli_query($link,$sql);
        if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
  echo "<h2>Super User: ".$_SESSION['login_user']." nacetl umelce: ".$row['username']."</h2>";
}}}
echo " tady bude oprava/mazani neuzavrenych polozek";
$sql="select * from provize where klub_id=".$_SESSION['klub_id']." and umelec_id=".$uid." and doklad is null";
$celkem=0;
$mena="";
$result = mysqli_query($link,$sql);                                         
if($result = mysqli_query($link, $sql)){                              
  if(mysqli_num_rows($result) > 0){                             
    echo "<table><tr><td>datum</td><td>popis</td><td>castka</td><td>mena</td><td>smazat</td></tr>";  
  
    while($row = mysqli_fetch_array($result)){                              
      echo "<tr><td>".$row['cas']."</td><td>".$row['popis']."</td><td>".$row['castka']."</td><td>".$row['mena']."</td><td><a href='provizedel.php?id=".$row['id']."'><img src='img/delete16.png'></a></td></tr>";
      $celkem+=$row['castka'];
      #print_r($row);
      $mena=$row['mena'];
    }
    echo "</table>";       
    echo "Celkem:".$celkem.$mena;                                                  
  }                                                           
}    


?>
