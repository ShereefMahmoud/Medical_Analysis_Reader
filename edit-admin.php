<?php include "header.php" ; ?>
<?php
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM admin WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $userName = $row["user_name"];
                    $email = $row["email"];
                    $password= $row["password"];
                    $address = $row["address"];
                    $phone = $row["phone"];
                    $privilage = $row["privilage"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
?>
	<!-- content add page --> 
	<div class="admin-page" id="add">
			<h1>Edit Profile</h1>
			<div class="add_admin">
					<i class="bi bi-person-circle" id="add_profile"></i>

					<form action="update-admin.php" method="POST">

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-person-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your User Name" type="text" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $userName; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text"><i class="bi bi-envelope-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Email" type="email" name="email" class="form-control"  value="<?php echo $email; ?>">
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default" style="font-size: 19px"><i class="bi bi-lock-fill"></i></span>
  						<input placeholder="Enter Your Password"  type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly  value="<?php echo $password; ?>">
					</div>

					<div class="input-group mb-3 " >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-geo-alt-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Address" type="address" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $address; ?>">
					</div>

					<div class="input-group mb-3 ?>" >
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-phone-fill" style="font-size: 19px"></i></span>
  						<input placeholder="Enter Your Phone" type="number" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $phone; ?>">
					</div>

                    <div class="input-group mb-3" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Privilage</span>
                        <select class="form-select" aria-label="Default select example" name="privilage">
                            <option selected><?php echo $privilage; ?></option>
                            <option value="all">All</option>
                            <option value="admin">Admin</option>
                            <option value="analysis">Analysis</option>
                            <option value="user">User</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>


					<button type="submit" name="submit" class="btn btn-primary" id="btn-save">Update</button>
					<a href="admin.php"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Cancel</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>