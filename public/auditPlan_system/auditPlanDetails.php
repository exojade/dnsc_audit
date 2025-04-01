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
    <section class="content-header">

    </section>

    <?php

    $process = query("select * from process");
    $team = query("SELECT 
    t.team_id,
    t.team_number AS team,
    GROUP_CONCAT(
        CONCAT(u.firstname, ' ', u.surname, ' (', tm.role, ')') 
        ORDER BY tm.role = 'LEADER' DESC, u.surname
        SEPARATOR ', '
    ) AS members
    FROM 
        audit_plan_teams t
    JOIN 
        audit_plan_team_members tm ON t.team_id = tm.team_id
    JOIN 
        users u ON tm.id = u.id
    where t.audit_plan = ?
    GROUP BY 
        t.team_id
    ORDER BY 
        t.team_number
    ", $_GET["id"]);


    // $process = query("SELECT 
    // child.id AS child_id,
    // child.area_name AS child_area,
    // parent.area_name AS parent_area,
    // grandparent.area_name AS grandparent_area,
    // child.area_description,
    // child.type
    // FROM 
    //     areas AS child
    // LEFT JOIN 
    //     areas AS parent 
    // ON 
    //     child.parent_area = parent.id
    // LEFT JOIN 
    //     areas AS grandparent 
    // ON 
    //     parent.parent_area = grandparent.id
    // WHERE 
    //     child.type = 'process'
    //     order by child_area asc
    // ");
    
    ?>

    <!-- Main content -->


    <section class="content">
    <div class="modal fade" id="modalAddTeam">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Add Team</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="addTeam">
                <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                <div class="form-group">
                  <label>Team #</label>
                  <input type="number" required class="form-control" name="teamNumber" placeholder="Enter Team Number">
                </div>
                <div class="form-group">
                  <label>Team Leader</label>
                  <select class="form-control" name="team_leader" id="teamLeaderSelect" required style="width: 100%;">
                    <option value=""></option>
                    <?php foreach($auditors as $row): ?>
                      <option value="<?php echo($row["id"]); ?>"><?php echo($row["surname"] . ", " . $row["firstname"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Members</label>
                  <select class="form-control" name="team_members[]" multiple id="teamMembersSelect" required style="width: 100%;">
                    <?php foreach($auditors as $row): ?>
                      <option value="<?php echo($row["id"]); ?>"><?php echo($row["surname"] . ", " . $row["firstname"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalUpdateTeam">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Update Team</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="updateTeam">
                <div class="fetched-data"></div>
    
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalAddSchedule">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-success">
              <h3 class="modal-title text-center">Add Audit Schedule</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="addSchedule">
                <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                <div class="form-group">
                    <label>Process</label>
                    <select class="form-control" id="processSelect" name="process_id" required style="width: 100%;">
                      <option value="" selected disabled>Please select process here!</option>
                      <?php foreach($process as $row): ?>
                        <option value="<?php echo($row["process_id"]); ?>"><?php echo($row["process_name"]); ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Area</label>
                    <select class="form-control" multiple id="areaSelect" name="area_id[]" required style="width: 100%;">
                    </select>
                </div>
              
                <div class="form-group">
                    <label>Position</label>
                    <select class="form-control" multiple  id="positionSelect" name="position_id[]" required style="width: 100%;">
                    </select>
                </div>

              

                <div class="form-group">
                  <label>Criteria Clause</label>
                  <textarea class="form-control" rows="3" name="criteria_clause" placeholder="Enter ..."></textarea>
                </div>


                <div class="form-group">
                    <label>Team</label>
                    <select class="form-control"  name="team_id" required style="width: 100%;">
                      <option value="" selected disabled>Please select team here!</option>
                      <?php foreach($team as $row): ?>
                        <option value="<?php echo($row["team_id"]); ?>"><?php echo("TEAM " . $row["team"] . " - " . $row["members"]); ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                  <label>Schedule Date</label>
                  <input type="date" class="form-control" name="schedule_date">
                </div>


                <div class="row">
                    <div class="col-6">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>From:</label>
                        <div class="input-group date" id="fromtimepicker" data-target-input="nearest">
                      <input name="fromTime" type="text" class="form-control datetimepicker-input" data-target="#fromtimepicker"/>
                      <div class="input-group-append" data-target="#fromtimepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                      </div>
                    </div>

                    </div>
                    <div class="col-6">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>To:</label>
                        <div class="input-group date" id="totimepicker" data-target-input="nearest">
                      <input name="toTime" type="text" class="form-control datetimepicker-input" data-target="#totimepicker"/>
                      <div class="input-group-append" data-target="#totimepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                      </div>
                    </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" id="modalUpdateSchedule">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Update Audit Schedule</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="updateAuditSchedule">
                <div class="fetched-data"></div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" id="modalAddFixedSchedule">
      <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Add Fixed Schedule</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                <input type="hidden" name="action" value="addFixedSchedule">
                <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
      
                <div class="form-group">
                  <label>Fixed Schedule Title</label>
                  <input required type="text" class="form-control" name="fixed_title" placeholder="Ex. Continuation of Meetings">
                </div>



                <div class="form-group">
                  <label>Schedule Date</label>
                  <input required type="date" class="form-control" name="schedule_date">
                </div>


                <div class="row">
                    <div class="col-6">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>From:</label>
                        <div class="input-group date" id="fromtimepickerFixed" data-target-input="nearest">
                      <input name="fromTime" type="text" class="form-control datetimepicker-input" data-target="#fromtimepickerFixed"/>
                      <div class="input-group-append" data-target="#fromtimepickerFixed" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                      </div>
                    </div>

                    </div>
                    <div class="col-6">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>To:</label>
                        <div class="input-group date" id="totimepickerFixed" data-target-input="nearest">
                      <input name="toTime" type="text" class="form-control datetimepicker-input" data-target="#totimepickerFixed"/>
                      <div class="input-group-append" data-target="#totimepickerFixed" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                      </div>
                    </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalUpdateInfo">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header bg-warning">
              <h3 class="modal-title text-center">Update Audit Plan Information</h3>
          </div>
          <div class="modal-body">
              <form class="generic_form_trigger" data-url="auditPlan">
                  <input type="hidden" name="action" value="updateAuditPlanInfo">
                  <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                  <div class="fetched-data"></div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i>   <?php echo($auditPlan["status"]); ?></h5>
            </div>
            <div class="card card-success">
            <div class="card-header bg-success">
                <h5 class="card-title"><b><?php echo($auditPlan["audit_plan"]); ?></b></h5>
              </div>
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo($auditPlan["type"]); ?></h3>
                <p class="text-muted text-center"><?php echo($auditPlan["year"]); ?></p>
                <hr>

                <?php if($_SESSION["dnsc_audit"]["role"] == 4): ?>
                  <?php if($auditPlan["status"] == "SUBMITTED"): ?>
                    <form class="generic_form_trigger" data-url="auditPlan" data-title="Revert to Edit Audit Plan" data-message="Audit Plan not yet reviewed. If revert, you can update the details of this plan and can resubmit it again.">
                    <input type="hidden" name="action" value="revertSubmittedPlan">
                    <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                    <button type="submit" class="btn btn-danger btn-block"><b>Revert to Edit</b></button>
                  </form>
                  <?php elseif($auditPlan["status"] == "FOR REVIEW"): ?>
                    <form class="generic_form_trigger" data-url="auditPlan" data-title="Submit Audit Plan" data-message="Are you sure you want this to be reviewed?">
                    <input type="hidden" name="action" value="submitAuditPlan">
                    <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                    <button type="submit" class="btn btn-warning btn-block"><b>Submit for Review</b></button>
                  </form>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if($_SESSION["dnsc_audit"]["role"] == 5): ?>
                  <?php if($auditPlan["status"] == "SUBMITTED"): ?>
                    <div class="row">
                      <div class="col">

                      <div class="modal fade" id="approveAuditPlanToCMT">
                        <div class="modal-dialog">
                          <div class="modal-content ">
                            <div class="modal-header bg-warning">
                                <h3 class="modal-title text-center">Approve Audit Plan (QAD)</h3>
                            </div>
                            <div class="modal-body">
                            <form class="generic_form_trigger" data-url="auditPlan" data-title="Approve Audit Plan" data-message="Submit Audit Plan to CMT for Approval">
                                <input type="hidden" name="action" value="approveAuditPlanToCMT">
                                <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea name="remarks" class="form-control" rows="3" placeholder="Place Note or Remarks Here!"></textarea>
                                    </div>
                                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                          <a href="#" data-toggle="modal" data-target="#approveAuditPlanToCMT" class="btn btn-warning btn-block"><b>Approve</b></a>
                      </div>
                      <div class="col">
                      <div class="modal fade" id="modalreturnAuditPlanToILA">
                        <div class="modal-dialog">
                          <div class="modal-content ">
                            <div class="modal-header bg-danger">
                                <h3 class="modal-title text-center">Return Audit Plan (QAD)</h3>
                            </div>
                            <div class="modal-body">
                            <form class="generic_form_trigger" data-url="auditPlan" data-title="Return Audit Plan" data-message="Submit Audit Plan to CMT for Approval">
                                <input type="hidden" name="action" value="returnAuditPlanToILA">
                                <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea name="remarks" class="form-control" rows="3" placeholder="Place Note or Remarks Here!"></textarea>
                                    </div>
                                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                        <a href="#" data-toggle="modal" data-target="#modalreturnAuditPlanToILA" class="btn btn-danger btn-block"><b>Return</b></a>
                      </div>
                    </div>
                    
                  <?php endif; ?>
                <?php endif; ?>


                <?php if($_SESSION["dnsc_audit"]["role"] == 8): ?>
                  <?php if($auditPlan["status"] == "QAD-APPROVED"): ?>
                    <div class="row">
                      <div class="col">
                      <div class="modal fade" id="modalFinalApproveAP">
                        <div class="modal-dialog">
                          <div class="modal-content ">
                            <div class="modal-header bg-warning">
                                <h3 class="modal-title text-center">Approve Audit Plan</h3>
                            </div>
                            <div class="modal-body">
                            <form class="generic_form_trigger" data-url="auditPlan" data-title="Approve Audit Plan" data-message="Submit Audit Plan to CMT for Approval">
                                <input type="hidden" name="action" value="FinalApproveAP">
                                <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea name="remarks" class="form-control" rows="3" placeholder="Place Note or Remarks Here!"></textarea>
                                    </div>
                                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                          <a href="#" data-toggle="modal" data-target="#modalFinalApproveAP" class="btn btn-warning btn-block"><b>Approve</b></a>
                      </div>
                      <div class="col">
                      <div class="modal fade" id="modalreturnAuditPlanToILACMT">
                        <div class="modal-dialog">
                          <div class="modal-content ">
                            <div class="modal-header bg-danger">
                                <h3 class="modal-title text-center">Return Audit Plan (CMT)</h3>
                            </div>
                            <div class="modal-body">
                            <form class="generic_form_trigger" data-url="auditPlan" data-title="Return Audit Plan" data-message="Submit Audit Plan to CMT for Approval">
                                <input type="hidden" name="action" value="returnAuditPlanToILACMT">
                                <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea name="remarks" class="form-control" rows="3" placeholder="Place Note or Remarks Here!"></textarea>
                                    </div>
                                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                        <a href="#" data-toggle="modal" data-target="#modalreturnAuditPlanToILACMT" class="btn btn-danger btn-block"><b>Return</b></a>
                      </div>
                    </div>
                    
                  <?php endif; ?>
                <?php endif; ?>

                
                <form class="generic_form_trigger_no_prompt mt-2" data-url="auditPlan">
                  <input type="hidden" name="action" value="printAuditPlan">
                  <input type="hidden" name="audit_plan_id" value="<?php echo($_GET["id"]); ?>">
                  <button class="btn btn-success btn-block">Print Audit Plan</button>
                </form>
              </div>
            </div>
        </div>
        <div class="col-9">
        <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#audit_plan" data-toggle="tab">Audit Plan Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#teams" data-toggle="tab">Teams</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#remarks" data-toggle="tab">Remarks</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#audit_reports" data-toggle="tab">Audit Reports</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <!-- <div class="card-body" style="max-height:65vh !important; overflow-y: auto;"> -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="audit_plan">

                  <?php if($_SESSION["dnsc_audit"]["role"] == 4 && $auditPlan["status"] == "FOR REVIEW"): ?>
                    <a href="#" data-toggle="modal" data-audit_plan="<?php echo($_GET["id"]); ?>" data-target="#modalUpdateInfo" class="btn btn-warning btn-sm">UPDATE</a>
                  <?php endif; ?>
                  
                  <hr>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Introduction</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["introduction"]); ?>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Audit Objectives</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["audit_objectives"]); ?>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Reference Standard</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["reference_standard"]); ?>
                    </div>
                  </div>
                  
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Audit Methodologies</b></h3>
                    </div>
                    <div class="card-body">
                    <?php echo($auditPlan["audit_methodologies"]); ?>
                    </div>
                  </div>


                  </div>
                  <div class="tab-pane" id="timeline">
                  <?php if($_SESSION["dnsc_audit"]["role"] == 4 && $auditPlan["status"] == "FOR REVIEW"): ?>
                    <a href="#" data-toggle="modal" data-target="#modalAddSchedule" class="btn btn-success btn-sm">Add Audit Schedule</a>
                    <a href="#" data-toggle="modal" data-target="#modalAddFixedSchedule" class="btn btn-warning btn-sm">Add Fixed Schedule</a>
                  <?php endif; ?> 
                    

                    <hr>

                    <table id="timelineDatatable" style="width: 100% !important;">
                  <thead>
                  <tr>
                    <th width="100%;"></th>
                  </tr>
                  </thead>
                </table>


               
                  </div>
                  <div class="tab-pane" id="teams">
                  <?php if($_SESSION["dnsc_audit"]["role"] == 4 && $auditPlan["status"] == "FOR REVIEW"): ?>
                  <a href="#" data-toggle="modal" data-target="#modalAddTeam" class="btn btn-success btn-sm">ADD TEAM</a>
                  <?php endif; ?>
                  <hr>
                  <table class="table table-bordered" style="width: 100% !important; table-layout: fixed !important;" id="teamDatatable">
                  <colgroup>
                      <col style="width: 20%;">
                      <col style="width: 10%;">
                      <col style="width: 80%;">
                  </colgroup>
                  <thead>
                      <tr>
                          <th></th>
                          <th>Team #</th>
                          <th>Members</th>
                      </tr>
                  </thead>
              </table>


                  </div>
                  <div class="tab-pane" id="remarks">
                    <?php
                    $remarks = query("select apr.*, concat(firstname, ' ', surname) as fullname from audit_plan_remarks apr
                            left join users u on u.id = remarks_by
                            where audit_plan = ? order by date_created desc", $_GET["id"]);
                    ?>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>By</th>
                        <th>Date</th>
                      </thead>
                      <tbody>
                        <?php foreach($remarks as $row): ?>
                          <tr>
                            <td><?php echo($row["audit_plan_status"]); ?></td>
                            <td><?php echo($row["remarks"]); ?></td>
                            <td><?php echo($row["fullname"]); ?></td>
                            <td><?php echo(date("F d, Y h:i A", $row["date_created"])); ?></td>
                          </tr>
                        <?php endforeach; ?>
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
<script src="AdminLTE_new/plugins/summernote/summernote-bs4.min.js"></script>
<script src="AdminLTE_new/plugins/toastr/toastr.min.js"></script>
<script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
<script src="AdminLTE_new/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="resources/vue.js"></script>
<script>

$('#fromtimepicker').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("08:00 AM", "hh:mm A")
    })

    $('#totimepicker').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("05:00 PM", "hh:mm A")
    })

    $('#fromtimepickerFixed').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("08:00 AM", "hh:mm A")
    })

    $('#totimepickerFixed').datetimepicker({
      format: 'LT',
      stepping: 30,
      defaultDate: moment("05:00 PM", "hh:mm A")
    })

$('#teamLeaderSelect').select2(
  {
  placeholder: "Search Team Leader",
}
);
$('#teamMembersSelect').select2({
  placeholder: "Search Team Members",
});

$('#processSelect').select2({
  placeholder: "Search for Process Area",
});


var teamDatatable = 
            $('#teamDatatable').DataTable({
                "searching": false,
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
                    'url':'auditPlan',
                     'type': "POST",
                     "data": function (data){
                        data.action = "teamDatatable",
                        data.audit_plan = "<?php echo($_GET["id"]); ?>"
                     }
                },
                'columns': [
                    { data: 'action', "orderable": false },
                    { data: 'team_number', "orderable": false },
                    { data: 'team_members', "orderable": false  },
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




            var timelineDatatable = 
            $('#timelineDatatable').DataTable({
                "searching": false,
                "pageLength": 9999,
                language: {
                    searchPlaceholder: "Search Name"
                },
                "bLengthChange": false,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'auditPlan',
                     'type': "POST",
                     "data": function (data){
                        data.action = "timelineDatatable",
                        data.audit_plan = "<?php echo($_GET["id"]); ?>"
                     }
                },
                'columns': [
                    { data: 'card', "orderable": false },
                 
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

  $('#modalUpdateInfo').on('show.bs.modal', function (e) {
        var audit_plan = $(e.relatedTarget).data('audit_plan');
        $.ajax({
            type : 'post',
            url : 'auditPlan', //Here you will fetch records 
            data: {
                audit_plan: audit_plan, 
                action: "modalUpdateInfo",

            },
            success : function(data){
                $('#modalUpdateInfo .fetched-data').html(data);
                $('.summernote').summernote()
                // $("#salary_select").select2();
            }
        });
     });


     $('#modalUpdateTeam').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'auditPlan', //Here you will fetch records 
            data: {
                team_id: id, 
                action: "modalUpdateTeam",

            },
            success : function(data){
                $('#modalUpdateTeam .fetched-data').html(data);
                $('.modalSelect2').select2();
                // $("#salary_select").select2();
            }
        });
     });

     $('#modalUpdateSchedule').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'auditPlan', //Here you will fetch records 
            data: {
                aps_id: id, 
                action: "modalUpdateSchedule",

            },
            success : function(data){
                $('#modalUpdateSchedule .fetched-data').html(data);
                $('.modalSelect2').select2();


                $('.processSelect').select2({
                  placeholder: "Search for Process Area",
                });

                $(".areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                  });

                  $(".positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });

                $(".processSelect").on("change", function () {
        let process_id = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (process_id) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { process_id: process_id , action: "fetchArea"},
                dataType: "json",
                success: function (response) {

                  $(".areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                      allowClear: true 
                  });

           
                  console.log(response);


                  // processSelect
                    // Populate process select
                    let areaSelect = $(".areaSelect");
                    areaSelect.empty().append('');
                    $.each(response.area, function (key, value) {
                      console.log(value);
                      areaSelect.append('<option value="' + value.id + '">' + value.area_name + '</option>');
                    });

                
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });


    $(".areaSelect").on("change", function () {
        let areaId = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (areaId) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { area_id: areaId , action: "fetchPosition"},
                dataType: "json",
                success: function (response) {

                

                  $(".positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });
                  console.log(response);


                 

                    // Populate position select
                    let positionSelect = $(".positionSelect");
                    positionSelect.empty().append('');
                    $.each(response.positions, function (key, value) {
                        positionSelect.append('<option value="' + value.position_id + '">' + value.position_name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });


    $('#fromtimepickerUpdate').datetimepicker({
    format: 'LT',
    stepping: 30,
    defaultDate: moment("08:00 AM", "hh:mm A")
});

$('#totimepickerUpdate').datetimepicker({
    format: 'LT',
    stepping: 30,
    defaultDate: moment("05:00 PM", "hh:mm A")
});


                // $("#salary_select").select2();
            }
        });
     });

     


     


    $(document).ready(function () {

      $("#areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                  });

                  $("#positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });
    // Trigger on area select change
    $("#processSelect").on("change", function () {
        let process_id = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (process_id) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { process_id: process_id , action: "fetchArea"},
                dataType: "json",
                success: function (response) {

                  $("#areaSelect").select2({
                      placeholder: "Select Area", // Placeholder text
                      allowClear: true 
                  });

           
                  console.log(response);


                  // processSelect
                    // Populate process select
                    let areaSelect = $("#areaSelect");
                    areaSelect.empty().append('');
                    $.each(response.area, function (key, value) {
                      console.log(value);
                      areaSelect.append('<option value="' + value.id + '">' + value.area_name + '</option>');
                    });

                
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });


    $("#areaSelect").on("change", function () {
        let areaId = $(this).val(); // Get selected area_id
        
        // Ensure an area is selected
        if (areaId) {
            // Send AJAX request
            $.ajax({
                url: "auditPlan", // Backend PHP script to handle the request
                type: "POST",
                data: { area_id: areaId , action: "fetchPosition"},
                dataType: "json",
                success: function (response) {

                

                  $("#positionSelect").select2({
                      placeholder: "Select Position", // Placeholder text
                      allowClear: true // Adds a clear button to remove the selection
                  });
                  console.log(response);


                 

                    // Populate position select
                    let positionSelect = $("#positionSelect");
                    positionSelect.empty().append('');
                    $.each(response.positions, function (key, value) {
                        positionSelect.append('<option value="' + value.position_id + '">' + value.position_name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data: " + error);
                },
            });
        }
    });
});

</script>




  <?php require("layouts/footer.php") ?>