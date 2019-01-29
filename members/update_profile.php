<?php 
include '../include/config.php';

if(isset($_POST['update_profile']) && $_POST['update_profile'] !='')
{
	if((isset($_POST['f_name']) && $_POST['f_name'] !='') && (isset($_POST['l_name']) && $_POST['l_name'] !='') && (isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
	{
		
			$f_name= mysqli_real_escape_string($goodideas , $_POST['f_name']);
			$l_name= mysqli_real_escape_string($goodideas , $_POST['l_name']);
			$username= mysqli_real_escape_string($goodideas , $_POST['username']);
			$email= mysqli_real_escape_string($goodideas , $_POST['email']);
			$password= mysqli_real_escape_string($goodideas , $_POST['password']);
			//$hometown= mysqli_real_escape_string($goodideas , $_POST['hometown']);
			$bick_class= mysqli_real_escape_string($goodideas , $_POST['bick_class']);
			/*$major= mysqli_real_escape_string($goodideas , $_POST['major']);
			$extracurricular= mysqli_real_escape_string($goodideas , $_POST['extracurricular']);*/
			$entery_date= date("Y-m-d");
			$password=encrypt_decrypt('encrypt', $password);

			

			$add_data=$goodideas->query("UPDATE users SET 
				f_name='".$f_name."',
				l_name='".$l_name."',
				username='".$username."',
				email='".$email."',
				password='".$password."',
				bick_class='".$bick_class."',
				entery_date='".$entery_date."'
				where id='".$_POST['user_id']."'
				");
			if($add_data)
			{
			?>
				<script>
					document.location='profile.php';
				</script>
			<?php
			}
		
	}
	
}

?>