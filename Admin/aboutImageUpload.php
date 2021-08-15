<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}


   //What does PHP receive?
    
    //Moves uploaded files to a directory
    $myFiles = $_FILES['aboutImage'];
    $fileTmpName  = $_FILES['aboutImage']['tmp_name'];
    $fileName = $userLoggedIn.'.'.''.time().''.'.'.$_FILES['aboutImage']['name'];

    $targetPath = "img/" . basename($fileName);
    move_uploaded_file($fileTmpName, $targetPath);

    $datum = new DateTime();
    $startTime = $datum->format('Y-m-d H:i:s');   
    
    $stmt = $con->prepare("INSERT INTO aboutimage (name,time,userLoggedIn) VALUES(?,?,?)"); 
    $stmt->bind_param('sss', $fileName, $startTime,$userLoggedIn); // change the d into s in your types
    if ($stmt->execute()) { 
        // it worked
        echo "success";
        } else {
        // it didn't
        echo "failure";
        
        }        
        
 
 
   




?>