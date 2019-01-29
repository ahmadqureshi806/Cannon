<?php include '../include/config.php';
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
                      <th>Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SR#</th>
                      <th>Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
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
                          <td data-title="Photo">
                              <?php
                              if($get_event_row['user_pic'] != '')
                              {?>
                                  <img src="../uploads/<?php echo $get_event_row['user_pic'];?>" width="50px" height="50px" class="img-rounded" alt="" />
                              <?php
                             }
                             else
                              {
                                echo "No image Available";
                              }  
                              ?>
                          </td>
                          <td><?php echo $get_event_row['f_name'];?></td>
                          <td><?php echo $get_event_row['l_name'];?></td>

                          <td data-title="Action" style="display: flex;justify-content: space-evenly;">
                            <form action="view_comments.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="bickree_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='View Commnts'><i class='fa fa-eye'></i></button>
                            </form>

                            <form action="add_coment.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="user_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-warning btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='add'><i class='fa fa-plus'></i></button>
                            </form>
                            
                            
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