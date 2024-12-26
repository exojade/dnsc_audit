<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "usersList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where 1=1";

				if(isset($_REQUEST["role"])):
					if($_REQUEST["role"] != ""):
						$where .= " and u.role_id = '".$_REQUEST["role"]."'";
					endif;
				endif;




	
		

		
			

				if($search != ""):
				$where .= ' and (firstname like "%'.$search.'%" or surname like "%'.$search.'%" or username like "%'.$search.'%")';
				$baseQuery = "select u.*,r.role_name from users u 
							left join roles r on r.id = u.role_id" . $where;
				else:
					$baseQuery = "select u.*,r.role_name from users u 
							left join roles r on r.id = u.role_id" . $where;
				endif;

				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '<a href="users?action=profile&id='.$row["id"].'" class="btn btn-block btn-success btn-sm">Visit</a>';
					$data[$i]["fullname"] = $row["surname"] .", " . $row["firstname"] . " " . $row["middlename"];
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "addPosition"):
			// dump($_POST);


			query("insert INTO user_position (user_id, position, area_id, active_status) 
			VALUES(?,?,?,?)", 
			$_POST["user_id"],$_POST["positionName"] , $_POST["process_id"], "active");
			
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Position",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

			
		endif;
		
    }
	else {

			if(!isset($_GET["action"])):
				$users = query("select * from users");
				render("public/users_system/users_list.php",[
				]);
			else:
				if($_GET["action"] == "profile"):
					$user = query("select concat(surname, ', ', firstname) as fullname, u.* from users u where id = ?", $_GET["id"]);
					$user = $user[0];
					$position = query("select up.*, a.* from user_position up
										left join areas a
										on a.id = up.area_id
										 where up.user_id = ?", $_GET["id"]);
					render("public/users_system/user_profile.php",[
						"user" => $user,
						"position" => $position,
					]);
				endif;
			endif;

			
	}
?>
