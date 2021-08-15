<?php

include("includes/config.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
    }    

include_once('aboutImagePlaceholder.php');


include_once('aboutPlaceholder.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <title>Document</title>
</head>
<body>


<!-- https://stackoverflow.com/questions/26191557/how-to-store-this-data-in-the-database-with-the-textarea -->

<div class="bodySubstitute">

            <div class="container">
                <div class="header">
                    <h2>About Section</h2>
                </div>
                <form id="form" class="form" style="position:relative;">

                    <center style="padding:10px;">
                        <span class="circle img-div" id="main" name="please" >
                            <div class="img-placeholder"  onClick="triggerClick(this)">
                                <h4>Upload image</h4>
                            </div>
                            <img onClick="" id="profileDisplay" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
                            <input type="file" name="profileDisplay" onChange="displayImage(this)" id="profileImage" style="display: none;" multiple>
                        </span> 
                    </center>
                    
                    <center>
                    <div class="form-control">
                        <div class="row">
                        <!-- https://stackoverflow.com/questions/4705848/rendering-html-inside-textarea -->
                       <!-- https://css-tricks.com/textarea-tricks/      -->
                       <!-- https://stackoverflow.com/questions/55638473/how-to-load-value-to-textarea-with-php-echo -->
                       <!-- Refer to About Us Section in index.php for php echo statement  -->
                       <!-- https://stackoverflow.com/questions/427039/justify-text-in-a-html-xhtml-textarea -->
                       <textarea name="" id="textAreaInformation"  placeholder="Write something.." class="textAreaStyle"><?php echo $user["textareaData"]; ?></textarea>
                       </div>
                    </div>      
                    </center>

                    <center>
                        <a id="submitStatus"></a> 
                    </center> 

                    <button type="button" id="textAreaButton">Submit</button>
                </form>
            </div>


</div>

<div class="js"></div>

<script src="about.js"></script>

</body>
</html>