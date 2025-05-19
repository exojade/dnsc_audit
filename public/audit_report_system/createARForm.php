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
          <div class="col-sm-6">
            <h1>Audit Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <?php
      $aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where tblid = ?", $_GET["aps_area_id"]);
      $aps_area = $aps_area[0];

      $aps_schedule = query("select aps.*, p.process_name from audit_plan_schedule aps
                              left join process p on p.process_id = aps.process_id
                              where aps_id = ?", $aps_area["aps_id"]);
      $aps_schedule = $aps_schedule[0];




      $scheduleDate = new DateTime($aps_schedule['schedule_date']);
$deadline = $scheduleDate->modify('+2 weeks');
$formattedDeadline = $deadline->format('F d, Y');

if ($deadline < new DateTime()) {
    echo '
    <div class="alert alert-warning alert-dismissible">
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      Schedule deadline (<strong>' . $formattedDeadline . '</strong>) has passed. Please take necessary action.
    </div>';
}
              
      ?>

  <div class="row">
    <div class="col-3">
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong>About IAR</strong></h3>
              </div>
              <div class="card-body">
                <strong>IAR No</strong>
                <p class="text-muted mb-0"><?php echo($aps_area["area_name"]); ?></p>
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
                <p class="text-muted mb-0"><?php echo($_SESSION["dnsc_audit"]["fullname"]); ?></p>
                <hr>
                
              </div>
            </div>
    </div>
    <div class="col">

    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong><?php echo($aps_schedule["process_name"]); ?></strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                <form class="generic_form_trigger" data-url="audit_report" id="internalReportForm">
                <input type="hidden" name="action" value="createAuditReport">
                <input type="hidden" name="aps_area_id" value="<?php echo($_GET["aps_area_id"]); ?>">

<!-- <style>
.myTable th{
 padding: 5px;
}
</style> -->

<?php
                    
                    $questions =[
                      "Are the procedure steps accurate and complete as compared to true practice?",
                      "Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?",
                      "Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?",
                      "Does the process appear to adequately meet all customer or regulatory requirements?",
                      "Are the quality objectives or targets identified in the process met?"
                    ];
                    // dump($questions);
                    
                    ?>

<div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">A</span>
                        <span class="bs-stepper-label">Verify the Effectiveness of Process</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">B</span>
                        <span class="bs-stepper-label">Summarize Findings for CAR System</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#suggestion-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="suggestion-part" id="suggestion-part-trigger">
                        <span class="bs-stepper-circle">C</span>
                        <span class="bs-stepper-label">POSITIVE FINDING</span>
                      </button>
                    </div>
                   
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Notes!</h5>
                      Rate the auditor with 4 being the highest and 1 being the lowest.<br>
                      Review the applicable procedure(s) for this process and answer the questions below.
                    </div>
                      <table class="table myTable table-bordered">
                  <tbody>
                    <th width="50%">Questions</th>
                    <th width="15%">Rate</th>
                    <th width="35%">Evidence or Notes Sheet Ref. #,ISO Clauses</th>

                    <?php $i=1; foreach($questions as $row): ?>

                      <tr>
                        <th><?php echo($row); ?></th>
                        <th>
                          
                        <select name="<?php echo($i); ?>_question" required class="form-control">
                          <option selected disabled value=""></option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </th>
                      <th>
                        <!-- <input type="text" class="form-control" placeholder="Enter comments"> -->
                        <textarea name="<?php echo($i); ?>_comments" class="form-control" placeholder="Enter comments here..."></textarea>
                      </th>
                      </tr>

                    <?php $i++; endforeach; ?>
                  </tbody>
                </table>
                      <button class="btn btn-info btn-next" >Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Notes!</h5>
                      Based on the findings and nonconformities you have recorded in the previous sections, summarize the necessary   
                actions needed For type, choose one of the following: <br>
                                <ul>
                                <li>C = Corrective action needed (existing noncompliance)</li>
                                <li>OFI = Opportunity for Improvement</li>
</ul>
                    </div>

                    <div class="form-group">
                        <label>OFI (Improvement)</label>
                        <textarea name="ofi_improvement" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                      <div class="form-group">
                        <label>OFI (Possible Non-conformance in the Future):</label>
                        <textarea name="ofi_2" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                      <div class="alert alert-info alert-dismissible">
                      Describe finding as you want it to appear in the CAR Form System<br>
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control">
                          <option selected disabled value="">Select Type here!</option>
                          <option value="Major">Major</option>
                          <option value="Minor">Minor</option>
                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Requirements</label>
                        <textarea name="ofi_requirements" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                      <div class="form-group">
                        <label>Findings</label>
                        <textarea name="ofi_findings" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                      <div class="form-group">
                        <label>Evidence/s</label>
                        <textarea name="ofi_evidences" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
             
                      <button class="btn btn-info btn-previous">Previous</button>
                      <button class="btn btn-info btn-next">Next</button>
                    </div>
                    <div id="suggestion-part" class="content" role="tabpanel" aria-labelledby="suggestion-part-trigger">
                    <div class="form-group">
                        <label>C. POSITIVE FINDING.</label>
                        <textarea name="comments" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                      </div>
                      <button class="btn btn-info btn-previous" >Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      
                    </div>


                  </div>
              </div>




                
              
                <hr>
                <!-- <button class="btn btn-primary">Save Audit Report</button> -->
                </form>
                </div>

            </div>

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