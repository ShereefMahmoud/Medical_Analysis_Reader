<?php include "header.php"; 
error_reporting(0);
?>

<!-- content admin page --> 
    <div class="admin-page" >
<!-- privilage -->
<?php if($_SESSION['privilage'] =='all' || $_SESSION['privilage'] =='user' ){ ?>
		<h1>Manage Users</h1>
        <form class="d-flex " id="search" method="POST" action="user.php">
           <input class="form-control me-2" type="search" placeholder="Search By Full Name" aria-label="Search" name="search" value="<?php echo $searchKey ?>">
           <button class="btn btn-dark" type="submit" name="submit"><i class="bi bi-search"></i></button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM users WHERE username LIKE '%$searchKey%'";
        }else{
            $sql = "SELECT * FROM users";
            $searchKey="";
        }
        // Attempt select query execution
        if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){?>

        <table class='table table-striped table-hover' id = 'table'>
        <thead>
            <tr>
                <th scope='col'>Full Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>Last Login</th>
                <th scope='col'>Status</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['last_login'] ?></td>
                <td><?php
                    if ($row['Is_Active']==1) { ?>
                    <div class="is_active" ></div>
                    <?php
                    }else{
                    ?>
                    <div class="is_active" style="background-color:#c0c0c0 ;"></div>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a href='details-user.php?id=<?php echo $row['UserId'] ?>' title='View Record' data-toggle='tooltip' ><button type='submit' class='btn btn-primary'> Details </button></a>
                    <a href='delete-user.php?id=<?php echo $row['UserId'] ?>' title='Delete Record' data-toggle='tooltip'><button type='submit' class='btn btn-danger'><i class='bi bi-trash-fill'> Delete </i></button></a>
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