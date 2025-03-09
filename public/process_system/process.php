<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "processList"):
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

				$area_process = query("select * from area_process");
				$AreaProcess = [];
				foreach($area_process as $row):
					$AreaProcess[$row["process_id"]][$row["area_id"]] = $row;
				endforeach;

				// dump($AreaProcess);
	
		

				if($search == ""):
					$baseQuery = "select * from process " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				else:
					$where .= " and (process_name like '%".$search."%') ";
					$baseQuery = "select * from process " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				endif;
	
	
	
	
				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '
					<div class="btn-group btn-block">
						<a href="#" data-toggle="modal" data-target="#modalUpdateProcess" data-id="'.$row["process_id"].'" class="btn btn-sm btn-warning">Update</a>
						<a href="#" data-toggle="modal" data-target="#modalAssignedArea" data-id="'.$row["process_id"].'" class="btn btn-sm btn-info">Assign Area</a>
					</div>';


					$assigned_area = "";
					$AssignedAreas = [];
					if(isset($AreaProcess[$row["process_id"]])):
						$theAreas = $AreaProcess[$row["process_id"]];
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

		elseif($_POST["action"] == "modalUpdateProcess"):

			$process = query("select * from process where process_id = ?", $_POST["process_id"]);
			$process = $process[0];
			$hint = '';

			$hint .='
				<input type="hidden" name="process_id" value="'.$process["process_id"].'">
				<div class="form-group">
					<label>Process Name</label>
					<input class="form-control" type="text" name="process_name" value="'.$process["process_name"].'">
				</div>
			';
			echo($hint);
		elseif($_POST["action"] == "updateProcess"):
			query("update process set process_name = ? where process_id = ?", $_POST["process_name"], $_POST["process_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Update Process",
				"message" => "Success on updating process details.",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
		elseif($_POST["action"] == "addProcess"):
			query("insert INTO process (process_name) 
			VALUES(?)", 
			$_POST["processName"]);
			
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Process",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "modalAssignedArea"):
			// dump($_POST);

			$process = query("select * from process where process_id = ?", $_POST["process_id"]);
			$process = $process[0];

			$area = query("select * from areas where type in ('office', 'institute')");

			$area_process = query("select * from area_process where process_id = ?", $_POST["process_id"]);
			$AreaProcess = [];
			foreach($area_process as $row):
				$AreaProcess[$row["area_id"]] = $row;
			endforeach;

			$html = '';

			$html.='
			<h4>'.$process["process_name"].'</h4>
			<hr>
			';


			$html .= '
			<input type="hidden" name="process_id" value="'.$_POST["process_id"].'">
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
					query("insert INTO area_process (area_id, process_id) 
					VALUES(?,?)", 
					$row,$_POST["process_id"]);
					
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
			render("public/process_system/processList.php",[
			]);
	}
?>
