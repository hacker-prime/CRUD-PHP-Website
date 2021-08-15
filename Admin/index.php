<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>  
<!-- https://www.w3schools.com/howto/howto_js_vertical_tabs.asp -->
<!-- https://codepen.io/RajRajeshDn/pen/LKzZNe -->

        
            <div class="wrapper">
                            <div class="sidebar">
                                                <h2>Dashboard</h2>
                                                    <section class="header">
                                                                        <ul>
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="slideshow"><i class="fas fa-images"></i>Slideshow</a></li>
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="about"><i class="fas fa-address-card active"></i>About</a></li>
                                                                            <!-- https://fontawesome.com/icons/images?style=regular -->
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="team"><i class="fas fa-users"></i>Team</a></li>
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="services"><i class="fas fa-tools"></i>Services</a></li>
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="projects"><i class="fas fa-tasks"></i>Projects</a></li>
                                                                            <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="contact"><i class="fas fa-phone"></i>Contact</a></li>
                                                                        </ul> 
                                                    </section>  
                                                    
                            </div>

                                            <div class="main_content">
                                               
                                                    <div class="info" id="info">

                                                       <?php include("home.php") ?>   
                                                    </div>

                                                    <div id="x">

                                                    </div>
                                            </div>
                                            
            </div>

                <!-- https://stackoverflow.com/questions/5067279/how-to-align-this-span-to-the-right-of-the-div -->
            <div class="navButton">
                <span style="cursor:pointer" onclick="openNav()" class="right">&#9776;</span>
            </div>
            
            <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav();dynamicMenu(this)">&times;</a>
                <a href="#home" onclick="hideSideNav();dynamicMenu(this)" data-target="home">Home</a>
                <a href="#slideshow" onclick="hideSideNav();dynamicMenu(this)" data-target="slideshow">Slideshow</a>
                <a href="#about" onclick="hideSideNav();dynamicMenu(this)" data-target="about">About</a>
                <!-- <a href="#">Clients</a> -->
                <a href="#team" onclick="hideSideNav();dynamicMenu(this)" data-target="team">Team</a>
                <a href="#services" onclick="hideSideNav();dynamicMenu(this)" data-target="services">Services</a>
                <li><a onclick="dynamicMenu(this);" href="#" id="specificFile" data-target="projects">Projects</a></li>
                <a href="#contact" onclick="hideSideNav();dynamicMenu(this)" data-target="contact">Contact</a>

            </div>

<script src="main.js"></script>

</body>
</html>


