<?php
require("includes/google_class.php"); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		if($_POST["action"] == "conduct_survey"):
			// dump($_POST);

			$SurveyResult = [];
			$criteria = query("select * from survey_questionnaire");
			$i = 0;
			foreach($criteria as $row):
				if(isset($_POST[$row["questionnaire_id"]])):
					$SurveyResult[$i]["criteria"] = $row["questionnaire_id"];
					$SurveyResult[$i]["criteria_name"] = $row["question"];
					$SurveyResult[$i]["result"] = $_POST[$row["questionnaire_id"]];
					$i++;
				endif;
			endforeach;

			$SurveyResult = serialize($SurveyResult);
			// dump($SurveyResult);
			query("insert INTO survey (office_id, name, email_address,survey_result,remarks,timestamp,contact_number) 
			VALUES(?,?,?,?,?,?,?)", 
			$_POST["office"], $_POST["fullname"], $_POST["email_address"], $SurveyResult, $_POST["comments"], time(), $_POST["contact_number"]);

			$users = query("select * from users where role_id in (5,6,1)");
			foreach($users as $row):
				$Message = [];
				$Message["message"] = "📝 A new survey response has been submitted. Review the feedback now!";
				$Message["link"] = "survey?action=feedback";
				$theMessage = serialize($Message);
				addNotification($row["id"], $theMessage, "");
			endforeach;

			
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on ",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();

			


		endif;
    }
    else
    {
        renderview("public/survey_form_system/survey_template.php", ["title" => "Log In"]);
    }
?>