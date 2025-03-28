<?php
    require("includes/config.php");
    require("includes/uuid.php");
    require("includes/checkhit.php");
	require("PHPMailer/PHPMailerAutoload.php");
	ini_set('max_execution_time', '300');
	
		$request = $_SERVER['REQUEST_URI'];
		$constants = get_defined_constants();
		$request = explode('/dnsc_audit',$request);
		// dump($request);
		$request = $request[1];
		$request = explode('?',$request);
		$request = $request[0];
		$request = explode('/',$request);
		$request = $request[1];
		// dump($request);
		$countering = array("login", "register", "verify", "survey_form");
		// dump($_SESSION);
		if (!in_array($request, $countering)){
			if(empty($_SESSION["dnsc_audit"]["userid"]) && empty($_SESSION["dnsc_audit"]["application"])){
				require 'public/login_system/login.php';
			}
			else{
				// dump($_SESSION);
				if($_SESSION["dnsc_audit"]["role"] == "CLIENT" && $_SESSION["dnsc_audit"]["fillprofile"] == "NOT DONE"):
					if($request != "logout"):
						require 'public/login_system/login.php';
					else:
						require 'logout.php';
					endif;
				else:
				if($request == 'index' || $request == '/' || $request== "")
				require 'public/dashboard_system/main.php';

				else if ($request == 'users')
					require 'public/users_system/users.php';
				else if ($request == 'position')
					require 'public/position_system/position.php';
				else if ($request == 'area')
					require 'public/area_system/area.php';
				else if ($request == 'process')
					require 'public/process_system/process.php';
				else if ($request == 'auditPlan')
					require 'public/auditPlan_system/auditPlan.php';
				else if ($request == 'survey')
					require 'public/survey_system/survey.php';
				else if ($request == 'survey_form')
					require 'public/survey_form_system/survey_form.php';
				
				
				else if ($request == 'audit_report')
					require 'public/audit_report_system/audit_report.php';

				else if ($request == 'audit_report_review')
					require 'public/audit_report_review_system/audit_report_review.php';
				else if ($request == 'audit_checklist_review')
					require 'public/audit_checklist_review_system/audit_checklist_review.php';

				else if ($request == 'notifications')
					require 'public/notifications_system/notifications.php';

				else if ($request == 'messages')
					require 'public/messages_system/messages.php';

				else if ($request == 'archives')
					require 'public/archives_system/archives.php';


				else if ($request == 'audit_checklist')
					require 'public/audit_checklist_system/audit_checklist.php';
				else if ($request == 'consolidated_ar')
					require 'public/consolidated_ar_system/consolidated_ar.php';
				else if ($request == 'evidence')
					require 'public/evidence_system/evidence.php';

				else if ($request == 'controlled_forms')
					require 'public/controlled_forms_system/controlled_forms.php';

				else if ($request == 'system_control')
					require 'public/system_control_system/system_control.php';
				else if ($request == 'quality_policy')
					require 'public/quality_policy_system/quality_policy.php';

				else if ($request == 'manuals')
					require 'public/manuals_system/manuals.php';

				else if ($request == 'mymanuals')
					require 'public/mymanuals_system/mymanuals.php';

				else if ($request == 'myProfile')
					require 'public/myProfile_system/myProfile.php';


				else if ($request == 'audit_evaluation')
					require 'public/audit_evaluation_system/audit_evaluation.php';
				else if ($request == 'settings')
					require 'public/settings_system/settings.php';
				else if ($request == 'logout')
					require 'logout.php';
			else
				require 'public/404_system/404.php';
			
				endif;



			}
		}
		else{
			if ($request == 'login')
				require 'public/login_system/login.php';
			
			else if ($request == 'register')
				require 'public/register_system/register.php';

			else if ($request == 'verify')
				require 'public/verify_system/verify.php';

			else if ($request == 'survey_form')
					require 'public/survey_form_system/survey_form.php';

			else if ($request == 'role')
				require 'public/login_system/role.php';

			else if ($request == 'print')
					require 'public/print_system/print.php';
			else if ($request == 'home')
					require 'public/static_system/index.php';
			else if ($request == 'newAppointment')
					require 'public/appointment_system/newAppointment.php';
			else if ($request == 'ourServices')
					require 'public/static_system/services.php';
			else if ($request == 'aboutUs')
					require 'public/static_system/aboutUs.php';
			else if ($request == 'contactUs')
					require 'public/static_system/contactUs.php';
					else if ($request == 'google_login')
					require 'public/google_login.php';


		}
?>
