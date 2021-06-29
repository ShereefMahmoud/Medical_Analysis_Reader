<?php  include('header.php'); ?>

<?php  include('validation.php'); ?>

<?php
error_reporting(0);

        if(isset($_POST['submit']))
        {
            $userName =     santString($_POST['userName']);
            $email =    santEmail($_POST['email']);
            $address =    santString($_POST['address']);
            $phone =    santNum($_POST['phone']);
            $privilage =    santNum($_POST['privilage']);

            if(requiredInput($userName) &&  requiredInput($email) &&  requiredInput($address) &&  requiredInput($phone) && requiredInput($privilage)  )
            {
                if(minInput($userName,3))
                {
                    if(validEmail($email))
                    {
                        $id = $_POST['id'];
                        if($password)
                        {
                            $password = santString($_POST['password']);
                            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

                            $sql = "UPDATE `admin` SET  `user_name`='$userName' ,`email`='$email',`password`='$hashed_password', `address`='$address' ,`phone`='$phone',`privilage`='$privilage'
                            WHERE `id`='$id' ";

                        }   
                        else 
                        {
                            $sql = "UPDATE `admin` SET  `user_name`='$userName' ,`email`='$email', `address`='$address' ,`phone`='$phone',`privilage`='$privilage'
                            WHERE `id`='$id' ";
                        }

                        $result = mysqli_query($link,$sql);

                        if($result)
                        {
                            $success = "Updated Successfully ";
                            header("refresh:2;url=admin.php");
                        }
                    }
                    else 
                    {
                        $error = "Please Type Valid Email !";
                    }
                }
                else 
                {
                    $error = "Name Must Be Grater Than 3 Chars / Password Must Be Less Than 20 Chars";
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
        <a href="javascript:history.go(-1)" class="btn btn-primary"><< Go Back</a>
    <?php endif;  ?>

    <?php if($success): ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif;  ?>
    </div>
</div>

<?php  include('footer.php'); ?>