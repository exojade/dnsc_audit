<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		if($_POST["action"] == "auditPlanList"):
				// dump($_REQUEST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where 1=1";

				// if(isset($_REQUEST["role"])):
				// 	if($_REQUEST["role"] != ""):
				// 		$where .= " and u.role_id = '".$_REQUEST["role"]."'";
				// 	endif;
				// endif;




	
		

		
			

				if($search != ""):
				$where .= ' and (firstname like "%'.$search.'%" or surname like "%'.$search.'%" or username like "%'.$search.'%")';
				$baseQuery = "select * from audit_plans" . $where;
				else:
					$baseQuery = "select * from audit_plans" . $where;
				endif;

				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '<a href="auditPlan?action=details&id='.$row["audit_plan"].'" class="btn btn-block btn-sm btn-success">Details</a>';
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

		elseif($_POST["action"] == "newPlan"):
			// dump($_POST);

			if (query("insert INTO audit_plans 
						(
                            type, introduction, audit_objectives, reference_standard,
                            audit_methodologies, year, status
                            ) 
                    VALUES(?,?,?,?,?,?,?)", 
                    $_POST["type"], $_POST["introduction"], $_POST["audit_objectives"] , $_POST["reference_standard"],
					$_POST["audit_methodologies"], $_POST["year"], "ONGOING") === false)
                    {
                        $res_arr = [
                            "result" => "failed",
                            "title" => "Failed",
                            "message" => "Failed on saving deduction table",
                            "link" => "loans_management?action=list",
                            ];
                            echo json_encode($res_arr); exit();
                    }


					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"message" => "Audit plan created successfully!",
						"link" => "refresh",
						// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
						];
						echo json_encode($res_arr); exit();


			
		endif;
		
    }
	else {


			// $users = query("select * from users");
			if(!isset($_GET["action"])):
				render("public/auditPlan_system/auditPlanList.php",[
				]);
			else:
				if($_GET["action"] == "create"):
					render("public/auditPlan_system/createAuditPlan.php",[
					]);
				elseif($_GET["action"] == "details"):
					render("public/auditPlan_system/auditPlanDetails.php",[
					]);
				endif;

			endif;
			
	}
?>
