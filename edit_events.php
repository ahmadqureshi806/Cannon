<?php include 'include/config.php';

if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
if(isset($_POST['event_id']) && $_POST['event_id'] !='')
{
?>

<?php include 'include/header.php';?>

<div class="container-fluid">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="events.php">Events</a>
    </li>
    <li class="breadcrumb-item active">Edit Events</li>
</ol>

<?php
    $get_user_detail = $goodideas->query("SELECT * FROM events WHERE id = '".$_POST['event_id']."'");
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
<form class="form-horizontal" action="edit_event_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="event_id" value="<?php echo $get_user_detail_row['id'];?>">
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="e_name" id="email" placeholder="Enter Event Name"  value="<?php echo $get_user_detail_row['name'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
 		
 	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Location:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="location" placeholder="Enter Location"  value="<?php echo $get_user_detail_row['location'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Date:</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" name="date" placeholder="Enter Date"  value="<?php echo $get_user_detail_row['event_date'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Description:</label>
		    <div class="col-sm-6">
		      <textarea class="form-control" name="description" placeholder="Enter Description" required="required"><?php echo $get_user_detail_row['decription'];?></textarea>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Photo:</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control" name="event_photo"  value="<?php echo $get_user_detail_row['event_photo'];?>" >
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Edit Event</button>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
</form>
</div>

<?php include 'include/footer.php';?>
<?php
}
else
{
?>
<script>
  document.location='events.php';
</script>
<?php
}

}
else
{
?>
<script>
  document.location='index.php';
</script>
<?php
}
?>