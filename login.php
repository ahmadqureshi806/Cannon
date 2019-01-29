<?php include 'include/config.php';

$error_msg='';
if(isset($_POST['login']) && $_POST['login'] !='')
{
  if((isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['password']) && $_POST['password'] !='') )
  {
    $password=encrypt_decrypt('encrypt', $_POST['password']);
    $get_data=$goodideas->query("SELECT * FROM users where username='".$_POST['username']."' AND password='".$password."'");
    if($get_data->num_rows > 0)
    {
      $get_data_row=$get_data->fetch_array();
      $_SESSION['admin']= $get_data_row['id'];
      $_SESSION['type']= $get_data_row['account_type'];
      if($get_data_row['account_type']==1)
      {
      ?>
        <script>
          document.location='index.php';
        </script>
      <?php
      }
      else if($get_data_row['account_type']==2)
      {
      ?>
        <script>
          document.location='index.php';
        </script>
      <?php
      }
      else if($get_data_row['account_type']==3)
      {
      ?>
        <script>
          document.location='index.php';
        </script>
      <?php
      }
    }
    else
    {
      $error_msg='Username or Password Dont Match';
      //echo "<h1 style='color:red; text-align:center;'> Username or Password Dont Match</h1>";
    }
    
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cannon Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>

            <p style="color:red; text-align:center";><?php echo $error_msg;?></p>
            
            <!-- <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div> -->
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block" href="index.php">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
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

  </body>

</html>
