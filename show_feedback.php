<?php include "header.php" ; ?>

<?php 
 
// Define variables and initialize with empty values
$email = $subject = $message =  "";
 // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
         
        // Prepare a select statement
        $sql = "SELECT * FROM feedbacks  WHERE FeedbackId = ?";
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
                    $subject= $row["subject"];
                    $message = $row["Feedback"];
                    $id=$row["FeedbackId"];

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
<div class="admin-page">
<form method="POST" action="delete-feedback.php">
<div class="card" id="show_feedback">
  <div class="card-body">
    <h5 class="card-title" ><?php echo $subject ?></h5>
    <p class="card-text"><?php echo $message ?></p>
    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
    <a href="feedback.php" title='back' id="btn-back" class="card-link"><i class="bi bi-arrow-left"></i></a>
    <a href="delete-feedback.php" title='delete message' id="btn-delete-feedback"  class="card-link" style=""><button class='btn btn-danger'><i class='bi bi-trash'></i></button></a>
  </div>
</div>
</form>
</div>


  
<?php include "footer.php";?>