<?php
include "include/config.php";
if(isset($_POST['event_id']) && $_POST['event_id'] != '')
{
       $get_profile_image = $goodideas->query("SELECT * FROM events WHERE id = '".$_POST['event_id']."' ");
       if($get_profile_image)
       {
            if($get_profile_image->num_rows > 0)
            {
                $get_profile_image_row = $get_profile_image->fetch_array();
                if(unlink("uploads/".$get_profile_image_row['event_photo']))
                {
                }
            }
        }

		$del=$goodideas->query("DELETE FROM events WHERE id = '".$_POST['event_id']."' ");

        if($del)
			{?>
			<script>
				document.location = "events.php";
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
	echo "<h2 style='text-align:center; color:red;'>You do not have Permission to DELETE Event.";
	die();
}

?>