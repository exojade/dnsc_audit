<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DNSC Audit</title>



  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/fontawesome-free/css/all.min.css"); ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"); ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/dist/css/adminlte.min.css"); ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"); ?>">
  <link rel="stylesheet" href="<?= asset("resources/animate.css"); ?>" />
  <link rel="icon" href="<?= asset("resources/dnsc-logo.png"); ?>">
</head>
<style>
@keyframes inside-out {
    0% {
        transform: scale(0); /* Start from scale 0 */
        opacity: 0; /* Fully transparent */
    }
    100% {
        transform: scale(1); /* End at original size */
        opacity: 1; /* Fully opaque */
    }
}

.modal.fade .modal-dialog {
    transition: transform 0.2s ease-out, opacity 0.2s ease-out; /* Smooth transition for scale */
}

.modal.show .modal-dialog {
    animation: inside-out 0.2s forwards; /* Apply the animation on show */
}

.modal.hide .modal-dialog {
    animation: inside-out 0.2s reverse forwards; /* Reverse animation for hide */
}
    </style>
<style>
  .content-wrapper{
    background-color: #fff !important;
  } 
  .navbar-light{
    border-bottom: none !important;
    background-color: #204E42 !important;
    color: #FFC107;
  }
  .color-red{
    color:red;
  }

  .navbar-nav>.user-menu .user-image {
    height: 2.1rem !important;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><span class="text-warning"><i class="fas fa-bars"></i></span></a>
      </li>
    </ul>

    <h5 style="
    padding: .5rem 1rem !important; margin: 0 !important;"><span class="text-white"><?php echo($_SESSION["dnsc_audit"]["fullname"]); ?> | </span> <?php echo($_SESSION["dnsc_audit"]["role_name"]); ?></h5>
    <!-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
   
    </ul> -->


    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item dropdown user-menu">
      <a class="nav-link" href="myProfile">

      <?php if($_SESSION["dnsc_audit"]["img"] != ""): ?>
                    <img class="user-image img-circle elevation-2" src="<?php echo($_SESSION["dnsc_audit"]["img"]); ?>" alt="User profile picture">
                  <?php else: ?>
                    <img src="hecker.pnh" class="user-image img-circle elevation-2" alt="User Image">

                  <?php endif; ?>
        </a>
       
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="myProfile">
          <i class="fas fa-user" style="color:white;"></i>
        </a>
        
      </li> -->

      <li class="nav-item dropdown">
        <a class="nav-link deym" data-toggle="dropdown" href="#">
          <i class="fa fa-bell text-warning"></i>

          <?php $notifications = query("select count(*) as count from notification where receiver_id = ? and read_at is null", $_SESSION["dnsc_audit"]["userid"]); ?>
          <?php if($notifications[0]["count"] != 0): ?>
            <span class="badge badge-danger navbar-badge"><?php echo($notifications[0]["count"]); ?></span>
          <?php endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="max-height: 500px; overflow-y: auto; width:500px !important; max-width: 500px !important;">
          
        <?php if($notifications[0]["count"] != 0): ?>
          <?php $myNotif = query("select * from notification where receiver_id = ? and read_at is null", $_SESSION["dnsc_audit"]["userid"]); ?>
          <?php 
          $users = query("select * from users"); 
          $Users = [];

          foreach($users as $row):
            if($row["img"] == ""):
              $row["img"] = "hecker.png";
            endif;
            $Users[$row["id"]] = $row;
          endforeach;
          ?>

          <?php foreach($myNotif as $row): 
            $message = unserialize($row["message"]);
            ?>
            <a href="notifications?action=read&id=<?php echo($row["notification_id"]); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo($Users[$row["sender_id"]]["img"]); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <p class="text-sm"><?php echo($message["message"]); ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach; ?>

        <?php else: ?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
          <div class="media">
            <div class="media-body text-center">
              No unread notification!
            </div>
          </div>
          </a>
          <div class="dropdown-divider"></div>

        <?php endif; ?>
          <a href="notifications" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link"  href="logout">
          <i class="text-white fas fa-sign-out-alt" title="Logout System"></i>
        </a>
        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> -->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>

  
<script src="<?= asset("AdminLTE_new/plugins/jquery/jquery.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/dist/js/adminlte.min.js"); ?>"></script>
<!-- <script src="AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- AdminLTE for demo purposes -->


