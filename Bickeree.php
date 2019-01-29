<?php include 'include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
?>
<?php include 'include/header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Bickerees</li>
          </ol>

          <button onclick="window.location='view_slideshow.php'" class="btn btn-success" style="margin-bottom: 30px;">Bickree Slide Show</button>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <!-- <div class="card-header">
              <i class="fas fa-plus"></i>
              <a href="add_event.php">Add new Event</a></div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SR#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>User Type</th>
                      <th>Entery Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SR#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>User Type</th>
                      <th>Entery Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $counter=1;
                    $get_event=$goodideas->query("SELECT * FROM users where account_type = 3");
                    if($get_event->num_rows > 0)
                    {
                      while($get_event_row=$get_event->fetch_array())
                      {
                      ?>
                        <tr>
                          <td><?php echo $counter++;?></td>
                          <td><?php echo $get_event_row['f_name'];?></td>
                          <td><?php echo $get_event_row['l_name'];?></td>
                          <td><?php echo $get_event_row['username'];?></td>
                          <td><?php echo $get_event_row['email'];?></td>
                          <td>
                            <?php 
                            if($get_event_row['account_type']==1)
                            {
                              echo "Admin";
                            }
                            else if($get_event_row['account_type']==2)
                            {
                              echo "Member";
                            }
                            else
                            {
                              echo "Bickeree";
                            }
                            ?>
                              
                          </td>
                          <td><?php echo date("d F, Y", strtotime($get_event_row['entery_date']));?></td>

                          <td data-title="Action" style="display: flex;justify-content: space-evenly;">
                            <form action="view_comments.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="bickree_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='View Commnts'><i class='fa fa-eye'></i></button>
                            </form>

                            <form action="edit_user.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="user_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-warning btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-edit'></i></button>
                            </form>
                            
                            <button type="button" class="btn btn-danger btn-xs mrg" onclick="passcode_del(<?php echo $get_event_row['id'] ?> , <?php echo $get_event_row['account_type'] ?>)" data-toggle="modal" data-target="#c_Modal"><i class='fa fa-trash'></i></button>

                            <!-- <button type="button" class="btn btn-danger btn-xs mrg" onclick="<?php $user_id = $get_event_row['id'] ?>" data-toggle="modal" data-target="#myModal"><i class='fa fa-trash'></i></button> -->
                            <!-- <form action="delete_user.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="user_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit"  onclick="return confirm('you are about to delete User Completely. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class='fa fa-trash'></i></button>
                            </form> -->
                          </td>

                        </tr>
                      <?php
                      }
                    }
                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
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
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p>Are You Sure You want to delte This User?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success" onclick="<?php $user_id;?>" data-toggle="modal" data-target="#myModal">Yes</button>
      </div>
    </div>

  </div>
</div>



<form action="delete_user.php" method="post" class="form-horizontal">
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
        <button type="submit" class="btn btn-success">Delete Bickerees</button>
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