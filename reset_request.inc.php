<?php

if (isset($_POST["reset-request-submit"])) {
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url="localhost/Medical/create-new-password.php?selector=". $selector. "&validator=". bin2hex($token);

	$expires = date("U") + 1800 ;

	require 'conn.php';

	$email = $_POST['email'];

	$sql="DELETE FROM pwdReset WHERE pwdResetEmail=? ";
	$stmt=mysqli_stmt_init($link);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo"shereef";
		echo "There was an error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt,"s",$email);
		mysqli_stmt_execute($stmt);
	}

	$sql="INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
	$stmt=mysqli_stmt_init($link);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}else{
		$hashedToken= password_hash($token,PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"ssss",$email,$selector,$hashedToken,$expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($link);

	$to = $email ;
	$subject='Reset your password for medical app';

	$message='<p>We recieve a password reset request. The link to reset your password, you make this request, you can ignore this email  </p>';
	$message.='<p>Here is your password reset link :</br>';
	$message.='<a href="'. $url .'">' . $url . '</a></p>';

	$headers ="From : Medical <shereefmahmoud03@gmail.com>\r\n";
	$headers .="Reply-To: shereefmahmoud03@gmail.com\r\n";
	$headers .="Content-type: text/html\r\n";

	mail($to, $subject, $message ,$headers);

	header("Location:reset_password.php?reset=success");

}else{
	header("location:index.php");
}

?>