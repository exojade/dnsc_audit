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
				$users_area = query("select * from users_area");
				$UsersArea = [];
				foreach($users_area as $row):
					$UsersArea[$row["user_id"]][$row["area_id"]] = $row;
				endforeach;

				$area = query("select * from areas where type in ('office', 'institute')");
				$Area = [];
				foreach($area as $row):
					$Area[$row["id"]] = $row;
				endforeach;



	
		

		
			

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

					if($row["role_id"] == 2):
						$data[$i]["action"] = '
							<div class="btn-group btn-block">
							<a href="#" data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning btn-sm">Update</a>
							<a href="#" data-toggle="modal" data-target="#modalAssignedArea" data-id="'.$row["id"].'" class="btn btn-success btn-sm">Assign Area</a>
						';
					else:
						$data[$i]["action"] = '
							<div class="btn-group btn-block">
							<a href="#" data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning btn-sm">Update</a>
						';
					endif;


					$assigned_area = "";
					$AssignedAreas = [];
					if(isset($UsersArea[$row["id"]])):
						$theAreas = $UsersArea[$row["id"]];
						foreach($theAreas as $a):
							$AssignedAreas[] = $Area[$a["area_id"]]["area_name"];
						endforeach;
					endif;
					// dump($AssignedAreas);
					$data[$i]["assigned_area"] = implode(", ", $AssignedAreas);

					
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

		elseif($_POST["action"] == "addAssignedArea"):
			
			if(isset($_POST["area_id"])):

				query("delete from users_area where user_id = ?", $_POST["user_id"]);
				foreach($_POST["area_id"] as $row):
					query("insert INTO users_area (area_id, user_id) 
					VALUES(?,?)", 
					$row,$_POST["user_id"]);
					
				endforeach;
			endif;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding User",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "modalAssignedArea"):
			$user = query("select * from users where id = ?", $_POST["user_id"]);
			$user = $user[0];

			$area = query("select * from areas where type in ('office', 'institute')");

			$area_user = query("select * from users_area where user_id = ?", $_POST["user_id"]);
			$AreaUser = [];
			foreach($area_user as $row):
				$AreaUser[$row["area_id"]] = $row;
			endforeach;

			$html = '';

			$html.='
			<h4>'.$user["surname"]. ', ' . $user["firstname"] . '</h4>
			<hr>
			';


			$html .= '
			<input type="hidden" name="user_id" value="'.$_POST["user_id"].'">
			<div class="form-group">
                  <label>Assigned Areas</label>
                  <select class="form-control" name="area_id[]" id="areaSelect" multiple style="width: 100%;">';
				  foreach($area as $row):
					if(isset($AreaUser[$row["id"]])):
						$html.='<option selected value="'.$row["id"].'">'.$row["area_name"].'</option>';
					else:
						$html.='<option value="'.$row["id"].'">'.$row["area_name"].'</option>';
					endif;
				  endforeach;
                  $html.='</select>
                </div>

			';

			echo($html);
			


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
