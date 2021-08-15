var imgIDArray = [];
var FilesArray = [];

// https://www.w3schools.com/jsref/prop_textarea_value.asp

var textAreaButton = document.getElementById("textAreaButton");

var textAreaInformation = document.getElementById("textAreaInformation"); 

textAreaButton.addEventListener("click", function () {

const request = new XMLHttpRequest();

request.onload = () => {
let responseObject = null;

try {
    
    responseObject = request.responseText;
    console.log(responseObject);	
    var submitStatus = document.getElementById("submitStatus"); 
    // https://www.javascripttutorial.net/javascript-dom/javascript-append/
    submitStatus.append(responseObject);
    var submitStatus = document.getElementById("submitStatus");
    // https://stackoverflow.com/questions/35630641/apply-css-dynamically-with-javascript
    submitStatus.setAttribute("style", "visibility:visible;");
   
} catch (e) {
    console.error('Could not parse JSON!');
}
};

const requestData = `textArea=${textAreaInformation.value}`;

request.open('post', 'aboutSQL.php');
request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
request.send(requestData);
});	

// Upload Photo/Image Logic

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
        console.log(e.target.result);
        FilesArray.push(e.target.result);
        }
    else{
        document.querySelector('#'+ imgIDArray).setAttribute('src', e.target.result);
        FilesArray.push(e.target.result);
        var clonedInputTagImage = e.target.result; 
        console.log(clonedInputTagImage);
        imgIDArray = [];
    }  
        
    }
    reader.readAsDataURL(e.files[0]);
}
}

// https://www.youtube.com/watch?v=dBIfkRzJGOM
var fileSelect = document.getElementById('profileImage');
var uploadButton = document.getElementById('textAreaButton');

uploadButton.addEventListener("click", function (event){
    console.log(fileSelect);
    event.preventDefault();
    const xhr = new XMLHttpRequest();
    console.log(fileSelect.files);
    const formData = new FormData();
    //It seems that if you are sending data to a php file with fomrData, you are unable to check for the key's name in the php file with for example if(isset($_POST['textArea'])){ }. You can only have if(isset($_POST['textArea'])){} in the php code if you send it from JS in the form of the following or an equivalent const requestData = `textArea=${textAreaInformation.value}`; which can be found further up in this code/file.  
    formData.append("aboutImage", fileSelect.files[0]);
	xhr.open("POST", "aboutImageUpload.php");
	xhr.send(formData);
	xhr.addEventListener('load', function () {
		if (this.readyState === 4 && this.status === 200) {
		  console.log(this.responseText); 
		  alert(this.responseText);

	}
	  });
});