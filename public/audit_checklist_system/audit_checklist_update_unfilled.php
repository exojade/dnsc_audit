<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Audit Checklist UNFILLED</h1>
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

      $audit_checklist = query("select * from audit_checklist where audit_checklist_id = ?", $_GET["id"]);
      $audit_checklist = $audit_checklist[0];
      // $_GET["aps_area_id"] = $audit_checklist["aps_area"];

      // $tblid = query("select * from ");


      $aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where aps_id = ? and area_id = ?", $audit_checklist["aps_id"], $audit_checklist["aps_area"]);
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
                <p class="text-muted mb-0"><?php echo($_SESSION["dnsc_audit"]["fullname"]); ?></p>
                <hr>
                
              </div>
            </div>
            <a target="_blank" href="evidence?action=myEvidence&root=<?php echo($aps_area["area_id"]); ?>" class="btn btn-warning btn-block"><i class="fa fa-folder"></i> Check Evidence</a>
    </div>
    <div class="col">

    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><strong><?php echo($aps_schedule["process_name"]); ?></strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                <form class="generic_form_trigger" data-url="audit_checklist" id="internalReportForm">
                <input type="hidden" name="action" value="updateChecklistUnfilled">
                <input type="hidden" name="audit_checklist_id" value="<?php echo($_GET["id"]); ?>">

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

              
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Notes!</h5>
                      <p class="text-justify">Reminder: This checklist is just a guide, you are free (and encouraged) to add more questions as you conduct the actual audit.</p>
              
                    </div>


                    <button type="button" class="btn btn-primary" id="addClause">Add Row</button>
                    <br>
                    <br>
                      <div id="clauseContainer">

                 

                      <?php $clause = unserialize($audit_checklist["audit_trail_array"]); ?>
                      <?php foreach($clause as $row): ?>
                        <div class="amik">
                        <div class="row ">
                        <div class="col-11">
                        <div class="form-group">
                        <textarea required placeholder="Enter observance/trail/remarks here!" class="form-control summernote" rows="3" name="clause[]"><?php echo($row["clause"]); ?></textarea>
                      </div>

                        </div>

                
                        <div class="col-1">
                        <span class="btn btn-block btn-danger remove-btn">X</span>

                        </div>

                      </div>

                    
                    </div>

                      <?php endforeach; ?>


                      
                  </div>
                      
                   
                <!-- <button class="btn btn-info btn-previous" >Previous</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- <script src="AdminLTE_new/plugins/jquery-validation/jquery.validate.min.js"></script> -->
<script src="AdminLTE_new/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="AdminLTE_new/plugins/summernote/summernote-bs4.min.js"></script>
<?php require("layouts/footer.php") ?>
<script>
    $(document).ready(function () {
        // Initialize existing summernotes
        $('.summernote').summernote();

        // Add new clause
        $("#addClause").click(function () {
            let newClause = $(".amik:first").clone(); // Clone the first .amik
            newClause.find("textarea").val(""); // Clear textarea
            newClause.find(".note-editor").remove(); // Remove old Summernote UI if present (just in case)
            newClause.find("textarea").removeClass('summernote'); // Remove class first (avoid double-init)
            newClause.find("textarea").addClass('summernote'); // Re-add to make sure

            $("#clauseContainer").append(newClause); // Append the clone

            // Re-initialize Summernote for new textareas only
            newClause.find(".summernote").summernote({
                height: 100,
                placeholder: 'Enter observance/trail/remarks here!'
            });
        });

        // Remove clause
        $(document).on("click", ".remove-btn", function () {
            if ($(".amik").length > 1) {
                $(this).closest(".amik").remove();
            } else {
                alert("At least one clause is required!");
            }
        });
    });
</script>

<script>

// document.addEventListener('DOMContentLoaded', function () {
//     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
//   })


//   $(function () {
//   $('#internalReportForm').validate({
//     errorElement: 'span',
//     errorPlacement: function (error, element) {
//       error.addClass('invalid-feedback');

//       // For radio buttons, append the error to the parent container
//       if (element.is(':radio')) {
//     // Append the error to the closest parent of the group (e.g., the <td>)
//     element.closest('tr').append(error);
//   } else {
//     // Default behavior for other input types
//     element.closest('.form-group').append(error);
//   }
//     },
//     highlight: function (element, errorClass, validClass) {
//       $(element).addClass('is-invalid').removeClass('is-valid');
//     },
//     unhighlight: function (element, errorClass, validClass) {
//       $(element).removeClass('is-invalid').addClass('is-valid');
//     },
//     success: function (label, element) {
//       $(element).addClass('is-valid'); // Adds green border when valid
//       $(element).closest('.form-group').find('span.valid-feedback').remove();
//     },
//     rules: {
//       // Add rules for radio buttons (if dynamically created, use attribute selectors)
//       'your_radio_group_name': {
//         required: true
//       }
//     },
//     messages: {
//       'your_radio_group_name': {
//         required: 'Please select an option.'
//       }
//     }
//   });

//   // Handle the Next button click
//   $('.btn-next').on('click', function (e) {
//     e.preventDefault(); // Prevent default action

//     // Check if the form is valid
//     if ($('#internalReportForm').valid()) {
//       stepper.next(); // Go to the next step if valid
//     } else {
//       // Focus on the first invalid element
//       $('#internalReportForm').find('.is-invalid').first().focus();
//     }
//   });

//   // Handle the Previous button click
//   $('.btn-previous').on('click', function (e) {
//     e.preventDefault(); // Prevent default action
//     stepper.previous(); // Go to the previous step
//   });
// });

</script>