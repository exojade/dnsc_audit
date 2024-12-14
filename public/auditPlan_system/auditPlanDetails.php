<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Audit Plan</h1>
          </div>
       
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

          <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Audit Plan Form</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form class="generic_form_trigger" data-url="auditPlan">
              <input type="hidden" name="action" value="newPlan">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Type</label>
                  <select required class="form-control" name="type" style="width: 100%;">
                    <option selected value="" disabled>Please select type of Audit Plan</option>
                    <option class="1st Internal Quality Audit">1st Internal Quality Audit</option>
                    <option class="2nd Internal Quality Audit">2nd Internal Quality Audit</option>
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Year</label>
                  <input required type="text" name="year" class="form-control" placeholder="Enter Year">
                </div>
              </div>
            </div>

            <label>Introduction</label>
              <textarea name="introduction" required class="summernote">
            </textarea>

            <label>Audit Objectives</label>
              <textarea name="audit_objectives" required class="summernote">
            </textarea>

            <label>Reference Standard</label>
              <textarea name="reference_standard" required class="summernote">
            </textarea>

            <label>Audit Methodologies</label>
              <textarea name="audit_methodologies" required class="summernote">
            </textarea>




          
          </div>
          <div class="card-footer">
              <button class="btn btn-success"><i class="fa fa-save mr-3"></i>Save</button>
          </div>
        </form>
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

$('.summernote').summernote()


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
                        data.action = "auditPlanList";
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'type', "orderable": false  },
                    { data: 'year', "orderable": false  },
                    { data: 'status', "orderable": false  },
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