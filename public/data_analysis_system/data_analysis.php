<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "chart"):
			$monthArray = generateMonthArray($_POST["from"], $_POST["to"]);

			$from_date = $_POST["year"] . "-" . $_POST["from"] . "-01 00:00:00";
			$to_date = $_POST["year"] . "-" . $_POST["to"] . "-01";
			$to_date = date("Y-m-t 23:59:00", strtotime($to_date));
			$where = " ";
			if(isset($_REQUEST["from"])):
				if($_REQUEST["from"] != "")
					$where = $where . " and dateCheckUp >= '" . $from_date . "'";
			endif;
			if(isset($_REQUEST["to"])):
				if($_REQUEST["to"] != "")
					$where = $where . " and dateCheckUp <= '" . $to_date . "'";
			endif;


			$query = "
SELECT 
    CONCAT(CAST(MONTH(c.dateCheckup) AS CHAR)) AS month_year,
    COUNT(c.checkupId) AS total_checkups
FROM 
    checkup c
where 1=1 $where
GROUP BY 
    month_year
ORDER BY 
    month_year
";
			// dump($query);
			$dataset = query($query);
			// dump($results);
			

	// 		$dataset = query("select CONCAT(CAST(MONTH(death_date) AS CHAR)) AS month_year,
	// 		SUM(CASE WHEN deceased_gender = 'MALE' THEN 1 ELSE 0 END) AS male_count,
    // SUM(CASE WHEN deceased_gender = 'FEMALE' THEN 1 ELSE 0 END) AS female_count,
	// 		COUNT(*) AS total
	// 		FROM burial_service_contract
	// 		where 1=1 ".$where." 
	// 		GROUP BY month_year");
			// dump($dataset);
			$Data = [];
			foreach($dataset as $row):
				$Data[$row["month_year"]] = $row;
			endforeach;

$JSON = [];
// Generating JSON response
// dump($Data[5]);
for($i = $_POST["from"]; $i <= $_POST["to"]; $i++):
	if(isset($Data[$i])):
		$JSON[] = $Data[$i]["total_checkups"];
		// $male = $male + $Data[$i]["male_count"];
		// $female = $female + $Data[$i]["female_count"];
	else:
		$JSON[] = 0;
	endif;
endfor;
// dump($JSON);

// header('Content-Type: application/json');
// echo json_encode($JSON);
			

			// dump($JSON);




			$string_query = "SELECT 
				d.diseaseName,
				COUNT(cd.checkupId) AS total,
				d.species_affected
			FROM 
				checkup_disease cd 
			LEFT JOIN 
				disease d ON d.diseaseId = cd.diseaseId
			where 1=1 $where 
			GROUP BY 
				d.diseaseName, d.species_affected
			ORDER BY 
				d.diseaseName";
			// Execute the query and fetch the results
			$results = query($string_query);
			// dump($results);

			$diseaseArray = [];
			$i=0;
			foreach ($results as $row) {

				if ($i == 0) {
					$color = "#00c0ef"; // Specific color for $i = 0
					$highlight = "#00c0ef"; // Specific highlight for $i = 0
				} elseif ($i == 1) {
					$color = "#3c8dbc"; // Specific color for $i = 1
					$highlight = "#3c8dbc"; // Specific highlight for $i = 1
				} elseif ($i == 2) {
					$color = "#D9D9D9"; // Specific color for $i = 2
					$highlight = "#D9D9D9"; // Specific highlight for $i = 2
				} elseif ($i == 3) {
					$color = "#d2d6de"; // Specific color for $i = 3
					$highlight = "#d2d6de"; // Specific highlight for $i = 3
				} elseif ($i == 4) {
					$color = "#FF00FF"; // Specific color for $i = 4
					$highlight = "#FF66FF"; // Specific highlight for $i = 4
				} else {
					$color = getRandomColor();
					$highlight = getRandomColor();
				}


				$diseaseArray[] = array(
					'value' => $row['total'],
					'species_affected' => $row['species_affected'],
					'color' => $color,
					'highlight' => $highlight,
					'label' => $row['diseaseName']
				);
				$i++;
			}
			// dump($diseaseArray); 



			// $dummy = generateRandomNumbers($_POST["from"], $_POST["to"]);
			// dump($JSON);
			$json_data = array(
				"labels" => $monthArray,
				"dataset" => $JSON,
				"disease" => $diseaseArray,
			);
			
			echo json_encode($json_data);



			elseif($_POST["action"] == "chart"):
				$monthArray = generateMonthArray($_POST["from"], $_POST["to"]);
	
				$from_date = $_POST["year"] . "-" . $_POST["from"] . "-01";
				$to_date = $_POST["year"] . "-" . $_POST["to"] . "-01";
				$to_date = date("Y-m-t", strtotime($to_date));
				$where = " ";
				if(isset($_REQUEST["from"])):
					if($_REQUEST["from"] != "")
						$where = $where . " and transaction_date >= '" . $from_date . "'";
				endif;
				if(isset($_REQUEST["to"])):
					if($_REQUEST["to"] != "")
						$where = $where . " and transaction_date <= '" . $to_date . "'";
				endif;
				// dump($where);
				
	
				$dataset = query("select CONCAT(CAST(MONTH(transaction_date) AS CHAR)) AS month_year,
				sum(amount) AS total
				FROM transaction
				where 1=1 ".$where." 
				GROUP BY month_year");
				// dump($dataset);
				// dump($dataset);
				$Data = [];
				foreach($dataset as $row):
					$Data[$row["month_year"]] = $row;
				endforeach;
	
				$JSON = [];
				// dump($Data);
				for($i = $_POST["from"]; $i <= $_POST["to"]; $i++):
					if(isset($Data[$i])):
						$JSON[] = $Data[$i]["total"];
					else:
						$JSON[] = 0;
					endif;
				endfor;
	
				// dump($JSON);
	
	
	
	
	
	
				// $dummy = generateRandomNumbers($_POST["from"], $_POST["to"]);
				// dump($JSON);
				$json_data = array(
					"labels" => $monthArray,
					"dataset" => $JSON,
				);
				echo json_encode($json_data);
		endif;

	
    }
	else {
			render("public/data_analysis_system/data_analysisForm.php",[]);
	
	}
?>
