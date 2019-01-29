<?php include 'include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
?>

<?php include 'include/header.php';?>

<div class="container-fluid">
		<ol class="breadcrumb">
		    <li class="breadcrumb-item">
		      <a href="events.php">SlideShow</a>
		    </li>
		    <li class="breadcrumb-item active">Add SlideShow</li>
	  	</ol>
<form class="form-horizontal" action="add_slide_process.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Upload Images:</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control" name="slide_image[]" multiple="multiple">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Add Slideshow</button>
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