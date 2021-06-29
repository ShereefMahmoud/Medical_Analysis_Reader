<?php include "header.php" ; ?>
<?php

    // Check existence of id parameter before processing further
    if(!isset($_SESSION["id"]))
    {
        header("Location:dashboard.php");
    }
    $sql = "SELECT * FROM `admin`  WHERE `id`='{$_SESSION["id"]}' LIMIT 1 ";
    $result = mysqli_query($link,$sql);
    $check = mysqli_num_rows($result);
    if(!$check)
    {
        header("Location:dashboard.php");
    }
    $row = mysqli_fetch_assoc($result);
?>




	<!-- content add page --> 
	<div class="admin-page" id="add">
			<h1>Edit Profile</h1>
			<div class="add_admin" style="height: 80vh;">
					<i class="bi bi-person-circle" id="add_profile"></i>

					<form action="update-profile.php" method="POST">

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-person-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your User Name" type="text" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['user_name'] ?>" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text"><i class="bi bi-envelope-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Email" type="email" name="email" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $row['email'] ?>">
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default" style="font-size: 19px"><i class="bi bi-lock-fill"></i></span>
  						<input placeholder="Enter Your Password"  type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['password'] ?>">
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-geo-alt-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Address" type="text" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['address'] ?>">
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-phone-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Phone" type="text" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['phone'] ?>">
					</div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
					<button type="submit" name="submit" class="btn btn-primary" id="btn-save">Update</button>
					<a href="javascript:history.go(-1)"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Cancel</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>