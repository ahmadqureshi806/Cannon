<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cannon Member - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="dashboard.php">Cannon Members Profile</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <span style="color:white;">
          <?php
          $get_name=$goodideas->query("SELECT * FROM users where id='".$_SESSION['admin']."' ");
          if($get_name->num_rows > 0)
          {
            $get_name_row=$get_name->fetch_array();
            echo $get_name_row['f_name']." ".$get_name_row['l_name'];
          }
          ?>
        </span>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
            <?php
            if($get_name_row['user_pic'] != '')
            {
            ?>
              <img src="../uploads/<?php echo $get_name_row['user_pic'];?>" width="40" height="40" style="border-radius: 50px;">
            <?php
            }
            else
            {
            ?>
               <i class="fas fa-user-circle fa-fw"></i>
            <?php
            }
            ?>
            
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Register</a>
            <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
          </div>
        </li> -->
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="events.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Events</span></a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="Bickeree.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Bickerees</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="coment_history.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Comment History</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li> -->
      </ul>
      <div id="content-wrapper">