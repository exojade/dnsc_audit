<?php

// phpinfo();
// dump($_SESSION);
// require("includes/google_class.php"); 

// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
//     // $mail->isSMTP();                                            // Set mailer to use SMTP
//     // $mail->Host       = 'panabocity.gov.ph';                            // Specify main and backup SMTP servers
//     // $mail->Port       = 25;                                   // TCP port to connect to

//     //Recipients
//     // $mail->setFrom('bpls@panabocity.gov.ph', 'Mailer');
//        // Add a recipient
//     // $mail->addReplyTo('your_email@example.com', 'Information');

//     // Content
    


// 	// $mail->SMTPDebug = 2; // Enable verbose debug output
//     $mail->isSMTP();
// 	$mail->SMTPAuth = true;
// 	$mail->SMTPSecure = "ssl";
// 	$mail->Host = "panabocity.gov.ph";
// 	$mail->Port = "465";

// 	$mail->SMTPOptions = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//         )
//     );

// 	$mail->isHTML();
// 	$mail->Username = "bpls@panabocity.gov.ph";
// 	$mail->Password = "itoffice.panabo";
// 	$mail->SetFrom("no-reply@panabocity.gov.ph");
// 	$mail->Subject = "Online Appointment System - Business One Stop Shop";
// 	$mail->Body = "awit";
// 	$mail->AddAddress("tradebryant@gmail.com");
// 	$mail->addAttachment('resources/background.jpg');
// 	$mail->Send();




//     // $mail->send();
//     // echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }






use Google\Client;
use Google\Service\Calendar;
// $google->setAccessToken($_SESSION["dnsc_audit"]['accessToken']);
// $service = new Google_Service_Drive($google);
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
		// dump($role);
		if($role == "admin" || $role == "DOCTOR"){
			render("public/dashboard_system/dashboard_admin.php",[]);
		}
		else if($role == "CLIENT"){
			render("public/dashboard_system/dashboard_client.php",[]);
		}
	}
?>
