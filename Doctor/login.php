<?php
//import database config.php file
require('config.php');
//turn on buffer output
ob_start();
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
	$password=hash("sha256", $password);
	//Query to check credential using email and password
  $query = "SELECT * FROM admins WHERE email='$email' and password='$password'";
	//executing the query
  $result = mysqli_query($con,$query) or die(mysql_error());
  $row= mysqli_num_rows($result);
  if($row==1){
            echo '<script type="text/javascript">'; 
            echo 'alert("Login Sucessfull");';
            
            
            echo 'window.location.assign("index.php")';
            echo '</script>';
            
      }
        else{
          echo '<script type="text/javascript">'; 
          echo 'alert("Invalid Credentials");';
            echo 'window.location.assign("login.php")';
            echo '</script>';
        }
}
else{?>
<!DOCTYPE HTML>
<html lang="en" >
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'> 
  <!-- binding CSS with HTML -->
  <link rel="stylesheet" type="text/css" href="CSS/login_signup_style.css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  
  <!-- restrict user to go back to previous page logging out -->
  <script type = "text/javascript">
      history.pushState(null, null, location.href);
      history.back(); history.forward();
      window.onpopstate = function () { history.go(1); };
  </script>
</head>

<body class="body">
  <!-- login page layout division-->
<div class="login-page">
  <div class="form">

     <form method="post" role="form">
     
     <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jcikwtux.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop controls autoplay></lottie-player>
     <br>
      <!-- input filled for email -->
      <input type="email" name="email" id="email" placeholder="&#xf007 email"; data-required="true" required/>
      <!-- input filled for password -->
      <input type="password" name="password" id="password" data-required="true" placeholder="&#xf023;  password" required/>
      <!-- Login button -->
      <button>LOGIN</button>
    </form>
    <!-- Signup button -->
    <form class="login-form">
      <button type="button"onclick="window.location.href='signup.php'">SIGNUP</button>
    </form>
  </div>
</div>
</body>
</html>
<?php }?>