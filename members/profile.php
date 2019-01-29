<?php include '../include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
?>

<?php include 'include/header.php';?>

<div class="container-fluid">
<ol class="breadcrumb">
	<li class="breadcrumb-item">
	  <a href="dashboard.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Profile</li>
</ol>
<?php
	$password='';
    $get_user_detail = $goodideas->query("SELECT * FROM users WHERE id = '".$_SESSION['admin']."'");
    if($get_user_detail)
    {
        if($get_user_detail->num_rows > 0)
        {
            $get_user_detail_row = $get_user_detail->fetch_array();
            $password=encrypt_decrypt('decrypt', $get_user_detail_row['password']);
        }
        else
        {
            echo "<h2>No Record Found</h2>";
            die();
        }
    }
?>
<form class="form-horizontal" action="update_profile.php" method="post" enctype="multipart/form-data">
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
		    <label class="control-label col-sm-2" for="email">Password:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="password" placeholder="Enter Email"  value="<?php echo $password;?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<!-- <div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Home Town:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="hometown" placeholder="Enter Home Town"  value="<?php echo $get_user_detail_row['hometown'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div> -->


	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Class:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="bick_class" placeholder="Enter Class"  value="<?php echo $get_user_detail_row['bick_class'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<!-- <div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Major:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="major" placeholder="Enter Major"  value="<?php echo $get_user_detail_row['major'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>

	<div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Extracurricular:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="extracurricular" placeholder="Enter Extracurricular"  value="<?php echo $get_user_detail_row['extracurricular'];?>" required="required">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div> -->

	<!-- <div class="form-group">
	  	<div class="row">
		    <label class="control-label col-sm-2" for="email">Profile Pic:</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control" name="user_pic">
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div> -->

	
	

	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-4">
		      <button type="submit" class="btn btn-success" name="update_profile" value="update_profile">Update Profile</button>
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
  document.location='../index.php';
</script>
<?php
}
?>