<?php include 'include/config.php';
if(isset($_GET['event_id']) && $_GET['event_id'] != '')
{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>

<!-- meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale:1.0">

<!-- site title -->
<title>Cannon Club</title>

<!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- css link -->
<link rel="stylesheet" type="text/css" href="./css/style.css">

<!-- boostrap3 CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- boostrap4 CDN
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->

<!-- style -->
<style></style>
</head>
<body>
    <div class="wrapper">
	    <header>
		    <div class="content-container">
			    <nav class="navbar navbar-inverse">
					  <div class="container-fluid">
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						  </button>
						  <a class="navbar-brand" href="index.php">Cannon</a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
						  <!-- <ul class="nav navbar-nav">
							<li><a href="#" class="icon fb-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="icon twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="icon insta-icon"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						  </ul> -->
						  <ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="#">HOME</a></li>
							<?php
							$url='';
							if(isset($_SESSION['admin']) && $_SESSION['admin'] != '')
							{
								if($_SESSION['type']==1)
								{
									$url="dashboard.php";
								}
								else if($_SESSION['type']==2)
								{
									$url="members/dashboard.php";
								}
								else if($_SESSION['type']==3)
								{
									$url="bickrees/dashboard.php";
								}
							?>
								<li><a href="<?php echo $url;?>">Profile Homepage</a></li>
							<?php
							}
							else
							{
							?>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Sign Up</a></li>
							<?php
							}
							?>
							
							
							<!-- <li><a href="#">CONTACT</a></li>
							<li><a href="#">DONATE</a></li> -->
						  </ul>
						</div>
					  </div>
				</nav>
			</div>
		</header>
		<main class="page2-main">
		     <div class="container">
			     <div class="row">
			     	<?php
			     		$get_event=$goodideas->query("SELECT * FROM events where id='".$_GET['event_id']."' ");
			     		if($get_event->num_rows > 0)
			     		{
			     			$get_event_row=$get_event->fetch_array();
			     		}
			     		else
			     		{
			     			echo "No Record Found";
			     		}
			     	?>
				     <div class="col-sm-3 right">
					     <a href="#" class="date"><?php echo date("F d,Y" , strtotime($get_event_row['event_date']));?></a>
					 </div>
					 <div class="col-sm-9">
					     <h1 class="big-title"><?php echo $get_event_row['name'];?></h1>
						 <div class="mb-20">
						 	<?php 
						 	if($get_event_row['event_photo'] != '')
						 	{
						 	?>
						 		<img src="uploads/<?php echo $get_event_row['event_photo'];?>" alt="home-img" class="common-img">
						 	<?php
						 	}
						 	?>
						     
						 </div>
						 <p><?php echo $get_event_row['decription'];?> </p>
					 </div>
				 </div>
			 </div>
		</main>
		<footer>
		    <div class="f-block">
			    <div class="f-block-inner1"><a href="#">LATEST</a></div>
				<!-- <div class="f-block-inner2"><a href="#">BLOG AT WORDPRESS</a></diV> -->
			</div>
		</footer>
	</div>
</body>
</html>
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