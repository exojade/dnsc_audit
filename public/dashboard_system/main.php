<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "getAnnouncements"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			$orderBy = ' order by announcement_id desc';
			$where = " where 1=1";
			$data = query("select * from announcements");
			$all_data = $data;
			$data = query("select * from announcements $where $orderBy $limitString $offsetString ");
			$i = 0;
			// dump(count($data));

			$users = query("select id,concat(firstname, ' ', middlename, ' ', surname) as fullname, img from users");
			$Users = [];
			foreach($users as $row):
				$Users[$row["id"]] = $row;
			endforeach;


			foreach($data as $row):

				// if(count($data) == ($i + 1))
				$theUL = "";
				// if($i == 0):
				// 	$theUL = '<div class="timeline">';
				// endif;
				$data[$i]["announcementText"] = $theUL;
				$data[$i]["announcementText"] .= 
				'
		  <div class="card card-widget" >
		  <div class="card-header">
			<div class="user-block">
			  <img class="img-circle" src="'.$Users[$row["sender"]]["img"].'" alt="User Image">
			  <span class="username"><a href="#">'.$Users[$row["sender"]]["fullname"].'</a></span>
			  <span class="description">'.date('F d, Y h:i a', $row["timestamp"]).'</span>
			</div>
		  </div>
		  <div class="card-body">'.$row["announcement"].'</div>
		</div>
	
					
				';
		// 		$endUL = "";
		// 		if(count($data) == ($i)):
		// 			$endUL = '    
		// 			<div>
		//     <i class="fas fa-clock bg-gray"></i>
		//   </div>
		// 			</div>
		// 			';
		// 		endif;
		// 		$data[$i]["announcementText"] .= $endUL;
				$i++;
			endforeach;
			$json_data = array(
				"draw" => $draw + 1,
				"iTotalRecords" => count($all_data),
				"iTotalDisplayRecords" => count($all_data),
				"aaData" => $data
			);
			echo json_encode($json_data);
		elseif($_POST["action"] == "addAnnouncement"):
			// dump($_POST);
			query("insert INTO announcements (
				announcement,
				sender,
				timestamp
				) 
			VALUES(?,?,?)", 
			$_POST["announcement"],
			$_POST["from_sender"],
			time()
		);

		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Saved Successfully",
			"link" => "refresh",
			// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
			];
			echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "getAuditPlanSchedules"):
			$schedule_date = query("SELECT 
    aps.audit_plan,
    CONCAT(ap.type, '-', ap.year) as event_title,
    MIN(schedule_date) AS start_date,
    MAX(schedule_date) AS end_date
FROM 
    audit_plan_schedule aps
    LEFT JOIN audit_plans ap
    ON ap.audit_plan = aps.audit_plan
GROUP BY 
    audit_plan");
	// dump($schedule_date);
	echo json_encode($schedule_date);	


		endif;



	
    }
	else {
		render("public/dashboard_system/dashboard_admin.php",[]);
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


		// $role = $_SESSION["dnsc_audit"]["role"];
		// switch ($role) {
		// 	case 1:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 2:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 3:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 4:
		// 		render("public/dashboard_system/dashboard_leadAuditor.php",[]);
		// 		break;
		// 	case 5:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 6:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 7:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	case 8:
		// 		render("public/dashboard_system/dashboard_admin.php",[]);
		// 		break;
		// 	default:
		// 		echo "Invalid day entered.";
		// }
		
		// if($role == "admin" || $role == "DOCTOR"){
		// 	render("public/dashboard_system/dashboard_admin.php",[]);
		// }
		// else if($role == "CLIENT"){
		// 	render("public/dashboard_system/dashboard_client.php",[]);
		// }
	}
?>
