    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function hideSideNav(){
        document.getElementById("mySidenav").style.width = "0";

    }

    // https://www.w3schools.com/howto/howto_js_active_element.asp 
    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_active_element
    // https://www.w3schools.com/jsref/prop_html_classname.asp
    // Add active class to the current button (highlight it)
    var header = document.getElementById("menu-wrapper");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace("active","");
    this.className += " active";
    });
    }                             
  
    // https://www.w3schools.com/howto/howto_js_toggle_class.asp  
    // https://jsfiddle.net/uu152uu9/  
    // https://www.youtube.com/watch?v=FKQkx-wGexo 
    // function changeActiveClass(){
    //         mainMenu.classList.toggle('active');    
    // }   

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    // https://codepen.io/sitanotern1337/pen/MPVbeL
    //I had to modify the code a bit. It's similar to the code shown in this video
    //https://www.youtube.com/watch?v=V9CY0F4Wc7M (The "scroll" event in JavaScript | window.onscroll)
    const newNav = () => {
        let navigation = document.querySelector('.nav');
        window.addEventListener('scroll', () => {
          if(document.body.scrollTop > 100 ||document.documentElement.scrollTop > 100 ) {
            navigation.classList.add('hide');
          } else {
            navigation.classList.remove('hide');
          }
        });
      
      }
      
      newNav();


  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    //   https://stackoverflow.com/questions/1144805/scroll-to-the-top-of-the-page-using-javascript?noredirect=1&lq=1
    // Get The Id
    var topPage = document.getElementById(`top-page`)
    // On scroll, Show/Hide the button
    window.onscroll = () => {
    window.scrollY > 300
        ? (topPage.style.display = `block`)
        : (topPage.style.display = `none`)
          
                    
    }    

    function topPageScroll(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace("active","");
      
      // https://www.w3schools.com/howto/howto_js_add_class.asp
      var element = document.getElementById("myDIV");
      element.classList.add("active");
      
      // https://stackoverflow.com/questions/5898656/check-if-an-element-contains-a-class-in-javascript
      // https://codetogo.io/how-to-check-if-element-has-class-in-javascript/  

    }

    var topPageMenuRemove = document.getElementById(`top-page`)
    topPageMenuRemove.onclick = () => {
      topPageScroll();
      window.scrollTo({ top: 0, behavior: 'smooth'        
                  })
    }
     
    function toggle(){
      var blur = document.getElementById('blur');
      blur.classList.toggle('active')

      var popup = document.getElementById('popup');
      popup.classList.toggle('active')

      var blurAbout = document.getElementById('blurAbout');
      blurAbout.classList.toggle('active')

  }

  // https://codepen.io/ptamaro/pen/YQWMEW    
  window.onload = function() {

      var blur = document.getElementById('blur');
      blur.classList.toggle('active')

      var popup = document.getElementById('popup');
      popup.classList.toggle('active')

      
      var blur = document.getElementById('blurAbout');
      blur.classList.toggle('active')


  };


  // Slide Show Logic

  const slides = document.querySelectorAll('.slide');
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');
const auto = true; // Auto scroll
const intervalTime = 5000;
let slideInterval;

const nextSlide = () => {
  // Get current class
  const current = document.querySelector('.current');
  // Remove current class
  current.classList.remove('current');
  // Check for next slide
  if (current.nextElementSibling) {
    // Add current to next sibling
    current.nextElementSibling.classList.add('current');
  } else {
    // Add current to start
    slides[0].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
};

const prevSlide = () => {
  // Get current class
  const current = document.querySelector('.current');
  // Remove current class
  current.classList.remove('current');
  // Check for prev slide
  if (current.previousElementSibling) {
    // Add current to prev sibling
    current.previousElementSibling.classList.add('current');
  } else {
    // Add current to last
    slides[slides.length - 1].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
};

// Button events
next.addEventListener('click', e => {
  nextSlide();
  if (auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, intervalTime);
  }
});

prev.addEventListener('click', e => {
  prevSlide();
  if (auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, intervalTime);
  }
});

// Auto slide
if (auto) {
  // Run next slide at interval time
  slideInterval = setInterval(nextSlide, intervalTime);
}

// Contact Us Logic

const contact = document.getElementById('contact');
const contactSubmit = document.getElementById('contact-submit');

contact.addEventListener('submit', e => {
	e.preventDefault();	
	console.log("!!!!!!!!!!!!!!!!!!");
});

contactSubmit.addEventListener("click", function () {
	const requestContact = new XMLHttpRequest();

	requestContact.onload = () => {
		let responseObject = null;

		try {
			
		responseObject = JSON.parse(requestContact.responseText);	
		console.log(responseObject);	

		
		if(responseObject.success) {
			var successMessage = document.getElementById('success');
			successMessage.textContent = responseObject.success;				
		}

		if(responseObject.mailError || responseObject.emptyErrorFailure) {
			var errorMessage = document.getElementById('success');
			errorMessage.textContent = responseObject.mailError;	
			errorMessage.textContent = responseObject.emptyErrorFailure;							
		}

		if(responseObject.success) {
			var successMessage = document.getElementById('success');
			successMessage.textContent = responseObject.success;				
		}

		if(responseObject.nameError) {
			var nameErrorMessage = document.getElementById('nameError');
			nameErrorMessage.textContent = responseObject.nameError;				
		}
		if(responseObject.emailError) {
			var emailErrorMessage = document.getElementById('emailError');
			emailErrorMessage.textContent = responseObject.emailError;				
		}
		if(responseObject.phoneError) {
			var phoneErrorMessage = document.getElementById('phoneError');
			phoneErrorMessage.textContent = responseObject.phoneError;				
		}

		} catch (e) {
			console.error('Could not parse JSON!');
		}
	};

	const contactData = `name=${contact.name.value}&email=${contact.email.value}&phone=${contact.phone.value}&message=${contact.message.value}`;

	requestContact.open('post', 'contact_process.php');
	requestContact.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	requestContact.send(contactData);
});	

// Contact Us Logic