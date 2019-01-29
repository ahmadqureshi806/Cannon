<?php include 'include/config.php';
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
<form class="form-horizontal" action="edit_user_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="user_type" value="<?php echo $get_user_detail_row['account_type'];?>">
	<input type="hidden" name="user_id" value="<?php echo $get_user_detail_row['id'];?>">
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">First Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="f_name" id="email" placeholder="Enter First Name"  value="<?php echo $get_user_detail_row['f_name'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Last Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="l_name"  placeholder="Enter Last Name"  value="<?php echo $get_user_detail_row['l_name'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
 		
 	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Username:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="username" placeholder="Enter Username"  value="<?php echo $get_user_detail_row['username'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-6">
		      <input type="email" class="form-control" name="email" placeholder="Enter Email"  value="<?php echo $get_user_detail_row['email'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	
	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Account Type:</label>
		    <div class="col-sm-6">
		      <select class="form-control" name="acount_type">
		      	<option value="">Select Type</option>
		      	<option value="1" <?php if( $get_user_detail_row['account_type']==1){echo 'selected';}?>>Admin</option>
		      	<option value="2" <?php if( $get_user_detail_row['account_type']==2){echo 'selected';}?>>Member</option>
		      	<option value="3" <?php if( $get_user_detail_row['account_type']==3){echo 'selected';}?>>Bickeree</option>
		      </select>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>
	

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-6">
		      <button type="submit" class="btn btn-success" name="add_event" value="add_event">Edit User</button>
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
  document.location='dashboard.php';
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