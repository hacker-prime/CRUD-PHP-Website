<?php
include("Admin/includes/config.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
	}
 
include("Admin/aboutImagePlaceholder2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caquality</title>
    <?php include("primary.php"); ?>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />    
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Everything needs to be inside this because everything needs to be blurred as the page loads or as it's loading -->
<div class="container" id="blur">


    <!-- Desktop and Tablet Navigation   -->
    <section>
        <div id="nabvar" class="header nav">
            <h2 class="logo">caquality</h2>
            <ul class="test" id="menu-wrapper">
                <li class="mainMenu">
                    <a href="#" class="btn active home" id="myDIV" data-target="body">Home</a>
                </li>
                <li class="mainMenu">
                    <a href="#about" class="btn" data-target="about">About</a>
                </li>
                <li class="mainMenu" data-target="team"> 
                    <a href="#team" class="btn" data-target="team">Team</a>
                </li>
                <!-- <li>
                    <a href="#">Our Work</a>
                </li> -->
                <li class="mainMenu">
                    <a href="#service" class="btn" data-target="service">Services</a>
                </li>

                <li class="mainMenu">
                    <a href="#projects" class="btn" data-target="projects">Projects</a>
                </li>
              
                <li class="mainMenu">
                    <a href="#contactSection" class="btn" data-target="contact">Contact</a>
                </li>
            </ul>
        </div>
    </section>      

    <!-- Button or Hamburger that opens Mobile Navigation -->
    <!-- https://stackoverflow.com/questions/5067279/how-to-align-this-span-to-the-right-of-the-div -->
    <div class="navButton">
        <span style="cursor:pointer" onclick="openNav()" class="right">&#9776;</span>
    </div>   

     <!-- Mobile Navigation    -->
     <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav -->
     <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#about" onclick="hideSideNav()">About</a>
        <a href="#team" onclick="hideSideNav()">Team</a>
        <a href="#service" onclick="hideSideNav()">Services</a>
        <a href="#projects" onclick="hideSideNav()">Projects</a>
        <!-- <a href="#">Clients</a> -->
        <a href="#contactSection" onclick="hideSideNav()">Contact</a>
    </div>    

    <!-- Mobile Logo -->
     <a href="" class="logoMobile">caquality</a>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">       

    <?php include("Admin/slideshowSQLTable.php"); ?>

    <!-- https://stackoverflow.com/questions/3229905/how-to-start-a-foreach-loop-at-a-specific-index-in-php/3230013 -->

    <?php 
    // https://www.w3schools.com/php/func_array_slice.asp
    $resultArrayOriginal = array_slice($resultArray,0,1);    
    $resultArray2 = array_slice($resultArray, 1)
    
    ?>

    <!-- Slide Show/Image Slider -->
          <div class="slider">

                    <?php foreach ($resultArrayOriginal as $slideOriginal ): ?>

                      <div class="slide current">
                      <!-- https://stackoverflow.com/questions/24650218/image-in-full-screen-with-img-tag -->
                        <img class="slideTest" src="Admin/img/<?php echo $slideOriginal['contractor_profile_photo']; ?>" alt="">      
                      </div>    

                    <?php endforeach; ?>    

                    <?php foreach ($resultArray2 as $slide ): ?>

                            <div class="slide">
                      <!-- https://stackoverflow.com/questions/24650218/image-in-full-screen-with-img-tag -->
                              <img class="slideTest" src="Admin/img/<?php echo $slide['contractor_profile_photo']; ?>" alt="">      
                            </div>    

                    <?php endforeach; ?>                  
          </div>

          <div class="buttons">
            <button id="prev"><i class="fas fa-arrow-left"></i></button>
            <button id="next"><i class="fas fa-arrow-right"></i></button>
          </div>        
    <!-- Slide Show/Image Slider -->

</div>

<!-- About Us Section -->

<?php 

// https://phpdelusions.net/mysqli_examples/prepared_select
include("aboutSQL.php");


?>

<div id="blurAbout">

    <div class="activeAbout">

                    <div id="about" class="about-section">
                            <div class="inner-container">
                                <h1>About Us</h1>
                                    <p class="text">
                                    <!-- Notice: Array to string conversion -->
                                    <?php echo $user["textareaData"]; ?>    
                                    </p>
                                <div class="skills">
                                    <!-- <a>Web Design</a>
                                    <a>Photoshop & Illustrator</a>
                                    <a>Coding</a> -->
                                </div>
                            </div>
                    </div>

    </div>
</div>

<!-- About Us Section -->


<!-- Team Section -->

<?php include("Admin/teamMemberSQL.php"); ?>


<section id="team">

        <h1 class="heading">
            <!--icon---------------->
            <i class="fas fa-rocket"></i> Team Members
        </h1>


            <!--container---------------->
                <div class="containerTeam">


                    <?php foreach ($result as $team): ?>


                                <!--box-1----------->
                                <div class="box">
                                    <!--top-bar---------------->
                                    <div class="top-bar"></div>
                                    <!--nav------------->
                                    <div class="nav">
                                        <!--verify-icon-------->
                                        <!-- <i class="verify fas fa-check-circle"></i> -->
                                        <!--heart-btn--------------->
                                        <input class="heart-btn" type="checkbox" id="heart-btn">
                                        <!-- <label class="heart" for="heart-btn"></label> -->
                                    </div>
                                    <!--img and details---------------->
                                    <div class="details">
                                        <img src="<?php echo "Admin/img/" .$team['teamimage'] ?>" alt="">                    
                                        <!-- https://stackoverflow.com/questions/2300142/how-to-add-extra-whitespace-in-php -->
                                        <strong><?php echo $team['firstName']?> <?php str_repeat('&nbsp;', 1) ?> <?php echo $team['lastName']?> </strong>
                                        <p><?php echo $team['position'] ?></p>   
                                    </div>
                                    <!--view-btns------------------->
                                    <div class="btn">
                                        <!-- <a href="#"><i class="fas fa-clipboard-list"></i>Assign</a> -->
                                        <!-- <a href="#"><i class="fas fa-eye"></i>View</a> -->
                                    </div>
                                </div>   

                    <?php endforeach; ?>


                </div>
        
        
</section> 
<!-- Team Section -->


<!-- Services Section -->

<?php include("Admin/serviceSql.php"); ?>


<div id="service">
    <!-- https://www.youtube.com/watch?v=maeDgHcK_Os -->

    <div id="bodySubstitute">

                <section class="services">
                            <!--heading---------------->
                            <div class="s-heading">
                                <h1>Ser<font color="#33b5ff">vic</font>es</h1>
                                <p>We Provide The Best In Class Servies For Our Customers</p>
                            </div>


                                            <!--services-box-container------------------->
                                        <div class="s-box-container">
                                               <?php foreach ($result as $service): ?>

                                                        <!--service-box-1---------------->	
                                                        <div class="s-box">
                                                            <!--top-bar-------->
                                                            <div class="bar"></div>
                                                            <!--img---------->
                                                            <img alt="1" src="<?php echo "Admin/img/". $service['serviceImage'] ?>" />
                                                            <!--servies-name---------->
                                                            <h1><?php echo $service['serviceName'] ?></h1>
                                                            <!--details------>
                                                                <p><?php echo $service['description'] ?></p>
                                                            <!--btn---------->
                                                            <!-- <a class="s-btn" id="aTagSubstitute" href="#">More</a> -->
                                                        </div>
                                               <?php endforeach; ?>         
                                        </div>    

            
                </section>

    </div>  

</div>


<!-- Services Section -->

<!-- Projects Section -->

<?php 
    //Inspired by Amind/projects.php
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
    $data[$row["projectid"]]["projectImageName"][$row["projectimageid"]] = array( "log"=>$row["projectImageName"], "projectimageid"=>$row["projectimageid"] ); 
    }           
?>


<div id="projects">
    <!-- https://www.youtube.com/watch?v=maeDgHcK_Os -->
    <h1 style="color:black;padding-top: 10%;">Projects</h1>
    <?php foreach($data as $value): ?>
        <div class="projectData">    
                    
            <center style="text-decoration:underline;" class="projectName"><?= $value['projectName']; ?></center> 
            <center style="color:black;padding:10px;"> <?= $value['description']; ?> </center>
            <ul class="cardsProject">            
                <?php foreach($value["projectImageName"] as $subkey => $subvalue): ?>                                
                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img src="Admin/img/<?php echo $subvalue['log']; ?>"></div>
                                    <div style="margin-bottom:10px"></div>
                                </div>
                            </li>
                <?php endforeach; ?> 
            </ul> 
        </div>                                    
    <?php endforeach; ?>  

</div>


<!-- Projects Section -->

<!-- Contact Section -->

<?php include("Admin/contactSql.php"); ?>


<div id="contactPrimary">
             
                                 

            <div id="asterickSubstitute">

                <div class="containerSubstitute" id="contactSection">  

                        <form id="contact" action="" method="post">
                        
                        <h3>Quick Contact</h3>
                        <h4>Contact us today, and get a reply with in 24 hours!</h4>
                        <fieldset>
                            <!-- The input tag directly below had an attribute or property  called autofocus and it seems to have caused the page to scroll to the bottom on page load                     -->
                            <input placeholder="Your name" type="text" tabindex="1" name="name" id="name">
                            <div class="error" id="nameError"></div>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Your Email Address" type="text" tabindex="2" id="email" name="email">
                            <div class="error" id="emailError"></div>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Your Phone Number" type="text" tabindex="3" id="phone" name="phone">
                            <div class="error" id="phoneError"></div>
                        </fieldset>
                        <fieldset>
                            <textarea placeholder="Type your Message Here...." type="text" tabindex="5" id="message" name="message"></textarea>
                        </fieldset>
                        <fieldset>
                            <button type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                        </fieldset>
                        <div class="success" id="success"></div>

                        </form>  

                        <div class="js"></div>
                </div>   

            </div>

            <!-- <div id="contactInfoPlus" class="contactInfoPlus" style="display:none;" > -->

            <div id="contactInfoPlus" class="contactInfoPlus" >

                       <ul style="list-style:none;" class="contact-list">

                             <li class="list-item">
                                 <i class="fa fa-map-marker-alt">
                                    <span class="contact-text place"><?php echo $row['address'] ?></span>
                                 </i>
                    
                             </li>

                             <li class="list-item">
                                 <i class="fa fa-phone-alt">
                                    <span class="contact-text place"><?php echo $row['firstNumber'] ?> </span>
                                 </i>
                    
                             </li>

                             <li class="list-item">
                                 <i class="fa fa-phone-alt">
                                    <span class="contact-text place"><?php echo $row['secondNumber'] ?> </span>
                                 </i>
                    
                             </li>

                             <li class="list-item">
                                 <i class="fa fa-envelope">
                                    <span class="contact-text place"><?php echo $row['email'] ?> </span>
                                 </i>
                    
                             </li>



                             <!-- <li class="list-item">
                                 <i class="fa fa-phone fa-2x">
                                    <span class="contact-text place">(212) 555-2368</span>
                                 </i>
                    
                             </li>

                             <li class="list-item">
                                 <i class="fa fa-envelope fa-2x">
                                    <span class="contact-text place">caquality@gmail.com</span>
                                 </i>
                    
                             </li> -->

                        </ul>                         

            </div>        
            
 <?php include("Admin/contactSql2.php"); ?>

            <!-- <script type='text/javascript'> 
                    var submitStatus = document.getElementById("contactInfoPlus");
                    alert(submitStatus.innerHTML); 
                    console.log(submitStatus.innerHTML);           
                </script> -->



                                          
         
</div>            

<!-- Contact Section -->

<!-- Footer Section -->

<div class="copyright" style="color:black;padding:1%;">&copy; ALL RIGHTS RESERVED</div>

<!-- Footer Section -->








     <!-- Pop Up/Modal On Page Load -->
     <div id="popup">
        <h2>CA Quality</h2>
        <p style="color:black;">
            Welcome to Quality Construction
        </p>
        <img src="img/popupImage.png" width="100%" height="100%">
        <a href="#" onclick="toggle()" id="popupCloseButton">Close</a>
    </div>
    <!-- Pop Up/Modal On Page Load -->
                                                    
    <!-- <img id="top-page" src="https://svgshare.com/i/LW3.sv" alt="Top">     -->
    <!-- https://www.flaticon.com/free-icon/up-arrow_992534?term=arrow%20up&page=1&position=45 -->
    <img id="top-page" src="img/up-arrow.png" alt="Top">    
    <script src="index.js"></script>


    

</body>
</html>