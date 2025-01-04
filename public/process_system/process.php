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


					if(isset($AreaProcess[$row["process_id"]])):
						// foreach($)

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

		elseif($_POST["action"] == "addProcess"):
			// dump($_POST);


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
			dump($_POST);

			


			
		endif;
		
    }
	else {


			// $users = query("select * from users");
			render("public/process_system/processList.php",[
			]);
	}
?>
