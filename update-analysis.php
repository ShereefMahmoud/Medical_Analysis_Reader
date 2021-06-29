<?php  include('header.php'); ?>

<?php  include('validation.php'); ?>

<?php
/*error_reporting(0);*/

        if(isset($_POST['submit']))
        {
            $analysisName =     santString($_POST['analysisName']);
            $analysisUrl =     santString($_POST['analysisUrl']);
            $description =     santString($_POST['description']);

            if(requiredInput($analysisName) &&  requiredInput($analysisUrl) &&  requiredInput($description) )
            {
                if(minInput($analysisName,3) && minInput($analysisUrl,3)&& minInput($description,15))
                {
                    if(maxInput($analysisName,30) && maxInput($analysisUrl,100) && maxInput($description,500) )
                    {
                        $id = $_POST['id'];

                            $sql = "UPDATE `analysis_info` SET  `name`='$analysisName' ,`url`='$analysisUrl', `details`='$description'
                            WHERE `id`='$id' ";
                        

                        $result = mysqli_query($link,$sql);

                        if($result)
                        {
                            $success = "Updated Successfully ";
                            header("refresh:2;url=analysis.php");
                        }
                    }
                    else 
                    {
                        $error = "You Shoud Wright in  allow Limitation";
                    }
                }
                else 
                {
                    $error = "You Shoud Wright in allow Limitation ";
                }
            }
            else 
            {
                $error =  "Please Fill All  Fields !";
            }
        }

?>


<div class="admin-page">
    <div id="update">
    <h2 class="text-center bg-info py-3 text-white my-2">Update Info About Admin</h2>
  
    <?php if($error): ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary"> Go Back</a>
    <?php endif;  ?>

    <?php if($success): ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif;  ?>
    </div>
</div>

<?php  include('footer.php'); ?>