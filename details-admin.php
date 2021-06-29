 <?php include "header.php" ; ?>
 <?php 
// Define variables and initialize with empty values
$userName = $email = $password = $address = $phone = $privilage = "";
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
			<h1><?php echo $userName; ?> 's Profile</h1>
			<div class="add_admin" >
					<i class="bi bi-person-circle" id="add_profile"></i>

					<form action="details-admin.php" method="POST">

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-person-fill"></i></span>
  						<input type="text" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $userName; ?>" >
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
  						<input type="email" name="email" class="form-control" readonly  value="<?php echo $email; ?>">
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default" ><i class="bi bi-lock-fill"></i></span>
  						<input  type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly  value="<?php echo $password; ?>">
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-geo-alt-fill" ></i></span>
  						<input type="address" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $address; ?>">
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-phone-fill" ></i></span>
  						<input type="number" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $phone; ?>">
					</div>

                    <div class="input-group mb-3 " >
                        <span class="input-group-text" id="inputGroup-sizing-default">Privilage</span>
                        <input type="text" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $privilage; ?>">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>

					<a href="admin.php" style="margin-left: 45% ;"><button type="button" name="cancel" class="btn btn-danger">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>