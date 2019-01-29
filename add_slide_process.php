<?php
include "include/config.php";
if(isset($_POST['add_event']) && $_POST['add_event'] != '')
{
	$date=date("Y-m-d");
	$uploadOk = 1;
		if(isset($_FILES["slide_image"]["name"]) && $_FILES["slide_image"]["name"] != '')
			{
				 $count=count($_FILES['slide_image']['name']);
				for($start=0;$start<$count;$start++)
				{
					$start;
					$target_dir= "uploads/slideshow/";
					$target_file = $target_dir . basename($_FILES["slide_image"]["name"][$start]);
					$complete_file_name = time()."_".clean(basename($_FILES["slide_image"]["name"][$start]));
					$complete_directory_path = $target_dir.time()."_".clean(basename($_FILES["slide_image"]["name"][$start]));
					$imageFileType = strtolower($_FILES["slide_image"]["type"][$start]);
					$type_file = "";
					$check = getimagesize($_FILES["slide_image"]["tmp_name"][$start]);
					if($check !== false)
					    {
					        $uploadOk = 1;
					        if($imageFileType == "image/jpg" || $imageFileType == "image/png" || $imageFileType == "image/jpeg" || $imageFileType == "image/gif")
								{
									
									
								    if ($uploadOk == 0)
								    {
									    echo "Sorry, your file was not uploaded.";
									    die();
									}
									else
									{
									    if (move_uploaded_file($_FILES["slide_image"]["tmp_name"][$start], $complete_directory_path))
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
								}
								else
								{
									echo "Sorry, only JPG, JPEG, PNG, PDF, xlsx, docx, Mp4 & GIF files are allowed.";
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


			
				$query=$goodideas->query("INSERT into slideshow SET
					slide_img='".$complete_file_name."',
					entery_date='".$date."'
				");
				

				}
			}
			if($query)
			{?>
				<script>
					document.location="slideshow.php";
				</script>
			<?php
			}
}
