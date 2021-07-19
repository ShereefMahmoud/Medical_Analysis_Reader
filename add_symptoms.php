<?php include "header.php" ; ?>

<?php 
$errors=array();
// connect
require_once "conn.php";
//error_reporting(0);

//add admin
if (isset($_POST['submit'])){
$diseaseName = mysqli_real_escape_string($link , $_POST['diseaseName']);
$symptomName = mysqli_real_escape_string($link , $_POST['symptomName']);
$createDate = mysqli_real_escape_string($link , $_POST['createDate']);
}


// form validation
if(empty($diseaseName)) {array_push($errors, "Disease Name is required "); } 
if(empty($symptomName)) {array_push($errors, "Symptom Name is required ");}
if(empty($createDate)) {array_push($errors, "Create Date is required ");}

// register the user if no errors 
if (count($errors)==0) {

	$query = "INSERT INTO symptoms (diseases_Name ,SymptomsName , created_date ) VALUES ('$diseaseName','$symptomName','$createDate')";
	mysqli_query($link,$query);
	$_SESSION['diseases_Name']=$diseaseName;
	$_SESSION['success']="You are Log in";

	header('location:symptoms.php');
	exit();
}

?>

<div class="admin-page" id="add">
			<h1>Add Symptoms</h1>
			<div class="add_admin" style="height: 65vh; padding-top: 30px;">
					<form action="add_symptoms.php" method="POST" >
                    <img src="image/symptoms.png" style="background-color:rgba(198, 231, 248, 0.7); width: 150px; height: 150px; border-radius: 50%; margin-left: 35%;margin-top: -10px; margin-bottom: 20px;"/>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default">Name Of Disease</span>
  						<input placeholder="Enter The Name Of Disease From 3 : 100 Chars" type="text" name="diseaseName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text"> Name Of Symptom </span>
  						<input placeholder="Enter Name Of Symptom From 3 : 100 Chars" type="text" name="symptomName" class="form-control" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text"> Create Date </span>
  						<input placeholder="Enter The Create Date Of Symptom From 3 : 100 Chars" type="date" name="createDate" class="form-control" >
					</div>


                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
					<button type="submit" name="submit" class="btn btn-primary" id="btn-save">Add</button>
					<a href="symptoms.php"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>