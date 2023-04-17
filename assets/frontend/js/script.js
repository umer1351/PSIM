
var host = '';
if(window.location.host == 'localhost'){
    host = 'http://'+window.location.host+'/plaany/plaany_web';
}else{
    host = 'https://'+window.location.host+'/';
}
var ROUTE_PORTFOLIO_IMAGE_UPLOAD_DIR = host+'assets/frontend/uploads/portfolio/images/';
var ROUTE_IMAGES = host+'assets/frontend/images/';
var ROUTE_PORTFOLIO_VIDEO_UPLOAD_DIR = 'https://www.youtube.com/watch?v=';
var ROUTE_ADD_PAYMENT = host+'addPaymentsAjax';
/******************************************** Global <START> ***************************************************/
var PHONE_NUMBER_LENGTH = 10;
var PASSWORD_LENGTH = 10;
//AJAX FUNCTION VARIABLES <START>
var PARAM = {};
var FUNCTION_NAME  = '';
//AJAX FUNCTION VARIABLES <END>

//2CO CREDENTIALS 
var TWO_CO_PRIVATE_KEY = '24FCF6D4-4750-40F3-8033-CF6CFB30444B';
var TWO_CO_PUBLISHABLE_KEY = 'A170A0AC-4CCC-4E0E-9BB3-BB1A3AD3E996';
var TWO_CO_SELLER_ID = '203549105';
$('#offer-success').hide();
$('#custom-table').DataTable({
    "order": [[ 3, "desc" ]], //or asc 
    "columnDefs" : [{"targets":3, "type":"date-eu"}],
});
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
	01: Email validation
	02: Password validation
	03: Simple Password validation
	04: Number validation
	05: validateFloat
	06: Custom designed alert
	07: successAlerts
	08: redirect
	09: isUrlValid
	10: getColorCodeByRgb 
	11: split 
	12: extractLast 
	13: delay 
	14: initializeRangeSlider 	
------------ Function List <End>-----------------*/	


// $(document).ready(function() {
// 	$(".send-button").click(function(){
// 		var sender_id = $(".send-msg #sender_id").val();
// 		var receiver_id = $(".send-msg #receiver_id").val();
// 		var message =  $(".type-msg input[type='text']").val();
//  		FUNCTION_NAME = 'send_message';
// 		PARAM  = {sender_id:sender_id,receiver_id:receiver_id,message:message};
// 		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
// 	});
// });

// Collapse Navbar
var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-scrolled");
    } else {
      $("#mainNav").removeClass("navbar-scrolled");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

function connect_stripe(id) {
		


		
		FUNCTION_NAME = 'connect_stripe';
		PARAM  = {id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

function subscribe_now() {
	
	var id = $('#email_subscribe').val();
	FUNCTION_NAME = 'subscribe_now';
	PARAM  = {id:id};
	xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

function update_stripe() {
	var ac_id = $('#ac_id').val();
	var sk = $('#sk').val();
	FUNCTION_NAME = 'update_stripe';
	PARAM  = {ac_id:ac_id,sk:sk};
	xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}


function upgrade_payment(id) {
		FUNCTION_NAME = 'connect_stripe';
		PARAM  = {id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

function cancel_renewal_ajax() {
		FUNCTION_NAME = 'cancel_renewal_ajax';
		PARAM  = {};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

// function save_premium_membership() {
	
// }
// function sendImgInText(user_id){

// 		//clear .errorMsg area
// 		$('#updateServiceProviderAccount .errorMsg').text('');
// 		// var error_flag = false;
// 		// var re = /^[\d +]+$/;
// 		// //get form values
// 		// var role = $( "#updateServiceProviderAccount #role_type" ).val();
// 		// var first_name = $( "#updateServiceProviderAccount #account_fname" ).val();
// 		// var last_name = $( "#updateServiceProviderAccount #account_lname" ).val();
// 		// var email = $( "#updateServiceProviderAccount input[name=email]" ).val();
// 		// var phone = $( "#updateServiceProviderAccount #account_phone" ).val();
// 		// var address = $( "#updateServiceProviderAccount #account_address" ).val();
// 		// var city = $( "#updateServiceProviderAccount #account_city" ).val();
// 		// var province = $( "#updateServiceProviderAccount #account_state_province" ).val();
// 		// var country = $( "#updateServiceProviderAccount #country" ).val();
// 		// if (role == '3') {
// 		// 	var business_name = $( "#updateServiceProviderAccount #account_business_name" ).val();
// 		// 	var services = $( "#updateServiceProviderAccount #account_select_service" ).val();
// 		// 	var about = $( "#updateServiceProviderAccount #account_our_business" ).val();	
// 		// 	var about_me = "";
// 		// }else if(role == '2'){
// 		// 	var business_name = "";
// 		// 	var services = "";
// 		// 	var about = "";
// 		// 	var about_me = $( "#updateServiceProviderAccount #account_about_me" ).val();
// 		// }
		
// 		// console.log(services);
		 
// 		if(error_flag == false) {
// 			var functionName = "redirect";
// 			$.ajaxFileUpload({
// 				url             :'./editProfileAjax/', 
// 				secureuri       :false,
// 				fileElementId   :'imgInp',
// 				dataType        : 'json',
// 				data        	: {user_id:user_id,first_name:first_name,last_name:last_name,phone:phone,address:address,city:city,province:province,country:country,city:city,business_name:business_name, services:services,about:about,email:email,about_me:about_me,role:role},
				
// 				 success : function (obj)
// 				{
// 					window.location.reload();
// 					// if(obj.status==0){
// 					// 	$('.errorMsg').text(obj.response);
// 					// }else if(obj.status==1){
// 					// 	$("#settings .text").text(obj.response);
// 					// 	$("#settings .modal-footer>.blue").attr('onclick',functionName+'("'+obj.url+'");');
// 					// 	$("#settings").modal("show");
// 					// }else if(obj.status==3){
// 					// 	$('.errorMsg').text(obj.response);
// 					// }
// 				}
// 			});
// 		}
		
// 	}

function delete_event() {
	
	var id = $('#Del_job_id').val();

	FUNCTION_NAME = 'DeleteEventAjax';
	PARAM  = {id:id};
	xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

$(document).ready(function() {
	var url = location.protocol + '//' + location.host + location.pathname;
	var check_url = 'http://dev.appstersinc.com/plaany/plaany_web/message-details'
	if (url == check_url) {
	function scrollToBottomOfMessages(){
		var element = document.getElementById("scrollable-msgs-section");
		element.scrollTop = element.scrollHeight;
	}
		setInterval(function() {
			var sender_id = $(".send-msg #sender_id").val();
			var receiver_id = $(".send-msg #receiver_id").val();
			var host =   'http://'+window.location.host+'/';
			var img_source = $(".img_source_rec").val();
			 $.ajax({
			     url:host+'plaany/plaany_web/frontend/message/get_latest_msg_details/',
			     method: 'post',
			     data: {sender_id: sender_id, receiver_id:receiver_id},
			     dataType: 'json',
			     success: function(response){
			     	
			     	if (response != null) {
			     // console.log(response);
			     // return false;
			     var today = new Date();

			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			     if(response.receiver_id == receiver_id){
			         $(".scrollable-msgs-section .msg-outer:last-child").after("\
			         	<div class='row msg-outer others-msg'>\
			         			<div class='col-2 col-sm-1 msg-person-img'>\
									<img src="+img_source+">\
								</div>\
								<div class='col-10 col-sm-11 msg-text-time-outer'>\
									<div class='msg-text'>" + response.message + "</div>\
									<div class='break'></div>\
									<div class='msg-time'>Just now</div>\
								</div>\
							</div>\
				");

				$.playSound('./assets/frontend/img/msg-sent.mp3');

				$(".type-msg input[type='text']").val("");
				$(".type-msg input[type='text']").focus();

				$(".scrollable-msgs-section .my-msg:not(:last-child) .break, .scrollable-msgs-section .my-msg:not(:last-child) .msg-time, .scrollable-msgs-section .my-msg:not(:last-child) .msg-person-img").hide();

				scrollToBottomOfMessages();
			    }     
			 }
			       
			 
			     }
			   });

			 // $.ajax({
			 //     url:host+'plaany/plaany_web/frontend/message/update_latest_msg_details/',
			 //     method: 'post',
			 //     data: {sender_id: sender_id, receiver_id:receiver_id},
			 //     dataType: 'json',
			 //     success: function(response){
			     	
			     	
			       
			 
			 //     }
			 //   }); 
			
			// var msg_text = $("").val();
			

	

	}, 20000);
	}
if (url == check_url) {
	function scrollToBottomOfMessages(){
		var element = document.getElementById("scrollable-msgs-section");
		element.scrollTop = element.scrollHeight;
	}
		setInterval(function() {
			var sender_id = $(".send-msg #sender_id").val();
			var receiver_id = $(".send-msg #receiver_id").val();
			var host =   'http://'+window.location.host+'/';
			var img_source = $(".img_source_rec").val();
			

			 $.ajax({
			     url:host+'plaany/plaany_web/frontend/message/update_latest_msg_details/',
			     method: 'post',
			     data: {sender_id: sender_id, receiver_id:receiver_id},
			     dataType: 'json',
			     success: function(response){
			     	
			     	
			       
			 
			     }
			   }); 
			
			// var msg_text = $("").val();
			

	

	}, 27000);
	}

});
function del_message() {
	var s_id= $('#s_id_del').val() ;
	var r_id= $('#r_id_del').val() ;
		
		FUNCTION_NAME = 'delete_message';
		PARAM  = {s_id:s_id,r_id:r_id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
}

// $('.update_user_active_status').on('change', function() {
// 	 var user_id = $(this).attr("data") ;
	 
function update_job_status(job_id,event_planner_id,service_id,sp_id){

		var status= $('.update_event_status').val() ;
		
		FUNCTION_NAME = 'update_job_status';
		PARAM  = {job_id:job_id,event_planner_id:event_planner_id,service_id:service_id,sp_id:sp_id, status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			
	}
function delfunction($id){
//var status= $('.update_event_status').val() ;
		var id=$id;
		//alert(id);
		FUNCTION_NAME = 'deletePortfolio';
		PARAM  = {id:id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);



}
// Hamza



$( document ).ready(function() {
$("#job-close").click(function(){
 // alert("The paragraph was clicked.");
 $("#offer-success").hide();
 $("#offer").show();
});
});

// $( document ).ready(function() {
// $('#price-range-slider .ui-slider-handle').addClass("price");
// $('.price').mouseleave(function() {
// 	//alert();
// 	 load_data();
// });
// });

$( document ).ready(function() {
var delayInMilliseconds = 2000; //1 second
              
setTimeout(function() {
//your code to be executed after 1 second
$('#price-range-slider .ui-slider-handle').addClass("price");
// $('.price').click(function() {
// 	//alert();
// 	 load_data();
// });                   
}, delayInMilliseconds);

  //alert();
 });


 load_data();





// $('input[name=daterange]').change(function() { 

// 	load_data();
// 	 });

// $("input:checkbox[name=Categories]").click(function(){
// 	load_data();
// });
// $( document ).ready(function() {
//    $('.neg').hide();

// });

// s
 function load_data(query,id="")
 { //avr query = 'abc';

  //  $.ajax({
  //  url: './service-provider-fetch-job',
  //  method:"POST",
  //  data:{query:query},
  //  success:function(data){
  //  	console.log(data);
  //   $('#result').html(data);
  //  }
  // })
 	// alert();

//console.log();
// $( "#max-amount" ).change(function() {
//   alert( "Handler for .change() called." );
// });
var selected = [];
 	// $("input:checkbox[name=Categories]").click(function(){

if($(this).prop("checked") == true){
$.each($("input[name='Categories']:checked"), function(){
selected.push($(this).attr('data-id'));
});
//console.log(selected);
}
else{
$.each($("input[name='Categories']:checked"), function(){
selected.push($(this).attr('data-id'));	
});
}
// });
//var id=$('.load-more').data('id');
// console.log(id);

var search=$('#search_text').val();

//console.log(search);
 	var host =   'http://'+window.location.host+'/';

var max_amount=$( "#max-amount" ).text();
var min_amount=$( "#min-amount" ).text();
//let str = 'Hello';

var max = max_amount.substring(1);
var min = min_amount.substring(1);
//console.log(min);
//console.log(max);
var date=$('#event-date').val();
  $.ajax({
   url: './service-provider-fetch-job',
   method:"POST",
   data:{query:query,selected:selected,max:max,min:min,date:date,search:search},
   success:function(data){
   //location.reload();
   $('.load-more').hide();
    $('#result').html(data);
   }
  })

 }

 // $('#search_text').keyup(function(){
 //  var search = $(this).val();
 //  if(search != '')
 //  {
 //  //	alert();
 //   load_data(search);
 //  }
 //  else
 //  {
 //   load_data();
 //  }
 // });
//Hamza end


	function validateEmail(email) {
        	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        	return re.test(email);
	}
	/*############################################################*/
	
	//02: Password validation
	function validatePassword(password) {
			// Password should be a combination of small alphabets, capital alphabets, digits and special characters 
			var re = /(?=.*\d)(?=.*[a-z])(?=.*[!@#$&*])(?=.*[A-Z]).{10,}/;
        	return re.test(password);
	}
	/*############################################################*/
	//03: Simple Password validation
	function validateSimplePassword(password) {
		//Password should be atleast `PASSWORD_LENGTH` characters long
        	return password.length>=PASSWORD_LENGTH;
	}
	/*############################################################*/
	
	//04: Number validation
	function validateNumber(number){
		var re = /^\d+$/;
		return re.test(number);
	}
	
	//05: validateFloat
	function validateFloat(number){
		var re = /^(0|[1-9]\d*)(\.\d+)?$/;
		return re.test(number);
	}
	/*############################################################*/
	
	//06: Custom designed alert
	function custom_alert(message) {
	    var $this = $('.bb-alert');
	    $this.find('span').html(message);
	    $this.delay(200).fadeIn().delay(3000).fadeOut(); 
	}
	
	function hire_sp($id,$service_id,$job_id) {
	
 var id = $id; 
	 var service_id = $service_id; 
	  var job_id = $job_id; 

	   // alert(id);
	   // alert(service_id);
	   // alert(job_id);
	 FUNCTION_NAME = 'hire_sp';
	 PARAM  = {id:id,service_id:service_id,job_id:job_id};
	 xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	 
	}
	//07: successAlerts
	function successAlerts(msg,url) {
			
			$("#success_modal_new .modal-body").text(msg);
			$("#success_modal_new .theme_button").attr('onclick','location.href = "'+url+'"');
			$("#success_modal_new .theme_button").attr(msg);
			$("#success_modal_new").modal("show");
			/* bootbox.dialog({
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
				}); */
	}
	/*############################################################*/

	//08: redirect
	function redirect(url) {
		window.location =url;
	}
	/*############################################################*/
	
	//09:isUrlValid
	function isUrlValid(url) {
  	  return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	}
	/*############################################################*/
	
	//10:getColorCodeByRgb 
	function getColorCodeByRgb(rgb) {
		if( rgb.indexOf('rgba') >= 0){
		  var rgbvals = /rgba\((.+),(.+),(.+),(.+)\)/i.exec(rgb);
		}else{
		  var rgbvals = /rgb\((.+),(.+),(.+)\)/i.exec(rgb);
		}
	  var rval = parseInt(rgbvals[1]);
	  var gval = parseInt(rgbvals[2]);
	  var bval = parseInt(rgbvals[3]);
	  return '#' + (
		rval.toString(16) +
		gval.toString(16) +
		bval.toString(16)
	  ).toUpperCase();
	}
	/*############################################################*/
	
	//11:split 
	function split( val ) {
     return val.split( /,\s*/ );
    }
	
	//12: extractLast 
    function extractLast( term ) {
      return split( term ).pop();
    }
	
	//13: delay 
	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();
	
	
	//14: initializeRangeSlider 
	function initializeRangeSlider(){
		$( ".nstSlider" ).each(function(){
			var id = $(this).attr('id');
			var step2=   Number($(this).attr('data-step'));
			var curr_min= Number($("#"+id).attr('data-cur_min'));
			var curr_max= Number($("#"+id).attr('data-cur_max'));
			var min2= Number($("#"+id).attr('data-range_min'));
			var max2= Number($("#"+id).attr('data-range_max'));
			$("#"+id).slider({
			  range: true,
			  step: step2,
			  min: min2,
			  max: max2,
			  values: [ curr_min, curr_max ],
			  slide: function( event, ui ) {
				$("#"+id).parent().find('.leftLabel').text(ui.values[ 0 ]);
				$("#"+id).parent().find('.rightLabel').text(ui.values[ 1 ]);
			  }
			});
			$("#"+id).parent().find('.leftLabel').text($("#"+id).slider( "values", 0 ));
			$("#"+id).parent().find('.rightLabel').text($("#"+id).slider( "values", 1 ));
		});
		
	}
		//15: editSettings
	function editPortfolioAjax(user_id){

		

		//clear .errorMsg area
		$('#updateServiceProviderAccount .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		// var role = $( "#updateServiceProviderAccount #role_type" ).val();
		// var first_name = $( "#updateServiceProviderAccount #account_fname" ).val();
		// var last_name = $( "#updateServiceProviderAccount #account_lname" ).val();
		// var email = $( "#updateServiceProviderAccount input[name=email]" ).val();
		// var phone = $( "#updateServiceProviderAccount #account_phone" ).val();
		// var address = $( "#updateServiceProviderAccount #account_address" ).val();
		// var city = $( "#updateServiceProviderAccount #account_city" ).val();
		// var province = $( "#updateServiceProviderAccount #account_state_province" ).val();
		// var country = $( "#updateServiceProviderAccount #country" ).val();
		// if (role == '3') {
		// 	var business_name = $( "#updateServiceProviderAccount #account_business_name" ).val();
		// 	var services = $( "#updateServiceProviderAccount #account_select_service" ).val();
		// 	var about = $( "#updateServiceProviderAccount #account_our_business" ).val();	
		// 	var about_me = "";
		// }else if(role == '2'){
		// 	var business_name = "";
		// 	var services = "";
		// 	var about = "";
		// 	var about_me = $( "#updateServiceProviderAccount #account_about_me" ).val();
		// }
		//alert(user_id);
		if(error_flag == false) {
			
			$.ajaxFileUpload({

				url             :'./editPortfolioAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
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
		
	}
		function payNow(user_id,sel){

		

		//clear .errorMsg area
		$('#updateServiceProviderAccount .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		 var designation = $( "#updateServiceProviderAccount #designation" ).val();
	     var account_phone = $( "#updateServiceProviderAccount #account_phone" ).val();
		 var institute = $( "#updateServiceProviderAccount #institute" ).val();
		 var account_address = $( "#updateServiceProviderAccount #account_address" ).val();
			
		if(error_flag == false) {
			
			$.ajaxFileUpload({

				url             :'./payNowAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {sel:sel,user_id:user_id,designation:designation,account_phone:account_phone,institute:institute,account_address:account_address},
				
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
	function checkout(id,name){



		//clear .errorMsg area
		$('#updateServiceProviderAccount .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		// var role = $( "#updateServiceProviderAccount #role_type" ).val();
		var first_name = $( "#updateServiceProviderAccount #account_fname" ).val();
		var pmdc = $( "#updateServiceProviderAccount #account_lname" ).val();
		var email = $( "#updateServiceProviderAccount input[name=email]" ).val();
		var phone = $( "#updateServiceProviderAccount #account_phone" ).val();
		var address = $( "#updateServiceProviderAccount #account_address" ).val();
		var designation = $( "#updateServiceProviderAccount #designation" ).val();
		var institute = $( "#updateServiceProviderAccount #institute" ).val();
		// var country = $( "#updateServiceProviderAccount #country" ).val();
		// if (role == '3') {
		// 	var business_name = $( "#updateServiceProviderAccount #account_business_name" ).val();
		// 	var services = $( "#updateServiceProviderAccount #account_select_service" ).val();
		// 	var about = $( "#updateServiceProviderAccount #account_our_business" ).val();	
		// 	var about_me = "";
		// }else if(role == '2'){
		// 	var business_name = "";
		// 	var services = "";
		// 	var about = "";
		// 	var about_me = $( "#updateServiceProviderAccount #account_about_me" ).val();
		// }
		//alert(user_id);
		if(error_flag == false) {
			
			$.ajaxFileUpload({

				url             :'./paymentAjax/', 
				secureuri       :false,
				fileElementId   :'imgInp',
				dataType        : 'json',
				data        	: {first_name:first_name,id:id,name:name,pmdc:pmdc,email:email,phone:phone,address:address,designation:designation,institute:institute},
				
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
/*------------ Defined Functions <End> ------------*/

/*------------ Onload Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
	00: Date picker
	01: Custom dropdown
	02: Disable/Underdevelopment Feature message
	03: Show/Hide Password
	04: Adding pagination / sorting in backend tables
`	05: Upload Image
	06: PREVENT PARENT FUNCTION CALL ON CHILD CLICK
	07: ALWAYS USE ON() FOR DYNAMICALLY CREATED HTML
	08: Initializing range sliders on talent search page
	09: Opening category dropdown on click of text field on talent search page
------------ Function List <End>-----------------*/	

//16: job_status
	function joboffer(){

		$('.errorMsg').text('');
		
		//get form values
		var sp_id = $( "#job_offer input[name=sp_id]" ).val();
		var ep_id = $( "#job_offer input[name=ep_id]" ).val();
		var service_id = $( "#job_offer input[name=service_id]" ).val();
		var job_id = $( "#job_offer input[name=job_id]" ).val();
		var amount = $( "#job_offer input[name=amount]" ).val();
		var reason = $( "#reason" ).val();

		 var error_flag = false;
		//alert(reason);
		if (!reason) {
			$('.errorMsg').text('Please state "why are you the best candidate"?');
			error_flag = true;		
		}
		else if (!amount) {
			$('.errorMsg').text('Please specify Your required offer amount.');
			error_flag = true;		
		}
		else if(error_flag == false)
		{

				FUNCTION_NAME = 'serviceProviderJobOffer';
		PARAM  = {sp:sp_id,ep:ep_id,service:service_id,job:job_id,amount:amount,reason:reason};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	}	


  $(document).ready(function(){
		$(".side_bar_li").click(function(){
			$(this).toggleClass('active','');
		});
		//00: Date picker
		$('.datepicker').datepicker({
			minDate: '0'
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
		
		//04: Adding pagination / sorting in backend tables
		//$('#stream_table').DataTable(); 

		/*############################################################*/	
		
		//05: Upload Image
   		$('#imgInp').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});

    	$('#imgInp1').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
    	$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
    	$('#imgInp3').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
    	$('#imgInp4').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
		$('#imgInp5').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
    	$('#imgInp6').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
    	$('#imgInp7').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
		$(document).delegate('#imgInp','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base64").val("");
				$("#is_base64_method").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$('#imgInp1').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
        	$('.image').attr('src', img);display: none;
    	});
		
		$(document).delegate('#imgInp1','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image1').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base641").val("");
				$("#is_base64_method1").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp2','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image2').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base642").val("");
				$("#is_base64_method2").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp3','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image1').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base643").val("");
				$("#is_base64_method3").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp4','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image4').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base644").val("");
				$("#is_base64_method4").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp5','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image5').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base645").val("");
				$("#is_base64_method5").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp6','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image6').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base646").val("");
				$("#is_base64_method6").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
    	$(document).delegate('#imgInp7','change',function(e){
   		//$('#imgInp2').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;
			var mimeType=files[0].type;
			if(mimeType == "image/jpeg" || mimeType == "image/png" || mimeType == "image/jpg" || mimeType == "image/gif"){
				$('#image-error').text('Click save button to upload the image');
				$('#profile_image7').val(e.target.files[0].name);
				$('.image').attr('src', img);
				$("#profile_image_base647").val("");
				$("#is_base64_method7").val(0);
			} else {
				$('#image-error').text('This image type is not allowed. Allowed types: jpg,png,jpeg');
			}
    	});
   		$('#infoInp').change( function(e) {
        	var img = URL.createObjectURL(e.target.files[0]);
			var files=e.target.files;

			var mimeType=files[0].type;
			var re_text = /\.zip/i;
			 if (e.target.files[0].name.search(re_text) == -1)
				{
					bootbox.alert("please uplaod a zip file only")
				} else {
				//	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
					$.ajaxFileUpload({
							url             :'./saveInfoFile/', 
							secureuri       :false,
							fileElementId   :'infoInp',
							dataType        : 'json',
							data        	: {},
							 success : function (obj)
							{
								if(obj.status==1){
									$('#info_file').val(obj.response);
								}
							}
						});
				}
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
		
		//08: Initializing range sliders on talent search page
		initializeRangeSlider();
		/*############################################################*/
		
		//09: Opening category dropdown on click of text field on talent search page
		$("#test_select").click(function(){
			$(".test_drop").slideToggle();
		});
		/*############################################################*/
		
	});
	
/*------------ Onload Functions <End> ------------*/

/******************************************** Global <END> ***************************************************/

/******************************************** MODULE 01: LOGIN <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
		01: Toggle account type
		02: Register Via Email
		03: Login Via Email
		04: Resend Confirm URL
		05: Login Via Facebook
		06: Reset Via Email
------------ Function List <End>-----------------*/
	//01: Toggle account type
	
		// $("#option-one").click(function(){
		//   $(".service_provider").show();
		//   $(".event_organizer").hide();
		// });

		// $("#option-two").click(function(){
		//   $(".service_provider").hide();
		//   $(".event_organizer").show();
		// });

	/*#############################################################################################################################################*/
	
	//02: Register Via Email

	function registerPlannerByEmail(){


		//clear .errorMsg area
		$('.error-info-msg').hide();
		
		
		// User type => 3 = Service provider, 2 = Organizer 

			//get form values
			// var role = $('#registerForm input[name=role]:checked').val();
			var role = $('.account-type-user').val();;
			
			var first_name = $('.reg_form .first_name').val();
			var last_name = $('.reg_form .last_name').val();
			var email = $('.reg_form .email').val();
			var password = $('.reg_form .password').val();
			var password1 = $('.reg_form .password1').val();
			var planner_account_type = $('.reg_form input[name=planne_account_type]:checked').val();
			// var newsletter = ($('#newsletter_sub').is(':checked'))?1:0;
			//alert(role+","+first_name+","+last_name+","+email+","+password+","+password1+","+newsletter);  return false;
			var error_flag = false;
			/*---------------------FORM VALIDATIONS <START>---------------------*/
			//validate email address
			
			if (first_name === "") {

				$('.error-info-msg').show();
				$('.erro').text('Please check all fields');
				error_flag = true;
			} else if (last_name === "") {
				$('.error-info-msg').show();
				$('.erro').text('Please check all fields');
				error_flag = true;
			} else if (email === "") {
				$('.error-info-msg').show();
				$('.erro').text('Please check all fields');
				error_flag = true;
			} 

			// else if( !validateEmail(email)){
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please enter a valid email address');
			// 	error_flag = true;
			// } 

			// else if (password === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// } else if (!validatePassword(password) ) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').html('Your password must be a combination of at least <b> 6 alphabets and digits.<b>');
			// 	error_flag = true;
			// }else if (!validateSimplePassword(password)) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').html('Your password must be a combination of at least <b> 6 alphabets and digits.<b>');
			// 	error_flag = true;
			// }else if (password1 === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please re-enter your password');
			// 	error_flag = true;
			// }else if (password1 != password) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Passwords must match');
			// 	error_flag = true;
			// }
			
			/*---------------------FORM VALIDATIONS <END>---------------------*/
			//submit form

			
			else if(error_flag == false) {

				FUNCTION_NAME = 'registerByEmailAjax';
				PARAM  = {role:role,first_name:first_name,last_name:last_name,email:email,password:password,planner_account_type:planner_account_type};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			}

		
	}
	function contactquery(){

		$('.error-info-msg').hide();
		//alert();
		//get form values
		var name = $( "#contact_name" ).val();
		var email = $( "#contact_email" ).val();
		var message = $( "#contact_message" ).val();
		// $('.error-info-msg').text('');
		 var error_flag = false;
		//alert(reason);
		// if (!name) {
		// 	$('.error-info-msg').show()
		// 	error_flag = true;		
		// }
		// else if (!email) {
		// 	$('.error-info-msg').show()
		// 	error_flag = true;		
		// }
		// else if (!message) {
		// 	$('.error-info-msg').show()
		// 	error_flag = true;		
		// }
		// else 
			if(error_flag == false)
		{

				FUNCTION_NAME = 'contactquery';
		PARAM  = {name:name,email:email,message:message};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	}

	function confirmPayment(amount,job_id,event_planner_id,service_id,sp_id) {
		FUNCTION_NAME = 'confirmPayment';
		PARAM  = {amount:amount,job_id:job_id,event_planner_id:event_planner_id,service_id:service_id,sp_id:sp_id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
	function registerServiceProviderByEmail(){
		
		//clear .errorMsg area
		$('.error-info-msg').hide();
		
		// User type => 3 = Service provider, 2 = Organizer 

			//get form values
			// var role = $('#registerForm input[name=role]:checked').val();
			var role = $('.account-type-user').val();;
			
			var first_name = $('.first_name').val();
			var last_name = $(' .last_name').val();
			var email = $(' .email').val();
			var password = $(' .password').val();
			var password1 = $(' .password1').val();
			// var business_name = $('.service-provider-form .business_name').val();
			// var newsletter = ($('#newsletter_sub').is(':checked'))?1:0;
			//alert(role+","+first_name+","+last_name+","+email+","+password+","+password1+","+newsletter);  return false;
			var error_flag = false;
			/*---------------------FORM VALIDATIONS <START>---------------------*/
			//validate email address
			// if (typeof role === "undefined") {
			// 	$('.errorMsg').text('Please select your role');
			// 	error_flag = true;
			// } else 
			// if (first_name === "") {

			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// } else if (last_name === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// } else if (email === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// } else if( !validateEmail(email)){
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please enter a valid email address');
			// 	error_flag = true;
			// } else if (business_name === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// }else if (password === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please check all fields');
			// 	error_flag = true;
			// } else if (!validatePassword(password)) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').html('Your password must be a combination of at least <b> 6 alphabets and digits.<b>');
			// 	error_flag = true;
			// }else if (!validateSimplePassword(password)) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').html('Your password must be a combination of at least <b> 6 alphabets and digits.<b>');
			// 	error_flag = true;
			// }else if (password1 === "") {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Please re-enter your password');
			// 	error_flag = true;
			// }else if (password1 != password) {
			// 	$('.error-info-msg').show();
			// 	$('.erro').text('Password must match');
			// 	error_flag = true;
			// }

			// /*---------------------FORM VALIDATIONS <END>---------------------*/
			// //submit form

			// // newsletter:newsletter
			// else if(error_flag == false) {

				FUNCTION_NAME = 'registerByEmailAjax';
				PARAM  = {role:role,first_name:first_name,last_name:last_name,email:email,password:password};
				xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			// }

		
	}
	/*#############################################################################################################################################*/
	//03: Login Via Email
	
	function loginByEmail(){
		
		//clear .errorMsg area
		$('.error-info-msg').hide();
		
		//get form values
		var email = $(' #exampleInputEmail').val();
		var password = $(' #exampleInputPassword').val();
		var remember_me = "";
		
		var error_flag = false;
		
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		// if (!email) {
		// 	$('.loerror').show();
		// 	$('.err').text('Please check all fields');
		// 	error_flag = true;		
		// } else if( !validateEmail(email)){
		// 	$('.loerror').show();
		// 	$('.err').text('Please enter a valid email address');
		// 	error_flag = true;
		// }	
		// // validate password	
		// else if (!password) {
		// 	$('.loerror').show();
		// 	$('.err').text('Please check all fields');
		// 	error_flag = true;	
		// }
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		
		//submit form
		// else if(error_flag == false) {
			FUNCTION_NAME = 'loginAjax';
			PARAM  = {email:email,password:password};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		// }
	}
	
	//04: Resend Confirm URL
	$(document).delegate('#resend_confirm_url','click',function(){
		$('.errorMsg').text('');

		var email = $('#loginForm #email').val();
		var error_flag = false;

		if (!email) {
			$('.errorMsg').text('Email address is required');
			error_flag = true;		
		} else if( !validateEmail(email)){
			$('.errorMsg').text('Please enter a valid email address');
			error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'resendConfirmUrl';
			PARAM  = {email:email};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	})
	/*#############################################################################################################################################*/
	//05: Login Via Facebook
	function loginByFacebook() {
		FB.login(function(response) {
		if (response.session && response.scope) {
			FB.api('/me',
				function(response) {
					alert('User: ' + response.name);
					alert('Full details: ' + JSON.stringify(response));
				}
			);
		}
		}, {scope: 'email'});
			xajax_loginByFacebook();
		}
	/*#############################################################################################################################################*/
	//06: Reset Via Email
	function resetEmail() {
	
		//clear .errorMsg area
		$('#resetForm .errorMsg').text('');
			
		//get form values
		var error_flag = false;
		var email = $('#reset_email').val();
		if(error_flag == false) {
			FUNCTION_NAME = 'resetPasswordAjax';
			PARAM  = {email:email};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}

	function resetViaEmail() {
	
		//clear .errorMsg area
		$('#resetForm .errorMsg').text('');
			
		//get form values
		var error_flag = false;
		var email = $('#reset_email').val();
		if(error_flag == false) {
			FUNCTION_NAME = 'resendConfirmUrl';
			PARAM  = {email:email};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/

/*------------ Defined Functions <End> ------------*/
	
/******************************************** MODULE 01: LOGIN <END> ***************************************************/

/******************************************** MODULE 02: PROFILE <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/
/*------------ Function List <Start>-----------------
	01: roleConfirmation
	02: editProfile
	03: editTalentProfile
	04: changePassword
	05: bookTalent
	06: editTalentPublicProfile
	07: update_status
	08: change_talent_job_status
	09: changeTalentJobStatus
	10: changeEmployerBookmarkStatus
	11: showMessageContent
	12: update_portfolio_featured_status
	13: update_portfolio_image_status
	14: changePortfolioImageStatus
	15: update_portfolio_video_status
	16: changePortfolioVideoStatus
	17: openReviewModal
	18: showReviewModal
	19: writeReview
	20: openEmployerPaymentModal
	21: showEmployerPaymentModal
	22: editEmployerPayment
	23: addTalentPayment
------------ Function List <End>-----------------*/

	//01: roleConfirmation
	function roleConfirmation(user_id){
		//clear .errorMsg area
		$('.errorMsg').text('');
		
		//get form values
		var role = $('#roleConfirmationForm input[name=role]:checked').val();
		var newsletter = ($('#newsletter_sub').is(':checked'))?1:0;
		var error_flag = false;
		
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (typeof role === "undefined") {
			$('.errorMsg').text('Please select your role');
			error_flag = true;
		}else if(!$('#agree_terms').is(':checked')){
			$('.errorMsg').text('Please agree to our terms & conditions');
			error_flag = true;
		}		/*---------------------FORM VALIDATIONS <END>---------------------*/
		
		//submit form
		else if(error_flag == false) {
			FUNCTION_NAME = 'roleConfirmationAjax';
			PARAM  = {user_id:user_id,role:role,newsletter:newsletter};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/
	//02: editProfile



	// function editProfile(user_id) {
	// 	//clear .errorMsg area
	// 	$('#editProfileForm .errorMsg').text('');

	// 	//Getting Values
	// 	var profile_image = $('#profile_image').val();
	// 	var company_name = $( "#editProfileForm input[name=company_name]" ).val();
	// 	var title = $( "#editProfileForm #title option:selected" ).val();
	// 	var gender = $( "#editProfileForm #gender option:selected" ).val();
	// 	var first_name = $( "#editProfileForm input[name=first_name]" ).val();
	// 	var last_name = $( "#editProfileForm input[name=last_name]" ).val();
	// 	var email = $( "#editProfileForm input[name=email]" ).val();
	// 	var country_id = $( "#editProfileForm #country option:selected" ).val();
	// 	var country_name = $( "#editProfileForm #country option:selected" ).text();
	// 	var city = $( "#editProfileForm input[name=city]" ).val();
	// 	var postal_code = $( "#editProfileForm input[name=postal_code]" ).val();
	// 	var phone_code = $( "#editProfileForm #phone_code option:selected" ).val();
	// 	var phone = $( "#editProfileForm input[name=phone]" ).val();
	// 	var address = $( "#editProfileForm textarea[name=address]" ).val();
	// 	var bio = $( "#editProfileForm textarea[name=bio]" ).val();
	// 	var base64 = $("#profile_image_base64").val();
	// 	var is_base64_method = $("#is_base64_method").val();
	// 	//alert(profile_image+","+company_name+","+title+","+first_name+","+last_name+","+email+","+country_id+","+country_name+","+city+","+postal_code+","+phone_code+","+phone+","+address+","+bio); return false;
	// 	//Validation Check
	// 	var error_flag = false;
	// 	if((is_base64_method && base64==="") && profile_image === "") {
	// 		$('#editProfileForm .errorMsg').text("Profile image is required");
	// 		error_flag = true;
	// 	}else if(title == 0) {
	// 		$('#editProfileForm .errorMsg').text("Please select your title");
	// 		error_flag = true;
	// 	}else if(gender == 0) {
	// 		$('#editProfileForm .errorMsg').text("Please select your gender");
	// 		error_flag = true;
	// 	}else if(first_name === "") {
	// 		$('#editProfileForm .errorMsg').text("First name is required");
	// 		error_flag = true;
	// 	}else if(last_name === "") {
	// 		$('#editProfileForm .errorMsg').text("Last name is required");
	// 		error_flag = true;
	// 	}else if(company_name === "") {
	// 		$('#editProfileForm .errorMsg').text("Company name is required");
	// 		error_flag = true;
	// 	}else if(email === "") {
	// 		$('#editProfileForm .errorMsg').text("Email is required");
	// 		error_flag = true;
	// 	}else if(!validateEmail(email)) {
	// 		$('#editProfileForm .errorMsg').text("Please enter a valid email address");
	// 		error_flag = true;
	// 	}else if(country_id == 0) {
	// 		$('#editProfileForm .errorMsg').text("Please select your country");
	// 		error_flag = true;
	// 	}else if(city === "") {
	// 		$('#editProfileForm .errorMsg').text("City is required");
	// 		error_flag = true;
	// 	}else if(phone_code == 0) {
	// 		$('#editProfileForm .errorMsg').text("Please select your country code");
	// 		error_flag = true;
	// 	}else if(phone === "") {
	// 		$('#editProfileForm .errorMsg').text("Phone number is required");
	// 		error_flag = true;
	// 	}else if(!validateNumber(phone)) {
	// 		$('#editProfileForm .errorMsg').text("Please enter valid phone number");
	// 		error_flag = true;
	// 	}else if(address === "") {
	// 		$('#editProfileForm .errorMsg').text("Address is required");
	// 		error_flag = true;
	// 	}else if(error_flag == false){
	// 		$.ajaxFileUpload({
	// 				url             :'./editProfileAjax/', 
	// 				secureuri       :false,
	// 				fileElementId   :'imgInp2',
	// 				dataType        : 'json',
	// 				data        	: {user_id:user_id,company_name:company_name,title:title,gender:gender,first_name:first_name,
	// 								last_name:last_name,email:email,country_id:country_id,country_name:country_name,
	// 								city:city,postal_code:postal_code,phone_code:phone_code,phone:phone,address:address,is_base64_method:is_base64_method,base64:base64,
	// 								bio:bio},
	// 				 success : function (obj)
	// 				{
	// 					if(obj.status==0){
	// 						$('#editProfileForm .errorMsg').text(obj.response);
	// 					}else if(obj.status==1){
	// 						successAlerts(obj.response,obj.url);
	// 					}else if(obj.status==2){
	// 						$('#editProfileForm .errorMsg').text(obj.response);
	// 					}else if(obj.status==3){
	// 						$('#editProfileForm .errorMsg').text(obj.response);
	// 					}
	// 				}
	// 			});
	// 	}
	// }
/*#############################################################################################################################################*/
	//03: editTalentProfile
	function editTalentProfile(user_id) {
		//clear .errorMsg area
		$('#editTalentProfileForm .errorMsg').text('');

		//Getting Values
		var profile_image = $('#profile_image').val();
		// var title = $( "#editTalentProfileForm #title option:selected" ).val();
		// var gender = $( "#editTalentProfileForm #gender option:selected" ).val();
		var first_name = $( "#editTalentProfileForm input[name=first_name]" ).val();
		var last_name = $( "#editTalentProfileForm input[name=last_name]" ).val();
		var email = $( "#editTalentProfileForm input[name=email]" ).val();
		var country_id = $( "#editTalentProfileForm #country option:selected" ).val();
		var country_name = $( "#editTalentProfileForm #country option:selected" ).text();
		var city = $( "#editTalentProfileForm input[name=city]" ).val();
		// var postal_code = $( "#editTalentProfileForm input[name=postal_code]" ).val();
		// var phone_code = $( "#editTalentProfileForm #phone_code option:selected" ).val();
		var phone = $( "#editTalentProfileForm input[name=phone]" ).val();
		var address = $( "#editTalentProfileForm textarea[name=address]" ).val();
		var base64 = $("#profile_image_base64").val();
		var is_base64_method = $("#is_base64_method").val();
		//alert(base64); return false;
		var error_flag = false;
		if((is_base64_method && base64==="") && profile_image === "") {
			$('#editTalentProfileForm .errorMsg').text("Profile image is required");
			error_flag = true;
		}
		// else if(title == 0) {
		// 	$('#editTalentProfileForm .errorMsg').text("Please select your title");
		// 	error_flag = true;
		// }
		// else if(gender == 0) {
		// 	$('#editTalentProfileForm .errorMsg').text("Please select your gender");
		// 	error_flag = true;
		// }
		else if(first_name === "") {
			$('#editTalentProfileForm .errorMsg').text("First name is required");
			error_flag = true;
		}else if(last_name === "") {
			$('#editTalentProfileForm .errorMsg').text("Last name is required");
			error_flag = true;
		}
		// else if(phone_code == 0) {
		// 	$('#editTalentProfileForm .errorMsg').text("Please select your country code");
		// 	error_flag = true;
		// }
		else if(phone === "") {
			$('#editTalentProfileForm .errorMsg').text("Phone number is required");
			error_flag = true;
		}else if(!validateNumber(phone)) {
			$('#editTalentProfileForm .errorMsg').text("Please enter valid phone number");
			error_flag = true;
		}else if(address === "") {
			$('#editTalentProfileForm .errorMsg').text("Address is required");
			error_flag = true;
		}else if(country_id == 0) {
			$('#editTalentProfileForm .errorMsg').text("Please select your country");
			error_flag = true;
		}else if(city === "") {
			$('#editTalentProfileForm .errorMsg').text("City is required");
			error_flag = true;
		}else if(error_flag == false){
			$.ajaxFileUpload({
					url             :'./editTalentProfileAjax/', 
					secureuri       :false,
					fileElementId   :'imgInp1',
					dataType        : 'json',
					data        	: {user_id:user_id,first_name:first_name,
									last_name:last_name,email:email,country_id:country_id,country_name:country_name,
									city:city,phone:phone,address:address,is_base64_method:is_base64_method,base64:base64},
					 success : function (obj)
					{
						if(obj.status==0){
							$('#editTalentProfileForm .errorMsg').text(obj.response);
						}else if(obj.status==1){
							successAlerts(obj.response,obj.url);
						}else if(obj.status==2){
							$('#editTalentProfileForm .errorMsg').text(obj.response);
						}else if(obj.status==3){
							$('#editTalentProfileForm .errorMsg').text(obj.response);
						}
					}
				});
		}
	}

	function create_event_ajax(){

		//clear .errorMsg area
		$('.custom-form .errorMsg').text('');
		var error_flag = false;
		var re = /^[\d +]+$/;
		//get form values
		var services = '';
		var price = '';
		var title = $( "#event-title" ).val();
		var details = $( "#event-details" ).val();
		var date = $( "#event-date" ).val();
		var location = $( "#event-location" ).val();
		var deadline = $( "#application-deadline" ).val();

		// var services = $( ".service-required" ).val();
		// var budget = $( ".budget" ).val();

		$(".service-required").each(function(){
			services += $(this).val()+",";
			 
		});
		$(".budget").each(function(){
			price += $(this).val()+",";
			 
		});
	
		
		// $(services).each(function(index){
		// 	var option_id = $(this).attr("dataid");
		// 	var question_id = $(this).attr("pref_id");
		// 	var temp_arr = new Array();
		// 	temp_arr = [question_id,option_id];
		// 	selected_options.push(temp_arr);			
		// });
		// console.log(services);
		// return false;
		if(!title){
			$('.custom-form .errorMsg').text("Event title is required");
			var error_flag = true;
		} else if(!details){
			$('.custom-form .errorMsg').text("Event details are required");
			var error_flag = true;
		}  else if(error_flag == false) {
			FUNCTION_NAME = 'create_event_ajax';
			PARAM  = {title:title,details:details,date:date,deadline:deadline,services:services,price:price,location:location};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
		
	}
/*#############################################################################################################################################*/
	//04: changePassword
	function changePassword(user_id) {
		//clear .errorMsg area
		$('#changePasswordForm .errorMsg').text('');	
		var error_flag = false;
		//get form values
		var current_password = $( "#password" ).val();
		var new_password1 = $( "#password1" ).val();
		var con_password = $( "#con_password" ).val();
		if(!current_password){
			$('#changePasswordForm .errorMsg').text("Current password is required");
			var error_flag = true;
		} else if(!new_password1){
			$('#changePasswordForm .errorMsg').text("New password is required");
			var error_flag = true;
		} else if(new_password1.length <= 5) {
			$('#changePasswordForm .errorMsg').text("New password must be at least 6 characters long")
			var error_flag = true;
		} else if(!con_password){
			$('#changePasswordForm .errorMsg').text("Confirm password is required");
			var error_flag = true;
		} else if(new_password1 != con_password){
			$('#changePasswordForm .errorMsg').text("Password doesn't match");
			var error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'changePasswordAjax';
			PARAM  = {user_id:user_id,current_password:current_password,new_password1:new_password1};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}

	function delete_account(user_id) {
		
		$('#leaving-modal').modal().show();
		$('#confrmpswrd').val(user_id);
		// var result = confirm("Are you sure you want to delete your account ?");
		// if (result === true) {

		// 	FUNCTION_NAME = 'delete_account';
		// 	PARAM  = {user_id:user_id};
		// 	xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		// } 

	}


	function confirmPassword(user_id) {
		//clear .errorMsg area
		$('#changePasswordForm .errorMsg').text('');	
		var error_flag = false;
		//get form values
		var current_password = $( "#psswrd" ).val();
		
		if(!current_password){
			$('.errorMsg2').text("Password is required");
			var error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'confirmPasswordAjax';
			PARAM  = {user_id:user_id,current_password:current_password};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}

	function confirm_delete(user_id) {
		var current_password = $( "#conf_pwd" ).val();
		var error_flag = false;
		if(!current_password){
			$('.conf_p .errorMsg').text("Current password is required");
			var error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'delete_account';
			PARAM  = {user_id:user_id,current_password:current_password};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}

/*#############################################################################################################################################*/
	//05: bookTalent
	function bookTalent(user_id) {
		//clear .errorMsg area
		$('#bookTalentForm .errorMsg').text('');	
		var error_flag = false;
		//get form values
		var subject = $( "#subject" ).val();
		var description = $( "#description" ).val();
		if(!subject){
			$('#bookTalentForm .errorMsg').text("Subject is required");
			var error_flag = true;
		} else if(!description){
			$('#bookTalentForm .errorMsg').text("Brief description is required");
			var error_flag = true;
		} else if(error_flag == false) {
			FUNCTION_NAME = 'bookTalentQueryAjax';
			PARAM  = {user_id:user_id,subject:subject,description:description};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}

/*#############################################################################################################################################*/

	//06: editTalentPublicProfile
	function editTalentPublicProfile(user_id) {
		
		//clear .errorMsg area
		$('#editTalentPublicProfileForm .errorMsg').text('');
		var category_id = $("#editTalentPublicProfileForm #category option:selected").val();
		
		var fields = $("#editTalentPublicProfileForm #category").find(':selected').data('fields');		
		//var country_id = $( "#editTalentPublicProfileForm #country option:selected" ).val();
		//var country_name = $( "#editTalentPublicProfileForm #country option:selected" ).text();
		//var city = $( "#editTalentPublicProfileForm input[name=city]" ).val();
		//var variables = '{"user_id":"'+user_id+'","talent_category_id":"'+category_id+'","country_id":"'+country_id+'","city":"'+city+'","fields":"'+fields+'"';
		var variables = '{"user_id":"'+user_id+'","talent_category_id":"'+category_id+'","fields":"'+fields+'"';
		var error_flag = false;
		$('#editTalentPublicProfileForm .category-fields').each(function(){
			var id = $(this).data('id');
			var type = $(this).data('type');
			var is_required = $(this).data('required');
			var validationtype = $(this).data('validationtype');
			var name = $(this).data('name');
			var title = $(this).data('title');
			if($(this).is(':visible')){
				//title = title.toLowerCase();
				if(type==1){
					var val = $( "#editTalentPublicProfileForm input[name='"+name+"']" ).val();
					if(validationtype!=0){
						if(validationtype==1){
							//check email
							if(!validateEmail(val)){
								$('#editTalentPublicProfileForm .errorMsg').text("Please enter valid "+title+"");
								error_flag = true;
							}
						}else if(validationtype==2){
							//check number
							if(!validateNumber(val)){
								$('#editTalentPublicProfileForm .errorMsg').text("Please enter valid "+title+"");
								error_flag = true;
							}
						}else if(validationtype==3){
							//check url
							if(!isUrlValid(val)){
								$('#editTalentPublicProfileForm .errorMsg').text("Please enter valid "+title+"");
								error_flag = true;
							}
						}
					}
				}else if(type==2){
					var val = $("#editTalentPublicProfileForm textarea[name='"+name+"']").val();
				}else{
					var val = $( "#editTalentPublicProfileForm #"+name+" option:selected" ).val();
				}
				if(is_required){
					if(val==="" || val==0){
						$('#editTalentPublicProfileForm .errorMsg').text(""+title+" is required");
						error_flag = true;
						return false;
					}
				}
				variables += ',"'+name+'":"'+val+'"';
				//variables[0][name] = val;
			}else{
				val="";
				//variables[0][name] = val;
				variables += ',"'+name+'":"'+val+'"';
			}	
		});	
		if(category_id == 0 && error_flag == false) {
			$('#editTalentPublicProfileForm .errorMsg').text("Please select your category");
			error_flag = true;
		}
		/* else if(country_id == 0 && error_flag == false) {
			$('#editTalentPublicProfileForm .errorMsg').text("Please select your country");
			error_flag = true;
		}else if(city === "" && error_flag == false) {
			$('#editTalentPublicProfileForm .errorMsg').text("City is required");
			error_flag = true;
		} */else if(error_flag == false){
			variables += '}';
			variables = JSON.parse(variables);
			FUNCTION_NAME = 'editTalentPublicProfileAjax';
			PARAM  = variables;
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/
	//07: update_status
	function update_status(id,type,functionName,status){
		type2 = type.toLowerCase();
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type2+'?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.del-btn").attr('onclick',functionName+'('+id+','+status+');');
			$("#delete_modal").modal("show");
		}else{
			window[functionName](id,status);
		}
	}
/*#############################################################################################################################################*/
	
	//08: change_talent_job_status
	function change_talent_job_status(id,status,type,functionName,update_event){
		if(typeof update_event === "undefined"){
			update_event = 0;
		}
		$("#suspend_modal .modal-title").text(type);
		$("#suspend_modal .modal-body .form-control").val('');
		$("#suspend_modal .modal-body textarea[name='reason_for_suspension']").attr("placeholder","Your Comments");
		$("#suspend_modal .errorMsg").text('');
		//$("#suspend_modal .modal-body").html('Warning: Are you sure you want to delete the selected '+type+'?<br />Note: There is no undo function.');
		$("#suspend_modal .modal-footer>.blue").attr('onclick',functionName+'('+id+','+status+','+update_event+');');
		$("#suspend_modal").modal("show");
	}
/*#############################################################################################################################################*/	
	
	//09: changeTalentJobStatus
	function changeTalentJobStatus(id,status,update_event){
		var talent_comments = $("#suspend_modal textarea[name='reason_for_suspension']" ).val();
		FUNCTION_NAME = 'changeTalentJobStatusAjax';
		PARAM  = {id:id,talent_comments:talent_comments,status:status,update_event:update_event};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/	

	//10: changeEmployerBookmarkStatus
	function changeEmployerBookmarkStatus(bookmark_id,status){
		FUNCTION_NAME = 'changeEmployerBookmarkStatusAjax';
		PARAM  = {bookmark_id:bookmark_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/		
	
	//11: showMessageContent
	function showMessageContent(content,subject){
		$("#settings .text").text(content);
		$("#settings .modal-title").text(subject);
		$("#settings .modal-footer>.theme_button").attr('onclick','');
		$("#settings").modal("show");
	}
/*#############################################################################################################################################*/		
	
	//12: update_portfolio_featured_status
	function update_portfolio_featured_status(user_id,id,type,functionName,status,media_type){
		  FUNCTION_NAME = 'changePortfolioFeaturedStatusAjax';
		  PARAM  = {portfolio_id:id,status:status,user_id:user_id,media_type:media_type};
		  xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/		
	
	//13: update_portfolio_image_status
	function update_portfolio_image_status(id,type,functionName,status){
		type2 = type.toLowerCase();
		if(status == 2){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected image?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.del-btn").attr('onclick',functionName+'('+id+','+status+');');
			$("#delete_modal").modal("show");
		}else{
			window[functionName](id,status);
		}
	}
/*#############################################################################################################################################*/		
	
	//14: changePortfolioImageStatus
	function changePortfolioImageStatus(portfolio_id,status){
		FUNCTION_NAME = 'changePortfolioMediaStatusAjax';
		PARAM  = {portfolio_id:portfolio_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/		
	
	//15: update_portfolio_video_status
	function update_portfolio_video_status(id,type,functionName,status){
		type2 = type.toLowerCase();
		if(status == 3){
			$("#delete_modal .modal-body").html('Warning: Are you sure you want to delete the selected video?<br />Note: There is no undo function.');
			$("#delete_modal .modal-title").text(type);
			$("#delete_modal .modal-footer>.del-btn").attr('onclick',functionName+'('+id+','+status+');');
			$("#delete_modal").modal("show");
		}else{
			window[functionName](id,status);
		}
	}
/*#############################################################################################################################################*/		
	
	//16: changePortfolioVideoStatus
	function changePortfolioVideoStatus(portfolio_id,status){
		FUNCTION_NAME = 'changePortfolioMediaStatusAjax';
		PARAM  = {portfolio_id:portfolio_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}	
/*#############################################################################################################################################*/			
	
	//17: openReviewModal
	function openReviewModal(talent_id,employer_id,job_id,role,review_type){
		FUNCTION_NAME = 'showReviewModalAjax';
		PARAM  = {talent_id:talent_id,employer_id:employer_id,job_id:job_id,role:role,review_type:review_type};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/				
	
	//18: showReviewModal
	function showReviewModal(html){
		$("#reviewModal").html(html);
		$("#reviewModal").modal("show");
	}
/*#############################################################################################################################################*/				
	
	//19: writeReview
	function writeReview(review_id,talent_id,employer_id,job_id,role,review_type){
		//clear .errorMsg area
		$('#reviewForm .errorMsg').text('');
		
		//get form values
		var rating = $('#reviewForm input[name=rating]').val();
		var review = $( "#reviewForm textarea[name=review]" ).val();
		var curr_rating = $('#reviewForm input[name=curr_rating]').val();
		var curr_review = $( "#reviewForm input[name=curr_review]" ).val();
		var error_flag = false;
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (rating==0) {
			$('#reviewForm .errorMsg').text('Rating is required');
			error_flag = true;		
		} else if (review==="") {
			$('#reviewForm .errorMsg').text('Review is required');
			error_flag = true;		
		} else if (review_id!=0 && rating == curr_rating && curr_review == review) {
			$('#reviewForm .errorMsg').text('Kindly update your rating or review to submit it again');
			error_flag = true;		
		} 
		
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		else if(error_flag == false) {
			
			//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
			FUNCTION_NAME = 'writeReviewAjax';
			PARAM  = {review_id:review_id,talent_id:talent_id,employer_id:employer_id,job_id:job_id,role:role,review_type:review_type,rating:rating,review:review};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/			
	
	//20: openEmployerPaymentModal
	function openEmployerPaymentModal(job_id,amount,payment_type,trans_id,employer_id){
		
		//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
		FUNCTION_NAME = 'showEmployerPaymentModalAjax';
		PARAM  = {job_id:job_id,amount:amount,payment_type:payment_type,trans_id:trans_id,employer_id:employer_id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/				
	
	//21: showEmployerPaymentModal
	function showEmployerPaymentModal(html){
		$("#makePayment").html(html);
		$("#makePayment").modal("show");
	}
/*#############################################################################################################################################*/				
	
	//22: editEmployerPayment
	function editEmployerPayment(job_id,amount,employer_id){
		//clear .errorMsg area
		$('#employerPaymentForm .errorMsg').text('');
		var d = new Date();
		var m = d.getMonth()+1;
		var y = d.getFullYear();
		
		//get form values
		var payment_type = $( "#employerPaymentForm #payment_type" ).val();
		var curr_payment_type = $('#employerPaymentForm input[name=curr_payment_type]').val();
		var trans_id = $( "#employerPaymentForm input[name=trans_id]" ).val();
		var curr_trans_id = $('#employerPaymentForm input[name=curr_trans_id').val();
		
		//Credit Card Fields
		var name = $('#employerPaymentForm input[name=name]').val();
		var card_no = $('#employerPaymentForm input[name=card_no]').val();
		var expiry_month = $( "#employerPaymentForm #expiry_month" ).val();
		var expiry_year = $( "#employerPaymentForm #expiry_year" ).val();
		var cvv = $('#employerPaymentForm input[name=cvv]').val();
		
		
		var error_flag = false;
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (payment_type==0) {
			$('#employerPaymentForm .errorMsg').text('Please select your transaction medium');
			error_flag = true;		
		} else if (trans_id==="" && payment_type!=4) {
			$('#employerPaymentForm .errorMsg').text('Transaction ID is required');
			error_flag = true;		
		} else if (payment_type == curr_payment_type && trans_id == curr_trans_id && payment_type!=4) {
			$('#employerPaymentForm .errorMsg').text('Kindly update your information to update payment');
			error_flag = true;		
		} else if (payment_type==4) {
			if (card_no==="") {
				$('#employerPaymentForm .errorMsg').text('Please enter your credit card number');
				error_flag = true;		
			}else if (card_no.length<16) {
				$('#employerPaymentForm .errorMsg').text('Please enter valid credit card number');
				error_flag = true;		
			}else if (name==="") {
				$('#employerPaymentForm .errorMsg').text('Please enter your name');
				error_flag = true;		
			}else if (expiry_year < y) {
				$('#employerPaymentForm .errorMsg').text('Please enter valid expiry year');
				error_flag = true;		
			}else if (expiry_year == y && expiry_month <= m) {
				$('#employerPaymentForm .errorMsg').text('Please enter valid expiry month');
				error_flag = true;		
			}else if (cvv==="") {
				$('#employerPaymentForm .errorMsg').text('Please enter cvv number');
				error_flag = true;		
			}else if(error_flag == false){
				// Called when token created successfully.
				var successCallback = function(data) {
					var myForm = document.getElementById('employerPaymentForm');

					// Set the token as the value for the token input
					myForm.token.value = data.response.token.token;
					
					// IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
					//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
					var token = data.response.token.token;
					trans_id = 0;
					//$(".tab-content").addClass("profile-custom-overlay");
					//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
					$("#employer_payment_modal_submit").prop('disabled', true);
					FUNCTION_NAME = 'editEmployerPaymentAjax';
					PARAM  = {job_id:job_id,payment_type:payment_type,trans_id:trans_id,employer_id:employer_id,amount:amount,token:token};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					
				};
				
				// Called when token creation fails.
				var errorCallback = function(data) {
					//alert('error');
					if (data.errorCode === 200) {
						tokenRequest();
					} else {
						//alert(data.errorMsg);
						$('#employerPaymentForm .errorMsg').text(data.errorMsg);
						error_flag = true;		
						//return false;
						//alert(data.errorMsg);
					}
				};
				var tokenRequest = function() {
					// Setup token request arguments
					var args = {
						sellerId: TWO_CO_SELLER_ID,
						publishableKey: TWO_CO_PUBLISHABLE_KEY,
						ccNo: card_no,
						cvv: cvv,
						expMonth: expiry_month,
						expYear: expiry_year
					};
					//console.log(args); return false;
					// Make the token request
					TCO.requestToken(successCallback, errorCallback, args);
				};
				tokenRequest();
				return false;
			}
		} 
		
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		else if(error_flag == false) {
			var token = 0
			//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
			$("#employer_payment_modal_submit").prop('disabled', true);
			FUNCTION_NAME = 'editEmployerPaymentAjax';
			PARAM  = {job_id:job_id,payment_type:payment_type,trans_id:trans_id,employer_id:employer_id,amount:amount,token:token};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/				
	
	//23: addTalentPayment
	function addTalentPayment(user_id){
		//clear .errorMsg area
		$('#talentPaymentForm .errorMsg').text('');
		var d = new Date();
		var m = d.getMonth()+1;
		var y = d.getFullYear();
		
		//get form values
		var payment_package = $( "#talentPaymentForm #package" ).val();
		var package_amount = $( "#talentPaymentForm #package").find(':selected').data('amount');
		var payment_type = $( "#talentPaymentForm #payment_type" ).val();
		var coupon_code = $('#talentPaymentForm input[name=coupon_code]').val();
		var trans_id = $( "#talentPaymentForm input[name=trans_id]" ).val();
		var name = $('#talentPaymentForm input[name=name]').val();
		var card_no = $('#talentPaymentForm input[name=card_no]').val();
		var expiry_month = $( "#talentPaymentForm #expiry_month" ).val();
		var expiry_year = $( "#talentPaymentForm #expiry_year" ).val();
		var cvv = $('#talentPaymentForm input[name=cvv]').val();
		var error_flag = false;
		//Credit Card Fields
		
		
		
		
		
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (payment_package==0) {
			$('#talentPaymentForm .errorMsg').text('Please select your payment package');
			error_flag = true;		
		}else if (payment_type==0) {
			$('#talentPaymentForm .errorMsg').text('Please select your payment method');
			error_flag = true;		
		}else if (trans_id==="" && payment_type!=4) {
			$('#talentPaymentForm .errorMsg').text('Transaction ID is required');
			error_flag = true;		
		}else if (payment_type==4) {
			if (card_no==="") {
				$('#talentPaymentForm .errorMsg').text('Please enter your credit card number');
				error_flag = true;		
			}else if (card_no.length<16) {
				$('#talentPaymentForm .errorMsg').text('Please enter valid credit card number');
				error_flag = true;		
			}else if (name==="") {
				$('#talentPaymentForm .errorMsg').text('Please enter your name');
				error_flag = true;		
			}else if (cvv==="") {
				$('#talentPaymentForm .errorMsg').text('Please enter cvv number');
				error_flag = true;		
			}else if (expiry_year < y) {
				$('#talentPaymentForm .errorMsg').text('Please enter valid expiry year');
				error_flag = true;		
			}else if (expiry_year == y && expiry_month <= m) {
				$('#talentPaymentForm .errorMsg').text('Please enter valid expiry month');
				error_flag = true;		
			}else if(error_flag == false){
				// Called when token created successfully.
				var successCallback = function(data) {
					var myForm = document.getElementById('talentPaymentForm');

					// Set the token as the value for the token input
					//myForm.token.value = data.response.token.token;
					
					// IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
					//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
					var token = data.response.token.token;
					trans_id = 0;
					$(".tab-content").addClass("profile-custom-overlay");
					FUNCTION_NAME = 'addTalentPaymentAjax';
					PARAM  = {user_id:user_id,payment_package:payment_package,package_amount:package_amount,payment_type:payment_type,trans_id:trans_id,coupon_code:coupon_code,token:token};
					xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
					
				};
				
				// Called when token creation fails.
				var errorCallback = function(data) {
					//alert('error');
					if (data.errorCode === 200) {
						tokenRequest();
					} else {
						//alert(data.errorMsg);
						$('#talentPaymentForm .errorMsg').text(data.errorMsg);
						error_flag = true;		
						//return false;
						//alert(data.errorMsg);
					}
				};
				var tokenRequest = function() {
					// Setup token request arguments
					var args = {
						sellerId: TWO_CO_SELLER_ID,
						publishableKey: TWO_CO_PUBLISHABLE_KEY,
						ccNo: card_no,
						cvv: cvv,
						expMonth: expiry_month,
						expYear: expiry_year
					};
					//console.log(args); return false;
					// Make the token request
					TCO.requestToken(successCallback, errorCallback, args);
				};
				tokenRequest();
				return false;
			}
		}  
		
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		else if(error_flag == false) {
			var token = 0;
			//xajax_showOfferModalAjax(offeror_name,offeror_email,offered_ads);	
			$(".tab-content").addClass("profile-custom-overlay");
			FUNCTION_NAME = 'addTalentPaymentAjax';
			PARAM  = {user_id:user_id,payment_package:payment_package,package_amount:package_amount,payment_type:payment_type,trans_id:trans_id,coupon_code:coupon_code,token:token};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
			
		}
	}
/*#############################################################################################################################################*/			
/*------------ Defined Functions <End> ------------*/
/******************************************** MODULE 02: PROFILE <END> ***************************************************/

/******************************************** MODULE 03: SEARCH <START> ***************************************************/
/*------------Onload Functions <Start> ------------*/
/*------------ Function List <Start>-----------------
	01: Filter slide down
	02(a): Ads slide show
	02(b): Ads slide show
	02(c): Ads slide show
	03: Profile ajax loader
	04: Search Filters
------------ Function List <End>-----------------*/
	
/*------------Onload Functions <End> ------------*/
/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
	01: Auto compelete for city_filer
	02: searchTalents
	03: searchQuick
	04: sendAjaxRequest (for profile ajax loading)
	05: bookmarkTalent 
	06: addTalentToCart
	07: Infinite scroll search
	08: updateUserPastSearch
	09(a): Search submit
	09(b): Search submit
------------ Function List <End>-----------------*/

    
	
	//01: Auto compelete for city_filer
   
/*#############################################################################################################################################*/

	//02: searchTalents
	function searchTalents(user_id){
		
		var root_address = window.location.href.split('?')[0];
		var query = $('#search_text').val();
		var category = [];
		$('a.jstree-clicked').each(function(){
			category.push($(this).attr('id'));
		})
		category = category.join(',');

		var gender = $('#search_gender').val();
		var city = $('#search_city').val();
		var country = $('#search_country').val();
		if(gender===null){
			gender = "";
		}
		
		/* var gender = [];
		$('.search_gender').each(function(){
			if($(this).prop('checked') == true){
				gender.push($(this).val());
			}
		})
		gender = gender.join(','); */
		var eye = [];
		$(".eye_colors .side_bar_li").each(function(){
			if($(this).hasClass('active')){
				eye.push($(this).find(".color-label").text().toLowerCase());
			}
		});
		eye = eye.join(',');
		
		var hair = [];
		$(".hair_colors .side_bar_li").each(function(){
			if($(this).hasClass('active')){
				hair.push($(this).find(".color-label").text().toLowerCase());
			}
		});
		hair = hair.join(',');
		
		var height = $('#search_height').val();
		if(height===null){
			height = "";
		}
		//$("#slider-range-height").slider( "values");
		
		
		/* var height = [];
		$('.search_height').each(function(){
			if($(this).prop('checked') == true){
				height.push($(this).val());
			}
		})
		height = height.join(','); */
		
		var weight = $("#slider-range-weight").slider( "values");
		
		/* var weight = [];
		$('.search_weight').each(function(){
			if($(this).prop('checked') == true){
				weight.push($(this).val());
			}
		})
		weight = weight.join(','); */
		var age = $("#slider-range-age").slider("values");
		//var age = $('#search_age').val();
		
		var url = root_address+'?query='+query+'&category='+category+'&gender='+gender+'&eye='+eye+'&hair='+hair+'&height='+height+'&weight='+weight+'&age='+age+'&city='+city+'&country='+country;
		if(query != "" || category != "" || gender != "" || eye != "" || hair != "" || height != "" || weight != "" || age != 0 || city != "" || country != 0 ){
			location.href = url;
		}
	}
/*#############################################################################################################################################*/
	
	//03: searchQuick
	function searchQuick(form_id){
		//clear .errorMsg area
		//Getting Values
		var keyword = $('#'+form_id+' .search_keyword').val();
		var cat = "";
		var city = "";
		var price = "";
		if(keyword != ''){
			location.href = host+"search-list?keyword="+keyword+"&cat="+cat+"&city="+city+"&price="+price;
		}
	}
/*#############################################################################################################################################*/

	//04: sendAjaxRequest (for profile ajax loading)
	function sendAjaxRequest(url){
		$.ajax({
			  url: url,
			  cache: false,
			  context: document.body,
			  data: {is_ajax : 1},
			  success: function(html){
				$("#profile_container").html(html);
				window.history.pushState({"html": html,"pageTitle":'Wowzer | The Talent Agency'},"", url);
				$('a.profile-ajax-link').bind('click', function(e) { 
				 var url = $(this).attr('href');
				 $(".tab-content").addClass("profile-custom-overlay");
				 sendAjaxRequest(url); 
				 e.preventDefault();
				 //location.hash = url;
				
				});
			  }
			});
		//e.preventDefault();
	}
/*#############################################################################################################################################*/
	
	//05: bookmarkTalent 
	function bookmarkTalent(talent_id,employer_id,status){
		FUNCTION_NAME = 'bookmarkTalentAjax';
		PARAM  = {talent_id:talent_id,employer_id:employer_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/
	
	//06:addTalentToCart
	function addTalentToCart(user_id,employer_id,date){
		$("#book_appointment_modal").modal('show');
		FUNCTION_NAME = 'addTalenToCartAjax';
		PARAM  = {user_id:user_id,employer_id:employer_id,date:date};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/
	//07: Infinite scroll search
	$(document).scroll(function(){
		//alert();
		var numItems = $('.item').length;
		if(numItems > 3){
			$('#accordion').affix({
			  offset: {
				/* affix after top masthead */
				top: function () {
					var navOuterHeight = $('.container').height();
					return this.top = navOuterHeight;
				},
				/* un-affix when footer is reached */
				bottom: function () {
					return (this.bottom = $('footer').outerHeight(true))
				}
			  }
			});
		}
	});
	(function($){ 
		$.fn.loaddata = function(options) {// Settings
			var settings = $.extend({ 
				data_url   : 'talents_scroll_ajax', //url to PHP page
				start_page   : 2 //initial page
			}, options);

			var el = this; 
			loading  = false; 
			end_record = false;
			//contents(el, settings); //initial data load
		  
			$(window).scroll(function() { //detact scroll
				if($(window).scrollTop() + $(window).height() >= $(document).height()){ //scrolled to bottom of the page
					if($('.talent-summary-view').length){
						contents(el, settings); //load content chunk 					
					}
				}
			});  
		}; 
	 //Ajax load function
	 function contents(el, settings){
	  
		if(loading == false && end_record == false){
			loading = true; //set loading flag on
			$('#talents_loader').show();
			var query = $('#search_text').val();
			var category = [];
			$('a.jstree-clicked').each(function(){
				category.push($(this).attr('id'));
			})
			category = category.join(',');

			var gender = $('#search_gender').val();
			var city = $('#search_city').val();
			var country = $('#search_country').val();
			if(gender===null){
				gender = "";
			}
			
			/* var gender = [];
			$('.search_gender').each(function(){
				if($(this).prop('checked') == true){
					gender.push($(this).val());
				}
			})
			gender = gender.join(','); */
			var eye = [];
			$(".eye_colors .side_bar_li").each(function(){
				if($(this).hasClass('active')){
					eye.push($(this).find(".color-label").text().toLowerCase());
				}
			});
			eye = eye.join(',');
			
			var hair = [];
			$(".hair_colors .side_bar_li").each(function(){
				if($(this).hasClass('active')){
					hair.push($(this).find(".color-label").text().toLowerCase());
				}
			});
			hair = hair.join(',');
			
			var height = $('#search_height').val();
			
			if(height===null){
				height = "";
			}else{
				height = height.join(',');
			}
			//$("#slider-range-height").slider( "values");
			
			
			/* var height = [];
			$('.search_height').each(function(){
				if($(this).prop('checked') == true){
					height.push($(this).val());
				}
			})
			height = height.join(','); */
			
			var weight = $("#slider-range-weight").slider( "values");
			weight = weight.join(',');
			/* var weight = [];
			$('.search_weight').each(function(){
				if($(this).prop('checked') == true){
					weight.push($(this).val());
				}
			})
			weight = weight.join(','); */
			var age = $("#slider-range-age").slider("values");
			age = age.join(',');
			
			//var age = $('#search_age').val();
			if($('#suggested_talents').val() == 1 && query == "" && category == "" && gender == "" && eye == "" && hair == "" && height == "" && weight == "" && age == 0 && city == "" && country == 0){
				category = $('#filter_cat_id').val();
				eye = $('#filter_eye_color').val();
				hair = $('#filter_hair_color').val();
				height = $('#filter_height').val();
				weight = $('#filter_weight').val();
			}
			$.post( settings.data_url, {'page': settings.start_page, 'query':query, 'category':category, 'gender':gender, 'eye':eye, 'hair':hair, 'height':height, 'weight':weight, 'age':age, 'city':city, 'country':country}, function(data1){ //jQuery Ajax post
				 if(data1.trim().length == 0){ //no more records
					if(!$('#no_more_talent').is(':visible')) {
						$('#no_more_talent').show(); //show end record text
					}
					$('#talents_loader').hide(); //remove loading img
					end_record = true; //set end record flag on
					return; //exit
				}
				loading = false;  //set loading flag off
				$('#talents_loader').hide(); //remove loading img 
				
				el.append(data1);  //append content 
				settings.start_page ++; //page increment
			})
		}
	}

	})(jQuery);

	$("#main_talents").loaddata();
/*#############################################################################################################################################*/
	
	//08: updateUserPastSearch
	function updateUserPastSearch(user_id,status){
		FUNCTION_NAME = 'updateUserPastSearchAjax';
		PARAM  = {user_id:user_id,status:status};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
	}
/*#############################################################################################################################################*/

	//09(a): Search submit
	$("#modal-search-input").keypress(function(e) {
		if(e.which == 13) {
		$("#search_submit").click();
		}
	});
/*#############################################################################################################################################*/

	//09(b): Search submit
	$("#search_submit").click(function(){
		var query = $("#modal-search-input").val();
		var root_address = $("#search_action").val();
		var url = root_address+'?query='+query
		if(query != ""){
			location.href = url;
		}
	})
/*#############################################################################################################################################*/
/*------------ Defined Functions <End> ------------*/
	
/******************************************** MODULE 03: SEARCH <END> ***************************************************/

/******************************************** MODULE 04: TALENT BOOKING <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/
/*------------ Function List <Start>-----------------
	01: removeTalent
	02: addJobDetails
------------ Function List <End>-----------------*/

	//01: removeTalent
	function removeTalent(talent_id){
		FUNCTION_NAME = 'removeCartTalentAjax';
		PARAM  = {talent_id:talent_id};
		xajax_MGRequestAjax(FUNCTION_NAME,PARAM);		
	}
/*#############################################################################################################################################*/
	
	//02: addJobDetails
	function addJobDetails(employer_id){
		//clear .errorMsg area
		$('.errorMsgjob').text('');
		var error_flag = false;

		//Getting Values
		var talent_ids = $( "#talent_ids" ).val();
		var job_title = $( "#job_title" ).val();
		var job_category = $( "#job_category" ).val();
		var job_start_date = $( "#job_start_date" ).val();
		var job_end_date = $( "#job_end_date" ).val();
		var job_compensation = $( "#job_compensation" ).val();
		var job_description = $( "#job_description" ).val();
		
		
		var startTime = new Date(job_start_date+' 12:00:00 AM');
		var endTime = new Date(job_end_date+' 12:00:00 AM');
		
		if(talent_ids == "") {
			$('.errorMsgjob').text("Please select atleast one talent");
			error_flag = true;
		}else if(job_title == "") {
			$('.errorMsgjob').text("Please enter job title");
			error_flag = true;
		}else if(job_category == 0) {
			$('.errorMsgjob').text("Please select talent type");
			error_flag = true;
		}else if(job_start_date == "") {
			$('.errorMsgjob').text("Please enter job start date");
			error_flag = true;
		}else if(job_end_date == "") {
			$('.errorMsgjob').text("Please enter job end date");
			error_flag = true;
		}else if(startTime > endTime){
			$('.errorMsgjob').text("Stat date should not be greated than end date");
			error_flag = true;
		}else if(job_compensation == "") {
			$('.errorMsgjob').text("Please enter compensation amount");
			error_flag = true;
		}else if(!validateNumber(job_compensation)) {
			$('.errorMsgjob').text("Please enter valid compensation amount");
			error_flag = true;
		}else if(job_description == "") {
			$('.errorMsgjob').text("Please enter job description");
			error_flag = true;
		}else if(error_flag == false){
			$('#book_talent_button').prop('disabled',true);
			FUNCTION_NAME = 'bookTalentAjax';
			PARAM  = {employer_id:employer_id,talent_ids:talent_ids,job_title:job_title,job_category:job_category,job_start_date:job_start_date,job_end_date:job_end_date,job_compensation:job_compensation,job_description:job_description};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}
	}
/*#############################################################################################################################################*/
/*------------ Defined Functions <End> ------------*/
	
/******************************************** MODULE 04: TALENT BOOKING <END> ***************************************************/
/******************************************** MODULE 05: CONTACT PAGE <START> ***************************************************/

/*------------ Defined Functions <Start> ------------*/

/*------------ Function List <Start>-----------------
		01: contactEmail
------------ Function List <End>-----------------*/
	//01: contactEmail
	function contactEmail(){
		//clear .errorMsg area
		$('#contactForm .errorMsg').text('');
		$('#contactForm input').removeClass('invalid');
		$('#contactForm #query_type').removeClass('invalid');
		$('#contactForm textarea').removeClass('invalid');
		//get form values
		var contact_name = $('#contactForm input[name=name]').val();
		var contact_email = $('#contactForm input[name=email]').val();
		//var contact_phone = $('#contactForm input[name=contact_phone]').val();
		var contact_subject = $('#contactForm input[name=subject]').val();
		var contact_message = $('#contactForm textarea[name=message]').val();
		var query_type = $('#contactForm #query_type option:selected').val();
		var error_flag = false;
		
		/*---------------------FORM VALIDATIONS <START>---------------------*/
		//validate email address
		if (!contact_name) {
			$('#contactForm .errorMsg').text('Name is required');
			$('#contactForm input[name=name]').addClass('invalid');
			error_flag = true;		
		} else if (!contact_email) {
			$('#contactForm .errorMsg').text('Email is required');
			$('#contactForm input[name=email]').addClass('invalid');
			error_flag = true;		
		} else if( !validateEmail(contact_email)){
			$('#contactForm .errorMsg').text('Please enter a valid email address');
			$('#contactForm input[name=email]').addClass('invalid');
			error_flag = true;
		} else if (!contact_subject) {
			$('#contactForm .errorMsg').text('Subject is required');
			$('#contactForm input[name=subject]').addClass('invalid');
			error_flag = true;
		} else if (query_type==0) {
			$('#contactForm .errorMsg').text('Please select purpose for contacting us');
			$('#contactForm #query_type').addClass('invalid');
			error_flag = true;
		} else if (!contact_message) {
			$('#contactForm .errorMsg').text('Message is required');
			$('#contactForm textarea[name=message]').addClass('invalid');
			error_flag = true;
		}
		/*---------------------FORM VALIDATIONS <END>---------------------*/
		
		//submit form
		else if(error_flag == false) {
			FUNCTION_NAME = 'sendEmailAjax';
			PARAM  = {contact_name:contact_name,contact_email:contact_email,contact_subject:contact_subject,contact_message:contact_message,query_type:query_type};
			xajax_MGRequestAjax(FUNCTION_NAME,PARAM);
		}		
	}
	var i=0;

	function add_another() {
		// if(i < 3) {
			i++;
		$(".app").append('</div><div class="breaker" style="width: 98%;"></div><div class="repeatable-block del"><div class="del_div">x</div><div class="form-row"> <div class="col"><div class="form-group"><label for="service-required">Service Required</label><select class="js-example-basic-single form-control service-required" id="service-required" aria-describedby="service-required-help" required><option value="1" >Photography</option><option value="2" >Catering</option><option value="3" >Music</option><option value="4" >Food Truck</option><option value="5">Interior Design</option><option value="6" >Lighting</option></select></div></div></div><div class="form-row"><div class="col"><div class="form-group "><label for="estimated-budget">Estimated Budget ($)</label><input type="text" class="form-control budget" id="estimated-budget" aria-describedby="estimated-budget-help" placeholder="" required /></div></div></div></div>');
			
		// }
	}

	// function dell() {
	// 	$(this).parents('.repeatable-block.del').remove();
	// }
	$("body").on("click",".del_div",function(e){
		$(this).parents('.repeatable-block.del').prev('.breaker').remove();
		$(this).parents('.repeatable-block.del').remove();
		
	});


	// $(document).ready(function() {
	// 	$('.del_div').on('click', function(){
	// 		$(this).parents('.repeatable-block.del').remove();
	// 	});
	// });

	$('.applicant-info').css('cursor', 'pointer');
	function service_provider_portfolio(id) {
		var root_address = $(".applicant-info").attr('url');
		var url = root_address+'?sp='+id;
		if(url != ""){
			location.href = url;
		}
	}





	$('.event-planner-form-link').click(function(){
		$('.plaany-signup-welcome').hide();
		$('.event-planner-welcome').show();
	});
	$('.service-provider-form-link').click(function(){
		$('.plaany-signup-welcome').hide();
		$('.service-provider-welcome').show();
	});
	$('.back-to-choose-account-link').click(function(){
		$('.plaany-signup-welcome').hide();
		$('.welcome-to-plaany').show();
	});


	$(document).ready(function() {
    setTimeout(function() {
			$(".accordion:not('.accordion-on-mbl') > .card:first-child .card-header h2 > a").trigger('click');
    },10);
	});
/*#############################################################################################################################################*/
/*------------ Defined Functions <End> ------------*/
/******************************************** MODULE 05: CONTACT PAGE <END> ***************************************************/
/* End of file script.js */
/* Location: ./application/assets/frontend/js/script.js */