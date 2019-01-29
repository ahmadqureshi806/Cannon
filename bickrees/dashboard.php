<?php include '../include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
?>
<?php include 'include/header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
              /*
              $counter = 0;
              $get_image=$goodideas->query("SELECT * FROM slideshow");
              if($get_image->num_rows > 0)
              {
                while($get_image_row=$get_image->fetch_array())
                {
                  if($counter == 0)
                  {?>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="../uploads/slideshow/<?php echo $get_image_row['slide_img'];?>" alt="First slide">
                      </div>
                  <?php
                  }
                  else
                  {?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="../uploads/slideshow/<?php echo $get_image_row['slide_img'];?>" alt="First slide">
                      </div>
                  <?php
                  }
                  $counter++;
                }
              }
              */
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
          </div> -->
          <style>
            .carousel {
                position: relative;
                width: 60%;
                margin: 20px auto;
            }
          </style>



          <!-- Icon Cards-->
          <div class="row">
            
            <div class="col-xl-6 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list" style="color: white;"></i>
                  </div>
                  <div class="mr-5" style="font-size: 18px;color: white;">Bickerees</div>
                  <div class="mr-5" style="font-size: 23px;color: white;">
                    <?php
                    $get_data=$goodideas->query("SELECT * FROM users where account_type=3");
                    if($get_data->num_rows > 0)
                    {
                      echo $get_data->num_rows;
                    }
                    else
                    {
                      echo "0";
                    }
                    ?>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
               
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart" style="color: white;"></i>
                  </div>
                  <div class="mr-5" style="font-size: 18px;color: white;">Events</div>
                  <div class="mr-5" style="font-size: 23px;color: white;color: white;">
                    <?php
                    $get_data=$goodideas->query("SELECT * FROM events");
                    if($get_data->num_rows > 0)
                    {
                      echo $get_data->num_rows;
                    }
                    else
                    {
                      echo "0";
                    }
                    ?>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">13 New Tickets!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div> -->
          </div>

          

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        
      <!-- /.content-wrapper -->

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