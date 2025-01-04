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
					

					// $data[$i]["team"] = "TEAM " . $Team[$row["team_id"]]["team"] . ": " . $Team[$row["team_id"]]["members"];
					

					$data[$i]["card"] = 
					'
              <div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  <span  class="username ml-2">'.date('F d, Y', strtotime($row["schedule_date"])).' | '.date("g:i A", strtotime($row["from_time"])) . "-" . date("g:i A", strtotime($row["to_time"])).'</span>
                
                </div>
              </div>
              <div class="card-body">
                <!-- post text -->
						'.$row["audit_clause"].'
				<hr>
				<b>Auditors</b> : TEAM ' . $Team[$row["team_id"]]["team"] . ': ' . $Team[$row["team_id"]]["members"].'
				<hr>
				<div class="row">
					<div class="col-4">
					<label>Process</label>
					<br>
					'.$row["process_id"].'

					</div>
					<div class="col-8">
					<label>Area</label>
					<br>
					'.implode(",", $area).'

					</div>
				</div>

                <!-- Attachment -->
              
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
                            audit_methodologies, year, status
                            ) 
                    VALUES(?,?,?,?,?,?,?)", 
                    $_POST["type"], $_POST["introduction"], $_POST["audit_objectives"] , $_POST["reference_standard"],
					$_POST["audit_methodologies"], $_POST["year"], "ONGOING") === false)
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

				elseif($_GET["action"] == "getAuditPlanInfo"):
					// dump($_GET);

					$audit_plan = query("select * from audit_plans where audit_plan = ?", $_GET["audit_plan"]);
					$data = $audit_plan[0];
					echo json_encode($data);
				endif;

			endif;
			
	}
?>
