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
      <h2 style="font-weight: bold; padding-top: 10px;color: black;">Reset Your Password</h2>
      <form method="POST" action="reset_request.inc.php">
            <div class="mb-3" style="margin-top: 20px;">
               <label for="formGroupExampleInput" class="form-label" style="color: black;font-size: 19px; font-style: italic;">An email Will be sent to you with instractions on how to reset your password</label>
               <input name="email" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Your email address ...." style="width :85%; height: 44px; border-radius: 10px; margin-left: 7%;margin-top: 0px;">
            </div> 
            <button type="submit" class="btn btn-primary" name="reset-request-submit" style="margin-top: 10px;border-radius: 10px;font-size: 18px;">Receive new password by email</button>      
      </form>
      <?php
      if (isset($_GET['reset'])) {
         if ($_GET['reset']=="success") {
            echo'<p class="signupsuccess">Chech your email! </p> ';
         }
      }
      ?>
   </div>

</body>
</html>