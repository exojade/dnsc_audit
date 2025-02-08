<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "auditPlanList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

				$where = " where 1=1";
				if($search != ""):
				$where .= ' and (firstname like "%'.$search.'%" or surname like "%'.$search.'%" or username like "%'.$search.'%")';
				$baseQuery = "select * from audit_plans" . $where;
				else:
					$baseQuery = "select * from audit_plans" . $where;
				endif;

				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '<a href="auditPlan?action=details&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

			elseif($_POST["action"] == "auditPlanAuditorDatatable"):
					// dump($_REQUEST);
					$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
					$offset = $_POST["start"];
					$limit = $_POST["length"];
					$search = $_POST["search"]["value"];
	
					$limitString = " limit " . $limit;
					$offsetString = " offset " . $offset;
	
					$where = " where aptm.id = '".$_POST["interal_audit_id"]."'";

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
						group by aps.audit_plan
					";
					$audit_plans = query($audit_plans);
					// dump($audit_plans);

					$thePlans = [];
					foreach($audit_plans as $row):
						$thePlans[$row["audit_plan"]] = $row;
					endforeach;









					if($search != ""):
					$where .= ' and (firstname like "%'.$search.'%" or surname like "%'.$search.'%" or username like "%'.$search.'%")';
					$baseQuery = "select ap.* from audit_plans ap
									left join audit_plan_team_members aptm on aptm.audit_plan = ap.audit_plan" . $where . " group by ap.audit_plan";
					else:
						$baseQuery = "select ap.* from audit_plans ap
									left join audit_plan_team_members aptm on aptm.audit_plan = ap.audit_plan" . $where . " group by ap.audit_plan";
					endif;
	
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
	
	
	
					$i = 0;
					foreach($data as $row):
						$data[$i]["action"] = '<a href="auditPlan?action=auditorDetails&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
						$data[$i]["create_count"] = $thePlans[$row["audit_plan"]]["create_count"];
						$data[$i]["pending_count"] = $thePlans[$row["audit_plan"]]["pending_count"];
						$data[$i]["done_count"] = $thePlans[$row["audit_plan"]]["done_count"];
						
						$i++;
					endforeach;
					$json_data = array(
						"draw" => $draw + 1,
						"iTotalRecords" => count($all_data),
						"iTotalDisplayRecords" => count($all_data),
						"aaData" => $data
					);
					echo json_encode($json_data);

		elseif($_POST["action"] == "teamDatatable"):
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
				$where = " where audit_plan = '".$_POST["audit_plan"]."'";
				$baseQuery = "select * from audit_plan_teams" . $where;
				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);


				$team_members = query("select atm.*, concat(u.firstname, ' ', u.surname) as fullname from audit_plan_team_members atm
										left join users u on u.id = atm.id where audit_plan = ?", $_POST["audit_plan"]);
				$Team_Members = [];
				foreach($team_members as $row):
					$Team_Members[$row["team_id"]][$row["id"]] = $row;
				endforeach;



				$i = 0;
				foreach($data as $row):

					$fullnamesWithRoles = array_map(function($item) {
						return $item['fullname'] . " (" . $item['role'] . ")";
					}, $Team_Members[$row["team_id"]]);

					$teamMembers = implode(", ", $fullnamesWithRoles);
					// dump($teamMembers);


					$data[$i]["team_members"] = $teamMembers;
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "modalUpdateInfo"):
			// dump($_POST);

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan"]);
			$audit_plan = $audit_plan[0];

			$html = "";

			$html.='

			<input type="hidden" name="audit_plan" value="'.$_POST["audit_plan"].'">
			<label>Introduction</label>
              <textarea name="introduction"  required class="summernote">
			  '.$audit_plan["introduction"].'
            </textarea>


			<label>Audit Objectives</label>
              <textarea name="audit_objectives" required class="summernote">
			  '.$audit_plan["audit_objectives"].'
            </textarea>

            <label>Reference Standard</label>
              <textarea name="reference_standard" required class="summernote">
			  '.$audit_plan["reference_standard"].'
            </textarea>

            <label>Audit Methodologies</label>
              <textarea name="audit_methodologies" required class="summernote">
			  '.$audit_plan["audit_methodologies"].'
            </textarea>
			';

			echo($html);

		elseif($_POST["action"] == "timelineDatatable"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

				$where = " where audit_plan = '".$_POST["audit_plan"]."'";
				$baseQuery = "select * from audit_plan_schedule" . $where;

				$aps_position = query("select * from aps_position ap
										left join position p on p.position_id = ap.position_id");
				$aps_area = query("select * from aps_area aa
										left join areas a on a.id = aa.area_id");
				$Position = [];
				$Area = [];
				foreach($aps_position as $row):
					$Position[$row["aps_id"]][$row["position_id"]] = $row;
				endforeach;

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

				// dump($Position);



				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);

				$i = 0;
				foreach($data as $row):
					// $data[$i]["action"] = '<a href="auditPlan?action=details&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
					// $data[$i]["time"] = date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"]));
					$area = [];
					if(isset($Area[$row["aps_id"]])):
						foreach($Area[$row["aps_id"]] as $a):
							$area[] = $a["area_name"];
						endforeach;
					endif;

			$data[$i]["card"] = 
				'
              <div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  		<span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
							
                
                </div>
				<form class="generic_form_trigger">
								<button class="btn btn-danger btn-sm float-right">Delete</button>
							</form>
								<a href="#" class="btn btn-sm btn-warning float-right mr-1">Update</a>
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
                </dl>
              
              </div>
          
            </div>
					';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);


		elseif($_POST["action"] == "updateAuditPlanInfo"):
			// dump($_POST);


			query("update audit_plans set
					introduction = '".$_POST["introduction"]."',
					audit_objectives = '".$_POST["audit_objectives"]."',
					reference_standard = '".$_POST["reference_standard"]."',
					audit_methodologies = '".$_POST["audit_methodologies"]."'
					where audit_plan = ?", $_POST["audit_plan_id"]);


			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Updating or records done successfully!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();




		elseif($_POST["action"] == "newPlan"):
			// dump($_POST);

			if (query("insert INTO audit_plans 
						(
                            type, introduction, audit_objectives, reference_standard,
                            audit_methodologies, year, status, created_by, timestamp
                            ) 
                    VALUES(?,?,?,?,?,?,?,?,?)", 
                    $_POST["type"], $_POST["introduction"], $_POST["audit_objectives"] , $_POST["reference_standard"],
					$_POST["audit_methodologies"], $_POST["year"], "ONGOING", $_SESSION["dnsc_audit"]["userid"], time()) === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }


					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"message" => "Audit plan created successfully!",
						"link" => "refresh",
						// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
						];
						echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "addTeam"):
			// dump($_POST);
			$auditors = "'" . implode("','", $_POST["team_members"]) . "'";
			$checkExistingAuditors = query("select * from audit_plan_team_members where audit_plan = ?
			and id in (".$auditors.")", $_POST["audit_plan_id"]);

			if(!empty($checkExistingAuditors)):
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "Team Member already added on this Audit Plan!",
					"link" => "refresh",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			endif;

			$at = create_trackid("AT");
			// dump($at);
			if (query("insert INTO audit_plan_teams 
						(team_id, team_number, audit_plan) 
                    VALUES(?,?,?)", 
                    $at, $_POST["teamNumber"], $_POST["audit_plan_id"]) === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }


				if (query("insert INTO audit_plan_team_members
					(team_id, id,role, audit_plan) 
					VALUES(?,?,?,?)", 
					$at, $_POST["team_leader"], "LEADER", $_POST["audit_plan_id"]) === false)
					{
						$res_arr = [
							"result" => "failed",
							"title" => "Failed",
							"message" => "Failed on saving deduction table",
							"link" => "loans_management?action=list",
							];
							echo json_encode($res_arr); exit();
					}

			foreach($_POST["team_members"] as $row):
				if (query("insert INTO audit_plan_team_members 
				(team_id, id,role, audit_plan) 
				VALUES(?,?,?,?)", 
				$at, $row, "MEMBER", $_POST["audit_plan_id"]) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "Failed on saving deduction table",
						"link" => "loans_management?action=list",
						];
						echo json_encode($res_arr); exit();
				}
			endforeach;



			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Team successfully added",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "addSchedule"):
			// dump($_POST);
			$aps_id = create_trackid("APS");
			// dump($aps_id);


			if (query("insert INTO audit_plan_schedule 
				(aps_id, audit_plan,from_time, to_time,schedule_date,team_id,process_id,audit_clause,plan_type) 
				VALUES(?,?,?,?,?,?,?,?,?)", 
				$aps_id, $_POST["audit_plan_id"], 
				date("H:i", strtotime($_POST["fromTime"])), 
				date("H:i", strtotime($_POST["toTime"])), 
				$_POST["schedule_date"],$_POST["team_id"],
				$_POST["process_id"], $_POST["criteria_clause"],
				"INDIVIDUAL") === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "Failed on saving deduction table",
						"link" => "loans_management?action=list",
						];
						echo json_encode($res_arr); exit();
				}
			else;



			foreach($_POST["area_id"] as $row):
				if (query("insert INTO aps_area 
				(area_id, audit_plan, aps_id) 
				VALUES(?,?,?)", 
				$row, $_POST["audit_plan_id"], $aps_id
				) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "Failed on saving deduction table",
						"link" => "loans_management?action=list",
						];
						echo json_encode($res_arr); exit();
				}
			else;

			endforeach;


			foreach($_POST["position_id"] as $row):
				if (query("insert INTO aps_position 
				(position_id, audit_plan, aps_id) 
				VALUES(?,?,?)", 
				$row, $_POST["audit_plan_id"], $aps_id
				) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "Failed on saving deduction table",
						"link" => "loans_management?action=list",
						];
						echo json_encode($res_arr); exit();
				}
			else;

			endforeach;

			$teams = query("select * from audit_plan_team_members where team_id = ?", $_POST["team_id"]);
			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan_id"]);
			$audit_plan = $audit_plan[0];
			$Message = [];
			foreach($teams as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " assigned you to Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
				$Message["link"] = "auditPlan?action=auditorDetails&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;



			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Schedule successfully added!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();


		elseif($_POST["action"] == "fetchArea"):

			// dump($_POST);

			$area = query("select a.* from area_process ap
								left join areas a on a.id = ap.area_id
								where ap.process_id = ?
								",$_POST["process_id"]);

			
			$response = [];
			$response['area'] = $area;
			echo json_encode($response);


			elseif($_POST["action"] == "fetchPosition"):

				// dump($_POST);
				$area = "'" . implode("','", $_POST["area_id"]) . "'";
				// dump($area);
		
	
				$position = query("select p.* from area_position ap
									left join position p on p.position_id = ap.position_id
									where ap.area_id in (".$area.")
									group by p.position_id
									");
				
				$response = [];
				$response['positions'] = $position;
				echo json_encode($response);
			// dump($position);

		elseif($_POST["action"] == "printAuditPlan"):
			// dump($_POST);
			// dump($_POST);
// 

			$auditPlan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan_id"]);
			$auditPlan = $auditPlan[0];

			$monthScope = "";
			if($auditPlan["type"] == "1st Internal Quality Audit"):
				$monthScope = "January - June";
			else:
				$monthScope = "July - December";
			endif;

			$daySchedule = query("select schedule_date from audit_plan_schedule where audit_plan = ? group by schedule_date", $_POST["audit_plan_id"]);
			$theSchedule = query("select * from audit_plan_schedule 
									aps left join process p on p.process_id = aps.process_id 
									where aps.audit_plan = ?", $_POST["audit_plan_id"]);

			$teams = query("select * from audit_plan_team_members aptm
								left join users u on u.id = aptm.id where audit_plan = ?
								order by aptm.role asc
								", $_POST["audit_plan_id"]);
			$Teams = [];
			foreach($teams as $row):
				$Teams[$row["team_id"]][$row["tblid"]] = $row;
			endforeach;

			$aps_position = query("select * from aps_position aps 
									left join position p on p.position_id = aps.position_id
									where aps.audit_plan = ?", $_POST["audit_plan_id"]);
			$ApsPosition = [];
			foreach($aps_position as $row):
				$ApsPosition[$row["aps_id"]][$row["position_id"]] = $row;
			endforeach;

			$TheSchedule = [];
			foreach($theSchedule as $row):
				$TheSchedule[$row["schedule_date"]][$row["aps_id"]] = $row;
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
			", $_POST["audit_plan_id"]);

		

					// $medRecord = query("select *  from checkup c
					// 					 left join pet p
					// 					 on p.petId = c.petId
					// 					 left join client cl
					// 					 on p.clientId = cl.clientId
					// 					 left join doctors d
					// 					 on d.doctorsId = c.doctorId
					// 					 where checkupId = ?", $_POST["checkupId"]);


					$mpdf = new \Mpdf\Mpdf([
						'mode' => 'utf-8',
						'format' => 'A4-L', // 'A4-L' sets the orientation to landscape
						'debug' => true,
						'margin_top' => 4,
						'margin_left' => 3,
						'margin_right' => 3,
						'margin_bottom' => 2,
						'margin_footer' => 1,
						'default_font' => 'helvetica'
					]);

					$mpdf->SetHTMLHeader('

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<div class="row" >
						<div class="col-xs-9">
							<img src="resources/dnscHeader.png" 
							style="width:100%; height: auto; max-height: 130px;">
						</div>
					</div>
					');

					$mpdf->SetHTMLFooter('
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<hr>
							<div class="row">
							<div class="col-xs-4">
								<dl class="row">
									<dt class="col-xs-2"><b>Address</b></dt>
									<dd class="col-xs-8 text-left">Davao del Norte State College<br>Tadeco Road, New Visayas <br>Panabo City, Davao del Norte, 8105</dd>
								</dl>
							</div>
							<div class="col-xs-4">
								<dl class="row">
									<dt class="col-xs-2 text-left"><b>Website</b></dt>
									<dd class="col-xs-8 text-left">www.dnsc.edu.ph</dd>
									<dt class="col-xs-2 text-left"><b>Email</b></dt>
									<dd class="col-xs-8 text-left">president@dnsc.edu.ph</dd>
									<dt class="col-xs-2 text-left"><b>FB Page</b></dt>
									<dd class="col-xs-8 text-left">www.facebook.com/davnorstatecollege</dd>
								</dl>
							</div>

							<div class="col-xs-2 text-right">
								<img src="resources/footerimage.jpg" 
								style="width:100%;
								height: auto; max-height: 60px;">
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
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					

		
					<h4 class="text-center"><b>Audit Plan</b></h4>

					<table class="table" style="margin-top: 10px;">
					<tbody>
						<tr>
							<td width="20%" class="text-center">Introduction</td>
							<td>'.$auditPlan["introduction"].'</td>
						</tr>
						<tr>
							<td width="20%" class="text-center">Audit Objectives</td>
							<td>'.$auditPlan["audit_objectives"].'</td>
						</tr>
						<tr>
							<td width="20%" class="text-center">Reference Standard</td>
							<td>'.$auditPlan["reference_standard"].'</td>
						</tr>
						<tr>
							<td width="20%" class="text-center">Audit Methodologies</td>
							<td>'.$auditPlan["audit_methodologies"].'</td>
						</tr>
						<tr>
							<td width="20%" class="text-center">Audit Team</td>
							<td>Members</td>
						</tr>
						';

					foreach($team as $row):

						$html.='
						<tr>
							<td width="20%" class="text-center">Team '.$row["team"].'</td>
							<td>'.$row["members"].'</td>
						</tr>
						';

					endforeach;


					$html.='
					</tbody>



					</table>
				
			
			

					<style>
					dt{
						font-size:12px;
					
					}
						dl{
						font-size:12px;
					}
					</style>
				
					';
					$mpdf->WriteHTML($html);
					$mpdf->AddPage();

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

					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>



					<table class="table" style="margin-top: 10px;">
					<tbody>
						<tr>
							<td  width="25%" colspan="2">Audit Scope for the Month/s of:</td>
							<td>'.$monthScope.'</td>
							<td>Year:</td>
							<td>'.$auditPlan["year"].'</td>
						</tr>
						';
					$html.='
					</tbody>';
					$day = 1;
					foreach($daySchedule as $row):
						$html.='
						<tr>
							<td colspan="5">Day '.$day.' - '.date("F d, Y", strtotime($row["schedule_date"])).'</td>
						</tr>
						';

						if(isset($TheSchedule[$row["schedule_date"]])):
							foreach($TheSchedule[$row["schedule_date"]] as $sched):
								$html.='
								<tr>
									<td width="15%">'.date("g:i A", strtotime($sched["from_time"])) . "-" . date("g:i A", strtotime($sched["to_time"])).'</td>
									<td>'.$sched["process_name"].'</td>
									<td>'.$sched["audit_clause"].'</td>
									<td>';
									$i=0;
									foreach($Teams[$sched["team_id"]] as $myteam):
										// dump($myteam);
										if($i != 0):
											$html.='<br>';
										endif;
										$html.=$myteam["firstname"] . " " . $myteam["surname"];
										$i++;
									endforeach;
									$html.='</td>
									<td>';
									$i=0;
									foreach($ApsPosition[$sched["aps_id"]] as $myPosition):
										if($i != 0):
											$html.='<br>';
										endif;
										$html.=$myPosition["position_name"];
										$i++;
									endforeach;
									$html.='</td>
								</tr>
								';

							endforeach;
						endif;


						$day++;

					endforeach;

					$html.='



					</table>
				
			
			

		
					
					';

					$mpdf->WriteHTML($html);

					

					$filename = "audit_plan";
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


			// $users = query("select * from users");
			if(!isset($_GET["action"])):
				render("public/auditPlan_system/auditPlanList.php",[
				]);
			else:
				if($_GET["action"] == "create"):
					render("public/auditPlan_system/createAuditPlan.php",[
					]);
				elseif($_GET["action"] == "details"):

					$auditPlan = query("select * from audit_plans where audit_plan = ?", $_GET["id"]);
					$auditPlan = $auditPlan[0];

					$auditors = query("select * from users where role_id = 3");
					render("public/auditPlan_system/auditPlanDetails.php",
						[
							"auditPlan" => $auditPlan,
							"auditors" => $auditors,
						]);
				elseif($_GET["action"] == "auditorDetails"):
					$auditPlan = query("select * from audit_plans where audit_plan = ?", $_GET["id"]);
					$auditPlan = $auditPlan[0];
					render("public/auditPlan_system/auditPlanAuditorDetails.php",
						[
							"auditPlan" => $auditPlan,
						]);
				elseif($_GET["action"] == "getAuditPlanInfo"):
					// dump($_GET);
					$audit_plan = query("select * from audit_plans where audit_plan = ?", $_GET["audit_plan"]);
					$data = $audit_plan[0];
					echo json_encode($data);

				elseif($_GET["action"] == "auditorList"):
						render("public/auditPlan_system/auditPlan_auditorList.php",[
						]);

					
				endif;

			endif;
			
	}
?>
