
$(document).ready(function(){

	//hide master class date control
	// $('#masterclass_date').hide();
	// $('#masterclass_place').hide();

	// // if master class radio button is (yes)
	// $('#radios-0').bind('click', function() {
	// 	$('#masterclass_date').hide().fadeIn(500);
	// 	$('#masterclass_place').hide().fadeIn(500);
	// });
	// // if master class radio button is (no)
	// $('#radios-1').bind('click', function() {
	// 	$('#masterclass_date').hide();
	// 	$('#masterclass_place').hide();
	// });
	


	$('#dob').datetimepicker({
	    //lang:'ar',
	    //formatTime:'H:i',
	    formatDate:'dd-mm-yyyy',
	    timepicker: false,
	    //defaultDate:'8.12.1986', // it's my birthday
	    //defaultDate:'+03.01.1970', // it's my birthday
	    
	    timepickerScrollbar:false
	});

	$('#next_workshop_date').datetimepicker({
	    //lang:'ar',
	    //formatTime:'H:i',
	    formatDate:'dd-mm-yyyy',
	    timepicker: false,
	    //defaultDate:'8.12.1986', // it's my birthday
	    //defaultDate:'+03.01.1970', // it's my birthday
	    
	    timepickerScrollbar:false
	});




	$('#social_post').click(function(){


		//callback handler for form submit
		$("#socialMedia").submit(function(e)
		{
			
		    var postData = $(this).serialize();
		    // console.log(postData);
		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : formURL,
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            $('#status').innerHTML = data;
		            console.log(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    $(this).unbind(e); //unbind. to stop multiple form submit.
		});
		 
		$("#socialMedia").submit(); //Submit  the FORM
	});

	$('#workshop_post').click(function(){


		//callback handler for form submit
		$("#workshopForm").submit(function(e)
		{
			
		    var postData = $(this).serialize();
		    // console.log(postData);
		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : formURL,
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            $('#status').innerHTML = data;
		            
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            console.log('Error Occured!!');     
		        }
		    });
		    e.preventDefault(); //STOP default action
		    $(this).unbind(e); //unbind. to stop multiple form submit.
		});
		 
		$("#workshopForm").submit(); //Submit  the FORM
		document.location.reload(); // to reload the modal invoking page, and refresh the table data (workshops)
	});



	//triggered when edit workshop modal is about to be shown
	$('#editWorkshopModal').on('show.bs.modal', function(e) {
		console.log('hello');
	    //get data-id attribute of the clicked element
	    var workshop_id = $(e.relatedTarget).data('id');
	    var workshop_name_en = $(e.relatedTarget).data('name-en');
	    var workshop_name_ar = $(e.relatedTarget).data('name-ar');
	    var note = $(e.relatedTarget).data('note');
	    var active = $(e.relatedTarget).data('active');

	    //populate the textboxes
	    $(e.currentTarget).find('input[name="workshop_id"]').val(workshop_id);
	   	$(e.currentTarget).find('input[name="workshopName_ar"]').val(workshop_name_ar);
	    $(e.currentTarget).find('input[name="workshopName_en"]').val(workshop_name_en);
	    $(e.currentTarget).find('textarea[name="note"]').val(note);
	    if (active == 1) {
	    	$(e.currentTarget).find('input[name="active"]').prop('checked', true);
	    } else {
	    	$(e.currentTarget).find('input[name="active"]').prop('checked', false);
	    }
	    
	});

	$('#edit_workshop_post').click(function(){

		//callback handler for form submit
		$("#editWorkshopForm").submit(function(e)
		{
			
		    var postData = $(this).serialize();
		    // console.log(postData);
		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : formURL,
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            $('#status').innerHTML = data;
		            console.log(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            console.log('Error Occured!!');     
		        }
		    });
		    e.preventDefault(); //STOP default action
		    $(this).unbind(e); //unbind. to stop multiple form submit.
		});
		 
		$("#editWorkshopForm").submit(); //Submit  the FORM
		document.location.reload(); // to reload the modal invoking page, and refresh the table data (workshops)
	});

	//triggered when delete workshop modal is about to be shown
	$('#deleteWorkshopModal').on('show.bs.modal', function(e) {
		var workshop_id = $(e.relatedTarget).data('id');

		$(e.currentTarget).find('input[name="workshop_id"]').val(workshop_id);
	});



	$('#delete_workshop').click(function(e){
		
		//callback handler for form submit
		$("#deleteWorkshopForm").submit(function(e)
		{
			var postData = $(this).serialize();
		    // console.log(postData);
		    var formURL = $(this).attr("action");

			$.ajax({
				url: formURL,
				type: "POST",
				data: postData,
				success: function(data, textStatus, jqXHR)
				{
					$('#status').innerHTML = data;
					console.log(data);
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					console.log('Error Occured!!'); 
				}
			});

			e.preventDefault(); //STOP default action
		    $(this).unbind(e); //unbind. to stop multiple form submit.

		});

		$("#deleteWorkshopForm").submit(); //Submit  the FORM
		document.location.reload(); // to reload the modal invoking page, and refresh the table data (workshops)
		

	});


	
    

});