<?php include 'include/config.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] !='')
{
if(isset($_POST['member_id']) && $_POST['member_id'] !='')
{
?>
<?php include 'include/header.php';?>

        <div class="container-fluid">

         
          <!-- Breadcrumbs-->

              <?php
              $get_name=$goodideas->query("SELECT * FROM users where id='".$_POST['member_id']."' ");
              if($get_name->num_rows > 0)
              {
                $get_name_row=$get_name->fetch_array();
                //echo $get_name_row['f_name']." ".$get_name_row['l_name']." ";
              }
              ?>
            

          <div class="main_container">
            

            <div class="prof_detail">
              <h4>Name: <?php echo $get_name_row['f_name']." ".$get_name_row['l_name']." "; ?></h4>
              <h4>Class: <?php echo $get_name_row['bick_class']; ?></h4>
              <!-- <h4>Major: <?php echo $get_name_row['major']; ?></h4>
              <h4>Extracurricular: <?php echo $get_name_row['extracurricular']; ?></h4> -->
            </div>

          </div>

          <div style="clear:both"></div>


          <div class="event_comments">
            <h3>Comments History</h3>
            <?php
            $red=0;
            $get_com=$goodideas->query("SELECT * FROM comments where user_id='".$_POST['member_id']."' ORDER by comment_type asc ");
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
                <div class="col-sm-10 coment_box">
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
                      $get_bick=$goodideas->query("SELECT * FROM users where id='".$get_com_row['bickree_id']."' ");
                      if($get_bick->num_rows > 0)
                      {
                        $get_bick_row=$get_bick->fetch_array();
                      }

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
                    <form action="del_mem_coment.php" method="post" style="float:left;">
                      <input type="hidden" name="comment_id" value="<?php echo $get_com_row['id'];?>">
                      <input type="hidden" name="user_id" value="<?php echo $_POST['member_id'];?>">
                      <button type="submit" name="del_comment" onclick="return confirm('You are About to Delete a comment . Are You Sure?')" value="del_coment"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </form>
                  </div>
                </div>
              <?php
              }
            }
            else
            {
              echo "No comments of this member";
            }
            ?>
            

          </div>


        </div>
        

<?php include 'include/footer.php';?>
<?php
}
else
{
?>
<script>
  document.location='users.php';
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