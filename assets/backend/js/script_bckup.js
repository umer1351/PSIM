/******************************************* Global <START> ***************************************************/
var PHONE_NUMBER_LENGTH = 10;
var PASSWORD_LENGTH = 10;
//AJAX FUNCTION VARIABLES <START>
var PARAM = {};
var FUNCTION_NAME  = '';
//AJAX FUNCTION VARIABLES <END>
var host = '';
if(window.location.host == 'localhost'){
    host = 'http://'+window.location.host+'/wowzer/ha_web_wowzer/code/beta/admin6y34q/';
	var ROUTE_SAMPLE_VIDEO_UPLOAD_DIR = 'http://'+window.location.host+'/wowzer/ha_web_wowzer/code/beta/assets/backend/uploads/samples/videos/';
}else{
    host = 'https://'+window.location.host+'/';
	var ROUTE_SAMPLE_VIDEO_UPLOAD_DIR = host+'assets/backend/uploads/samples/videos/';
}


/*
|--------------------------------------------------------------------------
| AJAX FUNCTIONS <Start>
|--------------------------------------------------------------------------
*/

/*--------------------------------------------------------------------------------------------------------------------------

FUNCTIONS LIST:
01: logoutAjax
--------------------------------------------------------------------------------------------------------------------------*/

/**
 * 01: logoutAjax
 *
 * This function is to logout admin.
 *
 */
	function logout(){
		xajax_logoutAjax();
	}
/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
*/
/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
	01: validateEmail
	02: validatePassword
	03: validateUrl
	04: validateSimplePassword
	04: validateNumber
	05: custom_alert
	06: successAlerts
	07: redirect
	08:isUrlValid
------------ Function List <End>-----------------*/	

	//01: validateEmail
	function validateEmail(email) {
        	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        	return re.test(email);
	}
	/*############################################################*/
	
	//02: validatePassword
	function validatePassword(password) {
			// Password should be a combination of small alphabets, capital alphabets, digits and special characters 
			var re = /(?=.*\d)(?=.*[a-z])(?=.*[!@#$&*])(?=.*[A-Z]).{10,}/;
        	return re.test(password);
	}
	/*############################################################*/
	//03: validateUrl
	function validateUrl(userInput) {
		var res = userInput.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
		if(res == null)
			return false;
		else
			return true;
	}
	/*############################################################*/
	
	//04: validateSimplePassword
	function validateSimplePassword(password) {
		//Password should be atleast `PASSWORD_LENGTH` characters long
        	return password.length>=PASSWORD_LENGTH;
	}
	/*############################################################*/
	
	//04: validateNumber
	function validateNumber(number){
		var re = /^\d+$/;
		return re.test(number);
	}
	/*############################################################*/
	
	//05: custom_alert
	function custom_alert(message) {
	    var $this = $('.bb-alert');
	    $this.find('span').html(message);
	    $this.delay(200).fadeIn().delay(3000).fadeOut(); 
	}
	
	//06: successAlerts
	function successAlerts(msg,url) {
			bootbox.dialog({
				 message: msg,
				 className: "upload_modal",
				 buttons: {
				    success: {
					    label: "OK",
					    className: "btn-success",
					    callback: function() {
						window.location = url;
					    }
				    }
				 }
				});
	}
	/*############################################################*/

	//07: redirect
	function redirect(url) {
		window.location =url;
	}
	/*############################################################*/
	
	//08:isUrlValid
	function isUrlValid(url) {
  	  return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	}

	/*############################################################*/
	/*------------ Defined Functions <End> ------------*/
	/*------------ Modal Functions <Start> ------------*/
	$(document).delegate(".form-group input,textarea", "keyup", function() {
		$(this).closest('.form-group').removeClass('has-error')
	})
	function showModal(content,title,url){
		$("#settings .text").text(content);
		$("#settings .modal-title").text(title);
		$("#settings .modal-footer>.blue").attr('onclick','redirect("'+url+'")');
		$("#settings").modal("show");
	}
	function showMessageContent(content,subject){
		$("#settings .text").text(content);
		$("#settings .modal-title").text(subject);
		$("#settings .modal-footer>.blue").attr('onclick','');
		$("#settings").modal("show");
	}
	function showReasonForRejection(content,subject,list){
		$("#ad_view_reason .text").text(content);
		if(content==""){
			$("#ad_view_reason .text").css('display','none');
			$("#ad_view_reason .text_heading").css('display','none');
		}
		$("#ad_view_reason .missing_details_label").text("Missing Details:");
		$("#ad_view_reason .missing_details_list").html(list);
		if(list==""){
			$("#ad_view_reason .missing_details_label").css('display','none');
			$("#ad_view_reason .missing_details_list").css('display','none');
		}
		$("#ad_view_reason .modal-title").text(subject);
		$("#ad_view_reason .modal-footer>.blue").attr('onclick','');
		$("#ad_view_reason").modal("show");
	}
	/*------------ Modal Functions <End> ------------*/
	
	/*------------ Status Update Function <Start> ------------*/
	//update_status
	function update_status(id,type,functionName,status){
		type2 = type.toLowerCase();
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type2+'?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+');');
			$("#delete_modal").modal("show");
		}else{
			window[functionName](id,status);
		}
	}

	function disclose_name(id) {

		FUNCTION_NAME = 'disclose_name';
			PARAM  = {id:id};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	/*------------ Status Update Function <End> ------------*/

/*------------ Onload Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
	00: Date picker
	01: Rating
	02: Custom dropdown
	03: Disable/Underdevelopment Feature message
	04: Show/Hide Password
	05: Adding pagination / sorting in backend tables
`	06: Upload Image
	07: PREVENT PARENT FUNCTION CALL ON CHILD CLICK
	08: ALWAYS USE ON() FOR DYNAMICALLY CREATED HTML
	09: Remove already selected category
	10: Remove already uploaded media
	11: Set cover image while uploading media
------------ Function List <End>-----------------*/	

	$(document).ready(function(){
		
		/* $( ".profile-userpic #profile_image" ).hover(function() {
		  $( ".profile-userpic .profile-edit" ).toggleClass('profile-up');
		}); */
		$(".rateYo").each(function(){
			var id = $(this).attr('id');
			var rating_val = $(this).data('rating');
			$("#"+id).rateYo({
				rating: rating_val,
				halfStar: true,
				readOnly: true
			});	
		});
		$('body').on('change', '#imgInp',function(e) {
			var img = URL.createObjectURL(e.target.files[0]);
			$(".image_64").val(img);
        	$('.image').attr('src', img);
			
		});
		$( "#editJobForm select[name=job_status]" ).change(function() {
			if($(this).val()==2){
				$("#editJobForm #reason_for_cancelation").slideDown();
			}else{
				$("#editJobForm #reason_for_cancelation").slideUp();
			}	
		});
		if($( "#addCouponForm select[name=reedeem_type]" ).val()==1){
			$("#addCouponForm .reedeem_cycle").css('display','none');
		}
		if($( "#editCouponForm select[name=reedeem_type]" ).val()==1){
			$("#editCouponForm .reedeem_cycle").css('display','none');
		}
		$( "#addCouponForm select[name=reedeem_type]" ).change(function() {
			if($(this).val()==1){
				$("#addCouponForm .reedeem_cycle").slideUp();
			}else{
				$("#addCouponForm .reedeem_cycle").slideDown();
			}	
		});
		$( "#editCouponForm select[name=reedeem_type]" ).change(function() {
			if($(this).val()==1){
				$("#editCouponForm .reedeem_cycle").slideUp();
			}else{
				$("#editCouponForm .reedeem_cycle").slideDown();
			}	
		});
		$('.dependant_id').each(function(){
			if($(this).find('option:selected').val() != 0){
				var question_id = $(this).find('option:selected').val();
				if($(this).closest('.surveyQuestion').find('.linked_option').prop('disabled') != true){
					$(this).closest('.surveyQuestion').find('.linked_option option').each(function(){
						if($(this).val() !=0){
							$(this).attr('data-question-id', question_id);
						}
					})
				}
			}
		})

		//00: Date picker
		$('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1:c+10",
		});
		$('#datepicker1').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1:c+10",
			});		

		//01: Custom dropdown
			$(".custom-select").each(function(){
				$(this).wrap("<span class='select-wrapper'></span>");
				$(this).after("<span class='holder'></span>");
			});
		/*############################################################*/
		
		//02: Disable/Underdevelopment Feature message
		$('.disable_feature').click(function(){
			custom_alert(' This feature is under development.');
		});
		/*############################################################*/	
		
		//03: Show/Hide Password
		$('.see_characters').change(function() {
			if (this.checked) {
				
			    $(this).closest('form').find("input[name=password]").get(0).type = 'text';
			} else {
			    $(this).closest('form').find("input[name=password]").get(0).type = 'password';
			}
		});
		/*############################################################*/	
   		$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);
    	});
		$('body').on('click','.change-profile-image', function() { 
			$( "#imgInp2" ).trigger( "click" );
		});
		$('body').on('click','.profile-edit', function() { 
			$( "#imgInp2" ).trigger( "click" );
		});
		//04: Adding pagination / sorting in backend tables
//		$('#stream_table').DataTable();
		/*############################################################*/	
		
		//05: Upload Image
   		$('#imgInp1').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
		/*############################################################*/	
		
		//06: PREVENT PARENT FUNCTION CALL ON CHILD CLICK
		$('body').on('click', '#dropbox > *', function(e){
			e.stopPropagation();    
		});
		/*############################################################*/
		
		//07: ALWAYS USE ON() FOR DYNAMICALLY CREATED HTML
		$('body').on('click','#dropbox', function() { 
			$( "#imgInp" ).trigger( "click" );
		});
		/*############################################################*/
		
		//08: Remove already selected category
	 	$('body').on('click','.remove_category', function() { 
			var category_id = $(this).attr("rel"); 
			$("#project_category").find('#0').attr("selected",true);
			$(".selectDefault").text($("#project_category").find('#0').text());
			var category_name = $(".cat_"+category_id).remove(); 
			$("#project_category").find("#"+category_id).attr("disabled", false);
			$("#project_category").find("#"+category_id).removeClass("current_cat_option");
				
			
		});
		/*############################################################*/
		
		//09: Remove already uploaded media
		$('body').on('click','.remove_media', function() { 
			var row_id = $(this).data( "media" ); 
			if($("#"+row_id).find('.set-cover').hasClass('cover_image')){
				$("#"+row_id).remove();
				$('.dropbox tr:first-child').find('.set-cover').addClass('cover_image');
				$('.cover_image a').text('COVER');
				$('.dropbox tr:first-child').find('.media_url').attr('data-cover','1');
			}
			else {
			$("#"+row_id).remove();
			}
			var count = $('#dropbox tr').length;
			if(count==0){
					$('.drop-here-text').show();
			}
		});
		/*############################################################*/
		
		//10: Set cover image while uploading media
		$('body').on('click','.set-cover', function() {
			if(!$(this).hasClass('cover_image')){ 
				$('.cover_image a').text('SET AS COVER');
				var prev_parent = $('.cover_image').closest('.image_row').attr('id');
				$('#'+prev_parent).find('.media_url').attr('data-cover','0');
				$('.cover_image').removeClass('cover_image');
				$(this).addClass('cover_image');
				$('.cover_image a').text('COVER');
				var parent = $(this).closest('.image_row').attr('id');
				$('#'+parent).find('.media_url').attr('data-cover','1');
			}
		});
		/*############################################################*/
	});
	
/*------------ Onload Functions <End> ------------*/

/******************************************** Global <END> ***************************************************/

/******************************************** MODULE 01: LOGIN <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
		01: Login Via Email
		02: Reset Via Email
------------ Function List <End>-----------------*/	
	//01: Login Via Email
	function loginByEmail(){
		//clear .errorMsg area
		$('#loginForm .errorMsg span').text('');
		
		//get form values
		var email = $('#loginForm input[name=username]').val();
		var user_password = $('#loginForm input[name=password]').val();
		var remember_me = "";
		if($('#remember').is(':checked')){
			remember_me = $('#remember:checked').val();
		}
		var error_flag = false;
		
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (!email) {
			$('#loginForm .errorMsg').show();
			$('#loginForm .errorMsg span').text('Please enter your email address');
			error_flag = true;		
		} else if( !validateEmail(email)){
			$('#loginForm .errorMsg').show();
			$('#loginForm .errorMsg span').text('Please enter a valid email address');
			error_flag = true;
		}	
		// validate password	
		else if (!user_password) {
			$('#loginForm .errorMsg').show();
			$('#loginForm .errorMsg span').text('Please enter your password');
			error_flag = true;
		}
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		
		//submit form
		else if(error_flag == false) {
			$("#loginForm .errorMsg").hide(); 
			FUNCTION_NAME = 'loginAjax';
			PARAM  = {email:email,user_password:user_password,remember_me:remember_me};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	/*#############################################################################################################################################*/
	//02: Reset Via Email
	function resetViaEmail() {
	//clear .errorMsg area
	$('#resetForm .errorMsg span').text('');
	$('#resetForm .errorMsg').hide();
	$("#resetForm .errorMsg").css("color","#e73d4a");
	$("#resetForm .errorMsg").css("border-color","#fbe1e3");
	$("#resetForm .errorMsg").css("background-color","#fbe1e3");
	//get form values
	var error_flag = false;
	var email = $('#resetForm input[name=email]').val();
	if(email == "") {
		$('#resetForm .errorMsg').show();
		$('#resetForm .errorMsg span').text("Email address is required");
		error_flag = true;
	}else if( !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email) ) {
		$('#resetForm .errorMsg').show();
		$('#resetForm .errorMsg span').text("Please enter a valid email address");
		error_flag = true;
	}else if(error_flag == false) {
		FUNCTION_NAME = 'resetPasswordAjax';
		PARAM  = {email:email};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
}
/*#############################################################################################################################################*/

/*------------ Defined Functions <End> ------------*/
	
/******************************************** MODULE 01: LOGIN <END> ***************************************************/

/******************************************** MODULE 02: USERS <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
		01: changePassword
		02: updateAccount
		03: update_user_status
		04: changeUserStatus
		05: update_user_sponsor_status
		06: changeUserSponsorStatus
		07: update_user_sponsor_status
		08: changeUserPaymentStatus
		09: update_file_status
		10: updateFileStatus
		11: update_video_status
		12: changeVideoStatus
		13: update_portfolio_image_status
		14: update_portfolio_image_status
------------ Function List <End>-----------------*/	

	//01: changePassword
function changePassword() {
	//clear .errorMsg area
	$('#changePasswordForm .errorMsg').text('');	
	var error_flag = false;
	//get form values
    var current_password = $( "#changePasswordForm input[name=password]" ).val();
	var new_password = $( "#changePasswordForm input[name=newPassword]" ).val();
	var new_password1 = $( "#changePasswordForm input[name=newPassword1]" ).val();
	if(!current_password){
		$('#changePasswordForm .errorMsg').text("Current password is required");
		var error_flag = true;
	} else if(!new_password){
		$('#changePasswordForm .errorMsg').text("New password is required");
		var error_flag = true;
	} else if(new_password.length <= 5) {
		$('#changePasswordForm .errorMsg').text("New password must be at least 6 characters")
		var error_flag = true;
	} else if(!new_password1){
		$('#changePasswordForm .errorMsg').text("Kindly re-enter new password");
		var error_flag = true;
	} else if(new_password1!==new_password){
		$('#changePasswordForm .errorMsg').text("New password does not match");
		var error_flag = true;
	} else if(error_flag == false) {
		FUNCTION_NAME = 'changePasswordAjax';
		PARAM  = {current_password:current_password,new_password:new_password};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
}
/*#############################################################################################################################################*/
	//02: updateAccount
	function updateAccount(user_id){
		//clear .errorMsg area
		$('#updateAdminForm .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		var first_name = $( "#updateAdminForm input[name=first_name]" ).val();
		var last_name = $( "#updateAdminForm input[name=last_name]" ).val();
		var email = $( "#updateAdminForm input[name=email]" ).val();
		var phone = $( "#updateAdminForm input[name=phone]" ).val();
		var address = $( "#updateAdminForm input[name=address]" ).val();
		if(!first_name){
			$('#updateAdminForm .errorMsg').text("First name is required");
			var error_flag = true;
		} else if(!last_name){
			$('#updateAdminForm .errorMsg').text("Last name is required");
			var error_flag = true;
		} else if(!phone){
			$('#updateAdminForm .errorMsg').text("Phone Number is required");
			var error_flag = true;
		} else if(!re.test(phone)){
			$('#updateAdminForm .errorMsg').text("Please enter a valid phone number");
			var error_flag = true;
		} else if(!email){
			$('#updateAdminForm .errorMsg').text("Email address is required");
			var error_flag = true;
		} else if(!validateEmail(email)) {
			$('#updateAdminForm .errorMsg').text("Please enter a valid email address");
			error_flag = true;
		} else if(error_flag == false) {
			var functionName = "redirect";
			$.ajaxFileUpload({
				url             :'./updateAccountAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp2',
				dataType        : 'json',
				data        	: {user_id:user_id,first_name:first_name,last_name:last_name,phone:phone},
				 success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr('onclick',functionName+'("'+obj.url+'");');
						$("#settings").modal("show");
					}else if(obj.status==3){
						$('.errorMsg').text(obj.response);
					}
				}
			});
		}
		
	}
	

/*#############################################################################################################################################*/
	//03: update_user_status
	function update_user_status(id,functionName,status){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		if(status == 2){
			$("#suspend_modal .modal-title").text(' Please specify reason for moving status to pending');
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-title").text('Pending');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+');');
			$("#suspend_modal").modal("show");
		}else if(status == 5){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").val('');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+','+current_status+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else if(status == 0){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Rejection Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+','+current_status+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else{
			if(current_status== 0 || current_status== 3){
				var text = 'approve';
			}else{
				var text = 'activate';
			}
			$("#delete_modal .modal-body").html('Are you sure you want to '+text+' the selected user?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+','+current_status+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('OK');
			$("#delete_modal").modal("show");
			//window[functionName](id,status);
		}
	}
	//04: changeUserStatus
	function changeUserStatus(user_id,status,current_status,action_row_type){
		var reason_for_suspension = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==5){
			var error_flag = false;
			reason_for_suspension = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_suspension === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for suspension");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeUserStatusAjax';
				PARAM  = {user_id:user_id,status:status,reason:reason_for_suspension,current_status:current_status,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else if(status==0){
			var error_flag = false;
			reason_for_suspension = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_suspension === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for rejection");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeUserStatusAjax';
				PARAM  = {user_id:user_id,status:status,reason:reason_for_suspension,current_status:current_status,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeUserStatusAjax';
			PARAM  = {user_id:user_id,status:status,reason:reason_for_suspension,current_status:current_status,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	//05: update_user_sponsor_status
	function update_user_sponsor_status(id,type,functionName,status,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		//alert();
		if(status == 0){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to cancel sponsorship of selected user?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('OK');
			$("#delete_modal").modal("show");
		}else if(status == 1){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to sponsor the selected user?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('OK');
			$("#delete_modal").modal("show");
		}
	}
	//06: changeUserSponsorStatus
	function changeUserSponsorStatus(user_id,status,action_row_type){
		FUNCTION_NAME = 'changeUserSponsorStatusAjax';
		PARAM  = {user_id:user_id,status:status,action_row_type:action_row_type};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		
	}
	//07: update_user_sponsor_status
	function update_user_payment_status(user_id,id,transaction_id,payment_type,amount,month_frequency,coupon_code,coupon_id,functionName,status,type,show_link,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Rejection Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+transaction_id+'","'+payment_type+'",'+amount+','+month_frequency+',"'+coupon_code+'","'+coupon_id+'",'+status+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else if(status == 1){
			$("#payment_approval_modal .modal-body #trans_id").val(transaction_id).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #payment_method").val(payment_type).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #amount").val(amount).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #payment_package").val(month_frequency+" months").prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #coupon_code").val(coupon_code).prop('disabled','disabled');
			if(coupon_code==""){
				$("#payment_approval_modal .modal-body .coupon_code").css('display','none');
			}
			if(show_link==0){
				$("#payment_approval_modal .modal-body .transaction_detail").css('display','none');
			}
			$("#payment_approval_modal .modal-title").text(type);
			$("#payment_approval_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+transaction_id+'","'+payment_type+'",'+amount+','+month_frequency+',"'+coupon_code+'","'+coupon_id+'",'+status+',"'+action_row_type+'");');
			if(window.location.host == 'localhost'){
				var url = host+"transaction-detail?id="+id;
			}else{
				var url = host+"admin6y34q/transaction-detail?id="+id;
			}
			
			$("#payment_approval_modal .modal-footer>.transaction_detail").attr('onclick','redirect("'+url+'");');
			$("#payment_approval_modal").modal("show");
		}
	}
	//08: changeUserPaymentStatus
	function changeUserPaymentStatus(user_id,id,transaction_id,payment_type,amount,month_frequency,coupon_code,coupon_id,status,action_row_type){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for rejection");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeUserPaymentStatusAjax';
				PARAM  = {user_id:user_id,id:id,transaction_id:transaction_id,payment_type:payment_type,amount:amount,month_frequency:month_frequency,coupon_code:coupon_code,coupon_id:coupon_id,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeUserPaymentStatusAjax';
			PARAM  = {user_id:user_id,id:id,transaction_id:transaction_id,payment_type:payment_type,amount:amount,month_frequency:month_frequency,coupon_code:coupon_code,coupon_id:coupon_id,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	
	//09: update_file_status
	function update_file_status(id,type,functionName,status){
		//alert();
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected video?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+');');
			$("#delete_modal .modal-footer>.blue").text('OK');
			$("#delete_modal").modal("show");
		}
	}
	//10: updateFileStatus
	function updateFileStatus(file_id,status){
		FUNCTION_NAME = 'changeFileStatusAjax';
		PARAM  = {file_id:file_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		
	}
	
	//11: update_video_status
	function update_video_status(id,vid_id,user_id,functionName,status,type,current_status,delete_status,is_active){
		if(delete_status == 3){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Deletion Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to reject the selected video?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+vid_id+'",'+status+','+current_status+','+delete_status+','+is_active+');');
			$("#suspend_modal").modal("show");
		}
		else if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Rejection Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to reject the selected video?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+vid_id+'",'+status+','+current_status+','+delete_status+','+is_active+');');
			$("#suspend_modal").modal("show");
		}else {
			$("#delete_modal .modal-body").html('Are you sure you want to approve the selected video?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+vid_id+'",'+status+','+current_status+','+delete_status+','+is_active+');');
			$("#delete_modal .modal-footer>.blue").text('Yes');
			$("#delete_modal").modal("show");
		}
	}
	
	//12: changeVideoStatus
	function changeVideoStatus(user_id,id,vid_id,status,current_status,delete_status,is_active){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if (delete_status==3){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for deletion");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeVideoStatusAjax';
				PARAM  = {user_id:user_id,id:id,vid_id:vid_id,status:status,reason:reason_for_rejection,current_status:current_status,delete_status:delete_status,is_active:is_active};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for rejection");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeVideoStatusAjax';
				PARAM  = {user_id:user_id,id:id,vid_id:vid_id,status:status,reason:reason_for_rejection,current_status:current_status,delete_status:delete_status,is_active:is_active};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeVideoStatusAjax';
			PARAM  = {user_id:user_id,id:id,vid_id:vid_id,status:status,reason:reason_for_rejection,current_status:current_status,delete_status:delete_status,is_active:is_active};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	
	//13: update_portfolio_image_status
	function update_portfolio_image_status(id,user_id,functionName,type,status){
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Deletion Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to reject the selected video?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+');');
			$("#suspend_modal").modal("show");
		}
	}
	
	//14: update_portfolio_image_status
	function changePortfolioImageStatus(user_id,id,status){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if (status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for deletion");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changePortfolioImageStatusAjax';
				PARAM  = {user_id:user_id,id:id,status:status,reason:reason_for_rejection};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changePortfolioImageStatusAjax';
			PARAM  = {user_id:user_id,id:id,status:status,reason:reason_for_rejection};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	
	
/*#############################################################################################################################################*/
/******************************************** MODULE 02: USERS <END> ***************************************************/
/******************************************** MODULE 03: General Functions <START> ***************************************************/

	function showMessage(msg){
		bootbox.alert({
			title: "Message Instructions",
			message: msg,
		});
	}

	function messageAlert() {     
		 setTimeout(function () { 
		swal({
		  title: "Thank you!",
		  text: "Saved!",
		  type: "success",
		  confirmButtonText: "OK",
		  confirmButtonClass: "survey-last-screen"
		},
		function(isConfirm){
		  if (isConfirm) {
			window.location.href = "#";
		  }
		}); }, 300);
	}
	function conducted(url) {     
		 setTimeout(function () { 
		swal({
		  title: "Marked as Conducted!",
		  type: "success",
		  confirmButtonText: "OK",
		  confirmButtonClass: "survey-last-screen"
		},
		function(isConfirm){
		  if (isConfirm) {
			window.location.href = url;
		  }
		}); }, 300);
	}
	function success(url) {     
		 setTimeout(function () { 
		swal({
		  title: "Successfully Sent",
		  type: "success",
		  confirmButtonText: "OK",
		  confirmButtonClass: "survey-last-screen"
		},
		function(isConfirm){
		  if (isConfirm) {
			window.location.href = url;
		  }
		}); }, 300);
	}
/******************************************** MODULE 03: General Functions <END> ***************************************************/


/******************************************** MODULE 04: Category <Start> ***************************************************/
/*------------ Function List <Start>-----------------
		01: addCategory
		02: editCategory
		03: changeCategoryStatus
------------ Function List <End>-----------------*/
	
	//01: addCategory
	function addCategory(){
		$('.errorMsg').text("");
	
		//Getting Values
		var title = $( "#addCategoryForm input[name=title]" ).val();
		var description = $( "#addCategoryForm textarea[name=description]" ).val();
		var category_fields = "";
		$( "#addCategoryForm .category_fields" ).each(function(){
			if($(this). prop("checked") == true){
				category_fields += $(this).val()+",";
			}
		});
		category_fields = category_fields.replace(/,\s*$/, "");
		var parent_id = $( "#parent_id" ).val();
		var is_featured = 0;
		if($('#is_featured').prop('checked') == true){
			is_featured = 1;
		}
		var show_category_fields = [];
		$( "#addCategoryForm .show_category_fields" ).each(function(i){
			if($(this). prop("checked") == true){
				show_category_fields.push($(this).val());
			}
		});
		//Validation Check
		var error_flag = false;
		if(title === "") {
			$('.errorMsg').text("Category title is required");
			error_flag = true;
		}else if(category_fields === "") {
			$('.errorMsg').text("Please select at least one talent profile field");
			error_flag = true;
		}else if(show_category_fields.length == 0) {
			$('.errorMsg').text("Please select profile fields to show with profile");
			error_flag = true;
		}else if(show_category_fields.length > 6) {
			$('.errorMsg').text("Please select only six profile fields to show with profile");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'addCategoryAjax';
			PARAM  = {title:title,description:description,category_fields:category_fields,parent_id:parent_id,is_featured:is_featured,show_category_fields:show_category_fields};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//02: editCategory
	function editCategory(cat_id){
		$('.errorMsg').text("");
	
		//Getting Values
		var title = $( "#editCategoryForm input[name=title]" ).val();
		var description = $( "#editCategoryForm textarea[name=description]" ).val();
		var category_fields = "";
		$( "#editCategoryForm .category_fields" ).each(function(){
			if($(this). prop("checked") == true){
				category_fields += $(this).val()+",";
			}
		});
		category_fields = category_fields.replace(/,\s*$/, "");
		var parent_id = $( "#parent_id" ).val();
		var is_featured = 0;
		if($('#is_featured').prop('checked') == true){
			is_featured = 1;
		}
		var show_category_fields = [];
		$( "#editCategoryForm .show_category_fields" ).each(function(i){
			if($(this). prop("checked") == true){
				show_category_fields.push($(this).val());
			}
		});
		//Validation Check
		var error_flag = false;
		if(title === "") {
			$('.errorMsg').text("Category title is required");
			error_flag = true;
		}else if(category_fields === "") {
			$('.errorMsg').text("Please select at least one talent profile field");
			error_flag = true;
		}else if(show_category_fields.length == 0) {
			$('.errorMsg').text("Please select profile fields to show with profile");
			error_flag = true;
		}else if(show_category_fields.length > 6) {
			$('.errorMsg').text("Please select only six profile fields to show with profile");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'editCategoryAjax';
			PARAM  = {cat_id:cat_id,title:title,description:description,category_fields:category_fields,parent_id:parent_id,is_featured:is_featured,show_category_fields:show_category_fields};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//03: changeCategoryStatus
	function changeCategoryStatus(cat_id,status){
		FUNCTION_NAME = 'changeCategoryStatusAjax';
		PARAM  = {cat_id:cat_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
	$('.category_fields').click(function(){
			var id = $(this).val();
		if($(this).prop('checked')){
			$('#show_'+id).prop('disabled',false);
		} else {
			$('#show_'+id).prop('disabled',true);			
		}
	})
	
	$(document).ready(function(){
		$('.category_fields').each(function(){
			var id = $(this).val();
			if($(this).prop('checked')){
				$('#show_'+id).prop('disabled',false);
			} else {
				$('#show_'+id).prop('disabled',true);			
			}
		})
		
	})
/******************************************** MODULE 04: Category <End> ***************************************************/
/******************************************** MODULE 05: PAGES <START> ***************************************************/
/*------------ Function List <Start>-----------------
		01: editPage
		02: addPageHeading
		03: deleteHeadings
		04: deleteHeadingAjax
		05: addFaqs
		06: deleteFaq
		07: deleteFaqAjax
		08: editSettings
		09: addHomeSlide
		10: updateSocialLinks
		11: updateGeneralSettings
		12: updateAboutContentStatus
		13: updateAboutContentStatus
		14: changeHomeSlideStatus
		15: messageTypeFilter
		16: addTeamMember
		17: changeTeamMemberStatus
------------ Function List <End>-----------------*/
	
	//01: editPage
	function editPage(page_id){
		//clear .errorMsg area
		$('.errorMsg').text('');	
		var error_flag = false;
		//get form values
			var content = new nicEditors.findEditor('page_content').getContent();
		if(!content){
			$('.errorMsg').text("Type page content");
			error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'editPageAjax';
			PARAM  = {page_id:page_id,content:content};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//02: addPageHeading
	function addPageHeading(page_id){
		bootbox.confirm({
			title: "Add Page Heading",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Heading *</label><input class="form-control" id="page_heading"></div>'+
					 '</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				var page_heading = $('#page_heading').val();
				if(result == true) {
					if(page_heading === ""){
						$('.errorMsg').text("Page heading is required field");
						return false;
					}
					FUNCTION_NAME = 'addPageHeadingAjax';
					PARAM  = {page_id:page_id,page_heading:page_heading};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
				}
			}
		})
	}
	
	//03: deleteHeadings
	function deleteHeadings(img,id,status,msg,page_id){
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected heading?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text("Delete Heading");
			$("#delete_modal .modal-footer>.blue").attr('onclick','deleteHeadingAjax('+id+','+status+','+page_id+');');
			$("#delete_modal").modal("show");
		}else{
			deleteHeadingAjax(id,status,page_id);
		}
	}
	
	//04: deleteHeadingAjax
	function deleteHeadingAjax(id,status,page_id){
		FUNCTION_NAME = 'changePageHeadingStatusAjax';
		PARAM  = {id:id,status:status,page_id:page_id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
	//05: addFaqs
	function addFaqs(){
		bootbox.confirm({
			title: "Add New Policy",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="privacy_heading"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="privacy_policy_content" style="resize: none; width:inherit;" value=""></textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var privacy_heading = $('#privacy_heading').val();
				var privacy_policy_content = $('#privacy_policy_content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(privacy_heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (privacy_policy_content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'addFaqsAjax';
					PARAM  = {privacy_heading:privacy_heading,privacy_policy_content:privacy_policy_content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
				}
			}
		})
	}

	function addTermsAndCondtions(){
		bootbox.confirm({
			title: "Add New ",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="heading"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="content" style="resize: none; width:inherit;" value=""></textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var heading = $('#heading').val();
				var content = $('#content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'addTermsAndCondtions';
					PARAM  = {heading:heading,content:content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
				}
			}
		})
	}
	
		function addFaq(){
		bootbox.confirm({
			title: "Add New ",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="heading"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="content" style="resize: none; width:inherit;" value=""></textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var heading = $('#heading').val();
				var content = $('#content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'addFaq';
					PARAM  = {heading:heading,content:content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
				}
			}
		})
	}
	function editFaq(id, heading, content, content_order){
		bootbox.confirm({
			title: "Edit Policy",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="heading" value="'+heading+'"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="content" style="resize: none; width:inherit;height:100px;">'+content+'</textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id" value="'+content_order+'"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var heading = $('#heading').val();
				var content = $('#content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'editFaqAjax';
					PARAM  = {id:id,heading:heading,content:content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					return false;
				}

			}
		})
	}

	function editTermsAndConditions(id, heading, content, content_order){
		bootbox.confirm({
			title: "Edit Policy",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="tnc_heading" value="'+heading+'"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="tnc_content" style="resize: none; width:inherit;height:100px;">'+content+'</textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id" value="'+content_order+'"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var heading = $('#tnc_heading').val();
				var content = $('#tnc_content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'editTermsAndConditionsAjax';
					PARAM  = {id:id,heading:heading,content:content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					return false;
				}

			}
		})
	}

	function update_event_status(id, content){
		bootbox.confirm({
			title: "Edit Policy",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="privacy_policy_content" style="resize: none; width:inherit;height:100px;">'+content+'</textarea></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
			var status = $('#update_event_status').val();
				var privacy_policy_content = $('#privacy_policy_content').val();
				
				if(result == true) {
					
					FUNCTION_NAME = 'update_event_status';
					PARAM  = {id:id,privacy_policy_content:privacy_policy_content,status:status};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					return false;
				}

			}
		})
	}

	//05: editPrivacyPolicy
	function editPrivacyPolicy(id, heading, content, content_order){
		bootbox.confirm({
			title: "Edit Policy",
			message: '<div class="row">'+
						'<div class="col-sm-12"><label>Page Heading *</label><input class="form-control" id="privacy_heading" value="'+heading+'"></div>'+
						'<div class="col-sm-12"><label>Content *</label><textarea id="privacy_policy_content" style="resize: none; width:inherit;height:100px;">'+content+'</textarea></div>'+
						'<div class="col-sm-12"><label>Content Order*</label><input class="form-control" id="order_id" value="'+content_order+'"></div>'+
					 	'</div><div class="errorMsg" style="color:red"></div>',
			callback: function(result) {
				// var faq_heading_id = $('#page_heading_select2 option:selected').val();
				var privacy_heading = $('#privacy_heading').val();
				var privacy_policy_content = $('#privacy_policy_content').val();
				var order_id = $('#order_id').val();
				if(result == true) {
					if(privacy_heading === ""){
						$('.errorMsg').text("Heading is required field");
						return false;
					} else if (privacy_policy_content === ""){
						$('.errorMsg').text("Content is required field");
						return false;						
					}else if (order_id === ""){
						$('.errorMsg').text("Content Order is required field");
						return false;						
					}
					FUNCTION_NAME = 'editPrivacyPolicyAjax';
					PARAM  = {id:id,privacy_heading:privacy_heading,privacy_policy_content:privacy_policy_content,order_id:order_id};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					return false;
				}

			}
		})
	}
	
	
	function deleteTermsAndConditions(id){
		
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected question?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text("Delete Question");
			$("#delete_modal .modal-footer>.blue").attr('onclick','deleteTermsAndConditionsAjax('+id+');');
			$("#delete_modal").modal("show");
		
	}
	
	//07: deleteFaqAjax
	function deleteTermsAndConditionsAjax(id){
		FUNCTION_NAME = 'deleteTermsAndConditionsAjax';
		PARAM  = {id:id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	function deletePrivacyPolicy(id){
		
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected question?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text("Delete Question");
			$("#delete_modal .modal-footer>.blue").attr('onclick','deletePrivacyPolicyAjax('+id+');');
			$("#delete_modal").modal("show");
		
	}
	
	//07: deleteFaqAjax
	function deletePrivacyPolicyAjax(id){
		FUNCTION_NAME = 'deletePrivacyPolicyAjax';
		PARAM  = {id:id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	//06: deletePrivacyPolicy
	function deleteFaq(id){
		
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected question?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text("Delete Question");
			$("#delete_modal .modal-footer>.blue").attr('onclick','deleteFaqAjax('+id+');');
			$("#delete_modal").modal("show");
		
	}
	
	//07: deleteFaqAjax
	function deleteFaqAjax(id){
		FUNCTION_NAME = 'deleteFaqAjax';
		PARAM  = {id:id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
	//08: editSettings
	function editSettings(){
		//clear .errorMsg area
		$('.errorMsg').text('');
		
		//get form values
		var image_upload_limit = $('#editSettingsForm input[name=image_upload_limit]').val();
		var error_flag = false;
		
		if (!image_upload_limit) {
			$('.errorMsg').text('Please enter image upload limit');
			error_flag = true;		
		} else if (image_upload_limit <= 0) {
			$('.errorMsg').text('Image upload limit must be greater than zero');
			error_flag = true;		
		} else if (!validateNumber(image_upload_limit)) {
			$('.errorMsg').text('Please enter valid image upload limit');
			error_flag = true;		
		} else if(error_flag == false) {
			FUNCTION_NAME = 'editSettingsAjax';
			PARAM  = {image_upload_limit:image_upload_limit};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	
	}
	
	//09: addHomeSlide
	function addHomeSlide(slide_id){ 
		//clear .errorMsg area
		$('.errorMsg').text('');
                previously_empty_img = $( "#addHomepageSlideForm input[name=previously_empty_img]" ).val();
		var image = $( "#addHomepageSlideForm input[id=image_64]" ).val();
		var image_upload = 1;
		var error_flag = false;
		//get form values
		var slide_url = $("#slide_url").val();
		var url_btn_text = $("#url_btn_text").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
		var slide_order = $("#slide_order").val();
		var slide_image = $('#image_id').attr('data-tag');
                //Validation Check
		if(image === "" && previously_empty_img == 0) {
			image_upload = 0;
		}
		if(!slide_order){
			$('.errorMsg').text("Please enter slide order");
			error_flag = true;
		} else if(image === "" && previously_empty_img == 1) {
			$('.errorMsg').text("Please upload image");
			error_flag = true;
		} else {
			 $.ajaxFileUpload({
                             
				url             :'./addhomepageSlideAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {slide_id:slide_id, slide_url:slide_url, content:content, slide_order:slide_order,image_upload:image_upload,slide_image:slide_image,url_btn_text:url_btn_text},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}
	
	//10: updateSocialLinks
	function updateSocialLinks(page_id){
		//clear .errorMsg area
		$('.errorMsg').text('');	
		var error_flag = false;
		//get form values
		var social_links = [];
		var index = 0;
		$( ".social_links" ).each(function(){
			social_links[index] = [$(this).attr('id'),$(this).val()];
				index++;
		});
		
		if (social_links[0][1] === "") {
			$('.errorMsg').text("Please add facebook link");
			error_flag = true;
		} else if (social_links[1][1] === "") {
			$('.errorMsg').text("Please add twitter link");
			error_flag = true;
		} else if (social_links[2][1] === "") {
			$('.errorMsg').text("Please add instagram link");
			error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'updateSocialLinksAjax';
			PARAM  = {page_id:page_id,social_links};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//11: updateGeneralSettings
	function updateGeneralSettings(){
		//clear .errorMsg area
		$('.errorMsg').text('');	
		var error_flag = false;
		//get form values
		var social_links = [];
		var index = 0;
		$( ".social_links" ).each(function(){
			social_links[index] = [$(this).attr('id'),$(this).val()];
				index++;
		});
		
		if (social_links[0][1] === "") {
			$('.errorMsg').text("Please add facebook link");
			error_flag = true;
		} else if (social_links[1][1] === "") {
			$('.errorMsg').text("Please add twitter link");
			error_flag = true;
		} else if (social_links[2][1] === "") {
			$('.errorMsg').text("Please add instagram link");
			error_flag = true;
		} else if (social_links[3][1] === "") {
			$('.errorMsg').text("Please add address");
			error_flag = true;
		} else if (social_links[4][1] === "") {
			$('.errorMsg').text("Please add phone number");
			error_flag = true;
		} else if (social_links[5][1] === "") {
			$('.errorMsg').text("Please add whatsapp number");
			error_flag = true;
		} else if (social_links[6][1] === "") {
			$('.errorMsg').text("Please add emai");
			error_flag = true;
		} else if(!validateEmail(social_links[6][1])) {
			$('.errorMsg').text("Please enter a valid email address");
			error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'updateGeneralSettings';
			PARAM  = {social_links:social_links};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}		
	}
	
	//12: updateAboutContentStatus
	function updateAboutContentStatus(id,text,status,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		bootbox.confirm({
			title: "Change Status",
			message: text,
			callback: function(result) {
				if(result == true) {
					FUNCTION_NAME = 'updateAboutContentStatusAjax';
					PARAM  = {id:id,status:status,action_row_type:action_row_type};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
				}
			}
		})
	}
	
	//13: updateAboutContentStatus
	function editAboutSection(id){
		//clear .errorMsg area
		$('.errorMsg').text('');
		var previously_empty_img = $( "#previously_empty_img" ).val();
		var home_about_id = $( "#home_about_id" ).val();
		var home_about_url = $( "#home_about_id" ).attr("data-url");
		var error_flag = false;
		//get form values
		var url = $("#section_url").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
                //Validation Check
		if(!content){
			$('.errorMsg').text("Please enter section content");
			error_flag = true;
		} else if(!previously_empty_img){
			$('.errorMsg').text("Please upload image");
			error_flag = true;
		} else {
			 $.ajaxFileUpload({
				url             :'../editAboutSectionAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {id:id, url:url, content:content, home_about_id:home_about_id, home_about_url:home_about_url},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Who We Are Seciton");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}
	
	//14: changeHomeSlideStatus
	function changeHomeSlideStatus(slide_id,status){
		FUNCTION_NAME = 'changeHomeSlideStatusAjax';
		PARAM  = {slide_id:slide_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
	//15: messageTypeFilter
	function messageTypeFilter(){
		var lesson_filter = $('#message_type_filter option:selected').val();
		var root_address = window.location.href.split('?')[0];
		var url = root_address+'?type='+lesson_filter;
		location.href = url;
	}
	
	//16: addTeamMember
	function addTeamMember(id){ 
		
		//clear .errorMsg area
		$('.errorMsg').text('');
                previously_empty_img = $( "#addTeamMemberSlideForm input[name=previously_empty_img]" ).val();
		var image = $( "#addTeamMemberSlideForm input[id=image_64]" ).val();
		var image_upload = 1;
		var error_flag = false;
		//get form values
		var url = $("#url").val();
		var name = $("#name").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
		var slide_order = $("#slide_order").val();
		var slide_image = $('#image_id').attr('data-tag');
                //Validation Check
		if(image === "" && previously_empty_img == 0) {
			image_upload = 0;
		}
		if(!name){
			$('.errorMsg').text("Please enter member name");
			error_flag = true;
		}
		else if(!slide_order){
			$('.errorMsg').text("Please enter member order");
			error_flag = true;
		} else if(image === "" && previously_empty_img == 1) {
			$('.errorMsg').text("Please upload image");
			error_flag = true;
		} else {
			 $.ajaxFileUpload({
                             
				url             :'./addTeamMemberAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {id:id, content:content, slide_order:slide_order,image_upload:image_upload,slide_image:slide_image,name:name,url:url},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Our Team");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}
	//17: changeTeamMemberStatus
	function changeTeamMemberStatus(id,status){
		FUNCTION_NAME = 'changeTeamMemberStatusAjax';
		PARAM  = {id:id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
/******************************************** MODULE 05: PAGES <END> ***************************************************/
/******************************************** MODULE 06: Price Packages <Start> ***************************************************/
/*------------ Function List <Start>-----------------
		01: addPricePackage
		02: editPricePackage
		03: changePricePackageStatus
------------ Function List <End>-----------------*/
//01: addPricePackage
function addPricePackage(){
		$('.errorMsg').text("");
	
		//Getting Values
		var name = $( "#addPricePackageForm input[name=name]" ).val();
		var amount = $( "#addPricePackageForm input[name=amount]" ).val();
		var month_frequency = $( "#addPricePackageForm input[name=month_frequency]" ).val();
		var description = $( "#addPricePackageForm textarea[name=description]" ).val();
		
		//Validation Check
		var error_flag = false;
		if(name === "") {
			$('.errorMsg').text("Price package name is required");
			error_flag = true;
		}else if(amount === "") {
			$('.errorMsg').text("Amount is required");
			error_flag = true;
		}else if(amount <= 0) {
			$('.errorMsg').text("Amount must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(amount)) {
			$('.errorMsg').text("Please enter valid amount");
			error_flag = true;
		}else if(month_frequency === "") {
			$('.errorMsg').text("Expiry duration is required");
			error_flag = true;
		}else if(month_frequency <= 0) {
			$('.errorMsg').text("Expiry duration must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(month_frequency)) {
			$('.errorMsg').text("Please enter valid expiry duration");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'addPricePackageAjax';
			PARAM  = {name:name,description:description,amount:amount,month_frequency:month_frequency};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//02: editPricePackage
	function editPricePackage(pack_id){
		$('.errorMsg').text("");
	
		//Getting Values
		var name = $( "#editPricePackageForm input[name=name]" ).val();
		var amount = $( "#editPricePackageForm input[name=amount]" ).val();
		var month_frequency = $( "#editPricePackageForm input[name=month_frequency]" ).val();
		var description = $( "#editPricePackageForm textarea[name=description]" ).val();
		
		//Validation Check
		var error_flag = false;
		if(name === "") {
			$('.errorMsg').text("Price package name is required");
			error_flag = true;
		}else if(amount === "") {
			$('.errorMsg').text("Amount is required");
			error_flag = true;
		}else if(amount <= 0) {
			$('.errorMsg').text("Amount must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(amount)) {
			$('.errorMsg').text("Please enter valid amount");
			error_flag = true;
		}else if(month_frequency === "") {
			$('.errorMsg').text("Expiry duration is required");
			error_flag = true;
		}else if(month_frequency <= 0) {
			$('.errorMsg').text("Expiry duration must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(month_frequency)) {
			$('.errorMsg').text("Please enter valid expiry duration"); 
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'editPricePackageAjax';
			PARAM  = {pack_id:pack_id,name:name,description:description,amount:amount,month_frequency:month_frequency};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	//03: changePricePackageStatus
	function changePricePackageStatus(pack_id,status){
		FUNCTION_NAME = 'changePricePackageStatusAjax';
		PARAM  = {pack_id:pack_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/******************************************** MODULE 06: Price Packages <End> ***************************************************/
/******************************************** MODULE 07: Coupon Codes <Start> ***************************************************/
/*------------ Function List <Start>-----------------
		01: addCoupon
		02: editCoupon
		03: changeCouponCodeStatus
------------ Function List <End>-----------------*/

//01: addCoupon
function addCoupon(){
		$('.errorMsg').text("");
	
		//Getting Values
		var coupon_code = $( "#addCouponForm input[name=coupon_code]" ).val();
		var discount_type = $( "#addCouponForm select[name=discount_type]" ).val();
		var discount_value = $( "#addCouponForm input[name=discount_value]" ).val();
		var reedeem_type = $( "#addCouponForm select[name=reedeem_type]" ).val();
		var reedeem_cycle = 1;
		if(reedeem_type == 2) {
			reedeem_cycle = $( "#addCouponForm input[name=reedeem_cycle]" ).val();
		}
		var startDate=  $("#addCouponForm #datepicker-range").data('daterangepicker').startDate.format('DD-MM-YYYY');
		var endDate=  $("#addCouponForm #datepicker-range").data('daterangepicker').endDate.format('DD-MM-YYYY');

		//Validation Check
		var error_flag = false;
		if(coupon_code === "") {
			$('.errorMsg').text("Coupon code is required");
			error_flag = true;
		}else if(discount_value === "") {
			$('.errorMsg').text("Discount value is required");
			error_flag = true;
		}else if(discount_value <= 0) {
			$('.errorMsg').text("Discount value must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(discount_value)) {
			$('.errorMsg').text("Please enter valid discount value");
			error_flag = true;
		}else if(reedeem_type == 2) {
			if(reedeem_cycle === "") {
				$('.errorMsg').text("Redeem cycle is required");
				error_flag = true;
			}else if(reedeem_cycle <= 0) {
				$('.errorMsg').text("Redeem cycle must be greater then zero");
				error_flag = true;
			}else if(!validateNumber(reedeem_cycle)) {
				$('.errorMsg').text("Please enter valid redeem cycle");
				error_flag = true;
			}else if(error_flag == false){
			FUNCTION_NAME = 'addCouponAjax';
			PARAM  = {coupon_code:coupon_code,discount_type:discount_type,discount_value:discount_value,reedeem_type:reedeem_type,reedeem_cycle:reedeem_cycle,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else if(error_flag == false){
			FUNCTION_NAME = 'addCouponAjax';
			PARAM  = {coupon_code:coupon_code,discount_type:discount_type,discount_value:discount_value,reedeem_type:reedeem_type,reedeem_cycle:reedeem_cycle,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//02: editCoupon
	function editCoupon(coupon_id){
		$('.errorMsg').text("");
	
		//Getting Values
		var coupon_code = $( "#editCouponForm input[name=coupon_code]" ).val();
		var discount_type = $( "#editCouponForm select[name=discount_type]" ).val();
		var discount_value = $( "#editCouponForm input[name=discount_value]" ).val();
		var reedeem_type = $( "#editCouponForm select[name=reedeem_type]" ).val();
		var reedeem_cycle = 1;
		if(reedeem_type == 2) {
			reedeem_cycle = $( "#editCouponForm input[name=reedeem_cycle]" ).val();
		}
		var startDate=  $("#editCouponForm #datepicker-range").data('daterangepicker').startDate.format('DD-MM-YYYY');
		var endDate=  $("#editCouponForm #datepicker-range").data('daterangepicker').endDate.format('DD-MM-YYYY');

		//Validation Check
		var error_flag = false;
		if(coupon_code === "") {
			$('.errorMsg').text("Coupon code is required");
			error_flag = true;
		}else if(discount_value === "") {
			$('.errorMsg').text("Discount value is required");
			error_flag = true;
		}else if(discount_value <= 0) {
			$('.errorMsg').text("Discount value must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(discount_value)) {
			$('.errorMsg').text("Please enter valid discount value");
			error_flag = true;
		}else if(reedeem_type == 2) {
			if(reedeem_cycle === "") {
				$('.errorMsg').text("Redeem cycle is required");
				error_flag = true;
			}else if(reedeem_cycle <= 0) {
				$('.errorMsg').text("Redeem cycle must be greater then zero");
				error_flag = true;
			}else if(!validateNumber(reedeem_cycle)) {
				$('.errorMsg').text("Please enter valid redeem cycle");
				error_flag = true;
			}else if(error_flag == false){
			FUNCTION_NAME = 'editCouponAjax';
			PARAM  = {coupon_id:coupon_id,coupon_code:coupon_code,discount_type:discount_type,discount_value:discount_value,reedeem_type:reedeem_type,reedeem_cycle:reedeem_cycle,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else if(error_flag == false){
			FUNCTION_NAME = 'editCouponAjax';
			PARAM  = {coupon_id:coupon_id,coupon_code:coupon_code,discount_type:discount_type,discount_value:discount_value,reedeem_type:reedeem_type,reedeem_cycle:reedeem_cycle,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//03: changeCouponCodeStatus
	function changeCouponCodeStatus(coupon_id,status){
		FUNCTION_NAME = 'changeCouponCodeStatusAjax';
		PARAM  = {coupon_id:coupon_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/******************************************** MODULE 07: Coupon Codes <End> ***************************************************/
/******************************************** MODULE 08: Jobs <Start> ***************************************************/
/*------------ Function List <Start>-----------------
		01: deleteJob
		02: update_job_payment_status
		03: changeJobPaymentStatus
		04: update_job_status
		05: changeJobStatus
		06: editJob
		07: update_talent_job_status
		08: changeTalentJobStatus
		09: update_talent_payment_status
		10: changeTalentPaymentStatus
		11: showUpdateAmountModal
		12: updateAmount
		13: update_review_status
		14: changeReviewStatus
		15: openTalentEngageModal
		16: showtalentEngageModal
		17: addTalentToJob
		18: filterTalentByCategory
		19: addJob
------------ Function List <End>-----------------*/

	//01: deleteJob
	function deleteJob(job_id,status){
		FUNCTION_NAME = 'deleteJobAjax';
		PARAM  = {job_id:job_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	//02: update_job_payment_status
	function update_job_payment_status(user_id,id,transaction_id,payment_type,amount,functionName,status,type,show_link,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		//alert();
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Rejection Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+transaction_id+'","'+payment_type+'",'+amount+','+status+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else if(status == 1){
			$("#payment_approval_modal .modal-body #trans_id").val(transaction_id).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #payment_method").val(payment_type).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #amount").val(amount).prop('disabled','disabled');
			$("#payment_approval_modal .modal-body #payment_package").parent('.input-group').closest('.col-md-6').css('display','none');
			$("#payment_approval_modal .modal-body .coupon_code").css('display','none');
			$("#payment_approval_modal .modal-title").text(type);
			$("#payment_approval_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+',"'+transaction_id+'","'+payment_type+'",'+amount+','+status+',"'+action_row_type+'");');
			if(show_link==0){
				$("#payment_approval_modal .modal-body .transaction_detail").css('display','none');
			}
			$("#payment_approval_modal").modal("show");
		}
	}
	//03: changeJobPaymentStatus
	function changeJobPaymentStatus(user_id,id,transaction_id,payment_type,amount,status,action_row_type){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for rejection");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeJobPaymentStatusAjax';
				PARAM  = {user_id:user_id,id:id,transaction_id:transaction_id,payment_type:payment_type,amount:amount,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeJobPaymentStatusAjax';
			PARAM  = {user_id:user_id,id:id,transaction_id:transaction_id,payment_type:payment_type,amount:amount,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	//04: update_job_status
	function update_job_status(user_id,id,functionName,status,type,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Cancelation Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else {
			$("#delete_modal .modal-body").html('Are you sure you want to change the status of the selected job?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('Yes');
			$("#delete_modal").modal("show");
		}
	}
	
	//05: changeJobStatus
	function changeJobStatus(user_id,id,status,action_row_type){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for cancelation");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeJobStatusAjax';
				PARAM  = {user_id:user_id,id:id,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeJobStatusAjax';
			PARAM  = {user_id:user_id,id:id,status:status,reason:reason_for_rejection,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	//06: editJob
	function editJob(job_id,current_status,user_id){
		$('.errorMsg').text("");
	
		//Getting Values
		var title = $( "#editJobForm input[name=title]" ).val();
		var talent_type = $( "#editJobForm select[name=talent_type]" ).val();
		var talent_quantity = $( "#editJobForm input[name=talent_quantity]" ).val();
		var amount = $( "#editJobForm input[name=amount]" ).val();
		var job_status = $( "#editJobForm select[name=job_status]" ).val();
		var reason = "";
		if($( "#editJobForm #reason_for_cancelation" ).is(":visible")){
			reason = $( "#editJobForm textarea[name=reason]" ).val();
		}
		var description = $( "#editJobForm textarea[name=description]" ).val();
		var startDate=  $("#editJobForm #datepicker-range").data('daterangepicker').startDate.format('DD-MM-YYYY');
		var endDate=  $("#editJobForm #datepicker-range").data('daterangepicker').endDate.format('DD-MM-YYYY');

		//Validation Check
		var error_flag = false;
		if(title === "") {
			$('.errorMsg').text("Job title is required");
			error_flag = true;
		}else if(talent_quantity === "") {
			$('.errorMsg').text("Total hiring number is required");
			error_flag = true;
		}else if(talent_quantity <= 0) {
			$('.errorMsg').text("Total hiring number must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(talent_quantity)) {
			$('.errorMsg').text("Please enter valid total hiring number");
			error_flag = true;
		}else if(amount === "") {
			$('.errorMsg').text("Amount is required");
			error_flag = true;
		}else if(amount <= 0) {
			$('.errorMsg').text("Amount must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(amount)) {
			$('.errorMsg').text("Please enter valid amount");
			error_flag = true;
		}else if(job_status==2 && reason===""){
			$('.errorMsg').text("Please enter reason for cancelation");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'editJobAjax';
			PARAM  = {job_id:job_id,user_id:user_id,reason:reason,title:title,talent_type:talent_type,talent_quantity:talent_quantity,amount:amount,job_status:job_status,description:description,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//07: update_talent_job_status
	function update_talent_job_status(id,user_id,job_id,functionName,status,type,job_start_date,job_end_date,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Removal Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+','+job_id+',"'+job_start_date+'","'+job_end_date+'","'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else {
			$("#delete_modal .modal-body").html('Are you sure you want to change the status of the selected talent?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+','+job_id+',"'+job_start_date+'","'+job_end_date+'","'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('Yes');
			$("#delete_modal").modal("show");
		}
	}
	
	//08: changeTalentJobStatus
	function changeTalentJobStatus(user_id,id,status,job_id,job_start_date,job_end_date,action_row_type){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for removal");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeTalentJobStatusAjax';
				PARAM  = {user_id:user_id,id:id,job_id:job_id,status:status,reason:reason_for_rejection,job_start_date:job_start_date,job_end_date:job_end_date,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeTalentJobStatusAjax';
			PARAM  = {user_id:user_id,id:id,job_id:job_id,status:status,reason:reason_for_rejection,job_start_date:job_start_date,job_end_date:job_end_date,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	
	//09: update_talent_payment_status
	function update_talent_payment_status(id,amount,functionName,status,type,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		$("#delete_modal .modal-body").html('Are you sure you want to change the payment status for selected talent?');
		$("#delete_modal .modal-title").text(type);
		$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+amount+','+status+',"'+action_row_type+'");');
		$("#delete_modal .modal-footer>.blue").text('Yes');
		$("#delete_modal").modal("show");
	}
	
	//10: changeTalentPaymentStatus
	function changeTalentPaymentStatus(id,amount,status,action_row_type){
		if(status==1){
			var error_flag = false;
			if(amount == 0){
				alert("Amount must be greater than zero.");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeTalentPaymentStatusAjax';
				PARAM  = {id:id,status:status,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeTalentPaymentStatusAjax';
			PARAM  = {id:id,status:status,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	
	//11: showUpdateAmountModal
	function showUpdateAmountModal(id,amount,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		$("#amount_update_modal .modal-body #amount").val(amount);
		$("#amount_update_modal .modal-title").text("Update Amount");
		$("#amount_update_modal .modal-footer>.blue").attr('onclick','updateAmount('+id+',"'+action_row_type+'");');
		$("#amount_update_modal").modal("show");
	}
	//12: updateAmount
	function updateAmount(id,action_row_type){
		//Validation Check
		var amount = $("#amount_update_modal .modal-body #amount").val();
		var error_flag = false;
		if(amount === "") {
			alert("Amount is required");
			error_flag = true;
		}else if(amount <= 0) {
			alert("Amount must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(amount)) {
			alert("Please enter valid amount");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'updateTalentAmountAjax';
			PARAM  = {id:id,amount:amount,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//13: update_review_status
	function update_review_status(id,job_id,user_id,user_name,functionName,status,type,reviewed_id,reviewer_role,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		if(status == 2){
			$("#suspend_modal .modal-title").text(type);
			$("#suspend_modal .modal-body .form-control").attr('placeholder','Rejection Reason');
			$("#suspend_modal .errorMsg").text('');
			//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
			$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+',"'+user_name+'",'+job_id+','+reviewed_id+','+reviewer_role+',"'+action_row_type+'");');
			$("#suspend_modal").modal("show");
		}else {
			$("#delete_modal .modal-body").html('Are you sure you want to change the status of the selected review?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+user_id+','+id+','+status+',"'+user_name+'",'+job_id+','+reviewed_id+','+reviewer_role+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('Yes');
			$("#delete_modal").modal("show");
		}
	}
	
	//14: changeReviewStatus
	function changeReviewStatus(user_id,id,status,user_name,job_id,reviewed_id,reviewer_role,action_row_type){
		var reason_for_rejection = "";
		$('#suspend_modal .errorMsg').text("");
		if(status==2){
			var error_flag = false;
			reason_for_rejection = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
			if(reason_for_rejection === ""){
				$('#suspend_modal .errorMsg').text("Please enter reason for rejection");
				error_flag = true;
			}else if(error_flag == false){
				FUNCTION_NAME = 'changeReviewStatusAjax';
				PARAM  = {user_id:user_id,id:id,user_name:user_name,status:status,job_id:job_id,reviewed_id:reviewed_id,reviewer_role:reviewer_role,reason:reason_for_rejection,action_row_type:action_row_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}
		}else{
			FUNCTION_NAME = 'changeReviewStatusAjax';
			PARAM  = {user_id:user_id,id:id,user_name:user_name,status:status,job_id:job_id,reviewed_id:reviewed_id,reviewer_role:reviewer_role,reason:reason_for_rejection,action_row_type:action_row_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}	
	}
	//15: openTalentEngageModal
	function openTalentEngageModal(job_id,talent_ids){
		//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
		FUNCTION_NAME = 'showTalentEngageModalAjax';
		PARAM  = {job_id:job_id,talent_ids:talent_ids};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	//16: showtalentEngageModal
	function showtalentEngageModal(html){
		$("#talentEngageModal").html(html);
		$("#talentEngageModal").modal("show");
	}
	//17: addTalentToJob
	function addTalentToJob(job_id){
		//Validation Check
		var user_id = $("#talentEngageModal .modal-body #user").val();
		$('#talentEngageModal .errorMsg').text("");
		var error_flag = false;
		if(user_id == 0) {
			$('#talentEngageModal .errorMsg').text("Kindly select the talent");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'addTalentToJobAjax';
			PARAM  = {job_id:job_id,user_id:user_id,};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	
	//18: filterTalentByCategory
	function filterTalentByCategory(cat_id,talent_ids){
	$.post( 'filter-talent', {'cat_id': cat_id,'talent_ids': talent_ids}, function(data){ //jQuery Ajax post
				$("#talentEngageModal .modal-body #user").html(data);
			});
	}
	
	//19: addJob
	function addJob(submit_type){
		$('.errorMsg').text("");
		//Getting Values
		var title = $( "#addJobForm input[name=title]" ).val();
		var talent_type = $( "#addJobForm select[name=talent_type]" ).val();
		var talent_quantity = $( "#addJobForm input[name=talent_quantity]" ).val();
		var amount = $( "#addJobForm input[name=amount]" ).val();
		var employer_id = $( "#addJobForm select[name=employer]" ).val();
		var description = $( "#addJobForm textarea[name=description]" ).val();
		var startDate=  $("#addJobForm #datepicker-range").data('daterangepicker').startDate.format('DD-MM-YYYY');
		var endDate=  $("#addJobForm #datepicker-range").data('daterangepicker').endDate.format('DD-MM-YYYY');

		//Validation Check
		var error_flag = false;
		if(title === "") {
			$('.errorMsg').text("Job title is required");
			error_flag = true;
		}else if(talent_quantity === "") {
			$('.errorMsg').text("Total hiring number is required");
			error_flag = true;
		}else if(talent_quantity <= 0) {
			$('.errorMsg').text("Total hiring number must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(talent_quantity)) {
			$('.errorMsg').text("Please enter valid total hiring number");
			error_flag = true;
		}else if(amount === "") {
			$('.errorMsg').text("Amount is required");
			error_flag = true;
		}else if(amount <= 0) {
			$('.errorMsg').text("Amount must be greater then zero");
			error_flag = true;
		}else if(!validateNumber(amount)) {
			$('.errorMsg').text("Please enter valid amount");
			error_flag = true;
		}else if(employer_id === ""){
			$('.errorMsg').text("Please select employer for this job");
			error_flag = true;
		}else if(error_flag == false){
			FUNCTION_NAME = 'addJobAjax';
			PARAM  = {submit_type:submit_type,employer_id:employer_id,title:title,talent_type:talent_type,talent_quantity:talent_quantity,amount:amount,description:description,startDate:startDate,endDate:endDate};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	/******************************************** MODULE 08: Jobs <End> ***************************************************/
	/******************************************** MODULE 09: Ads <Start> ***************************************************/
/*------------ Function List <Start>-----------------
		01: update_ad_status
		02: changeAdStatus
		03: upload_ad_image
		04: readURL
		05: addNewAd
		06: editAd
		07: filterYouTubeVideosByUser
------------ Function List <End>-----------------*/
	//01: update_ad_status
	function update_ad_status(id,type,functionName,status,action_row_type){
		if(typeof action_row_type === "undefined"){
			var action_row_type = 0;
		}
		type2 = type.toLowerCase();
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected ad?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+',"'+action_row_type+'");');
			$("#delete_modal").modal("show");
		} else {
			$("#delete_modal .modal-body").html('Are you sure you want to change the status of the selected ad?');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+',"'+action_row_type+'");');
			$("#delete_modal .modal-footer>.blue").text('Yes');
			$("#delete_modal").modal("show");
		}
	}
	//02: changeAdStatus
	function changeAdStatus(ad_id,status,action_row_type){
		FUNCTION_NAME = 'changeAdStatusAjax';
		PARAM  = {ad_id:ad_id,status:status,action_row_type:action_row_type};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	
	//03: upload_ad_image
	function upload_image_btn() {
		$("#imgInp").trigger('click');
	}
	
	//04: readURL
	function readURL(input) {
		if (input.files && input.files[0]) { 
			var file = $('#imgInp')[0].files[0];
			var imgName = file.name;
			//$('.img_name').text(imgName);
			var reader = new FileReader();
			var src;
			reader.onload = function(e) { 
				src =  e.target.result;
				$('.image_64').val(src);
				$('#add_product_image img').attr('src',src);
			}
			reader.readAsDataURL(input.files[0]);  
		}
	}
	
	//05: addNewAd
	function addNewAd(){
		$('.errorMsg').text("");
		//Getting Values
		var dimension_id = $( "#addNewAdForm select[name=dimensions]" ).val();
		var link = $( "#addNewAdForm input[name=link]" ).val();
		var image = $( "#addNewAdForm input[id=image_64]" ).val();
		var width = $( "#addNewAdForm select[name=dimensions]" ).children('option:selected').data('width');
		var height = $( "#addNewAdForm select[name=dimensions]" ).children('option:selected').data('height');
		//Validation Check
		var error_flag = false;
		if(dimension_id === "") {
			$('.errorMsg').text("Please select image dimensions");
			error_flag = true;
		}else if(link === "") {
			$('.errorMsg').text("Please enter ad url");
			error_flag = true;
		}else if(!validateUrl(link)) {
			$('.errorMsg').text("Please enter valid ad url");
			error_flag = true;
		}else if(image === "") {
			$('.errorMsg').text("Please upload image");
			error_flag = true;
		}else if(error_flag == false){
			$.ajaxFileUpload({
				url             :'./addNewAdAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {dimension_id:dimension_id,link:link,width:width,height:height},
				 success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Ads");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});
		}
	}
	//06: editAd
	function editAd(ad_id,curr_width,curr_height){
		$('.errorMsg').text("");
		//Getting Values
		previously_empty_img = $( "#editAdForm input[name=previously_empty_img]" ).val();
		var dimension_id = $( "#editAdForm select[name=dimensions]" ).val();
		var link = $( "#editAdForm input[name=link]" ).val();
		var image = $( "#editAdForm input[id=image_64]" ).val();
		var image_upload = 1;
		var width = $( "#editAdForm select[name=dimensions]" ).children('option:selected').data('width');
		var height = $( "#editAdForm select[name=dimensions]" ).children('option:selected').data('height');
		//Validation Check
		if(image === "" && previously_empty_img == 0) {
			image_upload = 0;
		}else if(image === "" && curr_width==width && curr_height==height) {
			image_upload = 0;
		}
		
		var error_flag = false;
		if(dimension_id === "") {
			$('.errorMsg').text("Please select image dimensions");
			error_flag = true;
		}else if(link === "") {
			$('.errorMsg').text("Please enter ad url");
			error_flag = true;
		}else if(!validateUrl(link)) {
			$('.errorMsg').text("Please enter valid ad url");
			error_flag = true;
		}else if(image === "" && previously_empty_img == 1) {
			$('.errorMsg').text("Please upload image");
			error_flag = true;
		}else if(image === "" && curr_width!=width && curr_height!=height) {
			$('.errorMsg').text("Please upload new image with selected image dimensions");
			error_flag = true;
		}else if(error_flag == false){
			$.ajaxFileUpload({
				url             :'./editAdAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {ad_id:ad_id,dimension_id:dimension_id,link:link,width:width,height:height,image_upload:image_upload},
				 success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Ads");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});
		}
	}
	
	//07: filterYouTubeVideosByUser
	function filterYouTubeVideosByUser(){
		var user_filter = $('#user_type_filter option:selected').val();
		var root_address = window.location.href.split('?')[0];
		var url = root_address+'?user_id='+user_filter;
		location.href = url;
	}






	function update_user_active_status($user_id) {
	
	 var user_id = $user_id;	
	 var status = $("#update_user_active_status").val();
	 // alert(status);
	 // return false;
	 if (status == '2') {
	 	update_user_status(user_id,'update_user_pending_status',status);
	 	return false;
	 }
	 
	 FUNCTION_NAME = 'update_user_active_status';
	 PARAM  = {status:status,user_id:user_id};
	 xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	 
	}


	function update_user_pending_status($user_id, $status, ) {
	
	 var user_id = $user_id;	
	 var status = $status;
	 var reason =  $("#suspend_modal textarea[name='reason_for_suspension']" ).val();;
	 
	 FUNCTION_NAME = 'update_user_active_status';
	 PARAM  = {status:status,user_id:user_id,reason:reason};
	 xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	 
	}
	
	/******************************************** MODULE 09: Ads <End> ***************************************************/	
	/******************************************** MODULE 10: Transactions <Start> ***************************************************/	
/*------------ Function List <Start>-----------------
		01: filterTransactionByUser
		02: filterTransactionByPaymentType
		03: deleteTransaction
------------ Function List <End>-----------------*/
	//01: filterTransactionByUser
	function filterTransactionByUser(){
		var user_filter = $('#user_type_filter option:selected').val();
		var payment_filter = $('#payment_type_filter option:selected').val();
		var root_address = window.location.href.split('?')[0];
		var url = root_address+'?user_id='+user_filter+"&type="+payment_filter;
		location.href = url;
	}
	//02: filterTransactionByPaymentType
	function filterTransactionByPaymentType(){
		var user_filter = $('#user_type_filter option:selected').val();
		var payment_filter = $('#payment_type_filter option:selected').val();
		var root_address = window.location.href.split('?')[0];
		var url = root_address+'?user_id='+user_filter+"&type="+payment_filter;
		location.href = url;
	}
	//03: deleteTransaction
	function deleteTransaction(id,status){
		FUNCTION_NAME = 'deleteTransactionAjax';
		PARAM  = {id:id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	/******************************************** MODULE 10: Transactions <End> ***************************************************/
	//for sample videos
	$("#my-dropzone").dropzone({
	addRemoveLinks: true,
	acceptedFiles: ".mp4,.mkv,.avi",
        url: "./files-upload/",
        init: function() {
            this.on("success", function(file, response) {
                var obj = jQuery.parseJSON(response)
				//console.log(obj); return false;
				file.previewElement.id = obj.id;
                if(obj.status == undefined){
					var nameUploader = ''
					if(obj.is_super_admin == 1){
						nameUploader = '<td>'+obj.user_name+'</td>';
					}
					var d = new Date(obj.created*1000);
					var hours = d.getHours();
					var minutes = d.getMinutes();
					var month = d.getMonth()+1;
					var date = d.getDate();
					var ampm = hours >= 12 ? 'pm' : 'am';
					hours = hours % 12;
					
					hours = hours ? hours : 12; // the hour '0' should be '12'
					hours = hours < 10 ? '0'+hours : hours;
					date = date < 10 ? '0'+date : date;
					 
					month = month < 10 ? '0'+month : month;
					minutes = minutes < 10 ? '0'+minutes : minutes;
					var html = '<tr id="'+obj.id+'" role="row" class="odd"><td class="sorting_1">'+obj.url+'</td><td>'+obj.size+' mb</td><td>'+date + '/' + (month) + '/' + d.getFullYear()+' - '+hours+':'+minutes+' '+ampm+'</td><td><a href="JavaScript:html5Lightbox.showLightbox(2,\''+ROUTE_SAMPLE_VIDEO_UPLOAD_DIR+obj.url+'\',\''+obj.url+'\');" data-group="mygroup" class="btn btn-sm btn-circle btn-default"><i class="fa fa-eye"></i> View</a><a data-toggle="modal" onclick="update_file_status('+obj.id+',`Delete Video`,`updateFileStatus`,2);" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a></td></tr>';
					if($('#data>tr>td').hasClass('dataTables_empty')){
                                            $('.dataTables_empty').parents('tr').remove();
                                        }
                                        $('#data').prepend(html);
					$('#my-dropzone .dz-preview .dz-remove').attr('href','javascript:;');
					$('#my-dropzone .dz-preview .dz-remove').addClass('btn red btn-sm btn-block');
				}
            })
        }
    });	
	//Delete files from preview (for sample videos)
	$(document).delegate(".dz-remove", "click", function() {
		var file_id = $(this).closest('.dz-preview').attr('id');
		var status = 2;
		FUNCTION_NAME = 'deleteFileAjax';
		PARAM  = {file_id:file_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		$(this).closest('.dz-preview').remove();
		$('tr#'+file_id).remove();
	})


	function updateMidLeftContent() {

			$('.errorMsg').text('');
                previously_empty_img = $( " input[name=previously_empty_img]" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;

		//get form values
		// var slide_url = $("#slide_url").val();
		// var url_btn_text = $("#url_btn_text").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
		// var slide_order = $("#slide_order").val();
		// var slide_image = $('#image_id').attr('data-tag');

		var heading = $( "#heading" ).val();
		var sub_heading = $( "#sub_heading" ).val();
		

                //Validation Check
		// if(image === "" && previously_empty_img == 0) {
		// 	image_upload = 0;
		// }
		// if(!slide_order){
		// 	$('.errorMsg').text("Please enter slide order");
		// 	error_flag = true;
		// } else if(image === "" && previously_empty_img == 1) {
		// 	$('.errorMsg').text("Please upload image");
		// 	error_flag = true;
		// } else {
			 $.ajaxFileUpload({
                             
				url             :"./update-mid", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, sub_heading:sub_heading, content:content, image:image},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		// }
	}



	function updateMidRightContent() {

			$('.errorMsg').text('');
                previously_empty_img = $( " input[name=previously_empty_img]" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;

		//get form values
		// var slide_url = $("#slide_url").val();
		// var url_btn_text = $("#url_btn_text").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
		// var slide_order = $("#slide_order").val();
		// var slide_image = $('#image_id').attr('data-tag');

		var heading = $( "#heading" ).val();
		var sub_heading = $( "#sub_heading" ).val();
		

                //Validation Check
		// if(image === "" && previously_empty_img == 0) {
		// 	image_upload = 0;
		// }
		// if(!slide_order){
		// 	$('.errorMsg').text("Please enter slide order");
		// 	error_flag = true;
		// } else if(image === "" && previously_empty_img == 1) {
		// 	$('.errorMsg').text("Please upload image");
		// 	error_flag = true;
		// } else {
			 $.ajaxFileUpload({
                             
				url             :"./update-mid-2", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, sub_heading:sub_heading, content:content, image:image},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		// }
	}


	function updateBottomContent() {

			$('.errorMsg').text('');
                previously_empty_img = $( " input[name=previously_empty_img]" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;

		//get form values
		// var slide_url = $("#slide_url").val();
		// var url_btn_text = $("#url_btn_text").val();
		var content = new nicEditors.findEditor('page_content').getContent();
		content = content.replace(/"/g, '%^');
		// var slide_order = $("#slide_order").val();
		// var slide_image = $('#image_id').attr('data-tag');

		var heading = $( "#heading" ).val();
		var sub_heading = $( "#sub_heading" ).val();
		

                //Validation Check
		// if(image === "" && previously_empty_img == 0) {
		// 	image_upload = 0;
		// }
		// if(!slide_order){
		// 	$('.errorMsg').text("Please enter slide order");
		// 	error_flag = true;
		// } else if(image === "" && previously_empty_img == 1) {
		// 	$('.errorMsg').text("Please upload image");
		// 	error_flag = true;
		// } else {
			 $.ajaxFileUpload({
                             
				url             :"./update-bottom", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, content:content},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		// }
	}


	function updateTopContent() {
		


		$('.errorMsg').text('');
        var previously_empty_img = $( "#previously_empty_img" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;
		var heading = $( "#heading" ).val();
        var link = $( "#link" ).val();       
        //Validation Check
		
 		if(image == "" && previously_empty_img == "") {
			$('.errorMsg').text("Image is required");
			alert('image issue');
			error_flag = true;
		}
		else if(image == "" && previously_empty_img != "") {
			
			var image_upload = 0;
			
		}
		else if(heading == "") {
			$('.errorMsg').text("Heading is required");
			error_flag = true;

		}
		else if(link == "") {
			$('.errorMsg').text("Link is required");
			error_flag = true;

		}
		else if(error_flag == false) {
			 $.ajaxFileUpload({
                             
				url             :"./update", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, link:link, image:image, image_upload:image_upload},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}

	function updateMidTopContent() {

		$('.errorMsg').text('');

		var error_flag = false;

		//get form values
		// var slide_url = $("#slide_url").val();
		// var url_btn_text = $("#url_btn_text").val();
		// var content = new nicEditors.findEditor('page_content').getContent();
		// content = content.replace(/"/g, '%^');
		// var slide_order = $("#slide_order").val();
		// var slide_image = $('#image_id').attr('data-tag');

		var heading = $( "#heading" ).val();
		var sub_heading = $( "#sub_heading" ).val();
		var content = $( "#content" ).val();
		if (heading === '') {
			error_flag = true;
			$('.errorMsg').text('Please specify heading');
		}else if(sub_heading === ''){
			error_flag = true;
			$('.errorMsg').text('Please specify sub heading');
		}else if(error_flag == false){
			FUNCTION_NAME = 'updateHomePageMidTopSection';
		PARAM  = {heading:heading,sub_heading:sub_heading, content:content};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
                //Validation Check
		
		// }
	}


	function edit_home_page_section($id,$sub_section) {
		var id = $id;
		var sub_section = $sub_section;
		FUNCTION_NAME = 'editHomePageSection';
		PARAM  = {id:id,sub_section:sub_section};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		
	}
	function updateContact() {

		$('.errorMsg').text('');
        var previously_empty_img = $( "#previously_empty_img" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;
		var heading = $( "#top_section_1_heading" ).val();
        var content = $( "#top_section_1_content" ).val();        
        //Validation Check
		
  //       if(image === "" && previously_empty_img === "") {
		// 	$('.errorMsg').text("Please upload image");
		// 	error_flag = true;
		// }
		// else if(previously_empty_img != "" &&  image === "") {
		// 	image_upload = 0;
		// } 
		// else if(heading == "") {
		// 	error_flag = true;
		// }
		// else 
			if(error_flag == false) {
			 $.ajaxFileUpload({
                             
				url             :"./update-contact", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, image:image, content:content, image_upload:image_upload},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}
	

function updatePricing() {

		$('.errorMsg').text('');
        var previously_empty_img = $( "#previously_empty_img" ).val();
		var image = $( " #image_64" ).val();
		var image_upload = 1;
		var error_flag = false;
		var heading = $( "#top_section_1_heading" ).val();
                
        //Validation Check
		
  //       if(image === "" && previously_empty_img === "") {
		// 	$('.errorMsg').text("Please upload image");
		// 	error_flag = true;
		// }
		// else if(previously_empty_img != "" &&  image === "") {
		// 	image_upload = 0;
		// } 
		// else if(heading == "") {
		// 	error_flag = true;
		// }
		// else 
			if(error_flag == false) {
			 $.ajaxFileUpload({
                             
				url             :"./update-pricing", 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				converters: {
					'text json': true
				},
				data        	: {heading:heading, image:image, image_upload:image_upload},
				success : function (obj)
				{
					if(obj.status==0){
						$('.errorMsg').text(obj.response);
					}else if(obj.status==1){
						$("#settings .modal-title").text("Home Slide");
						$("#settings .text").text(obj.response);
						$("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
						$("#settings").modal("show");
					}
				}
			});  
		}
	}	
	
	
/* End of file script.js */
/* Location: ./application/assets/frontend/js/script.js */