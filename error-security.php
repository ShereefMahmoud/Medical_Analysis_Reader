<!DOCTYPE html>
<html>
<head>
	<title>  Error Security</title>
	<link href="http://localhost/Medical/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://localhost/Medical/icon/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet"  href="http://localhost/Medical/style.css">
</head>
<body class="login">
	<div class="opacity-error">
	<div id="error-login">
	
		<div class='alert alert-danger d-flex align-items-center' role='alert'>
			<i class="bi bi-exclamation-triangle-fill"> We are sorry sir, But you shoud login first</i>
		</div>

		<?php  header("refresh:2;url=index.php"); ?>
	 	
	</div>
	</div>
	<script src="http://localhost/Medical/bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="http://localhost/Medical/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>