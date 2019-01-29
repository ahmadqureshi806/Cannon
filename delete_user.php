<?php
include "include/config.php";
if(isset($_POST['user_id']) && $_POST['user_id'] != '')
{
       if($_POST['pass_code']==$admin_pass_code)
       {
       		$get_profile_image = $goodideas->query("SELECT * FROM users WHERE id = '".$_POST['user_id']."' ");
		       if($get_profile_image)
		       {
		            if($get_profile_image->num_rows > 0)
		            {
		                $get_profile_image_row = $get_profile_image->fetch_array();
		                if(unlink("uploads/".$get_profile_image_row['user_pic']))
		                {
		                }
		            }
		        }
		        
       		$del=$goodideas->query("DELETE FROM users WHERE id = '".$_POST['user_id']."' ");

	        if($del)
			{
				if($_POST['user_type']==2)
				{
					$del=$goodideas->query("DELETE FROM comments WHERE user_id = '".$_POST['user_id']."' ");
				?>
				<script>
					document.location = "users.php";
				</script>
				<?php
				}
				else if($_POST['user_type']==3)
				{
					$del=$goodideas->query("DELETE FROM comments WHERE bickree_id = '".$_POST['user_id']."' ");
				?>
				<script>
					document.location = "Bickeree.php";
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
       	echo "<h2 style='text-align:center; color:red;'>You Entered Wrong Pass Code.";
		die();
       }

		
}
else
{
	echo "<h2 style='text-align:center; color:red;'>You do not have Permission to DELETE User.";
	die();
}

?>