var imgIDArray = [];
var profileImageIDArray = [];
var buttonIDArray = [];
var FilesArray = [];
var inputIDArray = [];
var incrementedProfileDisplayArray = [];



function triggerClick(e) {
    document.querySelector('#profileImage').click();

    // https://stackoverflow.com/questions/48239/getting-the-id-of-the-element-that-fired-an-event
    // console.log(e);        
  }



  function displayImage(e) {
    // https://stackoverflow.com/questions/48239/getting-the-id-of-the-element-that-fired-an-event
    // console.log(e);  
	if (e.files[0]) {
    //   FilesArray.push(e.files[0]);
    //   console.log(e);
    //   console.log(e.files[0]);
    //   console.log(files[0]);//Uncaught ReferenceError: files is not defined
    //   console.log(e.target.result);// slideshow.js:64 Uncaught TypeError: Cannot read property 'result' of undefined
	  var reader = new FileReader();
	  reader.onload = function(e){

        // https://stackoverflow.com/questions/24403732/how-to-check-if-array-is-empty-or-does-not-exist
        if (!Array.isArray(imgIDArray) || !imgIDArray.length) {
            // array does not exist, is not an array, or is empty
            // ⇒ do not attempt to process array
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            console.log(e.target.result);
            FilesArray.push(e.target.result);
          }
        else{
            document.querySelector('#'+ imgIDArray).setAttribute('src', e.target.result);
            FilesArray.push(e.target.result);
            var clonedInputTagImage = e.target.result; 
            // console.log(clonedInputTagImage);
            // https://stackoverflow.com/questions/1232040/how-do-i-empty-an-array-in-javascript
            imgIDArray = [];
        }  
          
	  }
	  reader.readAsDataURL(e.files[0]);
	}
  }


// https://www.youtube.com/watch?v=dBIfkRzJGOM
var fileSelect = document.getElementById('profileImage');
var uploadButton = document.getElementById('upload-button');
var slideshowForm = document.getElementById("slideshowForm");
var imgTagIDOriginal = slideshowForm.querySelector("img").id;   
var fileSelectOriginal = slideshowForm.querySelector("input").id;

var formCloneArray = {
  "fileTagCloneID":fileSelectOriginal,
  "imgTagCloneID":imgTagIDOriginal
}

uploadButton.addEventListener("click", function (event){
    console.log(fileSelect);
    // https://www.tutorialspoint.com/stop-making-form-to-reload-a-page-in-javascript
    event.preventDefault();
    const xhr = new XMLHttpRequest();
    console.log(fileSelect.files);
	// https://developer.mozilla.org/en-US/docs/Web/API/FormData/append
	const formData = new FormData();
  formData.append("myFiles", fileSelect.files[0]);
  formData.append("formCloneArray", JSON.stringify(formCloneArray));
	xhr.open("post", "addSlide.php");
	xhr.send(formData);
	xhr.addEventListener('load', function () {
		if (this.readyState === 4 && this.status === 200) {
		//   console.log(this.responseText); 
		//   alert(this.responseText);

	}
	  });
});

function deleteMe(fileTagID){
   alert("WTF");
   //If you console.log fileTagID by itself you get a result like this. View below
   //<input type="file" name="profileDisplay" id="profileImage3" style="display: none;" multiple>
   //But all I need is the id.
   console.log(fileTagID); 
   console.log(fileTagID.id); 
   var fileID = fileTagID.id;

  //  https://stackoverflow.com/questions/18906547/how-to-ajax-post-to-php

   const xhr = new XMLHttpRequest();

   xhr.open("post", "removeSlide.php");

   const formFileID = new FormData();

   formFileID.append("fileID", fileID);

   xhr.send(formFileID);

   xhr.addEventListener('load', function () {
     if (this.readyState === 4 && this.status === 200) {
           console.log(this.responseText); 
           alert(this.responseText); 
   }
   });

}

// Remove the slide/image from the database 
// var slideshowFormDelete = document.getElementById("slideshowForm");
// document.querySelector("form").addEventListener("click",function(event){
//       event.preventDefault();  
//       console.log(event);
//       var inputIDDelete = slideshowForm.querySelector("input").id;  
//       console.log(inputIDDelete);      
           

      

//     });  

// https://stackoverflow.com/questions/32061484/addeventlistener-is-not-a-function/32061698#32061698
// The problem was that you are trying to assign addEventListner to an array of objects, you need to loop through it (one way or another) to do so:  
// var delteBtn = document.getElementsByClassName('deleteButton');
// var imgClassName = document.getElementsByClassName('test');
// console.log(delteBtn);
// console.log(imgClassName);

// for (var i=0; i< delteBtn.length ; i++){
//   delteBtn[i].addEventListener('click', function (event){
//     // console.log(delteBtn[i]);
//     // console.log(document.querySelector("img").id);
//     event.preventDefault();


//    });
// }
// formClass.addEventListener("click", function (event){ 
//Uncaught TypeError: formClass.addEventListener is not a function
// https://stackoverflow.com/questions/32061484/addeventlistener-is-not-a-function/32061698#32061698
// The problem was that you are trying to assign addEventListner to an array of objects, you need to loop through it (one way or another) to do so:  
//  event.preventDefault();
//   console.log(event.target.id);
//     console.log(document.querySelector("img").id);
//   // const xhr = new XMLHttpRequest();
//   // const formData = new FormData();
//   // formData.append("myFiles", fileSelect.files[0]);
//   // formData.append("formCloneArray", JSON.stringify(formCloneArray));
//   // xhr.open("post", "removeSlide.php");
//   // xhr.send(formData);
//   // xhr.addEventListener('load', function () {
//   //   if (this.readyState === 4 && this.status === 200) {
//   //     console.log(this.responseText); 
//   //     alert(this.responseText);

//   // }
//   // });
// });
// Remove the slide/image from the database 


var addToSlideshow = document.getElementById('addToSlideshow');
addToSlideshow.addEventListener("click", function (event){
  event.preventDefault();
	const xhr = new XMLHttpRequest();
	xhr.open("post", "slideshowSQL.php");
	xhr.send();
	xhr.addEventListener('load', function () {
		if (this.readyState === 4 && this.status === 200) {
          console.log(this.responseText); 
          // We can have a call back function here so the response from the Ajax request
          //can be used as an argument for the function that will clone the form and increment the ids from the orginal form as new values for the cloned forms
          var count = this.responseText;
          newForm(count); 


	}
	  });
});

addToSlideshow.addEventListener("click", function (event){

event.preventDefault();
const xhr = new XMLHttpRequest();
xhr.open("post", "slideshowForm.php");
xhr.send();
xhr.addEventListener('load', function () {
  if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText); 
        var primaryForm = this.responseText;
        // document.appendChild(primaryForm); //slideshow.js:108 Uncaught TypeError: Failed to execute 'appendChild' on 'Node': parameter 1 is not of type 'Node'.



}
  });
});

var i = 1;
function newForm(count){

    // https://stackoverflow.com/questions/5297876/clone-form-and-increment-id
    // https://stackoverflow.com/questions/19482076/how-to-duplicate-a-div-in-javascript

    var slideshowForm = document.getElementById("slideshowForm");

    var divClone = slideshowForm.cloneNode(true); // the true is for deep cloning

    // console.log(divClone);


    // https://stackoverflow.com/questions/46078328/change-ids-of-child-elements-in-javascript-when-cloning-an-element
    // https://jsfiddle.net/ymnkr9cp/5/
    
    // var belowOriginalForm = document.getElementById("x");
    var belowOriginalForm = document.getElementById("belowOriginalForm");


    // var i = 1;

    var slideshowForm = document.getElementById("slideshowForm");

    var divClone = slideshowForm.cloneNode(true); // the true is for deep cloning

    i++;
    divClone.id = "profileImg" + i;
    divClone.getElementsByTagName('input')[0].name = "profileDisplay" + i;
    var incrementedProfileDisplay = divClone.getElementsByTagName('input')[0].name = "profileDisplay" + i;
    incrementedProfileDisplayArray.push(incrementedProfileDisplay);
    divClone.getElementsByTagName('input')[0].id = "profileImage" + i;
    // console.log(divClone.getElementsByTagName('input')[0].name = "profileDisplay" + i);
    divClone.getElementsByTagName('img')[0].id = "profileDisplay" + i;
    divClone.getElementsByTagName('button')[0].id = "upload-button" + i;   
    // https://stackoverflow.com/questions/9731728/javascript-change-img-src-attribute-without-jquery
    divClone.querySelector('#' + incrementedProfileDisplay).setAttribute('src', "img/profilephotogif.gif");

    belowOriginalForm.appendChild(divClone);
    // addListeners();

    // https://www.webdeveloper.com/d/186584-resolved-event-listeners-and-clonenode    //Events are not cloned, you will have to add them.
    // https://stackoverflow.com/questions/46485703/clone-divs-children-using-javascript
    // https://www.w3schools.com/js/js_htmldom_eventlistener.asp
    divClone.querySelector("span").addEventListener("click", function(e) {
        // console.log(e.target);
        var imgID = divClone.querySelector("img").id;             
        // console.log(imgID);
        // https://www.w3schools.com/jsref/jsref_push.asp
        imgIDArray.push(imgID);
        // console.log('Array for Images----------' + imgIDArray);
        // alert("Hello World!");
        // https://www.w3schools.com/jsref/met_element_addeventlistener.asp
        // this.style.backgroundColor = "red";
        var profileImageID = divClone.querySelector("input").id;   
        profileImageIDArray.push(profileImageID);   
        console.log(profileImageID);  
        
        // divClone.querySelector("input").click();
    
        // if (e.files[0]) {

        // alert("getting there");

        // }else{
        //     alert("ERROR");
        // }



      });


    divClone.querySelector("form").addEventListener("click", function (event) {
        // divClone.querySelector("input").click();
        var inputID = divClone.querySelector("input").id;             
        // console.log(inputID);
        
        // var test =  '"' + inputID +  '"';
        // console.log(test);
        // var getTest = document.getElementById(test);
        // console.log(getTest);  
        inputIDArray.push(inputID);
        console.log(inputIDArray);
        // divClone.querySelector("input").click();


        
        
        // var fileSelectClone = document.getElementById(inputIDArray);
        // var profileImageClone = '"' + fileSelectClone.querySelector("input").id + '"';   
        // console.log(profileImageClone);
        // var placeholder = document.getElementById(profileImageClone).value; 
        // console.log(placeholder);
    }); 
    
    divClone.querySelector("img").addEventListener("click", function(e) {
        //This causes console.log(fileSelectClone); further down in the code
        //to give a value of null, sometimes not all the time.  NOTE This happens if this logic is placed just before the divClone.querySelector("form") which currently above this logic.
        //Where this logic is now in the code, the file api doesn't run a second time and I don't get an alert or console.log either so it seems it's not being registered.
        //Sometimes it interferes with the logic further down in the logic. 
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
        // var inputCloneName = divClone.getElementsByTagName('input')[0].name;
        // console.log(inputCloneName); 
        // https://stackoverflow.com/questions/15696292/why-does-quoting-matter-with-getelementbyid
        // var profileImageClone = '"' + fileSelectClone.querySelector("input").id + '"';   
        // console.log(profileImageClone);
        // console.log("Profile Image Clone----------" + profileImageClone); 
        // console.log(FilesArray);   
        // https://stackoverflow.com/questions/15696292/why-does-quoting-matter-with-getelementbyid
        // var placeholder = document.getElementById(profileImageClone); 
        // console.log(placeholder);
        // var fileClone = document.getElementById(profileImageClone);
        // https://www.tutorialspoint.com/stop-making-form-to-reload-a-page-in-javascript

        var formCloneArray = {
          "fileTagCloneID":fileSelectClone,
          "imgTagCloneID":imgTagIDClone
        }

        console.log(formCloneArray);
        console.log(JSON.stringify(formCloneArray));
       
        // https://stackoverflow.com/questions/9713058/send-post-data-using-xmlhttprequest
        const xhr = new XMLHttpRequest();
        console.log(fileSelect.files[0]);
        const formDataClone = new FormData();
      formDataClone.append("myFiles", fileSelect.files[0]);
      // https://stackoverflow.com/questions/47259681/how-to-append-array-in-formdata-array-in-which-includes-2-values-with-keys
      formDataClone.append("formCloneArray", JSON.stringify(formCloneArray));
        // var params = 'myFiles=' + fileSelect.files[0];
        xhr.open("POST", "addSlide.php");
        xhr.send(formDataClone);

        xhr.addEventListener('load', function(){
            if(this.readyState === 4 & this.status === 200){
                console.log(this.responseText);
                alert(this.responseText);
            }
        })                    
        });

        // https://javascriptio.com/view/4553658/uncaught-typeerror-cannot-read-property-files-of-null
        //Nothing happens when you run this. In fact, when you hover over the input element in the developer console,
        //it isn't highlighted on the web page as compared to when you hover the image element.
        divClone.querySelector("input").addEventListener("click", function (event){ 
            // event.preventDefault();
            alert("INPUT STAGE");
            var formData = new FormData();   
            console.log(formData); 
            // var clicked = event.target;  
            // var file = clicked.files[0];
            // console.log(file); //Gives an error of undefined
            // formData.append("myFiles", file);                    
        });    
    

}

// https://stackoverflow.com/questions/3103962/converting-html-string-into-dom-elements
// https://stackoverflow.com/questions/27079598/error-failed-to-execute-appendchild-on-node-parameter-1-is-not-of-type-no
// https://blog.wplauncher.com/uncaught-typeerror-failed-to-execute-appendchild-on-node-parameter-1-is-not-of-type-node/
// https://www.w3schools.com/jsref/met_node_appendchild.asp

  

 
