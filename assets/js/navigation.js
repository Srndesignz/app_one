function check_email() {
	var search_item = $("#email").val();
	jQuery.ajax({
		type: "POST",
		url: site_url+"/alumni/get_email",
		//dataType: 'json',
		data: {search_item: search_item},
		success: function(res) {
			//alert("Working");
			$('#email_err').html(res);
			}
		}); 
	//alert("Ajax field working");
}
function fetch_details(event) {
	//Fetch data from database and show them in input field
	event.preventDefault();
	var search_item = $("#email").val();
	jQuery.ajax({
		type: "POST",
		url: "get",
		//dataType: 'json',
		data: {search_item: search_item},
		success: function(res) {
			//alert("Working");
			$('#result').html(res);
			}
		});
	//alert("Ajax field working");
}
function add_qualifications() {
	var all_qualifications = $("#all_qualifications").val();
	var qualifications = all_qualifications + $("#basic_qualification").val() + " " + $("#specialisation").val() + ", ";
	$("#specialisation").val('');
	$("#all_qualifications").val(qualifications);
}
function clear_qualifications() {
	$("#all_qualifications").val("");
}
function fetch_details_modal() {
	var enc_email = $(this).data("value");
	var path = window.location.pathname;
	//alert(email);
	jQuery.ajax({
	type: "POST",
	//url: path + "index.php/staff/get_det",
	url: "get_det",
	//dataType: 'json',
	data: {enc_email: enc_email},
	success: function(res) {
		//alert("Working");
		$('.modal-body').html(res);
		}
	});
	//alert("Working");
}

function update_details_modal() {
	var enc_email = $('#encoded_email').val();
	var formData = new FormData();
    formData.append('photo', $('#photo')[0].files[0]);
    formData.append('name', $('#name').val());
    formData.append('all_qualifications', $('#all_qualifications').val());
    formData.append('department', $('#department').val());
    formData.append('designation', $('#designation').val());
    formData.append('teaching_experience', $('#teaching_experience').val());
    formData.append('industrial_experience', $('#industrial_experience').val());
    formData.append('other_experience', $('#other_experience').val());
    formData.append('patents', $('#patents').val());
    formData.append('papers_published', $('#papers_published').val());
    formData.append('blog', $('#blog').val());
    formData.append('email', $('#email').val());
    formData.append('address', $('#address').val());
    formData.append('phone', $('#phone').val());
    alert(formData);
    jQuery.ajax({
		type: "POST",
		//url: path + "index.php/staff/update",
		url: "update_modal/"+enc_email,
		//dataType: 'json',
		data: formData,
		processData: false,
		contentType: false,
		success: function(res) {
			alert("Success");
		}
	});
	//alert("Working");
}


function fetch_details_for_edit() {
	var email = $("#edit_email_field").val();
	if(email == "")
	{
		alert("Enter your email");
		//window.location.replace(window.location.protocol + "//" + window.location.host + "/");
	}
	else
	{
		var path = window.location.pathname;
		//alert(email);
		jQuery.ajax({
		type: "POST",
		url: path + "index.php/staff/edit",
		//dataType: 'json',
		data: {email: email},
		success: function(res) {
			//alert("Working");
			}
		}); 
	}
}
var position = "left";
function move_hanging_email_div() {
	if(position === "left")
	{
		$("#hanging-wrap").animate({
	    	right: "+=280",
	  	}, 500, function() {
	    	position = "right";
	    	$("#hanging-email-nav-icon").removeClass("fa fa-chevron-left").addClass("fa fa-chevron-right");
			return false;
	  });
	}
	if(position === "right")
	{
		$("#hanging-wrap").animate({
	    	right: "-=280",
	  	}, 500, function() {
	    	position = "left";
	    	$("#hanging-email-nav-icon").removeClass("fa fa-chevron-right").addClass("fa fa-chevron-left");
			return false;
	  });
		
	}
}

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function delete_staff() {
	var enc_email = $(this).data("value");
	jQuery.ajax({
		url : "delete/" + enc_email,
		success: function(res) {
			alert("Deleted");
			location.reload();
		}
	});
}

function enter() {
	//alert("Working");
	var photo = $('#photo').val();
	var photo_flag = "true";
	//alert($('#photo')[0].files[0]);
	if($('#photo').get(0).files.length == 0)
	{
		photo_flag = "false";
	}
	//alert(photo_flag);
	if($('#name').val() == '' || $('#all_qualifications').val() == '' || $('#email').val() == '' || $('#phone').val() == '')
	{
		alert("You missed an important field/fields! Please enter it.");
	}
	else
	{
		var formData = new FormData();
	    formData.append('photo', $('#photo')[0].files[0]);
	    formData.append('photo_flag', photo_flag);
	    formData.append('name', $('#name').val());
	    formData.append('passout_year', $('#passout_year').val());
	    formData.append('all_qualifications', $('#all_qualifications').val());
	    formData.append('department', $('#department').val());
	    formData.append('work_history', $('#work_history').val());
	    formData.append('blog', $('#blog').val());
	    formData.append('email', $('#email').val());
	    formData.append('phone', $('#phone').val());
	    //alert(site_url);
	    jQuery.ajax({
			type: "POST",
			//url: path + "index.php/staff/update",
			url: site_url+"/alumni/enter_detail/",
			//dataType: 'json',
			data: formData,
			processData: false,
			contentType: false,
			success: function(res) {
				alert(res);
			}
		});
	}
}
function load_modal_al() {
	var email = $('#edit_email_field').val();
	jQuery.ajax({
		type: "POST",
		url: site_url+"/alumni/load_modal_al/",
		data: {email: email},
		success: function(res) {
			if(res == "Email not present")
			{
				$('#edit_modal_al').modal('hide');
				alert("Email not present");
			}
			else
			{
				$('.modal_al').html(res);
			}
		}
	});
}
function update_modal_al() {
	var photo = $('#photo').val();
	var photo_flag = "true";
	if($('#photo').get(0).files.length == 0)
	{
		photo_flag = "false";
	}
	//alert($('#photo')[0].files[0]);
	if($('#name').val() == '' || $('#all_qualifications').val() == '' || $('#email').val() == '' || $('#phone').val() == '')
	{
		alert("You missed an important field/fields! Please enter it.");
	}
	else
	{
		var formData = new FormData();
	    formData.append('photo', $('#photo')[0].files[0]);
	    formData.append('photo_flag', photo_flag);
	    formData.append('name', $('#name').val());
	    formData.append('passout_year', $('#passout_year').val());
	    formData.append('all_qualifications', $('#all_qualifications').val());
	    formData.append('department', $('#department').val());
	    formData.append('work_history', $('#work_history').val());
	    formData.append('blog', $('#blog').val());
	    formData.append('email_old', $('#email_old').val());
	    formData.append('email', $('#original_email').val());
	    formData.append('phone', $('#phone').val());
		jQuery.ajax({
			type: "POST",
			url: site_url+"/alumni/update_modal_al/",
			data: formData,
			processData: false,
			contentType: false,
			success: function(res) {
				alert(res);
			}
		});
	}
}
function delete_alumni() {
	var email = $(this).data('email');
	jQuery.ajax({
		type: "POST",
		url: site_url+"/alumni/delete",
		data: {email: email},
		success: function(res) {
			alert(res);
			location.reload();
		}
	})
}
function load_modal_al_admin() {
	var email = $(this).data('email');
	jQuery.ajax({
		type: "POST",
		url: site_url+"/alumni/load_modal_al/",
		data: {email: email},
		success: function(res) {
			$('.modal_al').html(res);
		}
	});
}
