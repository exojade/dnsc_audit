<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "feedbackList"):


			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
	
				$where = " where 1=1";

				$criteria = query("select * from survey_questionnaire where active_status = 'ACTIVE'");
				$Criteria = [];
				foreach($criteria as $row):
					$Criteria[$row["questionnaire_id"]] = $criteria;
				endforeach;
				$office = query("select * from office");
				$Office = [];
				foreach($office as $row):
					$Office[$row["office_id"]] = $row;
				endforeach;

				if(isset($_REQUEST["office_id"])):
					if($_REQUEST["office_id"] != ""):
						$where .= " and office_id = '".$_REQUEST["office_id"]."'";
					endif;
				endif;

				if(isset($_REQUEST["date"])):
					if($_REQUEST["date"] != ""):
						$from_date = strtotime($_REQUEST["date"] . " 00:00:00");
						$to_date = strtotime($_REQUEST["date"] . " 23:59:59");
						$where .= " and timestamp between ".$from_date." and ".$to_date."";
					endif;
				endif;
		

	



	
		

		
			

				$baseQuery = "select * from survey" . $where . " order by timestamp desc";
				$data = query($baseQuery . $limitString . " " . $offsetString);
				$all_data = query($baseQuery);



				$i = 0;
				foreach($data as $row):
					$data[$i]["client"] = "";
					$data[$i]["office"] = $Office[$row["office_id"]]["office_name"];
					$data[$i]["date"] = date("M d, Y", $row["timestamp"]);
					$surveyResult = unserialize($row["survey_result"]);


					foreach($criteria as $c):
						$data[$i][$c["questionnaire_id"]] = 0;
					endforeach;


					$count = 0;
					$total_count = 0;
					foreach($surveyResult as $result):
						if(isset($Criteria[$result["criteria"]])):
							$data[$i][$result["criteria"]] = $result["result"];
							$total_count+=$result["result"];
							$count++;
						endif;
					endforeach;
					$data[$i]["average"] = round($total_count / $count);
					$data[$i]["comments"] = $row["remarks"];
					


					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);
		
		elseif($_POST["action"] == "addSurvey"):
			// dump($_POST);

			query("insert INTO survey_questionnaire (question, active_status) 
			VALUES(?,?)", 
			$_POST["question"], "ACTIVE");
			
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Criteria",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "addOffice"):
			$parent_id = 0;
			if(isset($_POST["parent_office"])):
				$parent_id = $_POST["parent_office"];
			endif;
			query("insert INTO office (office_name, active_status, parent_id) 
			VALUES(?,?,?)", 
			$_POST["office"], "ACTIVE", $parent_id);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Office",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "lineChart"):

			// $_POST["from"] = intval($_POST["from"]);
			// $_POST["to"] = intval($_POST["to"]);

			$from_timestamp = strtotime($_POST["year"] . "-" . $_POST["from"] . "-" . "01");
			$to_timestamp = strtotime(date($_POST["year"] . "-" . $_POST["to"] . "-" . "t"));
			// dump($from_timestamp);

					// dump($_POST);
					$Month = [];
					$months = getMonths();
					foreach($months as $row):
						$Month[$row["id"]] = $row;
					endforeach;
					// dump($Month);
			
					// dump($Month);
					$where = "where timestamp between $from_timestamp and $to_timestamp";
					if(isset($_POST["office"])):
						if($_POST["office"] != ""):
							$where .= " and office_id = '".$_POST["office"]."'";
						endif;
					endif;
					$TheFinalCount = [];
					$BarCount = [];
					$barChartCount = query("
					SELECT
						 MONTH(FROM_UNIXTIME(timestamp)) AS month, 
						COUNT(*) AS count
					FROM
						survey
						$where
						GROUP BY month 
					ORDER BY
						month ASC;
					");
					
					foreach($barChartCount as $row):
						$BarCount[$row["month"]] = $row;
					endforeach;
					// dump($barChartCount);
					// du

					$j=0;
					$totalCount = 0;
					for($i = intval($_POST["from"]); $i<=intval($_POST["to"]); $i++):
						$TheFinalCount[$j]["name"] = $Month[$i]["name"];
						if(isset($BarCount[$i])):
							$TheFinalCount[$j]["count"] = $BarCount[$i]["count"];
						else:
							$TheFinalCount[$j]["count"] = 0;
						endif;
						$totalCount += $TheFinalCount[$j]["count"];
						$j++;
					endfor;

					$myDisease = "All";
					if($_POST["office"] != ""):
						$theDisease = query("select * from office where office_id = ?", $_POST["office"]);
						$myDisease = $theDisease[0]["office_name"];
					endif;
			
					$json_data = array(
						"dataset" => $TheFinalCount,
						"disease" => $myDisease,
						"totalCount" => $totalCount,
					);
					echo json_encode($json_data);


		endif;
		
		
    }
	else {

			if(!isset($_GET["action"])):
				render("public/404_system/404form.php",[
				]);
			else:
				if($_GET["action"] == "edit_form"):
					render("public/survey_system/editForm.php",[
					]);
				elseif($_GET["action"] == "feedback"):
					render("public/survey_system/surveyFeedback.php",[
					]);
					elseif($_GET["action"] == "graph"):
						render("public/survey_system/surveyGraph.php",[
						]);
				endif;
			endif;

			
	}
?>
