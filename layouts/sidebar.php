
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
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="image" style="display:block;">
            <!-- <img style="width: 5rem;" src="resources/panabologo.png" class="img-circle elevation-2" alt="User Image"> -->
            <img style="width: 10rem;" src="<?= asset("resources/dnsc-logo.png"); ?>" class="img-circle" alt="User Image">
        </div>
      </div>
    <!-- Sidebar -->
    <div class="sidebar">

      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


<?php
switch ($_SESSION["dnsc_audit"]["role"]) {
  case 1:
    ?>

    <?php
    break;
  case 2:
    ?>
<li class="nav-header">Main</li>
  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-header">File Management</li>
  <li class="nav-item">
      <a href="evidence?action=myEvidence" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Evidences
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="mymanuals" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Manuals
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="controlled_forms" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Controlled Forms
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="archives?action=myArchives" class="nav-link">
        <i class="nav-icon fas fa-archive"></i>
        <p>
          Archives
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
<!-- 
  <li class="nav-item">
      <a href="audit_evaluation?action=process_owners" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Audit Evaluation
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li> -->

  <li class="nav-header">Audit Related</li>

  <li class="nav-item">
      <a href="auditPlan?action=process_owner_list" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Audit Plans
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  

  <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Audit Evaluation
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="audit_evaluation?action=process_owners_pending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pending</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="audit_evaluation?action=process_owners_done" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Done</p>
            </a>
          </li>
        </ul>
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
        <i class="nav-icon fas fa-file"></i>
        <p>
          Audit Report


          <?php
          $myTeam = query("SELECT team_id FROM audit_plan_team_members 
					WHERE id = ? 
					GROUP BY team_id", 
					$_SESSION["dnsc_audit"]["userid"]);
					$teamIds = array_column($myTeam, "team_id");

					$myTeam = "'" . implode("','", $teamIds) . "'";

					$audit_plans = "
					SELECT 
						aps.audit_plan,
						SUM(CASE WHEN ar.audit_report_status = 'PENDING' THEN 1 ELSE 0 END) AS pending_count,
						SUM(CASE WHEN ar.audit_report_status IS NULL THEN 1 ELSE 0 END) AS create_count, -- NULL means 'CREATE'
						SUM(CASE WHEN ar.audit_report_status = 'DONE' THEN 1 ELSE 0 END) as done_count
					FROM 
						audit_plan_schedule aps
					LEFT JOIN 
						process p ON p.process_id = aps.process_id
					LEFT JOIN 
						aps_area aa ON aa.aps_id = aps.aps_id
					LEFT JOIN 
						areas a ON a.id = aa.area_id
					LEFT JOIN 
						audit_report ar ON ar.aps_area = aa.area_id and ar.aps_id = aps.aps_id
						WHERE 
						aps.team_id IN ($myTeam)
					";
					$audit_plans = query($audit_plans);
          ?>
          <?php if(!empty($audit_plans)): ?>
            <?php if($audit_plans[0]["create_count"] != 0): ?>
              <span class="right badge badge-danger"><?php echo($audit_plans[0]["create_count"]); ?></span>
            <?php endif; ?>
          <?php endif; ?>
          <?php if(!empty($audit_plans)): ?>
            <?php if($audit_plans[0]["pending_count"] != 0): ?>
              <span class="right badge badge-warning"><?php echo($audit_plans[0]["pending_count"]); ?></span>
            <?php endif; ?>
          <?php endif; ?>
          
        </p>
      </a>
  </li>



  <li class="nav-item">
      <a href="audit_checklist" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Audit Checklist
          <?php
          $myTeam = query("SELECT team_id FROM audit_plan_team_members 
					WHERE id = ? 
					GROUP BY team_id", 
					$_SESSION["dnsc_audit"]["userid"]);
					$teamIds = array_column($myTeam, "team_id");

					$myTeam = "'" . implode("','", $teamIds) . "'";

					$audit_plans = "
					SELECT 
						aps.audit_plan,
						SUM(CASE WHEN ar.audit_checklist_status = 'PENDING' THEN 1 ELSE 0 END) AS pending_count,
						SUM(CASE WHEN ar.audit_checklist_status IS NULL THEN 1 ELSE 0 END) AS create_count, -- NULL means 'CREATE'
						SUM(CASE WHEN ar.audit_checklist_status = 'DONE' THEN 1 ELSE 0 END) as done_count
					FROM 
						audit_plan_schedule aps
					LEFT JOIN 
						process p ON p.process_id = aps.process_id
					LEFT JOIN 
						aps_area aa ON aa.aps_id = aps.aps_id
					LEFT JOIN 
						areas a ON a.id = aa.area_id
					LEFT JOIN 
						audit_checklist ar ON ar.aps_area = aa.area_id and ar.aps_id = aps.aps_id
						WHERE 
						aps.team_id IN ($myTeam)
					";
					$audit_plans = query($audit_plans);
          ?>
          <?php if(!empty($audit_plans)): ?>
            <?php if($audit_plans[0]["create_count"] != 0): ?>
              <span class="right badge badge-danger"><?php echo($audit_plans[0]["create_count"]); ?></span>
            <?php endif; ?>
          <?php endif; ?>
          <?php if(!empty($audit_plans)): ?>
            <?php if($audit_plans[0]["pending_count"] != 0): ?>
              <span class="right badge badge-warning"><?php echo($audit_plans[0]["pending_count"]); ?></span>
            <?php endif; ?>
          <?php endif; ?>
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

  <li class="nav-item">
      <a href="consolidated_ar" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
          Consolidated AR
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-header">Review</li>

  <li class="nav-item">
      <a href="audit_report_review" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
          Audit Reports
          <span class="right badge badge-danger">1</span><span class="right badge badge-warning">2</span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="audit_checklist_review" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
          Audit Checklist
          <span class="right badge badge-danger">1</span><span class="right badge badge-warning">2</span>
        </p>
      </a>
  </li>

  <li class="nav-header">Evaluation</li>
  <li class="nav-item">
      <a href="audit_evaluation?action=all" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
          Audit Evaluation
        </p>
      </a>
  </li>
  <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Audit Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Done</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users?action=pending_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Audit Checklist
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Done</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users?action=pending_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
            </ul>
          </li> -->
    <?php
    break;
  case 5:
    ?>
     <li class="nav-header">Main</li>
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
      <a href="messages" class="nav-link">
        <i class="nav-icon fas fa-comments"></i>
        <p>
          Messages
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-header">Admin</li>
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
      <a href="process" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
          Process
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
      <a href="position" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Position
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-header">Human Resource</li>
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
                <a href="survey?action=graph" class="nav-link">
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
  <li class="nav-header">File Management</li>
  <li class="nav-item">
      <a href="controlled_forms" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Controlled Forms
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="manuals" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Manuals
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