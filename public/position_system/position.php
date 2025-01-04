<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "position_list"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where 1=1";

				$area = query("select * from areas where type in ('office', 'institute')");
				$Area = [];
				foreach($area as $row):
					$Area[$row["id"]] = $row;
				endforeach;

				$area_process = query("select * from area_position");
				$AreaProcess = [];
				foreach($area_process as $row):
					$AreaProcess[$row["position_id"]][$row["area_id"]] = $row;
				endforeach;

				// dump($AreaProcess);
	
		

				if($search == ""):
					$baseQuery = "select * from position " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				else:
					$where .= " and (position_name like '%".$search."%') ";
					$baseQuery = "select * from position " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				endif;
	
	
	
	
				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '
					<div class="btn-group btn-block">
						<a href="#" data-toggle="modal" data-target="#modalUpdateProcess" data-id="'.$row["position_id"].'" class="btn btn-sm btn-warning">Update</a>
						<a href="#" data-toggle="modal" data-target="#modalAssignedArea" data-id="'.$row["position_id"].'" class="btn btn-sm btn-info">Assign Area</a>
					</div>';


					$assigned_area = "";
					$AssignedAreas = [];
					if(isset($AreaProcess[$row["position_id"]])):
						$theAreas = $AreaProcess[$row["position_id"]];
						foreach($theAreas as $a):
							$AssignedAreas[] = $Area[$a["area_id"]]["area_name"];
						endforeach;
					endif;
					// dump($AssignedAreas);
					$data[$i]["assigned_area"] = implode(", ", $AssignedAreas);


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


			query("insert INTO position (position_name) 
			VALUES(?)", 
			$_POST["position_name"]);
			
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Process",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "modalAssignedArea"):
			// dump($_POST);

			$position = query("select * from position where position_id = ?", $_POST["position_id"]);
			$position = $position[0];

			$area = query("select * from areas where type in ('office', 'institute')");

			$area_position = query("select * from area_position where position_id = ?", $_POST["position_id"]);
			$AreaPosition = [];
			foreach($area_position as $row):
				$AreaPosition[$row["area_id"]] = $row;
			endforeach;

			$html = '';

			$html.='
			<h4>'.$position["position_name"].'</h4>
			<hr>
			';


			$html .= '
			<input type="hidden" name="position_id" value="'.$_POST["position_id"].'">
			<div class="form-group">
                  <label>Assigned Areas</label>
                  <select class="form-control" name="area_id[]" id="areaSelect" multiple style="width: 100%;">';
				  foreach($area as $row):
					if(isset($AreaProcess[$row["id"]])):
						$html.='<option selected value="'.$row["id"].'">'.$row["area_name"].'</option>';
					else:
						$html.='<option value="'.$row["id"].'">'.$row["area_name"].'</option>';
					endif;
				  endforeach;


                  $html.='</select>
                </div>

			';

			echo($html);

		elseif($_POST["action"] == "addAssignedArea"):
			// dump($_POST);
			if(isset($_POST["area_id"])):
				foreach($_POST["area_id"] as $row):
					query("insert INTO area_position (area_id, position_id) 
					VALUES(?,?)", 
					$row,$_POST["position_id"]);
					
				endforeach;
			endif;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Process",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

			


		endif;
		
    }
	else {


			// $users = query("select * from users");
			render("public/position_system/position_list.php",[
			]);
	}
?>
