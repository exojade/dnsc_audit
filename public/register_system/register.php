<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		// dump($_POST);

        if($_POST["action"] == "register"):
            // dump($_POST);
            // dump();
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["email_address"]);
        if (count($rows) == 1)
        {
            $row = $rows[0];
			if($row["verified"] == ""){
                $otp = query("select * from otps where user_id = ?", $row["id"]);
                $otp = $otp[0];
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success",
					"link" => "verify/".$row["code"],
					];
					echo json_encode($res_arr); exit();
			}
			else{

                // $the_otp = generate_uuid();
				$res_arr = [
					"result" => "failed",
					"title" => "Success",
					"message" => "This user has been already registered! Please login",
					// "link" => "otp?id=".$row["user_id"],
					];
					echo json_encode($res_arr); exit();
			}
		}
		else { 
        // $user_id = create_uuid("USR");   
            // dump($_FILES);
            
			if (query("insert INTO users 
						(
                            firstname, middlename, surname, suffix, username,
                            password, created_at, updated_at
                            ) 
                    VALUES(?,?,?,?,?,?,?,?)", 
                    $_POST["firstname"], $_POST["middlename"], $_POST["lastname"] , $_POST["suffix"],
					$_POST["email_address"], password_hash($_POST["password"], PASSWORD_DEFAULT), date("Y-m-d H:i:s"),
					date("Y-m-d H:i:s")) === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }


                $user_id = query("SELECT LAST_INSERT_ID() AS id");
                $user_id = $user_id[0]["id"];
                $target_pdf = "uploads/";
                $target = "";
                if($_FILES["profileImage"]["size"] != 0){
                    $path_parts = pathinfo($_FILES["profileImage"]["name"]);
                    $extension = $path_parts['extension'];
                    $target = $target_pdf . $user_id . "." . $extension;
                        if(!move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
                            echo("FAMILY Do not have upload files");
                            exit();
                        }
                    query("update users set img = ? where id = ?", $target, $user_id);
                }

                $the_otp = generate_uuid();
                if (query("insert INTO otps 
						(user_id, code, created, expiration) 
                    VALUES(?,?,?,?)", 
                    $user_id, $the_otp, time(), time()+300) === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }

                    $message = "<html><body>";
                    $message .= "<a href='".base_url() . "/verify" . "/" . $the_otp."'>".base_url() . "/verify" . "/" . $the_otp . "</a>";
                    $message .= "</body></html>";
						$mail = new PHPMailer();
						try {
							$mail->isSMTP();
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = "ssl";
							$mail->Host = "smtp.gmail.com";
							$mail->Port = "465";
							$mail->isHTML();
							$mail->Username = "bosspanabo2020@gmail.com";
							$mail->Password = "uxjwfplwregzmccz";
							$mail->SetFrom("no-reply@panabocity.gov.ph");
							$mail->Subject = "Verify Account";
							$mail->Body = $message;
							$mail->AddAddress($_POST["email_address"]);
							$mail->Send();



                            




                            // $mail->SMTPDebug = 4;
						    // $mail->Debugoutput = 'html';
							// $mail->isSMTP();
							// $mail->SMTPAuth = false;
							// $mail->SMTPSecure = "ssl";
							// $mail->Host = "smtp.hostinger.com";
							// $mail->Port = "465";
							// $mail->isHTML();
							// $mail->Username = "dnsc_qms@daitign.org";
							// $mail->IsSendMail();
							// $mail->Password = "myp@55wordOnline";
							// $mail->SetFrom("dnsc_qms@daitign.org");
							// $mail->Subject = "Verify Account";
							// $mail->Body = $message;
							// $mail->AddAddress($_POST["email_address"]);
							// $mail->Send();


                            $users = query("select * from users where role_id in (1,5)");
                            foreach($users as $row):
                                $Message = [];
                                $Message["message"] = "🚀 New registration alert! Someone just signed up. [".$_POST["firstname"]. " " . $_POST["lastname"] ."] Please review and verify their account.";
                                $Message["link"] = "users?action=pending_users";
                                $theMessage = serialize($Message);
                                addNotification($row["id"], $theMessage, $user_id);
                            endforeach;


                            $res_arr = [
                                "result" => "success",
                                "title" => "Success",
                                "message" => "Account successfully registered. Check your email to verify the account first!",
                                "link" => base_url()."/"."login",
                                ];
                                echo json_encode($res_arr); exit();
								} catch (phpmailerException $e) {
									$res_arr = [
										"result" => "success",
										"title" => "Success",
										"message" => $e->errorMessage(),
										"link" => "refresh",
										// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
										];
										echo json_encode($res_arr); exit();
								} catch (Exception $e) {
			
									$res_arr = [
										"result" => "success",
										"title" => "Success",
										"message" => $e->getMessage(),
										"link" => "refresh",
										// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
										];
										echo json_encode($res_arr); exit();
								}

              
		}  

    endif;
    }
    else
    {
	
        renderview("public/register_system/register_form.php", ["title" => "Log In"]);
    }
?>