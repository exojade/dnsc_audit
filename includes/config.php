<?php
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("constants.php");
    require("functions.php");
    require ('./vendor/autoload.php');
	
	date_default_timezone_set('Asia/Manila');
	
    session_start();


    $site_options = query("select * from siteoptions");
    $site_options = $site_options[0];

    define("clientID", $site_options["google_clientID"]);
    define("clientSecret", $site_options["google_clientSecret"]);

    $scopes = array('https://www.googleapis.com/auth/calendar.events', // Google Calendar Events API scope
    'https://www.googleapis.com/auth/calendar', // Google Calendar API scope
        // Read-only access to Google Meet API
    'https://www.googleapis.com/auth/meetings',
    );

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

        // Get the host (domain or IP address)
        $host = $_SERVER['HTTP_HOST'];

        // Get the port (if it's not the default port 80 for http or 443 for https)
        $port = $_SERVER['SERVER_PORT'];
        $port_suffix = ($port != 80 && $port != 443) ? ":" . $port : "";

        // Get the requested URI
        $uri = $_SERVER['REQUEST_URI'];

        // Combine the parts to form the complete URL
        $urlWithPort = $protocol . "://" . $host;

        // Output the result
        // dump($urlWithPort);


        define("redirectUri", $urlWithPort . "/dnsc_audit/google_login");
        // dump(redirectUri);
    
    $google = new Google_Client();
    // dump($google);
    // 
    $google->setClientId(clientID);
    $google->setClientSecret(clientSecret);
    $google->setRedirectUri(redirectUri);
    
    $google->setScopes($scopes);
    $google->setAccessType('offline');
    $google->addScope('email');
    $google->addScope('profile');




    if(isset($_SESSION["dnsc_audit"])){

        


        


        // // $clientID = '538691118774-50b5ak993tc510dlrmoishso1pi8qv2q.apps.googleusercontent.com';
        // // $clientSecret = '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';
        // // $redirectUri = 'http://hrmis-systems.com:7000/hrmis_system/google_login';
        // $scopes = array('https://www.googleapis.com/auth/calendar.events', // Google Calendar Events API scope
        // 'https://www.googleapis.com/auth/calendar', // Google Calendar API scope
        //  // Read-only access to Google Meet API
        // 'https://www.googleapis.com/auth/meetings',
        // );
        
        // $google = new Google_Client();
        
        // $google->setClientId(clientID);
        // $google->setClientSecret(clientSecret);
        // $google->setRedirectUri(redirectUri);
       
        // $google->setScopes($scopes);
        // $google->setAccessType('offline');
        // dump($google);
    }
	
   
	
?>