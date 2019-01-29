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
<form action="view_comments.php" method="POST" id="return_event">
	<input type="hidden" name="bickree_id" value="<?php echo $_POST['bickree_id'];?>">
</form>
<script>
	$("#return_event").submit();
</script>