<?php 
include '../include/config.php';

if(isset($_POST['add_event']) && $_POST['add_event'] != '')
{
	if((isset($_POST['coment_type']) && $_POST['coment_type'] !='') )
	{
		
		$coment_type= mysqli_real_escape_string($goodideas , $_POST['coment_type']);
		$detail= mysqli_real_escape_string($goodideas , $_POST['detail']);
		$entery_date= date("Y-m-d h:i:s");
		
		
			$add_data=$goodideas->query("INSERT into  comments SET 
				comment_type='".$coment_type."',
				detail='".$detail."',
				user_id='".$_POST['user_id']."',
				bickree_id='".$_POST['bikree_id']."',
				entery_date='".$entery_date."'
				");
			if($add_data)
			{
			?>
				<script>
					document.location='Bickeree.php';
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
		echo "Some required Fields are missing";
	}
	
}


?>