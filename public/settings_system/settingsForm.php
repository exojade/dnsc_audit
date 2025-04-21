
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<div class="content-wrapper">
<style>
.cityvet-logo {
    max-width: 400px; /* Adjust to your preferred width */
    height: auto; /* Ensures the image maintains its aspect ratio */
    object-fit: contain; /* Preserves the image quality */
}
</style>


<?php
  $all_settings = query("select * from utility_settings");
?>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Settings</h1>
      </div>
    </div>
  </div>
</section>

    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title"><b>Audit Checklist / Audit Report / Audit Evaluation Settings</b></h3>
            </div>
            <div class="card-body">
            <?php $audit_checklist = unserialize($all_settings[0]["audit_checklist"]); ?>
            <form class="generic_form_trigger" data-url="settings">
              <input type="hidden" name="action" value="update_audit_checklist_settings">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label>Header Image</label>
                      <hr>
                        <img id="audit_checklist_header" style="max-width: 100%; height: auto;" src="<?php echo($audit_checklist["header"]); ?>">
                        <hr>
                        <div class="custom-file">
                          <input name="header" type="file" class="custom-file-input customFile" id="audit_checklist_header_input" accept=".png">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Footer Image</label>
                      <hr>
                      <img id="audit_checklist_footer" style="max-width: 100%; height: auto;" src="<?php echo($audit_checklist["footer"]); ?>">
                      <hr>
                      <div class="custom-file">
                        <input name="footer" type="file" class="custom-file-input customFile" id="audit_checklist_footer_input" accept=".png">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-4">
                <table class="table table-bordered">
                <tr>
                  <th class="align-middle" colspan="2">Audit Checklist</th>
                </tr>
                <tr>
                  <th class="align-middle">Form No.</th>
                  <td><input required type="text" class="form-control" name="ac_form_number" value="<?php echo($audit_checklist["form_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Issue Status</th>
                  <td><input required type="text" class="form-control" name="ac_issue_status" value="<?php echo($audit_checklist["issue_status"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Revision No.</th>
                  <td><input required type="text" class="form-control" name="ac_revision_number" value="<?php echo($audit_checklist["revision_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Effective Date</th>
                  <td><input required type="text" class="form-control" name="ac_effective_date" value="<?php echo($audit_checklist["effective_date"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Approved By</th>
                  <td><input required type="text" class="form-control" name="ac_approved_by" value="<?php echo($audit_checklist["approved_by"]); ?>"></td>
                </tr>

              </table>

                </div>
                <?php $audit_report = unserialize($all_settings[0]["audit_report"]); ?>


                <div class="col-4">
                <table class="table table-bordered">
                <tr>
                  <th class="align-middle" colspan="2">Audit Report</th>
                </tr>
                <tr>
                  <th class="align-middle">Form No.</th>
                  <td><input required type="text" class="form-control" name="ar_form_number" value="<?php echo($audit_report["form_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Issue Status</th>
                  <td><input required type="text" class="form-control" name="ar_issue_status" value="<?php echo($audit_report["issue_status"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Revision No.</th>
                  <td><input required type="text" class="form-control" name="ar_revision_number" value="<?php echo($audit_report["revision_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Effective Date</th>
                  <td><input required type="text" class="form-control" name="ar_effective_date" value="<?php echo($audit_report["effective_date"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Approved By</th>
                  <td><input required type="text" class="form-control" name="ar_approved_by" value="<?php echo($audit_report["approved_by"]); ?>"></td>
                </tr>

              </table>
                </div>
                <?php $audit_evaluation = unserialize($all_settings[0]["audit_evaluation"]); ?>

                <div class="col-4">

                <table class="table table-bordered">
                <tr>
                  <th class="align-middle" colspan="2">Audit Evaluation</th>
                </tr>
                <tr>
                  <th class="align-middle">Form No.</th>
                  <td><input required type="text" class="form-control" name="ae_form_number" value="<?php echo($audit_evaluation["form_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Issue Status</th>
                  <td><input required type="text" class="form-control" name="ae_issue_status" value="<?php echo($audit_evaluation["issue_status"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Revision No.</th>
                  <td><input required type="text" class="form-control" name="ae_revision_number" value="<?php echo($audit_evaluation["revision_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Effective Date</th>
                  <td><input required type="text" class="form-control" name="ae_effective_date" value="<?php echo($audit_evaluation["effective_date"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Approved By</th>
                  <td><input required type="text" class="form-control" name="ae_approved_by" value="<?php echo($audit_evaluation["approved_by"]); ?>"></td>
                </tr>

              </table>
                  
                </div>

              </div>
              

              
              <hr>
              <button class="btn btn-primary" type="submit">Save</button>

            </form>
          


            </div>
          </div>
        </div>

        <div class="col-12">
            <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title"><b>Audit Plan Settings</b></h3>
            </div>
            <div class="card-body">
            <?php $audit_plan = unserialize($all_settings[0]["audit_plan"]); ?>
            <form class="generic_form_trigger" data-url="settings">
              <input type="hidden" name="action" value="update_audit_plan_settings">
              <div class="form-group">
                <label>Header Image</label>
                  <img id="audit_plan_header" style="max-width: 100%; height: auto;" src="<?php echo($audit_plan["header"]); ?>">
                  <div class="custom-file">
                    <input name="header" type="file" class="custom-file-input customFile" id="audit_plan_header_input" accept=".png">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
              </div>
              <hr>
              <div class="form-group">
                <label>Footer Image</label>
                  <img id="audit_plan_footer" style="max-width: 100%; height: auto;" src="<?php echo($audit_plan["footer"]); ?>">
                  <div class="custom-file">
                    <input name="footer" type="file" class="custom-file-input customFile" id="audit_plan_footer_input" accept=".png">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
              </div>

              <table class="table table-bordered">
                <tr>
                  <th class="align-middle">Form No.</th>
                  <td><input required type="text" class="form-control" name="form_number" value="<?php echo($audit_plan["form_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Issue Status</th>
                  <td><input required type="text" class="form-control" name="issue_status" value="<?php echo($audit_plan["issue_status"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Revision No.</th>
                  <td><input required type="text" class="form-control" name="revision_number" value="<?php echo($audit_plan["revision_number"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Effective Date</th>
                  <td><input required type="text" class="form-control" name="effective_date" value="<?php echo($audit_plan["effective_date"]); ?>"></td>
                </tr>
                <tr>
                  <th class="align-middle">Approved By</th>
                  <td><input required type="text" class="form-control" name="approved_by" value="<?php echo($audit_plan["approved_by"]); ?>"></td>
                </tr>

              </table>
              <hr>
              <button class="btn btn-primary" type="submit">Save</button>

            </form>
          


            </div>
          </div>
        </div>


       



        

 

        
      </div>







      </div>
    </section>
  </div>
  <?php require("layouts/footer.php") ?>


<script src="AdminLTE_new/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="AdminLTE_new/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>

$(function () {
  bsCustomFileInput.init();
});
$('.my-colorpicker2').colorpicker()

$('.my-colorpicker2').on('colorpickerChange', function(event) {
  $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
})
</script> 

<script>
  $(document).ready(function () {
    function readImageURL(input, targetImgId) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#' + targetImgId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    // Header image preview
    $('#audit_plan_header_input').on('change', function () {
      readImageURL(this, 'audit_plan_header');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });

    // Footer image preview
    $('#audit_plan_footer_input').on('change', function () {
      readImageURL(this, 'audit_plan_footer');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });
  });
</script>



<script>
  $(document).ready(function () {
    function readImageURL(input, targetImgId) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#' + targetImgId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    // Header image preview
    $('#audit_report_header_input').on('change', function () {
      readImageURL(this, 'audit_report_header');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });

    // Footer image preview
    $('#audit_report_footer_input').on('change', function () {
      readImageURL(this, 'audit_report_footer');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });
  });
</script>


<script>
  $(document).ready(function () {
    function readImageURL(input, targetImgId) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#' + targetImgId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    // Header image preview
    $('#audit_checklist_header_input').on('change', function () {
      readImageURL(this, 'audit_checklist_header');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });

    // Footer image preview
    $('#audit_checklist_footer_input').on('change', function () {
      readImageURL(this, 'audit_checklist_footer');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });
  });
</script>


<script>
  $(document).ready(function () {
    function readImageURL(input, targetImgId) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#' + targetImgId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    // Header image preview
    $('#audit_evaluation_header_input').on('change', function () {
      readImageURL(this, 'audit_evaluation_header');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });

    // Footer image preview
    $('#audit_evaluation_footer_input').on('change', function () {
      readImageURL(this, 'audit_evaluation_footer');
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    });
  });
</script>
