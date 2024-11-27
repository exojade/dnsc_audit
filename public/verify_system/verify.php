<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
    }
    else
    {

        $request = explode('/',$_GET["path"]);
		$otp = $request[1];
        $otps = query("select * from otps where code = ?", $otp);
        $verify = "";
        $verify_message = "";
            
        if(!empty($otps)):
        // dump($otp);
            $user = query("select * from users where id = ?", $otps[0]["user_id"]);
            if($user[0]["verified"] == ""):
                query("update users set verified = ? where id = ?", date("Y-m-d"), $otps[0]["user_id"]);
                $verify = "success";
                $verify_message = "Account verified! You may now login to the application.";
            else:
                $verify = "";
                $verify_message = "";
            endif;

        endif;
       
        renderview("public/login_system/loginform.php", 
            ["title" => "Log In", 
              "verify" => $verify,
              "verify_message" => $verify_message
            
            ]
        
        );

    }
?>