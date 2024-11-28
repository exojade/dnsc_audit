<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {

		

	
    }
	else {
		
		// if(isset($_SESSION["dnsc_audit"]["accessToken"])):
		// 	// dump($google);
		// 	// $client = new Client();
		// 	// $client->addScope(Calendar::CALENDAR_EVENTS);
		// 	// $client->setAccessType('offline'); // Enables the refresh token
		// 	$google->setAccessToken($_SESSION["dnsc_geoanlytics"]['accessToken']['access_token']);
		// 	$service = new Calendar($google);
		// 	$events = $service->events->listEvents('primary');
		// 	try {
		// 		// Retrieve the list of meetings (Google Calendar events)
		// 		$events = $service->events->listEvents('primary', ['q' => 'meet.google.com']);
		// 		// Process the list of events
		// 		foreach ($events as $event) {
		// 			// Print or process each event
		// 			dump( 'Event ID: ' . $event->getId() . '<br>');
		// 			echo 'Summary: ' . $event->getSummary() . '<br>';
		// 			// Add more details as needed
		// 		}
		// 	} catch (Exception $e) {
		// 		dump('An error occurred: ' . $e->getMessage());
		// 	}
		// 	// dump($service);
		// endif;


		$role = $_SESSION["dnsc_audit"]["role"];
		switch ($role) {
			case 1:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 2:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 3:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 4:
				render("public/dashboard_system/dashboard_leadAuditor.php",[]);
				break;
			case 5:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 6:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 7:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			case 8:
				render("public/dashboard_system/dashboard_admin.php",[]);
				break;
			default:
				echo "Invalid day entered.";
		}
		
		if($role == "admin" || $role == "DOCTOR"){
			render("public/dashboard_system/dashboard_admin.php",[]);
		}
		else if($role == "CLIENT"){
			render("public/dashboard_system/dashboard_client.php",[]);
		}
	}
?>
