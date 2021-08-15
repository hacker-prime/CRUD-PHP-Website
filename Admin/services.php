<?php

include("includes/config.php");

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
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="services.css">
    

    <title>Document</title>
</head>
<body>

<?php include_once('profile_photo.php') ?>

<center>
<!-- The purpose of this button is to add a new form/image so that the administrator can add more photos to the database which will then affect how many images are shown in the slideshow     -->
<button class="addToSlideshow" id="addToSlideshow" onclick=""> <i class="fas fa-plus"></i>  Add services Member   </button>

</center>

<div class="container" id="slideshowForm">
    <!-- I'm not entirely sure why the update image placeholder fits perfectly when using the following style="position:relative;" -->
    <!-- It could be that without it, it moves or is positioned in relation to the window itself but with it, it moves in relation to the element it is within and or is related to  -->
	<form id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
        <!-- https://stackoverflow.com/questions/37920332/force-image-tag-to-be-perfect-circle -->
        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick(this)">
                <h4>Upload image</h4>
            </div>
            <img onClick="" id="profileDisplay" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" name="profileDisplay" onChange="displayImage(this)" id="profileImage" style="display: none;" multiple>
        </span> 

        <center><a class="href">Click the circular image if you're ready to upload an image.</a></center>
        <center><a>For the best experience only upload landscape images.</a></center>

        <div class="form-control">
        
            <label for="nameOfService">Service</label>
            <input type="text" placeholder="Construction" id="nameOfService" />      
            
        </div> 

        <div class="form-control">
                        <div class="row">
                        <!-- https://stackoverflow.com/questions/4705848/rendering-html-inside-textarea -->
                       <!-- https://css-tricks.com/textarea-tricks/      -->
                       <!-- https://stackoverflow.com/questions/55638473/how-to-load-value-to-textarea-with-php-echo -->
                       <!-- Refer to About Us Section in index.php for php echo statement  -->
                       <!-- https://stackoverflow.com/questions/427039/justify-text-in-a-html-xhtml-textarea -->
                       <textarea name="" id="textAreaInformation"  placeholder="Write something.." class="textAreaStyle"></textarea>
                       </div>
        </div>  
           
            <center>
                  <a id="submitStatus"></a> 
            </center>    
        
		<button type="submit" id="upload-button" >Submit</button>
    </form>    
   
</div> 


<div id="belowOriginalForm">

</div>

<?php include("serviceSql.php"); ?>

<!-- https://www.youtube.com/watch?v=YxeJ849KL5E&list=PLPoixqnOuBOTXnTaGjFuylGITyTUy61c9&index=82&t=0s  -->
<?php foreach ($result as $services): ?>


<div class="container" id="slideshowForm" name="deleteSlide">
	<form id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
        <span class="circle img-div" id="main" name="please" >         
            <img onClick="" id="<?php echo $services['imgTagID'] ?>" class="test" style="height:170px;"  src="img/<?php echo $services['serviceImage']; ?>" alt="">
            <input type="file" name="profileDisplay" id="<?php echo $services['fileTagID'] ?>" style="display: none;" multiple>
        </span> 

        

        <center><p style="font-weight: bold;text-decoration: underline;"><?php echo $services['serviceName'] ?></p></center>
        <center><p><?php echo $services['description'] ?></p></center>

        <!-- <center><a class="href">Click the button below to delete the services member from the database.</a></center> -->

  

		<button type="button" onclick="deleteMe(<?php echo $services['id'] ?>)"  id="delete-button" class="deleteButton">Delete</button>
    </form>    
   
</div> 

<?php endforeach; ?>


<div class="js"></div>
</body>
</html>






