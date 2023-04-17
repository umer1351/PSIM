// Animation for login signup page

	$(document).ready(function() {
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');
		var location = window.location.href;
		if(location === "http://dev.appstersinc.com/plaany/plaany_web/sign-in?sign-up"){
			// signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
			$('.error-info-msg').hide();
		// });
		}

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
			$('.error-info-msg').hide();
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
			$('.error-info-msg').hide();
		});

		if($(window).width() < 576){

			if(location === "http://dev.appstersinc.com/plaany/plaany_web/sign-in?sign-in"){
			// alert(location);
			// signUpButton.addEventListener('click', () => {
				$('.login-signup-container').addClass('login-signup-mobile-class');
				$('.error-info-msg').hide();
			// });
			}

			$(signInButton).click(function(){
				$('.login-signup-container').addClass('login-signup-mobile-class');
				$('.error-info-msg').hide();
			});
			$(signUpButton).click(function(){
				$('.login-signup-container').removeClass('login-signup-mobile-class');
				$('.error-info-msg').hide();
			});
		}
	});

	$(function(){
// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
$('.custom-nav-dropdown.dropdown').on('show.bs.dropdown', function(e){
$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});

// ADD SLIDEUP ANIMATION TO DROPDOWN //
$('.custom-nav-dropdown.dropdown').on('hide.bs.dropdown', function(e){
e.preventDefault();
$(this).find('.dropdown-menu').first().stop(true, true).slideUp(400, function(){
//On Complete, we reset all active dropdown classes and attributes
//This fixes the visual bug associated with the open class being removed too fast
$('.custom-nav-dropdown.dropdown').removeClass('show');
$('.dropdown-menu').removeClass('show');
$('.custom-nav-dropdown.dropdown').find('.dropdown-toggle').attr('aria-expanded','false');
});
});
});

function submitReview() {

		//alert();
		//clear .errorMsg area
		$('#changePasswordForm .errorMsg').text('');	
		var error_flag = false;
		//get form values
		var stars = $( "#halfstarsInput" ).val();
		var review_comment = $( "#review-comment" ).val();

				var sp_id = $( "#sp_id" ).val();
				var ep_id = $( "#ep_id" ).val();
		var job_id = $( "#job_id" ).val();
		var service_id = $( "#service_id" ).val();
		var user_type = $( "#user_type" ).val();
		// alert(stars);
		// alert(review_comment);
		// var con_password = $( "#con_password" ).val();
		if(!review_comment){
			alert();
		} else if(error_flag == false) {
			FUNCTION_NAME = 'submitReviewAjax';
			PARAM  = {stars:stars,review:review_comment,sp_id:sp_id,ep_id:ep_id,job_id:job_id,service_id:service_id,user_type:user_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
	function submitReviewSp() {

		//alert();
		//clear .errorMsg area
		$('#changePasswordForm .errorMsg').text('');	
		var error_flag = false;
		//get form values
		var stars = $( "#halfstarsInput" ).val();
		var review_comment = $( "#review-comment" ).val();

				var sp_id = $( "#sp_id_review" ).val();
				var ep_id = $( "#ep_id_review" ).val();
		var job_id = $( "#job_id_review" ).val();
		var service_id = $( "#service_id_review" ).val();
		var user_type = $( "#user_type_review" ).val();
		if(!review_comment){
			//alert();
		} else if(error_flag == false) {
			FUNCTION_NAME = 'submitReviewAjax';
			PARAM  = {stars:stars,review:review_comment,sp_id:sp_id,ep_id:ep_id,job_id:job_id,service_id:service_id,user_type:user_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
// Animation for login signup page
function contactquery(){

		$('.errorMsg').text('');
		//alert();
		//get form values
		var name = $( "#contact_name" ).val();
		var email = $( "#contact_email" ).val();
		var message = $( "#contact_message" ).val();

		 var error_flag = false;
		//alert(reason);
		if (!name) {
			$('.errorMsg').text('Please enter Why you are Best for this job.');
			error_flag = true;		
		}
		else if (!email) {
			$('.errorMsg').text('Please enter Your offer amount.');
			error_flag = true;		
		}
		else if(error_flag == false)
		{

				FUNCTION_NAME = 'contactquery';
		PARAM  = {name:name,email:email,message:message};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	}
$(document).ready(function() {
	$(".event-planner-form-link").click(function(){
		$(".choose-account-type-form").addClass("form-hidden");
		$(".event-planner-form").addClass("form-shown");
		$(".account-type-user").val('2');
		$('.error-info-msg').hide();
	});
	$(".service-provider-form-link").click(function(){
		$(".choose-account-type-form, .event-planner-form").addClass("form-hidden");
		$(".service-provider-form").addClass("form-shown");
		$(".account-type-user").val('3');
		$('.error-info-msg').hide();
	});
	$(".back-to-choose-account-link").click(function(){
		$(".custom-form").removeClass("form-hidden form-shown");
		$('.error-info-msg').hide();
	});
});


$(".moving-mouse-holder").click(function() {
  $('html, body').animate({
    scrollTop: $(".join-our-community-section").offset().top - 60
  }, 2000);
});



$(document).ready(function(){
  // Add down arrow icon for collapse element which is open by default
  // $(".collapse.show").each(function(){
  // 	$(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-up");
  // });
  
  // Toggle up and down arrow icon on show hide of collapse element
  $(".collapse").on('show.bs.collapse', function(){
  	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
  }).on('hide.bs.collapse', function(){
  	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
  });
});



$(document).ready(function(){
	$("#contact-form").validate({
		rules: {
			cname: "required",
			cemail: {
				required: true,
				email: true
			},
			cmsg: "required"
		}
		// messages: {
		// 	cname: "Please enter your name.",
		// 	cemail: "Please enter a valid email address.",
		// 	cmsg: "Please enter your message."
			
		// }
	});
});


$(document).ready(function(){
	$("#loginForm").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: "required"
		}
		// messages: {
		// 	email: "Please enter your email.",
		// 	password: "Please enter your password."
		// }
	});
});


$(document).ready(function(){
	$(".event-planner-form").validate({
		rules: {
			fname: "required",
			lname: "required",
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#ep_signup_password"
			},
			planne_account_type: "required"
		}
		// messages: {
		// 	email: "Please enter a valid email address",
		// 	password: {
		// 		required: "Please provide a password",
		// 		minlength: "Your password must be at least 8 characters long"
		// 	},
		// 	confirm_password: {
		// 		required: "Please provide a password",
		// 		minlength: "Your password must be at least 8 characters long",
		// 		equalTo: "Please enter the same password as above"
		// 	}
		// }
	});

	$(".service-provider-form").validate({
		rules: {
			fname: "required",
			lname: "required",
			business_name: "required",
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#sp_signup_password"
			}
		}
		// messages: {
		// 	email: "Please enter a valid email address",
		// 	password: {
		// 		required: "Please provide a password",
		// 		minlength: "Your password must be at least 8 characters long"
		// 	},
		// 	confirm_password: {
		// 		required: "Please provide a password",
		// 		minlength: "Your password must be at least 8 characters long",
		// 		equalTo: "Please enter the same password as above"
		// 	}
		// }
	});
});

// $(".cmxform").validate({
// 	showErrors: function(errorMap, errorList) {
// 	$("#summary").html("Your form contains "
// 	+ this.numberOfInvalids()
// 	+ " errors, see details below.");
// 	this.defaultShowErrors();
// 	}
// });

// 	$("#signup-form").validate({

// 		rules: {
// 			sign_up_first_name: "required",
// 			sign_up_last_name: "required",
// 			sign_up_email: {
// 				required: true,
// 				email: true
// 			},
// 			sign_up_password: {
// 				required: true,
// 				minlength: 5
// 			},
// 			sign_up_confirm_password: {
// 				required: true,
// 				minlength: 5,
// 				equalTo: "#sign_up_password"
// 			}
// 		},
// 		messages: {
// 			sign_up_first_name: "Please enter your first name",
// 			sign_up_last_name: "Please enter your last name",
// 			sign_up_email: "Please enter a valid email address",
// 			sign_up_password: {
// 				required: "Please provide a password",
// 				minlength: "Your password must be at least 5 characters long"
// 			},
// 			sign_up_confirm_password: {
// 				required: "Please provide a password",
// 				minlength: "Your password must be at least 5 characters long",
// 				equalTo: "Please enter the same password as above"
// 			}
// 		}
// 	});

// 	$("#signin-form").validate({

// 		rules: {
// 			sign_in_email: {
// 				required: true,
// 				email: true
// 			},
// 			sign_in_password: {
// 				required: true,
// 				minlength: 5
// 			}
// 		},
// 		messages: {
// 			sign_in_email: "Please enter a valid email address",
// 			sign_in_password: {
// 				required: "Please provide a password",
// 				minlength: "Your password must be at least 5 characters long"
// 			}
// 		}
// 	});
// });




function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$("#imgInp1").change(function() {
  readURL1(this);
});

$("#imgInp2").change(function() {
  readURL2(this);
});
$("#imgInp3").change(function() {
  readURL3(this);
});
$("#imgInp4").change(function() {
  readURL4(this);
});
$("#imgInp5").change(function() {
  readURL5(this);
});
$("#imgInp6").change(function() {
  readURL6(this);
});
$("#imgInp7").change(function() {
  readURL7(this);
});
function readURL5(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview5').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax5/', 
				secureuri       :false,
				fileElementId   :'imgInp5',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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


}function readURL6(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview6').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax6/', 
				secureuri       :false,
				fileElementId   :'imgInp6',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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


}function readURL7(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview7').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax7/', 
				secureuri       :false,
				fileElementId   :'imgInp7',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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


function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax1/', 
				secureuri       :false,
				fileElementId   :'imgInp1',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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
function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview2').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax2/', 
				secureuri       :false,
				fileElementId   :'imgInp2',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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
function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview3').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax3/', 
				secureuri       :false,
				fileElementId   :'imgInp3',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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
function readURL4(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-preview4').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
  var user_id = '1';
  $.ajaxFileUpload({

				url             :'./payNowAjax4/', 
				secureuri       :false,
				fileElementId   :'imgInp4',
			
				dataType        : 'json',
				data        	: {user_id:user_id},
				
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
// Data tables

	$(document).ready(function (){
		$("#custom-table").DataTable();
		$("#custom-table-2").DataTable();
	});

// End Data tables



// Date Picker
	
	$(document).ready(function(){
		$('.event-date').daterangepicker({
			
      locale: {
        format: 'MMM DD, YYYY'
      }
    });
    $('.application-deadline').daterangepicker({
    	singleDatePicker: true,
    	showDropdowns: true,
    	
    	locale: {
        format: 'MMM DD, YYYY'
      }
    });
	});

// End Date Picker



// Select2 Dropdown

	$(document).ready(function() {
    $('.js-example-basic-single').select2({
    	// closeOnSelect : false,
			placeholder : "Select services"
    });

    $('.select2').select2({
		search: true,
	
		placeholder: "Select",
    	allowClear: true
	});
	 $('.select3').select2({
		search: true,
	
		placeholder: "Select",
    	allowClear: true
	});
	});
	

// End Select2 Dropdown



// Add another
	// $(document).ready(function(){
	// 	var repeatableContent = $(".repeatable-block").html();

	// 	$(".add-another").click(function(){
	// 		$(".repeatable-block").append(repeatableContent);
	// 	});
	// });
// End Add another



// Filter Sidebar Toggler

	$(document).ready(function(){
		$(".custom-toggler").click(function(){
			$(this).toggleClass("toggled");
			$(this).next(".collapsible-content").slideToggle().toggleClass("collapsed");
			$(this).children("i").toggleClass("fa-angle-down");
		});

		$(".apply-filters-btn-mobile").click(function(){
			$(this).toggle();
      $(".job-board-sidebar").toggle();
      $(this).parents(".col-md-4").toggleClass("filter-fixed-to-top");
		});
		
		$(".close-filter").click(function(){
			$(".job-board-sidebar").hide();
			$(".apply-filters-btn-mobile").show();
			$(this).parents(".col-md-4").removeClass("filter-fixed-to-top");
		});
	});

// End Filter Sidebar Toggler



// Sidebar filter range slider

	$(document).ready(function(){
		var max_amount = $("#max_amount").val();
		$( "#price-range-slider" ).slider({
			range: true,
			min: 0,
			max: max_amount,
			values: [ 0, max_amount ],
			slide: function( event, ui ) {
				// $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				$( ".min-amount" ).text( "$" + ui.values[ 0 ] );
				$( ".max-amount" ).text( "$" + ui.values[ 1 ] );
			}
		});

		$( ".min-amount" ).text( "$" + $( "#price-range-slider" ).slider( "values", 0 ) );
		$( ".max-amount" ).text( "$" + $( "#price-range-slider" ).slider( "values", 1 ) );

		// $( "#amount" ).val( "$" + $( "#price-range-slider" ).slider( "values", 0 ) +
		// 	" - $" + $( "#price-range-slider" ).slider( "values", 1 ) );
	});

// End Sidebar filter range slider



// Footer links collapse hide on Mobile

	// if($(window).width() < 576){

	// 	hide_More_Than_Three_Useful_Links_From_Footer_On_Mobile();

	// 	function hide_More_Than_Three_Useful_Links_From_Footer_On_Mobile(){
	// 		var useful_links = 3;
	// 		hide_useful_links = "Collapse <i class='fa fa-angle-up ml-3'></i>";
	// 		show_useful_links = "View All <i class='fa fa-angle-down ml-3'></i>";
	
	// 		$(".useful-link-item:not(:lt("+useful_links+"))").hide();
	
	// 		$(".footer-links-toggler a").click(function (e) {
	// 			e.preventDefault();
	// 			if ($(".useful-link-item:eq("+useful_links+")").is(":hidden")) {
	// 				$(".useful-link-item:hidden").slideDown();
	// 				$(".footer-links-toggler a").html( hide_useful_links );
	// 			} else {
	// 				$(".useful-link-item:not(:lt("+useful_links+"))").slideUp();
	// 				$(".footer-links-toggler a").html( show_useful_links );
	// 			}
	// 		});
	// 	}
	// }

	// TEMPORARY COMMENTED CODE

	// $(window).resize(function (){
	// 	location.reload();
	// });

	// TEMPORARY COMMENTED CODE END

// Footer links collapse hide on Mobile




// FIX SIDEBAR ON BOTTOM WHEN SCROLL :: START

	if($(window).width() >= 767){

		$(function() {
			var top = $('.make-me-sticky').offset().top - parseFloat($('.make-me-sticky').css('marginTop').replace(/auto/, 0));
			var footTop = $('.main-footer').offset().top - parseFloat($('.main-footer').css('marginTop').replace(/auto/, 0));

			var maxY = footTop - $('.make-me-sticky').outerHeight();

			$(window).scroll(function(evt) {
				var y = $(this).scrollTop();
				if (y >= top - $('.main-navigation-bar').height()) {
					if (y < maxY) {
						$('.make-me-sticky').addClass('fixed-sidebar').removeAttr('style');
					} else {
						$('.make-me-sticky').removeClass('fixed-sidebar').css({
							position: 'absolute',
							top: (maxY - top) + 'px'
						});
					}
				} else {
					$('.make-me-sticky').removeClass('fixed-sidebar');
				}
			});
		});

	}

	function applyWidthToFilterSidebar() {
    var filterSidebarWidth = $(".inheritable-width").width();

    $("<style>")
      .prop("type", "text/css")
      .html(".width-inherited {width: " + filterSidebarWidth + "px;}")
      .appendTo("head");

    $(".make-me-sticky").addClass("width-inherited");
  }
  applyWidthToFilterSidebar();

  $(window).resize(function(){
    applyWidthToFilterSidebar();
  });

// FIX SIDEBAR ON BOTTOM WHEN SCROLL :: START




// ADD OVERLAY ON DRODOWN CLICK ON MOBILE

	$('.custom-nav-dropdown .dropdown-toggle').click(function () {
		$('body').toggleClass('blur-body');
	});

	$(document).click(function(e){
    if( $(e.target).closest("#dropdownMenuButton").length > 0 ) {
			return false;
    } else{
			$('body').removeClass('blur-body');
		}
	});

// ADD OVERLAY ON DRODOWN CLICK ON MOBILE



$(document).ready(function(){

	function scrollToBottomOfMessages(){
		var element = document.getElementById("scrollable-msgs-section");
		element.scrollTop = element.scrollHeight;
	}
	scrollToBottomOfMessages();

	
	$(".send-msg").keypress(function(e) {
		if(e.which == 13) {
			$(".send-btn .btn").click();
		}
	});

	$(".send-msg .type-msg input[type='text'], .send-msg .send-btn > a").focus(function (){
		$(this).parents(".send-msg").css("outline", "1px solid #A9A2CE");
	});
	
	$(".send-msg .type-msg input[type='text'], .send-msg .send-btn > a").focusout(function (){
		$(this).parents(".send-msg").css("outline", "none");
	})
		

	$(".send-btn .btn").click(function(){
		var msg_text = $(".type-msg input[type='text']").val();
		var msg_file = $(".type-msg #image-preview").attr('src');
		var img_source = $(".img_source").val();
		// console.log(img_source);
		// return false;
	

		if (msg_text != "") {

			$(".scrollable-msgs-section .msg-outer:last-child").after("\
				<div class='row msg-outer my-msg'>\
					<div class='col-10 col-sm-11 msg-text-time-outer'>\
						<div class='msg-text animate__animated animate__slideInUp'>" + msg_text + "</div>\
						<div class='break'></div>\
						<div class='msg-time'>Just Now</div>\
					</div>\
					<div class='col-2 col-sm-1 msg-person-img'>\
						<img src="+img_source+">\
					</div>\
				</div>\
			");
			

			$.playSound('./assets/frontend/img/msg-sent.mp3');

			$(".type-msg input[type='text']").val("");
			$(".type-msg input[type='text']").focus();

			$(".scrollable-msgs-section .my-msg:not(:last-child) .break, .scrollable-msgs-section .my-msg:not(:last-child) .msg-time, .scrollable-msgs-section .my-msg:not(:last-child) .msg-person-img").hide();

			scrollToBottomOfMessages();

		} else if(msg_file != "") {

			$(".scrollable-msgs-section .msg-outer:last-child").after("\
				<div class='row msg-outer my-msg'>\
					<div class='col-10 col-sm-11 msg-text-time-outer'>\
						<div class='msg-text msg-type-file animate__animated animate__slideInUp'><img src='" + msg_file + "'></div>\
						<div class='break'></div>\
						<div class='msg-time'>1:30 pm</div>\
					</div>\
					<div class='col-2 col-sm-1 msg-person-img'>\
						<img src='./assets/frontend/img/user-2-profile-pic.png'>\
					</div>\
				</div>\
			");
			
			$.playSound('./assets/frontend/img/msg-sent.mp3');

			$(".type-msg #image-preview").html("");
			$(".type-msg input[type='text']").focus();

			$(".scrollable-msgs-section .my-msg:not(:last-child) .break, .scrollable-msgs-section .my-msg:not(:last-child) .msg-time, .scrollable-msgs-section .my-msg:not(:last-child) .msg-person-img").hide();

			scrollToBottomOfMessages();

		} else {
			return false;
		}

		var sender_id = $(".send-msg #sender_id").val();
		var receiver_id = $(".send-msg #receiver_id").val();
		var message =  $(".type-msg input[type='text']").val();

		// console.log(message);

 		FUNCTION_NAME = 'send_message';
			
		$.ajaxFileUpload({
			url             :'./send-message/', 
			secureuri       :false,
			fileElementId   :'imgInp',
			dataType        : 'json',
			data        	: {sender_id:sender_id, receiver_id:receiver_id, msg_text:msg_text},
			
				success : function (obj)
			{
				
			}
		});
	});

});



function updateServiceProviderAccount(user_id){


		//clear .errorMsg area
		$('#updateServiceProviderAccount .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		var role = $( "#updateServiceProviderAccount #role_type" ).val();
		var first_name = $( "#updateServiceProviderAccount #account_fname" ).val();
		var last_name = $( "#updateServiceProviderAccount #account_lname" ).val();
		var Institute = $( "#updateServiceProviderAccount #institute" ).val();
		var designation = $( "#updateServiceProviderAccount #designation" ).val();

		var email = $( "#updateServiceProviderAccount input[name=email]" ).val();
		var phone = $( "#updateServiceProviderAccount #account_phone" ).val();
		var address = $( "#updateServiceProviderAccount #account_address" ).val();
		var city = $( "#updateServiceProviderAccount #account_city" ).val();
var pwd = $( "#updateServiceProviderAccount #password" ).val();
		var province = $( "#updateServiceProviderAccount #states option:selected" ).val();
		// console.log(province);
		// return false;
		var country = $( "#updateServiceProviderAccount #country" ).val();
		if (role == '3') {
			var business_name = $( "#updateServiceProviderAccount #account_business_name" ).val();
			var services = $( "#updateServiceProviderAccount #account_select_service" ).val();
			var about = $( "#updateServiceProviderAccount #account_our_business" ).val();	
			var about_me = "";
		}else if(role == '2'){
			var business_name = "";
			var services = "";
			var about = "";
			var about_me = $( "#updateServiceProviderAccount #account_about_me" ).val();
		}
		
		if(!first_name){
			error_flag = true; 
			$(".error-info-msg").show();
			$(".erro").text('First name is required!');
		}else if(!last_name){
			error_flag = true; 
			$(".error-info-msg").show();
			$(".erro").text('Last name  is required!');
		}else if(!phone){
			$(".error-info-msg").show();
			$(".erro").text('Phone Number is required!');
			error_flag = true; 
		}else if(!address){
			error_flag = true; 
			$(".error-info-msg").show();
			$(".erro").text('Address is required!');
		}else if(!city){
			error_flag = true; 
			$(".error-info-msg").show();
			$(".erro").text('City is required!');
		}else if(!province){
			error_flag = true; 
			$(".error-info-msg").show();
			$(".erro").text('Province is required!');
		}else if(error_flag == false) {
			var functionName = "redirect";
			// alert();
			$(".erro").text('Profile Updated Succesfully');
			$.ajaxFileUpload({
				url             :'./editProfileAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {pwd:pwd,Institute:Institute, designation:designation, user_id:user_id,first_name:first_name,last_name:last_name,phone:phone,address:address,city:city,province:province,country:country,city:city,business_name:business_name, services:services,about:about,email:email,about_me:about_me,role:role},
				
				 success : function(data)
				{	
					alert();
					console.log("asd");
					if (data) {

						$('.success-info-msg').show();
						$('.succs').text('Profile updated successfully !');
					}
				}
			});
		}
		
	}


// SELECT PACKAGES SCRIPT

	$('.pkg-box input[type=radio]').click(function(){
		$('.pkg-box').removeClass('pkg-selected');
		$(this).parents('.pkg-box').addClass('pkg-selected');
	});

	AOS.init({
  duration: 1200,
})

// SELECT PACKAGES SCRIPT