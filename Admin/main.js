function dynamicMenu(el){
    // https://stackoverflow.com/questions/15912246/access-data-attribute-without-jquery
 
    // https://stackoverflow.com/questions/45442926/vanilla-javascript-changing-data-attribute-of-this
    var reuse = el;
    var target = reuse.getAttribute('data-target');
    console.log(target);
    // http://youmightnotneedjquery.com/    
    // https://stackoverflow.com/questions/47819595/what-is-the-javascript-equivalent-of-jquerys-load-shorthand-method
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", target + ".php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("info").innerHTML = this.responseText;
        
            // https://www.codegrepper.com/code-examples/javascript/remove+double+quotes+from+string+in+javascript
            var xyz = target + ".php";
            var x = xyz.replace(/['"]+/g, '');
            console.log(x);
            var settingsTest = x;
            var contact =x; 
            
            if(target){
                loadScript(target + ".js");
            }
            // https://stackoverflow.com/questions/21294/dynamically-load-a-javascript-file
            function loadScript(url){
                var head = document.getElementsByClassName('js')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = url;
                head.appendChild(script);
                }
    
    
    
    
        }
            
    };  
   
} 

// https://stackoverflow.com/questions/17975922/how-to-change-active-class-while-click-to-another-link-in-bootstrap-use-jquery/17976096
$(document).ready(function(){
    $('section ul li a').click(function(event){
        //remove all pre-existing active classes
        $('.active').removeClass('active');

        //add the active class to the link we clicked
        $(this).addClass('active');

        //Load the content
        //e.g.
        //load the page that the link was pointing to
        //$('#content').load($(this).find(a).attr('href'));      

        event.preventDefault();
    });
});

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






