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
		    <li class="breadcrumb-item active">Edit Slide</li>
	  	</ol>
<?php
    $get_user_detail = $goodideas->query("SELECT * FROM slideshow WHERE id = '".$_POST['slide_id']."'");
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
<form class="form-horizontal" action="edit_slide_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="slide_id" value="<?php echo $get_user_detail_row['id'];?>">
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Upload Image:</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control" name="slide_image">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Edit Slideshow</button>
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