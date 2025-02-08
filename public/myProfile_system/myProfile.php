<?php
    // configuration
    // dump($_SESSION);
    if($_SERVER["REQUEST_METHOD"] === "POST") {


        if($_POST["action"] == "updateProfile"):

            $user_id = $_SESSION["dnsc_audit"]["userid"];
            // dump($_POST);

            $check_username = query("select * from users where username = ? and id != ?", $_POST["username"], $user_id);
            if(!empty($check_username)):
                $res_arr = [
                    "result" => "failed",
                    "title" => "Failed",
                    "message" => "Username already exist!",
                    "link" => "refresh",
                    ];
                    echo json_encode($res_arr); exit();
            endif;


            query("update users set
                    firstname = ?,
                    middlename = ?,
                    surname = ?,
                    suffix = ?,
                    username = ?
                    where id = ?
                ", 
                    $_POST["firstname"],
                    $_POST["middlename"],
                    $_POST["surname"],
                    $_POST["suffix"],
                    $_POST["username"],
                    $user_id
            );

            if(isset($_FILES["profile_image"])):
			$target_pdf = "file_manager/profile_images/".$user_id."/";
			if (!file_exists($target_pdf )) {
				mkdir($target_pdf , 0777, true);
			}
			if($_FILES["profile_image"]["size"] != 0){
				
				$path_parts = pathinfo($_FILES["profile_image"]["name"]);
				$extension = $path_parts['extension'];
				$target = $target_pdf . "profile_image" . "." . $extension;
				
                    if(!move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)){
                        echo("FAMILY Do not have upload files");
                        exit();
                    }
                    query("update users set img = '".$target."'
					where id = '".$user_id."'");
                    $_SESSION["dnsc_audit"]["img"] = $target;
			}
 
            endif;
			
            $res_arr = [
                "result" => "success",
                "title" => "Success",
                "message" => "Update profile successfully",
                "link" => "refresh",
                ];
                echo json_encode($res_arr); exit();
            


        endif;

    }
    else{
        render("public/myProfile_system/myProfilePage.php");

    }
    
    
?>
