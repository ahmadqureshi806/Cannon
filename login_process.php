<?php 
include 'include/config.php';

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
			echo "<h1 style='color:red; text-align:center;'> Username or Password Dont Match</h1>";
		}
		
	}
	
}

?>