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
  <link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/bs-stepper/css/bs-stepper.min.css") ?>">
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
  

<div class="col-12 text-center" >

  <img  class="img-fluid" style="width:15%;" src="<?= asset("resources/dnsc-logo.png"); ?>">

</div>


<div class="col-12">
    <Br>
   
  <div class="login-box card" id="thisBody">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body card-body">
    <h2 class="login-box-msg text-center text-success"><b>Survey Form</b></h2>

             
              <div class="card-body p-0">
                <form id="generic_form_no_trigger" data-url="survey_form">
                  <input type="hidden" name="action" value="conduct_survey">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Personal Details</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Survey</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#suggestion-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="suggestion-part" id="suggestion-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Comments / Suggestions</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Enter full name">
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" name="contact_number" class="form-control" placeholder="Enter contact details">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"  name="email_address" class="form-control" placeholder="Enter email address">
                      </div>
                      <button class="btn btn-primary btn-next" >Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">


                    <?php $office = query("select * from office where active_status = 'ACTIVE'"); ?>

                    <div class="form-group">
                      <label>Office</label>
                      <select name="office" required class="form-control">
                        <option value="" disabled selected>Select Office to survey</option>
                        <?php foreach($office as $row): ?>
                          <option value="<?php echo($row["office_id"]); ?>"><?php echo($row["office_name"]); ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <?php $criteria = query("select * from survey_questionnaire where active_status = 'ACTIVE'"); ?>
                    <table class="table table-bordered">
                      <thead>
                        <th>Service Criteria</th>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                        <th class="text-center">5</th>

                      </thead>
                      <tbody>
                        <?php foreach ($criteria as $row): ?>
                          <tr>
                            <td>
                              <?php echo($row["question"]); ?>
                              <label></label>
                            </td>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                              <td>
                                
                                <input 
                                  type="radio" 
                                  required
                                  class="form-control" 
                                  name="<?php echo($row["questionnaire_id"]); ?>" 
                                  value="<?php echo $i; ?>">
                            
                              </td>
                              
                            <?php endfor; ?>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>



             
                      <button class="btn btn-primary btn-previous">Previous</button>
                      <button class="btn btn-primary btn-next">Next</button>
                    </div>




                    <div id="suggestion-part" class="content" role="tabpanel" aria-labelledby="suggestion-part-trigger">
                    <div class="form-group">
                        <label>Comments / Suggestions</label>
                        <textarea name="comments" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                      </div>


                   



             
                      <button class="btn btn-primary btn-previous" >Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                  </div>
              </div>
              </form>
              <!-- /.card-body -->
      
            </div>
    <div class="text-center">
    <a href="<?= base_url(); ?>/login">Back to Login</a>
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
<script src="<?= asset("AdminLTE_new/plugins/bs-stepper/js/bs-stepper.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/jquery-validation/jquery.validate.min.js"); ?>"></script>
<script src="<?= asset("AdminLTE_new/plugins/jquery-validation/additional-methods.min.js"); ?>"></script>
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

document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })


  $(document).on('submit', '#generic_form_no_trigger', function(e) {
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
    var url = $(this).data('url');

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
              imageUrl: '<?= asset("AdminLTE_new/dist/img/loader.gif");?>', showConfirmButton: false });
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
                          

                          Swal.fire({
                              text: "Do you want to take another survey?",
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
                              icon: "warning",
                              showCancelButton: true,
                              confirmButtonText: 'Yes',
                              cancelButtonText: 'No',
                              allowOutsideClick: false, // Prevent closing by clicking outside
                              allowEscapeKey: false  
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  // User clicked 'Yes'
                                  window.location.replace("survey_form");
                                  // Add your logic for taking another survey here
                              } else if (result.dismiss === Swal.DismissReason.cancel) {
                                  // User clicked 'No'
                                  window.location.replace("login");
                                  // Add your logic for ending the process here
                              }
                          });



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


$(function () {
  $('#generic_form_no_trigger').validate({
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');

      // For radio buttons, append the error to the parent container
      if (element.is(':radio')) {
    // Append the error to the closest parent of the group (e.g., the <td>)
    element.closest('tr').append(error);
  } else {
    // Default behavior for other input types
    element.closest('.form-group').append(error);
  }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid').addClass('is-valid');
    },
    success: function (label, element) {
      $(element).addClass('is-valid'); // Adds green border when valid
      $(element).closest('.form-group').find('span.valid-feedback').remove();
    },
    rules: {
      // Add rules for radio buttons (if dynamically created, use attribute selectors)
      'your_radio_group_name': {
        required: true
      }
    },
    messages: {
      'your_radio_group_name': {
        required: 'Please select an option.'
      }
    }
  });

  // Handle the Next button click
  $('.btn-next').on('click', function (e) {
    e.preventDefault(); // Prevent default action

    // Check if the form is valid
    if ($('#generic_form_no_trigger').valid()) {
      stepper.next(); // Go to the next step if valid
    } else {
      // Focus on the first invalid element
      $('#generic_form_no_trigger').find('.is-invalid').first().focus();
    }
  });

  // Handle the Previous button click
  $('.btn-previous').on('click', function (e) {
    e.preventDefault(); // Prevent default action
    stepper.previous(); // Go to the previous step
  });
});


</script>
</body>

</html>
