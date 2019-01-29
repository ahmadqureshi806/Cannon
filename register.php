<?php include 'include/config.php';?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cannon Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form action="register_detail.php" method="post">
            
          
            <div class="form-group">
              <div class="form-label-group">
                <select class="form-control"  name="account_type" required="required" onchange="chk_account(this.value)">
                  <option value=''>Select Type</option>
                  <option value='2'>Member</option>
                  <option value='3'>Bickeree</option>
                </select>
                <!-- <label>Account Type</label> -->
              </div>
            </div>

            <div class="form-group" id="account_type">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control passcode" name="passcode" placeholder="Pass Code" required="required">
                <label for="inputEmail">Pass Code</label>
              </div>
            </div>

            <button type="submit" name="register" value="register" class="btn btn-primary btn-block" >Register</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script>
  function chk_account(account){
    if(account == 2)
    {
      $('#account_type').css("display" , "block");
      $('.passcode').attr("required","required");
    }
    else
    {
       $('#account_type').css("display" , "none");
      $('.passcode').removeAttr("required");
    }

  }
</script>

  </body>

</html>
