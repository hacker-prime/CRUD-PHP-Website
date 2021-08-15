<?php

include("includes/config.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}


// first of all, make sure 'post' is set - don't let PHP guessing what to when it's not set.
if(isset($_POST['textArea'])){

            $post = $_POST['textArea'];

            $datum = new DateTime();

            $startTime = $datum->format('Y-m-d H:i:s'); 

            $sql = "SELECT * FROM about";

            if ($result = mysqli_query($con,$sql)){
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0){

                    // this is your SQL QUERY. Never, ever, ever, throw data in sql queries
                    $statement = $con->prepare('INSERT INTO about (textareaData,dateANDtime,userLoggedIn) VALUES (?,?,?)');

                    // this is how to pass data to the statement
                    $statement->bind_param('sss', $post, $startTime,$userLoggedIn);

                    // execute the statement and prints errors
                    if(!$statement->execute()){
                        die('Error '. $mysqli->errno .': '. $mysqli->error);
                    } else {
                        echo "Successfully inserted.";
                    }

                }else{
                    // https://stackoverflow.com/questions/27394710/fatal-error-call-to-a-member-function-bind-param-on-boolean
                    $statement = $con->prepare("UPDATE about SET textareaData=?,dateANDtime=? WHERE userLoggedIn=?");
                    $statement->bind_param('sss', $post, $startTime,$userLoggedIn);
                    $statement->execute();
                    echo "Successfully updated.";
                    $statement->close();

                }    

                
            } else {
                    echo "Database error";
            }  
    
}else if ((isset($_POST['aboutImage']))){
    $aboutImage = $_POST['aboutImage'];
}else{
    $post = '';
}




?>


