<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}

if (!empty($_POST['firstNumber']) && !empty($_POST['secondNumber']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['parish']) ) {
   //What does PHP receive?
   $datum = new DateTime();
   $startTime = $datum->format('Y-m-d H:i:s');   
   
   $firstNumber = $_POST["firstNumber"];
   $lastName = $_POST["secondNumber"];
   $email = $_POST["email"];
   $address = $_POST["address"];
   $city = $_POST["city"];
   $parish = $_POST["parish"];

    
   $stmt = $con->prepare("INSERT INTO contact(firstNumber,secondNumber,email,address,city,parish,time) VALUES(?,?,?,?,?,?,?)"); 
   $stmt->bind_param('sssssss', $firstNumber, $lastName,$email,$address,$city,$parish,$startTime); // change the d into s in your types
   if ($stmt->execute()) { 
        // it worked
        echo "success";
        } else {
        // it didn't
        echo "failure";
        
        }           
  
    } 
    
    else {
        echo "You didn't enter any information. :(";

    }
  

?>