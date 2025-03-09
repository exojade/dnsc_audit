<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "addArea"):

			// dump($_POST);
// 
			if (query("insert INTO areas (area_name, area_description, type, created_at, updated_at) 
			  VALUES(?,?,?,?,?)", 
				$_POST["area_name"], $_POST["description"], $_POST["type"], date("Y-m-d H:i:s"), date("Y-m-d H:i:s")) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "Area already Registered",
						"link" => "refresh",
						];
						echo json_encode($res_arr); exit();
				}
			

		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Add Area Successfully",
			"link" => "refresh",
			];
			echo json_encode($res_arr); exit();
		elseif($_POST["action"] == "areaList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where type in ('office', 'institute')";
				if($search == ""):
					$baseQuery = "select * from areas " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				else:
					$where .= " and (area_name like '%".$search."%' or area_description like '%".$search."%') ";
					$baseQuery = "select * from areas " . $where;
					$data = query($baseQuery . $limitString . " " . $offsetString);
					$all_data = query($baseQuery);
				endif;
	
	
	
	
				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '
					<div class="btn-group btn-block">
						<a href="#" data-toggle="modal" data-target="#modalUpdateArea" data-id="'.$row["id"].'" class="btn btn-sm btn-warning">Update</a>
					</div>';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "modalUpdateArea"):
			// dump($_POST);
			$type = ["office", "institute"];

			$area = query("select * from areas where id = ?", $_POST["id"]);
			$area=$area[0];
			$hint = '
			<input type="hidden" name="id" value="'.$_POST["id"].'">
			 <div class="form-group">
                    <label>Area Name</label>
                    <input type="text" name="area_name" value="'.$area["area_name"].'" required class="form-control" placeholder="Enter Area Name">
                  </div>

                  <div class="form-group">
                    <label>Area Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description">'.$area["area_description"].'</textarea>
                  </div>

                  <div class="form-group">
                    <label>Area Type</label>
                    <select class="form-control" required name="type">
                      <option value="'.$area["type"].'" selected>'.$area["type"].'</option>';


                     foreach($type as $row):
                        $hint.='<option value="'.$row.'">'.$row.'</option>';
                   endforeach;
				   $hint.='
                    </select>
                  </div>
			';

			echo($hint);

		elseif($_POST["action"] == "updateArea"):
			// dump($_POST);
			query("update areas set area_name = ?, area_description = ?, type = ? where id = ?", $_POST["area_name"], $_POST["description"], $_POST["type"], $_POST["id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Area updated successfully!",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
			
		elseif($_POST["action"] == "getProcesses"):
			// dump($_POST);

			$processes = query("select * from areas where parent_area = ?", $_POST["areaId"]);
			echo json_encode(['success' => true, 'data' => $processes]); exit();
			
		endif;
		
    }
	else {


			$users = query("select * from users");
			render("public/area_system/areaList.php",[
			]);
	}
?>
