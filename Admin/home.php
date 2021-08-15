<!-- https://stackoverflow.com/questions/10648984/php-sessions-that-have-already-been-started -->

<?php

// https://stackoverflow.com/questions/12281252/how-to-hide-the-warning-message-for-the-session

// ini_set('error_reporting', 0);

include("includes/config.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}
// https://stackoverflow.com/questions/44574904/ajax-undefined-php-variable


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    
    <h1 style="margin: 20px;">Welcome <?php echo $userLoggedIn; ?> </h1>
    </center>
</body>
</html>