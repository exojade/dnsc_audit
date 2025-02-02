<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "audit_evaluation_list_process_owners_pending"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

				$AuditPlan = [];
				$audit_plan = query("select * from audit_plans");
				foreach($audit_plan as $row):
					$AuditPlan[$row["audit_plan"]] = $row;
				endforeach;

				$Area = [];
				$area = query("select * from areas");
				foreach($area as $row):
					$Area[$row["id"]] = $row;
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
						GROUP BY 
							t.team_id
						ORDER BY 
							t.team_number
						");
				$Team = [];
				foreach($team as $row):
					$Team[$row["team_id"]] = $row;
				endforeach;


				$myArea = query("select * from users_area where user_id = ?", $_POST["process_owner"]);
				$areaIds = "'".implode("','", array_column($myArea, 'area_id')) . "'";
				$where = " where aps_area in (".$areaIds.")
				and audit_report_status = 'DONE' and audit_evaluation_id is null";
				$order_string = " order by timestamp desc";
				// dump($areaIds);
				// dump($audit_reports);
				$baseQuery = "select * from audit_report ar
								left join audit_plan_schedule aps
								on aps.aps_id = ar.aps_id" . $where;
				$data = query($baseQuery . $order_string .  $limitString . " " . $offsetString);
				$all_data = query($baseQuery  . $order_string);
				// dump($all_data);
				$i = 0;
				foreach($data as $row):
					$data[$i]["audit_plan"] = $AuditPlan[$row["audit_plan"]]["type"];
					$data[$i]["team"] = $Team[$row["team_id"]]["members"];
					$data[$i]["date"] =  date('F d, Y', strtotime($row["schedule_date"]));
					$data[$i]["time"] = $Team[$row["team_id"]]["members"];
					$data[$i]["process_name"] = $Process[$row["process_id"]]["process_name"];
					$data[$i]["area"] = $Area[$row["aps_area"]]["area_name"];

					$data[$i]["action"] = '<a href="audit_evaluation?action=create&id='.$row["audit_report_id"].'" class="btn btn-block btn-sm btn-warning">Create</a>';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

				elseif($_POST["action"] == "audit_evaluation_list_process_owners_done"):
					// dump($_REQUEST);
					$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
					$offset = $_POST["start"];
					$limit = $_POST["length"];
					$search = $_POST["search"]["value"];
					$limitString = " limit " . $limit;
					$offsetString = " offset " . $offset;
	
					$AuditPlan = [];
					$audit_plan = query("select * from audit_plans");
					foreach($audit_plan as $row):
						$AuditPlan[$row["audit_plan"]] = $row;
					endforeach;


					$AuditReport = [];
					$audit_report = query("select ar.*,aps.team_id,aps.process_id from audit_report ar left join audit_plan_schedule aps
											on aps.aps_id = ar.aps_id");
					foreach($audit_report as $row):
						$AuditReport[$row["audit_report_id"]] = $row;
					endforeach;

				
					$Area = [];
					$area = query("select * from areas");
					foreach($area as $row):
						$Area[$row["id"]] = $row;
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
							GROUP BY 
								t.team_id
							ORDER BY 
								t.team_number
							");
					$Team = [];
					foreach($team as $row):
						$Team[$row["team_id"]] = $row;
					endforeach;
	
	
					$myArea = query("select * from users_area where user_id = ?", $_POST["process_owner"]);
					$areaIds = "'".implode("','", array_column($myArea, 'area_id')) . "'";
					$where = " where aa.area_id in (".$areaIds.")";
					$order_string = " order by timestamp desc";
					// dump($areaIds);
					// dump($audit_reports);
					$baseQuery = "select ae.*,aa.area_id, concat(u.firstname, ' ', u.middlename, ' ', u.surname) as evaluated_by from audit_evaluation ae left join aps_area aa
									on aa.tblid = ae.aps_area_id
									left join users u on u.id = ae.user_id  " . $where;
					$data = query($baseQuery . $order_string .  $limitString . " " . $offsetString);
					$all_data = query($baseQuery  . $order_string);
					// dump($all_data);
					$i = 0;
					foreach($data as $row):
						$data[$i]["audit_plan"] = $AuditPlan[$row["audit_plan"]]["type"];

						$myReport = $AuditReport[$row["audit_report_id"]];
						$data[$i]["team"] = $Team[$myReport["team_id"]]["members"];


						$data[$i]["date_created"] =  date('F d, Y', $row["timestamp"]);
						$data[$i]["process_name"] = $Process[$myReport["process_id"]]["process_name"];
						$data[$i]["area"] = $Area[$row["area_id"]]["area_name"];

						$action = '
							<div class="btn-group btn-block">
								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Action
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="audit_evaluation?action=details&id='.$row["audit_evaluation_id"].'" >View Details</a></li>
									<li><a class="dropdown-item" href="audit_evaluation?action=details&id='.$row["audit_evaluation_id"].'" >Download Audit Evaluation</a></li>
									<li><a class="dropdown-item" href="audit_evaluation?action=details&id='.$row["audit_evaluation_id"].'" >Download Audit Report</a></li>
								</ul>
							</div>
							';
	
						$data[$i]["action"] = $action;
						$i++;
					endforeach;
					$json_data = array(
						"draw" => $draw + 1,
						"iTotalRecords" => count($all_data),
						"iTotalDisplayRecords" => count($all_data),
						"aaData" => $data
					);
					echo json_encode($json_data);


		elseif($_POST["action"] == "newEvaluation"):
			// dump($_POST);
			$audit_report = query("select * from audit_report where audit_report_id = ?", $_POST["audit_report_id"]);
			$audit_report = $audit_report[0];

			$aps_area = query("select * from aps_area where area_id = ? and aps_id = ?", $audit_report["aps_area"], $audit_report["aps_id"]);
			$aps_area = $aps_area[0];
			$ae = create_trackid("AE");

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $audit_report["audit_plan"]);
			$audit_plan = $audit_plan[0];
			$Answers = [];
			$questions = query("select * from evaluation_questions");
			$i = 0;
			foreach($questions as $row):
				$Answers[$i] = $row;
				$Answers[$i]["rate"] = $_POST[$row["question_id"]];
				$i++;
			endforeach;
			$Answers = serialize($Answers);
			// dump($Answers);



			query("insert INTO audit_evaluation 
					(audit_evaluation_id, timestamp, user_id, audit_report_id, audit_evaluation_status, aps_area_id, evaluation_details, noted_by, audit_plan, comments) 
					VALUES(?,?,?,?,?,?,?,?,?,?)", 
					$ae,time(),$_POST["evaluated_by"], $_POST["audit_report_id"], "DONE", $aps_area["tblid"], $Answers, $audit_plan["created_by"],
					$audit_plan["audit_plan"], $_POST["comments"]
				);

			query("update audit_report set audit_evaluation_id = ? where audit_report_id = ?", $ae, $_POST["audit_report_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Checklist created successfully",
				"link" => "audit_evaluation?action=details&id=".$ae,
				];
				echo json_encode($res_arr); exit();

		
		elseif($_POST["action"] == "printEvaluation"):
			// dump($_POST);

			$audit_evaluation = query("select ae.*, concat(u.firstname, ' ', u.middlename, ' ', u.surname) as evaluated_by from audit_evaluation ae
										left join users u on u.id = ae.user_id
										where audit_evaluation_id = ?", $_POST["audit_evaluation_id"]);
			$audit_evaluation = $audit_evaluation[0];

			$audit_report = query("select ar.*, u.firstname, u.middlename, u.surname from audit_report ar left join users u
                                    on u.id = ar.user_id where audit_report_id = ?", $audit_evaluation["audit_report_id"]);
									$audit_report = $audit_report[0];
			$auditPlan = query("select ap.*, concat(u.firstname, ' ', u.middlename, ' ', u.surname) as evaluated_by from audit_plans ap left join users u
								on u.id = ap.created_by where ap.audit_plan = ?", $audit_evaluation["audit_plan"]);
								$auditPlan = $auditPlan[0];
			$aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where aps_id = ? and area_id = ?", $audit_report["aps_id"], $audit_report["aps_area"]);
			$aps_area = $aps_area[0];

			$aps_schedule = query("select aps.*, p.process_name from audit_plan_schedule aps
									left join process p on p.process_id = aps.process_id
									where aps_id = ?", $aps_area["aps_id"]);
			$aps_schedule = $aps_schedule[0];





// dump($aps_schedule);

			
			

		



					$mpdf = new \Mpdf\Mpdf([
						'mode' => 'utf-8',
						'format' => [215.9, 330.2], // 'A4-L' sets the orientation to landscape
						'debug' => true,
						'margin_top' => 4,
						'margin_left' => 15,
						'margin_right' => 15,
						'margin_bottom' => 2,
						'margin_footer' => 1,
						'default_font' => 'helvetica'
					]);

					$mpdf->SetHTMLHeader('

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<link rel="stylesheet" href="resources/footerStyles.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
					<div class="row">
						<div class="col-xs-7">
							<img src="resources/dnscHeader.png" 
							style="width:100%; height: auto; max-height: 90px;">
						</div>
						
					</div>
					');

					$mpdf->SetHTMLFooter('
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<link rel="stylesheet" href="resources/footerStyles.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
				
					<hr>
					
					<div id="myFooter">
							<div class="row">
							<div class="col-xs-4">
								<dl class="row">
									<dt class="col-xs-2"><b>Address</b></dt>
									<dd class="col-xs-7 text-left">Davao del Norte State College<br>Tadeco Road, New Visayas <br>Panabo City, Davao del Norte, 8105</dd>
								</dl>
							</div>
							<div class="col-xs-4">
								<dl class="row">
									<dt class="col-xs-2 text-left"><b>Website</b></dt>
									<dd class="col-xs-7 text-left">www.dnsc.edu.ph</dd>
									<dt class="col-xs-2 text-left"><b>Email</b></dt>
									<dd class="col-xs-7 text-left">president@dnsc.edu.ph</dd>
									<dt class="col-xs-2 text-left"><b>FB Page</b></dt>
									<dd class="col-xs-7 text-left">www.facebook.com/davnorstatecollege</dd>
								</dl>
							</div>

							<div class="col-xs-2 text-right">
								<img src="resources/footerimage.jpg" 
								style="width:100%;
								height: auto; max-height: 60px;">
							</div>
						</div>
					</div>
						');

					$html = "";

					$html .='

					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
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
					

		
					<h4 class="text-center"><b>Internal Audit Report</b></h4>

				<br>
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


					


								<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td width="10%" class="p-2 nw"><b>Name of Auditor: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_report["firstname"] . " " . $audit_report["middlename"] . " " . $audit_report["surname"].'</td>
                                                <td width="10%" class="p-2 nw"><b>IQA No: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_evaluation["audit_evaluation_id"].'</td>
                                            </tr>

									
                                        </table>

				

					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
                                                <td width="23%" class="p-2 nw"><b>Process / Area Audited: </b></td>
                                                <td width="31%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$aps_schedule["process_name"].'</td>
												<td width="50%"></td>
                                            </tr>
                                        </table>

					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
						<tr>
							<td width="10%" class="p-2 nw"><b>Date Audited: </b></td>
							<td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.date("F d, Y", $audit_evaluation["timestamp"]).'</td>
							<td width="50%"></td>
						</tr>
					</table>

					<br>
					<br>
					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td class="p-2 nw"><b>***Note: Rate the auditor with 4 being the highest and 1 being the lowest.</b></td>
                                       
                                            </tr>
                                        </table>

				
					<br>
					<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
                                          
											
											<tr>
												<td width="50%" style="text-align: center;"><b>Criteria</b></td>
												<td colspan="4" width="50%" style="text-align: center;"><b>Average Score : </b></td>
                                            </tr>
											<tr>
												<td style="text-align: left;"><b>Auditing Principle</b></td>
												<td style="text-align: center;"><b>1</b></td>
												<td style="text-align: center;"><b>2</b></td>
												<td style="text-align: center;"><b>3</b></td>
												<td style="text-align: center;"><b>4</b></td>
                                            </tr>											
											';

					$questions = unserialize($audit_evaluation["evaluation_details"]);

					foreach($questions as $row):

						$html.='
						<tr>
							<td><b>'.$row["question_title"].'</b></td>';
							$average_score = 0;
							for($i=1; $i<=4;$i++):
								$average_score += $row["rate"];
								if($i==$row["rate"]):
									$html.='<td class="text-center"><span style="font-size:25px;">&#9899;</span></td>';
								else:
									$html.='<td class="text-center"><span style="font-size:25px;">&#9898;</span></td>';
								endif;
							endfor;

							$html.='
						</tr>
						';

					endforeach;

					$html.='
											<tr>
												<td width="50%" style="text-align: center;"><b></b></td>
												<td colspan="4" width="50%" style="text-align: center;"><b>Average Score : '. (round($average_score/4)) .'</b></td>
                                            </tr>
											
                                        </table>
					

								
					<br>

		
					
					<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td width="30%" class="p-2 nw"><b>Definition</b></td>
												<td width="1%" class="p-2 nw"><b></b></td>
												<td width="69%" class="p-2 nw"><b></b></td>
                                            </tr>';

					foreach($questions as $row):
						$html.='<tr>';
						$html.='<td style="padding-bottom: 15px;"><b>'.$row["question_title"].'</b></td>';
						$html.='<td>-</b></td>';
						$html.='<td><b>'.$row["question_desc"].'</b></td>';
						$html.='</tr>';
					endforeach;

											$html.='
										
                                        </table>
<br>
<br>
									
			<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td class="p-2 nw"><b>Comments on the Conducted Internal Audit:</b></td>
                                            </tr>
                                        </table>

										<table class="tbl2" style="font-size: 12px; padding-top: 15px;">
											<tr style="height: 100px;">
												<td style="height: 100px; text-align: justify; vertical-align: top;"><p style="font-size:11px;">'.$audit_evaluation["comments"].'</p></td>
											</tr>
                                        </table>


							<br>
							<br>
										<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td class="p-2 nw" width="70%">
												<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr style="height: 50px;">
												<td width="45%" style="height: 50px; vertical-align: top;" class="p-2 nw">
													<b>Evaluation by: </b>
												</td>
												<td style="height: 50px; vertical-align: top;"></td>
												<td width="45%" style="height: 50px; vertical-align: top;" class="p-2 nw">
													<b>Reviewed by: </b>
												</td>
                                                
                                                
                                            </tr>

											<tr>
												<td class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_evaluation["evaluated_by"].'</td>
												<td></td>
												<td class="p-2 nw" style="border-bottom: 1px solid black;">'.$auditPlan["evaluated_by"].'</td>
											</tr>
											<tr>
												<td><b>Auditee<b/></td>
												<td></td>
												<td><b>Internal Lead Auditor</b></td>
											</tr>
                                        </table>
												</td>

                                       
                                            </tr>
                                        </table>



					';
					
					

					$mpdf->WriteHTML($html);

					

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
			render("public/audit_checklist_system/audit_checklist_list.php",[
			]);
		else:
			if($_GET["action"] == "process_owners_pending"):
				render("public/audit_evaluation_system/audit_evaluation_list_process_owners_pending.php",[
				]);
			elseif($_GET["action"] == "process_owners_done"):
				render("public/audit_evaluation_system/audit_evaluation_list_process_owners_done.php",[
				]);
			elseif($_GET["action"] == "create"):
				render("public/audit_evaluation_system/createAuditEvaluation.php",[
				]);
			elseif($_GET["action"] == "details"):
				render("public/audit_evaluation_system/audit_evaluation_details.php",[
				]);
			endif;

		endif;

			
	}
?>
