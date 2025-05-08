<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

			
		if($_POST["action"] == "areaList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where type in ('office', 'institute', 'program')";
	
		

	
				

				if($search == ""):
					$baseQuery = "select * from areas " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				else:
					$where .= " and (area_name like '%".$search."%' or area_description like '%".$search."%') ";
					$baseQuery = "select * from areas " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				endif;
	
	
	
	
				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '
					<div class="btn-group btn-block">
						<a href="#" data-toggle="modal" data-target="#modalUpdateArea" data-id="'.$row["id"].'" class="btn btn-sm btn-warning">Update</a>
						<a href="#" data-id="'.$row["id"].'" class="btn btn-sm btn-info">Select</a>
					</div>';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "aps_details"):
			// dump($_POST);

			$audit_plan_schedule = query("select * from audit_plan_schedule where aps_id = ?", $_POST["aps_id"]);
			$row = $audit_plan_schedule[0];

			$_POST["audit_plan"] = $row["audit_plan"];

			$aps_position = query("select * from aps_position ap
										left join position p on p.position_id = ap.position_id
										where audit_plan = ?", $row["audit_plan"]);
				$aps_area = query("select * from aps_area aa
										left join areas a on a.id = aa.area_id");
				$Position = [];
				$Area = [];
				foreach($aps_position as $row):
					$Position[$row["position_id"]] = $row;
				endforeach;

				// dump($Position);

				$Process = [];
				$process = query("select * from process");
				foreach($process as $row):
					$Process[$row["process_id"]] = $row;
				endforeach;


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
						", $_POST["audit_plan"]);
				$Team = [];
				foreach($team as $row):
					$Team[$row["team_id"]] = $row;
				endforeach;



				foreach($aps_area as $row):
					$Area[$row["aps_id"]][$row["id"]] = $row;
				endforeach;

				$row = $audit_plan_schedule[0];

				$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan"]);
				$audit_plan = $audit_plan[0];

			$html='';
			$area = [];
			if(isset($Area[$row["aps_id"]])):
				foreach($Area[$row["aps_id"]] as $a):
					$area[] = $a["area_name"];
				endforeach;
			endif;
	
			$html.='
			<div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  		<span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
							
                
                </div>';




				$html.='


				
              </div>
              <div class="card-body">


			  <dl class="row">
                  <dt class="col-sm-3">Process</dt>
                  <dd class="col-sm-9">'.$Process[$row["process_id"]]["process_name"].'</dd>
                  <dt class="col-sm-3">Area</dt>
                  <dd class="col-sm-9">'.implode(",", $area).'</dd>
                  <dt class="col-sm-3">Audit Clause</dt>
                  <dd class="col-sm-9">'.$row["audit_clause"].'</dd>
                  <dt class="col-sm-3">Audit Team</dt>
                  <dd class="col-sm-9">'.$Team[$row["team_id"]]["members"].'</dd>
				  <dt class="col-sm-3">Auditee</dt>';

				  $positionNames = implode(', ', array_column($Position, 'position_name'));
				//   dump($positionNames);
				// echo $positionNames;
				  $html.='
                  <dd class="col-sm-9">'.$positionNames.'</dd>
                </dl>
              
              </div>
          
            </div>
			
			';

			echo($html);

		elseif($_POST["action"] == "audit_plan_report_datatable"):


			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

			$myTeam = query("SELECT team_id FROM audit_plan_team_members 
					WHERE audit_plan = ? AND id = ? 
					GROUP BY team_id", 
					$_POST["interal_audit_id"], $_SESSION["dnsc_audit"]["userid"]);
			$teamIds = array_column($myTeam, "team_id");

			$myTeam = "'" . implode("','", $teamIds) . "'";
			// dump($myTeam);

			
			$data = query("
					SELECT 
						aps.*,
						p.*,
						aa.*,
						ar.audit_report_id,
						ar.timestamp,
						a.area_name,
						COALESCE(ar.audit_report_status, 'CREATE') AS audit_report_status
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
				");
				// dump($data);


			  $ApsArea = [];
              $aps_area = query("select aps_area.aps_id,a.id, a.area_name from aps_area
                                  left join areas a on a.id = aps_area.area_id
                                  where audit_plan = ?", $_POST["interal_audit_id"]);
              foreach($aps_area as $row):
                $ApsArea[$row["aps_id"]][$row["id"]] = $row;
              endforeach;



              $TeamMembers = [];
              $team_members = query("select apt.*,aptm.*, concat(u.firstname, ' ', u.surname, ' ', u.suffix) as fullname from audit_plan_teams apt
                                      left join audit_plan_team_members aptm
                                      on aptm.team_id = apt.team_id
                                      left join users u on u.id = aptm.id
                                        where apt.audit_plan = ?", $_POST["interal_audit_id"]);
              foreach($team_members as $row):
                $TeamMembers[$row["team_id"]][$row["id"]] = $row;
              endforeach;
			$i = 0;
				foreach($data as $row):
					$areaNames = array_column($ApsArea[$row["aps_id"]], "area_name");
                    $areaNamesString = implode(', ', $areaNames);
                    $teamMembers = array_column($TeamMembers[$row["team_id"]], "fullname");
                    $teamMembersString = implode(', ', $teamMembers);
					// dump($data);

					$action = '
							<div class="btn-group btn-block">
								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Action
								</button>
								<ul class="dropdown-menu">
									';
									if($row["audit_report_id"] != ""):
										if($row["audit_report_status"] == "DONE"):
											$action .= '<li><a class="dropdown-item" href="audit_report?action=details&id='.$row["audit_report_id"].'">View Audit Report</a></li>';
											$action .= '<li><a class="dropdown-item" href="audit_report?action=details&id='.$row["audit_report_id"].'">Print Audit Report</a></li>';
										else:
											$action .= '<li><a data-id="'.$row["audit_report_id"].'" class="dropdown-item" href="audit_report?action=update&id='.$row["audit_report_id"].'">Edit Audit Report</a></li>';
										endif;

									else:
										$action .= '<li><a class="dropdown-item" href="audit_report?action=create&aps_area_id='.$row["tblid"].'">Create Audit Report</a></li>';
									endif;

							$action.='
									<li><a class="dropdown-item" target="_blank" href="evidence?action=myEvidence&root='.$row["area_id"].'">Evidences</a></li>
									<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#aps_details" data-id="'.$row["aps_id"].'">Audit Plan Schedule Details</a></li>
								</ul>
							</div>
							';

					$data[$i]["action"] = $action;
					$data[$i]["team"] = $teamMembersString;
					$data[$i]["process_name"] = $row["process_name"];
					$data[$i]["area_name"] = $row["area_name"];
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($data),
					"iTotalDisplayRecords" => count($data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "updateReport"):

			// dump($_POST);

			$audit_report = query("select * from audit_report where audit_report_id = ?", $_POST["report_id"]);
			$audit_report = $audit_report[0];
			$aps_area = query("select * from aps_area where aps_id = ? and area_id = ?", $audit_report["aps_id"], $audit_report["aps_area"]);
			$aps_area = $aps_area[0];

			$questions =[
				"Are the procedure steps accurate and complete as compared to true practice?",
				"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?",
				"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?",
				"Does the process appear to adequately meet all customer or regulatory requirements?",
				"Are the quality objectives or targets identified in the process met?"
			  ];
			$i=1;
			$Effectiveness = [];
			foreach($questions as $row):
				$Effectiveness[$i]["number"] = $i;
				$Effectiveness[$i]["question"] = $row;
				$Effectiveness[$i]["rate"] = $_POST[$i."_question"];
				$Effectiveness[$i]["comment"] = $_POST[$i."_comments"];
				$i++;
			endforeach;

			$Effectiveness = serialize($Effectiveness);

			$car_details = [];
			$car_details[0]["ofi_requirements"] = $_POST["ofi_requirements"];
			$car_details[0]["ofi_findings"] = $_POST["ofi_findings"];
			$car_details[0]["ofi_evidences"] = $_POST["ofi_evidences"];
			$car_details = serialize($car_details);


			// dump($car_details);

			query("update audit_report set 
				timestamp = ?, 
				effectiveness_process = ?, 
				ofi_improvement = ?,
				ofi_nonconformance = ?, 
				car_details = ?, 
				audit_report_status = ?,
				comments = ?
				where audit_report_id = ?
			", time(),
			$Effectiveness,
			$_POST["ofi_improvement"],
			$_POST["ofi_nonconformance"],
			$car_details,
			"PENDING",
			$_POST["comments"],
			$_POST["report_id"]
		);
		
		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Success",
			"link" => "audit_report?action=update&id=".$_POST["report_id"],
			];
			echo json_encode($res_arr); exit();




		elseif($_POST["action"] == "getProcesses"):
			// dump($_POST);

			$processes = query("select * from areas where parent_area = ?", $_POST["areaId"]);
			echo json_encode(['success' => true, 'data' => $processes]); exit();

		elseif($_POST["action"] == "createAuditReport"):
			// dump($_POST);
			$aps_area = query("select * from aps_area where tblid = ?", $_POST["aps_area_id"]);
			$aps_area = $aps_area[0];
			$questions =[
				"Are the procedure steps accurate and complete as compared to true practice?",
				"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?",
				"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?",
				"Does the process appear to adequately meet all customer or regulatory requirements?",
				"Are the quality objectives or targets identified in the process met?"
			  ];
			$i=1;
			$Effectiveness = [];
			foreach($questions as $row):
				$Effectiveness[$i]["number"] = $i;
				$Effectiveness[$i]["question"] = $row;
				$Effectiveness[$i]["rate"] = $_POST[$i."_question"];
				$Effectiveness[$i]["comment"] = $_POST[$i."_comments"];
				$i++;
			endforeach;

			$Effectiveness = serialize($Effectiveness);

			$car_details = [];
			$car_details[0]["ofi_requirements"] = $_POST["ofi_requirements"];
			$car_details[0]["ofi_findings"] = $_POST["ofi_findings"];
			$car_details[0]["ofi_evidences"] = $_POST["ofi_evidences"];
			$car_details = serialize($car_details);


			// dump($car_details);

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $aps_area["audit_plan"]);
			$audit_plan = $audit_plan[0];

			$typeMapping = [
				"1st Internal Quality Audit" => "01", // 1st Internal Quality Audit
				"2nd Internal Quality Audit" => "02"  // 2nd Internal Quality Audit
			];

			$monthMapping = [
				"1st Internal Quality Audit" => "01", // 1st Internal Quality Audit
				"2nd Internal Quality Audit" => "08"  // 2nd Internal Quality Audit
			];


		
			
			$audit_report = query("select count(*) as count from audit_report where audit_plan = ?", $aps_area["audit_plan"]);
			$ar_id = "AR-" . $audit_plan["year"] ."-" . $typeMapping[$audit_plan["type"]] . "-". $monthMapping[$audit_plan["type"]] ."-" .($audit_report[0]["count"] + 1) ;

			if (query("insert INTO audit_report 
					(audit_report_id, audit_plan, aps_id, aps_area, timestamp, effectiveness_process, car_status, ofi_improvement,
					ofi_nonconformance, car_details, audit_report_status, user_id, comments) 
			  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)", 
				$ar_id, $aps_area["audit_plan"], $aps_area["aps_id"], $aps_area["area_id"], time(),
				$Effectiveness,"ACTIVE", $_POST["ofi_improvement"],$_POST["ofi_2"], $car_details, "PENDING", $_SESSION["dnsc_audit"]["userid"], $_POST["comments"]) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "User already Registered",
						"link" => "auditPlan?action=auditorDetails&id=".$aps_area["audit_plan"],
						];
						echo json_encode($res_arr); exit();
				}


		$users = query("select * from users where role_id = 4");
		foreach($users as $row):
			$Message = [];
			$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " created audit report and needs to be reviewed.";
			$Message["link"] = "audit_report_review?action=review&id=".$ar_id;
			$theMessage = serialize($Message);
			addNotification($row["id"], $theMessage, $_SESSION["dnsc_audit"]["userid"]);
		endforeach;


		// $users_area = query("select * from users_area");



		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Success",
			"link" => "auditPlan?action=auditorDetails&id=".$aps_area["audit_plan"],
			];
			echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "print_audit_report"):
			// dump($_POST);
			$audit_report = query("select ar.*,
			concat(u.firstname, ' ' ,u.middlename, ' ', u.surname) as prepared_by,
									concat(u2.firstname, ' ' ,u2.middlename, ' ', u2.surname) as reviewed_by,
			
			u.firstname, u.middlename, u.surname from audit_report ar left join users u
                                    on u.id = ar.user_id
									left join users u2 on u2.id = ar.reviewed_by
									where audit_report_id = ?", $_POST["audit_report_id"]);
			$audit_report = $audit_report[0];
			$aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where aps_id = ? and area_id = ?", $audit_report["aps_id"], $audit_report["aps_area"]);
			$aps_area = $aps_area[0];

			$aps_schedule = query("select aps.*, p.process_name from audit_plan_schedule aps
									left join process p on p.process_id = aps.process_id
									where aps_id = ?", $aps_area["aps_id"]);
			$aps_schedule = $aps_schedule[0];

			$audit_team_members = query("select concat(firstname, ' ', surname) as fullname 
										from audit_plan_team_members aptm
										left join users u on aptm.id = u.id
										where aptm.team_id = ?
										order by aptm.role asc, u.surname asc, u.firstname asc
										", $aps_schedule["team_id"]);
			// dump($audit_team_members);
			$aptm = implode(", ", array_column($audit_team_members, "fullname"));
			// dump($aptm);
			$Auditees = query("select concat(firstname, ' ', surname) as fullname from users_area ua 
								left join users u on u.id = ua.user_id
								where u.role_id = 2
								and ua.area_id = ?
								", $audit_report["aps_area"]);
			$Auditees = implode(", ", array_column($Auditees, "fullname"));



					$mpdf = new \Mpdf\Mpdf([
						'mode' => 'utf-8',
						'format' => [215.9, 330.2], // 'A4-L' sets the orientation to landscape
						'debug' => true,
						'margin_top' => 40,
						'margin_left' => 0,
						'margin_right' => 0,
						'margin_bottom' => 2,
						'margin_footer' => 0,
						'default_font' => 'helvetica'
					]);

					$settings = query("select * from utility_settings");
					$settings = unserialize($settings[0]["audit_report"]);
					// dump($settings);
					$mpdf->SetHTMLHeader('

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<link rel="stylesheet" href="resources/footerStyles.css">
					<div class="container" style="margin-left: 45px; margin-right:45px;">
					<div class="row">
						<div class="col-xs-8">
							<img src="'.$settings["header"].'" 
							style="width:100%; height: auto; max-height: 90px;">
						</div>
					

						<div class="col-xs-3">
							<table id="headerTable " class="table">
								<tr>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">Form No.</td>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">'.$settings["form_number"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">Issue Status</td>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">'.$settings["issue_status"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">Revision No.</td>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">'.$settings["revision_number"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">Effective Date: </td>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">'.$settings["effective_date"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">Approved By </td>
									<td class="text-center" style="font-size: 10px; padding:2px !important;">'.$settings["approved_by"].'</td>
								</tr>

							</table>
						
						</div>
						
					</div>
					</div>
					');

					$mpdf->SetHTMLFooter('
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<link rel="stylesheet" href="resources/footerStyles.css">
					<div id="myFooter">
							<div class="row">
							<div class="col-xs-12 text-right">
								<img src="'.$settings["footer"].'" 
								style="width:100%;
								height: auto; max-height: 300px;">
							</div>
						</div>
					</div>
						');

					$html = "";

					$html .='

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<style>
					.table, th, td, thead, tbody{
						border: 1px solid black !important;
						padding: 8px !important;
					}
					h5{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 15px !important;
						font-weight: 800;
					}

					h4{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 100px !important;
						font-weight: 800;
						color:#000 !important;
					}



					b{
						font-weight: bold;
					}

					</style>
					<style>
                                            .p-2 {
                                                padding: 3px;
                                            }
                                            .u {
                                                border-bottom: 1px solid black;
                                            }
                                            .nw {
                                                white-space:nowrap;
                                            }
                                            .w {
                                                width: 350;
                                            }
                                            th,td {
                                                font-size: 12px;
                                            }
											p{
font-size: 12px;
				}
                                            .tbl {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }
                                            .tbl tr th {
                                            }
                                            .tbl tr td {
                                                border: 0px inset grey;
                                                padding: 3px;
                                            }

											
											.tbl2{
												width: 100%;
                                                border-collapse: collapse;
											}

											.tbl2 tr td {
                                                border: 1px solid black;
                                                padding: 7px;
												height: 100%;
                                            }

                                            .center {
                                                text-align: center;
                                            }
                                            .grey {
                                                background-color: lightgrey;
                                            }
                                        </style>
			

					<style>
					dt{
						font-size:9px;
					
					}
						dl{
						font-size:9px;
					}
					</style>
					<div class="container" style="margin-left: 50px; margin-right:50px;">
					<h4 class="text-center"><b>Internal Audit Report</b></h4>

				<br>
			


					


								<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td width="10%" class="p-2 nw"><b>Date of Audit: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.date("F d, Y", $audit_report["timestamp"]).'</td>
                                                <td width="10%" class="p-2 nw"><b>IAR No: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_report["audit_report_id"].'</td>
                                            </tr>
                                        </table>

				

					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
                                                <td width="20%" class="p-2 nw"><b>Department / Process Area: </b></td>
                                                <td width="80%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$aps_schedule["process_name"].'</td>
                                            </tr>
                                        </table>

					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
						<tr>
							<td width="25%" class="p-2 nw"><b>Document Reference / ISO Clause: </b></td>
							<td width="75%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$aps_schedule["audit_clause"].'</td>
						</tr>
					</table>

					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td width="10%" class="p-2 nw"><b>Auditor: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$aptm.'</td>
                                                <td width="10%" class="p-2 nw"><b>Auditee</b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$Auditees.'</td>
                                            </tr>
                                        </table>
					<br>
					<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td colspan="3"><b>A. Verify the Effectiveness of the Process</b></td>
                                            </tr>
											<tr>
												<td colspan="3"><b>Review the applicable procedure(s) for this process and answer the questions below.</b></td>
                                            </tr>
											<tr>
												<th style="text-align: center;"><b>Questions</b></th>
												<th style="text-align: center;">Y/N (or N/A)</th>
												<th style="text-align: center;">Evidence or Notes Sheet Ref.#, ISO Clauses</th>
                                            </tr>
											
											';

					$effectives = unserialize($audit_report["effectiveness_process"]);
					$car_details = unserialize($audit_report["car_details"]);

					foreach($effectives as $row):

						$html.='
						<tr>
							<td width="45%"><b>'.$row["question"].'</b></td>
							<td style="text-align: center;" width="5%">'.$row["rate"].'</td>
							<td width="45%">'.$row["comment"].'</td>
						</tr>
						';

					endforeach;

					$html.='

											
                                        </table>
					<br>
					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td class="p-2 nw"><b>B. Summarize Findings for CAR Form System</b></td>
                                       
                                            </tr>
                                        </table>

										<p style="font-size: 11px; padding-left: 25px; margin:0px;margin:0px;"><b>Based on the findings and nonconformities you have recorded in the previous sections, summarize the necessary actions needed For type, choose one of the following:</b></p>
										<p style="font-size: 11px; padding-left: 50px; margin:0px;"><b>C = Corrective action needed (existing noncompliance)</b></p>
										<p style="font-size: 11px; padding-left: 50px; margin:0px;"><b>OFI = Opportunity for Improvement</b></p>
					<br>
					<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
												<tr>
													<td class="p-2 nw" style="border-bottom: 0px; word-wrap: break-word; white-space: normal;"><b>OFI (Improvement):</b></td>
												</tr>
												<tr>
													<td class="p-2 nw" style="border-top: 0px;"><div style="min-height: 200px;">
       '.$audit_report["ofi_improvement"].'</div>
												</tr>
												<tr>
													<td class="p-2 nw" style="border-bottom: 0px; word-wrap: break-word; white-space: normal;"><b>OFI (Possible Non-conformance in the Future)</b></td>
												</tr>
												<tr>
													<td class="p-2 nw" style="border-top: 0px;"><div style="min-height: 200px;">
       '.$audit_report["ofi_nonconformance"].'</div>
												</tr>
											</table>
<br>
										

</div>

					';
					$mpdf->WriteHTML($html);
					$mpdf->AddPage();
					$html2 = '
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<style>
					.table, th, td, thead, tbody{
						border: 1px solid black !important;
						padding: 8px !important;
					}
					h5{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 15px !important;
						font-weight: 800;
					}

					h4{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 100px !important;
						font-weight: 800;
						color:#000 !important;
					}



					b{
						font-weight: bold;
					}

					</style>
					<style>
                                            .p-2 {
                                                padding: 3px;
                                            }
                                            .u {
                                                border-bottom: 1px solid black;
                                            }
                                            .nw {
                                                white-space:nowrap;
                                            }
                                            .w {
                                                width: 350;
                                            }
                                            th,td {
                                                font-size: 12px;
                                            }
											p{
font-size: 12px;
				}
                                            .tbl {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }
                                            .tbl tr th {
                                            }
                                            .tbl tr td {
                                                border: 0px inset grey;
                                                padding: 3px;
                                            }

											
											.tbl2{
												width: 100%;
                                                border-collapse: collapse;
											}

											.tbl2 tr td {
                                                border: 1px solid black;
                                                padding: 7px;
												height: 100%;
                                            }

                                            .center {
                                                text-align: center;
                                            }
                                            .grey {
                                                background-color: lightgrey;
                                            }
                                        </style>
			

					<style>
					dt{
						font-size:9px;
					
					}
						dl{
						font-size:9px;
					}
					</style>
					';
					$html2.='
					<div class="container" style="margin-left: 50px; margin-right:50px;">
					<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
											<tr>
												<td width="20%" style="text-align: center;"><b>CAR FORM #</b></td>
												<td width="60%" style="text-align: center;"><b>Describe finding as you want it to appear in the CAR Form System</b></td>
												<td width="20%" style="text-align: center;"><b>Type<br>(Major / Minor)</b></td>
                                            </tr>
											<tr>
												<td></td>
												<td>
												<b>Requirements</b><br>
												'.$car_details[0]["ofi_requirements"].'<br>
												<b>Findings</b><br>
												'.$car_details[0]["ofi_findings"].'<br>
												<b>Evidence/s</b><br>
												'.$car_details[0]["ofi_evidences"].'<br>
												</td>
												<td></td>
                                            </tr>
											</table>
											<br>
											<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
												<tr>
													<td class="p-2 nw" style="border-bottom: 0px; word-wrap: break-word; white-space: normal;"><b>C. POSITIVE FINDING. Summary of positive findings during the conduct of audit. This may also include any possible suggested enhancement for improvement that was not included in the OFI.</b></td>
												</tr>
												<tr>
													<td class="p-2 nw" style="border-top: 0px;"><div style="min-height: 200px;">
												'.$audit_report["comments"].'</div>
												</tr>
											</table>
<br>
	    <p class="text-justify"><b>D. Review Audit Report and Submit 
All auditors on the audit team must submit their audit reports for summary and review by the Lead Auditor.  Lead Auditor: review the completeness of this report prior to submitting it to the QMC. Be sure findings show objective evidence, that everything is written clearly, and that all checklist questions are answered.
</b></p>
											
											';
				$html2.='
				<style>
					.tbl3 tr td{
						border: 0px !important;
						padding-bottom: 20px !important;

				}
				</style>
				<br>
				<table class="tbl2 tbl3" style="font-size: 12px; padding-top: 10px; border:0px;">
                                            <tr>
												<td width="40%">
												<b>Audit Report prepared by:</b>
												</td>
												<td class="p-2 nw" width="60%">
												<table class="tbl" style="font-size: 12px; padding-top: 10px;">
											<tr>
												<td class="p-2 nw text-center" style="border-bottom: 1px solid black;">'.strtoupper($aptm).'</td>
				
											</tr>
											<tr>
												<td class="p-2 nw text-center">Internal Auditor / Date</td>
											</tr>
                                        </table>
												</td>
												

											
                                       
                                            </tr>
											<tr>
												<td width="40%">
												<b>Audit Report Conformed by:</b>
												</td>
												<td class="p-2 nw" width="60%">
												<table class="tbl" style="font-size: 12px; padding-top: 10px;">
											<tr>
												<td class="p-2 nw text-center" style="border-bottom: 1px solid black;">'.strtoupper($Auditees).'</td>
				
											</tr>
											<tr>
												<td class="p-2 nw text-center" >Process Owner(s) / Date</td>
											</tr>
                                        </table>
												</td>
								
											
                                       
                                            </tr>
											<tr>
												<td width="40%">
												<b>Audit Report reviewed by:</b>
												</td>
												<td class="p-2 nw" width="60%">
												<table class="tbl" style="font-size: 12px; padding-top: 10px;">
											<tr>
												<td class="p-2 nw text-center" style="border-bottom: 1px solid black;">'.strtoupper($audit_report["reviewed_by"]).'</td>
				
											</tr>
											<tr>
												<td class="p-2 nw text-center" >Internal Lead Auditor/Team Leader/Date</td>
											</tr>
                                        </table>
												</td>
												

											
                                       
                                            </tr>
                                        </table>
										</div>
				';



											// dump($html2);
					$mpdf->WriteHTML($html2);
					

					

					$filename = "audit_report";
					$path = "reports/".$filename.".pdf";
					$mpdf->Output($path, \Mpdf\Output\Destination::FILE);

					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"newlink" => "newlink",
						"message" => "PDF success",
						"link" => $path,
						// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
						];
						echo json_encode($res_arr); exit();






		endif;
		
    }
	else {

		if(!isset($_GET["action"])):

		else:

			if($_GET["action"] == "create"):
				render("public/audit_report_system/createARForm.php",[
				]);

			elseif($_GET["action"] == "details"):
				render("public/audit_report_system/audit_report_details.php",[
				]);

			elseif($_GET["action"] == "update"):
				render("public/audit_report_system/audit_report_update.php",[
				]);
			endif;

		endif;

			
	}
?>
