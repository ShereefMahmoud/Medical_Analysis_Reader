<?php include "header.php"; 
error_reporting(0);
?>
	
    <!-- content admin page --> 
    <div class="admin-page">
        <!-- check privilage -->
     <?php if($_SESSION['privilage'] =='all' || $_SESSION['privilage'] =='analysis' ){ ?>
	
		<h1>Manage Analysis</h1>
        <!-- function search -->
        <form class="d-flex " id="search" method="POST" action="analysis.php">
           <input class="form-control me-2" type="search" placeholder="Search By Name Of Analysis" aria-label="Search" name="search" value="<?php echo $searchKey ?>">
           <button class="btn btn-dark" type="submit" name="submit"><i class="bi bi-search"></i></button>
           <a href="add_analysis.php"><i class="bi bi-plus-lg" id="add-icon">Add Analysis</i></a>
        </form>  

        <?php
        if (isset($_POST['submit'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM analysis_info WHERE name LIKE '%$searchKey%'";
        }else{
            $sql = "SELECT * FROM analysis_info";
            $searchKey="";
        }
        if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
        ?>  
       

        <table class='table table-striped table-hover' id = 'table'>
        <thead>
            <tr>
              <th scope='col'>Name Of Analysis</th>
              <th scope='col'>URL Of Analysis</th>
              <th scope='col'>Actions</th>
    		</tr>
  		</thead>
  		<tbody>
        <?php while($row = mysqli_fetch_array($result)){ ?>
    		<tr>
      			<td><?php echo $row['name'] ?></td>
                <td><?php echo $row['url'] ?></td>
      			<td>
                    <a href='edit-analysis.php?id=<?php echo $row['id'] ?>' title='Update Record' data-toggle='tooltip'><button type='submit' class='btn btn-secondary'><i class='bi bi-pencil-square'> Edit </i></button></a>
                    <a href='delete-analysis.php?id=<?php echo $row['id'] ?>' title='Delete Record' data-toggle='tooltip'><button class='btn btn-danger'><i class='bi bi-trash-fill'> Delete </i></button></a>
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
