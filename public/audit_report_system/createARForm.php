<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
          </div>
      
        </div>
      </div> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <?php
      $aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where tblid = ?", $_GET["aps_area_id"]);
      $aps_area = $aps_area[0];

      $aps_schedule = query("select * from audit_plan_schedule where aps_id = ?", $aps_area["aps_id"]);
      $aps_schedule = $aps_schedule[0];




      // dump($aps_area);
        
      ?>

<div class="card card-default">
              <div class="card-header bg-success">
                <h3 class="card-title">
                  Audit Report Details
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div class="row">
                <div class="col-6">

                <dl class="row">
                  <dt class="col-sm-4">Date of Audit</dt>
                  <dd class="col-sm-8"><?php echo(date("F d, Y")); ?></dd>
                  <dt class="col-sm-4">Process Area</dt>
                  <dd class="col-sm-8"><?php echo($aps_area["area_name"]); ?></dd>
                  <dt class="col-sm-4">ISO Clause</dt>
                  <dd class="col-sm-8"><?php echo($aps_schedule["audit_clause"]); ?></dd>
                  <dt class="col-sm-4">Auditor</dt>
                  <dd class="col-sm-8"><?php echo($_SESSION["dnsc_audit"]["fullname"]); ?></dd>
                </dl>

                </div>
                <div class="col-6">
                  
                </div>
              </div>
            
        
              </div>
              <!-- /.card-body -->
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
<?php require("layouts/footer.php") ?>