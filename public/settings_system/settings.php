<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump($_SESSION);
		if($_POST["action"] == "updateSettings"):
			// dump($_FILES);

			if(isset($_FILES["logoImage"])):
				if($_FILES["logoImage"]["size"] != 0){
					$target_pdf = "resources/";
					$path_parts = pathinfo($_FILES["logoImage"]["name"]);
					$extension = $path_parts['extension'];
					$target = $target_pdf . "theLogo" . "." . $extension;
					
						if(!move_uploaded_file($_FILES['logoImage']['tmp_name'], $target)){
							echo("FAMILY Do not have upload files");
							exit();
						}
				query("update siteoptions set 
							mainLogo = '".$target."',
							mainTitle = '".$_POST["mainTitle"]."',
							mainColor = '".$_POST["mainColor"]."',
							textColor = '".$_POST["textColor"]."'
							");
				}

				
			else{

				query("update siteoptions set 
				mainTitle = '".$_POST["mainTitle"]."',
				mainColor = '".$_POST["mainColor"]."',
				textColor = '".$_POST["textColor"]."'
				");

			}


			else:
				query("update siteoptions set 
				mainTitle = '".$_POST["mainTitle"]."',
				mainColor = '".$_POST["mainColor"]."',
				textColor = '".$_POST["textColor"]."'
				");

			endif;

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating data",
				"link" => "settings",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();
		endif;
    }
	else {
		if(!isset($_GET["action"])):
			render("public/settings_system/settingsForm.php",[]);
		endif;
	}
?>
