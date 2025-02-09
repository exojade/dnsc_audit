<link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?= asset("AdminLTE/bower_components/select2/dist/css/select2.min.css"); ?>">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/fullcalendar/main.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
     
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">



      <div class="modal fade" id="newAnnouncement">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">New Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
  
              <form class="generic_form_trigger" role="form" enctype="multipart/form-data" data-url="index">
                <input type="hidden" name="action" value="addAnnouncement">
                <input type="hidden" name="from_sender" value="<?php echo($_SESSION["dnsc_audit"]["userid"]); ?>">


              <textarea id="summernote" name="announcement"></textarea>
              

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                  </form>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-12 col-md-12">
          <div class="card">
              <div class="card-header d-flex p-0">
                <!-- <h3 class="card-title p-3 text-success"><b>Pages</b></h3> -->
                <ul class="nav nav-pills p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Announcements</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Calendar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_2">
                    <?php if($_SESSION["dnsc_audit"]["role"] == 5 || $_SESSION["dnsc_audit"]["role"] == 1 ): ?>
                  <a href="#" data-toggle="modal" class="btn btn-success" data-target="#newAnnouncement">New Annoucement</a>
                  
                  <br>
                  <br>
                  <?php endif; ?>
                  <div  style="max-height:45vh; overflow-y: auto; overflow-x: hidden;">
                  <table id="ajaxDatatable" width="100%;">
                  <thead>
                  <tr>
                    <th></th>
                  </tr>
                  </thead>
                </table>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <div class="row">
                      <div class="col-12">
                        <div id="calendar"></div>
                      </div>
                      <div class="col-4">

                      </div>

                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            </div>



        
          </div>
        </div>
    






     
      </div>
    </section>
  </div>

    <script src="<?= asset("AdminLTE/bower_components/select2/dist/js/select2.full.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/moment/moment.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/jszip/jszip.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/pdfmake/pdfmake.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/pdfmake/vfs_fonts.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?= asset("AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"); ?>"></script>
    <script src="AdminLTE_new/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
    <script src="AdminLTE_new/plugins/fullcalendar/main.js"></script>
<?php require("layouts/footer.php") ?>

<script>

$(document).ready(function () {
  var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: function(fetchInfo, successCallback, failureCallback) {
    // Fetch both holidays and database events
    $.when(
        $.ajax({ url: 'https://date.nager.at/api/v3/PublicHolidays/2025/PH', method: 'GET' }),
        $.ajax({ url: 'index', data: { action: "getAuditPlanSchedules" }, method: 'POST' })
    ).done(function(holidaysResponse, dbEventsResponse) {
        // Map holidays to event format
        var holidays = holidaysResponse[0].map(function(holiday) {
            return {
                title: holiday.localName,
                start: holiday.date,
                allDay: true,
                color: '#ff5733' // Red color for holidays
            };
        });
        // console.log(dbEventsResponse);

        // Map database events to event format
        var dbEvents = JSON.parse(dbEventsResponse[0]).map(function(event) {
            return {
                title: event.event_title, // Ensure you use the correct key from the backend
                start: event.start_date,  // Make sure these keys match your backend
                end: (function() {
        // Create a Date object from the end_date
        var endDate = new Date(event.end_date);
        
        // Add 1 day (24 hours in milliseconds)
        endDate.setDate(endDate.getDate() + 1);
        
        // Format the date back to string (assuming you want the same format as backend)
        return endDate.toISOString().split('T')[0];  // Example format: 'YYYY-MM-DD'
    })(),      // Make sure these keys match your backend
                allDay: true,
                color: '#3498db',
                url: 'auditPlan?action=details&id=' + event.audit_plan
                // Blue color for custom events
            };
        });

        // Merge holidays and database events
        successCallback([...holidays, ...dbEvents]);
    }).fail(function() {
        failureCallback();
    });
}
    });

    // Render calendar only when the tab is shown
    $('a[href="#tab_3"]').on('shown.bs.tab', function () {
        calendar.render(); // Refresh the calendar when the tab is visible
    });
});
$('#summernote').summernote({
  minHeight: 200
});

var datatable = 
            $('#ajaxDatatable').DataTable({
                "searching": false,
                "pageLength": 10,
                language: {
                    searchPlaceholder: "Search Teacher's Name"
                },
                "bLengthChange": true,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'paging': true,
        // 'searching': false, // Disable searching if unnecessary
        'info': true, // Disable table info text
        'ordering': false,
                'serverMethod': 'post',
                'ajax': {
                    'url':'index',
                     'type': "POST",
                     "data": function (data){
                        data.action = "getAnnouncements";
                     }
                },
                dom: '<"top"fpl>rt<"bottom"p><"clear">',
                initComplete: function () {
            // Add float-right to pagination controls
            $('.dataTables_paginate').addClass('float-right');

            // Add float-left to the length menu
            $('#ajaxDatatable_length').addClass('float-left');
        },
                columns: [
            {
                data: 'announcementText',
                render: function (data) {
                    return data; // Render the timeline HTML directly
                },
                orderable: false
            }
        ],
        // createdRow: function (row, data, dataIndex) {
        //     // Inject the HTML directly into the container
        //     $('#ajaxDatatable').append(data.announcementText);
        // },
        // paging: true,
        // searching: false,
        // info: false,
        // ordering: false,
        // destroy: true,
            });

</script>
