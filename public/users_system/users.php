<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "addUser"):

			// dump($_FILES);
			$fullname = $_POST["username"];
			$fullname = str_replace(' ', '_', $fullname);
			$target_pdf = "uploads/users/";

			if($_FILES["profile_image"]["size"] != 0){
				
				$path_parts = pathinfo($_FILES["profile_image"]["name"]);
				$extension = $path_parts['extension'];
				$target = $target_pdf . "fullname" . "." . $extension;
				
                    if(!move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)){
                        echo("FAMILY Do not have upload files");
                        exit();
                    }
			}
			$user_id = create_uuid("USR");
			if (query("insert INTO users (user_id, username, password, role, 
						fullname,status, gender,address) 
			  VALUES(?,?,?,?,?,?,?,?)", 
				$user_id, $_POST["username"], crypt('!1234#',''), $_POST["role"], strtoupper($_POST["fullname"]),
				"active",$_POST["gender"], $_POST["address"],) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "User already Registered",
						"link" => "users?action=users_list",
						];
						echo json_encode($res_arr); exit();
				}

			query("update users set profile_image = '".$target."'
				where user_id = '".$user_id."'");	

		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Success",
			"link" => "users?action=users_list",
			];
			echo json_encode($res_arr); exit();
		elseif($_POST["action"] == "usersList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where 1=1";
	
				$Client = [];
				$client = query("select * from client");
				foreach($client as $row):
					$Client[$row["clientId"]] = $row;
				endforeach;

				$Doctors = [];
				$doctors = query("select * from doctors");
				foreach($doctors as $row):
					$Doctors[$row["doctorsId"]] = $row;
				endforeach;
				$baseQuery = "select * from users " . $where;
				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);
	
	
	
	
				$i = 0;
				foreach($data as $row):
					// dump($row);
	
					// dump($Clients[$Pets[$row["petId"]]["clientId"]]);
	
	
					$data[$i]["action"] = '<a href="#" data-toggle="modal" data-target="#medicalRecordModal" data-id="'.$row["userid"].'" class="btn btn-block btn-sm btn-success">Update</a>';
				
					if($row["role"] == "admin"):
						$data[$i]["fullname"] = $row["fullname"];
					elseif($row["role"] == "CLIENT"):
						$data[$i]["fullname"] = $Client[$row["userid"]]["lastname"] . ", " . $Client[$row["userid"]]["firstname"];
					elseif($row["role"] == "DOCTOR"):
						$data[$i]["fullname"] = $Doctors[$row["userid"]]["doctorsLastname"] . ", " . $Doctors[$row["userid"]]["doctorsFirstname"];
					endif;
	
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);


			
		endif;
		
    }
	else {


			$users = query("select * from users");
			render("public/users_system/users_list.php",[
			]);
	}
?>
