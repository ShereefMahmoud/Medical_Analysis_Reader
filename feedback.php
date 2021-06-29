<?php include "header.php"; 
error_reporting(0);
?>
<!-- content admin page --> 
    <div class="admin-page">
<?php if($_SESSION['privilage'] =='all' || $_SESSION['privilage'] =='feedback' ){ ?>
	
		<h1>Manage Feedbacks</h1>
        
        <form class="d-flex " id="search" method="POST" action="feedback.php">
           <input class="form-control me-2" type="search" placeholder="Search By Email" aria-label="Search" name="search" value="<?php echo $searchKey ?>">
           <button class="btn btn-dark" type="submit" name="submit"><i class="bi bi-search"></i></button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM users INNER JOIN feedbacks ON users.UserId=feedbacks.UserId  WHERE  email LIKE '%$searchKey%'";
        }else{
            $sql = "SELECT * FROM users INNER JOIN feedbacks ON users.UserId=feedbacks.UserId ";
            $searchKey="";
        }
        // Attempt select query execution
        if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){?>

        <table class='table table-striped table-hover' id = 'table'>
        <thead>
            <tr>
            	<th scope='col'>Email</th>
            	<th scope='col'>Subject</th>
                <th scope='col'>Date Time</th>
      			<th scope='col'>Actions</th>
    		</tr>
  		</thead>
  		<tbody>
    		<?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['Datetime'] ?></td>
                <td>
                    <a href='show_feedback.php?id=<?php echo $row['FeedbackId']; ?>' title='show Record' data-toggle='tooltip' ><button type='submit' class='btn btn-primary'><i class='bi bi-eye-fill'>Show</i></button></a>
                    <a href='delete-feedback.php?id=<?php echo  $row["FeedbackId"]  ?>' title='Delete Record' data-toggle='tooltip'><button class='btn btn-danger'><i class='bi bi-trash-fill'> Delete </i></button></a>
                </td>
            </tr>
            <?php } ?>  
        </tbody>
        </table>
        <?php
        mysqli_free_result($result);
        } else{
            echo "<p class='lead'><em>No records were found.</em></p>";
            } 
        } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
	

    <?php } else { ?>
        <div class='alert alert-primary d-flex align-items-center' role='alert' id="error">
            <i class="bi bi-exclamation-circle-fill"> That 's not allow to you access this page, We are sorry Mr.<?php echo $_SESSION['user_name'] ?>. </i> 
        </div>
    <?php } ?>

    </div>
  
<?php include "footer.php" ; ?>