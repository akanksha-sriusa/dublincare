<?php
//import database config.php file
require('config.php');
//turn on buffer output
ob_start();

// If form submitted, insert values into the database.
if (isset($_REQUEST['name'])){
	$name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
	$password=hash("sha256", $password);
  //User registration query
        $query = "INSERT into admins (name, email, password,created)
        VALUES ('$name', '$email', '$password', NOW())";
        //executing the query
        $result = mysqli_query($con,$query);
        //if query registration is sucessfull rediret to login page
        if($result){
            echo '<script type="text/javascript">'; 
            echo 'alert("Registered success");'; 
            echo 'window.location.href = "login.php";';
            echo '</script>';
        }}
        else{
        ?>
<!DOCTYPE HTML>
<html lang="en" >
<html>
<head>
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <!-- binding CSS with HTML -->
  <link rel="stylesheet" type="text/css" href="CSS/login_signup_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body class="body">
  <!-- login page layout division-->
<div>
  <div class="form">
    <form action= "" method="post" role="form">
    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jcikwtux.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop controls autoplay></lottie-player>
     <br>
      <!-- input filled for name -->
      <input type="text" name="name" id="name" placeholder="full name" data-required="true" required/>
      <!-- input filled for email -->
      <input type="email" name="email" id="email" placeholder="email address" data-required="true" data-rule="email" required/>
      <!-- input filled for password -->
      <input type="password" name="password" id="password" placeholder="set a password" data-required="true" required/>
      <!-- Signup button -->
        <button type="submit" value="submit" onclick="validator()">SIGN UP</button>
    </form>
  </div>
</div>
</body>
</html>
<?php }?>