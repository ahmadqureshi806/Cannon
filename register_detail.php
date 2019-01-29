<?php include 'include/config.php';?>
<?php
$error_msg='';
if(isset($_POST['register']) && $_POST['register'] !='')
{
  if((isset($_POST['f_name']) && $_POST['f_name'] !='') && (isset($_POST['l_name']) && $_POST['l_name'] !='') && (isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !='') && (isset($_POST['c_password']) && $_POST['c_password'] !=''))
  {
    if($_POST['password'] == $_POST['c_password'])
    {
      $f_name= mysqli_real_escape_string($goodideas , $_POST['f_name']);
      $l_name= mysqli_real_escape_string($goodideas , $_POST['l_name']);
      $username= mysqli_real_escape_string($goodideas , $_POST['username']);
      $email= mysqli_real_escape_string($goodideas , $_POST['email']);
      $password= mysqli_real_escape_string($goodideas , $_POST['password']);
      //$hometown= mysqli_real_escape_string($goodideas , $_POST['hometown']);
      $entery_date= date("Y-m-d");
      $password=encrypt_decrypt('encrypt', $password);


      $complete_file_name = "";
      $uploadOk = 1;

    if(isset($_FILES["user_pic"]["name"]) && $_FILES["user_pic"]["name"] != '')
    {
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["user_pic"]["name"]);

      $complete_file_name = time()."_".clean(basename($_FILES["user_pic"]["name"]));
      $complete_directory_path = $target_dir.time()."_".clean(basename($_FILES["user_pic"]["name"]));

      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["user_pic"]["tmp_name"]);
        if($check !== false)
        {
            $uploadOk = 1;
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif")
            {
            if ($uploadOk == 0)
            {
              echo "Sorry, your file was not uploaded.";
              die();
          }
          
            
                if (move_uploaded_file($_FILES["user_pic"]["tmp_name"], $complete_directory_path))
                {
                  $uploadOk = 1;
                }
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                  die();
                }
            
            
          
        }
        else
        {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            die();
        }
        }
        else
        {
            echo "File is not an image.";
            $uploadOk = 0;
            die();
        }
    }


      $add_data=$goodideas->query("INSERT into users SET 
        f_name='".$f_name."',
        l_name='".$l_name."',
        username='".$username."',
        email='".$email."',
        password='".$password."',
        user_pic='".$complete_file_name."',
        account_type='".$_POST['account_type']."',
        entery_date='".$entery_date."'
        ");
      if($add_data)
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
      $error_msg='Password And Confirm Password Dont Match';
      //echo "Password And Confirm Password Dont Match";
    }
  }
  
}



if((isset($_POST['account_type']) && $_POST['account_type'] != ''))
{

  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cannon Register Details</title>

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
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="account_type" value="<?php echo $_POST['account_type'];?>">
            <?php
            if(($_POST['account_type']==2) && (isset($_POST['passcode']) && $_POST['passcode'] != ''))
              {
                if($_POST['passcode'] == $pass_code_main)
                {

                }
                else
                {
                   echo "<h3 style='color:red; text-align:center;'>Wrong Pass Code </h3>";
                  die();
                }

              } 
            ?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="fullname" class="form-control" name="f_name" placeholder="First Name" required="required" autofocus="autofocus">
                    <label for="fullname">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastname" class="form-control" name="l_name" placeholder="Last Name" required="required">
                    <label for="lastname">Last Name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="username" class="form-control" name="username" placeholder="Username" required="required">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" name="c_password" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
                
              </div>
            </div>

            <!-- <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="Hometown" class="form-control" name="hometown" placeholder="Hometown" required="required">
                <label for="Hometown">Hometown</label>
              </div>
            </div> -->

            <div class="form-group">
              <div class="form-label-group">
                <input type="file" id="profilepic" class="form-control" name="user_pic">
                <label for="profilepic">Profile Pic</label>
              </div>
            </div>

            <p style="color:red; text-align:center;font-weight:bold;"><?php echo $error_msg;?></p>

            <button type="submit" name="register" value="register" class="btn btn-primary btn-block">Register</button>
          </form>
          <div class="text-center">
           <!--  <a class="d-block small mt-3" href="index.php">Login Page</a>
            <a class="d-block small" href="forgot-password.php">Forgot Password?</a> -->
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
<?php
    
}
?>