<?php
    // configuration

    if($_SERVER["REQUEST_METHOD"] === "POST") {


        if($_POST["action"] == "updateProfile"):
            dump($_FILES);

            


        endif;

    }
    else{
        render("public/myProfile_system/myProfilePage.php");

    }
    
    
?>
