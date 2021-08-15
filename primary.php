<style>   

            /* https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav   */
            body{
                margin: 0;
            }

            /* https://codepen.io/DraganaB/pen/xMOjgZ */
            html{
                scroll-behavior: smooth;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                right: 0;
                background-color: #33b5ff;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }
            
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: white;
                display: block;
                transition: 0.3s;
                font-family: "Lato", sans-serif;
                text-align: center;


            }
            
            .sidenav a:hover {
                color: #f1f1f1;
            }
            
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 3%;
                font-size: 36px;
                margin-left: 50px;
            }
            
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }

            .navButton .right { 
                right: 3%;
                top: 1%;
                position: absolute;
                color:#33b5ff;
                font-size: xx-large;
            }

            @media only screen and (min-width: 801px) {
                /* For desktop: */
                span{
                    /* The reason that this is being commented out is so we can see the textual information on the right side of the content section at the bottom of the website
                    display:none; */
                }
            
            }

            section
            {
                /* position: absolute; */
                width: 100%;
                height: 100%;
                /* background: #fff; */
                display: grid;
                justify-content: center;
                align-items: center;
                /* https://stackoverflow.com/questions/24246914/website-wont-scroll-down */
                overflow: hidden;
                /* https://www.tomred.net/css-html-js/disable-or-enable-horizontal-or-vertical-scrollbar.html#:~:text=To%20disable%20the%20horizontal%20scrollbar,expands%20to%20exceed%20the%20space. */
                overflow-x: hidden;
                /* top: 0px; */
            }
            
            .header
            {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 80px;
                padding: 0 5%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-sizing: border-box;
                display:row;
                font-family: "Lato", sans-serif;
                background:white;

            }
            .header .logo
            {
                /* opacity: 0; */
                margin: 0;
                padding: 0;
                font-size: 2em;
                /* text-transform: uppercase; */
                color: #33b5ff;
            
            }
            .header ul
            {
                margin: 0;
                padding: 0;
                z-index: 100;
                display: flex;
            }
            .header ul li
            {
                /* opacity: 0; */
                list-style: none;
                margin: 0 10px;
                animation: fadeInRight 0.5s linear forwards;
            }
            .header ul li:last-child
            {
                margin-right: 0;
            }
            .header ul li a
            {
                text-decoration: none;
                font-size: 1.2em;
                color: black;
                padding: 15px 10px;
                letter-spacing: 2px;
            }
            .header ul li a.active,
            .header ul li a:hover
            {
                background: #33b5ff;
                color: #fff;
            }


            @media only screen and (max-width: 800px) {
                /* For desktop: */
                section{
                    display:none;
                }
            
            }

            @media only screen and (max-width: 800px) {
                /* For mobile: */
                .logoMobile{
                    top:5px;
                    left: 5px;
                    position: absolute;
                    padding: 10px;
                    font-size: 1.5em;
                    text-decoration: none;
                    color:black;
                    font-family: "Lato", sans-serif;
                    font-weight: bold;
                    color:#33b5ff;

                }

                .companySection1 {
                    padding-top: 0px !important;
                }

                .topSection2 {
                    text-align: center;
                    font-size: 1em !important;
                    padding: 10px;
                }

                .card__image {
                    /* padding-bottom: 60px !important; */
                
                }
            
            }

            @media only screen and (min-width: 800px) {
                /* For desktop: */
                .logoMobile{
                    display: none;

                }
            
            }
            
            .cards {
                margin: 0 auto;
                /* max-width: 1000px; */
                display: grid;
                /* grid-template-columns: repeat(auto-fill, minmax(225px, 2fr)); */
                grid-template-columns: repeat(2,1fr);
                grid-auto-rows: auto;
                /* gap: 20px; */
                font-family: sans-serif;
                padding-top: 175px;
                /* position: absolute; */

            }

            .cardsAnalytics {
                margin: 0 auto;
                /* max-width: 1000px; */
                display: grid;
                /* grid-template-columns: repeat(auto-fill, minmax(225px, 2fr)); */
                grid-template-columns: repeat(2,1fr);
                grid-auto-rows: auto;
                /* gap: 20px; */
                font-family: sans-serif;
                padding-top: 10px;
                padding-bottom:10%;
                /* position: absolute; */

            }

            .division{
                display: grid;
                grid-template-columns: repeat(1,1fr);
                grid-auto-rows: auto;
            }


            @media only screen and (max-width: 770px) {
                /* For mobile: */
                .cards{
                    grid-template-columns: repeat(1,1fr);
                    padding-top: 50px;
                }

                .topSection{
                    padding-top: 0px !important;
                }

                .cardsAnalytics {
                    grid-template-columns: repeat(1,1fr);    
                }
            
            }


            .cards * {
                box-sizing: border-box;
            }

            .card__image {
                width: 100%;
                /* height: 200px; */
                object-fit: cover;
                display: block;
                padding-bottom: 45px;
                /* border-top: 2px solid #333333; */
                /* border-right: 2px solid #333333; */
                /* border-left: 2px solid #333333;
                /* width: 100%;
                height: 200px;
                object-fit: cover;
                display: block;
                border-top: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
            }

            .card__image__companies{
            padding-bottom: 0px !important; 
            width: 100%;
            object-fit: cover;
            display: block;
            }

            .card__content {
                line-height: 1.5;
                font-size: 0.9em;
                padding: 15px;
                background: #fafafa;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333;
            }

            .card__content > p:first-of-type {
                margin-top: 0;
            }

            .card__content > p:last-of-type {
                margin-bottom: 0;
            }

            .card__info {
                padding: 15px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #555555;
                background: #eeeeee;
                font-size: 0.8em;
                border-bottom: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333;
            }

            .card__info i {
                font-size: 0.9em;
                margin-right: 8px;
            }

            .card__link {
                color: #64968c;
                text-decoration: none;
            }

            .card__link:hover {
                text-decoration: underline;
            }

            .topSection{
                text-align: center;
                font-size: 1.5em;
                padding-top: 25px;
                text-transform: uppercase;
            }

            .topSection2{
                text-align: center;
                font-size: 1.5em;
                padding: 10px;
                
            }

            .deliverySection{
                text-align: center;
            }

            .wrapper{
                float:left;
                width:100%;
                text-align:center;
            }

            /* https://codepen.io/lauraeddy/pen/KXEwOW?editors=1100 */
            .button{
                display: inline-block;
                color: #fff;
                font-family: helvetica, sans-serif;
                font-size: 20px;
                font-weight: 900;
                background-color: #000;
                border: 0;
                padding: 20px 20px;
                line-height: 0.428571;
                background-color: white;
                color:#FF4444;
                border:2px solid #FF4444;

            }

            .button2{
                display: inline-block;
                color: #fff;
                font-family: helvetica, sans-serif;
                font-size: 20px;
                font-weight: 900;
                background-color: #FF4444;
                border: 0;
                padding: 20px 20px;
                line-height: 0.428571;
                border:2px solid #FF4444;


            }

            .customerTopSection{
                text-decoration: none;
                color:white;
            }

            /* .company{
                text-align: center;
                font-size: 2.5em;
                font-family: "Lato", sans-serif;
                padding-top: 100px;

                
            } */

            /* Solid border */
            /* hr.solid {
                border-top: 3px solid black;
                position: relative;
                top: 50px;
            } */

            .companySection1{
                text-decoration: none;
                padding-top: 50px;
            }

            .companySection{
                /* padding-top:250px; */
            }
            
            .driverButton{
                text-decoration: none;
                color:#FF4444;
            }

            .companyButton{
                text-decoration: none;
                color:#FF4444;
            }

            /* .projectData{
                display: flex;
                flex-wrap: wrap;

            }

            .project_section{
                display: flex;
                padding: 1rem;
            } */

            

            .projectName{
                color:black !important;
            }

            .cardsProject {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            }

            /* .card_image{
                height: auto;
                max-width: 100%;
                vertical-align: middle;
            } */

            .card_image img{
                height: auto;
                max-width: 100%;
                vertical-align: middle;
                /* min-height: 100vh; */
            }

            .cards_item {
            display: flex;
            padding: 1rem;
            }

            @media (min-width: 40rem) {
            .cards_item {
                width: 50%;
            }
            }

            @media (min-width: 56rem) {
            .cards_item {
                width: 24.3333%;
            }
            }

            .card {
            background-color: white;
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            }















            /* Services Section */

            /* .card2{
                padding-top: 50px;
            } */

            .cards2 {
                margin: 0 auto;
                /* max-width: 1000px; */
                display: grid;
                /* grid-template-columns: repeat(auto-fill, minmax(225px, 2fr)); */
                grid-template-columns: repeat(2,1fr);
                grid-auto-rows: auto;
                /* gap: 20px; */
                font-family: sans-serif;
                padding-top: 175px;
                position: absolute;

            }

            .aboutSectionImg{
                /* height: 100vh; */
                width: 90% !important;
                padding: 5%;    
            }


            @media only screen and (max-width: 770px) {
                /* For mobile: */
                .cards{
                    grid-template-columns: repeat(1,1fr);
                    padding-top: 50px;
                }

                .topSection{
                    padding-top: 0px !important;
                }

                .cardDelivery{
                padding-top:0px; 
                padding: 5px;      
                }

                .transportationCard{
                padding-top:0px !important;    
                }

                .card__info2 {
                padding:0px !important;    
                }

                .aboutSectionImg{
                    height: 50vh;
                    width: 90%;
                    padding: 5%;    
                }
            
            }


            .cards * {
                box-sizing: border-box;
            }

            .card__image2 {
                width: 100%;
                /* height: 200px; */
                object-fit: cover;
                display: block;
                padding-bottom: 45px;
                /* border-top: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
                width: 100%;
                /* height: 200px; */
                object-fit: cover;
                display: block;
                /* border-top: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
            }

            .card__content2 {
                /* line-height: 1.5; */
                font-size: 2.5em;
                /* padding: 15px;
                background: white; */
                font-family: "Lato", sans-serif;
                /* border-right: 2px solid #333333;
                border-left: 2px solid #333333;
            */
            }

            .deliveryContent{
                font-size: 1.5em;
                font-family: "Lato", sans-serif;
            }

            .transportationContent{
                font-size: 1.5em;
                font-family: "Lato", sans-serif;
            }

            @media only screen and (max-width: 800px) {
                .deliveryContent {
                    font-size: 1em !important;
                }
                .transportationContent{
                    font-size: 1em !important;
                    padding-bottom: 11% !important;
                }
            }

            .servicesSectionContent{
                text-align: center;
            }

            .card__info2 {
                padding: 15px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #555555;
                /* background: #eeeeee; */
                font-size: 0.8em;
                /* border-bottom: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
            }

            .card__info2 i {
                font-size: 0.9em;
                margin-right: 8px;
            }

            #nabvar{
                top: 0px;
                
            }

            /* https://codepen.io/sitanotern1337/pen/MPVbeL
            I had to modify the code a bit. It's similar to the code shown in this video
            https://www.youtube.com/watch?v=V9CY0F4Wc7M (The "scroll" event in JavaScript | window.onscroll) */
            .hide {
                display: none;
            }
            
            

            /* https://stackoverflow.com/questions/1144805/scroll-to-the-top-of-the-page-using-javascript?noredirect=1&lq=1   */
            #top-page {
                width: 50px;
                position: fixed;
                right: 30px;
                bottom: 30px;
                cursor: pointer;
                color: white;
                display: none;
            }


            .cardsServices {
                margin: 0 auto;
                /* max-width: 1000px; */
                display: grid;
                /* grid-template-columns: repeat(auto-fill, minmax(225px, 2fr)); */
                grid-template-columns: repeat(2,1fr);
                grid-auto-rows: auto;
                /* gap: 20px; */
                font-family: sans-serif;
                /* padding-top: 175px; */
                /* position: absolute; */

            }

            @media only screen and (max-width: 770px) {
                /* For mobile: */
                .cardsServices{
                    grid-template-columns: repeat(1,1fr);
                    padding-top: 50px;
                }

                .cardDelivery{
                padding-top:0px;    
                }

                .cardDeliveryImg{
                padding-top:0px; 
                padding-bottom:0px !important;   
                }

                .card__image2{
                padding-bottom:0px !important;      
                }

                .topSection{
                    padding-top: 0px !important;
                }
            
            }

            .servicesHeader{
                text-align: center;
                font-size: 1.5em;
                padding-top: 30px;
                text-transform: uppercase;
                font-family: sans-serif;
                font-weight: bold;
            }

            .contactHeader{
                text-align: center;
                font-size: 1.5em;
                /* padding-top: 30px; */
                text-transform: uppercase;
                font-family: sans-serif;
                font-weight: bold;
            }


            .cardsContact {
                margin: 0 auto;
                /* max-width: 1000px; */
                display: grid;
                /* grid-template-columns: repeat(auto-fill, minmax(225px, 2fr)); */
                grid-template-columns: repeat(1,1fr);
                grid-auto-rows: auto;
                /* gap: 20px; */
                font-family: sans-serif;
                /* padding-top: 175px; */
                /* position: absolute; */

            }

            @media only screen and (max-width: 770px) {
                /* For mobile: */
                .cardsContact{
                    grid-template-columns: repeat(1,1fr);
                    padding-top: 50px;
                }

                .topSection{
                    padding-top: 0px !important;
                }
            
            }

            .card__image3 {
                width: 50% !important;
                margin:auto;
                /* height: 200px; */
                object-fit: cover;
                display: block;
                /* padding-bottom: 45px; */
                /* border-top: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
                width: 100%;
                /* height: 200px; */
                object-fit: cover;
                display: block;
                /* border-top: 2px solid #333333;
                border-right: 2px solid #333333;
                border-left: 2px solid #333333; */
            }

            .card__content3 {
                /* font-size: 2em;    */
                font-family: "Lato", sans-serif;
            }


            @media only screen and (max-width: 770px) {
                /* For mobile: */
                .card__image3 {
                    width: 100% !important;
                
                
                }

                .aboutContent{
                    font-size: 1.5em;

                }

                .aboutcard2{
                padding-top:0px;
                }

                .aboutContent{
                font-size: 1em !important;
                padding:5px;   
                }
            
            }










            @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

            a, a:hover {
                text-decoration: none;
            }

            .socialbtns, .socialbtns ul, .socialbtns li {
            margin: 0;
            padding: 5px;
            }

            .socialbtns li {
                list-style: none outside none;
                display: inline-block;
            }

            .socialbtns .fa {
                width: 40px;
                height: 28px;
                color: #000;
                background-color: #FFF;
                border: 1px solid #000;
                padding-top: 12px;
                border-radius: 22px;
                -moz-border-radius: 22px;
                -webkit-border-radius: 22px;
                -o-border-radius: 22px;
            }

            /* .socialbtns .fa:hover {
                color: #FFF;
                background-color: #FF4444;
                border: 1px solid #000;
            } */


            .socialbtns .fa-facebook:hover {
                color: #FFF;
                background-color: #FF4444;
                border: 1px solid #000;
            }

            .socialbtns .fa-twitter:hover {
                color: #FFF;
                background-color: #FF4444;
                border: 1px solid #000;
            }

            .socialbtns .fa-instagram:hover {
                color: white;
                border: 1px solid #000; 
                background: #FF4444;
            

            }



            .socialbtns .fa-facebook{
                color:blue;
            }
            
            .socialbtns .fa-twitter{
                color:#87CEFA;
            }
            
            /* https://stackoverflow.com/questions/56574105/how-to-add-a-color-gradient-to-the-instagram-logo-without-affecting-the-visibili */
            .socialbtns .fa-instagram{
                color: transparent;
                background: -webkit-radial-gradient(30% 107%, circle, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background: -o-radial-gradient(30% 107%, circle, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background-clip: text;
                -webkit-background-clip: text;
            }



            .email{
                text-align: center;
                /* font-size: 1em; */
                /* padding-top: 30px; */
                font-family: sans-serif;
                font-weight: bold;
                color:black;
            }

            .email :hover{
                color:#FF4444;
            }


            /* Pop Up/Modal   */

            @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');

            *{
                margin:0;
                padding:0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                text-align: center;
            }

            .container{
                /* position:relative; */
                width:100%;
                min-height: 100vh;
                display:flex;
                justify-content: center;
                align-items:center;
                /* background: #fff173; */
                transition: 0.5s;
                padding:20px;
            }

            .container#blur.active{
                filter:blur(20px);
                pointer-events:none;
                user-select:none;
            }

            #blurAbout.active{
                filter:blur(20px); 
            }


            .container .content {
                position: relative;
                max-width:800px;
            }

            h2 {
                font-weight: 600;
                margin-bottom: 10px;
                color: #333;
                text-align: center;
            }

            .container .content img {
                max-width: 100%;
                display:block;
            }

            #popupCloseButton{
                position: relative;
                padding: 5px 20px;
                display: inline-block;
                margin-top: 20px;
                text-decoration: none;
                color: #fff;
                background: #111;

            }

            #popup{
                position:fixed;
                top:40%;
                left:50%;
                transform:translate(-50%,-50%);
                width:600px;
                padding:50px;
                box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
                background: #fff;
                visibility: hidden;
                opacity:0;
                transition:0.5s;

            }

            #popup.active{
                top:50%;
                visibility: visible;
                opacity:1;
                transition:0.5s;
            }

            /* Slideshow */


            * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            }

            body {
            font-family: 'Roboto', sans-serif;
            /* background: #333; */
            color: #fff;
            line-height: 1.6;
            }

            .slider {
            /* position: relative; */
            overflow: hidden;
            /* height: 100vh; Removes the scroll bar,more specifically it prevents the slide show from covering the navigation menu when you scroll down */
            width: 100vw;
            }

            .slide {
            position: absolute;
            top: 10%;
            left: 0;
            width: 100%;
            height: 90%;
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
            }

            .slide.current {
            opacity: 1;
            }

            .slide .content {
            position: absolute;
            bottom: 70px;
            left: -600px;
            opacity: 0;
            width: 600px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 35px;
            }

            .slide .content h1 {
            margin-bottom: 10px;
            }

            .slide.current .content {
            opacity: 1;
            transform: translateX(600px);
            transition: all 0.7s ease-in-out 0.3s;
            }

            .buttons button#next {
            position: absolute;
            top: 50%;
            right: 15px;
            }

            .buttons button#prev {
            position: absolute;
            top: 50%;
            left: 15px;
            }

            .buttons button {
                border: 2px solid #33b5ff;
                background-color: transparent;
                /* background-color: #fff; */
                color: #fff;
                cursor: pointer;
                padding: 13px 15px;
                border-radius: 50%;
                outline: none;
            /* border: 2px solid #33b5ff; */
            /* background-color: transparent; */
            /* background-color: #fff;
            color: #33b5ff;;
            cursor: pointer;
            padding: 13px 15px;
            border-radius: 50%;
            outline: none; */
            }

            .buttons button:hover {
            background-color: transparent;
            /* background-color: #fff; */
            color: #33b5ff;
            }

            @media (max-width: 500px) {
            .slide .content {
                bottom: -300px;
                left: 0;
                width: 100%;
            }

            .slide.current .content {
                transform: translateY(-300px);
            }
            }



            /* Backgorund Images */

            .slideTest{

                width:100%;
                height: -webkit-fill-available;
                /* https://stackoverflow.com/questions/11757537/css-image-size-how-to-fill-but-not-stretch */
                object-fit: cover;
                /* top:10%;
                left:0; */
            
                /* height: 90%; */

            }

            /* change the design when the width gets larger than n pixels */
            @media only screen and (min-width: 860px) {
                /* For desktop: */
                /* .slideTest{
                    object-fit: fill;    
                } */

            }

            /* About Section */

            /* changing url path of background Image in css file dynamically [duplicate] https://stackoverflow.com/questions/57490214/changing-url-path-of-background-image-in-css-file-dynamically */
            /* concatenate css background image with php variable  */
            /* The search phrase directly above was an attempt to echo $fileName without having to create a 2nd version of aboutImagePlaceholder.php but it's taking too long for me to get it to work */
            /* https://stackoverflow.com/questions/31214105/how-can-i-use-of-a-php-variable-into-a-css-file */
            .about-section{
                background: url("<?php echo $fileName2 ?>") no-repeat left;
                background-size: 55%;
                background-color: #fdfdfd;
                overflow: hidden;
                padding: 50px 50px;
            }

            .inner-container{
                width: 55%;
                float: right;
                background-color: #fdfdfd;
                padding: 150px;
            }

            .inner-container h1{
                margin-bottom: 30px;
                font-size: 30px;
                font-weight: 900;
                color: #33b5ff;
            }

            .text{
                font-size: 13px;
                color: black;
                line-height: 30px;
                text-align: justify;
                margin-bottom: 40px;
            }

            .skills{
                display: flex;
                justify-content: space-between;
                font-weight: 700;
                font-size: 13px;
                color:black;
            }

            @media screen and (max-width:1200px){
                .inner-container{
                    padding: 80px;
                }
            }

            @media screen and (max-width:1000px){
                .about-section{
                    background-size: 100%;
                    padding: 100px 40px;
                }
                .inner-container{
                    width: 100%;
                }
            }

            @media screen and (max-width:600px){
                .about-section{
                    padding: 0;
                }
                .inner-container{
                    padding: 60px;
                }
            }

            /* About Section */


            /* Team Section */


            a{
                text-decoration: none;
            }
            #team{
                width:100%;
                /* min-height: 90vh; */
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding-top: 10%;
                padding-bottom: 10%;
            }
            .heading{
                /* font-size: 1.3rem; */
                /* color: #2c2c2c; */
                color:#33b5ff;
                font-weight: 500;
                display: flex;
                align-items: center;
                /* margin: 20px; */
                font-size: 30px;
                font-weight: 900;
            }
            .heading i{
                background-color: #507bfc;
                box-shadow: 2px 5px 30px rgba(80,123,252,0.4);
                color: #ffffff;
                width:40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 0.9rem;
                margin: 0px 20px;
            }
            .box{
                width:266px;
                height: 340px;
                background-color: #ffffff;
                box-shadow: 2px 2px 30px rgba(0,0,0,0.05);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                border-radius: 10px;
                margin: 20px;
                position: relative;
            }
            .containerTeam{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }
            .top-bar{
                width:50%;
                height: 4px;
                position: absolute;
                left: 50%;
                top: 0px;
                transform: translateX(-50%);
                background-color: #507bfc;
                border-radius: 0px 0px 10px 10px;
            }
            .verify{
                color:#17b667;
            }
            .nav{
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                /* https://forum.freecodecamp.org/t/why-is-my-navbar-behind-other-content/62059 */
                z-index: 9999;
            }
            .nav .heart{
                color: rgba(155,155,155);
            }
            .nav .heart:before{
                content: '\f004';
                font-family: fontAwesome;
                line-height: 30px;
                z-index: 1;
                cursor: pointer;
            }
            .nav .heart-btn:checked ~ .heart:before{
                color: #e41934;
            }
            .nav .heart-btn{
                display: none;
            }
            .details{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            .details img{
                width:150px;
                height: 150px;
                border-radius: 50%;
                overflow: hidden;
                object-fit: cover;
                object-position: center;
            }
            .details strong{
                font-weight: 500;
                color: #141414;
                letter-spacing: 1px;
                margin-top: 10px;
            }
            .details p{
                font-size: 0.8rem;
                color: #7a7a7a;
                margin: 5px 0px;
            }
            .btn{
                width:100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .btn a{
                color:#8b8b8b;
                padding: 8px 22px;
                border-radius: 20px;
                font-size: 0.9rem;
            }
            .btn a i{
                margin-right: 10px;
            }
            .btn a:hover{
                color: #fff;
                background-color: #507bfc;
                box-shadow: 2px 5px 15px rgba(80,123,252,0.5);
                transition: all ease 0.3s;
            }
            .box:hover{
                box-shadow: 2px 2px 30px rgba(4,15,49,0.1);
                transform: scale(1.01);
                transition: all ease 0.1s;
            }
            @media(max-width:612px){
                .box{
                    flex-grow: 0.7;
                }
            }

/* Services Section */
@charset "utf-8";
/* CSS Document */

/* body{
	margin:0px;
	padding: 0px;
	background-color: #FFFFFF;
	font-family: calibri;
} */


#bodySubstitute{
    margin:0px;
	padding: 0px;
	background-color: #FFFFFF;
	font-family: calibri;
}

/* a{
	text-decoration:none;
} */

#aTagSubstitute{
    text-decoration:none;
}

.services{
	width:100%;
	height: 100vh;
	display: flex;
	flex-direction: column;
	justify-content: space-evenly;
	align-items: center;
}
.s-heading{
	text-align:center;
}
.s-heading h1{
	color:black;
	/* font-size: 3rem; */
	/* font-weight: 400; */
	letter-spacing: 1px;
	margin: 0px;
    font-size: 30px;
    font-weight: 900;
    padding: 5px;
}
.s-heading p{
	color: black;
	font-size: 1rem;
	margin: 5px;
	text-align: center;
}
.s-box-container{
	width:100%;
	display: flex;
	justify-content: center;
	align-items: center;
}
.s-box{
	display:flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	border-radius: 10px;
	width:300px;
	padding: 20px 25px;
	height: 400px;
	box-sizing: border-box;
	margin: 30px;
	position: relative;
}
.s-box img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    object-fit: cover;
}
.s-box h1{
	color:#576975;
	letter-spacing: 1px;
	font-size: 1.5rem;
	margin-bottom: 8px;
	
}
.s-box p{
	color: rgba(87,105,117,0.90);
	text-align: center;
}
.s-btn{
	width: 140px;
	height: 40px;
	border-radius: 20px;
	border:1px solid rgba(74,144,226,0.50);
	display: flex;
	justify-content: center;
	align-items: center;
	color:#576975;
	margin-top:10px; 
}
.bar{
	width: 100px;
	height: 6px;
	position: absolute;
	left: 50%;
	top: 0%;
	transform: translateX(-50%);
	background-color:#4a90e2; 
	border-radius: 0px 0px 10px 10px;
	display: none;
	animation: bar 0.5s;
}
.s-box:hover{
	box-shadow: 2px 2px 30px rgba(0,0,0,0.08);
	transition: all ease 0.3s;
}
.s-btn:hover{
	background-color:#4a90e2;
	border: 1px solid #4a90e2;
	color:#FFFFFF;
	transition: all ease 0.3s;
}
.s-box:hover .bar{
	display: block;
}
@keyframes bar{
	0%{
		width:0px;
	}
	100%{
		width:100px;
	}
}
@media(max-width:1050px){
	.s-box-container{
		flex-wrap: wrap;
		
	}	
	.services{
		height: auto;
	}
	.s-heading{
		margin: 15px;
	}
	.s-box{
		flex-grow: 1;
	}
	
}

/* Services Section */

/* Contact Section */

/* @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600); */

/* * {
	margin:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased; */
	/* font-smoothing:antialiased; */
	/* text-rendering:optimizeLegibility;
} */

#asterickSubstitute{
    margin:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased;
	/* font-smoothing:antialiased; */
	text-rendering:optimizeLegibility;
}

#asterickSubstitute2{
    margin:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased;
	/* font-smoothing:antialiased; */
	text-rendering:optimizeLegibility;
}

.error{
	color:red;
}

.success {
	color:#33b5ff;
	text-align:center;
	font-weight: bold;
	font-size:14px;
}

body {
	/* font-family:"Open Sans", Helvetica, Arial, sans-serif; */
	/* font-weight:300; */
	/* font-size: 12px; */
	/* line-height:30px; */
	/* color:#777; */
	/* background:#0CF; */
}

#bodySubstitute{
    /* font-family:"Open Sans", Helvetica, Arial, sans-serif; */
	font-weight:300;
	/* font-size: 12px; */
	line-height:30px;
	color:#777;
	/* background:#0CF; */
}

/* .container {
	max-width:400px;
	width:100%;
	margin:0 auto;
	position:relative;
} */

.containerSubstitute{
    max-width:400px;
	width:100%;
	margin:0 auto;
	position:relative;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact {
	background:#F9F9F9;
	padding:25px;
    /* margin:50px 0; */
    margin-bottom:5px;
}

#contact h3 {
	color:#33b5ff;
	display: block;
	font-size: 30px;
    font-weight: 400;
        margin-block-start: 1em;
}

#contact h4 {
	margin:5px 0 15px;
	display:block;
    font-size:13px;
    color:#33b5ff;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
	width:100%;
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
	-webkit-transition:border-color 0.3s ease-in-out;
	-moz-transition:border-color 0.3s ease-in-out;
	transition:border-color 0.3s ease-in-out;
	border:1px solid #AAA;
}

#contact textarea {
	height:100px;
	max-width:100%;
  resize:none;
}

#contact button[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
	background:#33b5ff;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}

#contact button[type="submit"]:hover {
	background:#09C;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact input:focus, #contact textarea:focus {
	outline:0;
	border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}

#contactPrimary{
  /* We first create a flex layout context */
  display: flex;
  
  /* Then we define the flow direction 
  and if we allow the items to wrap 
  * Remember this is the same as:
  * flex-direction: row;
  * flex-wrap: wrap;
  */
  flex-flow: row wrap;
  
  /* Then we define how is distributed the remaining space */
  justify-content: space-evenly;
}

.contact-text {
  font: 300 18px 'Lato', sans-serif;
  letter-spacing: 0.9px;
  /* color: #bbb; */
  padding-left: 10px;
}

.list-item {
  line-height: 4;
  /* color: #aaa; */
  display: table;
  /* https://stackoverflow.com/questions/8543859/css-vertical-alignment-text-inside-li#:~:text=Inorder%20to%20make%20vertical%2Dalign,make%20your%20text%20vertically%20middle. */
  padding-left: 15%;
}

/* Location, Phone, Email Section */
.contact-list {
  list-style-type: none;
  margin-left: -30px;
  padding-right: 20px;
}

.place {
  margin-left: 29px;
}


.contactInfoPlus{
    max-width: 360.36px;
    height: 250px;
    width: 100%;
    color: black;
    list-style: none;

}

 #contactInfoPlus{
    display:none;

}
                             */

/* Contact Section */











</style>

