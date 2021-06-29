<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Reset Password</title>
   <link href="http://localhost/Medical/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="http://localhost/Medical/icon/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet"  href="http://localhost/Medical/style.css">
</head>
<body class="login">
   <div class="reset_pass">
      <h3 style="font-weight: bold; padding-top: 10px;color: black;">Reset Your Password</h3>
      <?php

         $selector = $_GET['selector'];
         $validator = $_GET['validator'];

         if (empty($selector) || empty($validator) ) {
            echo"Could not validate your request";
         }else{
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
         ?>
         <form action="reset_password.inc.php" method="POST">
            <input type="hidden" name="selector" value="<?php echo $selector ?>">
            <input type="hidden" name="validator" value="<?php echo $validator ?>">

            <div class="mb-3" style="margin-top: 20px;">
               <input name="pwd" type="password" class="form-control" id="formGroupExampleInput" placeholder="Enter New Password ...." style="width :85%; border-radius: 10px; margin-left: 7%;margin-top: 0px;">
            </div>
            <div class="mb-3" style="margin-top: 20px;">
               <input name="pwd-repeat" type="password" class="form-control" id="formGroupExampleInput" placeholder="Confirm New Password ...." style="width :85%; border-radius: 10px; margin-left: 7%;margin-top: 0px;">
            </div>  

            <button type="submit" class="btn btn-primary" name="reset-password-submit" style="margin-top: 10px;border-radius: 10px;font-size: 18px;">Reset Password</button>   
            
         </form>


         <?php      
            }
         }
      ?>
   </div>

</body>
</html>