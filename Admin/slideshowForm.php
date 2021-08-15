<div class="container" id="slideshowForm">
    <!-- I'm not entirely sure why the update image placeholder fits perfectly when using the following style="position:relative;" -->
    <!-- It could be that without it, it moves or is positioned in relation to the window itself but with it, it moves in relation to the element it is within and or is related to  -->
	<form id="form" action="" class="form" method="post" style="position:relative;" enctype="multipart/form-data">
        <!-- https://stackoverflow.com/questions/37920332/force-image-tag-to-be-perfect-circle -->
        <span class="circle img-div" id="main" name="please" >
            <div class="img-placeholder"  onClick="triggerClick(this)">
                <h4>Update image</h4>
            </div>
            <img onClick="" id="profileDisplay" class="test" style="height:170px;"  src="<?php echo $fileName ?>" alt="">
            <input type="file" name="profileDisplay" onChange="displayImage(this)" id="profileImage" style="display: none;" multiple>
        </span> 

        <a class="href">Click here if you're ready to upload an image.</a>
		<button type="submit" id="upload-button">Submit</button>
    </form>    
   
</div> 