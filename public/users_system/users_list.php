<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#add_user">ADD STAFF / ADMINISTRATOR</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="modal fade" id="add_user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="users">
              <input type="hidden" name="action" value="addUser">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address / Username</label>
                <input required type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Fullname</label>
                <input required type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input required type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please select Gender</option>
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <select required name="role" class="form-control select2">
                  <option selected disabled value="">Please select Role</option>
                  <option value="ADMIN">ADMIN</option>
                  <option value="SPONSOR">SPONSOR</option>
                  <option value="VALIDATOR">VALIDATOR</option>
                  <option value="FACILITATOR">FACILITATOR</option>
                </select>
              </div>


              <div class="row">
                        <div class="col-12">
                        <div class="form-group">
                          <label for="Image" class="form-label">Profile Image</label>
                          <input accept="image/png, image/gif, image/jpeg" class="form-control" type="file" id="formFile" name="profile_image" onchange="preview()">
                          <button onclick="clearImage()" type="button" class="btn btn-primary mt-3">Clear</button>
                      </div>
                        </div>
                        <div class="col-12">
                        <img id="frame" src="" class="img-fluid" width="200" height="200" />

                        </div>
                      </div>

             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Username / Email</th>
                    <th>Role</th>
                    <th>Fullname</th>
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
                    searchPlaceholder: "Search Pet Name"
                },
                "bLengthChange": true,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'users',
                     'type': "POST",
                     "data": function (data){
                        data.action = "usersList";
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'username', "orderable": false  },
                    { data: 'role', "orderable": false  },
                    { data: 'fullname', "orderable": false  },
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
  var petOwnerSelect = $('#petOwnerSelect').select2('data');
  var petOwner = '';
  if (petOwnerSelect[0]) {
      clientId = petOwnerSelect[0].id;
  }
  // alert(id);
  var from = $('#fromDate').val();
  var to = $('#toDate').val();
  // var type = $('#typeSelect').val();

  var type = $('#typeSelect').val() || "";
  var service = $('#serviceSelect').val() || "";
  // var service = $('#serviceSelect').val();






            datatable.ajax.url('medical?action=medicalRecordMasterList&clientId=' + clientId+'&from='+from+'&to='+to+'&service='+service+'&type='+type).load();
});

</script>


  <?php require("layouts/footer.php") ?>