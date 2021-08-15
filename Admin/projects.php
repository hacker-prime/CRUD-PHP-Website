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
<!-- <button class="addToSlideshow" id="addToSlideshow" onclick=""> <i class="fas fa-plus"></i>  Add services Member   </button> -->

</center>

<div class="container" id="slideshowForm">
    <!-- I'm not entirely sure why the update image placeholder fits perfectly when using the following style="position:relative;" -->
    <!-- It could be that without it, it moves or is positioned in relation to the window itself but with it, it moves in relation to the element it is within and or is related to  -->
	<form name="form" id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
        <!-- https://stackoverflow.com/questions/23715441/how-to-place-span-elements-side-by-side/23715674 -->
        <!-- https://stackoverflow.com/questions/37920332/force-image-tag-to-be-perfect-circle -->
        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick(this)">
                <h4>Upload image</h4>
            </div>
            <img onClick="" id="profileDisplay" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" onChange="displayImage(this)" id="profileImage" style="display: none;" multiple>
        </span> 
    
        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick2(this)">
                <h4>Upload image</h4>
            </div>
            <img onClick="" id="profileDisplay2" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" onChange="displayImage2(this)" class="profileImage2" id="profileImage2" style="display: none;" multiple>
        </span> 

        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick3(this)">
                <h4>Upload image</h4>
            </div>
            <img onClick="" id="profileDisplay3" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" onChange="displayImage3(this)" class="profileImage3" id="profileImage3" style="display: none;" multiple>
        </span> 

        
        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick4(this)">
                <h4>Upload image</h4>
            </div>
            <img onClick="" id="profileDisplay4" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" onChange="displayImage4(this)" class="profileImage4" id="profileImage4" style="display: none;" multiple>
        </span> 

        <center><a class="href">Click the circular image to upload an image.</a></center>
        <center><a>For the best experience only upload landscape images.</a></center>

        <div class="form-control">
        
            <label for="nameOfproject">Project</label>
            <input type="text" placeholder="Fairview Shopping Center Drainage" id="nameOfproject" />      
            
        </div> 

        <!-- <div style="text-align: center;">
            <label for="projectdatetime">Project (date and time):</label>
            <input type="datetime-local" id="projectdatetime" name="projectdatetime">
        </div> -->

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


<div id="belowOriginalForm"></div>

<?php include("projectsSQL.php"); ?>

    <!-- https://www.youtube.com/watch?v=YxeJ849KL5E&list=PLPoixqnOuBOTXnTaGjFuylGITyTUy61c9&index=82&t=0s  -->
    <!-- https://codepen.io/mahmudulhrabby/pen/GGqdvr?editors=1100 -->
    <div class="main">
    <h1 style="padding:20px;">Projects</h1>

        
<?php 

    // https://stackoverflow.com/questions/17979982/displaying-php-mysql-query-result-with-one-to-many-relationship/17980777        
    // https://www.tutorialrepublic.com/faq/foreach-loop-through-multidimensional-array-in-php.php
    // https://stackoverflow.com/questions/42474165/php-array-group-in-loop-and-create-multi-dimensional-array
    // https://stackoverflow.com/questions/10258345/php-simple-foreach-loop-with-html
    $result = mysqli_query($con,"SELECT
                                        projects.projectid,projects.projectName,projects.description,projectimages.projects_fk,projectimages.projectImageName,projectimages.projectimageid
                                    FROM
                                        projects
                                    JOIN
                                        projectimages ON (projectimages.projects_fk = projects.projectid)                                                                            
                            ");

    $data = array();

    while($row = mysqli_fetch_array($result)){

    $data[$row["projectid"]]["projectName"] = $row["projectName"];
    $data[$row["projectid"]]["description"] = $row["description"];
    $data[$row["projectid"]]["projectid"] = $row["projectid"];
    // $data[$row["projectid"]]["description"] = $row["description"];
    $data[$row["projectid"]]["projectImageName"][$row["projectimageid"]] = array( "log"=>$row["projectImageName"], "projectimageid"=>$row["projectimageid"] ); //Changing the 3rd array from projects_fk to projectimageid made it work. I'm not still sure why
    // print_r($row['projectName']);
    //print_r($row['projectImageName']); // This proves that all the images are collected.It currenly shows 6 images. 
                                        // but I can only access the last value via the multidimensioanl array via the foreach loop below 
    //  print_r($data);
    //var_dump($data);
    
    }           
?>



<?php foreach($data as $value): ?>
    <form style="width: 90%;margin: 0 auto;" id="<?= $value['projectid']; ?>">
        <div class="form-control">            
            <label for="nameOfproject">Project</label>
            <input value="<?= $value['projectName']; ?>" name="projectname" type="text" placeholder="<?= $value['projectName']; ?>" id="nameOfproject" />                  
        </div> 

        <div class="form-control">
            <div class="row">
                <label for="nameOfproject">Description</label>
                <textarea name="" id="textAreaInformation"  placeholder="<?= $value['description']; ?>" class="textAreaStyle"></textarea>
            </div>
        </div> 

        <center>
             <!-- https://www.javascript-coder.com/javascript-form/javascript-get-all-form-objects/ -->
            <button onclick="projectUpdate(this.form);" type="button" id="update-button" >Update</button>
        </center>
    </form>
    

    <ul class="cards">            
        <?php foreach($value["projectImageName"] as $subkey => $subvalue): ?>                                
                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image"><img src="img/<?php echo $subvalue['log']; ?>"></div>
                            <!-- https://stackoverflow.com/questions/4825295/onclick-to-get-the-id-of-the-clicked-button -->
                            <!-- //https://stackoverflow.com/questions/2610497/change-a-html5-inputs-placeholder-color-with-css?rq=1 -->
                            <input type="file" onChange="deleteProjectImage(this)" id="profileImageUpdate" placeholder="Update" style="display:none">
                            <button onClick="triggerClickUpdate(this)" class="projectImage" id="<?php echo $subvalue['projectimageid']; ?>">Update</button>
                            <div style="margin-bottom:10px"></div>
                        </div>
                    </li>                    
        <?php endforeach; ?> 
    </ul>                                    
<?php endforeach; ?>  

    </div>  


<h3 class="made_by">Made with ♡</h3>


<div class="js"></div>
</body>
</html>





