
<style>
.user-panel{
  border-bottom: none !important;
}

.sidebar-dark-primary{

  /* background-color: "#005B40 !important"; */
  background-color: #005B40 !important;
  color: #fff;
}
.sidebar-dark-primary a{
  color: #fff !important;
}
</style>


<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="image" style="display:block;">
            <!-- <img style="width: 5rem;" src="resources/panabologo.png" class="img-circle elevation-2" alt="User Image"> -->
            <img style="width: 10rem;" src="<?= asset("resources/dnsc-logo.png"); ?>" class="img-circle" alt="User Image">
        </div>
      </div>
    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

<?php
switch ($_SESSION["dnsc_audit"]["role"]) {
  case 1:
    ?>

    <?php
    break;
  case 2:
    ?>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
    <?php
    break;
  case 3:
    ?>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="auditPlan?action=auditorList" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Audit Plan
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Audit Reports
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
    <?php
    break;
  case 4:
    ?>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="auditPlan" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
          Audit Plan
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
    <?php
    break;
  case 5:
    ?>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users?action=pending_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
            </ul>
          </li>
  <li class="nav-item">
      <a href="area" class="nav-link">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Area
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
              Survey
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="survey?action=feedback" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users?action=pending_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Graph</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey?action=edit_form" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Form</p>
                </a>
              </li>
            </ul>
          </li>




  <li class="nav-item">
      <a href="process" class="nav-link">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Process
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="position" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Position
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
    <?php
    break;
  case 6:
    render("public/dashboard_system/dashboard_admin.php",[]);
    break;
  case 7:
    render("public/dashboard_system/dashboard_admin.php",[]);
    break;
  case 8:
    render("public/dashboard_system/dashboard_admin.php",[]);
    break;
  default:
    echo "Invalid day entered.";
}
?>


  

  <!-- <li class="nav-item">
      <a href="logout" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Sign Out
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li> -->
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="generic_form_trigger" data-url="profile">
                <input type="hidden" name="action" value="changePassword">
                <input type="hidden" name="user_id" value="<?php echo($_SESSION["dnsc_audit"]["userid"]) ?>">
                <div class="form-group">
                  <label>Current Password</label>
                  <input name="current_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>New Password</label>
                  <input name="new_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>Repeat New Password</label>
                  <input name="repeat_password" required type="password" class="form-control"  placeholder="---">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div> -->