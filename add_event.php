<?php include 'include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
?>

<?php include 'include/header.php';?>

<div class="container-fluid">
		<ol class="breadcrumb">
		    <li class="breadcrumb-item">
		      <a href="events.php">Events</a>
		    </li>
		    <li class="breadcrumb-item active">Add Events</li>
	  	</ol>
<form class="form-horizontal" action="add_evet_process.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="e_name" id="email" placeholder="Enter Event Name" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
 		
 	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Location:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="location" placeholder="Enter Location" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Date:</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" name="date" placeholder="Enter Date" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Description:</label>
		    <div class="col-sm-6">
		      <textarea class="form-control" name="description" placeholder="Enter Description" required="required"></textarea>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Photo:</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control" name="event_photo">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Add Event</button>
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
  document.location='index.php';
</script>
<?php
}
?>