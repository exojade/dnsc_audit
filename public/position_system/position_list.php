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
          <div class="col-6">
            <a href="#" data-toggle="modal" class="btn btn-success float-right" data-target="#modalAddProcess">Add Position</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="modal fade" id="modalAddProcess">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Add Position</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="position">
                  <input type="hidden" name="action" value="addPosition">
                  <div class="form-group">
                    <label>Position Name</label>
                    <input type="text" required class="form-control" name="position_name" placeholder="Enter Position Name">
                  </div>
                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalAssignedArea">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Assigned Area</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="position">
                  <input type="hidden" name="action" value="addAssignedArea">
                    <div class="fetched-data"></div>
                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalUpdate">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Update Position</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="position">
                  <input type="hidden" name="action" value="updatePosition">
                    <div class="fetched-data"></div>
                  <hr>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>


        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                <table id="ajax_datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="15%">Action</th>
                    <th width="20%">Position</th>
                    <th>Assigned Area</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
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




    $('#modalAssignedArea').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'position', //Here you will fetch records 
            data: {
                position_id: rowid, action: "modalAssignedArea"
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


     $('#modalUpdate').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'position', //Here you will fetch records 
            data: {
                position_id: rowid, action: "modalUpdate"
            },
            success : function(data){
                $('#modalUpdate .fetched-data').html(data);
                Swal.close();
                //Show fetched data from database
            }
        });
     });


var datatable = 
            $('#ajax_datatable').DataTable({
                "searching": true,
                "pageLength": 10,
                language: {
                    searchPlaceholder: "Search Position"
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
                        data.action = "position_list";
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'position_name', "orderable": false  },
                    { data: 'assigned_area', "orderable": false  },
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

            $(document).on('click', '.btn-info', function (e) {
    e.preventDefault();

    // Get the data-id of the selected area
    var areaId = $(this).data('id');

    // Send an AJAX request to fetch processes
    $.ajax({
        url: 'area', // The same endpoint as the DataTable
        type: 'POST',
        data: {
            action: 'getProcesses',
            areaId: areaId
        },
        success: function (response) {
          theResponse = JSON.parse(response);
          // console.log(theResponse);
            if (theResponse.success) {
 
                // Clear the #processDatatable table
                $('#processDatatable tbody').empty();

                // Populate the table with the fetched processes
                var processes = theResponse.data;
                processes.forEach(function (process) {
                    $('#processDatatable tbody').append(`
                        <tr>
                            <td>
                                <button class="btn btn-sm btn-warning btn-block" data-id="${process.id}">Update</button>
                            </td>
                            <td>${process.area_name}</td>
                            <td>${process.area_description}</td>
                        </tr>
                    `);
                });
            } else {
                alert('Failed to fetch processes.');
            }
        },
        error: function () {
            alert('An error occurred while fetching processes.');
        }
    });
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