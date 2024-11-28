<?php
require("includes/google_class.php"); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// dump($_POST);
        $rows = query("SELECT u.*,role_name FROM users u
						left join roles r on r.id = u.role_id
						 WHERE username = ?", $_POST["username"]);
        if (count($rows) == 1)
        {
            $row = $rows[0];
			if (password_verify($_POST["password"], $row["password"])){
				// dump($row);
				if($row["role_id"] == ""):
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "User not accepted yet!",
						"link" => "refresh",
						];
						echo json_encode($res_arr); exit();
				endif;
				$_SESSION["dnsc_audit"] = [
					"userid" => $row["id"],
					"uname" => $row["username"],
					"role" => $row["role_id"],
					"role_name" => $row["role_name"],
					"fullname" => $row["firstname"] . " " . $row["middlename"] . " " . $row["surname"],
					"profile_image" =>  $row["img"],
					"application" => "dnsc_audit"
				];

				// $activity = $row["fullname"] . " successfully logged in into the system";
				$res_arr = [
					"result" => "success",
					"title" => "Done",
					"message" => "Done",
					"link" => "index",
					];
					echo json_encode($res_arr); exit();
            }
			else {
				// $activity = $row["fullname"] . " entered " . $_POST["password"];
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "Account not Found!",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();
			}
		}
		else {
			$res_arr = [
				"result" => "failed",
				"title" => "Failed",
				"message" => "Account not Found!",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
		}  
    }
    else
    {
        renderview("public/login_system/loginform.php", ["title" => "Log In"]);
    }
?>