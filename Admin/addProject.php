<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}

// if ( !empty($_POST['formArrayprojects']) && !empty($_POST['myFiles']) && !empty($_POST['description']) && !empty($_POST['projectName']) && !empty($_POST['projectdatetime'])   ) {
    if ( isset($_POST['description']) && isset($_POST['projectName']) ) {

            $datum = new DateTime();
            $startTime = $datum->format('Y-m-d H:i:s');               
            $description = $_POST["description"];
            $projectName = $_POST['projectName'];
                
            $stmt = $con->prepare("INSERT INTO projects(projectName,description) VALUES(?,?)"); 

            $stmt->bind_param('ss', $projectName,$description); // change the d into s in your types
            if ($stmt->execute()) { 
                    // it worked
                    // echo "success";
                    $last_id = mysqli_insert_id($con);
                    echo "New record created successfully. Last inserted ID is: " . $last_id;
                    $stmt->close();           
                            
                            // $array=json_decode($_POST['myFiles']); //https://stackoverflow.com/questions/5035547/pass-javascript-array-php
                            //Moves uploaded files to a nice directory
                            
                            foreach ($_FILES['myFiles']['name'] as $name => $value){ 
                                $image = $_FILES['myFiles'];
                                $fileTmpName  = $_FILES['myFiles']['tmp_name'][$name];
                                $fileName = time().''.'.'.$_FILES['myFiles']['name'][$name];

                                $targetPath = "img/" . basename($fileName);
                                move_uploaded_file($fileTmpName, $targetPath);
                                
                                $stmt = $con->prepare("INSERT INTO projectimages(projects_fk,projectImageName) VALUES(?,?)"); 
                        
                                $stmt->bind_param('is', $last_id, $fileName);
                                    
                                $stmt->execute();  
                            
                                if ($stmt->error) {
                                    echo "FAILURE!!! " . $stmt->error;
                                } else {         
                                    echo "Updated {$stmt->affected_rows} rows in the table with the foreign key.";   
                                } 
                        
                                $stmt->close(); 
                            }                                                          

            } else {
            // it didn't
            echo "failure";                    
            }           
  
    } else {
        echo "You didn't enter any information. :(";
    }


   
    // https://stackoverflow.com/questions/17834243/how-to-read-formdata-object-in-php    
    //I may not need this snippet anymore since I am inserting the image name in a different table due to establishing a one to many relationship between the projects table and the projectimages table
    // if (isset($_FILES["myFiles"]) && isset($_POST["description"]) ){

    //     //Moves uploaded files to a nice directory
    //     $image = $_FILES['myFiles'];
    //     $fileTmpName  = $_FILES['myFiles']['tmp_name'];
    //     $fileName = time().''.'.'.$_FILES['myFiles']['name'];


    //     $targetPath = "img/" . basename($fileName);
    //     move_uploaded_file($fileTmpName, $targetPath);

    //     $description = $_POST["description"];


    //     $sql = "UPDATE projects SET projectImage=? WHERE description=?";

    //     $stmt = $con->prepare($sql);
    
    //     $stmt->bind_param('ss', $fileName, $description);
    
    //     $stmt->execute();  
    
    //     if ($stmt->error) {
    //     echo "FAILURE!!! " . $stmt->error;
    //     }
    //     else echo "Updated {$stmt->affected_rows} rows";
    
    //     $stmt->close();    
    // }



?>