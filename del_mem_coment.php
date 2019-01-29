<?php
include "include/config.php";
if(isset($_POST['comment_id']) && $_POST['comment_id'] != '')
{

		$del=$goodideas->query("DELETE FROM comments WHERE id = '".$_POST['comment_id']."' ");

        /*if($del)
			{?>
			<script>
				document.location = "view_events.php";
			</script>
			<?php
		}   
		else
		{
			echo mysqli_error($goodideas);
		}*/
}
else
{
	echo "<h2 style='text-align:center; color:red;'>You do not have Permission to DELETE Comment.";
	die();
}
?>
<script src="vendor/jquery/jquery.min.js"></script>
<form action="member_profile.php" method="POST" id="return_event">
	<input type="hidden" name="member_id" value="<?php echo $_POST['user_id'];?>">
</form>
<script>
	$("#return_event").submit();
</script>