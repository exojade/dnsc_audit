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
		$countering = array("login", "register", "verify");
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

			


				else if ($request == 'settings')
					require 'public/settings_system/settings.php';

				

				else if ($request == 'logout'){
				require 'logout.php';
			}
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
