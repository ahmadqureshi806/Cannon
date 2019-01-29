<?php include 'include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
if(isset($_POST['event_id']) && $_POST['event_id'] !='')
{
?>
<?php include 'include/header.php';?>

        <div class="container-fluid">

          <?php
              $get_user_detail = $goodideas->query("SELECT * FROM events WHERE id = '".$_POST['event_id']."'");
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
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><?php echo $get_user_detail_row['name']; ?></li>
             <li class="breadcrumb-item active"><?php echo date("d F,Y" ,strtotime($get_user_detail_row['event_date'])); ?></li>
          </ol>

          <div class="event_img">
            <img src="uploads/<?php echo $get_user_detail_row['event_photo'];?>" class="img-rounded" alt="" style="width:100%;" />
          </div>

          <div class="event_description">
            <p><?php echo $get_user_detail_row['decription'];?></p>
          </div>


        </div>
        

<?php include 'include/footer.php';?>
<?php
}
else
{
?>
<script>
  document.location='events.php';
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