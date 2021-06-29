<?php include "header.php" ; ?>

<?php 
$errors=array();
// connect
require_once "conn.php";
error_reporting(0);

//add admin
if (isset($_POST['submit'])){
$analysisName = mysqli_real_escape_string($link , $_POST['analysisName']);
$analysisUrl = mysqli_real_escape_string($link , $_POST['analysisUrl']);
$description = mysqli_real_escape_string($link , $_POST['description']);
}


// form validation
if(empty($analysisName)) {array_push($errors, "Analysis Name is required "); } 
if(empty($analysisUrl)) {array_push($errors, "Analysis Url is required ");}
if(empty($description)) {array_push($errors, "Description is required ");}

// check db for existing user with same username

$user_check_query= "SELECT * FROM admin WHERE  name = '$analysisName' LIMIT 1";

$result = mysqli_query($link , $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
	if ($user['name']=== $analysisName) {array_push($errors, "Analysis Name alredy Exists");}
	//if ($user['email']=== $email) {array_push($errors, "email alredy Exists");}
}

// register the user if no errors 
if (count($errors)==0) {

	$query = "INSERT INTO admin (name ,url , details ) VALUES ('$analysisName','$analysisUrl','$description')";
	mysqli_query($link,$query);
	$_SESSION['name']=$analysisName;
	$_SESSION['success']="You are Log in";

	header('location:analysis.php');
	exit();
}

?>

<div class="admin-page" id="add">
			<h1>Add Analysis</h1>
			<div class="add_admin" style="height: 73vh; padding-top: 30px;">
					<form action="add_analysis.php" method="POST" >
                    <img src="image/analysis.png" style="background-color:rgba(198, 231, 248, 0.7); width: 150px; height: 150px; border-radius: 50%; margin-left: 35%;margin-top: -10px; margin-bottom: 20px;"/>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default">Name Of Analysis</span>
  						<input placeholder="Enter The name Of Analysis From 3 : 20 Chars" type="text" name="analysisName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text">URL Of Analysis</span>
  						<input placeholder="Enter The URL Of Analysis From 3 : 100 Chars" type="text" name="analysisUrl" class="form-control" >
					</div>

					<div class="input-group" style="height:140px">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Enter The Type Of Analysis From 15 : 500 Chars"></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
					<button type="submit" name="submit" class="btn btn-primary" id="btn-save">Add</button>
					<a href="analysis.php"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>