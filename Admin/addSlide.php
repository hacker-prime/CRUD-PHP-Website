<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}

function addSlide($con,$userLoggedIn) {     
    //What does PHP receive?
   $formCloneArray = $_POST["formCloneArray"];
   $jsonDecodeformCloneArray = json_decode($formCloneArray, true);
   $fileTagCloneID = $jsonDecodeformCloneArray['fileTagCloneID'];
   $imgTagCloneID = $jsonDecodeformCloneArray['imgTagCloneID'];

    
    //Moves uploaded files to a nice directory
    $myFiles = $_FILES['myFiles'];
    $fileTmpName  = $_FILES['myFiles']['tmp_name'];
    $fileName = $userLoggedIn.'.'.''.time().''.'.'.$_FILES['myFiles']['name'];

    $targetPath = "img/" . basename($fileName);
    move_uploaded_file($fileTmpName, $targetPath);

    $datum = new DateTime();
    $startTime = $datum->format('Y-m-d H:i:s');   
    
    // https://www.tutorialrepublic.com/php-tutorial/php-mysql-prepared-statements.php
    // https://stackoverflow.com/questions/27332954/submit-timestamp-to-mysql-database-with-php-mysqli
    $stmt = $con->prepare("INSERT INTO contractor_profile_photo(userName,contractor_profile_photo,time,fileTagID,imgTagID) VALUES(?,?,?,?,?)"); 
    $stmt->bind_param('sssss', $userLoggedIn, $fileName, $startTime,$fileTagCloneID,$imgTagCloneID); // change the d into s in your types
    // $result = $stmt->execute(); 
    // https://stackoverflow.com/questions/9991882/stmt-execute-how-to-know-if-db-insert-was-successful
    if ($stmt->execute()) { 
        // it worked
        echo "success";
        // echo $jsonDecodeformCloneArray['fileTagCloneID'];
        // echo $jsonDecodeformCloneArray['imgTagCloneID'];
        //https://stackoverflow.com/questions/34208064/notice-array-to-string-conversion-in-c-xampp-htdocs-example-echo-php-on-line-8
        // print_r($jsonDecodeformCloneArray);
        // echo $jsonDecodeformCloneArray; //<b>Notice</b>:  Array to string conversion 
        //Array to string conversion https://stackoverflow.com/questions/34208064/notice-array-to-string-conversion-in-c-xampp-htdocs-example-echo-php-on-line-8
        // var_dump($jsonDecodeformCloneArray);
        } else {
        // it didn't
        echo "failure";
        
        }           
 
}
addSlide($con,$userLoggedIn);    




?>