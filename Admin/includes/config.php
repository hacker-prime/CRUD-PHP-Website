<?php
	ob_start();
	session_start();

	// https://www.php.net/manual/en/timezones.others.php
	$timezone = date_default_timezone_set("Jamaica");
	
	$con = mysqli_connect("localhost", "root", "Archimedes3.14", "u704189932_caquality");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>