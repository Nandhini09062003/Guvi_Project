
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myname = mysqli_real_escape_string($db,$_POST['fname']); 
      $myusername = mysqli_real_escape_string($db,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      $mygender = mysqli_real_escape_string($db,$_POST['gender']); 
      $sql = "SELECT * FROM user WHERE uname = '$myusername' and pass = '$mypassword'and fname = '$myname'and gender = '$mygender'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
		 $_SESSION['loggedin'] = TRUE;
         $_SESSION['login_user'] = $myusername;
         
echo "<script>alert('Login Successful');window.location.href='main.php';</script>";
	}
	  else
	  {
         echo "<script>alert('Your Login Name or Password is invalid');window.location.href='index.php';</script>";
		 exit();
      }
   }	


?>
