<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}

if (!empty($_POST['formArray']) && !empty($_POST['image']) && !empty($_POST['description'] && !empty($_POST['serviceName']))  ) {


   //What does PHP receive?
   $formArray = $_POST["formArray"];
   $jsonDecodeformArray = json_decode($formArray, true);
   $fileTagCloneID = $jsonDecodeformArray['fileTagCloneID'];

   $datum = new DateTime();
   $startTime = $datum->format('Y-m-d H:i:s');   
   
   $description = $_POST["description"];
   $serviceName = $_POST['serviceName'];
    
   $stmt = $con->prepare("INSERT INTO services(serviceName,time,fileTagID,description) VALUES(?,?,?,?)"); 
   $stmt->bind_param('ssss', $serviceName, $startTime,$fileTagCloneID,$description); // change the d into s in your types
   if ($stmt->execute()) { 
        // it worked
        echo "success";
        } else {
        // it didn't
        echo "failure";
        
        }           
  
    } else {
        echo "You didn't enter any information. :(";

    }
   
    // https://stackoverflow.com/questions/17834243/how-to-read-formdata-object-in-php    
    if (isset($_FILES["myFiles"]) && isset($_POST["description"]) ){

        //Moves uploaded files to a nice directory
        $image = $_FILES['myFiles'];
        $fileTmpName  = $_FILES['myFiles']['tmp_name'];
        $fileName = time().''.'.'.$_FILES['myFiles']['name'];


        $targetPath = "img/" . basename($fileName);
        move_uploaded_file($fileTmpName, $targetPath);

        $description = $_POST["description"];


        $sql = "UPDATE services SET serviceImage=? WHERE description=?";

        $stmt = $con->prepare($sql);
    
        $stmt->bind_param('ss', $fileName, $description);
    
        $stmt->execute();  
    
        if ($stmt->error) {
        echo "FAILURE!!! " . $stmt->error;
        }
        else echo "Updated {$stmt->affected_rows} rows";
    
        $stmt->close();    
    }



?>