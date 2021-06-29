 <?php include "header.php" ; ?>
 <?php 
 
// Define variables and initialize with empty values
$userName = $email = $lastLogin = $num_of_scan =  "";
 // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE UserId = ?";
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
                    $userName = $row["username"];
                    $email = $row["email"];
                    $lastLogin= $row["last_login"];
                    $num_of_scan = $row["num_of_scan"];

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
			<div class="add_admin" style="height: 70vh;">
					<i class="bi bi-person-circle" id="add_profile"></i>

					<form action="details-admin.php" method="POST">

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-person-fill" ></i></span>
  						<input type="text" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $userName; ?>" >
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
  						<input placeholder="Enter Your Email" type="email" name="email" class="form-control" readonly  value="<?php echo $email; ?>">
					</div>

					<div class="input-group mb-3 " id="input">
  						<span class="input-group-text" id="inputGroup-sizing-default">Last Login</span>
  						<input  type="text" name="lastLogin" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly  value="<?php echo $lastLogin; ?>">
					</div>

                    <div class="input-group mb-3 " id="input">
                        <span class="input-group-text" id="inputGroup-sizing-default"><b>Num Of Scan</b></span>
                        <input  type="number" name="num_of_scan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly  value="<?php echo $num_of_scan; ?>">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $UserId; ?>"/>

					<a href="user.php" style="margin-left: 30%;"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>