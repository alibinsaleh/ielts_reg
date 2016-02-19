
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
	    Contact form
	*/
	// $('.contact-form form input[type="text"], .contact-form form textarea').on('focus', function() {
	// 	$('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
	// });
	// $('.contact-form form').submit(function(e) {
	// 	e.preventDefault();
	//     $('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
	//     var postdata = $('.contact-form form').serialize();
	//     $.ajax({
	//         type: 'POST',
	//         url: 'thankyou.php',
	//         data: postdata,
	//         dataType: 'json',
	//         success: function(json) {
	//             if(json.emailMessage != '') {
	//                 $('.contact-form form .contact-email').addClass('input-error');
	//             }
	//             if(json.subjectMessage != '') {
	//                 $('.contact-form form .contact-subject').addClass('input-error');
	//             }
	//             if(json.messageMessage != '') {
	//                 $('.contact-form form textarea').addClass('input-error');
	//             }
	//             if(json.emailMessage == '' && json.subjectMessage == '' && json.messageMessage == '') {
	//                 $('.contact-form form').fadeOut('fast', function() {
	//                     $('.contact-form').append('<p>Thanks for contacting us! We will get back to you very soon.</p>');
	//                     // reload background
	//     				$.backstretch("resize");
	//                 });
	//             }
	//         }
	//     });
	// });

	

	
    
    
});


function getXMLHTTP() { //fuction to return the xml http object
	var xmlhttp=false;	
	try{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)	{		
		try{			
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e){
			try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e1){
				xmlhttp=false;
			}
		}
	}
	 	
	return xmlhttp;
}

function move_to_archive(id) {		
	var strURL="move_to_archive.php?id="+id;
	var req = getXMLHTTP();
	
	if (req) {
		
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {		
					location.reload();				
					//document.getElementById('statediv').innerHTML=req.responseText;		
					//document.getElementById("status").innerHTML = "States are being populated";
				} else {
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

function move_to_unarchived(id) {		
	var strURL="move_to_unarchived.php?id="+id;
	var req = getXMLHTTP();
	
	if (req) {
		
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {		
					location.reload();				
					//document.getElementById('statediv').innerHTML=req.responseText;		
					//document.getElementById("status").innerHTML = "States are being populated";
				} else {
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}
