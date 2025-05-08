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
            <h1>New Audit Evaluation</h1>
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

      $audit_report = query("select ar.*, concat(u.firstname, ' ', u.middlename, ' ', u.surname) as auditor from audit_report ar 
                              left join users u on u.id = ar.user_id
                              where audit_report_id = ?", $_GET["id"]);
      $audit_report = $audit_report[0];

      $aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where area_id = ? and audit_plan = ?", $audit_report["aps_area"], $audit_report["audit_plan"]);
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
                <p class="text-muted mb-0"><?php echo($audit_report["auditor"]); ?></p>
                <hr>
                
              </div>
            </div>

    <form class="generic_form_trigger_no_prompt mb-2" data-url="audit_report">
      <input type="hidden" name="action" value="print_audit_report">
      <input type="hidden" name="audit_report_id" value="<?php echo($_GET["id"]); ?>">
      <button class="btn btn-block btn-primary">Print Audit Report</button>
    </form>
    </div>
    <div class="col">

    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong><?php echo($aps_schedule["process_name"]); ?></strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                <form class="generic_form_trigger" id="internalReportForm" data-url="audit_evaluation">
                  <input type="hidden" name="action" value="newEvaluation">
                  <input type="hidden" name="audit_report_id" value="<?php echo($_GET["id"]); ?>">
                  <input type="hidden" name="evaluated_by" value="<?php echo($_SESSION["dnsc_audit"]["userid"]); ?>">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Criteria</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#suggestion-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="suggestion-part" id="suggestion-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Comments / Suggestions</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
    
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">


                    <?php $questions = query("select * from evaluation_questions order by question_id asc"); ?>
                   
                    <table class="table table-bordered">
                      <thead>
                        <th>Criteria</th>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>

                      </thead>
                      <tbody>
                        <?php foreach ($questions as $row): ?>
                          <tr>
                            <td width="60%">
                              <span id="awit"><b><?php echo($row["question_title"]); ?></b><br><small><?php echo($row["question_desc"]); ?></small></span>
                            </td>
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                              <td>
                                <input 
                                  type="radio" 
                                  required
                                  class="form-control" 
                                  name="<?php echo($row["question_id"]); ?>" 
                                  value="<?php echo $i; ?>">
                            <?php endfor; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>



             
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
        let awitElement = element.closest('tr').find('#awit');
        awitElement.append("<br>");
        awitElement.append(error);
        // console.log(awitElement);
    // Append the error to the closest parent of the group (e.g., the <td>)
      // element.closest('tr').prepend(error);
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