<?php
require("includes/google_class.php"); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// dump($_POST);
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        if (count($rows) == 1)
        {
            $row = $rows[0];
			if (crypt($_POST["password"], $row["password"]) == $row["password"]){
				// dump($row);
				$_SESSION["dnsc_audit"] = [
					"userid" => $row["userid"],
					"uname" => $row["username"],
					"role" => $row["role"],
					"fullname" => $row["fullname"],
					"profile_image" => "",
					"application" => "dnsc_audit"
				];

				// $activity = $row["fullname"] . " successfully logged in into the system";
				echo("proceed");
            }
			else {
				// $activity = $row["fullname"] . " entered " . $_POST["password"];
				echo("wrong_password");
			}
		}
		else {
			echo("wrong_password");
		}  
    }
    else
    {
        renderview("public/login_system/loginform.php", ["title" => "Log In", "google" => $google]);
    }
?>