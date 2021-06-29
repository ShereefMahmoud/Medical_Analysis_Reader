<?php

if (isset($_POST["reset-password-submit"])) {

	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	if (empty($password) || empty($passwordRepeat)) {
		header("Location: index.php");
		exit();
	}
	elseif ($password != $passwordRepeat) {
		header("Location: index.php");
		exit();
	}

	$currentDate=date("U");
	require 'conn.php';
	$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetEmail>=? ;";
	$stmt=mysqli_stmt_init($link);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt,"s",$selector);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);

		if (!$row=mysqli_fetch_assoc($result)) {
			echo "you need to re-submit your reset request";
			exit();
		}else{
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

			if ($tokenCheck === false) {
				echo "you need to re-submit your reset request";
				exit();
			}elseif ($tokenCheck === true) {
				$tokenEmail = $row["pwdResetEmail"];

				$sql = "SELECT * FROM admin WHERE email = ?;";
				$stmt=mysqli_stmt_init($link);
	            if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo "There was an error";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);

					if (!$row=mysqli_fetch_assoc($result)) {
						echo "there was an error";
						exit();
					}else{
						sql = "UPDATE admin SET password=? WHERE email=?";
						$stmt=mysqli_stmt_init($link);
	            		if (!mysqli_stmt_prepare($stmt,$sql)) {
							echo "There was an error";
							exit();
						}else{
							$newPwdHash= password_hash($password,PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
							mysqli_stmt_execute($stmt);

							$sql="DELETE FROM pwdReset WHERE pwdResetEmail=? ";
							$stmt=mysqli_stmt_init($link);
							if (!mysqli_stmt_prepare($stmt,$sql)) {
								echo "There was an error";
								exit();
							}else{
							mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
							mysqli_stmt_execute($stmt);
							header("Location:index.php?newpwd=passwordupdated");
							}
						}
					}				
				}
			}
		}
	}	
	
}else{
	header("location:index.php")
}

?>