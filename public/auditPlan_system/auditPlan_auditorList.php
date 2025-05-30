<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Audit Plan (Audit Reports)</h1>
          </div>
          <div class="col-sm-6">

            <div class="form-group">
              <select class="select2 selectFilter form-control" width="100%" id="auditPlanList">
                <option value="" selected>--ALL--</option>
                <?php
                // dump($_SESSION);
                $auditPlans = query("select ap.* from audit_plan_team_members aptm
                                            left join audit_plans ap on ap.audit_plan = aptm.audit_plan
                                            where id = ?
                                            group by aptm.audit_plan
                                            order by audit_plan desc
                                            ", $_SESSION["dnsc_audit"]["userid"]); ?>
                <?php foreach($auditPlans as $row): ?>
                  <option value="<?php echo($row["audit_plan"]); ?>"><?php echo($row["year"] . " - " . $row["type"]); ?></option>
                <?php endforeach; ?>

              </select>
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
 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th class="bg-success">Action</th>
                    <th class="bg-success">Audit Plan</th>
                    <th class="bg-success">Year</th>
                    <th class="bg-success">Status</th>
                    <th class="bg-danger">To Create</th>
                    <th class="bg-warning">Pending</th>
                    <th class="bg-info">Done</th>
                  </tr>
                  </thead>
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
                    'url':'auditPlan',
                     'type': "POST",
                     "data": function (data){
                        data.action = "auditPlanAuditorDatatable",
                        data.interal_audit_id = "<?php echo($_SESSION["dnsc_audit"]["userid"]); ?>"
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'type', "orderable": false  },
                    { data: 'year', "orderable": false  },
                    { data: 'status', "orderable": false  },
                    { data: 'create_count', "orderable": false  },
                    { data: 'pending_count', "orderable": false  },
                    { data: 'done_count', "orderable": false  },
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



$('.select2').select2()
  $('.selectFilter').on('change', function() {
    // alert("change");
            var auditPlan = $('.selectFilter').val();
            datatable.ajax.url('auditPlan?action=auditPlanAuditorDatatable&auditPlan=' + auditPlan).load();
  });

</script>


  <?php require("layouts/footer.php") ?>