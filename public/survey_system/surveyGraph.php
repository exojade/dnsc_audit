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
            <h1>
              Edit Survery Form
            </h1>
          </div>
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">



      <div class="modal fade" id="modalAddQuestion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Add Survey Criteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="generic_form_trigger" data-url="survey">
                <input type="hidden" name="action" value="addSurvey">
                          <div class="form-group">
                            <label>Criteria <span class="color-red">*</span></label>
                              <input value="" name="question" required type="text" class="form-control"  placeholder="Enter Criteria Here ..">
                          </div>
                   <hr>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
      
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modalAddOffice">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Add Office Options</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="generic_form_trigger" data-url="survey">
                <input type="hidden" name="action" value="addOffice">
                          <div class="form-group">
                            <label>Office <span class="color-red">*</span></label>
                              <input value="" name="office" required type="text" class="form-control"  placeholder="Enter Office Here ..">
                          </div>

                          <?php $office = query("select * from office"); ?>
                          <div class="form-group">
                            <label>Parent Office </label>
                            <select name="parent_office" class="form-control">
                                <option value="" disabled selected>Leave this if not under and office</option>
                              <?php foreach($office as $row): ?>
                                <option value="<?php echo($row["office_id"]); ?>"><?php echo($row["office_name"]); ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          
                   <hr>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
      
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>















        <div class="row">
          <div class="col-6">
            <!-- Default box -->
            <div class="card">

              <div class="card-header">

              <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Survey Criteria
                </h3>
                <a href="#" data-target="#modalAddQuestion" data-toggle="modal" class="float-right btn btn-sm btn-info" >Add Survey Criteria</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-bordered datatable" >
                  <?php $criteria = query("select * from survey_questionnaire"); ?>
                  <thead>
                  <tr>
                    <th width="15%">Action</th>
                    <th>Question</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($criteria as $row): ?>
                      <tr>
                        <td>
                            <div class="btn-group btn-block">
                              <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>  
                              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>  
                            </div>
                        </td>
                        <td><?php echo($row["question"]); ?></td>
                        <td><?php echo($row["active_status"]); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="col-6">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Offices
                </h3>
                <a href="#" data-target="#modalAddOffice" data-toggle="modal" class="float-right btn btn-sm btn-info" >Add Office</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-bordered table-striped datatable" >
                  <thead>
                  <tr>
                    <th width="15%">Action</th>
                    <th>Office</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($office as $row): ?>
                      <tr>
                        <td>
                            <div class="btn-group btn-block">
                              <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>  
                              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>  
                            </div>
                        </td>
                        <td><?php echo($row["office_name"]); ?></td>
                        <td><?php echo($row["active_status"]); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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


     $('#modalAssignedArea').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'users', //Here you will fetch records 
            data: {
                user_id: rowid, action: "modalAssignedArea"
            },
            success : function(data){
                $('#modalAssignedArea .fetched-data').html(data);
                $("#areaSelect").select2({
    placeholder: "Select an area", // Placeholder text
    allowClear: true // Adds a clear button to remove the selection
});
                Swal.close();
                //Show fetched data from database
            }
        });
     });


            $('.datatable').DataTable();




  $('.selectFilter').on('change', function() {
    // alert("change");
            var roleSelect = $('#roleSelect').val();
            datatable.ajax.url('users?action=usersList&role=' + roleSelect).load();
  });

</script>


  <?php require("layouts/footer.php") ?>