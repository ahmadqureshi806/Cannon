<?php 
include 'include/config.php';

if(isset($_POST['add_event']) && $_POST['add_event'] != '')
{
	if((isset($_POST['f_name']) && $_POST['f_name'] !='') && (isset($_POST['l_name']) && $_POST['l_name'] !='') && (isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['acount_type']) && $_POST['acount_type'] !=''))
	{
		
		$f_name= mysqli_real_escape_string($goodideas , $_POST['f_name']);
		$l_name= mysqli_real_escape_string($goodideas , $_POST['l_name']);
		$username= mysqli_real_escape_string($goodideas , $_POST['username']);
		$email= mysqli_real_escape_string($goodideas , $_POST['email']);
		$acount_type= mysqli_real_escape_string($goodideas , $_POST['acount_type']);
		$entery_date= date("Y-m-d");
		
		
			$add_data=$goodideas->query("UPDATE users SET 
				f_name='".$f_name."',
				l_name='".$l_name."',
				username='".$username."',
				email='".$email."',
				account_type='".$acount_type."',
				entery_date='".$entery_date."'
				WHERE id = '".$_POST['user_id']."'
				");
			if($add_data)
			{
				if($_POST['user_type']==2)
				{
				?>
					<script>
						document.location='users.php';
					</script>
				<?php
				}
				else if($_POST['user_type']==3)
				{
				?>
					<script>
						document.location='Bickeree.php';
					</script>
				<?php	
				}
			}
			else
			{
				echo mysqli_error($goodideas);
			}
		
		
	}
	else
	{
		echo "Some required Fields are missing";
	}
	
}


?>