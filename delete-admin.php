<?php include "header.php"; ?>


<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    // Prepare a delete statement
    $sql = "DELETE FROM admin WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location:admin.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        echo"a7ms";
        exit();
    }
}
?>
<div class="admin-page">
<form action="delete-admin.php" method="POST">
<div class="alert alert-dark" role="alert" id="delete">
  <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
  <p>Are you sure you want to delete Admin ?</p>
  <button type="submit" class="btn btn-success" style="margin-left: 10px ;">Yes</button>
  <a href="admin.php"><button type="button" class="btn btn-danger" style="margin-left: 50px ;">No</button></a>
</div>
</form>
</div>

<?php include "footer.php"; ?>