<?php

//start session
session_start();

// connection database
require_once "conn.php";
//error_reporting(0); if there is warning and i don's show him 

// To get value from form
if(isset($_POST['email']) || isset($_POST['email'])){
$mail = $_POST['email'];
$pass = $_POST['password'];


$mail= stripcslashes($mail);
$pass= stripcslashes($pass);
$mail= mysqli_real_escape_string($link,$mail);
$pass= mysqli_real_escape_string($link,$pass);

// get data from database
$result=mysqli_query($link,"SELECT * FROM admin WHERE email='$mail' and password='$pass'")
or die("Failed to query database".mysql_error());
$row=mysqli_fetch_array($result);

// check email or password
if($row['email']==$mail && $row['password']==$pass){
	$_SESSION ['id']=$row['id'];
	$_SESSION ['user_name']=$row['user_name'];
	$_SESSION ['privilage']=$row['privilage'];
	header('location:dashboard.php');
	exit();
}else{
	header("Location:error-login.php");
	exit();
}
}
 ?>


<!-- content of page -->
<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="icon/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet"  href="style.css">
</head>
<body class="login">
	<div class="contain">
	<img src="image/logo.png"/>
		<form method="POST" action="index.php">
			<div class="form-input">
				<span class="person"><i class="bi bi-envelope-fill "></i></span>
				<input type="text" name="email" placeholder="Enter Your Email" required />	
			</div>
			<div class="form-input">
				<span class="person"><i class="bi bi-lock-fill "></i></span>
				<input type="password" name="password" placeholder="Enter Your Password" required />
			</div>
			<button type='submit' name="submit" class='btn btn-primary' id="btn-login"> Log In </button>

			<!-- alert if forget password success -->
			<?php
            if (isset($_GET['newpwd'])) {
         	if ($_GET['newpwd']=="passwordupdated") {
            	echo'<p class="signupsuccess">Your password has been reset </p> ';
         		}
      		}
      		?>
			<div class="forget"><a href="reset_password.php">Forget Password ? </a></div>
		</form>
	</div>
	<script src="http://localhost/Medical/bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="http://localhost/Medical/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>