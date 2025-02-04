<link rel="stylesheet" href="<?= asset("AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?= asset("AdminLTE/bower_components/select2/dist/css/select2.min.css"); ?>">
<link rel="stylesheet" href="AdminLTE_new/plugins/fullcalendar/main.css">
<div class="content-wrapper ">
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

      <div>
      <div class="row">
          <div class="col-5">
          <div class="card card-row card-secondary " >
          <div class="card-header">
            <h3 class="card-title">
              To Do List
            </h3>
          </div>
          <div class="card-body" style="height: 300px;     overflow-x: auto;">
            <div class="card card-info card-outline" >
              <div class="card-header">
                <h5 class="card-title">Create Labels</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#3</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled="">
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled="">
                  <label for="customCheckbox2" class="custom-control-label">Feature</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled="">
                  <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled="">
                  <label for="customCheckbox4" class="custom-control-label">Documentation</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled="">
                  <label for="customCheckbox5" class="custom-control-label">Examples</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Issue template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#4</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled="">
                  <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled="">
                  <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create PR template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#6</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Actions</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#7</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>

              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
          </div>
          <div class="card-footer">
          Footer
        </div>
        </div>

        
          </div>

          <!-- <div class="col-4">
          <div class="card card-row card-secondary " >
          <div class="card-header">
            <h3 class="card-title">
              To Do List
            </h3>
          </div>
          <div class="card-body" style="height: 300px;     overflow-x: auto;">
            <div class="card card-info card-outline" >
              <div class="card-header">
                <h5 class="card-title">Create Labels</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#3</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled="">
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled="">
                  <label for="customCheckbox2" class="custom-control-label">Feature</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled="">
                  <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled="">
                  <label for="customCheckbox4" class="custom-control-label">Documentation</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled="">
                  <label for="customCheckbox5" class="custom-control-label">Examples</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Issue template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#4</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled="">
                  <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled="">
                  <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create PR template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#6</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Actions</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#7</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>

              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
          </div>
          <div class="card-footer">
          Footer
        </div>
        </div>
          </div>
 -->
          <div class="col-7">

          <div class="card card-row card-secondary " >
          <div class="card-header">
            <h3 class="card-title">
              Calendar
            </h3>
          </div>
          <div class="card-body">
       
          <div id="calendar"></div>
      

         

          </div>
          <div class="card-footer">
          Footer
        </div>
        </div>
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
    <script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
    <script src="AdminLTE_new/plugins/fullcalendar/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            { title: 'Meeting', start: '2025-02-10', end: '2025-02-12' },
            { title: 'Holiday', start: '2024-02-15' },
            { title: 'Conference', start: '2024-02-20' }
        ]
    });
    calendar.render();
});
</script>
<?php require("layouts/footer.php") ?>