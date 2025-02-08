<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/bs-stepper/css/bs-stepper.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Audit Report Details</h1>
          </div>
          <div class="col-sm-3">
          <form class="generic_form_trigger_no_prompt" data-url="audit_report" >
              <input type="hidden" name="action" value="print_audit_report">
              <input type="hidden" name="audit_report_id" value="<?php echo($_GET["id"]); ?>">
              <button type="submit" class="btn btn-info btn-block"><i class="fa fa-print"></i> Print Audit Report</button>
          </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php $audit_report = query("select ar.*, u.firstname, u.middlename, u.surname,
                                    concat(u2.firstname, ' ', u.middlename, ' ', u.surname) as reviewed_by
                                    from audit_report ar left join users u
                                    on u.id = ar.user_id
                                    left join users u2 on u2.id = ar.reviewed_by
                                    where audit_report_id = ?", $_GET["id"]);
              $audit_report = $audit_report[0];
              // dump($audit_report);
        ?>

      <?php
      $aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where aps_id = ? and area_id = ?", $audit_report["aps_id"], $audit_report["aps_area"]);
      $aps_area = $aps_area[0];

      $aps_schedule = query("select aps.*, p.process_name from audit_plan_schedule aps
                              left join process p on p.process_id = aps.process_id
                              where aps_id = ?", $aps_area["aps_id"]);
      $aps_schedule = $aps_schedule[0];




      // dump($aps_area);
        
      ?>

  <div class="row">
    <div class="col-3">


   
    
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong>About IAR</strong></h3>
              </div>
              <div class="card-body">
                <strong>IAR No</strong>
                <p class="text-muted mb-0"><?php echo($audit_report["audit_report_id"]); ?></p>
                <hr>
                <strong>Date of Audit</strong>
                <p class="text-muted mb-0"><?php echo(date("F d, Y")); ?></p>
                <hr>
                <strong>Process Area</strong>
                <p class="text-muted mb-0"><?php echo($aps_area["area_name"]); ?></p>
                <hr>
                <strong>ISO Clause</strong>
                <p class="text-muted mb-0"><?php echo($aps_schedule["audit_clause"]); ?></p>
                <hr>
                <strong>Auditor</strong>
                <p class="text-muted mb-0"><?php echo($audit_report["firstname"] . " " . $audit_report["middlename"]. ' '. $audit_report["surname"]); ?></p>
                <hr>

                
              </div>
            </div>

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong>Review Details</strong></h3>
              </div>
              <div class="card-body">
                <strong>Reviewed By</strong>
                <p class="text-muted mb-0"><?php echo($audit_report["reviewed_by"]); ?></p>
                <hr>
                <strong>Comments</strong>
                <p class="text-muted mb-0"><?php echo($audit_report["review_comments"]); ?></p>
                <hr>
                <strong>Date Reviewed</strong>
                <p class="text-muted mb-0"><?php echo(date("F d, Y", $audit_report["review_timestamp"])); ?></p>
               

                
              </div>
            </div>

            
    </div>

    <div class="col">


              <!-- /.card-header -->
              <!-- form start -->
              

<!-- <style>
.myTable th{
 padding: 5px;
}
</style> -->

<div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-exclamation"></i> Effectiveness Process!</h5>
                    </div>
<table class="table myTable table-bordered">
                  <tbody>
                    <th width="5%">#</th>
                    <th width="50%">Questions</th>
                    <th width="15%">Rate</th>
                    <th width="35%">Comments</th>

                    <?php 
                    $effectiveness = unserialize($audit_report["effectiveness_process"]);
                    foreach($effectiveness as $row): ?>

                      <tr>
                        <th><?php echo($row["number"]); ?></th>
                        <th><?php echo($row["question"]); ?></th>
                        <th><?php echo($row["rate"]); ?></th>
                        <th><?php echo($row["comment"]); ?></th>
                      </tr>

                    <?php endforeach; ?>
                  </tbody>
                </table>
                <br>
                <div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-exclamation"></i> Findings for CAR System!</h5>
                    </div>

              <div class="card">
              <div class="card-header">
                <h3 class="card-title">
               
                <strong>OFI (Improvement)</strong>
                </h3>
              </div>
              <div class="card-body">
                <?php echo($audit_report["ofi_improvement"]); ?>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
               
                <strong>OFI (Possible Non-conformance in the Future):</strong>
                </h3>
              </div>
              <div class="card-body">
                <?php echo($audit_report["ofi_nonconformance"]); ?>
              </div>
            </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <strong>CAR Details:</strong>
                </h3>
              </div>
              <div class="card-body">
              <dl>

              <?php $car_details = unserialize($audit_report["car_details"]); ?>
              <?php if($car_details[0]["ofi_requirements"] != ""): ?>
                <dt>Requirements</dt>
                <dd><?php echo($car_details[0]["ofi_requirements"]); ?></dd>
              <?php endif; ?>
              <?php if($car_details[0]["ofi_findings"] != ""): ?>
                <dt>Findings</dt>
                <dd><?php echo($car_details[0]["ofi_findings"]); ?></dd>
              <?php endif; ?>
              <?php if($car_details[0]["ofi_evidences"] != ""): ?>
                <dt>Evidence/s</dt>
                <dd><?php echo($car_details[0]["ofi_evidences"]); ?></dd>
              <?php endif; ?>
                  
              
                </dl>
              </div>
            </div>





                
              
                <hr>
                <!-- <button class="btn btn-primary">Save Audit Report</button> -->
        

    </div>
  </div>
<!-- 


<div class="card card-default">
              <div class="card-header bg-success">
                <h3 class="card-title">
                  Audit Report Details
                </h3>
              </div>
              <div class="card-body">

              <div class="row">
                <div class="col-6">

                <dl class="row">
                  <dt class="col-sm-4">Date of Audit</dt>
                  <dd class="col-sm-8"><?php echo(date("F d, Y")); ?></dd>
                  <dt class="col-sm-4">Process Area</dt>
                  <dd class="col-sm-8"><?php echo($aps_area["area_name"]); ?></dd>
                  <dt class="col-sm-4">ISO Clause</dt>
                  <dd class="col-sm-8"><?php echo($aps_schedule["audit_clause"]); ?></dd>
                  <dt class="col-sm-4">Auditor</dt>
                  <dd class="col-sm-8"><?php echo($_SESSION["dnsc_audit"]["fullname"]); ?></dd>
                </dl>

                </div>
                <div class="col-6">
                  
                </div>
              </div>
              </div>
            </div> -->
      </div>
    </section>
    <!-- /.content -->
  </div>

  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="AdminLTE_new/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="AdminLTE_new/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="AdminLTE_new/plugins/jquery-validation/additional-methods.min.js"></script>
<?php require("layouts/footer.php") ?>

<script>

document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })


  $(function () {
  $('#internalReportForm').validate({
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
    if ($('#internalReportForm').valid()) {
      stepper.next(); // Go to the next step if valid
    } else {
      // Focus on the first invalid element
      $('#internalReportForm').find('.is-invalid').first().focus();
    }
  });

  // Handle the Previous button click
  $('.btn-previous').on('click', function (e) {
    e.preventDefault(); // Prevent default action
    stepper.previous(); // Go to the previous step
  });
});

</script>