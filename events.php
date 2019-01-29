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
            <li class="breadcrumb-item active">Events</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-plus"></i>
              <a href="add_event.php">Add new Event</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SR#</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Description</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SR#</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Description</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $counter=1;
                    $get_event=$goodideas->query("SELECT * FROM events");
                    if($get_event->num_rows > 0)
                    {
                      while($get_event_row=$get_event->fetch_array())
                      {
                      ?>
                        <tr>
                          <td><?php echo $counter++;?></td>
                          <td><?php echo $get_event_row['name'];?></td>
                          <td data-title="Photo">
                              <?php
                              if($get_event_row['event_photo'] != '')
                              {?>
                                  <img src="uploads/<?php echo $get_event_row['event_photo'];?>" width="50px" height="50px" class="img-rounded" alt="" />
                              <?php
                             }
                             else
                              {
                                echo "No image Available";
                              }  
                              ?>
                          </td>
                          <td><?php  echo substr(strip_tags($get_event_row['decription']), 0, 35) . '...';?></td>
                          <td><?php echo $get_event_row['location'];?></td>
                          <td><?php echo date("d F, Y", strtotime($get_event_row['event_date']));?></td>

                          <td data-title="Action" style="display: flex;justify-content: space-evenly;">
                            <form action="view_events.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="event_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='View Commnts'><i class='fa fa-eye'></i></button>
                            </form>

                            <form action="edit_events.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="event_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit" class='btn btn-warning btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-edit'></i></button>
                            </form>
                         
                            <form action="delete_event.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="event_id" value="<?php echo $get_event_row['id'];?>">
                              <button type="submit"  onclick="return confirm('you are about to delete Event Completely. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class='fa fa-trash'></i></button>
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

        <!-- Sticky Footer -->
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