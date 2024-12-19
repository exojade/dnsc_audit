<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->


    <section class="content">
    <div class="modal fade" id="modalAddTeam">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-primary">
              <h3 class="modal-title text-center">Add Team</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="addTeam">
                <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                <div class="form-group">
                  <label>Team #</label>
                  <input type="number" required class="form-control" name="teamNumber" placeholder="Enter Team Number">
                </div>
                <div class="form-group">
                  <label>Team Leader</label>
                  <select class="form-control" name="team_leader" id="teamLeaderSelect" required style="width: 100%;">
                    <option value=""></option>
                    <?php foreach($auditors as $row): ?>
                      <option value="<?php echo($row["id"]); ?>"><?php echo($row["surname"] . ", " . $row["firstname"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Members</label>
                  <select class="form-control" name="team_members[]" multiple id="teamMembersSelect" required style="width: 100%;">
                    <?php foreach($auditors as $row): ?>
                      <option value="<?php echo($row["id"]); ?>"><?php echo($row["surname"] . ", " . $row["firstname"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>

                
          </div>
        </div>
      </div>
    </div>









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
                <a href="#" class="btn btn-warning btn-block"><b>Update Status</b></a>
                <a href="#" class="btn btn-success btn-block"><b>Print Audit Plan</b></a>
              </div>
            </div>

        </div>
        <div class="col-9">
        <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#audit_plan" data-toggle="tab">Audit Plan Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#teams" data-toggle="tab">Teams</a></li>
                  <li class="nav-item"><a class="nav-link" href="#audit_reports" data-toggle="tab">Audit Reports</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body" style="max-height:65vh !important; overflow-y: auto;">
                <div class="tab-content">
                  <div class="active tab-pane" id="audit_plan">
                  </div>
                  <div class="tab-pane" id="timeline">
                  </div>
                  <div class="tab-pane" id="teams">

                  <a href="#" data-toggle="modal" data-target="#modalAddTeam" class="btn btn-success">ADD TEAM</a>
                  <hr>
                  <table class="table table-bordered" id="teamDatatable">
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
<script>

$('#teamLeaderSelect').select2(
  {
  placeholder: "Search Team Leader",
}
);
$('#teamMembersSelect').select2({
  placeholder: "Search Team Members",
});




    $('#medicalRecordModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'medical', //Here you will fetch records 
            data: {
                checkupId: rowid, action: "medicalRecordModal"
            },
            success : function(data){
                $('#medicalRecordModal .fetched-data').html(data);
                Swal.close();
                // $(".select2").select2();//Show fetched data from database
            }
        });
     });


var teamDatatable = 
            $('#teamDatatable').DataTable({
                "searching": true,
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
                        data.action = "teamDatatable";
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




  $('.selectFilter').on('change', function() {
    // alert("change");
            var roleSelect = $('#roleSelect').val();
            datatable.ajax.url('users?action=usersList&role=' + roleSelect).load();
  });

</script>


  <?php require("layouts/footer.php") ?>