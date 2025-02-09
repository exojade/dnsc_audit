<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		
        if($_POST["action"] == "get_messages"):
            // dump($_POST);

            $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 20;
            $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
            $lastId = isset($_POST['last_id']) ? intval($_POST['last_id']) : 0;
            $offset = $offset * 20;
            // dump($offset);
            if ($lastId > 0) {
        // Fetch only newer messages
        $messages = query("SELECT * FROM messages WHERE message_id > ? ORDER BY message_id DESC", $lastId);
    } else {
        // Fetch older messages for scrolling
        $messages = query("SELECT * FROM messages ORDER BY message_id DESC LIMIT ? OFFSET ?", $limit, $offset);
    }

    $Messages = [];
    $Users = [];
    $users = query("SELECT * FROM users");
    foreach ($users as $row) {
        $Users[$row["id"]] = $row;
    }

    foreach ($messages as $row) {

        $is_me = 0;
        if($row["send_id"] == $_SESSION["dnsc_audit"]["userid"]):
            $is_me = 1;
        endif;


        $Messages[] = [
            "message_id" => $row["message_id"],
            "sender" => $Users[$row["send_id"]]["firstname"] ." ". $Users[$row["send_id"]]["middlename"] . " " . $Users[$row["send_id"]]["surname"],
            "timestamp" => date("F d, Y h:i a", $row["timestamp"]),
            "text" => $row["message"],
            "avatar" => $Users[$row["send_id"]]["img"],
            "is_me" => $is_me
        ];
    }

    echo json_encode($Messages);

        elseif($_POST["action"] == "send_message"):
            // dump($_POST);

            query("insert INTO messages (message, send_id, timestamp) 
                VALUES(?,?,?)", 
            $_POST["message"], $_POST["sender"], time());

            
        endif;


    }
	else {

			if(!isset($_GET["action"])):
                render("public/messages_system/messages_page.php",[
                ]);
			else:
				
			endif;

			
	}
?>
