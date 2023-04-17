<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'frontend/surveys/error_page';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['404_override'] = 'common/showError';
$route['404'] = 'common/showError';
/*
|--------------------------------------------------------------------------
| ROUTES <Start> FRONT-END
|--------------------------------------------------------------------------
*/



/*HOMEPAGE MODULE START*/
$route['default_controller'] =   "main";
/*HOMEPAGE MODULE END*/

// ROUTE LOGOUT //
$route['logout'] = "common/logoutAjax";
$route['account-deleted'] = "frontend/Profile/account_deleted";
/*LOGIN MODULE START*/
$route['sign-in'] =   "frontend/Login/logIn";
$route['sign-up'] =   "frontend/login/logIn";
$route['forgot-password'] =   "frontend/login/forgotPassword";
$route['foundation'] =   "frontend/Courses/foundation";
$route['verification/(:any)'] =   "frontend/login/verification/$1";


$route['subscribe-exam-course'] =   "frontend/Courses/subscribe";
$route['office-bearers'] =   "frontend/Capitals/index";
$route['media'] =   "frontend/Capitals/media";
$route['chapters'] =   "frontend/Capitals/chapters";
$route['checkout'] =   "frontend/Checkout/index";
$route['paymentAjax'] =   "frontend/Checkout/payAjax";
$route['view_subscription'] =   "frontend/Courses/view_subscription";
$route['subscription'] =   "frontend/Courses/subscription";
$route['details'] =   "frontend/Pages/details";
$route['delete-account/(:any)'] =   "frontend/Profile/verification/$1";
$route['make-payment'] = "frontend/Profile/forgotPassword";
$route['premium-membership-success'] = "frontend/Premium_membership/success";

/*LOGIN MODULE END*/

/*PROFILE MODULE START*/
$route['edit-profile'] =   "frontend/profile/index";
$route['editTalentProfileAjax'] =   "frontend/profile/editTalentProfileAjax";
$route['editProfileAjax'] =   "frontend/Profile/editProfileAjax";
$route['my-favourites'] =   "frontend/profile/employerBookmarks";
$route['book-talent'] =   "frontend/profile/employerBookTalent";
$route['change-password'] =   "frontend/profile/changePassword";
$route['employer-jobs'] =   "frontend/profile/employerJobs";
$route['employer-job-detail'] =   "frontend/profile/employerJobDetail";
$route['talent-jobs'] =   "frontend/profile/talentJobs";
$route['talent-job-detail'] =   "frontend/profile/talentJobDetail";
$route['public-profile'] =   "frontend/profile/talentPublicProfile";
$route['my-payments'] =   "frontend/profile/talentPayment";
$route['payment-history'] =   "frontend/profile/talentPaymentHistory";
$route['my-schedule'] =   "frontend/profile/talentSchedule";
$route['my-portfolio'] =   "frontend/profile/talentPortfolio";
$route['portfolio-image-upload']    	=   "frontend/profile/portfolioImageUploadAjax";
$route['portfolio-video-upload']    	=   "frontend/profile/portfolioVideoUploadAjax";
$route['profile-image-upload']    	=   "frontend/profile/profileImageUploadAjax";

$route['editPortfolioAjax'] =   "frontend/portfolio/editPortfolioAjax";

$route['get_latest_msg_details'] =   "frontend/Message/get_latest_msg_details";
/*PROFILE MODULE END*/

/*TALENT MODULE START*/
$route['profile'] =   "frontend/talent/talentDetail";
/*TALENT MODULE END*/

/*SEARCH MODULE START*/
$route['homeSearchAjax'] =   "main/homeSearchAjax";
$route['talents'] =   "frontend/search/listing";
$route['talents_scroll_ajax'] =   "frontend/search/talents_scroll_ajax";
$route['city_ajax'] =   "frontend/search/city_ajax";
/*SEARCH MODULE END*/

/*PAGES MODULE START*/
$route['who-we-are'] =   "frontend/pages/aboutUs";
$route['contact'] =   "frontend/pages/contactUs";
$route['privacy-policy'] =   "frontend/pages/privacyPolicy";
$route['welcome'] =   "frontend/pages/termAndConditions";
$route['pricing'] =   "frontend/pages/pricing";
$route['terms-and-conditions'] =   "frontend/pages/terms_and_conditions";
$route['frequently-asked-questions'] =   "frontend/pages/faqs";
$route['our-team'] =   "frontend/pages/ourTeam";
$route['how-to-register'] =   "frontend/pages/how_to_reg";
$route['price-plans'] =   "frontend/pages/pricing";
$route['service-provider-details'] = "frontend/Sp_event/serviceProviderDetails";
$route['service-provider'] =   "frontend/Portfolio/serviceProviderPortfolio";

$route['messages'] =   "frontend/Message/index";
$route['message-details'] =   "frontend/Message/details";
$route['send-message'] = "frontend/Message/send_message";

$route['succesfull-transaction'] =   "Stripe_charge/success";
$route['succesfully-subscribed'] =   "Stripe_charge_sp/success";
$route['failure'] =   "Stripe_charge/failure";
/*PAGES MODULE END*/

/*ERROR MODULE START*/
$route['error'] =   "frontend/login/show_404";
/*ERROR MODULE END*/

$route['media-gallery'] =   "frontend/Pages/media_gallery";
/*
|--------------------------------------------------------------------------
| ROUTES <End> FRONT-END
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| ROUTES <Start> BACK-END
|--------------------------------------------------------------------------
*/

/*LOGIN MODULE START*/
$admin_prefix = 'admin6y34q';
$route[$admin_prefix] =   "backend/login";
/*LOGIN MODULE END*/

/*DASHBOARD MODULE START*/
$route[$admin_prefix.'/dashboard']    	=   "backend/dashboard/Dashboard";
/*DASHBOARD MODULE END*/

/*USERS MODULE START*/

$route[$admin_prefix.'/email_subscribers']    	=   "backend/users/email_subscribers";
$route[$admin_prefix.'/users']    	=   "backend/users";
$route[$admin_prefix.'/service-provider']    	=   "backend/users/service_provider";
$route[$admin_prefix.'/event-organizer']    	=   "backend/users/event_organizer";
$route[$admin_prefix.'/service-provider-detail']    	=   "backend/users/talentDetail";
$route[$admin_prefix.'/employee']    	=   "backend/users/employee";
$route[$admin_prefix.'/event-organizer-detail']    	=   "backend/users/eventOrganizerDetail";
$route[$admin_prefix.'/youtube']    	=   "backend/users/uploadYoutubeVid";
$route[$admin_prefix.'/edit-user']    	=   "backend/users/editUser";
$route[$admin_prefix.'/updateUserAjax']    	=   "backend/users/updateUserAjax";
/*USERS MODULE END*/

/*ADS MODULE START*/
$route[$admin_prefix.'/ads']    	=   "backend/ads";
$route[$admin_prefix.'/new-ad']    	=   "backend/ads/addAd";
$route[$admin_prefix.'/addNewAdAjax']    	=   "backend/ads/addNewAdAjax";
$route[$admin_prefix.'/edit-ad']    	=   "backend/ads/editAd";
$route[$admin_prefix.'/editAdAjax']    	=   "backend/ads/updateAdAjax";
$route[$admin_prefix.'/youtube-ads']    	=   "backend/ads/youtubeAds";
/*ADS MODULE END*/

/*PAYMENT MODULE START*/
$route[$admin_prefix.'/price-packages']    	=   "backend/payment";
$route[$admin_prefix.'/add-price-package']    	=   "backend/payment/addPricePackages";
$route[$admin_prefix.'/edit-price-package']    	=   "backend/payment/editPricePackages";
$route[$admin_prefix.'/coupon-codes']    	=   "backend/payment/couponCodes"; 
$route[$admin_prefix.'/add-coupon']    	=   "backend/payment/addCouponCode";
$route[$admin_prefix.'/edit-coupon']    	=   "backend/payment/editCouponCode";
$route[$admin_prefix.'/coupon-details']    	=   "backend/payment/couponDetails";
/*PAYMENT MODULE END*/

/*CATEGORIES MODULE START*/
$route[$admin_prefix.'/categories']    	=   "backend/category";
$route[$admin_prefix.'/add-category']    	=   "backend/category/addCategory";
$route[$admin_prefix.'/edit-category']    	=   "backend/category/editCategory";
/*CATEGORIES MODULE END*/

/*JOBS MODULE START*/
$route[$admin_prefix.'/jobs']    	=   "backend/job";
$route[$admin_prefix.'/edit-job']    	=   "backend/job/editJob";
$route[$admin_prefix.'/add-job']    	=   "backend/job/addJob";
$route[$admin_prefix.'/filter-talent'] =   "backend/job/getFilteredTalent";
/*JOBS MODULE END*/

/*TRANSACTION MODULE START*/
$route[$admin_prefix.'/transactions']    	=   "backend/payment/transactions";
$route[$admin_prefix.'/transaction-detail']    	=   "backend/payment/transactionDetail";
/*TRANSACTION MODULE END*/

/*SETTINGS MODULE START*/
$route[$admin_prefix.'/settings'] =   "backend/settings/index";
$route[$admin_prefix.'/talent-settings'] =   "backend/settings/talent_settings";
$route[$admin_prefix.'/files-upload']    	=   "backend/settings/fileUploadAjax";
$route[$admin_prefix.'/message-center']    	=   "backend/settings/message";
/*SETTINGS MODULE END*/

/*PROFILE MODULE START*/
$route[$admin_prefix.'/change-password'] =   "backend/account_settings/changePassword";
$route[$admin_prefix.'/edit-profile'] =   "backend/account_settings/editProfile";
$route[$admin_prefix.'/updateAccountAjax']    	=   "backend/account_settings/updateAccountAjax";
/*PROFILE MODULE END*/

/*PAGES MODULE START*/
$route[$admin_prefix.'/static-page/(:num)']    	=   "backend/pages/index/$1";
$route[$admin_prefix.'/privacy-policy']    	=   "backend/pages/privacy_policy";
$route[$admin_prefix.'/faq-page/(:num)']    	=   "backend/pages/faqPage/$1";
$route[$admin_prefix.'/contact-us']    	=   "backend/pages/contactUs";
$route[$admin_prefix.'/home-slider']    		=   "backend/pages/homepageSlider";
$route[$admin_prefix.'/add-home-slide']    	=   "backend/pages/addHomepageSlide";
$route[$admin_prefix.'/edit-home-slide']    	=   "backend/pages/addHomepageSlide";
$route[$admin_prefix.'/addhomepageSlideAjax']    	=   "backend/pages/addhomepageSlideAjax";
$route[$admin_prefix.'/home-about-sections']    		=   "backend/pages/homeAboutSection";
$route[$admin_prefix.'/edit-about-sections/(:num)']    	=   "backend/pages/editAboutSection/$1";
$route[$admin_prefix.'/editAboutSectionAjax']    		=   "backend/pages/editAboutSectionAjax";
$route[$admin_prefix.'/about-us']    		=   "backend/pages/aboutContent";
$route[$admin_prefix.'/edit-about-us/(:num)']    	=   "backend/pages/editAboutUs/$1";
$route[$admin_prefix.'/our-team']    		=   "backend/pages/ourTeamContent";
$route[$admin_prefix.'/add-team-member']    	=   "backend/pages/addTeamMember";
$route[$admin_prefix.'/edit-team-member']    	=   "backend/pages/addTeamMember";
$route[$admin_prefix.'/addTeamMemberAjax']    	=   "backend/pages/addTeamMemberAjax";

$route[$admin_prefix.'/home-page-sections']    		=   "backend/pages/editHomePageSection";
$route[$admin_prefix.'/home-page-edit']    		=   "backend/pages/homePageEdit";
$route[$admin_prefix.'/update']    		=   "backend/Pages/updatePageContentAjax";
$route[$admin_prefix.'/update-mid']    		=   "backend/Pages/updateMidLeftContentAjax";
$route[$admin_prefix.'/update-mid-2']    		=   "backend/Pages/updateMidRightContentAjax";
$route[$admin_prefix.'/update-bottom']    		=   "backend/Pages/updateBottomAjax";
$route[$admin_prefix.'/terms-and-conditions-edit']    		=   "backend/Pages/terms_and_conditions";
$route[$admin_prefix.'/faq-edit']    		=   "backend/Pages/faq";
$route[$admin_prefix.'/event-detail']    		=   "backend/Pages/event_detail";
$route[$admin_prefix.'/pricing-edit'] =   "backend/Pages/pricing_edit";
$route[$admin_prefix.'/update-pricing'] =   "backend/Pages/update_pricing_ajax";
$route[$admin_prefix.'/event-offers'] = "backend/Pages/eventOffers";
$route[$admin_prefix.'/contact-edit'] =   "backend/Pages/contact_edit";
$route[$admin_prefix.'/update-contact'] =   "backend/Pages/updateContact";
$route[$admin_prefix.'/events-edit'] =   "backend/Pages/eventEdit";
$route['service-provider-job-board'] =   "frontend/JobBoard/serviceProviderJobBoard";
$route['service-provider-job-detail'] =   "frontend/JobBoard/serviceProviderJobDetail";

$route['service-provider-job-offer'] =   "frontend/JobBoard/serviceProviderJobOffer";

$route['service-provider-event'] =   "frontend/Sp_event/serviceProviderevents";

$route['event-details'] = "frontend/Sp_event/eventDetails";

$route['event-offers'] = "frontend/Sp_event/eventOffers";

$route['event-provider-event'] =   "frontend/Sp_event/eventPoviderEvents";

$route['service-provider-fetch-job'] =   "frontend/JobBoard/fetch";

$route['create-event'] =   "frontend/Sp_event/create";
$route['contact-us'] =   "frontend/Pages/contact_us";
$route['event-details-sp'] = "frontend/Sp_event/eventDetailsSp";
$route['premium-membership'] = "frontend/Premium_membership/index";
$route['member'] = "frontend/Premium_membership/premium";
$route['payNowAjax'] = "frontend/Premium_membership/payNow";
$route['payNowAjax1'] = "frontend/Premium_membership/payNow1";
$route['payNowAjax2'] = "frontend/Premium_membership/payNow2";
$route['payNowAjax3'] = "frontend/Premium_membership/payNow3";
$route['payNowAjax4'] = "frontend/Premium_membership/payNow4";
$route['payNowAjax5'] = "frontend/Premium_membership/payNow5";
$route['payNowAjax6'] = "frontend/Premium_membership/payNow6";
$route['payNowAjax7'] = "frontend/Premium_membership/payNow7";
/*PAGES MODULE END*/

//hamza

$route[$admin_prefix.'/commision-detail']    		=   "backend/Pages/commision_detail";

$route[$admin_prefix.'/get-go-pro'] =   "backend/Pages/goPro";
//$route['get-go-pro'] = "backend/Pages/goPro";
$route[$admin_prefix.'/contact-queries'] =   "backend/Pages/contactQueries";
$route[$admin_prefix.'/process-payment'] =   "backend/Pages/processpayment";

$route[$admin_prefix.'/process-payment-detail'] =   "backend/Pages/processpaymentdetail";
$route['welcome-user'] =  "frontend/Login/welcome_plaany";
$route['link-expired'] =  "frontend/Login/expired";
$route['message-details'] =   "frontend/Message/details";
$route[$admin_prefix.'/review-list'] =   "backend/Pages/reviewlist";
$route['event-review-sp'] = "frontend/Em_review/Eventmanagerreview";
$route['event-review-sp-detail'] = "frontend/Em_review/Eventmanagerreviewdetail";
$route['serviceProvider-review-em'] = "frontend/Sp_review/ServiceProviderreview";
$route['serviceProvider-review-em-detail'] = "frontend/Sp_review/ServiceProviderreviewdetail";
$route['event-transactions'] = "frontend/Em_transactions/Eventmanagertransactions";
$route['Em-connection'] =   "frontend/Em_transactions/EventmanagerConnection";
$route[$admin_prefix.'/comission-settings'] =   "backend/Pages/commisionSetting";
$route['event-transactions-offers'] = "frontend/Em_transactions/eventtransactionOffers";
$route['service-provider-transactions'] = "frontend/Sp_transactions/Serviceprovidertransactions";
$route['service-provider-transactions-details'] = "frontend/Sp_transactions/Serviceprovidertransactionsdetail";
$route['stripe-send-payment'] =   "Welcome/check";
$route['messages'] =   "frontend/Message/index";

$route['welcome-planny'] =  "frontend/Login/welcome_plaany";
$route['link-expired'] =  "frontend/Login/expired";
$route['message-details'] =   "frontend/Message/details";
$route['event-manager-reviews']= "frontend/JobBoard/eventMangerReviews";
$route['uploadImgInMsg'] =   "frontend/Message/uploadImgInMsg";


// PSIM Routes
$route['exams-sort'] =   "frontend/Courses/sort"; 
$route['academic-sort'] =   "frontend/Courses/academic_sort";
$route['intervention-sort'] =   "frontend/Courses/intervention_sort"; 
$route['physician-sort'] =   "frontend/Courses/physician_sort";
$route['partner-sort'] =   "frontend/Courses/partner_sort"; 
$route['fellowship-sort'] =   "frontend/Courses/fellowship_sort"; 
$route['upcoming-activities'] =   "frontend/Courses/upcoming_activities"; 
$route['examination-courses'] =   "frontend/Courses/index";
$route['course-details'] =   "frontend/Courses/details";
$route['archive'] =   "frontend/Courses/archive";
$route['subscribe-fellowship'] =   "frontend/Courses/subscribe_fellowship";

$route['academic-initiatives'] =   "frontend/Academics/index";
$route['academic-details'] =   "frontend/Academics/details";
$route['academic-coming-soon'] =   "frontend/Academics/coming_soon";
$route['physician-academy'] =   "frontend/Physician/index";
$route['physician-academy-details'] =   "frontend/Physician/details";

$route['psim-fellowship'] =   "frontend/Fellowship/index";
$route['conference'] =   "frontend/Fellowship/index2";
$route['conference-details'] =   "frontend/Fellowship/details";

$route['psim-partners'] =   "frontend/Partners/index";
$route['partners-details'] =   "frontend/Partners/details";

$route['public-intervention'] =   "frontend/Intervention/index";
$route['intervention-details'] =   "frontend/Intervention/details";




$route[$admin_prefix.'/exams-edit']    		=   "backend/Pages/exams_listing"; 
$route[$admin_prefix.'/exams-add']    		=   "backend/Pages/addExamsListing";
$route[$admin_prefix.'/edit-exams-listing']    	=   "backend/pages/addExamsListing";
$route[$admin_prefix.'/addExamsAjax']    	=   "backend/pages/addExamsAjax";
$route[$admin_prefix.'/add-exams-details']    	=   "backend/pages/addExamsDetails";
$route[$admin_prefix.'/addExamDetailsAjax']    	=   "backend/pages/addExamDetailsAjax";
$route[$admin_prefix.'/editExamDetailsAjax']    	=   "backend/pages/editExamDetailsAjax";
$route[$admin_prefix.'/edit-exams-details']    	=   "backend/pages/editExamsDetails"; 
$route[$admin_prefix.'/add-exams-media']    	=   "backend/pages/addExamsMedia";
$route[$admin_prefix.'/add-exams-media-ajax']    	=   "backend/pages/dragDropUpload";

$route[$admin_prefix.'/add-exams-videos-ajax']    	=   "backend/pages/dragDropVideos";




$route[$admin_prefix.'/academic-initiatives']    		=   "backend/Academic_initiatives/academic_initiatives"; 
$route[$admin_prefix.'/academic-add']    		=   "backend/Academic_initiatives/academic_initiatives_add";
$route[$admin_prefix.'/academic-listing']    	=   "backend/Academic_initiatives/academic_initiatives_listing";
$route[$admin_prefix.'/addAcademicsAjax']    	=   "backend/Academic_initiatives/addAcademicsAjax";
$route[$admin_prefix.'/add-academic-details']    	=   "backend/pages/addacademicDetails";
$route[$admin_prefix.'/addacademicDetailsAjax']    	=   "backend/pages/addacademicDetailsAjax";
$route[$admin_prefix.'/editacademicDetailsAjax']    	=   "backend/pages/editacademicDetailsAjax";
$route[$admin_prefix.'/edit-academic-details']    	=   "backend/pages/editacademicDetails";
$route[$admin_prefix.'/add-academic-media']    	=   "backend/pages/addAcademicMedia";
$route[$admin_prefix.'/add-academic-media-ajax']    	=   "backend/pages/dragDropUploadacademic";
$route[$admin_prefix.'/add-academic-poster-ajax']    	=   "backend/pages/dragDropUploadacademicPoster";



$route[$admin_prefix.'/physian']    		=   "backend/Pages/physian"; 
$route[$admin_prefix.'/physian-add']    		=   "backend/Pages/physian_add";
$route[$admin_prefix.'/physian-listing']    	=   "backend/Pages/physian_listing";
$route[$admin_prefix.'/addPhysianAjax']    	=   "backend/Pages/addPhysianAjax";
$route[$admin_prefix.'/add-physian-details']    	=   "backend/pages/addphysianDetails";
$route[$admin_prefix.'/addphysianDetailsAjax']    	=   "backend/pages/addphysianDetailsAjax";
$route[$admin_prefix.'/editphysianDetailsAjax']    	=   "backend/pages/editphysianDetailsAjax";
$route[$admin_prefix.'/edit-physian-details']    	=   "backend/pages/editphysianDetails";

$route[$admin_prefix.'/fellowship']    		=   "backend/Pages/fellowship"; 
$route[$admin_prefix.'/fellowship-add']    		=   "backend/Pages/fellowship_add";
$route[$admin_prefix.'/fellowship-listing']    	=   "backend/Pages/fellowship_listing";
$route[$admin_prefix.'/addFellowshipAjax']    	=   "backend/Pages/addFellowshipAjax";
$route[$admin_prefix.'/add-fellowship-details']    	=   "backend/pages/addfellowshipDetails";
$route[$admin_prefix.'/addfellowshipDetailsAjax']    	=   "backend/pages/addfellowshipDetailsAjax";
$route[$admin_prefix.'/editfellowshipDetailsAjax']    	=   "backend/pages/editfellowshipDetailsAjax";
$route[$admin_prefix.'/edit-fellowship-details']    	=   "backend/pages/editfellowshipDetails";
$route[$admin_prefix.'/add-fellowship-media-ajax']    	=   "backend/pages/dragDropUploadFellowship";
$route[$admin_prefix.'/add-fellowship-media']    	=   "backend/pages/fellowshipMedia";
$route[$admin_prefix.'/add-fellowship-poster-ajax']    	=   "backend/pages/dragDropUploadFellowshipPoster";



$route[$admin_prefix.'/partners']    		=   "backend/Pages/partners"; 
$route[$admin_prefix.'/partners-add']    		=   "backend/Pages/partners_add";
$route[$admin_prefix.'/partners-listing']    	=   "backend/Pages/partners_listing";
$route[$admin_prefix.'/addPartnersAjax']    	=   "backend/Pages/addPartnersAjax";
$route[$admin_prefix.'/add-partners-details']    	=   "backend/pages/addpartnersDetails";
$route[$admin_prefix.'/addpartnersDetailsAjax']    	=   "backend/pages/addpartnersDetailsAjax";
$route[$admin_prefix.'/editpartnersDetailsAjax']    	=   "backend/pages/editpartnersDetailsAjax";
$route[$admin_prefix.'/edit-partners-details']    	=   "backend/pages/editpartnersDetails";

$route[$admin_prefix.'/intervention']    		=   "backend/Pages/intervention"; 
$route[$admin_prefix.'/intervention-add']    		=   "backend/Pages/intervention_add";
$route[$admin_prefix.'/intervention-listing']    	=   "backend/Pages/intervention_listing";
$route[$admin_prefix.'/addInterventionAjax']    	=   "backend/Pages/addInterventionAjax";
$route[$admin_prefix.'/add-intervention-details']    	=   "backend/pages/addinterventionDetails";
$route[$admin_prefix.'/addinterventionDetailsAjax']    	=   "backend/pages/addinterventionDetailsAjax";
$route[$admin_prefix.'/editinterventionDetailsAjax']    	=   "backend/pages/editinterventionDetailsAjax";
$route[$admin_prefix.'/edit-intervention-details']    	=   "backend/pages/editinterventionDetails";

/*
|--------------------------------------------------------------------------
| ROUTES <End> BACK-END
|--------------------------------------------------------------------------
*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */
