<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		// dump($_POST);

        if($_POST["action"] == "register"):
            dump($_POST);
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["email_address"]);
        if (count($rows) == 1)
        {
            $row = $rows[0];
			if($row["status"] == "fill_otp"){
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success",
					"link" => "otp?id=".$row["user_id"],
					];
					echo json_encode($res_arr); exit();
				

			}
			else{
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
			$user_id = create_uuid("USR");
			if (query("insert INTO users 
						(user_id, username, password, role, fullname, status, otp) 
                    VALUES(?,?,?,?,?,?,?)", 
                    $user_id, $_POST["email_address"], crypt('!1234#', '') , 'APPLICANT',
					$_POST["firstname"] . " " . $_POST["lastname"],
					"fill_otp", "!1234#") === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }

            if (query("insert INTO scholars 
                    (scholar_id, firstname, middlename, lastname, birthdate, current_status) 
                VALUES(?,?,?,?,?,'APPLICANT')", 
                $user_id, $_POST["firstname"], $_POST["middlename"] , $_POST["lastname"],
                $_POST["birthdate"]) === false)
                {
                    $res_arr = [
                        "result" => "failed",
                        "title" => "Failed",
                        "message" => "Failed on saving deduction table",
                        "link" => "loans_management?action=list",
                        ];
                        echo json_encode($res_arr); exit();
                }
            
                $res_arr = [
                    "result" => "success",
                    "title" => "Success",
                    "message" => "Success",
                    "link" => "otp?id=".$user_id,
                    ];
                    echo json_encode($res_arr); exit();
		}  

    endif;
    }
    else
    {
        // dump($_GET);
        renderview("public/verify_system/register_form.php", ["title" => "Log In"]);
    }
?>