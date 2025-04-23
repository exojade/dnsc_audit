<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "auditPlanList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
				$where = " where 1=1";
				if(isset($_REQUEST["year"])):
					if($_REQUEST["year"] != ""):
						$where .=" and year = '".$_REQUEST["year"]."'";
					endif;
				endif;
				$users = query("select id, concat(firstname, ' ', surname) as fullname from users");
				$Users = [];
				foreach($users as $row):
					$Users[$row["id"]] = $row;
				endforeach;

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

			
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
					if($row["qad_approved"] != ""):
						$data[$i]["qad_approved"] = $Users[$row["qad_approved"]]["fullname"];
					endif;
					if($row["cmt_approved"] != ""):
						$data[$i]["cmt_approved"] = $Users[$row["cmt_approved"]]["fullname"];
					endif;
					
					
					
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);
		
		elseif($_POST["action"] == "audit_plan_process_owner_list"):
			// dump($_POST);


			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
			$offset = $_POST["start"];
			$limit = $_POST["length"];
			$search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;

			$myArea = query("SELECT area_id FROM users_area 
					WHERE user_id = ?", $_SESSION["dnsc_audit"]["userid"]);
			$area_id = array_column($myArea, "area_id");
			$area_id = "".implode(",", $area_id) . "";

			$audit_plan = query("select * from audit_plans");
			$AuditPlans = [];
			foreach($audit_plan as $row):
				$AuditPlans[$row["audit_plan"]] = $row;
			endforeach;

			$where = " where area_id in ($area_id)";
			// dump($where);
			$baseQuery = "select * from aps_area" . $where . " group by audit_plan order by audit_plan desc";
			$data = query($baseQuery . $limitString . $offsetString);
			// dump($baseQuery);
			$all_data = query($baseQuery);
			// dump($area_id);
			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="auditPlan?action=process_owner_list&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
				$data[$i]["type"] = $AuditPlans[$row["audit_plan"]]["type"];
				$data[$i]["year"] = $AuditPlans[$row["audit_plan"]]["year"];
				$data[$i]["status"] = $AuditPlans[$row["audit_plan"]]["status"];
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
					// dump($_POST);
	
					$where = " where aptm.id = '".$_POST["interal_audit_id"]."'";

					$myTeam = query("SELECT team_id FROM audit_plan_team_members 
					WHERE id = ? 
					GROUP BY team_id", 
					$_POST["interal_audit_id"]);
					// dump($myTeam);
					$teamIds = array_column($myTeam, "team_id");

					$myTeam = "'" . implode("','", $teamIds) . "'";
					// dump($myTeam);
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
					// dump($thePlans);

					$ap = query("select * from audit_plans");
					$AP = [];
					foreach($ap as $row):
						$AP[$row["audit_plan"]] = $row;
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
					// dump($baseQuery);
					$all_data = query($baseQuery);
	
	
	
					// $i = 0;
					$newData = [];
					foreach ($data as $row) {
						if ($AP[$row["audit_plan"]]["status"] == "ONGOING") {
							$row["action"] = '<a href="auditPlan?action=auditorDetails&id=' . $row["audit_plan"] . '" class="btn btn-block btn-sm btn-success">Details</a>';

							$row["create_count"] = 0;
							$row["pending_count"] = 0;
							$row["done_count"] = 0;

							if (isset($thePlans[$row["audit_plan"]])) {
								$row["create_count"] = $thePlans[$row["audit_plan"]]["create_count"];
								$row["pending_count"] = $thePlans[$row["audit_plan"]]["pending_count"];
								$row["done_count"] = $thePlans[$row["audit_plan"]]["done_count"];
							}

							$newData[] = $row;
						}
					}
					// dump($data);
					$json_data = array(
						"draw" => $draw + 1,
						"iTotalRecords" => count($all_data),
						"iTotalDisplayRecords" => count($all_data),
						"aaData" => $newData
					);
					echo json_encode($json_data);
		


		elseif($_POST["action"] == "modalUpdateTeam"):
			// dump($_POST);

			$users = query("select * from users where role_id = 3");
			$team = query("select * from audit_plan_teams where team_id = ?", $_POST["team_id"]);
			$team = $team[0];

			$leader = query("select * from audit_plan_team_members aptm
							left join users u on u.id = aptm.id
							where team_id = ? and role = 'LEADER'", $_POST["team_id"]);
			$leader = $leader[0];
			$members = query("select * from audit_plan_team_members aptm
								left join users u on u.id = aptm.id
								where team_id = ? and role = 'MEMBER'", $_POST["team_id"]);


			

			$html = '';

			$html .= '

				<input type="hidden" name="team_id" value="'.$team["team_id"].'">


				<div class="form-group">
					<label>Team #</label>
					<input name="team_number" type="text" value="'.$team["team_number"].'" class="form-control">
				</div>';

			$html.='
				<div class="form-group">
					<label>Team Leader</label>
					<select name="team_leader" style="width: 100%;" class="modalSelect2 form-control">
			';
			foreach ($users as $u) {
				$selected = ($u['id'] == $leader['id']) ? 'selected' : '';
				$html .= '<option value="'.$u['id'].'" '.$selected.'>'.$u['firstname'] . ' ' . $u["surname"].'</option>';
			}
			$html .= '
					</select>
				</div>
			';


			$html .= '
				<div class="form-group">
					<label>Members</label>
					<select name="team_members[]" multiple style="width: 100%;" class="modalSelect2 form-control">
			';

			foreach ($users as $u) {
				// Skip the leader
				// if ($u['id'] == $leader['id']) {
				// 	continue;
				// }

				// Check if the user is a member
				$selected = '';
				foreach ($members as $m) {
					if ($m['id'] == $u['id']) {
						$selected = 'selected';
						break;
					}
				}

				$html .= '<option value="'.$u['id'].'" '.$selected.'>'.$u['firstname'] . ' ' . $u["surname"].'</option>';
			}

			$html .= '
					</select>
				</div>
			';


			echo($html);

		elseif($_POST["action"] == "updateTeam"):
			// dump($_POST);

			query("update audit_plan_teams set team_number = ? where team_id = ?", $_POST["team_number"], $_POST["team_id"]);
			$team = query("select * from audit_plan_teams where team_id = ?", $_POST["team_id"]);
			$team = $team[0];
			// dump($team);

			query("delete from audit_plan_team_members where team_id = ?", $_POST["team_id"]);

			if (query("insert INTO audit_plan_team_members
					(team_id, id,role, audit_plan) 
					VALUES(?,?,?,?)", 
					$team["team_id"], $_POST["team_leader"], "LEADER", $team["audit_plan"]) === false)
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
				$team["team_id"], $row, "MEMBER", $team["audit_plan"]) === false)
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
				"message" => "Updating or records done successfully!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "deleteTeam"):
			// dump($_POST);

			query("delete from audit_plan_team_members where team_id = ?", $_POST["team_id"]);
			query("delete from audit_plan_teams where team_id = ?", $_POST["team_id"]);
			query("delete from audit_plan_schedule where team_id = ?", $_POST["team_id"]);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Team delete successfully!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();


		elseif($_POST["action"] == "teamDatatable"):
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
				$where = " where audit_plan = '".$_POST["audit_plan"]."'";
				$order_by = " order by team_number asc";
				$baseQuery = "select * from audit_plan_teams" . $where . $order_by;
				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);

				$audit_plan = query("select * from audit_plans where audit_plan = ?" , $_POST["audit_plan"]);
				$audit_plan = $audit_plan[0];

				$team_members = query("select atm.*, concat(u.firstname, ' ', u.surname) as fullname from audit_plan_team_members atm
										left join users u on u.id = atm.id where audit_plan = ?", $_POST["audit_plan"]);
				$Team_Members = [];
				foreach($team_members as $row):
					$Team_Members[$row["team_id"]][$row["id"]] = $row;
				endforeach;



				$i = 0;
				foreach($data as $row):

					if($audit_plan["status"] == "FOR REVIEW"):
						$data[$i]["action"] = '
							<form class="generic_form_trigger" data-url="auditPlan">
								<input type="hidden" name="action" value="deleteTeam">
								<input type="hidden" name="team_id" value="'.$row["team_id"].'">
								<div class="btn-group btn-block">
									<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalUpdateTeam" data-id="'.$row["team_id"].'">Update</a>
									<button class="btn btn-danger btn-sm">Remove</button>
								</div>
							</form>
						';

					else:
						$data[$i]["action"] = '<button class="btn btn-block btn-info" disabled>No Action</button>';
					endif;
					
					
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

			<label>Audit Type</label>
			<select name="audit_type" class="form-control" required>
				<option value="REGULAR" ' . ($audit_plan["audit_type"] == "REGULAR" ? "selected" : "") . '>REGULAR</option>
				<option value="SPECIAL" ' . ($audit_plan["audit_type"] == "SPECIAL" ? "selected" : "") . '>SPECIAL</option>
			</select>

			<div class="form-group">
			<label>Scope</label>
              <textarea name="scope" required class="summernote form-control">'.$audit_plan["scope"].'</textarea>
			</div>
			

			<label>Introduction</label>
              <textarea name="introduction"  required class="summernote">'.$audit_plan["introduction"].'</textarea>


			<label>Audit Objectives</label>
              <textarea name="audit_objectives" required class="summernote">'.$audit_plan["audit_objectives"].'</textarea>

            <label>Reference Standard</label>
              <textarea name="reference_standard" required class="summernote">'.$audit_plan["reference_standard"].'</textarea>

            <label>Audit Methodologies</label>
              <textarea name="audit_methodologies" required class="summernote">'.$audit_plan["audit_methodologies"].'</textarea>
			';

			echo($html);

		elseif($_POST["action"] == "timelineProcessOwnerDatatable"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
			$offset = $_POST["start"];
			$limit = $_POST["length"];
			$search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;


			$myArea = query("SELECT area_id FROM users_area 
					WHERE user_id = ?", $_SESSION["dnsc_audit"]["userid"]);
			$area_id = array_column($myArea, "area_id");
			$area_id = implode(",", $area_id);

			$aps_area = query("select * from aps_area where area_id in ($area_id) and audit_plan = ? group by aps_id", $_POST["audit_plan"]);
			$aps_id = array_column($aps_area, "aps_id");
			$aps_id = "'".implode("','", $aps_id)."'";



			$where = " where aps_id in ($aps_id)";
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
		  <div class="card-header bg-info">
			<div class="user-block">
					  <span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
			</div>
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
		elseif($_POST["action"] == "timelineDatatable"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

				$where = " where audit_plan = '".$_POST["audit_plan"]."'";
				$baseQuery = "select * from audit_plan_schedule" . $where . " ORDER BY schedule_date asc, from_time asc";

				$aps_position = query("select * from aps_position ap
										left join position p on p.position_id = ap.position_id
										where audit_plan = ?", $_POST["audit_plan"]);
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

				$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan"]);
				$audit_plan = $audit_plan[0];

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

			if($row["plan_type"] == "INDIVIDUAL"):
				$data[$i]["card"] = 
				'
              <div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  		<span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
							
                
                </div>';

				if($_SESSION["dnsc_audit"]["role"] == "4" && $audit_plan["status"] == "FOR REVIEW"):
					$data[$i]["card"].='
					<form class="generic_form_trigger" data-url="auditPlan">
					<input type="hidden" name="action" value="deleteAuditSchedule">
					<input type="hidden" name="aps_id" value="'.$row["aps_id"].'">
								<button class="btn btn-danger btn-sm float-right">Delete</button>
							</form>
								<a href="#" data-toggle="modal" data-target="#modalUpdateSchedule" data-id="'.$row["aps_id"].'" class="btn btn-sm btn-warning float-right mr-1">Update</a>
					';
				endif;


				$data[$i]["card"].='


				
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
				  $data[$i]["card"].='
                  <dd class="col-sm-9">'.$positionNames.'</dd>
                </dl>
              
              </div>
          
            </div>
					';
			else:
				$data[$i]["card"] = '
				
				<div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  		<span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
							
                
                </div>
				<form class="generic_form_trigger" data-url="auditPlan">
					<input type="hidden" name="action" value="deleteAuditSchedule">
					<input type="hidden" name="aps_id" value="'.$row["aps_id"].'">
								<button class="btn btn-danger btn-sm float-right">Delete</button>
							</form>
              </div>
              <div class="card-body text-center">
			<b>'.$row["fixed_title"].'</b>
              
              </div>
          
            </div>
				
				';
			endif;

			
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "deleteAuditSchedule"):
			// dump($_POST);

			query("delete from audit_plan_schedule where aps_id = ?", $_POST["aps_id"]);
			query("delete from aps_position where aps_id = ?", $_POST["aps_id"]);
			query("delete from aps_area where aps_id = ?", $_POST["aps_id"]);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Delete Successfully!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "modalUpdateSchedule"):
			// dump($_POST);
			$processes = query("select * from process");
			
			$aps = query("select aps.*,p.process_name from audit_plan_schedule aps
							left join process p on p.process_id = aps.process_id		
							where aps_id = ?", $_POST["aps_id"]);
			$aps_area = query("select * from aps_area where aps_id = ?", $_POST["aps_id"]);
			$aps_position = query("select * from aps_position where aps_id = ?", $_POST["aps_id"]);
			$aps = $aps[0];



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
				", $aps["audit_plan"]);



			$areas = query("select a.* from area_process ap left join areas a
								on a.id =ap.area_id where ap.process_id = ?", $aps["process_id"]);
			$area_ids = implode(',', array_column($aps_area, 'area_id'));
			// dump($area_ids);

			$positions = query("select p.* from area_position ap left join areas a
				on a.id =ap.area_id
				left join position p on p.position_id = ap.position_id
				where ap.area_id in (".$area_ids.")");
			// dump($positions);		
			$html = '';
			$html.='

			<input type="hidden" name="aps_id" value="'.$aps["aps_id"].'">
			<div class="form-group">
				<label>Process</label>
				<select style="width: 100%;" name="process"  class="form-control processSelect">';
				foreach ($processes as $p) {
					$selected = ($p['process_id'] == $aps['process_id']) ? 'selected' : '';
					$html .= '<option value="'.$p['process_id'].'" '.$selected.'>'.$p['process_name'].'</option>';
				}
				$html.='
				</select>
			</div>
			';


			$html.='
			<div class="form-group">
				<label>Area</label>
				<select name="area[]" multiple style="width: 100%;" name="area" class="form-control areaSelect">';
				foreach ($areas as $a) {
					$selected = '';
					foreach ($aps_area as $aa) {
						if ($a['id'] == $aa['area_id']) {
							$selected = 'selected';
							break;
						}
					}
				
					$html .= '<option value="'.$a['id'].'" '.$selected.'>'.$a['area_name'].'</option>';
				}
				$html .= '
						</select>
					</div>
				';
				$html.='
				</select>
			</div>
			';



			$html.='
			<div class="form-group">
				<label>Position</label>
				<select name="position[]" multiple style="width: 100%;" name="area" class="form-control positionSelect">';
				foreach ($positions as $p) {
					$selected = '';
					foreach ($aps_position as $ap) {
						if ($p['position_id'] == $ap['position_id']) {
							$selected = 'selected';
							break;
						}
					}
				
					$html .= '<option value="'.$p['position_id'].'" '.$selected.'>'.$p['position_name'].'</option>';
				}
				$html .= '
						</select>
					</div>
				';
				$html.='
				</select>
			</div>
			';


			$html.='
			<div class="form-group">
				<label>Criteria Clause</label>
				<textarea name="audit_clause" rows="3" class="form-control">'.$aps["audit_clause"].'</textarea>
			</div>
			';

			$html.='
			<div class="form-group">
				<label>Team</label>
				<select style="width: 100%;" name="team"  class="form-control modalSelect">';
				foreach ($team as $t) {
					$selected = ($t['team_id'] == $aps['team_id']) ? 'selected' : '';
					$html .= '<option value="'.$t['team_id'].'" '.$selected.'>Team '. $t["team"] . '-' . $t["members"] .'</option>';
				}
				$html.='
				</select>
			</div>
			';

			$html.='
			<div class="form-group">
                  <label>Schedule Date</label>
                  <input type="date" value="'.$aps["schedule_date"].'" class="form-control" name="schedule_date">
                </div>
			';


			$html.='
			<div class="row">
    <div class="col-6">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <label>From:</label>
                <div class="input-group date" id="fromtimepickerUpdate" data-target-input="nearest">
                    <input name="fromTime" value="'.$aps["from_time"].'" type="text" class="form-control datetimepicker-input" data-target="#fromtimepickerUpdate"/>
                    <div class="input-group-append" data-target="#fromtimepickerUpdate" data-toggle="datetimepicker">
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
                <div class="input-group date" id="totimepickerUpdate" data-target-input="nearest">
                    <input name="toTime" value="'.$aps["to_time"].'" type="text" class="form-control datetimepicker-input" data-target="#totimepickerUpdate"/>
                    <div class="input-group-append" data-target="#totimepickerUpdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
			';


			
			
			echo($html);
		elseif($_POST["action"] == "updateAuditPlanInfo"):
			// dump($_POST);


			query("update audit_plans set
					introduction = '".$_POST["introduction"]."',
					audit_objectives = '".$_POST["audit_objectives"]."',
					reference_standard = '".$_POST["reference_standard"]."',
					audit_methodologies = '".$_POST["audit_methodologies"]."',
					scope = '".$_POST["scope"]."',
					audit_type = '".$_POST["audit_type"]."'
					where audit_plan = ?", $_POST["audit_plan_id"]);


			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Updating or records done successfully!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();
				

		elseif($_POST["action"] == "submitAuditPlan"):
			// dump($_POST);
			query("update audit_plans set status = 'SUBMITTED' where audit_plan = ?", $_POST["id"]);
			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
			$audit_plan = $audit_plan[0];
			$users = query("select * from users where role_id = 5");
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " submitted you to Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Submitted for Review",
				"link" => "auditPlan?action=details&id=".$_POST["id"],
			];
			echo json_encode($res_arr);
			exit();

		elseif($_POST["action"] == "revertSubmittedPlan"):
			// dump($_POST);


			query("update audit_plans set status = 'FOR REVIEW' where audit_plan = ?", $_POST["id"]);
			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
			$audit_plan = $audit_plan[0];
			$users = query("select * from users where role_id = 5");
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " cancelled the submission and may update it! : " . $audit_plan["type"] . " - " . $audit_plan["year"];
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Submitted for Review",
				"link" => "auditPlan?action=details&id=".$_POST["id"],
			];
			echo json_encode($res_arr);
			exit();


		elseif($_POST["action"] == "approveAuditPlanToCMT"):
			// dump($_POST);

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
			$audit_plan = $audit_plan[0];
			query("update audit_plans set status = 'QAD-APPROVED', qad_approved = ? where audit_plan = ?", $_SESSION["dnsc_audit"]["userid"], $_POST["id"]);

			$result = query("INSERT INTO audit_plan_remarks 
									(audit_plan, remarks, date_created, remarks_by, audit_plan_status)
								VALUES(?,?,?,?,?)", 
								$audit_plan["audit_plan"], $_POST["remarks"], time(), $_SESSION["dnsc_audit"]["userid"], "QAD-APPROVED");

			
			$users = query("select * from users where role_id = 8");
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " approved : " . $audit_plan["type"] . " - " . $audit_plan["year"].". CMT is the final approver! Kindly Review to make the Audit Plan final!";
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;

			$users = query("select * from users where id = ?", $audit_plan["created_by"]);
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " approved : " . $audit_plan["type"] . " - " . $audit_plan["year"].". CMT is the final approver! Kindly wait for the CMT final review! ";
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Submitted for Review",
				"link" => "auditPlan?action=details&id=".$_POST["id"],
			];
			echo json_encode($res_arr);
			exit();

		elseif($_POST["action"] == "returnAuditPlanToILA"):
			// dump($_POST);

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
			$audit_plan = $audit_plan[0];
			query("update audit_plans set status = 'FOR REVIEW' where audit_plan = ?", $_POST["id"]);

			$result = query("INSERT INTO audit_plan_remarks 
									(audit_plan, remarks, date_created, remarks_by, audit_plan_status)
								VALUES(?,?,?,?,?)", 
								$audit_plan["audit_plan"], $_POST["remarks"], time(), $_SESSION["dnsc_audit"]["userid"], "RETURN FOR REVIEW");

			
		

			$users = query("select * from users where id = ?", $audit_plan["created_by"]);
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " returned the : " . $audit_plan["type"] . " - " . $audit_plan["year"].". Kindly view the remarks from the Approver! ";
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Submitted for Review",
				"link" => "auditPlan?action=details&id=".$_POST["id"],
			];
			echo json_encode($res_arr);
			exit();

			elseif($_POST["action"] == "returnAuditPlanToILACMT"):

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
			$audit_plan = $audit_plan[0];
			query("update audit_plans set status = 'FOR REVIEW', qad_approved = '' where audit_plan = ?", $_POST["id"]);

			$result = query("INSERT INTO audit_plan_remarks 
									(audit_plan, remarks, date_created, remarks_by, audit_plan_status)
								VALUES(?,?,?,?,?)", 
								$audit_plan["audit_plan"], $_POST["remarks"], time(), $_SESSION["dnsc_audit"]["userid"], "RETURN FOR REVIEW from CMT");

			
		

			$users = query("select * from users where id = ?", $audit_plan["created_by"]);
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " returned the : " . $audit_plan["type"] . " - " . $audit_plan["year"].". Kindly view the remarks from the Approver! This is from CMT ";
				$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Submitted for Review",
				"link" => "auditPlan?action=details&id=".$_POST["id"],
			];
			echo json_encode($res_arr);
			exit();

			elseif($_POST["action"] == "FinalApproveAP"):
				// dump($_POST);
	
				$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["id"]);
				$audit_plan = $audit_plan[0];
				query("update audit_plans set status = 'ONGOING', cmt_approved = ? where audit_plan = ?", $_SESSION["dnsc_audit"]["userid"], $_POST["id"]);
	
				$result = query("INSERT INTO audit_plan_remarks 
										(audit_plan, remarks, date_created, remarks_by)
									VALUES(?,?,?,?)", 
									$audit_plan["audit_plan"], $_POST["remarks"], time(), $_SESSION["dnsc_audit"]["userid"]);
	
				
				// $users = query("select * from users where role_id = 8");
				// foreach($users as $row):
				// 	$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " approved : " . $audit_plan["type"] . " - " . $audit_plan["year"].". CMT is the final approver! Kindly Review to make the Audit Plan final!";
				// 	$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
				// 	$theMessage = serialize($Message);
				// 	addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
				// endforeach;
	
				$users = query("select * from users where id = ?", $audit_plan["created_by"]);
				foreach($users as $row):
					$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " approved : " . $audit_plan["type"] . " - " . $audit_plan["year"].". Audit Plan is now fully launched! ";
					$Message["link"] = "auditPlan?action=details&id=".$audit_plan["audit_plan"];
					$theMessage = serialize($Message);
					addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
				endforeach;

				$teams = query("select * from audit_plan_team_members where audit_plan = ?", $audit_plan["audit_plan"]);
				$created_by = query("select concat(firstname, ' ', surname) as fullname from users where id = ?", $audit_plan["created_by"]);
				$created_by = $created_by[0];
				$Message = [];
				foreach($teams as $row):
					$Message["message"] = $created_by["fullname"] . " assigned you to Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
					$Message["link"] = "auditPlan?action=auditorDetails&id=".$audit_plan["audit_plan"];
					$theMessage = serialize($Message);
					addNotification($row["id"],$theMessage, $audit_plan["created_by"]);
				endforeach;

				$area = query("select area_id from aps_area where audit_plan = ?", $audit_plan["audit_plan"]);
				$Area = [];
				foreach($area as $row):
					$Area[] = $row["area_id"];

				endforeach;

	
				$area = implode(",", $Area);
				$users_area = query("select * from users_area where area_id in ($area)");
				$myarea = query("select * from areas");
				$Area = [];
				foreach($myarea as $row):
					$Area[$row["id"]] = $row;
				endforeach;


				foreach($users_area as $row):
					$Message["message"] = $created_by["fullname"] . " included your office (".$Area[$row["area_id"]]["area_name"].") for audit under Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
					$Message["link"] = "auditPlan?action=process_owner_list&id=".$audit_plan["audit_plan"];
					$theMessage = serialize($Message);
					addNotification($row["user_id"],$theMessage, $audit_plan["created_by"]);
				endforeach;










				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Audit Plan Submitted for Review",
					"link" => "auditPlan?action=details&id=".$_POST["id"],
				];
				echo json_encode($res_arr);
				exit();


		elseif($_POST["action"] == "newPlan"):
			// dump($_POST);
			try {


				$typeMapping = [
					"1st Internal Quality Audit" => "01", // 1st Internal Quality Audit
					"2nd Internal Quality Audit" => "02"  // 2nd Internal Quality Audit
				];

				$monthMapping = [
					"1st Internal Quality Audit" => "01", // 1st Internal Quality Audit
					"2nd Internal Quality Audit" => "08"  // 2nd Internal Quality Audit
				];
				$audit_plan_id = "AP" . $_POST["year"] . "-" . $typeMapping[$_POST["type"]] . "-" . $monthMapping[$_POST["type"]];
				$result = query("INSERT INTO audit_plans 
									(audit_plan, type, introduction, audit_objectives, reference_standard,
									 audit_methodologies, year, status, created_by, timestamp, audit_type, scope) 
								VALUES(?,?,?,?,?,?,?,?,?,?,?,?)", 
								$audit_plan_id, $_POST["type"], $_POST["introduction"], $_POST["audit_objectives"] , $_POST["reference_standard"],
								$_POST["audit_methodologies"], $_POST["year"], "FOR REVIEW", $_SESSION["dnsc_audit"]["userid"], time(),
								$_POST["audit_type"], $_POST["scope"]
							);
			
				// Check if query() function encountered an error
				// if (!$result) {
				// 	throw new Exception("Query execution failed.", mysqli_errno($conn)); // Capture MySQL error code
				// }
			
				// Success response
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Audit plan created successfully!",
					"link" => "auditPlan?action=details&id=".$audit_plan_id,
				];
				echo json_encode($res_arr);
				exit();
			
			} catch (Exception $e) {
				$errorCode = $e->getCode();
			
				// Check if it's a duplicate entry error (MySQL error code 1062)
				if ($errorCode == 1062) {
					$message = "Duplicate Type and Year";
				} else {
					$message = "Duplicate Type and Year";
				}
			
				// Error response
				$res_arr = [
					"result" => "failed",
					"title" => "Creating Audit Plan Failed",
					"message" => $message,
					"link" => "refresh",
				];
				echo json_encode($res_arr);
				exit();
			}

		elseif($_POST["action"] == "addTeam"):
			// dump($_POST);
			// $auditors = "'" . implode("','", $_POST["team_members"]) . "'";
			// $checkExistingAuditors = query("select * from audit_plan_team_members where audit_plan = ?
			// and id in (".$auditors.")", $_POST["audit_plan_id"]);

			// if(!empty($checkExistingAuditors)):
			// 	$res_arr = [
			// 		"result" => "failed",
			// 		"title" => "Failed",
			// 		"message" => "Team Member already added on this Audit Plan!",
			// 		"link" => "refresh",
			// 		// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
			// 		];
			// 		echo json_encode($res_arr); exit();
			// endif;

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

		elseif($_POST["action"] == "addFixedSchedule"):

			$aps_id = create_trackid("APS");
			// dump($_POST);
			if (query("insert INTO audit_plan_schedule 
				(aps_id, audit_plan,from_time, to_time,schedule_date,plan_type,fixed_title) 
				VALUES(?,?,?,?,?,?,?)", 
				$aps_id, $_POST["audit_plan_id"], 
				date("H:i", strtotime($_POST["fromTime"])), 
				date("H:i", strtotime($_POST["toTime"])), 
				$_POST["schedule_date"],
				"FIXED", $_POST["fixed_title"]) === false)
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

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Schedule successfully added!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "updateAuditSchedule"):
			// dump($_POST);



			$aps = query("select * from audit_plan_schedule where aps_id = ?", $_POST["aps_id"]);
			$aps = $aps[0];
			// dump($aps_id);

			query("update audit_plan_schedule set 
				from_time = ?,
				to_time = ?,
				schedule_date = ?,
				team_id = ?,
				process_id = ?,
				audit_clause = ?
				where aps_id = ?
			", 
			$_POST["fromTime"],
			$_POST["toTime"],
			$_POST["schedule_date"],
			$_POST["team"],
			$_POST["process"],
			$_POST["audit_clause"],
			$_POST["aps_id"],
		);


			query("delete from aps_area where aps_id = ?", $_POST["aps_id"]);
			foreach($_POST["area"] as $row):
				if (query("insert INTO aps_area 
				(area_id, audit_plan, aps_id) 
				VALUES(?,?,?)", 
				$row, $aps["audit_plan"], $_POST["aps_id"]
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

			query("delete from aps_position where aps_id = ?", $_POST["aps_id"]);
			foreach($_POST["position"] as $row):
				if (query("insert INTO aps_position 
				(position_id, audit_plan, aps_id) 
				VALUES(?,?,?)", 
				$row, $aps["audit_plan"], $_POST["aps_id"]
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
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Audit Plan Schedule successfully updated!",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "addSchedule"):
			
			// dump($_POST);

			$aps_id = create_trackid("APS");
			$Area = [];
			$area = query("select * from areas");
			foreach($area as $row):
				$Area[$row["id"]] = $row;
			endforeach;

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
			// $Message = [];
			// foreach($teams as $row):
			// 	$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " assigned you to Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
			// 	$Message["link"] = "auditPlan?action=auditorDetails&id=".$audit_plan["audit_plan"];
			// 	$theMessage = serialize($Message);
			// 	addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			// endforeach;

			$area = implode(",", $_POST["area_id"]);
			// dump($area);
			// $users_area = query("select * from users_area where area_id in ($area)");
			// foreach($users_area as $row):
			// 	$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " included your office (".$Area[$row["area_id"]]["area_name"].") for audit under Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
			// 	$Message["link"] = "auditPlan?action=process_owner_list&id=".$audit_plan["audit_plan"];
			// 	$theMessage = serialize($Message);
			// 	addNotification($row["user_id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			// endforeach;


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
									where aps.audit_plan = ? order by schedule_date asc, from_time asc", $_POST["audit_plan_id"]);
			// dump($theSchedule);

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
			$ApsPosition = [];
			foreach($aps_position as $row):
				$ApsPosition[$row["aps_id"]][$row["position_id"]] = $row;
			endforeach;

			$TheSchedule = [];
			foreach($theSchedule as $row):
				$TheSchedule[$row["schedule_date"]][$row["aps_id"]] = $row;
			endforeach;
			// dump($TheSchedule);

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
						'margin_top' => 40,
						'margin_left' => 0,
						'margin_right' => 0,
						'margin_bottom' => 40,
						'margin_footer' => 0,
						'default_font' => 'helvetica'
					]);

					$settings = query("select * from utility_settings");
					$settings = unserialize($settings[0]["audit_plan"]);
					// dump($settings);




					$mpdf->SetHTMLHeader('

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					
					<div class="row" >
						<div class="col-xs-9">
							<img src="'.$settings["header"].'" 
							style="width:100%; height: auto; max-height: 130px;">
						</div>
						<div class="col-xs-2">
							<table id="headerTable " class="table">
								<tr>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">Form No.</td>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">'.$settings["form_number"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">Issue Status</td>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">'.$settings["issue_status"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">Revision No.</td>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">'.$settings["revision_number"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">Effective Date: </td>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">'.$settings["effective_date"].'</td>
								</tr>
								<tr>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">Approved By </td>
									<td class="text-center" style="font-size: 10px; padding:1px !important;">'.$settings["approved_by"].'</td>
								</tr>

							</table>
						
						</div>
					</div>
			
					');

					$mpdf->SetHTMLFooter('
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
							<div class="row">
							<div class="col-xs-12 text-right">
								<img src="'.$settings["footer"].'" 
								style="width:100%;
								height: auto; max-height: 100px;">
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
						padding: 2px !important;
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
					<div class="container">
					<h4 class="text-center"><b><i>QUALITY MANAGEMENT SYSTEM OFFICE</b></i></h4>
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
							<td width="20%" class="text-center">Type</td>
							<td>
							<span>Regular / Full (' . ($auditPlan["audit_type"] == "REGULAR" ? "✔" : "") . ')</span> &nbsp;&nbsp;
							<span>Special (' . ($auditPlan["audit_type"] == "SPECIAL" ? "✔" : "") . ')</span>
						</td>
						</tr>

						<tr>
							<td width="20%" class="text-center">Scope</td>
							<td>'.$auditPlan["scope"].'</td>
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
					</div>
				
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
						padding: 2px !important;
					}
					h5{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 15px !important;
						font-weight: 800;
					}

.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none !important;
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
					<div class="container">
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
						// dump($TheSchedule);
						$html.='
						<tr>
							<td colspan="5"><b>Day '.$day.' - '.date("F d, Y", strtotime($row["schedule_date"])).'</b></td>
						</tr>
						';

						if($day == 1):
							$html.='
							<tr>
								<th class="text-center"><b>Time</b></th>
								<th class="text-center"><b>Process/Audit Area</b></th>
								<th class="text-center"><b>Audit Criteria/Clauses</b></th>
								<th class="text-center"><b>Auditor/s</b></th>
								<th class="text-center"><b>Area/Functions/Process Owners/Auditee</b></th>
							</tr>
							';
						endif;


						if(isset($TheSchedule[$row["schedule_date"]])):
							// dump($TheSchedule[$row["schedule_date"]]);
							foreach($TheSchedule[$row["schedule_date"]] as $sched):
								// if()
								if($sched["plan_type"] == "INDIVIDUAL"):
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
								else:
									$html.='
									<tr>
										<td width="15%">'.date("g:i A", strtotime($sched["from_time"])) . "-" . date("g:i A", strtotime($sched["to_time"])).'</td>
										<td colspan="4" class="text-center"><b>'.$sched["fixed_title"].'</b></td>
									</tr>
									';
								endif;
								

							endforeach;
						endif;


						$day++;

					endforeach;

					$html.='
					</table>
					';

					$Users = [];
					$users = query("select id, concat(firstname, ' ', surname) as fullname from users");
					foreach($users as $row):
						$Users[$row["id"]] = $row;
					endforeach;
					$created_by = !empty($auditPlan["created_by"]) ? $Users[$auditPlan["created_by"]]["fullname"] : "";
					$qad_approved = !empty($auditPlan["qad_approved"]) ? $Users[$auditPlan["qad_approved"]]["fullname"] : "";
					$cmt_approved = !empty($auditPlan["cmt_approved"]) ? $Users[$auditPlan["cmt_approved"]]["fullname"] : "";

				

					$html.='
				
					</div>
					';

					$html .= '

					<div class="container" style="page-break-inside: avoid;">
					<table width="100%" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; font-size: 12px;">
						<tr>
							<td width="80%" colspan="2" style="vertical-align: top;">
							<b>Prepared by:</b><br><br><br>
							<strong><b>'.$created_by.'</b></strong><br>
							<span style="font-size: 11px;">Internal Lead Auditor</span>
							</td>
							<td width="20%" style="vertical-align: top;">
							<strong>Date:</strong><br><br><br>
							</td>
						</tr>
						<tr>
							<td width="40%" style="vertical-align: top;">
							<b>Reviewed by:</b><br><br><br>
							<b>'.$qad_approved.'</b><br>
							<span style="font-size: 11px;">Director for Quality Assurance / QMC</span>
							</td>
							<td width="40%" style="vertical-align: top;">
							<b>Approved by:</b><br><br><br>
							<b>'.$cmt_approved.'</b><br>
							<span style="font-size: 11px;">College Management Team</span>
							</td>
							<td width="20%" style="vertical-align: top;">
							<strong>Date</strong>
							</td>
						</tr>
						</table>
						</div>
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


				elseif($_GET["action"] == "process_owner_list"):
					if(!isset($_GET["id"])):
						render("public/auditPlan_system/audit_plan_process_owner_list.php",[
						]);
					else:
						render("public/auditPlan_system/audit_plan_process_owner_details.php",[
						]);
					endif;
					

					
				endif;

			endif;
			
	}
?>
