<?php

// $auditPlan = [];
// $auditPlan["header"] = "resources/auditPlanHeader.png";
// $auditPlan["footer"] = "resources/auditPlanFooter.png";
// $auditPlan["form_number"] = "FM-DNSC-IQA-02";
// $auditPlan["issue_status"] = "05";
// $auditPlan["revision_number"] = "06";
// $auditPlan["effective_date"] = "02 January 2025";
// $auditPlan["approved_by"] = "President";
// $auditPlan = serialize($auditPlan);




// $audit_report = [];
// $audit_report["header"] = "resources/portraitHeader.png";
// $audit_report["footer"] = "resources/portaitFooter.png";
// $audit_report["form_number"] = "FM-DNSC-IQA-04";
// $audit_report["issue_status"] = "06";
// $audit_report["revision_number"] = "08";
// $audit_report["effective_date"] = "02 January 2025";
// $audit_report["approved_by"] = "President";
// $audit_report = serialize($audit_report);


// $audit_checklist = [];
// $audit_checklist["header"] = "resources/portraitHeader.png";
// $audit_checklist["footer"] = "resources/portaitFooter.png";
// $audit_checklist["form_number"] = "FM-DNSC-IQA-03";
// $audit_checklist["issue_status"] = "05";
// $audit_checklist["revision_number"] = "05";
// $audit_checklist["effective_date"] = "02 January 2025";
// $audit_checklist["approved_by"] = "President";
// $audit_checklist = serialize($audit_checklist);

// $audit_evaluation = [];
// $audit_evaluation["header"] = "resources/portraitHeader.png";
// $audit_evaluation["footer"] = "resources/portaitFooter.png";
// $audit_evaluation["form_number"] = "FM-DNSC-IQA-06";
// $audit_evaluation["issue_status"] = "05";
// $audit_evaluation["revision_number"] = "05";
// $audit_evaluation["effective_date"] = "02 January 2025";
// $audit_evaluation["approved_by"] = "President";
// $audit_evaluation = serialize($audit_evaluation);

// if (query("insert INTO utility_settings 
// 					(audit_plan, audit_report, audit_checklist, audit_evaluation) 
// 			  VALUES(?,?,?,?)", 
// 				$auditPlan, $audit_report, $audit_checklist, $audit_evaluation) === false)
// 				{
// 					$res_arr = [
// 						"result" => "failed",
// 						"title" => "Failed",
// 						"message" => "User already Registered",
// 						"link" => "auditPlan?action=auditorDetails&id=".$aps_area["audit_plan"],
// 						];
// 						echo json_encode($res_arr); exit();
// 				}

// 				exit();


// query("delete from utility_settings");
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump($_SESSION);
		if($_POST["action"] == "update_audit_plan_settings"):
			// dump($_POST);

			$settings = query("select * from utility_settings");
			$audit_plan = unserialize($settings[0]["audit_plan"]);

		
			$audit_plan["form_number"] = $_POST["form_number"];
			$audit_plan["issue_status"] = $_POST["issue_status"];
			$audit_plan["revision_number"] = $_POST["revision_number"];
			$audit_plan["effective_date"] = $_POST["effective_date"];
			$audit_plan["approved_by"] = $_POST["approved_by"];





				if($_FILES["header"]["size"] != 0){
					$target_pdf = "resources/";
					$target = $target_pdf . $_FILES['header']['name'];
					if(!move_uploaded_file($_FILES['header']['tmp_name'], $target)){
						echo("FAMILY Do not have upload files");
						exit();
					}
					$audit_plan["header"] = $target;
				}

				if($_FILES["footer"]["size"] != 0){
					$target_pdf = "resources/";
					$target = $target_pdf . $_FILES['footer']['name'];
					if(!move_uploaded_file($_FILES['footer']['tmp_name'], $target)){
						echo("FAMILY Do not have upload files");
						exit();
					}
					$audit_plan["footer"] = $target;
				}

				$audit_plan = serialize($audit_plan);

				query("update utility_settings set audit_plan = ?", $audit_plan);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating data",
				"link" => "settings",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

			elseif($_POST["action"] == "update_audit_report_settings"):
					// dump($_POST);
		
					$settings = query("select * from utility_settings");
					$audit_report = unserialize($settings[0]["audit_report"]);
		
				
					$audit_report["form_number"] = $_POST["form_number"];
					$audit_report["issue_status"] = $_POST["issue_status"];
					$audit_report["revision_number"] = $_POST["revision_number"];
					$audit_report["effective_date"] = $_POST["effective_date"];
					$audit_report["approved_by"] = $_POST["approved_by"];
		
		
		
		
		
						if($_FILES["header"]["size"] != 0){
							$target_pdf = "resources/";
							$target = $target_pdf . $_FILES['header']['name'];
							if(!move_uploaded_file($_FILES['header']['tmp_name'], $target)){
								echo("FAMILY Do not have upload files");
								exit();
							}
							$audit_report["header"] = $target;
						}
		
						if($_FILES["footer"]["size"] != 0){
							$target_pdf = "resources/";
							$target = $target_pdf . $_FILES['footer']['name'];
							if(!move_uploaded_file($_FILES['footer']['tmp_name'], $target)){
								echo("FAMILY Do not have upload files");
								exit();
							}
							$audit_report["footer"] = $target;
						}
		
						$audit_report = serialize($audit_report);
		
						query("update utility_settings set audit_report = ?", $audit_report);
		
					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"message" => "Success on updating data",
						"link" => "settings",
						// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
						];
						echo json_encode($res_arr); exit();


			elseif($_POST["action"] == "update_audit_checklist_settings"):
				// dump($_POST);
	
				$settings = query("select * from utility_settings");
				$audit_checklist = unserialize($settings[0]["audit_checklist"]);
	
			
				$audit_checklist["form_number"] = $_POST["ac_form_number"];
				$audit_checklist["issue_status"] = $_POST["ac_issue_status"];
				$audit_checklist["revision_number"] = $_POST["ac_revision_number"];
				$audit_checklist["effective_date"] = $_POST["ac_effective_date"];
				$audit_checklist["approved_by"] = $_POST["ac_approved_by"];


				$audit_report["form_number"] = $_POST["ar_form_number"];
				$audit_report["issue_status"] = $_POST["ar_issue_status"];
				$audit_report["revision_number"] = $_POST["ar_revision_number"];
				$audit_report["effective_date"] = $_POST["ar_effective_date"];
				$audit_report["approved_by"] = $_POST["ar_approved_by"];


				$audit_evaluation["form_number"] = $_POST["ae_form_number"];
				$audit_evaluation["issue_status"] = $_POST["ae_issue_status"];
				$audit_evaluation["revision_number"] = $_POST["ae_revision_number"];
				$audit_evaluation["effective_date"] = $_POST["ae_effective_date"];
				$audit_evaluation["approved_by"] = $_POST["ae_approved_by"];
	
	
	
	
	
					if($_FILES["header"]["size"] != 0){
						$target_pdf = "resources/";
						$target = $target_pdf . $_FILES['header']['name'];
						if(!move_uploaded_file($_FILES['header']['tmp_name'], $target)){
							echo("FAMILY Do not have upload files");
							exit();
						}
						$audit_checklist["header"] = $target;
						$audit_report["header"] = $target;
						$audit_evaluation["header"] = $target;
					}
	
					if($_FILES["footer"]["size"] != 0){
						$target_pdf = "resources/";
						$target = $target_pdf . $_FILES['footer']['name'];
						if(!move_uploaded_file($_FILES['footer']['tmp_name'], $target)){
							echo("FAMILY Do not have upload files");
							exit();
						}
						$audit_checklist["footer"] = $target;
						$audit_report["footer"] = $target;
						$audit_evaluation["footer"] = $target;
					}
	
					$audit_checklist = serialize($audit_checklist);
					// dump($audit_report);
					$audit_report = serialize($audit_report);
					
					$audit_evaluation = serialize($audit_evaluation);
	
					query("update utility_settings set audit_checklist = ?, audit_report = ?, audit_evaluation = ?", 
								$audit_checklist, $audit_report, $audit_evaluation);
	
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on updating data",
					"link" => "settings",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();


				elseif($_POST["action"] == "update_audit_evaluation_settings"):
						// dump($_POST);
			
						$settings = query("select * from utility_settings");
						$audit_evaluation = unserialize($settings[0]["audit_evaluation"]);
			
					
						$audit_evaluation["form_number"] = $_POST["form_number"];
						$audit_evaluation["issue_status"] = $_POST["issue_status"];
						$audit_evaluation["revision_number"] = $_POST["revision_number"];
						$audit_evaluation["effective_date"] = $_POST["effective_date"];
						$audit_evaluation["approved_by"] = $_POST["approved_by"];
			
			
			
			
			
							if($_FILES["header"]["size"] != 0){
								$target_pdf = "resources/";
								$target = $target_pdf . $_FILES['header']['name'];
								if(!move_uploaded_file($_FILES['header']['tmp_name'], $target)){
									echo("FAMILY Do not have upload files");
									exit();
								}
								$audit_evaluation["header"] = $target;
							}
			
							if($_FILES["footer"]["size"] != 0){
								$target_pdf = "resources/";
								$target = $target_pdf . $_FILES['footer']['name'];
								if(!move_uploaded_file($_FILES['footer']['tmp_name'], $target)){
									echo("FAMILY Do not have upload files");
									exit();
								}
								$audit_evaluation["footer"] = $target;
							}
			
							$audit_evaluation = serialize($audit_evaluation);
			
							query("update utility_settings set audit_evaluation = ?", $audit_evaluation);
			
						$res_arr = [
							"result" => "success",
							"title" => "Success",
							"message" => "Success on updating data",
							"link" => "settings",
							// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
							];
							echo json_encode($res_arr); exit();



				
		endif;
    }
	else {
		if(!isset($_GET["action"])):
			render("public/settings_system/settingsForm.php",[]);
		endif;
	}
?>
