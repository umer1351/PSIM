<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(isset($_SERVER['HTTPS'])){
	$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else{
	$protocol = 'http';
}

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| DIRECTORY STRUCTURE <Start>
|--------------------------------------------------------------------------
*/
$PROJECT_URL = str_replace("index.php","",$_SERVER['PHP_SELF']);


if($_SERVER['HTTP_HOST']=="localhost:8080") {
	
	define('SERVER_NAME',	$protocol.'://'.$_SERVER['SERVER_NAME'].':8080'.$PROJECT_URL);
	
	define('ASSET_FRONTEND_UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].$PROJECT_URL.'assets/frontend/uploads/');
	define('ASSET_BACKEND_UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].$PROJECT_URL.'assets/backend/uploads/');
		define('ASSET_BACKEND_PAGE_UPLOADS', $_SERVER['DOCUMENT_ROOT'].$PROJECT_URL.'assets/frontend/img/');

}else {
	define('SERVER_NAME',	$protocol.'://'.$_SERVER['SERVER_NAME'].$PROJECT_URL);


	define('ASSET_FRONTEND_UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].$PROJECT_URL.'assets/frontend/uploads/');
	// define('ASSET_FRONTEND_UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/frontend/uploads/');
	define('ASSET_BACKEND_UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/backend/uploads/');
		define('ASSET_BACKEND_PAGE_UPLOADS', $_SERVER['DOCUMENT_ROOT'].$PROJECT_URL.'assets/frontend/img/');
}

define('ROOT_DIRECTORY',$_SERVER['DOCUMENT_ROOT'].$PROJECT_URL);
//Frontend
define('ASSET_FRONTEND_DIR',				SERVER_NAME. 'assets/frontend/'); 
define('ASSET_FRONTEND',				SERVER_NAME. 'assets/frontend/'); 
define('ASSET_CSS_FRONTEND_DIR',			ASSET_FRONTEND_DIR.'css/');
define('FRONTEND_ASSET_IMAGES_DIR',			ASSET_FRONTEND_DIR.'images/');
define('ASSET_JS_FRONTEND_DIR',		    	ASSET_FRONTEND_DIR.'js/');
define('ASSET_UPLOADS_FRONTEND_DIR',		ASSET_FRONTEND_DIR.'uploads/');
define('ASSET_USERS_UPLOADS_FRONTEND_DIR',		ASSET_FRONTEND_DIR.'uploads/profile/');
define('ASSET_USERS_UPLOADS_FRONTEND_DIR_PORTFOLIO',		ASSET_FRONTEND_DIR.'uploads/portfolio/');

//Backend
define('ASSET_BACKEND_DIR',				SERVER_NAME. 'assets/backend/'); 
define('ASSET_CSS_BACKEND_DIR',			ASSET_BACKEND_DIR.'css/');
define('ASSET_IMAGES_BACKEND_DIR',			ASSET_BACKEND_DIR.'img/');
define('ASSET_JS_BACKEND_DIR',		    	ASSET_BACKEND_DIR.'js/');
define('ASSET_UPLOADS_BACKEND_DIR',		ASSET_BACKEND_DIR.'uploads/');
define('ASSET_USERS_UPLOADS_BACKEND_DIR',		ASSET_BACKEND_DIR.'uploads/users/');
define('ASSET_GENERIC_UPLOADS_BACKEND_DIR',		ASSET_BACKEND_DIR.'uploads/generic/');

/*
|--------------------------------------------------------------------------
| DIRECTORY STRUCTURE <End>
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| FACEBOOK <Start>
|--------------------------------------------------------------------------
*/


if($_SERVER['HTTP_HOST']=="localhost") {
	define('FB_APP_ID',	'180464855850664');
	define('FB_SECRET_KEY', 'd7d97c90ed52a663cccc21b200d25fc5');
}else {
	define('FB_APP_ID',	'180464855850664');
	define('FB_SECRET_KEY', 'd7d97c90ed52a663cccc21b200d25fc5');
    
}
define('FB_COOKIE', true);
define('SERVER_PATH', '');
define('FB__PAGE_URL', '');
define('FB_APP_PATH', FB__PAGE_URL."?sk=app_".FB_APP_ID);
define('FB_APP_TERMS_AND_CONDITIONS_URL', '');
//Re-Direct URLs
define('REGISTRATION_URL', SERVER_NAME.'login');
define('LOGOUT_URL', SERVER_NAME);

define('FB_APP_CANCEL_URL', 'https://www.facebook.com/');
define('FB_APP_REQUEST_PERMISSIONS', '');
define('FB_BASE_URL', "https://www.facebook.com/");

/*
|--------------------------------------------------------------------------
| FACEBOOK <End>
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| MAILGUN <Start>
|--------------------------------------------------------------------------
*/
define('MAILGUN_API_KEY', 'key-e3375ef5b386b9c24e5349f6de243c85');
/*
|--------------------------------------------------------------------------
| MAILGUN <End>
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| PAGINATION <Start>
|--------------------------------------------------------------------------
*/

define('ROWS_PER_PAGE', 12);
define('DASHBOARD_ROWS_PER_PAGE', 20);

/*
|--------------------------------------------------------------------------
| PAGINATION <End>
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| GENERIC <Start>
|--------------------------------------------------------------------------
*/

//WEBSITE MODE
if($_SERVER['HTTP_HOST']=="localhost") {
	define('WEBSITE_MODE',	'dev');
}else {
	define('WEBSITE_MODE',	'live');    
}

//SEARCH COUNT
define('MIN_SEARCH_FILTER_COUNT', '20');

//YOUTUBE CREDENTIALS 
define('YOUTUBE_EDIT_LINK','https://www.youtube.com/edit?video_id=');
define('YOUTUBE_VIEW_LINK','https://www.youtube.com/watch?v=');
define('YOUTUBE_CLIENT_ID','330848020969-978820tcjeb7me320m1pfh0o60mkpv25.apps.googleusercontent.com');
define('YOUTUBE_CLIENT_SECRET','pk5_ahr77feB_DLeLiQkZbv1');

//define('YOUTUBE_CLIENT_ID','988649479421-jp9qm0cjkj7m9kpdcvdm1nosk8o3otra.apps.googleusercontent.com');
//define('YOUTUBE_CLIENT_SECRET','LFJNuN2iq08ci8YeVpq7Inys');

//2CO CREDENTIALS 
define('TWO_CO_PRIVATE_KEY','24FCF6D4-4750-40F3-8033-CF6CFB30444B');
define('TWO_CO_PUBLISHABLE_KEY','A170A0AC-4CCC-4E0E-9BB3-BB1A3AD3E996');
define('TWO_CO_SELLER_ID','203549105');

//PAGE IDS
define('TERMS_CONDITIONS_ID', '1');
define('PRIVACY_POLICY_ID','2');
define('FAQS_ID', '3');
define('HOW_IT_WORKS_ID','6');
define('ABOUT_US','7');
define('HOMEPAGE','8');
define('HOMEPAGE_HISTORY','1');
define('HOMEPAGE_CASTING','2');
define('CONTACT_US','9');
define('SOCIAL_LINKS','10');

//WEBSITE
define('WEBSITE_NAME', 'Plaany');
define('WEBSITE_TITLE', 'Plaany');
define('WEBSITE_URL', 'Plaany.com');
define('WEBSITE_COOKIE', 'wowzer-auth');
define('WEBSITE_BACKEND_COOKIE', 'wowzer-bacnkend-auth');
define('WEBSITE_FRONTEND_SESSION', 'wowzer-frontend-id');
define('WEBSITE_CART_SESSION', 'wowzer-cart-id');
define('WEBSITE_BACKEND_SESSION', 'wowzer-backend-id');
define('WEBSITE_LOGO', FRONTEND_ASSET_IMAGES_DIR.'website-logo.png');

//FIELD TYPES
define('FIELD_TYPE_TEXT', '1');
define('FIELD_TYPE_TEXTAREA','2');
define('FIELD_TYPE_DROPDOWN', '3');
define('FIELD_TYPES',serialize (array (1=>"Text",2=>"Textarea",3=>"Dropdown")));

define('FIELD_VALIDATION_TYPE_EMAIL', '1');
define('FIELD_VALIDATION_TYPE_NUMBER','2');
define('FIELD_VALIDATION_TYPE_URL', '3');
define('FIELD_VALIDATIONS',serialize (array (1=>"email",2=>"number",3=>"url")));

//ENCRYPTION KEY
define('ENCRYPTION_KEY', 'OMT_9345');

//MEDIA TYPES
define('MEDIA_IMAGE', '1');
define('MEDIA_VIDEO', '2');

//STATUS IDS
define('DRAFT_STATUS_ID', '3');

define('REJECTED_STATUS_ID', '0');
define('APPROVED_STATUS_ID', '1');
define('DELETED_STATUS_ID', '2');
define('PENDING_STATUS_ID', '3');
define('DISABLED_STATUS_ID', '4');
define('SUSPENDED_STATUS_ID', '5');

define('FEATURED_STATUS_ID', '1');

define('PENDING_COUPON_STATUS_ID', '1');
define('AVAILED_COUPON_STATUS_ID', '2');
define('EXPIRED_COUPON_STATUS_ID', '3');

//USER STATUS IDS
define('ACTIVE_STATUS_ID', '1');
define('INACTIVE_STATUS_ID', '0');

//JOB STATUSES
define('PENDING_STATUS', '2');
define('PENDING_JOB_STATUS_ID', '0');
define('SCHEDULED_JOB_STATUS_ID', '1');
define('CANCEL_JOB_STATUS_ID', '2');
define('NEGOTIATION_JOB_STATUS_ID', '3');
define('COMPLETED_JOB_STATUS_ID', '4');
define('JOB_STATUSES',serialize (array (0=>"Pending",1=>"Scheduled",2=>"Canceled",3=>"Negotiation",4=>"Completed")));
define('JOB_STATUSES_COLORS',serialize (array (0=>"blue",1=>"yellow",2=>"red",3=>"grey",4=>"green")));

//USER ROLES
define('ROLES',serialize (array (1=>"Employer",2=>"Talent")));

//PAYMENT STATUSES
define('PENDING_PAYMENT_STATUS_ID', '0');
define('APPROVED_PAYMENT_STATUS_ID', '1');
define('REJECTED_PAYMENT_STATUS_ID', '2');

//REVIEW STATUSES
define('PENDING_REVIEW_STATUS_ID', '0');
define('APPROVED_REVIEW_STATUS_ID', '1');
define('REJECTED_REVIEW_STATUS_ID', '2');
define('REVIEW_STATUSES',serialize (array (0=>"Pending",1=>"Approve",2=>"Reject")));
define('REVIEW_STATUSES_COLORS',serialize (array (0=>"blue",1=>"green",2=>"red")));

//TALENT JOB ENGAGEMENT STATUSES
define('PENDING_TALENT_JOB_STATUS_ID', '0');
define('APPROVED_TALENT_JOB_STATUS_ID', '1');
define('REJECTED_TALENT_JOB_STATUS_ID', '2');
define('TALENT_JOB_AVAILABILITY_STATUSES',serialize (array (0=>"Pending",1=>"Approved",2=>"Rejected")));

//TALENT PAYEMTN STATUSES
define('PAID_PAYMENT_STATUS_ID', '1');
define('NOT_PAID_PAYMENT_STATUS_ID', '2');
define('TALENT_PAYMENT_STATUSES',serialize (array (1=>"Paid",2=>"Not Paid")));
define('TALENT_PAYMENT_STATUSES_COLORS',serialize (array (1=>"green",2=>"red")));

//TALENT RESPONSE STATUSES
define('TALENT_JOB_PENDING_STATUS_ID', '0');
define('TALENT_JOB_APPROVED_STATUS_ID', '1');
define('TALENT_JOB_REMOVED_STATUS_ID', '2');
define('TALENT_JOB_STATUSES',serialize (array (0=>"Pending",1=>"Approve",2=>"Remove")));
define('TALENT_JOB_STATUSES_COLORS',serialize (array (0=>"blue",1=>"green",2=>"red")));

//TALENT VIDEO DELETE STATUS
define('TALENT_DELETED_VIDEO_STATUS_ID', '3');

//VIDEO STATUSES
define('PENDING_VIDEO_STATUS_ID', '0');
define('APPROVED_VIDEO_STATUS_ID', '1');
define('REJECTED_VIDEO_STATUS_ID', '2');

//YOUTUBE STATUSES
define('PRIVATE_YOUTUBE_STATUS_ID', '0');
define('PUBLIC_YOUTUBE_STATUS_ID', '1');
define('DUPLICATE_YOUTUBE_STATUS_ID', '2');
define('DELETED_YOUTUBE_STATUS_ID', '3');

//GENERAL STATUSES
define('NO', '0');
define('YES', '1');

define('NOT_FOUND', '0');
		

//PAYMENT METHODS
define('PAYMENT_METHODS',serialize (array (1=>"Easypaisa",2=>"Bank",3=>"TCS (cod)",4=>"Credit Card")));
define('PAYMENT_METHOD_CCARD','4');

//DISCOUNT TYPES
define('DISCOUNT_TYPES',serialize (array (1=>"Percentage",2=>"Fixed Amount")));
define('DISCOUNT_TYPE_PERCENTAGE','1');
define('DISCOUNT_TYPES_AMOUNT','2');

//TRANSACTION STATUSES
define('TRANSACTION_STATUSES',serialize (array (0=>"Pending",1=>"Completed",2=>"Rejected")));

//AD STATUSES
define('PENDING_AD_STATUS','0');
define('APPROVED_AD_STATUS','1');
define('REJECTED_AD_STATUS','2');

//AD STATUSES ARRAY
define('AD_STATUS',serialize (array (0=>"Pending",1=>"Approved",2=>"Rejected")));

//AD COLOR STATUSES
define('AD_COLOR_STATUS',serialize (array (0=>"blue",1=>"green",2=>"red")));

//AD STATUSES LABELS COLORS CLASSES
define('AD_COLOR_LABEL_STATUS',serialize (array (0=>"info",1=>"success",2=>"danger")));

//CONTACT MESSAGE TYPE
define('CONTACT_MESSAGE_TYPE',serialize (array (1=>"Talent",2=>"Marketing",3=>"General Query")));
define('TALENT','1');
define('MARKETING','2');
define('GENERAL_QUERY','3');

//ACCOUNT TYPE
define('EMAIL_ACCOUNT_TYPE', '1');
define('FACEBOOK_ACCOUNT_TYPE', '2');

//TESTING LOGIN EMAIL
//define('ADMIN_EMAIL', 'zohaib@appstersinc.com');
define('ADMIN_EMAIL', 'umer.rehman996@gmail.com');
define('NO_REPLY', 'no-reply@psim.com');
define('CONTACT_EMAIL', 'info@psim.com');

//USER ROLES
define('USER_SERVICE_PROVIDER', '3');
define('USER_ORGANIZER', '2');

//ADS DIMENSIONS 
define('SQUARE_250_250', '15');
define('M_RECTANGLE_300_250', '1');
define('HALF_PAGE_300_600', '4');

//TITLES
define('TITLES',serialize (array (1=>"Mr",2=>"Mrs",3=>"Miss",4=>"Ms",5=>"Dr")));

//GENDER
define('MALE', '1');
define('FEMALE', '2');

//ITEMS PER ROW
define('ITEMS_PER_ROW','24');

//PASSWORD LENGTHS 
define('RANDOM_CODE_LENGTH',6);
define('MIN_PASSWORD_LENGTH', 6);
/*
|--------------------------------------------------------------------------
| GENERIC <End>
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| ROUTES <Start> FRONT-END
|--------------------------------------------------------------------------
*/


/*HOMEPAGE MODULE ROUTES START*/
define('SERVER_URL', SERVER_NAME);
/*HOMEPAGE MODULE ROUTES END*/

/*LOGIN ROUTES START */
define('ROUTE_LOGIN', SERVER_URL.'sign-in');
define('ROUTE_REGISTER', SERVER_URL.'sign-up');
define('ROUTE_FORGOT_PASSWORD', SERVER_URL.'forgot-password');
define('ROUTE_FIRST_LOGIN', SERVER_URL.'verification');
define('ROUTE_ACCOUNT_DELETE', SERVER_URL.'delete-account');
define('ROUTE_THANKYOU_JOIN', SERVER_URL.'welcome-user');  
/*LOGIN ROUTES <END>

/*PROFILE ROUTES START */
define('ROUTE_BYE_PAGE', SERVER_URL.'account-deleted');
define('ROUTE_PROFILE', SERVER_URL.'edit-profile');
define('ROUTE_EMPLOYER_BOOKMARKS', SERVER_URL.'my-favourites');
define('ROUTE_EMPLOYER_PROFILE_TALENT_BOOKING', SERVER_URL.'book-talent');
define('ROUTE_EMPLOYER_JOBS', SERVER_URL.'employer-jobs');
define('ROUTE_EMPLOYER_JOB_DETAIL', SERVER_URL.'employer-job-detail');
define('EMLOYER_MENU_EDIT_ACCOUNT', '1');
define('EMLOYER_MENU_FAVOURITES', '2');
define('EMLOYER_MENU_JOBS', '3');
define('EMLOYER_MENU_BOOK_TALENT', '4');

define('ROUTE_TALENT_JOB_DETAIL', SERVER_URL.'talent-job-detail');
define('ROUTE_TALENT_JOBS', SERVER_URL.'talent-jobs');
define('ROUTE_TALENT_PUBLIC_PROFILE', SERVER_URL.'public-profile');
define('ROUTE_TALENT_PAYMENT', SERVER_URL.'my-payments');
define('ROUTE_TALENT_PAYMENT_HISTORY', SERVER_URL.'payment-history');
define('ROUTE_TALENT_SCHEDULE', SERVER_URL.'my-schedule');
define('ROUTE_TALENT_PORTFOLIO', SERVER_URL.'my-portfolio');
define('ROUTE_CHANGE_PASSWORD', SERVER_URL.'change-password');
define('TALENT_MENU_EDIT_ACCOUNT', '1');
define('TALENT_MENU_PUBLIC_PROFILE', '2');
define('TALENT_MENU_PAYMENTS', '3');
define('TALENT_MENU_PORTFOLIO', '4');
define('TALENT_MENU_SCHEDULE', '5');
define('TALENT_MENU_JOBS', '6');
define('TOP_CONTENT_SECTION', '1');
define('MIDDLE_CONTENT_SECTION', '2');
define('BOTTOM_CONTENT_SECTION', '3');
define('ROUTE_EVENT_DETAILS', SERVER_URL.'event-details');
define('ROUTE_EVENT_VIEW_OFFER', 'event-offers');


/*PROFILE ROUTES <END>

/*TALENT MODULE START*/
define('ROUTE_PORTFOLIO_DETAIL', SERVER_URL.'profile');
/*TALENT MODULE END*/

/*SEARCH MODULE START*/
define('ROUTE_TALENT_SEARCH_LISTING', SERVER_URL.'talents');
/*SEARCH MODULE END*/

/*PAGES MODULE START*/
define('ROUTE_ABOUT_US', SERVER_URL.'who-we-are');
define('ROUTE_CONTACT_US', SERVER_URL.'contact');
define('ROUTE_PRIVACY_POLICY', SERVER_URL.'privacy-policy');
define('ROUTE_TERMS_AND_CONDITIONS', SERVER_URL.'welcome');
define('ROUTE_TERMS_CONDITIONS', SERVER_URL.'terms-and-conditions');
define('ROUTE_PRICING', SERVER_URL.'pricing');
define('ROUTE_FAQS', SERVER_URL.'frequently-asked-questions');
define('ROUTE_PRICE_PLANS', SERVER_URL.'price-plans');
define('ROUTE_OUR_TEAM', SERVER_URL.'our-team');
define('ROUTE_CONTACT', SERVER_URL.'contact-us');
define('ROUTE_SERVICE_PROVIDER_DETAL', SERVER_URL.'service-provider-details');

define('ROUTE_MESSAGE', SERVER_URL.'messages');
define('ROUTE_MESSAGE_DETAILS', SERVER_URL.'message-details');

/*PAGES MODULE END*/

/*ERROR MODULE START*/
define('ROUTE_ERROR_PAGE', SERVER_URL.'error');
/*ERROR MODULE END*/

/*
|--------------------------------------------------------------------------
| ROUTES <End> FRONT-END
|--------------------------------------------------------------------------
*/


/*


/*
|--------------------------------------------------------------------------
| ROUTES <Start> BACK-END
|--------------------------------------------------------------------------
*/

/*LOGIN MODULE ROUTES START*/
define('BACKEND_SERVER_URL', SERVER_URL.'admin6y34q/');
/*LOGIN MODULE ROUTES END*/

/*USER MODULE ROUTES START*/
define('BACKEND_DASHBOARD_URL', BACKEND_SERVER_URL.'dashboard');
define('BACKEND_USERS_URL', BACKEND_SERVER_URL.'users');
define('BACKEND_TALENT_URL', BACKEND_SERVER_URL.'talent');
define('BACKEND_SERVICE_PROVIDER_URL', BACKEND_SERVER_URL.'service-provider');
define('BACKEND_EVENT_ORGANIZER_URL', BACKEND_SERVER_URL.'event-organizer');
define('BACKEND_SERVICE_PROVIDER_DETAIL_URL', BACKEND_SERVER_URL.'service-provider-detail');
define('BACKEND_EVENT_ORGANIZER_DETAIL_URL', BACKEND_SERVER_URL.'event-organizer-detail');
define('BACKEND_TALENT_DETAIL_URL', BACKEND_SERVER_URL.'talent-detail');
define('BACKEND_EMPLOYEE_URL', BACKEND_SERVER_URL.'employee');
define('BACKEND_EMPLOYEE_DETAIL_URL', BACKEND_SERVER_URL.'employee-detail');
define('BACKEND_EDIT_USER_URL', BACKEND_SERVER_URL.'edit-user');
define('BACKEND_PRIVACY_POLICY_PAGE_EDIT', BACKEND_SERVER_URL.'privacy-policy');
define('BACKEND_EVENTS_EDIT', BACKEND_SERVER_URL.'events-edit');


/*USER MODULE ROUTES END*/

/*AD MODULE ROUTES START*/
define('BACKEND_ADS_URL', BACKEND_SERVER_URL.'ads');
define('BACKEND_NEW_AD_URL', BACKEND_SERVER_URL.'new-ad');
define('BACKEND_EDIT_AD_URL', BACKEND_SERVER_URL.'edit-ad');
define('BACKEND_YOUTUBE_ADS_URL', BACKEND_SERVER_URL.'youtube-ads');
/*AD MODULE ROUTES END*/

/*CATEGORIES MODULE ROUTES START*/
define('BACKEND_CATEGORIES_URL', BACKEND_SERVER_URL.'categories');
define('BACKEND_ADD_CATEGORY_URL', BACKEND_SERVER_URL.'add-category');
define('BACKEND_EDIT_CATEGORY_URL', BACKEND_SERVER_URL.'edit-category');
/*CATEGORIES MODULE ROUTES END*/

/*JOBS MODULE ROUTES START*/
define('BACKEND_JOBS_URL', BACKEND_SERVER_URL.'jobs');
define('BACKEND_EDIT_JOB_URL', BACKEND_SERVER_URL.'edit-job');
define('BACKEND_ADD_JOB_URL', BACKEND_SERVER_URL.'add-job');
/*JOBS MODULE ROUTES END*/

/*TRANSACTION MODULE ROUTES START*/
define('BACKEND_TRANSACTIONS_URL', BACKEND_SERVER_URL.'transactions');
define('BACKEND_TRANSACTION_DETAIL_URL', BACKEND_SERVER_URL.'transaction-detail');
/*TRANSACTION MODULE ROUTES END*/

/*PAYMENT MODULE ROUTES START*/
define('BACKEND_PAYMENT_PACKAGES_URL', BACKEND_SERVER_URL.'price-packages');
define('BACKEND_ADD_PAYMENT_PACKAGE_URL', BACKEND_SERVER_URL.'add-price-package');
define('BACKEND_EDIT_PAYMENT_PACKAGE_URL', BACKEND_SERVER_URL.'edit-price-package');
define('BACKEND_COUPON_URL', BACKEND_SERVER_URL.'coupon-codes');
define('BACKEND_ADD_COUPON_URL', BACKEND_SERVER_URL.'add-coupon');
define('BACKEND_EDIT_COUPON_URL', BACKEND_SERVER_URL.'edit-coupon'); 
define('BACKEND_COUPON_DETAIL_URL', BACKEND_SERVER_URL.'coupon-details');
/*PAYMENT MODULE ROUTES END*/

/*PROFILE MODULE ROUTES START*/
define('BACKEND_CHANGE_PASSWORD_URL', BACKEND_SERVER_URL.'change-password');
define('BACKEND_EDIT_PROFILE_URL', BACKEND_SERVER_URL.'edit-profile');
/*PROFILE MODULE ROUTES END*/

/*PAGES MODULE START*/
define('BACKEND_PAGES_URL', BACKEND_SERVER_URL.'static-page');
define('BACKEND_FAQ_PAGES_URL', BACKEND_SERVER_URL.'faq-page');
define('BACKEND_SETTINGS_URL', BACKEND_SERVER_URL.'settings');
define('BACKEND_TALENT_SETTINGS_URL', BACKEND_SERVER_URL.'talent-settings');
define('BACKEND_CONTACT_US_URL', BACKEND_SERVER_URL.'contact-us');

define('BACKEND_HOMESLIDER_URL', BACKEND_SERVER_URL.'home-slider');
define('BACKEND_ADD_HOMESLIDE_URL', BACKEND_SERVER_URL.'add-home-slide');
define('BACKEND_EDIT_HOMESLIDE_URL', BACKEND_SERVER_URL.'edit-home-slide');
define('BACKEND_HOME_ABOUT_SECTIONS', BACKEND_SERVER_URL.'home-about-sections');
define('BACKEND_EDIT_ABOUT_SECTIONS', BACKEND_SERVER_URL.'edit-about-sections');
define('BACKEND_ABOUT_SECTIONS', BACKEND_SERVER_URL.'about-us');
define('BACKEND_EDIT_ABOUT_US', BACKEND_SERVER_URL.'edit-about-us');
define('BACKEND_OUR_TEAM_URL', BACKEND_SERVER_URL.'our-team');
define('BACKEND_ADD_TEAM_MEMBER_URL', BACKEND_SERVER_URL.'add-team-member');
define('BACKEND_EDIT_TEAM_MEMBER_URL', BACKEND_SERVER_URL.'edit-team-member');

define('BACKEND_HOME_PAGE_SECTIONS', BACKEND_SERVER_URL.'home-page-sections');
define('BACKEND_HOME_PAGE_EDIT', BACKEND_SERVER_URL.'home-page-edit');
define('BACKEND_EDIT_HOME_SECTIONS', BACKEND_SERVER_URL.'home-page-sections');
define('BACKEND_TERMS_AND_CONDITIONS_PAGE_EDIT', BACKEND_SERVER_URL.'terms-and-conditions-edit');
define('BACKEND_FAQ_EDIT', BACKEND_SERVER_URL.'faq-edit');
define('BACKEND_PRICING_EDIT', BACKEND_SERVER_URL.'pricing-edit');
define('BACKEND_CONTACT_EDIT', BACKEND_SERVER_URL.'contact-edit');
define('BACKEND_EVENT_DETAIL', BACKEND_SERVER_URL.'event-detail');

/*PAGES MODULE END*/
/*rtfolioPo MODULE START*/
define('ROUTE_SERVICE_PROVIDER_PORTFOLIO', SERVER_URL.'service-provider');
define('ROUTE_PREMIUM_MEMBERSHIP', SERVER_URL.'premium-membership');

define('ROUTE_SERVICE_PROVIDER_JOB_BOARD', SERVER_URL.'service-provider-job-board');

define('ROUTE_SERVICE_PROVIDER_JOB_DETAIL', SERVER_URL.'service-provider-job-detail');

define('ROUTE_SERVICE_PROVIDER_JOB_OFFER', SERVER_URL.'service-provider-job-offer');

define('ROUTE_SERVICE_PROVIDER_EVENT', SERVER_URL.'service-provider-event');

define('ROUTE_EVENT_PROVIDER_EVENT', SERVER_URL.'event-provider-event');

define('ROUTE_SERVICE_PROVIDER_FETCH', SERVER_URL.'service-provider-fetch-job');

define('ROUTE_CREATE_EVENT', SERVER_URL.'create-event');
define('ROUTE_EVENT_DETAILS_SP', SERVER_URL.'event-details-sp');

define('ROUTE_TRANSACTION', SERVER_URL.'transactions');

define('ROUTE_LINK_EXPIRE', SERVER_URL.'link-expired');
/*
|--------------------------------------------------------------------------
| ROUTES <End> BACK-END
|--------------------------------------------------------------------------
*/


//hamza

define('BACKEND_GO_PRO_URL', BACKEND_SERVER_URL.'get-go-pro');
define('BACKEND_PROCESS_PAYMENT_URL', BACKEND_SERVER_URL.'process-payment');
define('BACKEND_COMMISSION_DETAIL', BACKEND_SERVER_URL.'commision-detail');
define('ROUTE_EVENT_REVIEW_SP', SERVER_URL.'event-review-sp');
define('ROUTE_EVENT_REVIEW_DETAILS', SERVER_URL.'event-review-sp-detail');
define('ROUTE_SERVICE_REVIEW_EM', SERVER_URL.'serviceProvider-review-em');
define('ROUTE_SP_REVIEW_DETAILS', SERVER_URL.'serviceProvider-review-em-detail');
define('ROUTE_EM_TRANSACTIONS', SERVER_URL.'event-transactions');
define('ROUTE_Sp_TRANSACTIONS', SERVER_URL.'service-provider-transactions');
define('BACKEND_CONTACT_QUERIES', BACKEND_SERVER_URL.'contact-queries');
define('BACKEND_REVIEW_LIST', BACKEND_SERVER_URL.'review-list');
define('BACKEND_COMMISSION_SETTING', BACKEND_SERVER_URL.'comission-settings');


define('BACKEND_EXAMS_EDIT', BACKEND_SERVER_URL.'exams-edit');
define('BACKEND_ADD_EXAMS_URL', BACKEND_SERVER_URL.'exams-add');
define('BACKEND_EDIT_EXAMS', BACKEND_SERVER_URL.'edit-exams-listing');
define('BACKEND_EXAMS_DETAILS_ADD', BACKEND_SERVER_URL.'add-exams-details');
define('BACKEND_EXAMS_MEDIA_ADD', BACKEND_SERVER_URL.'add-exams-media');
define('BACKEND_ACADEMIC_MEDIA_ADD', BACKEND_SERVER_URL.'add-academic-media');
define('BACKEND_EXAMS_DETAILS_EDIT', BACKEND_SERVER_URL.'edit-exams-details');
define('BACKEND_EXAMS_MEDIA_AJAX', BACKEND_SERVER_URL.'add-exams-media-ajax');



define('BACKEND_EXAMS_VIDEOS_AJAX', BACKEND_SERVER_URL.'add-exams-videos-ajax');
define('BACKEND_ACADEMIC_MEDIA_AJAX', BACKEND_SERVER_URL.'add-academic-media-ajax');
define('BACKEND_ACADEMIC_POSTER_AJAX', BACKEND_SERVER_URL.'add-academic-poster-ajax');

define('BACKEND_EDIT_ACADEMIC', BACKEND_SERVER_URL.'academic-add');
define('BACKEND_ADD_ACADEMIC_URL', BACKEND_SERVER_URL.'academic-add');
define('BACKEND_ACADEMIC_LISTING', BACKEND_SERVER_URL.'academic-initiatives');
define('BACKEND_ACADEMIC_DETAILS_ADD', BACKEND_SERVER_URL.'add-academic-details');
define('BACKEND_ACADEMIC_DETAILS_EDIT', BACKEND_SERVER_URL.'edit-academic-details');

define('BACKEND_EDIT_INTERVENTION', BACKEND_SERVER_URL.'intervention-add');
define('BACKEND_ADD_INTERVENTION_URL', BACKEND_SERVER_URL.'intervention-add');
define('BACKEND_INTERVENTION', BACKEND_SERVER_URL.'intervention');

define('BACKEND_EDIT_PHYSICIAN', BACKEND_SERVER_URL.'physian-add');
define('BACKEND_ADD_PHYSICIAN_URL', BACKEND_SERVER_URL.'physian-add');
define('BACKEND_PHYSICIAN', BACKEND_SERVER_URL.'physian');

define('BACKEND_EDIT_PARTNERS', BACKEND_SERVER_URL.'partners-add');
define('BACKEND_ADD_PARTNERS_URL', BACKEND_SERVER_URL.'partners-add');
define('BACKEND_PARTNERS', BACKEND_SERVER_URL.'partners');

define('BACKEND_EDIT_FELLOWSHIPS', BACKEND_SERVER_URL.'fellowship-add');
define('BACKEND_ADD_FELLOWSHIPS_URL', BACKEND_SERVER_URL.'fellowship-add');
define('BACKEND_FELLOWSHIPS', BACKEND_SERVER_URL.'fellowship');
define('BACKEND_FELLOWSHIPS_DETAILS_ADD', BACKEND_SERVER_URL.'add-fellowship-details');
define('BACKEND_FELLOWSHIPS_MEDIA_ADD', BACKEND_SERVER_URL.'add-fellowship-media'); 
define('BACKEND_FELLOWSHIPS_DETAILS_EDIT', BACKEND_SERVER_URL.'edit-fellowship-details');
define('BACKEND_FELLOWSHIP_POSTER_AJAX', BACKEND_SERVER_URL.'add-fellowship-poster-ajax');
define('BACKEND_FELLOWSHIP_MEDIA_AJAX', BACKEND_SERVER_URL.'add-fellowship-media-ajax');
/* End of file constants.php */
/* Location: ./application/config/constants.php */
