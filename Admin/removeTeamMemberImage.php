<?php

include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
     }

function removeSlide($con,$userLoggedIn) {     

            $firstName = $_POST['firstName'];

                        // https://isabelcastillo.com/mysqli-delete
                
                        // Prepare a DELETE statement
                        
                        // https://www.w3schools.com/sql/sql_orderby.asp

                        $stmt = $con->prepare("DELETE FROM team WHERE id = ? ORDER BY id DESC LIMIT 1");
                        
                        // Check if prepare() failed.
                        // prepare() can fail because of syntax errors, missing privileges, ....
                        
                        if ( false === $stmt ) {
                            error_log('mysqli prepare() failed: ');
                            error_log( print_r( htmlspecialchars($stmt->error), true ) );
                        
                            // Since all the following operations need a valid/ready statement object
                            // it doesn't make sense to go on
                            exit();
                        }
                        
                        // Bind the value to the statement
                        
                        $bind = $stmt->bind_param('i', $firstName);
                        
                        // Check if bind_param() failed.
                        // bind_param() can fail because the number of parameter doesn't match the placeholders
                        // in the statement, or there's a type conflict, or ....
                        
                        if ( false === $bind ) {
                            error_log('bind_param() failed:');
                            error_log( print_r( htmlspecialchars($stmt->error), true ) );
                            exit();
                        }
                        
                        // Execute the query
                        
                        $exec = $stmt->execute();
                        
                        // Check if execute() failed. 
                        // execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
                        
                        if ( false === $exec ) {
                            error_log('mysqli execute() failed: ');
                            error_log( print_r( htmlspecialchars($stmt->error), true ) );
                        } else {
                            echo "Delete successful";
                        }
                        
                        // Close the prepared statement
                        
                        $stmt->close();
                        
                        // Close connection
                        
                        // $mysqli->close();
 
}
removeSlide($con,$userLoggedIn);   

?>