<?php


	if(!isset($_SESSION["dnsc_audit"])) {
		redirect("home");
	}
	
	// log out current user, if any
	logout();
	
	// redirect user
	redirect("home");

?>
