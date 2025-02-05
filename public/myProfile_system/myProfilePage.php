<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <style>
.profile-user-img {
  width: 200px;
}
      </style>
    <section class="content-header">
            <h1>Profile Page</h1>
    </section>

    <?php 
    
    $myProfile = query("select u.*, r.role_name from users u 
                        left join roles r on r.id = u.role_id
                        where u.id = ?
                        ", $_SESSION["dnsc_audit"]["userid"]);
    $myProfile=$myProfile[0];

    $area = query("select * from areas where type in ('office', 'institute')");
    $Area = [];
    foreach($area as $row):
      $Area[$row["id"]] = $row;
    endforeach;
    $users_area = query("select * from users_area");
    $UsersArea = [];
    foreach($users_area as $row):
      $UsersArea[$row["user_id"]][$row["area_id"]] = $row;
    endforeach;

    $assigned_area = "No assigned Area";
					$AssignedAreas = [];
					if(isset($UsersArea[$myProfile["id"]])):
						$theAreas = $UsersArea[$myProfile["id"]];
						foreach($theAreas as $a):
							$AssignedAreas[] = $Area[$a["area_id"]]["area_name"];
						endforeach;
					endif;
					// dump($AssignedAreas);
					$assigned_area = implode(", ", $AssignedAreas);
    ?>


    <!-- Main content -->


    <section class="content">
    


    <div class="modal fade" id="modalUpdateProfile">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Update My Profile</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="myProfile">
                  <input type="hidden" name="action" value="updateProfile">

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>First Name <span class="color-red">*</span></label>
                        <input required type="text" class="form-control" name="firstname" value="<?php echo($myProfile["firstname"]); ?>">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="<?php echo($myProfile["middlename"]); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Last Name <span class="color-red">*</span></label>
                        <input required type="text" class="form-control" name="surname" value="<?php echo($myProfile["surname"]); ?>">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Name Extension</label>
                        <input type="text" class="form-control" name="suffix" value="<?php echo($myProfile["suffix"]); ?>">
                      </div>
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
      <div class="container-fluid">
        <div<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">
                  Card
                </h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="AdminLTE_new/dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo($myProfile["firstname"] . " " . $myProfile["middlename"] . " " . $myProfile["surname"]); ?></h3>
                <p class="text-muted text-center"><?php echo($myProfile["role_name"]); ?></p>
                <a href="#" class="btn btn-warning btn-block"><b>Change Password</b></a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header bg-success">
              <h3 class="card-title">
                  Profile Information
                </h3>
              </div>
              <div class="card-body">

              <div class="row">
                <div class="col">
                  <dl>
                  <dt>Role / Position</dt>
                  <dd><?php echo($myProfile["role_name"]); ?></dd>
                    <dt>Area Assigned</dt>
                    <dd><?php echo($assigned_area); ?></dd>
                    
                  </dl>
                </div>
                <div class="col">
                  <dl>
                    <dt>Email</dt>
                    <dd><?php echo($myProfile["username"]); ?></dd>
                    
                  </dl>

                </div>
              </div>

              <a href="#" data-toggle="modal" data-target="#modalUpdateProfile" class="btn btn-warning"><b>Update Profile</b></a>

              
            
              </div>
            </div>
          </div>
        </div>
        </div>
</section>

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
<script src="AdminLTE_new/plugins/toastr/toastr.min.js"></script>
<script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
<script src="AdminLTE_new/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="resources/vue.js"></script>





  <?php require("layouts/footer.php") ?>