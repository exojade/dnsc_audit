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
  <link rel="icon" href="resources/dnsc-logo.png">
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
  <img class="img-fluid w-50" src="<?= asset("resources/dnsc-logo.png"); ?>">
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
    <h2 class="login-box-msg text-center text-success"><b>Verify</b></h2>

    <form class="generic_form_trigger" id="registerForm" data-url="register" autocomplete="off" >
      <input type="hidden" name="action" value="register">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>First Name <span class="text-danger">*</span></label>
            <input type="text" required class="form-control" name="firstname" placeholder="Enter First Name">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label>Middle Name</label>
            <input type="text"  class="form-control" name="middlename" placeholder="Enter Middle Name">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Last Name <span class="text-danger">*</span></label>
            <input type="text" required class="form-control" name="lastname" placeholder="Enter First Name">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label>Suffix</label>
            <input type="text"  class="form-control" name="suffix" placeholder="I II III Jr. Sr.">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Email Address <span class="text-danger">*</span></label>
            <input type="email" required class="form-control" name="email_address" placeholder="Enter Email Address">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Password <span class="text-danger">*</span></label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
        </div>
        <div class="col">
        <div class="form-group">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
          </div>
        </div>
      </div>

      <div class="form-group">
                    <label for="exampleInputFile">Profile Image <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input required accept="image/*"  name="proofPayment" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                   
                    </div>
                  </div>
   
        <!-- /.col -->
        <div class="text-center">
          <button type="submit" class="btn btn-success ">Register</button>
</div>
      
        <!-- /.col -->
  
    </form>
    <div class="text-center">
    <hr>
    <a href="login">Already have an account</a>
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

<script>

$(document).ready(function () {
  // Extend jQuery Validate with a custom strong password rule
  $.validator.addMethod("strongPassword", function (value, element) {
    return this.optional(element) || 
           /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
  }, "Password must contain at least 8 characters, including an uppercase letter, a lowercase letter, a number, and a special character.");

  // Initialize validation

  bsCustomFileInput.init();

  $("#registerForm").validate({





    rules: {
      password: {
        required: true,
        strongPassword: true
      },
      confirm_password: {
        required: true,
        equalTo: "#password" // Ensures it matches the password field
      }
    },
    messages: {
      password: {
        required: "Please enter a password."
      },
      confirm_password: {
        required: "Please confirm your password.",
        equalTo: "Passwords do not match."
      }
    },
    errorClass: "is-invalid", // Bootstrap 4 class for error styling
    validClass: "is-valid",   // Bootstrap 4 class for valid styling
    errorElement: "div",      // Error message wrapper
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback"); // Bootstrap 4 error message styling
      error.insertAfter(element);        // Position error message after the input
    }
  });
});


  
$(document).on('submit', '.generic_form_trigger', function(e) {
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
      promptmessage = 'Details will be saved. Please review details first!';
      prompttitle = 'Are you sure?';
    }
    var url = "<?php echo(base_url()); ?>" + "/" +$(this).data('url');

    Swal.fire({
        title: prompttitle,
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
        text: promptmessage,
        // type: 'info',
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
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
  },
              imageUrl: '<?php asset("AdminLTE_new/dist/img/loader.gif"); ?>', showConfirmButton: false });
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
                        Swal.fire({
                            title: "Submit success",
                            text: o.message,
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
                        }).then(function () {
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
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: o.message,
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
        }
    });
});

</script>
</body>
</html>
