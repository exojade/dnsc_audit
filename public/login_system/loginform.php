<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DNSC Audit System</title>
  <?php $siteOptions = query("select * from siteoptions"); 
      $siteOptions = $siteOptions[0];
  ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/fontawesome-free/css/all.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/dist/css/adminlte.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("resources/animate.css") ?>" />
</head>



<!-- <style>
  .google-btn {
            background-color: #3A81D3;
            color: #FFFFFF;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            align-items: center;
            text-decoration: none;
        }

        .rounded-btn{
            background-color: #84BA26;
            color: #FFFFFF;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            align-items: center;
            text-decoration: none;
            text-align: center;
        }

        .google-icon {
            margin-right: 10px;
        }
</style> -->

<style>
    .login-box{
        width: 100%;
    }
</style>
<body class="hold-transition login-page" style='

    background: url("<?= asset("resources/bgbg.jpg"); ?>") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
'>
<div class="layer">
  <div class="container">

<div class="row">
  

<div class="col-6 text-center">
  <Br>
  <Br>
  <Br>
  <Br>
  <img class="img-fluid w-50" src="resources/dnsc-logo.png">
  <br>
  <br>
  <p style=" font-size:200%;" id="message" class="text-center text-success"><b>Document Archiving and Tracking for DNSC QMS-ISO Undertakings</b></p>
</div>


<div class="col-6">
    <Br>
    <Br>
    <Br>
  <div class="login-box card">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body card-body">
    <h2 class="login-box-msg text-center text-success"><b>Welcome!</b></h2>

    <form id="login_form" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required="required">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
   
        <!-- /.col -->
        <div class="text-center">
          <button type="submit" class="btn btn-success ">Log in</button>
</div>
          <hr>
          <!-- <button type="submit" class="btn btn-success btn-block ">Log in</button> -->
           <div class="text-center">
            <a href="#" class="btn btn-primary">Answer Survery Here</a>
            </div>
          <hr>
        <!-- /.col -->
    </form>
    <div class="text-center">
    <a href="<?= base_url(); ?>/register">Register</a>
</div>
  </div>
  <!-- /.login-box-body -->
  <Br>

    
  </div>



</div>
  </div>




</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= asset("AdminLTE_new/plugins/jquery/jquery.min.js");?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/bootstrap/js/bootstrap.bundle.min.js");?>"></script>
<script src="<?= asset("AdminLTE_new/dist/js/adminlte.min.js");?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/sweetalert2/sweetalert2.min.js");?>"></script>


<script src="<?= asset("AdminLTE_new/plugins/jquery-validation/jquery.validate.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/jquery-validation/additional-methods.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/bs-custom-file-input/bs-custom-file-input.min.js"); ?>"></script>
</body>
</html>
