<?php include "header.php" ; ?>

<?php 


$errors=array();
// connect
require_once "conn.php";
error_reporting(0);

//add admin
if (isset($_POST['add'])){
$userName = mysqli_real_escape_string($link , $_POST['userName']);
$email = mysqli_real_escape_string($link , $_POST['email']);
$password = mysqli_real_escape_string($link , $_POST['password']);
$address = mysqli_real_escape_string($link , $_POST['address']);
$phone = mysqli_real_escape_string($link , $_POST['phone']);
$privilage = mysqli_real_escape_string($link , $_POST['privilage']);
}


// form validation
if(empty($userName)) {array_push($errors, "User Name is required "); } 
if(empty($email)) {array_push($errors, "email is required ");}
if(empty($password)) {array_push($errors, "Password is required ");}
if(empty($address)) {array_push($errors, "Address is required ");}
if(empty($phone)) {array_push($errors, "Phone is required ");}
if(empty($phone)) {array_push($errors, "Phone is required ");}

// check db for existing user with same username

$user_check_query= "SELECT * FROM admin WHERE email = '$email' And user_name='$userName' LIMIT 1";

$result = mysqli_query($link , $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
	if ($user['user_name']=== $userName) {array_push($errors, "User Name alredy Exists");}
	//if ($user['email']=== $email) {array_push($errors, "email alredy Exists");}
}

// register the user if no errors 
if (count($errors)==0) {

	$query = "INSERT INTO admin (user_name ,email , password , address , phone ,privilage) VALUES ('$userName','$email','$password','$address','$phone','$privilage')";
	mysqli_query($link,$query);
	$_SESSION['username']=$userName;
	$_SESSION['success']="You are Log in";

	header('location:admin.php');
	exit();
}

?>

	<!-- content add page --> 
	<div class="admin-page" id="add">
			<h1>Add Admin</h1>
			<div class="add_admin">
					<i class="bi bi-person-circle" id="add_profile"></i>

					<form action="add_admin.php" method="POST">

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-person-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your User Name" type="text" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text"><i class="bi bi-envelope-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Email" type="email" name="email" class="form-control" aria-label="Amount (to the nearest dollar)" required>
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default" style="font-size: 19px"><i class="bi bi-lock-fill"></i></span>
  						<input  type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="123456" readonly  >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-geo-alt-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Address" type="text" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-phone-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Phone" type="text" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default">Privilage</span>
  						<select class="form-select" aria-label="Default select example" name="privilage">
  							<option selected>Select the privilage</option>
  							<option value="all">All</option>
  							<option value="admin">Admin</option>
  							<option value="analysis">Analysis</option>
  							<option value="user">User</option>
  							<option value="feedback">Feedback</option>
  							<option value="symptoms">Symptoms</option>
						</select>
					</div>

					<button type="submit" name="add" class="btn btn-primary" id="btn-save">Add</button>
					<a href="admin.php"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>