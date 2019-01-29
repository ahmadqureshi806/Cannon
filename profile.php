<?php include 'include/config.php';
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
	</div>

	<div class="form-group">
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


	<div class="form-group"> 
		<div class="row">
			<label class="control-label col-sm-2"></label>
		    <div class=" col-sm-4">
		       <button type="button" class="btn btn-danger btn-xs mrg" onclick="passcode_del(<?php echo $get_event_row['id'] ?> , <?php echo $get_event_row['account_type'] ?>)" data-toggle="modal" data-target="#c_Modal">Delte All Data</button>
		    </div>
		    <span class="col-sm-4"></span>
		</div>
	</div>



</div>

<script>
  function passcode_del(user_id,user_type)
  {
    document.getElementById("get_user_id").value=user_id;
    document.getElementById("get_user_type").value=user_type;
  }
</script>
<div id="c_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete All Data</h4>
      </div>
      <div class="modal-body">
        <p>Are You Sure You want to delte All Data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success" onclick="<?php $user_id;?>" data-toggle="modal" data-target="#myModal">Yes</button>
      </div>
    </div>

  </div>
</div>



<form action="delete_all_data.php" method="post" class="form-horizontal">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-2" for="email">PassCode:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pass_code" placeholder="Enter Pass Code" required="required">
                  <input type="hidden" name="user_id" id="get_user_id">
                  <input type="hidden" name="user_type" id="get_user_type">
                </div>
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Delete All Data</button>
      </div>
    </div>

  </div>
</div>
</form>

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