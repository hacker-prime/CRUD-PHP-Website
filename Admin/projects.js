//Inspired by about.js and about.php within this application    
var textAreaInformation = document.getElementById("textAreaInformation");var imgIDArray = [];var profileImageIDArray = [];var buttonIDArray = [];var FilesArray = [];var inputIDArray = [];var incrementedProfileDisplayArray = [];var projectdatetime = document.getElementById("projectdatetime"); var update = [];
// https://www.youtube.com/watch?v=KsRxTHyqjsQ

function triggerClick(e) {
    document.querySelector('#profileImage').click();       
  }

function displayImage(e) {
    // https://stackoverflow.com/questions/41557711/what-does-files0-represent-in-javascript-jquery
    // https://stackoverflow.com/questions/8810927/showing-an-image-from-an-array-of-images-javascript
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            FilesArray.push(e.target.result);
            // console.log(FilesArray);        
            // console.log(JSON.stringify(FilesArray));   
            var element = document.querySelector("input[type='file']");
            console.log(element);        
            var fileSelect = document.getElementById('profileImage');
            console.log(fileSelect.files);   
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick2(e) {
    document.querySelector('.profileImage2').click();       
  }

function displayImage2(e) {
    // https://stackoverflow.com/questions/41557711/what-does-files0-represent-in-javascript-jquery
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay2').setAttribute('src', e.target.result);
            // FilesArray.push(e.target.result); //Uncaught TypeError: fileSelect.push is not a function
            // console.log(FilesArray);   
            // console.log(JSON.stringify(FilesArray));    
            var element = document.querySelector("input[type='file']");
            console.log(element);                            
            var fileSelect2 = document.getElementById('profileImage2');
            console.log(fileSelect2.files);            
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick3(e) {
    document.querySelector('.profileImage3').click();       
  }

function displayImage3(e) {
    // https://stackoverflow.com/questions/41557711/what-does-files0-represent-in-javascript-jquery
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay3').setAttribute('src', e.target.result);
            // FilesArray.push(e.target.result); //Uncaught TypeError: fileSelect.push is not a function
            // console.log(FilesArray);   
            // console.log(JSON.stringify(FilesArray));    
            var element = document.querySelector("input[type='file']");
            consol
            e.log(element);                            
            var fileSelect2 = document.getElementById('profileImage3');
            console.log(fileSelect2.files);            
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick4(e) {
    document.querySelector('.profileImage4').click();       
  }

function displayImage4(e) {
    // https://stackoverflow.com/questions/41557711/what-does-files0-represent-in-javascript-jquery
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay4').setAttribute('src', e.target.result);
            // FilesArray.push(e.target.result); //Uncaught TypeError: fileSelect.push is not a function
            // console.log(FilesArray);   
            // console.log(JSON.stringify(FilesArray));    
            var element = document.querySelector("input[type='file']");
            console.log(element);                            
            var fileSelect2 = document.getElementById('profileImage4');
            console.log(fileSelect2.files);            
        }
        reader.readAsDataURL(e.files[0]);
    }
}





// function displayImage(e) {
//     // https://stackoverflow.com/questions/41557711/what-does-files0-represent-in-javascript-jquery
//     if (e.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e){
//         if (!Array.isArray(imgIDArray) || !imgIDArray.length) {
//             // array does not exist, is not an array, or is empty
//             // ⇒ do not attempt to process array
//             document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
//             FilesArray.push(e.target.result);
//             }
//         else{
//             document.querySelector('#'+ imgIDArray).setAttribute('src', e.target.result);
//             FilesArray.push(e.target.result);
//             imgIDArray = [];
//         }  
            
//         }
//         reader.readAsDataURL(e.files[0]);
//     }
// }
var fileSelect = document.getElementById('profileImage');
var fileSelect2 = document.getElementById('profileImage2');
var fileSelect3 = document.getElementById('profileImage3');
var fileSelect4 = document.getElementById('profileImage4');
var uploadButton = document.getElementById('upload-button');
var slideshowForm = document.getElementById("slideshowForm");
var imgTagIDOriginal = slideshowForm.querySelector("img").id;   
var fileSelectOriginal = slideshowForm.querySelector("input").id;
var projectName = document.getElementById('nameOfproject');


var formArrayprojects = {
  "fileTagCloneID":fileSelectOriginal,
  "imgTagCloneID":imgTagIDOriginal
}


uploadButton.addEventListener("click", function (event){

    event.preventDefault();
    checkInputs();        
    console.log("Form Array:" + JSON.stringify(formArrayprojects));
    console.log(fileSelect.files[0]);    
    console.log(projectName.value);
    var request = new XMLHttpRequest();
    // This was further clarified by looking at settingsTest.php in the Phynix app and it had some things that team.js didn't and after incorporating that it worked. 

    // var requestData = 'description='+textAreaInformation.value + '&formArrayprojects='+ JSON.stringify(formArrayprojects) + '&imageproject='+ fileSelect.files[0] + '&projectName='+ projectName.value + '&projectdatetime=' + projectdatetime.value; 
    // var requestData = 'description='+textAreaInformation.value + '&formArrayprojects='+ JSON.stringify(formArrayprojects) + '&imageproject='+ fileSelect.files[0] + '&projectName='+ projectName.value;  
    
    //In order to send everything at the same time (textual information and a file (photo)) I need to use FormData(). The current way I have it (found in the line of code directly above) is that if the 1st ajax request is succcessful the 
    //textual information will be inserted on the PHP side and in the response on the JS side we run a 2nd ajax request which will then send an update request so to upload the photo on the PHP side.
    //Instead I can send only one ajax request using FormData(). I have not found another way outside of FormData().     
    var formData = new FormData();
    // var form = document.getElementById('form');
    var element = document.querySelector("input[type='file']");
    formData.append("myFiles[]", fileSelect.files[0]);  // https://stackoverflow.com/questions/5035547/pass-javascript-array-php  
    formData.append("myFiles[]", fileSelect2.files[0]);
    formData.append("myFiles[]", fileSelect3.files[0]);
    formData.append("myFiles[]", fileSelect4.files[0]);
    //In the line of code directly above, I get the following error in addProject.php if I use FilesArray as the second argument
    // <b>Notice</b>:  Undefined index: myFiles in <b>C:\xampp\htdocs\caquality\Admin\addProject.php</b> on line <b>31</b><br />
    // <br />
    // <b>Notice</b>:  Undefined index: myFiles in <b>C:\xampp\htdocs\caquality\Admin\addProject.php</b> on line <b>32</b><br />
    // <br />
    // <b>Notice</b>:  Undefined index: myFiles in <b>C:\xampp\htdocs\caquality\Admin\addProject.php</b> on line <b>33</b><br />
    
    //formData.append("myFiles", JSON.stringify(FilesArray));  // https://stackoverflow.com/questions/5035547/pass-javascript-array-php  
    formData.append("description", textAreaInformation.value);
    formData.append("projectName", projectName.value);
    // formData.append("projectdatetime", projectdatetime.value);

    // console.log(projectdatetime.value);
    request.open("post", "addProject.php");
    //I think the line of code directly below is what I was missing and now that I have it, it's working 
    // request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    // request.send(requestData);
    if(request.send(formData)){
     console.log(element);   
    };
    
	request.addEventListener('load', function () {
		if (this.readyState === 4 && this.status === 200) {

		  console.log(this.responseText); 
          alert(this.responseText);
          responseObject = this.responseText;

            // https://stackoverflow.com/questions/17834243/how-to-read-formdata-object-in-php
            // var xhr = new XMLHttpRequest();
            // var formData = new FormData();
            // formData.append("myFiles", fileSelect.files[0]);
            // formData.append("description", textAreaInformation.value);
            // xhr.open("post", "addProject.php");
            // xhr.send(formData);
            // xhr.addEventListener('load', function () {
            //     if (this.readyState === 4 && this.status === 200) {
            //     // console.log(this.responseText); 
            //     // alert(this.responseText);
            // }
            // });
       
        //Inspired by about.js and about.php within this application    
        var submitStatus = document.getElementById("submitStatus"); 
        // https://www.javascripttutorial.net/javascript-dom/javascript-append/
        submitStatus.append(responseObject);
        var submitStatus = document.getElementById("submitStatus");
        // https://stackoverflow.com/questions/35630641/apply-css-dynamically-with-javascript
        submitStatus.setAttribute("style", "visibility:visible;");
	} else {
        console.log(element);
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

   xhr.open("post", "removeProject.php");

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
        var formArrayprojects = {
          "fileTagCloneID":fileSelectClone,
          "imgTagCloneID":imgTagIDClone
        }
        console.log(formArrayprojects);
        console.log(JSON.stringify(formArrayprojects));       
        var xhr = new XMLHttpRequest();
        console.log(fileSelect.files[0]);

        // https://stackoverflow.com/questions/39733384/clone-a-textarea-field-with-its-value-using-javascript
        var textAreaInformation = divClone.getElementsByTagName('textarea')[0].value;

        var projectName = divClone.getElementsByTagName('input')[1].value;

        console.log(textAreaInformation);

        console.log(projectName);
                
        var xhrData = 'description='+textAreaInformation + '&formArrayprojects='+ JSON.stringify(formArrayprojects) + '&imageproject='+ fileSelect.files[0] + '&projectName='+ projectName;  
        // var xhrData = 'description='+textAreaInformation + '&formArrayprojects='+ JSON.stringify(formArrayprojects) + '&imageproject='+ fileSelect.files[0] + '&projectName='+ projectName + '&projectdatetime=' + projectdatetime.value;  

        xhr.open("POST", "addProject.php");
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
                    xhr2.open("post", "addProject.php");
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


// Delete Project Image


// Delete Project Image
// function deleteProjectImage(id){
//     console.log(id)
//     // var password = document.getElementById("password").value;
//     // var http = new XMLHttpRequest();
//     // var url = "login.php";
//     // var params = "username="+username+"&password="+password;
//     // http.open("POST", url, true);

//     // //Send the proper header information along with the request
//     // http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//     // http.onreadystatechange = function() {//Call a function when the state changes.
//     //     if(http.readyState == 4 && http.status == 200) {
//     //         if(http.responseText == 1){
//     //         alert("Login is successfull");
//     //         }
//     //         else{
//     //         alert("Invalid Username or Password");
//     //         }
//     //     }
//     //     else{
//     //     alert("Error :Something went wrong");
//     //     }
//     // }
//     // http.send(params);
// }

function triggerClickUpdate(e) {
    document.querySelector('#profileImageUpdate').click();  
    // console.log(e.id);     
    update.push(e.id);

  }
  
function deleteProjectImage(e){    
    if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
        var fileSelectUpdate = document.getElementById('profileImageUpdate');
        console.log(fileSelectUpdate.files);
        // console.log(update[0]);   
        var formData = new FormData();
        // formData.append("p_id", update[0]);  
        // formData.append("myFiles", fileSelectUpdate.files[0]);
        var xhr = new XMLHttpRequest();
            var formData = new FormData();
            formData.append("p_id", update[0]);
            formData.append("myFiles", fileSelectUpdate.files[0]);
            // formData.append("description", textAreaInformation);
            xhr.open("post", "deleteProjectImage.php");
            xhr.send(formData);
            xhr.addEventListener('load', function () {
                if (this.readyState === 4 && this.status === 200) {
                alert(this.responseText);
            }
            });  
    }
    reader.readAsDataURL(e.files[0]);
    }
}

// https://stackoverflow.com/questions/42080365/using-addeventlistener-and-getelementsbyclassname-to-pass-an-element-id
//https://stackoverflow.com/questions/41870140/javascript-iterate-through-class-elements-and-select-all-except-clicked-element
// https://stackoverflow.com/questions/24542962/how-to-have-multiple-buttons-calling-same-javascript/24543032
//https://help.instapage.com/hc/en-us/articles/360056309133-How-to-use-the-same-on-click-pop-up-box-for-multiple-elementsfunction toggle(){
// https://forum.freecodecamp.org/t/linking-an-eventlistener-to-multiple-buttons/333174



// https://www.javascript-coder.com/javascript-form/javascript-get-all-form-objects/
// https://stackoverflow.com/questions/11563638/how-do-i-get-the-value-of-text-input-field-using-javascript
function projectUpdate(data) {
    // https://stackoverflow.com/questions/19454310/stop-form-refreshing-page-on-submit
    // https://stackoverflow.com/questions/2435525/best-practice-access-form-elements-by-html-id-or-name-attribute
    // var projectID = document.getElementById(projectID);
    // var projectID = document.getElementById(projectID).elements["projectname"].value;
    // console.log(projectID);

    console.log(data);
    var input_val = data.getElementsByTagName("input")[0].value;;
    console.log(input_val);
    var textarea_val = data.getElementsByTagName("textarea")[0].value;;
    console.log(textarea_val);
    var formID = data.id;
    console.log(formID);
    
    // https://stackoverflow.com/questions/45193164/post-data-to-php-using-vanilla-javascript-and-get-it-back/48517454
    data = "input="+input_val+"&textarea="+textarea_val+"&formID="+formID;
    var xhr = new XMLHttpRequest();
    var url = "updateProject.php";
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send(data);

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
          alert(xhr.responseText);
        }
    };


;
}
 
