<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <?php
$auditPlan = query("select * from audit_plans where audit_plan = ?", $_GET["id"]);
$auditPlan = $auditPlan[0];
    $process = query("select * from process");
    $team = query("SELECT 
    t.team_id,
    t.team_number AS team,
    GROUP_CONCAT(
        CONCAT(u.firstname, ' ', u.surname, ' (', tm.role, ')') 
        ORDER BY tm.role = 'LEADER' DESC, u.surname
        SEPARATOR ', '
    ) AS members
    FROM 
        audit_plan_teams t
    JOIN 
        audit_plan_team_members tm ON t.team_id = tm.team_id
    JOIN 
        users u ON tm.id = u.id
    where t.audit_plan = ?
    GROUP BY 
        t.team_id
    ORDER BY 
        t.team_number
    ", $_GET["id"]);


    // $process = query("SELECT 
    // child.id AS child_id,
    // child.area_name AS child_area,
    // parent.area_name AS parent_area,
    // grandparent.area_name AS grandparent_area,
    // child.area_description,
    // child.type
    // FROM 
    //     areas AS child
    // LEFT JOIN 
    //     areas AS parent 
    // ON 
    //     child.parent_area = parent.id
    // LEFT JOIN 
    //     areas AS grandparent 
    // ON 
    //     parent.parent_area = grandparent.id
    // WHERE 
    //     child.type = 'process'
    //     order by child_area asc
    // ");
    
    ?>

    <!-- Main content -->


    <section class="content">


      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i>   <?php echo($auditPlan["status"]); ?></h5>
            </div>
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo($auditPlan["type"]); ?></h3>
                <p class="text-muted text-center"><?php echo($auditPlan["year"]); ?></p>
                <hr>
                <form class="generic_form_trigger_no_prompt mt-2" data-url="auditPlan">
                  <input type="hidden" name="action" value="printAuditPlan">
                  <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                  <button class="btn btn-success btn-block">Print Audit Plan</button>
                </form>
              </div>
            </div>


            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo($auditPlan["type"]); ?></h3>
                <p class="text-muted text-center"><?php echo($auditPlan["year"]); ?></p>
                <hr>
                <form class="generic_form_trigger_no_prompt mt-2" data-url="auditPlan">
                  <input type="hidden" name="action" value="printAuditPlan">
                  <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                  <button class="btn btn-success btn-block">Print Audit Plan</button>
                </form>
              </div>
            </div>
        </div>
        <div class="col-9">
        <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link " href="#audit_plan" data-toggle="tab">Audit Plan Info</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#audit_reports" data-toggle="tab">Audit Reports</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <!-- <div class="card-body" style="max-height:65vh !important; overflow-y: auto;"> -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" tab-pane" id="audit_plan">

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Introduction</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["introduction"]); ?>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Audit Objectives</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["audit_objectives"]); ?>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Reference Standard</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["reference_standard"]); ?>
                    </div>
                  </div>
                  
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Audit Methodologies</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["audit_methodologies"]); ?>
                    </div>
                  </div>


                  </div>
                  <div class="tab-pane active" id="timeline">
                    <table id="timelineDatatable" style="width: 100% !important;">
                  <thead>
                  <tr>
                    <th width="100%;"></th>
                  </tr>
                  </thead>
                </table>


               
                  </div>
                  <div class="tab-pane" id="teams">

                  <a href="#" data-toggle="modal" data-target="#modalAddTeam" class="btn btn-success btn-sm">ADD TEAM</a>
                  <hr>
                  <table class="table table-bordered" id="teamDatatable" width="100%">
                    <thead>
                      <th>Team #</th>
                      <th>Members</th>
                    </thead>
                  </table>


                  </div>
                  <div class="tab-pane" id="audit_reports">
                  </div>
                </div>
            </div>
        </div>
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
<script src="AdminLTE_new/plugins/summernote/summernote-bs4.min.js"></script>
<script src="AdminLTE_new/plugins/toastr/toastr.min.js"></script>
<script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
<script src="AdminLTE_new/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="resources/vue.js"></script>
<script>

$('#fromtimepicker').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("08:00 AM", "hh:mm A")
    })

    $('#totimepicker').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("05:00 PM", "hh:mm A")
    })

$('#teamLeaderSelect').select2(
  {
  placeholder: "Search Team Leader",
}
);
$('#teamMembersSelect').select2({
  placeholder: "Search Team Members",
});

$('#processSelect').select2({
  placeholder: "Search for Process Area",
});


var teamDatatable = 
            $('#teamDatatable').DataTable({
                "searching": false,
                "pageLength": 10,
                language: {
                    searchPlaceholder: "Search Name"
                },
                "bLengthChange": true,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'auditPlan',
                     'type': "POST",
                     "data": function (data){
                        data.action = "teamDatatable",
                        data.audit_plan = "<?php echo($_GET["id"]); ?>"
                     }
                },
                'columns': [
                    { data: 'team_number', "orderable": false },
                    { data: 'team_members', "orderable": false  },
                ],
                "footerCallback": function (row, data, start, end, display) {
                    // var api = this.api(), data;
                    

                    // Remove the formatting to get integer data for summation
                    // var intVal = function (i) {
                    //     return typeof i === 'string' ?
                    //         i.replace(/[\$,]/g, '') * 1 :
                    //         typeof i === 'number' ?
                    //             i : 0;
                    // };

                    // // Total over all pages
                    // received = api
                    //     .column(5)
                    //     .data()
                    //     .reduce(function (a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);
                    //     console.log(received);

                    // $('#currentTotal').html('$ ' + received.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                }
            });




            var timelineDatatable = 
            $('#timelineDatatable').DataTable({
                "searching": false,
                "pageLength": 9999,
                language: {
                    searchPlaceholder: "Search Name"
                },
                "bLengthChange": false,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'auditPlan',
                     'type': "POST",
                     "data": function (data){
                        data.action = "timelineProcessOwnerDatatable",
                        data.audit_plan = "<?php echo($_GET["id"]); ?>"
                     }
                },
                'columns': [
                    { data: 'card', "orderable": false },
                 
                ],
                "footerCallback": function (row, data, start, end, display) {
                    // var api = this.api(), data;
                    

                    // Remove the formatting to get integer data for summation
                    // var intVal = function (i) {
                    //     return typeof i === 'string' ?
                    //         i.replace(/[\$,]/g, '') * 1 :
                    //         typeof i === 'number' ?
                    //             i : 0;
                    // };

                    // // Total over all pages
                    // received = api
                    //     .column(5)
                    //     .data()
                    //     .reduce(function (a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);
                    //     console.log(received);

                    // $('#currentTotal').html('$ ' + received.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                }
            });

  $('.selectFilter').on('change', function() {
    // alert("change");
            var roleSelect = $('#roleSelect').val();
            datatable.ajax.url('users?action=usersList&role=' + roleSelect).load();
  });

  $('#modalUpdateInfo').on('show.bs.modal', function (e) {
        var audit_plan = $(e.relatedTarget).data('audit_plan');
        $.ajax({
            type : 'post',
            url : 'auditPlan', //Here you will fetch records 
            data: {
                audit_plan: audit_plan, 
                action: "modalUpdateInfo",

            },
            success : function(data){
                $('#modalUpdateInfo .fetched-data').html(data);
                $('.summernote').summernote()
                // $("#salary_select").select2();
            }
        });


        
     });


    $(document).ready(function () {

      $("#areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                  });

                  $("#positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });
    // Trigger on area select change
    $("#processSelect").on("change", function () {
        let process_id = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (process_id) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { process_id: process_id , action: "fetchArea"},
                dataType: "json",
                success: function (response) {

                  $("#areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                      allowClear: true 
                  });

           
                  console.log(response);


                  // processSelect
                    // Populate process select
                    let areaSelect = $("#areaSelect");
                    areaSelect.empty().append('');
                    $.each(response.area, function (key, value) {
                      console.log(value);
                      areaSelect.append('<option value="' + value.id + '">' + value.area_name + '</option>');
                    });

                
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });


    $("#areaSelect").on("change", function () {
        let areaId = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (areaId) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { area_id: areaId , action: "fetchPosition"},
                dataType: "json",
                success: function (response) {

                

                  $("#positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });
                  console.log(response);


                 

                    // Populate position select
                    let positionSelect = $("#positionSelect");
                    positionSelect.empty().append('');
                    $.each(response.positions, function (key, value) {
                        positionSelect.append('<option value="' + value.position_id + '">' + value.position_name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });
});

</script>




  <?php require("layouts/footer.php") ?>