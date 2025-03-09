<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "audit_checklist_datatable"):
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
						group by aps.audit_plan
					";
					$audit_plans = query($audit_plans);

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
					$data[$i]["action"] = '<a href="audit_checklist?action=myChecklist&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
					

					$data[$i]["create_count"] = 0;
						$data[$i]["pending_count"] = 0;
						$data[$i]["done_count"] = 0;
					if(isset($thePlans[$row["audit_plan"]])):
						$data[$i]["create_count"] = $thePlans[$row["audit_plan"]]["create_count"];
						$data[$i]["pending_count"] = $thePlans[$row["audit_plan"]]["pending_count"];
						$data[$i]["done_count"] = $thePlans[$row["audit_plan"]]["done_count"];
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

		elseif($_POST["action"] == "updateChecklist"):
			// dump($_POST);

			query("update audit_checklist set audit_trail = ?, comply = ?, remarks = ? where audit_checklist_id = ?" ,$_POST["audit_trail"], $_POST["comply"],
					$_POST["remarks"], $_POST["audit_checklist_id"]);

		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Checklist updated successfully",
			"link" => "refresh",
			];
			echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "audit_plan_checklist_datatable"):
			// dump($_POST);

			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

			$myTeam = query("SELECT team_id FROM audit_plan_team_members 
					WHERE audit_plan = ? AND id = ? 
					GROUP BY team_id", 
					$_POST["interal_audit_id"], $_SESSION["dnsc_audit"]["userid"]);
			$teamIds = array_column($myTeam, "team_id");
			// dump($myTeam);

			$myTeam = "'" . implode("','", $teamIds) . "'";
			$data = query("
					SELECT 
						aps.*,
						p.*,
						aa.*,
						ar.audit_checklist_id,
						ar.timestamp,
						a.area_name,
						COALESCE(ar.audit_checklist_status, 'CREATE') AS audit_checklist_status
					FROM 
						audit_plan_schedule aps
					LEFT JOIN 
						process p ON p.process_id = aps.process_id
					LEFT JOIN 
						aps_area aa ON aa.aps_id = aps.aps_id
					LEFT JOIN 
						areas a ON a.id = aa.area_id
					LEFT JOIN 
						audit_checklist ar ON ar.aps_area = aa.area_id
					WHERE 
						aps.team_id IN ($myTeam)
				");


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
					// dump($row);


					if($row["audit_checklist_id"] != ""):
						if($row["audit_checklist_status"] == "DONE"):
							$data[$i]["action"] = '
						

								<div class="btn-block btn-group">
										<a href="audit_checklist?action=details&id='.$row["audit_checklist_id"].'" class="btn btn-success btn-sm" ><i class="fa fa-eye"></i></a>
										<a target="_blank" href="evidence?action=myEvidence&root='.$row["area_id"].'" class="btn btn-danger btn-sm" ><i class="fa fa-folder"></i></a>
									</div>
							
							';
						else:
							$data[$i]["action"] = '
									<div class="btn-block btn-group">
										<a href="audit_checklist?action=update&id='.$row["audit_checklist_id"].'" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
										<a target="_blank" href="evidence?action=myEvidence&root='.$row["area_id"].'" class="btn btn-danger btn-sm" ><i class="fa fa-folder"></i></a>
									</div>
							
							';
						endif;
					else:
						$data[$i]["action"] = '
						<div class="btn-block btn-group">
									<a href="audit_checklist?action=create&aps_area_id='.$row["tblid"].'" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i></a>
									<a target="_blank" href="evidence?action=myEvidence&root='.$row["area_id"].'" class="btn btn-danger btn-sm" ><i class="fa fa-folder"></i></a>
								</div>
						
						';
					endif;
					
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

		elseif($_POST["action"] == "createChecklist"):
			// dump($_POST);

			$aps_area = query("select * from aps_area where tblid = ?", $_POST["aps_area_id"]);
			$aps_area = $aps_area[0];





			// dump($_POST);


		
			$ac_id = create_trackid("AC");
			

				query("insert INTO audit_checklist 
					(audit_checklist_id, audit_plan, aps_id, aps_area, timestamp, audit_trail, comply, remarks,user_id) 
			  VALUES(?,?,?,?,?,?,?,?,?)", 
				$ac_id, $aps_area["audit_plan"], $aps_area["aps_id"], $aps_area["area_id"], time(),
				$_POST["audit_trail"],$_POST["comply"], $_POST["remarks"], $_SESSION["dnsc_audit"]["userid"]);


				$users = query("select * from users where role_id = 4");
				foreach($users as $row):
					$Message = [];
					$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " created audit checklist and needs to be reviewed.";
					$Message["link"] = "audit_checklist_review?action=review&id=".$ac_id;
					$theMessage = serialize($Message);
					addNotification($row["id"], $theMessage, $_SESSION["dnsc_audit"]["userid"]);
				endforeach;



				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Checklist created successfully",
					"link" => "audit_checklist?action=update&id=".$ac_id,
					];
					echo json_encode($res_arr); exit();

		
		elseif($_POST["action"] == "print_audit_checklist"):
			// dump($_POST);


			$audit_checklist = query("select ac.*, concat(u.firstname, ' ' ,u.middlename, ' ', u.surname) as prepared_by,
									concat(u2.firstname, ' ' ,u2.middlename, ' ', u2.surname) as reviewed_by
									from audit_checklist ac 
									left join users u on u.id = ac.user_id 
									left join users u2 on u2.id = ac.reviewed_by
									where audit_checklist_id = ?", $_POST["audit_checklist_id"]);
			$audit_checklist = $audit_checklist[0];
			$aps_area = query("select * from aps_area aa
                          left join areas a on a.id = aa.area_id 
                          where aps_id = ? and area_id = ?", $audit_checklist["aps_id"], $audit_checklist["aps_area"]);
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
					

		
					<h4 class="text-center"><b>AUDIT CHECKLIST</b></h4>

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
												<td width="10%" class="p-2 nw"><b>Date of Audit: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.date("F d, Y", $audit_checklist["timestamp"]).'</td>
                                                <td width="10%" class="p-2 nw"><b>IAR No: </b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_checklist["audit_checklist_id"].'</td>
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
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_checklist["prepared_by"].'</td>
                                                <td width="10%" class="p-2 nw"><b>Auditee</b></td>
                                                <td width="40%" class="p-2 nw" style="border-bottom: 1px solid black;"></td>
                                            </tr>
                                        </table>
					<br>
					<br>
					<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
											<tr>
												<td width="40%" style="text-align: center;"><b>AUDIT TRAIL</b></td>
												<td width="10%" style="text-align: center;"><b>Comply (Y/N)</b></td>
												<td width="50%" style="text-align: center;"><b>AUDIT FINDINGS/NOTES/REMARKS (evidence)</b></td>
                                            </tr>

											<tr style="height: 580px;">
        <td style="height: 580px; text-align: justify; vertical-align: top;"><p style="font-size:11px;">'.$audit_checklist["audit_trail"].'</p></td>
        <td style="height: 580px; text-align: center; vertical-align: top;"><p style="font-size:11px;">'.$audit_checklist["comply"].'</p></td>
        <td style="height: 580px; text-align: justify; vertical-align: top;"><p style="font-size:11px;">'.$audit_checklist["remarks"].'</p></td>
    </tr>
                                        </table>
					

					
				

										<p style="font-size: 10px; margin:0px;margin-top:15px;"><b>**Reminder: This checklist is just a guide, you are free (and encouraged) to add more questions as you conduct the actual audit.
										<br>**Note to the auditor: Please ensure to check status of open corrective/preventive actions from previous internal audit(s). You have the option to close-out the open item if you find that the action(s) taken have been implemented or are effective already.
										<br>**Check the following:
										<br>The procedure is followed.
										<br>The forms are completely filled.
										<br>The records have complete signatures of concerned personnel.
										<br>The filing of records generated</b></p>
										<br>
										<table class="tbl2" style="font-size: 12px; padding-top: 10px;">
                                            <tr>
												<td class="p-2 nw" width="70%">
												<table class="tbl" style="font-size: 12px; padding-top: 10px;">
                                            <tr style="height: 50px;">
												<td width="45%" style="height: 50px; vertical-align: top;" class="p-2 nw">
													<b>Prepared by: </b>
												</td>
												<td style="height: 50px; vertical-align: top;"></td>
												<td width="45%" style="height: 50px; vertical-align: top;" class="p-2 nw">
													<b>Reviewed by: </b>
												</td>
                                                
                                                
                                            </tr>

											<tr>
												<td class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_checklist["prepared_by"].'</td>
												<td></td>
												<td class="p-2 nw" style="border-bottom: 1px solid black;">'.$audit_checklist["reviewed_by"].'</td>
											</tr>
                                        </table>
												</td>

												<td style="vertical-align: top;">

												<table class="tbl" style="font-size: 12px; ">
													<tr style="height: 50px;">
														<td class="p-2 nw" style="vertical-align: top; height: 50px;"><b>Date:</b></td>
													</tr>
													<tr>
														<td class="p-2 nw" style="border-bottom: 1px solid black;">'.date("F d, Y", $audit_checklist["timestamp"]).'</td>
													</tr>
												</table>


													
												</td>
                                       
                                            </tr>
                                        </table>



					';
					
					

					$mpdf->WriteHTML($html);

					

					$filename = "audit_checklist";
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

			if($_GET["action"] == "myChecklist"):
				render("public/audit_checklist_system/audit_plan_checklist.php",[
				]);
			elseif($_GET["action"] == "create"):
				render("public/audit_checklist_system/createChecklist.php",[
				]);

			elseif($_GET["action"] == "details"):
				render("public/audit_checklist_system/audit_checklist_details.php",[
				]);
			elseif($_GET["action"] == "update"):
				render("public/audit_checklist_system/audit_checklist_update.php",[
				]);
			endif;

		endif;

			
	}
?>
