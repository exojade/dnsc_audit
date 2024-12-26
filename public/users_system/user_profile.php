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
          <!-- <div class="col-sm-6">
            <h1>Users</h1>
          </div> -->
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $process = query("SELECT 
    child.id AS child_id,
    child.area_name AS child_area,
    parent.area_name AS parent_area,
    grandparent.area_name AS grandparent_area,
    child.area_description,
    child.type
    FROM 
        areas AS child
    LEFT JOIN 
        areas AS parent 
    ON 
        child.parent_area = parent.id
    LEFT JOIN 
        areas AS grandparent 
    ON 
        parent.parent_area = grandparent.id
    WHERE 
        child.type = 'process'
        order by child_area asc
    ");
    
    ?>

    <!-- Main content -->
    <section class="content">


    <div class="modal fade" id="modalAddPosition">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Add Position</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="users">
                  <input type="hidden" name="action" value="addPosition">
                  <input type="hidden" name="user_id" value="<?php echo($_GET["id"]); ?>">

                  <div class="form-group">
                    <label>Position Name</label>
                    <input type="text" required class="form-control" name="positionName" placeholder="Enter Position Name">
                  </div>

                  <div class="form-group">
                    <label>Process</label>
                    <select class="form-control" name="process_id" required>
                      <option value="" selected disabeld>Please select process</option>
                      <?php foreach($process as $row): ?>
                        <option value="<?php echo($row["child_id"]); ?>"><?php echo($row["grandparent_area"] ." > ".$row["parent_area"]." > ".$row["child_area"]); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- <div class="fetched-data"></div> -->
                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>



      <div class="container-fluid">
        <div class="row">

        <div class="col-3">
        <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="AdminLTE_new/dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo($user["fullname"]); ?></h3>

                <p class="text-muted text-center"><?php echo($user["username"]); ?></p>

                

                <a href="#" class="btn btn-primary btn-block"><b>Reset Password</b></a>
              </div>
              <!-- /.card-body -->
            </div>
        </div>


        
          <div class="col-9">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title">User's Position</h3>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modalAddPosition">Add Position</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered table-striped datatable">
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Position</th>
                    <th>Area</th>
                    <th>Active Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($position as $row): ?>
                      <tr>
                        <td><a href="#" class="btn btn-block btn-sm btn-danger">Delete</a></td>
                        <td><?php echo($row["position"]); ?></td>
                        <td><?php echo($row["area_name"] . " > " . $row["area_description"]); ?></td>
                        <td><?php echo($row["active_status"]); ?></td>
                      </tr>
                    <?php endforeach; ?>
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

     $('.datatable').DataTable();



// var datatable = 
//             $('#ajax_datatable').DataTable({
//                 "searching": true,
//                 "pageLength": 10,
//                 language: {
//                     searchPlaceholder: "Search Name"
//                 },
//                 "bLengthChange": true,
//                 "ordering": false,
//                 'processing': true,
//                 'serverSide': true,
//                 'serverMethod': 'post',
                
//                 'ajax': {
//                     'url':'users',
//                      'type': "POST",
//                      "data": function (data){
//                         data.action = "usersList";
//                      }
//                 },
//                 'columns': [
//                     { data: 'action', "orderable": false },
//                     { data: 'fullname', "orderable": false  },
//                     { data: 'username', "orderable": false  },
//                     { data: 'role_name', "orderable": false  },
//                 ],
//                 "footerCallback": function (row, data, start, end, display) {
//                     // var api = this.api(), data;
                    

//                     // Remove the formatting to get integer data for summation
//                     // var intVal = function (i) {
//                     //     return typeof i === 'string' ?
//                     //         i.replace(/[\$,]/g, '') * 1 :
//                     //         typeof i === 'number' ?
//                     //             i : 0;
//                     // };

//                     // // Total over all pages
//                     // received = api
//                     //     .column(5)
//                     //     .data()
//                     //     .reduce(function (a, b) {
//                     //         return intVal(a) + intVal(b);
//                     //     }, 0);
//                     //     console.log(received);

//                     // $('#currentTotal').html('$ ' + received.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
//                 }
//             });




  $('.selectFilter').on('change', function() {
    // alert("change");
            var roleSelect = $('#roleSelect').val();
            datatable.ajax.url('users?action=usersList&role=' + roleSelect).load();
  });

</script>


  <?php require("layouts/footer.php") ?>