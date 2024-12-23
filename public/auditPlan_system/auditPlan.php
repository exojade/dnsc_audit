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
