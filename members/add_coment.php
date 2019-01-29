<?php include '../include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
if(isset($_POST['user_id']) && $_POST['user_id'] !='')
{
?>

<?php include 'include/header.php';?>

<div class="container-fluid">

<?php
    $get_user_detail = $goodideas->query("SELECT * FROM users WHERE id = '".$_POST['user_id']."'");
    if($get_user_detail)
    {
        if($get_user_detail->num_rows > 0)
        {
            $get_user_detail_row = $get_user_detail->fetch_array();
        }
        else
        {
            echo "<h2>No Record Found</h2>";
            die();
        }
    }
?>
<form class="form-horizontal" action="add_comment_process.php" method="post">
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['admin'];?>">
	<input type="hidden" name="bikree_id" value="<?php echo $get_user_detail_row['id'];?>">

	<?php
	$crane_card=0;
	$last_card=0;
	$get_card=$goodideas->query("SELECT * FROM comments where user_id='".$_SESSION['admin']."'  AND comment_type=3");
	if($get_card->num_rows > 0)
	{
		$crane_card=1;
	}
	$get_card=$goodideas->query("SELECT * FROM comments where user_id='".$_SESSION['admin']."' AND comment_type=4");
	if($get_card->num_rows > 0)
	{
		$last_card=1;
	}
	?>


	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Comment Type:</label>
		    <div class="col-sm-6">
		      <select name="coment_type" class="form-control" required="required" onchange="get_data(this.value);">
		      	<option value="">Select Comment Type</option>
		      	<option value="1">Red Card</option>
		      	<option value="2">Green Card</option>
		      	
		      	<?php
		      	if($crane_card==0)
		      	{
		      	?>
		      		<option value="3">Crane Card</option>
		      	<?php
		      	}
		      	else
		      	{
		      	?>
		      		<option value="3" disabled="disabled">Crane Card</option>
		      	<?php
		      	}
		      	?>
		      	
		      	<?php
		      	if($last_card==0)
		      	{
		      	?>
		      		<option value="4">Last Word</option>
		      	<?php
		      	}
		      	else
		      	{
		      	?>
		      		<option value="4" disabled="disabled">Last Word</option>
		      	<?php
		      	}
		      	?>
		      	
		      </select>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Comment Detail:</label>
		    <div class="col-sm-6">
		      <textarea name="detail" class="form-control" id="detail"></textarea>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	
 		
	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Add Comment</button>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
</form>

</div>



<?php include 'include/footer.php';?>

<script>
function get_data(type)
{
	if(type==1)
	{
		$("#detail").removeAttr("required");	
	}
	else if(type==2)
	{
		$("#detail").removeAttr("required");	
	}
	else if(type==3)
	{
		$("#detail").attr("required","required");	
	}
	else if(type==4)
	{
		$("#detail").attr("required","required");	
	}
}	
</script>
<?php
}
else
{
?>
<script>
  document.location='dashboard.php';
</script>
<?php
}

}
else
{
?>
<script>
  document.location='../index.php';
</script>
<?php
}
?>