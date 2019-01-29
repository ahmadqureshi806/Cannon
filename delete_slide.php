<?php
include "include/config.php";
if(isset($_POST['slide_id']) && $_POST['slide_id'] != '')
{
       $get_profile_image = $goodideas->query("SELECT * FROM slideshow WHERE id = '".$_POST['slide_id']."' ");
       if($get_profile_image)
       {
            if($get_profile_image->num_rows > 0)
            {
                $get_profile_image_row = $get_profile_image->fetch_array();
                if(unlink("uploads/slideshow/".$get_profile_image_row['slide_img']))
                {
                }
            }
        }

        $del=$goodideas->query("DELETE FROM slideshow WHERE id = '".$_POST['slide_id']."' ");

        if($del)
			{?>
			<script>
				document.location = "slideshow.php";
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
	echo "<h2 style='text-align:center; color:red;'>You do not have Permission to Slide Images.";
	die();
}

?>