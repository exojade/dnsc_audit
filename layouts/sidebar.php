
<style>
.user-panel{
  border-bottom: none !important;
}

.sidebar-dark-primary{

  background-color: <?php echo($siteOptions["mainColor"]); ?> !important;
  /* background-color: #F77D1A !important; */
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
            <img style="width: 5rem;" src="<?php echo($siteOptions["mainLogo"]); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
      </div>
    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  <?php if($_SESSION["dnsc_audit"]["role"] == "admin"): ?>
 


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
      <a href="patient" class="nav-link">
        <i class="nav-icon fas fa-paw"></i>
        <p>
          Pet Patients
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <!-- <li class="nav-item">
    <a href="schedule" class="nav-link">
      <i class="nav-icon fas fa-calendar"></i>
      <p>
        Pending Walk Ins
        <?php $pending = query("select count(*) as count from checkup_schedule where status = 'PENDING'"); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
      </p>
    </a>
</li> -->

  <li class="nav-item">
      <a href="appointment" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Appointment
          <?php $pending = query("select count(*) as count from appointment where appointmentStatus = 'PENDING'"); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="petBoarding" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Pet Boarding
          <?php $pending = query("select count(*) as count from pet_boarding where status not in ('DONE', 'CANCELLED')"); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="calendar" class="nav-link">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
          Calendar
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="medical" class="nav-link">
        <i class="nav-icon fas fa-notes-medical"></i>
        <p>
          Medical History
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="disease" class="nav-link">
        <i class="nav-icon fas fa-bacteria"></i>
        <p>
          Disease
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>



  <!-- <li class="nav-item">
      <a href="prescription" class="nav-link">
        <i class="nav-icon fas fa-prescription"></i>
        <p>
          Prescription
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li> -->

  <!-- <li class="nav-item">
      <a href="data_analysis" class="nav-link">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>
          Data Analysis
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li> -->

  <li class="nav-item">
      <a href="doctors" class="nav-link">
        <i class="nav-icon fas fa-stethoscope"></i>
        <p>
          Doctors
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="users" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Users
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="users" class="nav-link">
        <i class="nav-icon fas fa-bullhorn"></i>
        <p>
          Announcements
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <?php elseif($_SESSION["dnsc_audit"]["role"] == "CLIENT"): ?>

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
      <a href="patient?action=specific&id=<?php echo($_SESSION["dnsc_audit"]["userid"]); ?>" class="nav-link">
        <i class="nav-icon fas fa-paw"></i>
        <p>
          My Pets
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="myAppointments" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          My Appointments
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="petBoarding" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Pet Boarding 
          <?php $pending = query("select count(*) as count from pet_boarding where status not in ('DONE', 'CANCELLED') and clientId = '".$_SESSION["dnsc_audit"]["userid"]."'"); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
        </p>
      </a>
  </li>


  <?php elseif($_SESSION["dnsc_audit"]["role"] == "DOCTOR"): ?>

<li class="nav-item">
    <a href="index" class="nav-link">
      <i class="nav-icon fas fa-home"></i>
      <p>
        Dashboard
        <span class="right badge badge-danger"></span>
      </p>
    </a>
</li>

<li class="nav-item">
      <a href="patient" class="nav-link">
        <i class="nav-icon fas fa-paw"></i>
        <p>
          Pet Patients
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

<li class="nav-item">
    <a href="appointment" class="nav-link">
      <i class="nav-icon fas fa-calendar"></i>
      <p>
      Appointment
        <?php $pending = query("select count(*) as count from appointment where appointmentStatus = 'ONGOING' and doctorId = ?", $_SESSION["dnsc_audit"]["userid"]); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
      </p>
    </a>
</li>




<!-- <li class="nav-item">
    <a href="schedule" class="nav-link">
      <i class="nav-icon fas fa-briefcase"></i>
      <p>
        For Checkup
        <?php $pending = query("select count(*) as count from checkup_schedule where status = 'PENDING' and doctorId = ?", $_SESSION["dnsc_audit"]["userid"]); ?>
        <?php if($pending[0]["count"] != 0): ?>
          <span class="badge badge-danger right"><?php echo($pending[0]["count"]); ?></span>
        <?php endif; ?>
      </p>
    </a>
</li> -->


<li class="nav-item">
      <a href="medical" class="nav-link">
        <i class="nav-icon fas fa-notes-medical"></i>
        <p>
          Medical History
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

<!-- <li class="nav-item">
      <a href="data_analysis" class="nav-link">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>
          Data Visualization
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li> -->

  <?php endif; ?>

  

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