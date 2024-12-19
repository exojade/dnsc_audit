<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "positionList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where child.type = 'process'";

				if(isset($_REQUEST["role"])):
					if($_REQUEST["role"] != ""):
						$where .= " and u.role_id = '".$_REQUEST["role"]."'";
					endif;
				endif;

				if($search != ""):
				$where .= ' and (firstname like "%'.$search.'%" or surname like "%'.$search.'%" or username like "%'.$search.'%")';
				$baseQuery = "SELECT 
					child.id AS child_id,
					child.area_name AS child_area,
					parent.area_name AS parent_area,
					grandparent.area_name AS grandparent_area,
					child.area_description,
					child.type,
					position.*
				FROM 
					areas AS child
				LEFT JOIN 
					areas AS parent 
				ON 
					child.parent_area = parent.id
				LEFT JOIN 
					areas AS grandparent 
				ON 
					parent.parent_area = grandparent.id
				RIGHT JOIN 
					POSITION
				ON 
					position.area_id = child.id
				
					" . $where;
				else:
					$baseQuery = "SELECT 
					child.id AS child_id,
					child.area_name AS child_area,
					parent.area_name AS parent_area,
					grandparent.area_name AS grandparent_area,
					child.area_description,
					child.type,
					position.*
				FROM 
					areas AS child
				LEFT JOIN 
					areas AS parent 
				ON 
					child.parent_area = parent.id
				LEFT JOIN 
					areas AS grandparent 
				ON 
					parent.parent_area = grandparent.id
				RIGHT JOIN 
					POSITION
				ON 
					position.area_id = child.id
" . $where;
				endif;

				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '<a href="#" data-toggle="modal" data-target="#medicalRecordModal" data-id="'.$row["position_id"].'" class="btn btn-block btn-sm btn-success">Update</a>';
					$data[$i]["area_name"] = $row["grandparent_area"] ." > ".$row["parent_area"]." > ".$row["child_area"];
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
			query("insert INTO position (position_name, area_id, active_status
			) 
			VALUES(?,?,?)", 
			$_POST["positionName"] , $_POST["process_id"], "active");
			
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


			$users = query("select * from position");
			render("public/position_system/position_list.php",[
			]);
	}
?>
