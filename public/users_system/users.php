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
	
				$where = " where u.role_id != ''";

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
					$data[$i]["action"] = '
						<div class="btn-group btn-block">
						<a href="#" data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning btn-sm">Update</a>
						<a href="#" data-toggle="modal" data-target="#modalUpdate" class="btn btn-success btn-sm">Assign Area</a>
					';
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

		elseif($_POST["action"] == "pendingUsersList"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where u.role_id is null";


				$area = query("select * from areas where type in ('office', 'institute')");
				$Area = [];
				foreach($area as $row):
					$Area[$row["id"]] = $row;
				endforeach;

				$users_area = query("select * from users_area");
				$UsersArea = [];
				foreach($users_area as $row):
					$UsersArea[$row["process_id"]][$row["area_id"]] = $row;
				endforeach;



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
					$data[$i]["action"] = '<a href="#" data-toggle="modal" data-id="'.$row["id"].'" data-target="#modalAssignRole" class="btn btn-block btn-success btn-sm">Assign Role</a>';
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

		elseif($_POST["action"] == "modalAssignRole"):
			// dump($_POST);

			$roles = query("select * from roles");
			$html = '';
			$html .='
				<input type="hidden" name="id" value="'.$_POST["id"].'">
				<div class="form-group">
					<label>Select Role</label>
					<select name="role_id" class="form-control">
						<option value="" selected disabled>Please select role for the user</option>';
					foreach($roles as $row):
						$html.='<option value="'.$row["id"].'">'.$row["role_name"].'</option>';
					endforeach;
					$html.='	
					</select>
				</div>
			';

			// foreach()


			echo($html);

		elseif($_POST["action"] == "assignRole"):
			// dump($_POST);
			query("update users set role_id = ? where id = ?", $_POST["role_id"], $_POST["id"]);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Role Assignment!",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();


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
				elseif($_GET["action"] == "pending_users"):
						render("public/users_system/pending_users_form.php",[
						]);


				
				endif;
			endif;

			
	}
?>
