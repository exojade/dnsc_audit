<?php
    require("includes/google_class.php"); 
  //  dump("awit");
    if(!isset($_GET['code'])){
		// dump($_GET);
        header('Location: '.$google->createAuthUrl());
        exit;
    }
    if(isset($_GET['code'])){
    //  dump($google->authenticate($_GET['code']));
		  $accessToken = $google->authenticate($_GET['code']);
      $google->setAccessToken($accessToken);

      // $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      // $client->setAccessToken($token['access_token']);

      // Get user info
      $service = new Google_Service_Oauth2($google);
      $userInfo = $service->userinfo->get();

      $users = query("select * from users where username = ?",  $userInfo->getEmail());
      if(empty($users)):

        $userid = create_trackid("USR-");

          query("insert INTO users (userid, username, password, role, fullname) 
            VALUES(?,?,?,?,?)", 
            $userid, $userInfo->getEmail() ,$userInfo->getEmail(), "CLIENT", $userInfo->getName());

          query("insert INTO client (clientId, clientType, clientStatus) 
            VALUES(?,?,?)", 
            $userid, "ONLINE" ,"FOR UPDATE");

       
            $users = query("select * from users where userid = ?", $userid);
            $_SESSION["dnsc_audit"] = [
              "userid" => $users[0]["userid"],
              "uname" => $users[0]["username"],
              "role" => $users[0]["role"],
              "fillprofile" => "NOT DONE",
              "fullname" => $users[0]["fullname"],
              "profile_image" => "",
              "application" => "dnsc_audit"
            ];
            $_SESSION["dnsc_audit"]['accessToken'] = $accessToken;
            
        


        // query


        // query();


        // dump("WALA KA NAREHISTRO");
      else:
       
        $client = query("select * from client where clientId = ?", $users[0]["userid"]);
        //  dump($client);
        if($client[0]["clientStatus"] == "FOR UPDATE"):
          $_SESSION["dnsc_audit"] = [
            "userid" => $users[0]["userid"],
            "uname" => $users[0]["username"],
            "role" => $users[0]["role"],
            "fillprofile" => "NOT DONE",
            "fullname" => $users[0]["fullname"],
            "profile_image" => "",
            "application" => "dnsc_audit"
          ];
          $_SESSION["dnsc_audit"]['accessToken'] = $accessToken;

        else:
          $_SESSION["dnsc_audit"] = [
            "userid" => $users[0]["userid"],
            "uname" => $users[0]["username"],
            "role" => $users[0]["role"],
            "fillprofile" => "DONE",
            "fullname" => $users[0]["fullname"],
            "profile_image" => "",
            "application" => "dnsc_audit"
          ];
          $_SESSION["dnsc_audit"]['accessToken'] = $accessToken;
        endif;
        // $google->setAccessToken($_SESSION["dnsc_audit"]['accessToken']);
        // $_SESSION["dnsc_audit"]['accessToken'] = $google->authenticate($_GET['code']);
      endif;

     
      redirect("index");
 

      // $_SESSION["dnsc_audit"]["user"] = $userInfo->getEmail();
      // $name = $userInfo->getName();


     
		// redirect($_SESSION["pathers"]);
		// echo("i meant this");
		// redirect("index");
    }



?>