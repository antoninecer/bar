<html>
<?php
$hlavicka="Prihlasovaci obrazovaka";
include('head.php');
?>   
<?php
   require_once('./inc/connect.php');
	 
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 36000);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(36000);
		session_start();
include('menu.php');
    $error = "Prosím přihlašte se";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
      $myusername =  htmlspecialchars($_POST["username"]);
      
      if (strpos($myusername,'\'')){
	      $error="zaznamenán pokus o SQL injection";
	      $myusername="injectingguy";
      }
      $mypassword =  htmlspecialchars($_POST["password"]);
	  
	  $decode = safe_b64encode($mypassword);
	  //$decode = $mypassword; // to kdybych se uklepnekde, at fungujou hesla co sou videt v sql
      
      $sql = "SELECT * FROM users WHERE username = '".$myusername."' and password = '".$decode."'";
	  // echo $sql;
      
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $id = $row['id'];
      $admin = $row['admin'];
      $uklub = $row['club'];
	  
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $id;
	 $_SESSION['admin'] = $admin;
	 $_SESSION['klub'] = $uklub;

  $ip = $_SERVER['HTTP_X_REAL_IP'];
   #echo "tva IP adresa:".$ip;
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
   $page=$_SERVER['SCRIPT_NAME'];
   $mesto=$query['city'];
   $psc=$query['zip'];
   $country=$query['country'];
   $timezone=$query['timezone'];
   $latitude=$query['lat'];
   $longtitude=$query['lon'];
   $prohlizec=$_SERVER['HTTP_USER_AGENT'];
   $dotaz=$_SERVER['QUERY_STRING'];
   $cas=date('Y-m-d H:i:s');
   $dns=gethostbyaddr($ip);
# zapise do databaze od kud se kdy kdo prihlasil
   $sql="insert into clients (ip,dns,prohlizec,user,cas) values ('".$ip."','".$dns."','".$prohlizec."','".$_SESSION['login_user']."','".$cas."')";
	$result = mysqli_query($link,$sql);
   $rok=new datetime('+1 year');
   setcookie('bar_username',$_SESSION['login_user'],$rok->getTimestamp(),'/',null,null,true);
   setcookie('bar_password',$decode,$rok->getTimestamp(),'/',null,null,true);



         header("location: index.php");
      }else {
         $error = "Jméno, nebo heslo není správné ";
      }
   }
?>
		<style>
			body {
				<?php 
				$background = appearance('login','background');
				echo "background-image: url(\"".$background."\");"; ?>
				background-color: #cccccc;
			}	
		</style>
   </head>
   
 <!-- <body bgcolor = "#FFFFFF"> -->
<br>	
      <div align = "center">
         <div style = "width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">

               <form action = "" method = "post">
			    <table border="0" cellpadding="1" cellspacing="1" >
				 <tr>
                  <td align="right">Uživatel : </td><td align="left"><input type = "text" name = "username" autofocus/></td>
				 </tr><tr> 
                  <td align="right">Heslo : </td><td align="left"><input type = "password" name = "password" /></td>
				 </tr>
				  
				  <tr><td/><td align="right"><input type = "submit" value = " Přihlásit "/>
				  </td></tr>
				  </table>
               </form>

               
			 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				
            </div>
				
         </div>
			
      </div>

   </body>
</html>
