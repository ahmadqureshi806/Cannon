<?php
include "include/config.php";
if(isset($_POST['pass_code']) && $_POST['pass_code'] != '')
{
       if($_POST['pass_code']==$admin_pass_code)
       {
       		$del=$goodideas->query("DELETE FROM users WHERE account_type != 1 ");
       		$del=$goodideas->query("DELETE FROM comments");

	        if($del)
			{
			?>
				<script>
					document.location = "profile.php";
				</script>
			<?php
			}   
			else
			{
				echo mysqli_error($goodideas);
			}
       }
       else
       {
       	echo "<h2 style='text-align:center; color:red;'>You Entered Wrong Pass Code.";
		die();
       }

		
}
else
{
	echo "<h2 style='text-align:center; color:red;'>You do not have Permission to DELETE All Data.";
	die();
}

?>