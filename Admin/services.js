//Inspired by about.js and about.php within this application    

var textAreaInformation = document.getElementById("textAreaInformation"); 

var imgIDArray = [];
var profileImageIDArray = [];
var buttonIDArray = [];
var FilesArray = [];
var inputIDArray = [];
var incrementedProfileDisplayArray = [];

function triggerClick(e) {
    document.querySelector('#profileImage').click();       
  }

function displayImage(e) {
if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
    if (!Array.isArray(imgIDArray) || !imgIDArray.length) {
        // array does not exist, is not an array, or is empty
        // ⇒ do not attempt to process array
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        FilesArray.push(e.target.result);
        }
    else{
        document.querySelector('#'+ imgIDArray).setAttribute('src', e.target.result);
        FilesArray.push(e.target.result);
        imgIDArray = [];
    }  
        
    }
    reader.readAsDataURL(e.files[0]);
}
}

var fileSelect = document.getElementById('profileImage');
var uploadButton = document.getElementById('upload-button');
var slideshowForm = document.getElementById("slideshowForm");
var imgTagIDOriginal = slideshowForm.querySelector("img").id;   
var fileSelectOriginal = slideshowForm.querySelector("input").id;
var serviceName = document.getElementById('nameOfService');


var formArray = {
  "fileTagCloneID":fileSelectOriginal,
  "imgTagCloneID":imgTagIDOriginal
}


uploadButton.addEventListener("click", function (event){

    event.preventDefault();
    checkInputs();        
    console.log("Form Array:" + JSON.stringify(formArray));
    console.log(fileSelect.files[0]);    
    console.log(serviceName.value);
    var request = new XMLHttpRequest();
    // This was further clarified by looking at settingsTest.php in the Phynix app and it had some things that team.js didn't and after incorporating that it worked. 
         
    var requestData = 'description='+textAreaInformation.value + '&formArray='+ JSON.stringify(formArray) + '&image='+ fileSelect.files[0] + '&serviceName='+ serviceName.value;  
    request.open("post", "addService.php");
    //I think the line of code directly below is what I was missing and now that I have it, it's working 
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    request.send(requestData);
    
	request.addEventListener('load', function () {
		if (this.readyState === 4 && this.status === 200) {

		  console.log(this.responseText); 
          alert(this.responseText);
          responseObject = this.responseText;

            // https://stackoverflow.com/questions/17834243/how-to-read-formdata-object-in-php
            var xhr = new XMLHttpRequest();
            var formData = new FormData();
            formData.append("myFiles", fileSelect.files[0]);
            formData.append("description", textAreaInformation.value);
            xhr.open("post", "addService.php");
            xhr.send(formData);
            xhr.addEventListener('load', function () {
                if (this.readyState === 4 && this.status === 200) {
                // console.log(this.responseText); 
                // alert(this.responseText);
            }
            });
       
        //Inspired by about.js and about.php within this application    
        var submitStatus = document.getElementById("submitStatus"); 
        // https://www.javascripttutorial.net/javascript-dom/javascript-append/
        submitStatus.append(responseObject);
        var submitStatus = document.getElementById("submitStatus");
        // https://stackoverflow.com/questions/35630641/apply-css-dynamically-with-javascript
        submitStatus.setAttribute("style", "visibility:visible;");
	}
    });
      
});


function checkInputs() {
    // trim to remove the whitespaces
    var textAreaInformation = document.getElementById("textAreaInformation"); 

    console.log(textAreaInformation.value);
    
    var textAreaInformation = textAreaInformation.value.trim();	
    	
	if(textAreaInformation === '') {
		// setErrorFor(firstname, 'firstname cannot be blank');
	} else {
		setSuccessFor(textAreaInformation);
    }  
 
}
// services.js:130 Uncaught TypeError: Cannot set property 'className' of undefined
function setSuccessFor(textAreaInformation) {
    var textAreaInformation = document.getElementById("textAreaInformation"); 
	var formControl = textAreaInformation.parentElement;
	formControl.className = 'form-control success';
}

// Uncaught ReferenceError: Shayn is not defined at HTMLButtonElement.onclick
//In the comment directly above, I was getting this error when I echoed the firstName value from the team's table inside the deleteMe function inside team.php. It seems that there is some issue with echoing string/letters there because when I looked at the equivalent inside slideshow.php it was using a numerical value so when I changed it to echo out the id values from the id column in the team's table it started to work fine. 
function deleteMe(id){
   alert("WTF");
   console.log(id); 
//    console.log(firstName.id); 
   var fileID = id;
   var xhr = new XMLHttpRequest();

   xhr.open("post", "removeService.php");

   var formFileID = new FormData();

   formFileID.append("id", fileID);

   xhr.send(formFileID);

   xhr.addEventListener('load', function () {
     if (this.readyState === 4 && this.status === 200) {
           console.log(this.responseText); 
           alert(this.responseText); 
   }
   });

}

var addToSlideshow = document.getElementById('addToSlideshow');
addToSlideshow.addEventListener("click", function (event){
  event.preventDefault();
  newForm(); 	 
});

var i = 1;
function newForm(){
    var slideshowForm = document.getElementById("slideshowForm");
    var divClone = slideshowForm.cloneNode(true); // the true is for deep cloning;
    var belowOriginalForm = document.getElementById("belowOriginalForm"); 
    var slideshowForm = document.getElementById("slideshowForm");
    var divClone = slideshowForm.cloneNode(true); // the true is for deep cloning
    i++;
    divClone.id = "profileImg" + i;
    divClone.getElementsByTagName('input')[0].name = "profileDisplay" + i;
    var incrementedProfileDisplay = divClone.getElementsByTagName('input')[0].name = "profileDisplay" + i;
    incrementedProfileDisplayArray.push(incrementedProfileDisplay);
    divClone.getElementsByTagName('input')[0].id = "profileImage" + i;
    divClone.getElementsByTagName('img')[0].id = "profileDisplay" + i;
    divClone.getElementsByTagName('button')[0].id = "upload-button" + i;   
    divClone.querySelector('#' + incrementedProfileDisplay).setAttribute('src', "img/profilephotogif.gif");
    belowOriginalForm.appendChild(divClone);     

    divClone.querySelector("span").addEventListener("click", function(e) {
        var imgID = divClone.querySelector("img").id;             
        imgIDArray.push(imgID);
        var profileImageID = divClone.querySelector("input").id;   
        profileImageIDArray.push(profileImageID);   
        console.log(profileImageID); 
      });


    divClone.querySelector("form").addEventListener("click", function (event) {
        var inputID = divClone.querySelector("input").id;             
 
        inputIDArray.push(inputID);
        // console.log(inputIDArray);

    }); 
    
    divClone.querySelector("img").addEventListener("click", function(e) {
        divClone.querySelector("input").click(); 
        alert("Huh?");
        console.log("huh");
  
    
          });
  

    divClone.querySelector("button").addEventListener("click", function (event){ 
        event.preventDefault();     
        console.log(event.target.id);
        var imgTagIDClone = divClone.querySelector("img").id;   
        var fileSelectClone = divClone.querySelector("input").id;
        console.log(fileSelectClone);     
        var formArray = {
          "fileTagCloneID":fileSelectClone,
          "imgTagCloneID":imgTagIDClone
        }
        console.log(formArray);
        console.log(JSON.stringify(formArray));       
        var xhr = new XMLHttpRequest();
        console.log(fileSelect.files[0]);

        // https://stackoverflow.com/questions/39733384/clone-a-textarea-field-with-its-value-using-javascript
        var textAreaInformation = divClone.getElementsByTagName('textarea')[0].value;

        var serviceName = divClone.getElementsByTagName('input')[1].value;

        console.log(textAreaInformation);

        console.log(serviceName);
                
        var xhrData = 'description='+textAreaInformation + '&formArray='+ JSON.stringify(formArray) + '&image='+ fileSelect.files[0] + '&serviceName='+ serviceName;  
        xhr.open("POST", "addService.php");
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        xhr.send(xhrData);

        xhr.addEventListener('load', function(){
            if(this.readyState === 4 & this.status === 200){
                console.log(this.responseText);
                alert(this.responseText);

                        // https://stackoverflow.com/questions/17834243/how-to-read-formdata-object-in-php
                    var xhr2 = new XMLHttpRequest();
                    var formData = new FormData();
                    formData.append("myFiles", fileSelect.files[0]);
                    formData.append("description", textAreaInformation);
                    xhr2.open("post", "addService.php");
                    xhr2.send(formData);
                    xhr2.addEventListener('load', function () {
                        if (this.readyState === 4 && this.status === 200) {
                        // console.log(this.responseText); 
                        // alert(this.responseText);
                    }
                    });

                        responseObject2 = this.responseText;

                        // https://stackoverflow.com/questions/39733384/clone-a-textarea-field-with-its-value-using-javascript this can be found further up in the file

                        //Inspired by about.js and about.php within this application    
                        var submitStatus = divClone.getElementsByTagName('a')[2];
                        
                        // https://www.javascripttutorial.net/javascript-dom/javascript-append/
                        submitStatus.append(responseObject2);
                        var submitStatus = divClone.getElementsByTagName('a')[2];
                        // https://stackoverflow.com/questions/35630641/apply-css-dynamically-with-javascript
                        submitStatus.setAttribute("style", "visibility:visible;");
            }
        })                    
        });

        divClone.querySelector("input").addEventListener("click", function (event){ 
            // event.preventDefault();
            alert("INPUT STAGE");
            var formData = new FormData();   
            console.log(formData); 
                   
        });    
    

}



  

 
