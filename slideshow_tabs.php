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
            <li class="breadcrumb-item active">Slide Show</li>
          </ol>

          <button onclick="openFullscreen();" class="btn btn-success" style="margin-bottom: 30px;">Open in Fullscreen Mode</button>

          <!-- DataTables Example -->
          <div class="card mb-3"  id="myvideo">
            <div class="card-body">
              

              <div class="row">
                <div class="col-sm-3 bick_name_colm">
                  <h3 style="color:white;padding: 5px 10px;border-bottom: 2px solid;">Bickrees</h3>
                    <ul class="bick_name">
                      <?php
                      $get_image=$goodideas->query("SELECT CONCAT(f_name, ' ',  l_name) as complete_name , id FROM users where account_type=3");
                      if($get_image->num_rows > 0)
                      {
                        while($get_image_row = $get_image->fetch_array())
                        {
                          if(isset($_GET['bick_id']) && $_GET['bick_id'] == $get_image_row['id'] )
                          {
                            ?>
                            <li class="active"><a href="slideshow.php?bick_id=<?php echo $get_image_row['id'];?>"><?php echo $get_image_row['complete_name'];?></a></li>
                            <?php
                          }
                          else
                          {
                          ?>
                          <li><a href="slideshow.php?bick_id=<?php echo $get_image_row['id'];?>"><?php echo $get_image_row['complete_name'];?></a></li>
                          <?php
                          }
                        }
                      }
                      ?>
                    </ul>
                </div>

                <?php
                if(isset($_GET['bick_id']) && $_GET['bick_id'] != '')
                {
                  $get_name=$goodideas->query("SELECT * FROM users where id='".$_GET['bick_id']."' ");
                  if($get_name->num_rows > 0)
                  {
                    $get_name_row=$get_name->fetch_array();
                  }
                ?>
                  <div class="col-sm-9 bick_detail">

                    <div class="main_container2">
                      <div class="profile_img">
                        <?php
                        if($get_name_row['user_pic'] != '')
                        {
                        ?>
                          <img src="uploads/<?php echo $get_name_row['user_pic'];?>" class="img-rounded" alt="" style="width:100%;" />
                        <?php  
                        }
                        ?>
                        
                      </div>

                      <div class="prof_detail">
                        <h4>Name: <?php echo $get_name_row['f_name']." ".$get_name_row['l_name']." "; ?></h4>
                        <h4>Class: <?php echo $get_name_row['bick_class']; ?></h4>
                        <h4>Major: <?php echo $get_name_row['major']; ?></h4>
                        <h4>Extracurricular: <?php echo $get_name_row['extracurricular']; ?></h4>
                      </div>

                    </div>

                    <div class="event_comments">
                      <h3>Comments</h3>
                      <?php
                      $red=0;
                      
                      $get_com=$goodideas->query("SELECT * FROM comments where bickree_id='".$_GET['bick_id']."' ORDER by comment_type asc ");
                      if($get_com->num_rows > 0)
                      {
                        while($get_com_row=$get_com->fetch_array())
                        {
                          if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==1)
                          {
                            echo "<h4>Red Card</h4>";
                          }
                          else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==2)
                          {
                            echo "<h4>Green Card</h4>";
                          }
                          else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==3)
                          {
                            echo "<h4>Crane Card</h4>";
                          }
                          else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==4)
                          {
                            echo "<h4>Last Card</h4>";
                          }
                          $red=$get_com_row['comment_type'];
                        ?>
                          <div class="col-sm-12 coment_box">
                            <div class="coment_name">
                              <span>
                              <?php
                              $get_name=$goodideas->query("SELECT * FROM users where id='".$get_com_row['user_id']."' ");
                              if($get_name->num_rows > 0)
                              {
                                $get_name_row=$get_name->fetch_array();
                                echo $get_name_row['f_name']." ".$get_name_row['l_name']." ";
                                if($get_name_row['account_type']==2)
                                {
                                  echo "(Member)";
                                }
                                else if($get_name_row['account_type']==3)
                                {
                                  echo "(Bickree)";
                                }
                              }
                              ?>
                              </span>
                            </div>
                            <div class="coment_detail">
                              
                              <p style="margin-bottom: 0;">
                                <?php
                                if($get_com_row['comment_type'] ==1)
                                {
                                  echo "Red Card";
                                }
                                else if($get_com_row['comment_type'] ==2)
                                {
                                  echo "Green Card";
                                }
                                else if($get_com_row['comment_type'] ==3)
                                {
                                  echo "Crane Card";
                                }
                                else if($get_com_row['comment_type'] ==4)
                                {
                                  echo "Last Word";
                                }
                                 
                                ?>
                              </p>

                              <p><?php echo $get_com_row['detail'];?></p>
                            </div>

                            <div class="close_coment">
                              <span style="float:left;padding-right: 10px;"><?php echo date("d F,Y" , strtotime($get_com_row['entery_date']))." ".date("H:i:s" , strtotime($get_com_row['entery_date']));?></span>

                            </div>
                          </div>
                        <?php
                        }
                      }
                      else
                      {
                        echo "No comments on this Bickree";
                      }
                      ?>
                      

                    </div>

                  </div>
                <?php
                }
                ?>
                
              </div>


             

            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
<?php include 'include/footer.php';?>

<script>
var elem = document.getElementById("myvideo");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}
</script>

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