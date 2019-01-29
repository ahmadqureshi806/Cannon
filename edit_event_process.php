<?php 
include 'include/config.php';

if(isset($_POST['add_event']) && $_POST['add_event'] != '')
{
	if((isset($_POST['e_name']) && $_POST['e_name'] !='') && (isset($_POST['location']) && $_POST['location'] !='') && (isset($_POST['date']) && $_POST['date'] !='') && (isset($_POST['description']) && $_POST['description'] !=''))
	{
		
		$e_name= mysqli_real_escape_string($goodideas , $_POST['e_name']);
		$location= mysqli_real_escape_string($goodideas , $_POST['location']);
		$date= mysqli_real_escape_string($goodideas , date("Y-m-d", strtotime($_POST['date'])));
		$description= mysqli_real_escape_string($goodideas , $_POST['description']);
		$entery_date= date("Y-m-d");
		
		$complete_file_name = "";
		$uploadOk = 1;

		if(isset($_FILES["event_photo"]["name"]) && $_FILES["event_photo"]["name"] != '')
		{
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["event_photo"]["name"]);

			$complete_file_name = time()."_".clean(basename($_FILES["event_photo"]["name"]));
			$complete_directory_path = $target_dir.time()."_".clean(basename($_FILES["event_photo"]["name"]));

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		    $check = getimagesize($_FILES["event_photo"]["tmp_name"]);
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
					
						
						    if (move_uploaded_file($_FILES["event_photo"]["tmp_name"], $complete_directory_path))
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
			$get_directory = $goodideas->query("SELECT * FROM events WHERE  id = '".$_POST['event_id']."' ");
			if($get_directory)
			{
				if($get_directory->num_rows > 0)
				{
					$get_directory_row = $get_directory->fetch_array();
					$complete_file_name = $get_directory_row['event_photo'];
				}
			}
		}

		if($uploadOk == 1)
		{
			$add_data=$goodideas->query("UPDATE events SET 
				name='".$e_name."',
				location='".$location."',
				event_date='".$date."',
				decription='".$description."',
				event_photo='".$complete_file_name."',
				entery_date='".$entery_date."'
				WHERE id = '".$_POST['event_id']."'
				");
			if($add_data)
			{
			?>
				<script>
					document.location='events.php';
				</script>
			<?php
			}
			else
			{
				echo mysqli_error($goodideas);
			}
		}
		
	}
	else
	{
		echo "Some required Fields are missing";
	}
	
}


?>