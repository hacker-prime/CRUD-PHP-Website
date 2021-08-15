<?php

include("includes/config.php");

include("contactSql.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
else {
	header("Location: register.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Caquality Admin</title>
</head>
<body>

    <div class="flex-container">
    
        
        <div class="container" id="slideshowForm">
            
            <center>
                <strong>Contact</strong>
            </center>
            
            <form id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
            
                <div class="form-control">
            
                    <label for="username">First Number</label>
                    <input type="text" placeholder="1-876-470-4800" id="firstNumber" value="<?php echo$row['firstNumber'] ?>" />

                    <label for="username">Second Number</label>
                    <input type="text" placeholder="1-876-365-3088" id="secondNumber" value="<?php echo$row['secondNumber'] ?>" />

                    <label for="username">Email</label>
                    <input type="text" placeholder="shaynhacker@gmail.com" id="email" value="<?php echo$row['email'] ?>" />

                    <label for="username">Address</label>
                    <input type="text" placeholder="314 Pi Streeet" id="address" value="<?php echo$row['address'] ?>" />

                    <label for="username">City</label>
                    <input type="text" placeholder="Montego Bay" id="city" value="<?php echo$row['city'] ?>" />

                    <label for="username">Parish</label>
                    <input type="text" placeholder="St.James" id="parish" value="<?php echo$row['parish'] ?>" />

                </div>    
                
                    <center>
                        <a id="submitStatus"></a> 
                    </center>    
                
                <button type="submit" id="contact-button" >Submit</button>
            </form>    
        
        </div> 


        <!-- <div class="container" id="slideshowForm">

             <center>
                <strong>Our Hours</strong>
            </center>
            
            <form id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
            
                <div class="form-control">
            
                    <label for="username">Monday</label>
                    <input type="text" placeholder="M:9am-5pm" id="Monday" />

                    <label for="username">Tuesday</label>
                    <input type="text" placeholder="Tu:9am-5pm" id="Tuesday" />

                    <label for="username">Wednesday</label>
                    <input type="text" placeholder="W:9am-5pm" id="Wednesday" />

                    <label for="username">Thursday</label>
                    <input type="text" placeholder="Th:9am-5pm" id="Thursday" />

                    <label for="username">Friday</label>
                    <input type="text" placeholder="F:9am-5pm" id="Friday" />

                    <label for="username">Saturday</label>
                    <input type="text" placeholder="Sa:12pm-4pm" id="Saturday" />

                    <label for="username">Sunday</label>
                    <input type="text" placeholder="Su:12pm-3pm" id="Sunday" />
                </div>    
                
                    <center>
                        <a id="submitStatus"></a> 
                    </center>    
                
                <button type="submit" id="hours-button" >Submit</button>
            </form>    
        
        </div>  -->

    </div>
    <div class="js"></div>

</body>
</html>