<?php 
include 'include/config.php';

if(isset($_POST['register']) && $_POST['register'] !='')
{
	if((isset($_POST['f_name']) && $_POST['f_name'] !='') && (isset($_POST['l_name']) && $_POST['l_name'] !='') && (isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !='') && (isset($_POST['c_password']) && $_POST['c_password'] !='') && (isset($_POST['hometown']) && $_POST['hometown'] !=''))
	{
		if($_POST['password'] == $_POST['c_password'])
		{
			$f_name= mysqli_real_escape_string($goodideas , $_POST['f_name']);
			$l_name= mysqli_real_escape_string($goodideas , $_POST['l_name']);
			$username= mysqli_real_escape_string($goodideas , $_POST['username']);
			$email= mysqli_real_escape_string($goodideas , $_POST['email']);
			$password= mysqli_real_escape_string($goodideas , $_POST['password']);
			$hometown= mysqli_real_escape_string($goodideas , $_POST['hometown']);
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
				hometown='".$hometown."',
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
			echo "Password And Confirm Password Dont Match";
		}
	}
	
}

?>