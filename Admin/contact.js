var contactButton = document.getElementById('contact-button');
var firstNumber = document.getElementById('firstNumber');
var secondNumber = document.getElementById('secondNumber');
var email = document.getElementById('email');
var address = document.getElementById('address');
var city = document.getElementById('city');
var parish = document.getElementById('parish');


contactButton.addEventListener("click", function (event){
    event.preventDefault();    

    console.log("First Number:" + firstNumber.value);
    var request = new XMLHttpRequest();
    
    var requestData = 'firstNumber='+firstNumber.value + '&secondNumber='+secondNumber.value + '&email='+email.value + '&address='+address.value + '&city='+city.value + '&parish='+parish.value;
    request.open("post", "addContact.php");
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    request.send(requestData);
    
        request.addEventListener('load', function () {
            if (this.readyState === 4 && this.status === 200) {

            console.log(this.responseText); 
            alert(this.responseText);
            responseObject = this.responseText;

            if(responseObject == "You didn't enter any information. :("){

                //Inspired by about.js and about.php within this application    
                var submitStatus = document.getElementById("submitStatus"); 
                submitStatus.append(responseObject);
                var submitStatus = document.getElementById("submitStatus");
                submitStatus.setAttribute("style", "visibility:visible;color:red;border: 2px solid red;");

                

            } 
            // else {
            //     alert("Oh my Glob!");
            // }

            if(responseObject == "success"){
                //Inspired by about.js and about.php within this application    
                var submitStatus = document.getElementById("submitStatus"); 
                submitStatus.append(responseObject);
                var submitStatus = document.getElementById("submitStatus");
                submitStatus.setAttribute("style", "visibility:visible;color:#00FA9A;border: 2px solid #00FA9A;");               
            }
             
                
        }
        });

    
      
});