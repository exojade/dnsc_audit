<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
  <?php $ap = query("select * from audit_plans order by year, timestamp"); ?>
  <?php $pending_aps = query("select * from audit_plans where cons_audit_report_id = '' or cons_audit_report_id is null order by year, timestamp"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Consolidated Audit Report List</h1>
          </div>
  
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    <div class="modal fade" id="modalNewConsoAR">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">New Consolidated Audit Report</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="consolidated_ar">
                  <input type="hidden" name="action" value="newConsolidated_ar">
                  <div class="form-group">
                    <label>Audit Plan</label>
                    <select required name="audit_plan" class="form-control">
                    <option  value="" selected disabled>Filter Audit Plan</option>
                    <?php foreach($ap as $row): ?>
                      <option value="<?php echo($row["audit_plan"]); ?>"><?php echo($row["type"] . " - " . $row["year"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Report Title</label>
                    <input required type="text" class="form-control" name="report_title" placeholder="Enter..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input required name="fileUpload" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Comments</label>
                      <textarea rows="5" placeholder="Comments.." required class="form-control" name="comments"></textarea>
                  </div>
                  
                  


                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" id="modalConsAuditReportDetails">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Consolidated Audit Report Details</h3>
          </div>
          <div class="modal-body">
                  <div class="fetched-data"></div>
          </div>
        </div>
      </div>
    </div>



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-4">
                  <div class="form-group">
                  <select class="form-control selectFilter" id="apSelect">
                    <option value="" selected disabled>Filter Audit Plan</option>
                    
                    <?php foreach($ap as $row): ?>
                      <option value="<?php echo($row["audit_plan"]); ?>"><?php echo($row["type"]); ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                  </div>

                  <div class="col-sm-8">
                    <?php if($_SESSION["dnsc_audit"]["role"] == 4): ?>
                      <a href="#" data-toggle="modal" data-target="#modalNewConsoAR" class="btn btn-success float-right"><i class="fa fa-plus mr-3"></i>New Consolidated Audit Report</a>
                    <?php endif; ?>
          </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Cons. Audit Report</th>
                    <th>Title</th>
                    <th>Audit Plan</th>
                    <th>Year</th>
                    <th>AP Status</th>
                    <th>Date Created</th>
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
<script src="AdminLTE_new/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>

$(function () {
  bsCustomFileInput.init();
});
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>

<script>




    $('#modalConsAuditReportDetails').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'consolidated_ar', //Here you will fetch records 
            data: {
                cons_audit_report_id: rowid, action: "modalConsAuditReportDetails"
            },
            success : function(data){
                $('#modalConsAuditReportDetails .fetched-data').html(data);
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
                    'url':'consolidated_ar',
                     'type': "POST",
                     "data": function (data){
                        data.action = "consolidated_ar_list";
                     }
                },
                'columns': [
                    { data: 'cons_report', "orderable": false  },
                    { data: 'title', "orderable": false  },
                    { data: 'type', "orderable": false },
                    { data: 'year', "orderable": false  },
                    { data: 'ap_status', "orderable": false  },
                    { data: 'date_created', "orderable": false  },
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
            var apSelect = $('#apSelect').val();
            datatable.ajax.url('consolidated_ar?action=consolidated_ar_list&audit_plan=' + apSelect).load();
  });

</script>


  <?php require("layouts/footer.php") ?>