<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DNSC Audit System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/fontawesome-free/css/all.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/dist/css/adminlte.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/toastr/toastr.min.css") ?>">
  <link rel="stylesheet" href="<?= asset("resources/animate.css") ?>" />
  <link rel="icon" href="<?= asset("resources/dnsc-logo.png"); ?>">
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
<body class="hold-transition login-page"  style='

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
  <img class="img-fluid w-50" src="<?= asset("resources/dnsc-logo.png"); ?>">
  <br>
  <br>
  <p style=" font-size:200%;" id="message" class="text-center text-success"><b>Document Archiving and Tracking for DNSC QMS-ISO Undertakings</b></p>
</div>


<div class="col-6">
    <Br>
    <Br>
    <Br>
  <div class="login-box card" id="thisBody">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body card-body">
    <h2 class="login-box-msg text-center text-success"><b>Welcome!</b></h2>

    <form class="generic_form_no_trigger" data-url="login" autocomplete="off">
    <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" required="required">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    
    <div class="form-group has-feedback">
        <label>Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="required">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Log in</button>
    </div>
    <hr>
    <div class="text-center">
        <a href="<?= base_url(); ?>/survey_form" class="btn btn-primary">Answer Survey Here</a>
    </div>
    <hr>
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
<script src="<?= asset("AdminLTE_new/plugins/toastr/toastr.min.js"); ?>"></script>
<script>
<?php if(isset($verify)): ?>
  <?php if($verify != ""):?>
    $(document).ready(function() {
        Swal.fire({
              title: "Account Verified",
              text: "You can login",
            showClass: {
              popup: `
                animate__animated
                animate__bounceIn
                animate__faster
              `
            },
            hideClass: {
              popup: `
                animate__animated
                animate__bounceOut
                animate__faster
              `
            },
          icon: "success"
        })
    });
  <?php endif; ?>
<?php endif; ?>


$(document).on('submit', '.generic_form_no_trigger', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var form = $(this)[0];
    var formData = new FormData(form);
    var promptmessage = "";
    var prompttitle = "";
    if(typeof($(this).data('title')) != "undefined" ) {
      promptmessage = $(this).data('message');
      prompttitle = $(this).data('title');
    }
    else{
      promptmessage = '';
      prompttitle = 'Are you sure?';
    }


    
    var url = "<?php echo(base_url()); ?>" + "/" +$(this).data('url');

    Swal.fire({ title: 'Please wait...', 
                
                showClass: {
    popup: `
      animate__animated
      animate__bounceIn
      animate__faster
    `
  },
  hideClass: {
    popup: `
      animate__animated
      animate__bounceOut
      animate__faster
    `
  },imageUrl: '<?= asset("AdminLTE_new/dist/img/loader.gif"); ?>', showConfirmButton: false });
            $.ajax({
                type: 'post',
                url: url,
                processData: false,
                contentType: false,
                data: formData,
                success: function(results) {
                    var o = jQuery.parseJSON(results);
                    console.log(o);
                    if (o.result === "success") {
                        swal.close();

                        if(typeof(o.newlink) != "undefined" && o.newlink !== null) {
                          if(o.newlink == "newlink"){
                            console.log(o);
                            if(o.link == "refresh")
                            window.location.reload();
                            else if(o.link == "not_refresh")
                              console.log("");
                            else
                              window.open(o.link, '_blank');
                              // window.location.replace(o.link, "_blank");
                          }
                      }
                      else{
                        if(o.link == "refresh")
                        window.location.reload();
                        else if(o.link == "not_refresh")
                          console.log("");
                        else
                          window.location.replace(o.link);

                      }
                       
                    } else {
                        Swal.fire({
                          showClass: {
    popup: `
      animate__animated
      animate__bounceIn
      animate__faster
    `
  },
  hideClass: {
    popup: `
      animate__animated
      animate__bounceOut
      animate__faster
    `
  },
                            title: "Error!",
                            
                            text: o.message,
                            icon: "error"
                        });
                        console.log(results);
                    }
                },
                error: function(results) {
                    console.log(results);
                    Swal.fire("Error!", "Unexpected error occured!", "error");
                }
            });



    
});


</script>

<script>
    $(document).ready(function() {
        $("#togglePassword").click(function() {
            let passwordField = $("#password");
            let icon = $(this);
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            } else {
                passwordField.attr("type", "password");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            }
        });
    });
</script>
</body>

</html>
