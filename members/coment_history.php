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
            <li class="breadcrumb-item active">Comment History</li>
          </ol>

          <div class="row">
            <div class="col-xl-6 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                
                <div class="card-body">
                  <!-- <div class="card-body-icon">
                    <i class="fas fa-fw fa-list" style="color: white;"></i>
                  </div> -->
                  <div class="mr-5" style="font-size: 18px;color: white;">Crane Card Used</div>
                  <div class="mr-5" style="font-size: 23px;color: white;">
                    <?php
                    $get_data=$goodideas->query("SELECT * FROM comments where user_id='".$_SESSION['admin']."' AND comment_type=3 ");
                    if($get_data->num_rows > 0)
                    {
                      $get_data_row=$get_data->fetch_array();
                      $get_bick=$goodideas->query("SELECT * FROM users where id='".$get_data_row['bickree_id']."' ");
                      if($get_bick->num_rows > 0)
                      {
                        $get_bick_row=$get_bick->fetch_array();

                        echo "YES "."(".$get_bick_row['f_name']." ".$get_bick_row['l_name'].")";
                      }
                      
                    }
                    else
                    {
                      echo "No";
                    }
                    ?>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
               
                <div class="card-body">
                 <!--  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart" style="color: white;"></i>
                  </div> -->
                  <div class="mr-5" style="font-size: 18px;color: white;">Last Word Used</div>
                  <div class="mr-5" style="font-size: 23px;color: white;color: white;">
                    <?php
                    $get_data=$goodideas->query("SELECT * FROM comments where user_id='".$_SESSION['admin']."' AND comment_type=4");
                    if($get_data->num_rows > 0)
                    {
                      $get_data_row=$get_data->fetch_array();
                      $get_bick=$goodideas->query("SELECT * FROM users where id='".$get_data_row['bickree_id']."' ");
                      if($get_bick->num_rows > 0)
                      {
                        $get_bick_row=$get_bick->fetch_array();

                        echo "YES "."(".$get_bick_row['f_name']." ".$get_bick_row['l_name'].")";
                      }
                    }
                    else
                    {
                      echo "No";
                    }
                    ?>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

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
                      <th>Entry Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SR#</th>
                      <th>Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Entry Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $counter=1;
                    $get_event=$goodideas->query("SELECT comments.id,comments.user_id,comments.bickree_id,comments.comment_type,comments.detail,comments.entery_date as coment_date, users.id as bick_id,users.user_pic,users.f_name, users.l_name FROM  comments INNER JOIN users ON  users.account_type = 3 AND  comments.bickree_id=users.id AND comments.user_id='".$_SESSION['admin']."' Group by comments.bickree_id order by comments.entery_date desc");
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

                          <td><?php echo date("d F, Y", strtotime($get_event_row['coment_date']));?></td>

                          <td data-title="Action" style="display: flex;justify-content: space-evenly;">
                            <form action="view_history.php" method="post" class="action_form_buttons">
                              <input type="hidden" name="bickree_id" value="<?php echo $get_event_row['bick_id'];?>">
                              <button type="submit" class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='View Commnts'><i class='fa fa-eye'></i></button>
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