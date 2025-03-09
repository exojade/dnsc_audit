<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "consolidated_ar_list"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;

				$where = " where 1=1";
				$baseQuery = "select car.*, ap.type, ap.year, ap.status as ap_status from consolidated_audit_report car left join 
								audit_plans ap on ap.audit_plan = car.audit_plan" . $where;

		

				

				$data = query($baseQuery . " order by car.timestamp desc " . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["cons_report"] = '<a href="#" data-id="'.$row["cons_audit_report_id"].'" data-toggle="modal" data-target="#modalConsAuditReportDetails" class="btn btn-block btn-sm btn-success">Details</a>';
					$data[$i]["date_created"] = date("F d, Y", $row["timestamp"]);
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "modalConsAuditReportDetails"):
			// dump($_POST);

			$consolidated_audit_report = query("select car.*, ap.type, ap.year, concat(u.firstname, ' ', u.middlename, ' ', u.surname) as created_by 
												from consolidated_audit_report car
												left join audit_plans ap on ap.audit_plan = car.audit_plan
												left join users u on u.id = car.created_by
												where car.cons_audit_report_id = ?", $_POST["cons_audit_report_id"]);
												$consolidated_audit_report = $consolidated_audit_report[0];
			$html = '
			
			<dl class="row">
                  <dt class="col-sm-4">Audit Plan</dt>
                  <dd class="col-sm-8">'.$consolidated_audit_report["type"] . ' - ' . $consolidated_audit_report["year"] .'</dd>
				  <dt class="col-sm-4">Consolidated Audit Report</dt>
                  <dd class="col-sm-8">'.$consolidated_audit_report["title"].'</dd>
				  <dt class="col-sm-4">Comments</dt>
                  <dd class="col-sm-8">'.$consolidated_audit_report["comments"].'</dd>
                  <dt class="col-sm-4">Date Created</dt>
                  <dd class="col-sm-8">'.date('F d, Y', $consolidated_audit_report["timestamp"] ).'</dd>
				  <dt class="col-sm-4">Created By</dt>
				  <dd class="col-sm-8">'.$consolidated_audit_report["created_by"].'</dd>
                </dl>
			<hr>
			<a class="btn btn-primary" target="_blank" href="'.$consolidated_audit_report["fileUrl"].'">Download File</a>
			';

			echo($html);




		elseif($_POST["action"] == "newConsolidated_ar"):
			// dump($_POST);

			$cons_ar_id = create_trackid("CONSAR");
			// $_FILES["fileUpload"]
				// $i = 0;
			$target = "file_manager/consolidated_reports/".$_FILES["fileUpload"]["name"];
			if(!move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			if (query("insert INTO consolidated_audit_report 
				(cons_audit_report_id,created_by,timestamp,fileUrl,report_status,audit_plan,title, comments) 
				VALUES(?,?,?,?,?,?,?,?)", 
				$cons_ar_id,$_SESSION["dnsc_audit"]["userid"],time(),$target,"DONE", $_POST["audit_plan"], $_POST["report_title"], $_POST["comments"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}

			query("update audit_plans set cons_audit_report_id = ? where audit_plan = ?" , $cons_ar_id, $_POST["audit_plan"]);

			$audit_plan = query("select * from audit_plans where audit_plan = ?", $_POST["audit_plan"]);
			$audit_plan = $audit_plan[0];


			$users = query("select * from users where role_id in (5,1)");
			foreach($users as $row):
				$Message["message"] = $_SESSION["dnsc_audit"]["fullname"] . " submitted Consolidated Audit Report under Audit Plan : " . $audit_plan["type"] . " - " . $audit_plan["year"];
				$Message["link"] = "consolidated_ar";
				$theMessage = serialize($Message);
				addNotification($row["id"],$theMessage, $_SESSION["dnsc_audit"]["userid"]);
			endforeach;


			
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success",
					"link" => "refresh",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();


			
		endif;
		
    }
	else {


			// $users = query("select * from users");
			if(!isset($_GET["action"])):
				render("public/consolidated_ar_system/consolidated_ar_list.php",[
				]);
			endif;
			
	}
?>
