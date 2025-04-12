<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<style>
.info-box{
  min-height:20px;
}

.info-box .info-box-icon{
  font-size: 1rem;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1>Audit Reports</h1>
          </div>
          <div class="col-sm-7">
          <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box mb-0">
              

              <div class="info-box-content">
                <span class="info-box-text"><b>To Create</b></span>
              </div>
              <span class="info-box-icon bg-danger float-right">1</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box mb-0">
              

              <div class="info-box-content">
                <span class="info-box-text"><b>Pending</b></span>
              </div>
              <span class="info-box-icon bg-warning float-right">1</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box mb-0">
              

              <div class="info-box-content">
                <span class="info-box-text"><b>Done</b></span>
              </div>
              <span class="info-box-icon bg-success float-right">1</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        
        </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

    <div class="modal fade" id="aps_details">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title ">Audit Plan Schedule Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="fetched-data"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
          
          <?php
            $audit_plan = query("select * from audit_plans where audit_plan = ?", $_GET["id"]);
            $audit_plan = $audit_plan[0];
          ?>

            
            <div class="card">

            <div class="card-header bg-success">
              <div class="row">
                  <div class="col-9">
                    <h3 class="card-title"><b><?php echo($audit_plan["type"] . " - " . $audit_plan["year"]); ?></b></h3>
                  </div>
                  <div class="col-3">
                    <form class="generic_form_trigger_no_prompt" data-url="auditPlan">
                    
                    <input type="hidden" name="action" value="printAuditPlan">
                    <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">

                      <button type="submit" class="btn btn-sm btn-block btn-default">Print Audit Plan</button>
                    </form>
                  </div>
              </div>
                
            </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Team</th>
                    <th>Process</th>
                    <th>Area</th>
                    <th>Created</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>

<script>




    $('#aps_details').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'audit_report', //Here you will fetch records 
            data: {
                aps_id: rowid, action: "aps_details"
            },
            success : function(data){
                $('#aps_details .fetched-data').html(data);
                Swal.close();
                // $(".select2").select2();//Show fetched data from database
            }
        });
     });


var datatable = 
            $('#ajax_datatable').DataTable({
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
                    'url':'audit_report',
                     'type': "POST",
                     "data": function (data){
                        data.action = "audit_plan_report_datatable",
                        data.interal_audit_id = "<?php echo($_GET["id"]); ?>"
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { 
        data: 'team', 
        "orderable": false,
        render: function(data, type, row) {
            return data.length > 30 ? data.substring(0, 30) + '...' : data;
        }
    },
    { 
        data: 'process_name', 
        "orderable": false,
        render: function(data, type, row) {
            return data.length > 30 ? data.substring(0, 30) + '...' : data;
        }
    },
    { 
        data: 'area_name', 
        "orderable": false,
        render: function(data, type, row) {
            return data.length > 30 ? data.substring(0, 30) + '...' : data;
        }
    },
    { data: 'timestamp', "orderable": false },
    { data: 'audit_report_status', "orderable": false },
                ],
                "footerCallback": function (row, data, start, end, display) {
                    // var api = this.api(), data;
                    $(document).on('click', '.dropdown-toggle', function() {
    $(this).dropdown('toggle');
});

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