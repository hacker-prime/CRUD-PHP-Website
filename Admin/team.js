var firstname = document.getElementById('firstname');
var lastname = document.getElementById('lastname');
var position = document.getElementById('position');

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
        // console.log(e.target.result);
        FilesArray.push(e.target.result);
        }
    else{
        document.querySelector('#'+ imgIDArray).setAttribute('src', e.target.result);
        FilesArray.push(e.target.result);
        // var clonedInputTagImage = e.target.result; 
        // console.log(clonedInputTagImage);
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

var formArray = {
  "fileTagCloneID":fileSelectOriginal,
  "imgTagCloneID":imgTagIDOriginal
}


uploadButton.addEventListener("click", function (event){

    event.preventDefault();
    checkInputs();     
    
    console.log("First Name:" + firstname.value);
    console.log("Last Name:" + lastname.value);
    console.log("Position:" + position.value);
    console.log("Form Array:" + JSON.stringify(formArray));
    // https://ourcodeworld.com/articles/read/322/how-to-convert-a-base64-image-into-a-image-file-and-upload-it-with-an-asynchronous-form-using-jquery
    console.log(fileSelect.files[0]);    
    var request = new XMLHttpRequest();
    // Send more than one variable in xhr.send [closed] https://stackoverflow.com/questions/17905727/send-more-than-one-variable-in-xhr-send
    //xhr.send(params) - multiple parameters https://stackoverflow.com/questions/51347676/xhr-sendparams-multiple-parameters
    // https://javascriptio.com/view/4867169/send-more-than-one-variable-in-xhr-send-closed
    //Send POST data using XMLHttpRequest https://stackoverflow.com/questions/9713058/send-post-data-using-xmlhttprequest
    //xhr send dynamic value
    // xhr send dynamic value post
    // https://stackoverflow.com/questions/9713058/send-post-data-using-xmlhttprequest/9713078 
    // This was further clarified by looking at settingsTest.php in the Phynix app and it had some things that team.js didn't and after incorporating that it worked. 
    var requestData = 'firstname='+firstname.value + '&lastname='+lastname.value + '&position='+position.value + '&formArray='+ JSON.stringify(formArray) + '&image='+ fileSelect.files[0];
    request.open("post", "addTeamMember.php");
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
            formData.append("firstname", firstname.value);
            xhr.open("post", "addTeamMember.php");
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
    
    var firstnameValue = firstname.value.trim();	
    	
	if(firstnameValue === '') {
		// setErrorFor(firstname, 'firstname cannot be blank');
	} else {
		setSuccessFor(firstname);
    }  
    // Cannot access 'variable_name' before initialization https://github.com/sveltejs/svelte/issues/3234
    var lastnameValue = lastname.value.trim();	
    	
	if(lastnameValue === '') {
		// setErrorFor(lastname, 'lastname cannot be blank');
	} else {
		setSuccessFor(lastname);
    }  
    
    var positionValue = position.value.trim();	
    	
	if(positionValue === '') {
		// setErrorFor(position, 'position cannot be blank');
	} else {
		setSuccessFor(position);
	}  
}

function setSuccessFor(input) {
	var formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function deleteMe(id){
   alert("WTF");
   console.log(id); 
//    console.log(firstName.id); 
   var fileID = id;
   var xhr = new XMLHttpRequest();

   xhr.open("post", "removeTeamMemberImage.php");

   var formFileID = new FormData();

   formFileID.append("firstName", fileID);

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

        var firstnameClone = divClone.getElementsByTagName('input')[1].value;
        var lastnameClone = divClone.getElementsByTagName('input')[2].value;
        var positionClone = divClone.getElementsByTagName('input')[3].value;
        console.log("Clone First Name:" +     divClone.getElementsByTagName('input')[1].value);
        console.log("Clone Last Name:" + divClone.getElementsByTagName('input')[2].value);
        console.log("Clone Position:" + divClone.getElementsByTagName('input')[3].value);
        console.log(firstnameClone);
        console.log(lastnameClone);
        console.log(positionClone);
       
       var xhrData = 'firstname='+firstnameClone + '&lastname='+lastnameClone + '&position='+ positionClone + '&formArray='+ JSON.stringify(formArray) + '&image='+ fileSelect.files[0];
        xhr.open("POST", "addTeamMember.php");
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
                    formData.append("firstname", firstnameClone);
                    xhr2.open("post", "addTeamMember.php");
                    xhr2.send(formData);
                    xhr2.addEventListener('load', function () {
                        if (this.readyState === 4 && this.status === 200) {
                        // console.log(this.responseText); 
                        // alert(this.responseText);
                    }
                    });

                        responseObject2 = this.responseText;
                        //Inspired by about.js and about.php within this application    
                        var submitStatus = document.getElementById("submitStatus"); 
                        // https://www.javascripttutorial.net/javascript-dom/javascript-append/
                        submitStatus.append(responseObject2);
                        var submitStatus = document.getElementById("submitStatus");
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



  

 
