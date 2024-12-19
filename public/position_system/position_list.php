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
            <h1>Position</h1>
          </div>
          <div class="col-sm-6">
              <a data-toggle="modal" data-target="#modalAddPosition" class="btn btn-primary float-right">Add Position</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

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

    // dump($process);

    ?>


    <div class="modal fade" id="modalAddPosition">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-primary">
              <h3 class="modal-title text-center">Add Position</h3>
          </div>
          <div class="modal-body">

              <form class="generic_form_trigger" data-url="position">
                <input type="hidden" name="action" value="addPosition">

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
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Position</th>
                    <th>Area</th>
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
                    'url':'position',
                     'type': "POST",
                     "data": function (data){
                        data.action = "positionList";
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'position_name', "orderable": false  },
                    { data: 'area_name', "orderable": false  },
                    { data: 'active_status', "orderable": false  },
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