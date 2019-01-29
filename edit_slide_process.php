<?php 
include 'include/config.php';

if(isset($_POST['slide_id']) && $_POST['slide_id'] != '')
{
		$entery_date=date("Y-m-d");
		$complete_file_name = "";
		$uploadOk = 1;

		if(isset($_FILES["slide_image"]["name"]) && $_FILES["slide_image"]["name"] != '')
		{
			$target_dir = "uploads/slideshow/";
			$target_file = $target_dir . basename($_FILES["slide_image"]["name"]);

			$complete_file_name = time()."_".clean(basename($_FILES["slide_image"]["name"]));
			$complete_directory_path = $target_dir.time()."_".clean(basename($_FILES["slide_image"]["name"]));

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		    $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
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
					
						
						    if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $complete_directory_path))
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
		else
		{
			$get_directory = $goodideas->query("SELECT * FROM slideshow WHERE  id = '".$_POST['slide_id']."' ");
			if($get_directory)
			{
				if($get_directory->num_rows > 0)
				{
					$get_directory_row = $get_directory->fetch_array();
					$complete_file_name = $get_directory_row['slide_img'];
				}
			}
		}

		if($uploadOk == 1)
		{
			$add_data=$goodideas->query("UPDATE slideshow SET 
				slide_img='".$complete_file_name."',
				entery_date='".$entery_date."'
				WHERE id = '".$_POST['slide_id']."'
				");
			if($add_data)
			{
			?>
				<script>
					document.location='slideshow.php';
				</script>
			<?php
			}
			else
			{
				echo mysqli_error($goodideas);
			}
		}
		

}


?>