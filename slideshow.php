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
          <div class="card mb-3">
            <div class="card-body" id="myvideo">
             







            <style>
              .b_profile_image
                {
                    height: 240px !important;
                    border: 1px solid #FFF;
                    padding: 5px;
                    border-radius: 5px;
                    background: #FFF;
                    margin: auto;
                }
              .carousel-inner
                {
                  border-radius: 17px;
                  background: #212529;
                  padding: 20px;
                }
                .content_container
                {
                    color: #FFF;
                    margin: auto;
                    width: 46%;
                    text-align: left;
                    margin-top: 20px;
                }
                .container_each_paragraph
                {
                  color: #FFF;
                  margin:0;
                }
                .container_each_span
                {
                  color: #FFF;
                  font-size: 12px;
                }
                .container_each_paragraph .container_each_span span
                {
                    font-weight: bold;
                    padding-right: 10px;
                    font-size: 14px;
                }
                .carousel{
                  height: 800px;
                  overflow-y: scroll;
                }
                
            </style>

              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                

                <div class="carousel-inner">
                  <?php
                  $counter = 0;
                  $get_image=$goodideas->query("SELECT CONCAT(f_name, ' ',  l_name) as complete_name,user_pic, email, username, hometown, bick_class, major, extracurricular, entery_date,id FROM users  where account_type=3");
                  if($get_image->num_rows > 0)
                  {
                    while($get_image_row = $get_image->fetch_array())
                    {
                      

                      if($counter == 0)
                      {?>
                          <div class="carousel-item active">
                            <img class="d-block b_profile_image" src="uploads/<?php echo $get_image_row['user_pic'];?>" alt="First slide">
                            <div class="content_container">
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Name:</span> <?php echo $get_image_row['complete_name'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Email:</span> <?php echo $get_image_row['email'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Username:</span> <?php echo $get_image_row['username'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Home Town:</span> <?php echo $get_image_row['hometown'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Class:</span> <?php echo $get_image_row['bick_class'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Major:</span> <?php echo $get_image_row['major'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Extracurricular:</span> <?php echo $get_image_row['extracurricular'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Registration Date:</span> <?php echo date("d F, Y", strtotime($get_image_row['entery_date']));?></label>
                              </p>
                            </div>


                                
                                <div class="event_comments2">
                                  <h3 style="color: white;">Comments</h3>
                                  <?php
                                  $red=0;
                                  
                                  $get_com=$goodideas->query("SELECT * FROM comments where bickree_id='".$get_image_row['id']."' ORDER by comment_type asc ");
                                  if($get_com->num_rows > 0)
                                  {
                                    while($get_com_row=$get_com->fetch_array())
                                    {
                                      if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==1)
                                      {
                                        echo "<h4 style='color: white;'>Red Card</h4>";
                                      }
                                      else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==2)
                                      {
                                        echo "<h4 style='color: white;'>Green Card</h4>";
                                      }
                                      else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==3)
                                      {
                                        echo "<h4 style='color: white;'>Crane Card</h4>";
                                      }
                                      else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==4)
                                      {
                                        echo "<h4 style='color: white;'>Last Card</h4>";
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
                      else
                      {?>
                          <div class="carousel-item">
                             <img class="d-block b_profile_image" src="uploads/<?php echo $get_image_row['user_pic'];?>" alt="First slide">
                            <div class="content_container">
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Name:</span> <?php echo $get_image_row['complete_name'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Email:</span> <?php echo $get_image_row['email'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Username:</span> <?php echo $get_image_row['username'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Home Town:</span> <?php echo $get_image_row['hometown'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Class:</span> <?php echo $get_image_row['bick_class'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Major:</span> <?php echo $get_image_row['major'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Extracurricular:</span> <?php echo $get_image_row['extracurricular'];?></label>
                              </p>
                              <p class="container_each_paragraph">
                                <label class="container_each_span"><span>Registration Date:</span> <?php echo date("d F, Y", strtotime($get_image_row['entery_date']));?></label>
                              </p>
                            </div>


                              
                              <div class="event_comments2">
                                <h3 style='color: white;'>Comments</h3>
                                <?php
                                $red=0;
                                
                                $get_com=$goodideas->query("SELECT * FROM comments where bickree_id='".$get_image_row['id']."' ORDER by comment_type asc ");
                                if($get_com->num_rows > 0)
                                {
                                  while($get_com_row=$get_com->fetch_array())
                                  {
                                    if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==1)
                                    {
                                      echo "<h4 style='color: white;'>Red Card</h4>";
                                    }
                                    else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==2)
                                    {
                                      echo "<h4 style='color: white;'>Green Card</h4>";
                                    }
                                    else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==3)
                                    {
                                      echo "<h4 style='color: white;'>Crane Card</h4>";
                                    }
                                    else if($get_com_row['comment_type']!=$red && $get_com_row['comment_type']==4)
                                    {
                                      echo "<h4 style='color: white;'>Last Card</h4>";
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
                      $counter++;
                    }
                  }
                  ?>
                  
                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <style>
              .carousel {
                  position: relative;
                  width: 60%;
                  margin: 20px auto;
              }
            </style>





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