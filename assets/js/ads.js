$(document).ready(function(){

	//$('#ad_post').click(function(){

		// console.log('HeHeHe');
		// //callback handler for form submit
		// $("#adForm").submit(function(e)
		// {
			
		//     var postData = $(this).serialize();
		//     // console.log(postData);
		//     var formURL = $(this).attr("action");
		//     $.ajax(
		//     {
		//         url : formURL,
		//         type: "POST",
		//         data : postData,
		//         success:function(data, textStatus, jqXHR) 
		//         {
		//             $('#status').innerHTML = data;
		//             console.log(data);
		            
		//         },
		//         error: function(jqXHR, textStatus, errorThrown) 
		//         {
		//             console.log('Error Occured!!');     
		//         }
		//     });
		//     e.preventDefault(); //STOP default action
		//     $(this).unbind(e); //unbind. to stop multiple form submit.
		// });
		 
		// $("#adForm").submit(); //Submit  the FORM
		//document.location.reload(); // to reload the modal invoking page, and refresh the table data (workshops)


		



	//});

	//======================== Add Advertisment Modal =============================//

	//Program a custom submit function for the form

	$("#adForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);

	 
	  $.ajax({
	    url: 'add_ad.php',
	    type: 'POST',
	    data: formData,
	    async: true,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success: function (data, textStatus, jqXHR) {
	      console.log(data);
	    },
	    error: function(jqXHR, textStatus, errorThrown) 
        {
            console.log('Error Occured!!');     
        }
	  });
	 
	 	// return false;
	  document.location.reload();
	});


	//======================== EDIT Advertisment Modal =============================//

	//triggered when edit Advertisment modal is about to be shown

	$('#editAdModal').on('show.bs.modal', function(e) {
		
	    //get data-id attribute of the clicked element
	    var adID = $(e.relatedTarget).data('id');
	    var theFile = $(e.relatedTarget).data('file');
	    var adTitle = $(e.relatedTarget).data('title');
	    var active = $(e.relatedTarget).data('active');
	    var adHeight = $(e.relatedTarget).data('height');
	    var adWidth = $(e.relatedTarget).data('width');
	    var displayFrom = $(e.relatedTarget).data('displayFrom');
	    var adOrder = $(e.relatedTarget).data('order');
	    
	    
	    

	    //populate the textboxes
	    $(e.currentTarget).find('input[name="adID"]').val(adID);
	   	$(e.currentTarget).find('input[name="currentFile"]').val(theFile);
	    $(e.currentTarget).find('input[name="adTitle"]').val(adTitle);
	    $(e.currentTarget).find('input[name="active"]').val(active);
	    $(e.currentTarget).find('input[name="adHeight"]').val(adHeight);
	    $(e.currentTarget).find('input[name="adWidth"]').val(adWidth);
	    $(e.currentTarget).find('input[name="displayFrom"]').val(displayFrom);
	    $(e.currentTarget).find('input[name="adOrder"]').val(adOrder);

	    if (active == 1) {
	    	$(e.currentTarget).find('input[name="active"]').prop('checked', true);
	    } else {
	    	$(e.currentTarget).find('input[name="active"]').prop('checked', false);
	    }
	    
	});

	$("#adEditForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);

	  
	 
	  $.ajax({
	    url: 'edit_ad.php',
	    type: 'POST',
	    data: formData,
	    async: true,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success: function (data, textStatus, jqXHR) {
	      console.log(data);
	    },
	    error: function(jqXHR, textStatus, errorThrown) 
        {
            console.log('Error Occured!!');     
        }
	  });
	 
	 	// return false;
	  document.location.reload();
	});

	

});
