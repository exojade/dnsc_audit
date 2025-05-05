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
              <span id="create_count" class="info-box-icon bg-danger float-right">1</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box mb-0">
              

              <div class="info-box-content">
                <span class="info-box-text"><b>Pending</b></span>
              </div>
              <span id="pending_count" class="info-box-icon bg-warning float-right">1</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box mb-0">
              

              <div class="info-box-content">
                <span class="info-box-text"><b>Done</b></span>
              </div>
              <span id="done_count" class="info-box-icon bg-success float-right">1</span>
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



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            <div class="card-header">
            <div class="row">
            <?php $ap = query("select * from audit_plans order by year, timestamp"); ?>
                  <div class="col-4">
                  <div class="form-group">
                  <select class="form-control selectFilter select2" id="apSelect">
                    <option value="" selected disabled>Filter Audit Plan</option>
                    
                    <?php foreach($ap as $row): ?>
                      <option value="<?php echo($row["audit_plan"]); ?>"><?php echo($row["year"] . " - ". $row["type"]); ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                  </div>

                  <div class="col-4">
                  <div class="form-group">
                  <select class="form-control selectFilter" id="statusSelect">
                    <option value="" selected disabled>Filter Status</option>
                    <option value="CREATE">CREATE</option>
                    <option value="PENDING">PENDING</option>
                    <option value="DONE">DONE</option>
                  </select>

                </div>
                  </div>

        
                </div>

       
        </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Audit Plan</th>
                    <th>Team</th>
                    <th>Process</th>
                    <th>Area</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
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


$('.select2').select2();


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
                    'url':'audit_report_review',
                     'type': "POST",
                     "data": function (data){
                        data.action = "ar_review_list"
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'audit_plan', "orderable": false },
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
    { data: 'pending_count', "visible": false },
    { data: 'done_count', "visible": false },
    { data: 'create_count', "visible": false },
                ],
                "footerCallback": function (row, data, start, end, display) {
                    // var api = this.api(), data;
                    $(document).on('click', '.dropdown-toggle', function() {
    $(this).dropdown('toggle');
});
   var api = this.api(), data;
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    pending_count = api
    .column(7) // Use the parameter name instead of the index
    .data()
    .reduce(function (a, b) {
        return intVal(b);
    }, 0);

    done_count = api
    .column(8) // Use the parameter name instead of the index
    .data()
    .reduce(function (a, b) {
        return intVal(b);
    }, 0);

    create_count = api
    .column(9) // Use the parameter name instead of the index
    .data()
    .reduce(function (a, b) {
        return intVal(b);
    }, 0);
                        // alert(received);

                    $('#pending_count').html(pending_count);
                    $('#done_count').html(done_count);
                    $('#create_count').html(create_count);
                }
            });




  $('.selectFilter').on('change', function() {
    // alert("change");
    var apSelect = $('#apSelect').val() || "";
    var statusSelect = $('#statusSelect').val() || "";
            datatable.ajax.url('audit_report_review?action=ar_review_list&ap=' + apSelect+'&status='+statusSelect).load();
  });

</script>


  <?php require("layouts/footer.php") ?>