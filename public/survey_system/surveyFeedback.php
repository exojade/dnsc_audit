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
            <h1>Survey Feedback</h1>
          </div>
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    <div class="modal fade" id="modalAssignedArea">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Assigned Area</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="users">
                  <input type="hidden" name="action" value="addAssignedArea">
                    <div class="fetched-data"></div>
                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
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
                  <select class="form-control selectFilter" id="officeSelect">
                    <option value="" selected disabled>Please select office to show</option>
                    <?php $office = query("select * from office"); ?>
                    <?php foreach($office as $row): ?>
                      <option value="<?php echo($row["office_id"]); ?>"><?php echo($row["office_name"]); ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                  </div>


                  <div class="col-3">
                  <div class="form-group">
                    <input type="date" id="dateInput" placeholder="From" class="form-control">
                </div>
                  </div>

                  <div class="col-3">
                  <div class="form-group">
                    <input type="date" id="dateInput2" placeholder="To" class="form-control">
                </div>
                  </div>
                </div>
                
              </div>
              <style>
.table th {
  text-align: center; /* Horizontal alignment */
  vertical-align: middle !important; /* Vertical alignment */
  color: #fff;
  background-color: #428B68;

}
              </style>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="ajax_datatable" class="table table-bordered" style="width: 100%;">
                  <thead>
                  <tr>
                    <th width="10%" rowspan="2">Date</th>
                    <th rowspan="2">Client</th>
                    <th rowspan="2">Office</th>
                    <th colspan="
                    <?php $count = query("select count(*) as count from survey_questionnaire where active_status = 'ACTIVE'");
                    echo($count[0]["count"]);
                    ?> 
                    
                    
                    " class="text-center">Service</th>
                   
                    
                    <th rowspan="2">Average</th>
                    <th rowspan="2">Comments</th>
                  </tr>
                  <tr>
                  <?php $criteria = query("select * from survey_questionnaire where active_status = 'ACTIVE'"); ?>
                    <?php foreach($criteria as $row): ?>
                      <th>
                        <?php echo($row["question"]); ?>
                      </th>
                      <?php endforeach; ?>
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
                dom: 'Brfltip',
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'survey',
                     'type': "POST",
                     "data": function (data){
                        data.action = "feedbackList";
                     }
                },
                'columns': [
                    { data: 'date', "orderable": false },
                    { data: 'client', "orderable": false  },
                    { data: 'office', "orderable": false  },
                    <?php $criteria = query("select * from survey_questionnaire where active_status = 'ACTIVE'"); ?>
                    <?php foreach($criteria as $row): ?>
                { 
                    data: '<?php echo($row["questionnaire_id"]); ?>', 
                    "orderable": false,
                    "render": function(data, type, row) {
                        return data == 0 ? "N/A" : data;
                    }
                },
            <?php endforeach; ?>
                    { data: 'average', "orderable": false  },
                    { data: 'comments', "orderable": false  },
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
            $('.dt-buttons').addClass('float-right');

function filter(){
  var officeSelect = $('#officeSelect').val();
  var dateInput = $('#dateInput').val();
  var dateInput2 = $('#dateInput2').val();
  datatable.ajax.url('survey?action=feedbackList&office_id=' + officeSelect + '&dateFrom='+dateInput+'&dateTo='+dateInput2).load();
}

  $('.selectFilter, #dateInput, #dateInput2').on('change', function() {
    // alert("change");
    filter();
  });

</script>


  <?php require("layouts/footer.php") ?>