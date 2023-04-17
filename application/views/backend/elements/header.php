

<!-- BEGIN HEADER -->
<header class="page-header">
	<nav class="navbar" role="navigation">
		<div class="container-fluid">
			<div class="havbar-header">
				<!-- BEGIN LOGO -->
				<a id="index" class="navbar-brand" href="<?php echo BACKEND_SERVICE_PROVIDER_URL ?>">
					<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>/logo/logo-1.png" alt="Logo"> </a>
				<!-- END LOGO -->
				<!-- BEGIN TOPBAR ACTIONS -->
				<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
							<img alt="" class="img-circle" src="<?php echo (!empty($common_data['user_data']['profile_image']))? ASSET_UPLOADS_BACKEND_DIR.'users/'.$common_data['user_data']['profile_image']:  ASSET_IMAGES_BACKEND_DIR.'profile-placeholder.png'?>">
							<span class="username username-hide-on-mobile"> <?php echo ucfirst($common_data['user_data']['first_name'])?> </span>
							<i class="fa fa-angle-down"></i>
						</a>
						 <!--<ul class="dropdown-menu-v2" role="menu">-->
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?php echo BACKEND_EDIT_PROFILE_URL ?>">
									<i class="icon-user-following"></i> Edit Profile
									<!-- <span class="badge badge-danger">1</span> -->
								</a>
							</li>
							<li>
								<a href="<?php echo BACKEND_CHANGE_PASSWORD_URL ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="41.5" height="41.5" viewBox="0 0 41.5 41.5">
								  <g id="settings" transform="translate(0)">
								    <path id="Path_2447" data-name="Path 2447" d="M22.052,41.5h-2.6a3.825,3.825,0,0,1-3.82-3.82V36.8a16.754,16.754,0,0,1-2.6-1.08l-.624.624a3.82,3.82,0,0,1-5.4,0L5.157,34.5a3.82,3.82,0,0,1,0-5.4l.624-.624a16.755,16.755,0,0,1-1.08-2.6H3.82A3.825,3.825,0,0,1,0,22.052v-2.6a3.825,3.825,0,0,1,3.82-3.82H4.7a16.758,16.758,0,0,1,1.08-2.6L5.157,12.4a3.82,3.82,0,0,1,0-5.4L7,5.157a3.82,3.82,0,0,1,5.4,0l.624.624a16.77,16.77,0,0,1,2.6-1.08V3.82A3.825,3.825,0,0,1,19.448,0h2.6a3.825,3.825,0,0,1,3.82,3.82V4.7a16.754,16.754,0,0,1,2.6,1.08l.624-.624a3.82,3.82,0,0,1,5.4,0L36.343,7a3.82,3.82,0,0,1,0,5.4l-.624.624a16.755,16.755,0,0,1,1.08,2.6h.881a3.825,3.825,0,0,1,3.82,3.82v2.6a3.825,3.825,0,0,1-3.82,3.82H36.8a16.758,16.758,0,0,1-1.08,2.6l.624.624a3.82,3.82,0,0,1,0,5.4L34.5,36.343a3.82,3.82,0,0,1-5.4,0l-.624-.624a16.77,16.77,0,0,1-2.6,1.08v.881A3.825,3.825,0,0,1,22.052,41.5Zm-8.62-8.335a14.331,14.331,0,0,0,3.715,1.542,1.216,1.216,0,0,1,.912,1.177v1.8a1.39,1.39,0,0,0,1.389,1.389h2.6a1.39,1.39,0,0,0,1.389-1.389v-1.8a1.216,1.216,0,0,1,.912-1.177,14.331,14.331,0,0,0,3.715-1.542,1.216,1.216,0,0,1,1.479.187l1.272,1.272a1.388,1.388,0,0,0,1.963,0l1.842-1.842a1.388,1.388,0,0,0,0-1.964l-1.272-1.272a1.216,1.216,0,0,1-.187-1.479,14.329,14.329,0,0,0,1.542-3.715,1.216,1.216,0,0,1,1.177-.912h1.8a1.39,1.39,0,0,0,1.389-1.389v-2.6a1.39,1.39,0,0,0-1.389-1.389h-1.8a1.216,1.216,0,0,1-1.177-.912,14.332,14.332,0,0,0-1.542-3.715,1.216,1.216,0,0,1,.187-1.479l1.272-1.272a1.388,1.388,0,0,0,0-1.964L32.782,6.877a1.388,1.388,0,0,0-1.964,0L29.547,8.148a1.216,1.216,0,0,1-1.479.187,14.331,14.331,0,0,0-3.715-1.542,1.216,1.216,0,0,1-.912-1.177V3.82a1.39,1.39,0,0,0-1.389-1.389h-2.6A1.39,1.39,0,0,0,18.059,3.82v1.8a1.216,1.216,0,0,1-.912,1.177,14.332,14.332,0,0,0-3.715,1.542,1.216,1.216,0,0,1-1.479-.187L10.682,6.876a1.388,1.388,0,0,0-1.963,0L6.876,8.718a1.388,1.388,0,0,0,0,1.964l1.272,1.272a1.216,1.216,0,0,1,.187,1.479,14.329,14.329,0,0,0-1.542,3.715,1.216,1.216,0,0,1-1.177.912H3.82a1.39,1.39,0,0,0-1.389,1.389v2.6A1.39,1.39,0,0,0,3.82,23.441h1.8a1.216,1.216,0,0,1,1.177.912,14.332,14.332,0,0,0,1.542,3.715,1.216,1.216,0,0,1-.187,1.479L6.876,30.818a1.388,1.388,0,0,0,0,1.964l1.842,1.842a1.388,1.388,0,0,0,1.964,0l1.272-1.272a1.222,1.222,0,0,1,1.479-.187Z" fill="#1b2328"/>
								    <path id="Path_2448" data-name="Path 2448" d="M153.63,162.659a9.03,9.03,0,1,1,9.029-9.029A9.04,9.04,0,0,1,153.63,162.659Zm0-15.627a6.6,6.6,0,1,0,6.6,6.6A6.605,6.605,0,0,0,153.63,147.032Z" transform="translate(-132.879 -132.879)" fill="#1b2328"/>
								  </g>
								</svg> Change Password
									<!-- <span class="badge badge-danger">1</span> -->
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" onclick="logout();">
								<svg xmlns="http://www.w3.org/2000/svg" width="48.981" height="47.049" viewBox="0 0 48.981 47.049">
								  <g id="sign-out" transform="translate(0)">
								    <path id="Path_1222" data-name="Path 1222" d="M257.723,160.051l-2.079,2.079,6.312,6.312H241.119v2.941h20.837l-6.312,6.312,2.079,2.079,9.861-9.861Z" transform="translate(-218.603 -146.388)"></path>
								    <path id="Path_1223" data-name="Path 1223" d="M32.346,44.108H2.941V2.941H32.346v9.381h2.941V1.47A1.469,1.469,0,0,0,33.816,0H1.47A1.469,1.469,0,0,0,0,1.47V45.579a1.469,1.469,0,0,0,1.47,1.47H33.816a1.469,1.469,0,0,0,1.47-1.47V34.727H32.346Z" transform="translate(0)"></path>
								  </g>
								</svg> Log Out </a>
							</li>
							
							<!-- <li>
								<a href="app_calendar.html">
									<i class="icon-calendar"></i> My Calendar </a>
							</li>
							<li>
								<a href="app_inbox.html">
									<i class="icon-envelope-open"></i> My Inbox
									<span class="badge badge-danger"> 3 </span>
								</a>
							</li>
							<li>
								<a href="app_todo_2.html">
									<i class="icon-rocket"></i> My Tasks
									<span class="badge badge-success"> 7 </span>
								</a>
							</li>
							<li class="divider"> </li>
							<li>
								<a href="page_user_lock_1.html">
									<i class="icon-lock"></i> Lock Screen </a>
							</li> -->
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			</div>
		</div>
		<!--/container-->
	</nav>
</header>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="container-fluid container-fluid-bg">
	<div class="page-content page-content-popup">
		<div class="page-content-fixed-header">
			<!-- BEGIN BREADCRUMBS -->
			<!-- <ul class="page-breadcrumb">
				<?php if (isset($topModuleName) && !empty($topModuleName)){?>
				<li>
					<a href="<?php echo $topModuleLink ?>"><?php echo $topModuleName ?></a>
				</li>
				<?php } ?>
					<?php if (isset($moduleName) && !empty($moduleName)){?>
				   <li> <a href="<?php echo $moduleLink ?>"><?php echo $moduleName ?></a> </li>
					<?php }?>
			   
				<?php if (isset($subModuleName) && !empty($subModuleName)){?>
				<li><?php echo $subModuleName ?></li>
				<?php } ?>
			</ul> -->
			<!-- END BREADCRUMBS -->
			<div class="content-header-menu">
				<!-- BEGIN DROPDOWN AJAX MENU -->
				<div class="dropdown-ajax-menu btn-group">
				   <!-- <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="fa fa-circle"></i>
						<i class="fa fa-circle"></i>
						<i class="fa fa-circle"></i>
					</button>-->
					<!-- <ul class="dropdown-menu-v2">
						<li>
							<a href="start.html">Application</a>
						</li>
						<li>
							<a href="start.html">Reports</a>
						</li>
						<li>
							<a href="start.html">Templates</a>
						</li>
						<li>
							<a href="start.html">Settings</a>
						</li>
					</ul> -->
				</div>
				<!-- END DROPDOWN AJAX MENU -->
				<!-- BEGIN MENU TOGGLER -->
				<button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="toggle-icon">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
				</button>
				<!-- END MENU TOGGLER -->
			</div>
		</div>
		<div class="page-sidebar-wrapper">
			<!-- BEGIN SIDEBAR -->
		
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				
				<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				 	<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "Dashboard" ){echo 'activated';} ?>">
						<a href="<?php echo BACKEND_DASHBOARD_URL ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="45pt" height="45pt" viewBox="0 0 45 45" version="1.1">
								<g id="surface1">
								<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 17.34375 15 L 3.28125 15 C 1.472656 15 0 13.527344 0 11.71875 L 0 3.28125 C 0 1.472656 1.472656 0 3.28125 0 L 17.34375 0 C 19.152344 0 20.625 1.472656 20.625 3.28125 L 20.625 11.71875 C 20.625 13.527344 19.152344 15 17.34375 15 Z M 3.28125 2.8125 C 3.023438 2.8125 2.8125 3.023438 2.8125 3.28125 L 2.8125 11.71875 C 2.8125 11.976562 3.023438 12.1875 3.28125 12.1875 L 17.34375 12.1875 C 17.601562 12.1875 17.8125 11.976562 17.8125 11.71875 L 17.8125 3.28125 C 17.8125 3.023438 17.601562 2.8125 17.34375 2.8125 Z M 3.28125 2.8125 "/>
								<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 17.34375 45 L 3.28125 45 C 1.472656 45 0 43.527344 0 41.71875 L 0 22.03125 C 0 20.222656 1.472656 18.75 3.28125 18.75 L 17.34375 18.75 C 19.152344 18.75 20.625 20.222656 20.625 22.03125 L 20.625 41.71875 C 20.625 43.527344 19.152344 45 17.34375 45 Z M 3.28125 21.5625 C 3.023438 21.5625 2.8125 21.773438 2.8125 22.03125 L 2.8125 41.71875 C 2.8125 41.976562 3.023438 42.1875 3.28125 42.1875 L 17.34375 42.1875 C 17.601562 42.1875 17.8125 41.976562 17.8125 41.71875 L 17.8125 22.03125 C 17.8125 21.773438 17.601562 21.5625 17.34375 21.5625 Z M 3.28125 21.5625 "/>
								<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 41.71875 45 L 27.65625 45 C 25.847656 45 24.375 43.527344 24.375 41.71875 L 24.375 33.28125 C 24.375 31.472656 25.847656 30 27.65625 30 L 41.71875 30 C 43.527344 30 45 31.472656 45 33.28125 L 45 41.71875 C 45 43.527344 43.527344 45 41.71875 45 Z M 27.65625 32.8125 C 27.398438 32.8125 27.1875 33.023438 27.1875 33.28125 L 27.1875 41.71875 C 27.1875 41.976562 27.398438 42.1875 27.65625 42.1875 L 41.71875 42.1875 C 41.976562 42.1875 42.1875 41.976562 42.1875 41.71875 L 42.1875 33.28125 C 42.1875 33.023438 41.976562 32.8125 41.71875 32.8125 Z M 27.65625 32.8125 "/>
								<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 41.71875 26.25 L 27.65625 26.25 C 25.847656 26.25 24.375 24.777344 24.375 22.96875 L 24.375 3.28125 C 24.375 1.472656 25.847656 0 27.65625 0 L 41.71875 0 C 43.527344 0 45 1.472656 45 3.28125 L 45 22.96875 C 45 24.777344 43.527344 26.25 41.71875 26.25 Z M 27.65625 2.8125 C 27.398438 2.8125 27.1875 3.023438 27.1875 3.28125 L 27.1875 22.96875 C 27.1875 23.226562 27.398438 23.4375 27.65625 23.4375 L 41.71875 23.4375 C 41.976562 23.4375 42.1875 23.226562 42.1875 22.96875 L 42.1875 3.28125 C 42.1875 3.023438 41.976562 2.8125 41.71875 2.8125 Z M 27.65625 2.8125 "/>
								</g>
							</svg>
							<span class="title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "service_provider" ){echo 'activated';} ?><?php if(isset($subModuleName) && $subModuleName == "event_organizer" ){echo 'activated';} ?> ">
						<a href="<?php echo BACKEND_EVENT_ORGANIZER_URL ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="55.846" height="41.187" viewBox="0 0 55.846 41.187">
							  <g id="Group_3502" data-name="Group 3502" transform="translate(0 5.25)">
							    <path id="Path_170" data-name="Path 170" d="M120.64,93.78a6.015,6.015,0,1,0-6.015-6.015A6.015,6.015,0,0,0,120.64,93.78Zm0-9.692a3.688,3.688,0,1,1-3.688,3.688A3.688,3.688,0,0,1,120.64,84.089Zm0,0" transform="translate(-103.956 -78.902)" ></path>
							    <path id="Path_171" data-name="Path 171" d="M89.238,234.873a9.027,9.027,0,0,0-6.539,2.734,9.65,9.65,0,0,0-2.7,6.83,1.167,1.167,0,0,0,1.163,1.163H97.312a1.167,1.167,0,0,0,1.163-1.163,9.65,9.65,0,0,0-2.7-6.83A9.026,9.026,0,0,0,89.238,234.873Zm-6.83,8.4a7.117,7.117,0,0,1,1.955-4.037,6.854,6.854,0,0,1,9.75,0,7.151,7.151,0,0,1,1.955,4.037Zm0,0" transform="translate(-72.554 -217.772)" ></path>
							    <path id="Path_172" data-name="Path 172" d="M50.029-5.25H5.817A5.82,5.82,0,0,0,0,.567V30.119a5.82,5.82,0,0,0,5.817,5.817H50.029a5.82,5.82,0,0,0,5.817-5.817V.567A5.82,5.82,0,0,0,50.029-5.25Zm3.49,35.369a3.5,3.5,0,0,1-3.49,3.49H5.817a3.5,3.5,0,0,1-3.49-3.49V.567a3.5,3.5,0,0,1,3.49-3.49H50.029a3.5,3.5,0,0,1,3.49,3.49Zm0,0" ></path>
							    <path id="Path_173" data-name="Path 173" d="M363.343,203.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -189.32)" ></path>
							    <path id="Path_174" data-name="Path 174" d="M363.343,283.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -261.874)" ></path>
							    <path id="Path_175" data-name="Path 175" d="M363.343,123.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -116.767)" ></path>
							  </g>
							</svg>
							<span class="title">Users</span>
							<!-- <span class="arrow <?php echo (isset($topModuleName) && $topModuleName == "Talent")?"open":""; ?>"></span> -->
							
						</a>
						<!-- <ul class="sub-menu" <?php echo (isset($topModuleName) && $topModuleName == "Talent")?"style='display:block'":""; ?>>
							<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "service_provider" ){echo 'activated';} ?>" id="categories_li">
								<a href="<?php echo BACKEND_SERVICE_PROVIDER_URL ?>" class="nav-link">
									<i class="icon-users"></i>
									<span class="title">Service Providers</span>
								</a>
							</li>							
							<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "event_organizer" ){echo 'activated';} ?>">
								<a href="<?php echo BACKEND_EVENT_ORGANIZER_URL ?>" class="nav-link ">
									<i class="icon-users"></i>
									<span class="title">Event Planners</span>
								</a>
							</li>

							
							
						</ul> -->
					</li>
					<!-- <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "Event") {echo " activated ";}?>" >
						<a href="<?php echo BACKEND_EVENTS_EDIT ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="47.04" height="41.344" viewBox="0 0 47.04 41.344">
							  <path id="Jobs_Icon" data-name="Jobs Icon" d="M45.671,5.513h-12.5V4.134A4.139,4.139,0,0,0,29.033,0H18.008a4.139,4.139,0,0,0-4.134,4.134V5.512H1.378A1.382,1.382,0,0,0,0,6.891V37.209a4.139,4.139,0,0,0,4.134,4.134H42.906a4.139,4.139,0,0,0,4.134-4.134V6.914a1.338,1.338,0,0,0-1.37-1.4ZM16.63,4.134a1.38,1.38,0,0,1,1.378-1.378H29.033a1.38,1.38,0,0,1,1.378,1.378V5.512H16.63ZM43.75,8.269,39.47,21.108a1.376,1.376,0,0,1-1.307.942H30.411V20.672a1.378,1.378,0,0,0-1.378-1.378H18.008a1.378,1.378,0,0,0-1.378,1.378V22.05H8.877a1.376,1.376,0,0,1-1.307-.942L3.291,8.269ZM27.655,22.05v2.756H19.386V22.05ZM44.284,37.209a1.38,1.38,0,0,1-1.378,1.378H4.135a1.38,1.38,0,0,1-1.378-1.378V15.383l2.2,6.6a4.128,4.128,0,0,0,3.922,2.827H16.63v1.378a1.378,1.378,0,0,0,1.378,1.378H29.033a1.378,1.378,0,0,0,1.378-1.378V24.806h7.752a4.128,4.128,0,0,0,3.922-2.827l2.2-6.6Zm0,0" transform="translate(0)" />
							</svg>
							<span class="title">Events</span>
						</a>
					</li> -->
					<!-- <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "commision") {echo " activated ";}?>">
						<a href="<?php echo BACKEND_COMMISSION_DETAIL ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="49.964" height="57.595" viewBox="0 0 49.964 57.595">
							  <g id="wallet" transform="translate(-21.961 0)">
							    <g id="Group_2041" data-name="Group 2041" transform="translate(21.961 0)">
							      <g id="Group_2040" data-name="Group 2040" transform="translate(0 0)">
							        <path id="Path_1351" data-name="Path 1351" d="M70.053,9.919,52.471.4a3.708,3.708,0,0,0-4.865,1.459L37.32,20.97H24.81a2.818,2.818,0,0,0-2.849,2.849V54.745a2.818,2.818,0,0,0,2.849,2.849H64.772a2.818,2.818,0,0,0,2.849-2.849V47.518H68.8a1.1,1.1,0,0,0,1.112-1.112v-8.27A1.1,1.1,0,0,0,68.8,37.024H67.621V28.892a2.9,2.9,0,0,0-2.224-2.78l6.116-11.328A3.643,3.643,0,0,0,70.053,9.919ZM57.544,5.68,46.563,26.043H43.436L55.181,4.429ZM49.621,2.9a1.367,1.367,0,0,1,1.807-.556l1.737.973L40.934,26.043H37.112ZM24.115,23.749a.671.671,0,0,1,.625-.556H36.069l-1.529,2.78h-9.8a1.924,1.924,0,0,0-.625.069V23.749Zm41.212,31a.623.623,0,0,1-.625.625H24.741a.623.623,0,0,1-.625-.625V28.892a.623.623,0,0,1,.625-.625H64.633a.623.623,0,0,1,.625.625v8.131H61.019a3.337,3.337,0,0,0-3.336,3.336v3.822a3.337,3.337,0,0,0,3.336,3.336h4.309v7.228Zm2.224-15.5h.069v6.046h-6.6a1.1,1.1,0,0,1-1.112-1.112V40.359a1.1,1.1,0,0,1,1.112-1.112ZM69.5,13.672,62.826,26.043H49.065L59.49,6.792l9.452,5.143A1.216,1.216,0,0,1,69.5,13.672Z" transform="translate(-21.961 0)" />
							      </g>
							    </g>
							    <g id="Group_2043" data-name="Group 2043" transform="translate(59.62 12.007)">
							      <g id="Group_2042" data-name="Group 2042" transform="translate(0)">
							        <path id="Path_1352" data-name="Path 1352" d="M244.348,69.731l-.556-.278a3.042,3.042,0,0,0-4.031,1.181l-.695,1.32a2.927,2.927,0,0,0-.208,2.293,2.8,2.8,0,0,0,1.459,1.737l.556.278a3.164,3.164,0,0,0,1.39.347,3.126,3.126,0,0,0,2.641-1.529l.7-1.32A3.114,3.114,0,0,0,244.348,69.731Zm-.764,2.988-.695,1.32a.785.785,0,0,1-1.042.278l-.556-.347a1.022,1.022,0,0,1-.347-.417.525.525,0,0,1,.07-.556l.695-1.32a.922.922,0,0,1,.695-.417.626.626,0,0,1,.347.07l.556.278A1.081,1.081,0,0,1,243.584,72.72Z" transform="translate(-238.71 -69.108)" />
							      </g>
							    </g>
							  </g>
							</svg>
							<span class="title">Price Settings</span>
						</a>
					</li> -->
					<!-- <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "transactions") {echo " activated ";}?>">
						<a href="<?php echo BACKEND_PROCESS_PAYMENT_URL ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="49.964" height="57.595" viewBox="0 0 49.964 57.595">
							  <g id="wallet" transform="translate(-21.961 0)">
							    <g id="Group_2041" data-name="Group 2041" transform="translate(21.961 0)">
							      <g id="Group_2040" data-name="Group 2040" transform="translate(0 0)">
							        <path id="Path_1351" data-name="Path 1351" d="M70.053,9.919,52.471.4a3.708,3.708,0,0,0-4.865,1.459L37.32,20.97H24.81a2.818,2.818,0,0,0-2.849,2.849V54.745a2.818,2.818,0,0,0,2.849,2.849H64.772a2.818,2.818,0,0,0,2.849-2.849V47.518H68.8a1.1,1.1,0,0,0,1.112-1.112v-8.27A1.1,1.1,0,0,0,68.8,37.024H67.621V28.892a2.9,2.9,0,0,0-2.224-2.78l6.116-11.328A3.643,3.643,0,0,0,70.053,9.919ZM57.544,5.68,46.563,26.043H43.436L55.181,4.429ZM49.621,2.9a1.367,1.367,0,0,1,1.807-.556l1.737.973L40.934,26.043H37.112ZM24.115,23.749a.671.671,0,0,1,.625-.556H36.069l-1.529,2.78h-9.8a1.924,1.924,0,0,0-.625.069V23.749Zm41.212,31a.623.623,0,0,1-.625.625H24.741a.623.623,0,0,1-.625-.625V28.892a.623.623,0,0,1,.625-.625H64.633a.623.623,0,0,1,.625.625v8.131H61.019a3.337,3.337,0,0,0-3.336,3.336v3.822a3.337,3.337,0,0,0,3.336,3.336h4.309v7.228Zm2.224-15.5h.069v6.046h-6.6a1.1,1.1,0,0,1-1.112-1.112V40.359a1.1,1.1,0,0,1,1.112-1.112ZM69.5,13.672,62.826,26.043H49.065L59.49,6.792l9.452,5.143A1.216,1.216,0,0,1,69.5,13.672Z" transform="translate(-21.961 0)" />
							      </g>
							    </g>
							    <g id="Group_2043" data-name="Group 2043" transform="translate(59.62 12.007)">
							      <g id="Group_2042" data-name="Group 2042" transform="translate(0)">
							        <path id="Path_1352" data-name="Path 1352" d="M244.348,69.731l-.556-.278a3.042,3.042,0,0,0-4.031,1.181l-.695,1.32a2.927,2.927,0,0,0-.208,2.293,2.8,2.8,0,0,0,1.459,1.737l.556.278a3.164,3.164,0,0,0,1.39.347,3.126,3.126,0,0,0,2.641-1.529l.7-1.32A3.114,3.114,0,0,0,244.348,69.731Zm-.764,2.988-.695,1.32a.785.785,0,0,1-1.042.278l-.556-.347a1.022,1.022,0,0,1-.347-.417.525.525,0,0,1,.07-.556l.695-1.32a.922.922,0,0,1,.695-.417.626.626,0,0,1,.347.07l.556.278A1.081,1.081,0,0,1,243.584,72.72Z" transform="translate(-238.71 -69.108)" />
							      </g>
							    </g>
							  </g>
							</svg>
							<span class="title">Transactions</span>
						</a>
					</li> -->
					<!-- <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "Reviews"){ echo "activated";} ?>" >
						<a href="<?php echo BACKEND_REVIEW_LIST ?>" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="46.391" height="44.38" viewBox="0 0 46.391 44.38">
							  <g id="star" transform="translate(1.525 -10.296)">
							    <g id="Group_3428" data-name="Group 3428" transform="translate(0 11.796)">
							      <path id="Path_2460" data-name="Path 2460" d="M43.279,27.5a1.269,1.269,0,0,0-1.025-.864L28.818,24.679,22.809,12.5a1.27,1.27,0,0,0-2.277,0L14.523,24.679,1.087,26.631a1.27,1.27,0,0,0-.7,2.166l9.722,9.477L7.811,51.655a1.27,1.27,0,0,0,1.842,1.338l12.017-6.318,12.017,6.318a1.27,1.27,0,0,0,1.842-1.339l-2.3-13.382L42.957,28.8A1.269,1.269,0,0,0,43.279,27.5Z" transform="translate(0 -11.796)" fill="none" stroke="#1b2328" stroke-width="3"/>
							    </g>
							  </g>
							</svg>
							<span class="title">Reviews</span>
						</a>
					</li> -->
					<!-- <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "contact_qry"){ echo "activated";} ?>">
						<a href="<?php echo BACKEND_CONTACT_QUERIES ?>" class="nav-link nav-toggle">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" width="45pt" height="45pt" viewBox="0 0 45 45" version="1.1">
								<g id="surface1">
									<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 43.085938 1.125 L 11.65625 1.125 C 10.597656 1.128906 9.742188 1.984375 9.742188 3.039062 L 9.742188 11.710938 L 8.304688 9.554688 C 7.644531 8.5625 6.324219 8.261719 5.304688 8.878906 L 2.347656 10.65625 C 1.378906 11.222656 0.667969 12.144531 0.363281 13.226562 C -0.714844 17.15625 0.0859375 23.921875 10.019531 33.855469 C 17.917969 41.75 23.808594 43.875 27.867188 43.875 C 28.808594 43.878906 29.742188 43.753906 30.652344 43.511719 C 31.730469 43.207031 32.652344 42.496094 33.222656 41.53125 L 34.996094 38.570312 C 35.609375 37.550781 35.3125 36.230469 34.324219 35.574219 L 27.242188 30.851562 C 26.269531 30.210938 24.96875 30.421875 24.25 31.339844 L 22.1875 33.988281 C 21.972656 34.273438 21.582031 34.355469 21.269531 34.183594 L 20.878906 33.96875 C 19.585938 33.261719 17.980469 32.386719 14.734375 29.140625 C 14.382812 28.789062 14.066406 28.460938 13.765625 28.148438 L 43.085938 28.148438 C 44.140625 28.148438 44.996094 27.296875 45 26.242188 L 45 3.039062 C 45 1.984375 44.144531 1.128906 43.085938 1.125 Z M 20.160156 35.285156 L 20.539062 35.492188 C 21.5 36.03125 22.703125 35.78125 23.371094 34.910156 L 25.433594 32.261719 C 25.667969 31.960938 26.09375 31.890625 26.410156 32.101562 L 33.492188 36.820312 C 33.8125 37.035156 33.910156 37.464844 33.710938 37.796875 L 31.933594 40.757812 C 31.5625 41.394531 30.960938 41.859375 30.253906 42.0625 C 26.707031 43.039062 20.5 42.210938 11.082031 32.792969 C 1.664062 23.371094 0.839844 17.167969 1.8125 13.625 C 2.015625 12.914062 2.480469 12.3125 3.117188 11.941406 L 6.078125 10.167969 C 6.410156 9.96875 6.839844 10.066406 7.054688 10.386719 L 11.777344 17.46875 C 11.984375 17.785156 11.917969 18.207031 11.617188 18.441406 L 8.964844 20.503906 C 8.09375 21.171875 7.847656 22.378906 8.382812 23.335938 L 8.59375 23.714844 C 9.34375 25.09375 10.273438 26.804688 13.675781 30.203125 C 17.074219 33.601562 18.785156 34.535156 20.160156 35.285156 Z M 43.5 26.242188 C 43.496094 26.46875 43.3125 26.652344 43.085938 26.648438 L 12.414062 26.648438 C 11.4375 25.535156 10.597656 24.308594 9.910156 23 L 9.695312 22.605469 C 9.523438 22.296875 9.605469 21.90625 9.886719 21.691406 L 12.539062 19.628906 C 13.457031 18.910156 13.667969 17.605469 13.023438 16.636719 L 11.242188 13.960938 L 11.242188 3.039062 C 11.242188 2.929688 11.285156 2.824219 11.359375 2.746094 C 11.4375 2.667969 11.542969 2.625 11.652344 2.625 L 43.085938 2.625 C 43.195312 2.625 43.300781 2.667969 43.378906 2.746094 C 43.457031 2.824219 43.5 2.929688 43.5 3.039062 Z M 43.5 26.242188 "/>
									<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 40.503906 4.601562 L 27.964844 14.109375 C 27.609375 14.367188 27.128906 14.367188 26.777344 14.109375 L 14.242188 4.601562 C 13.914062 4.347656 13.441406 4.414062 13.191406 4.746094 C 12.941406 5.074219 13.003906 5.546875 13.335938 5.796875 L 25.871094 15.304688 C 26.761719 15.960938 27.980469 15.960938 28.871094 15.304688 L 41.410156 5.796875 C 41.566406 5.675781 41.671875 5.496094 41.699219 5.300781 C 41.726562 5.101562 41.675781 4.902344 41.554688 4.742188 C 41.304688 4.414062 40.832031 4.351562 40.503906 4.601562 Z M 40.503906 4.601562 "/>
									<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 20.96875 15.367188 L 13.285156 23.597656 C 13 23.898438 13.019531 24.375 13.320312 24.65625 C 13.625 24.9375 14.097656 24.921875 14.382812 24.621094 L 22.066406 16.386719 C 22.320312 16.078125 22.289062 15.628906 22 15.359375 C 21.707031 15.085938 21.253906 15.089844 20.96875 15.367188 Z M 20.96875 15.367188 "/>
									<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 33.824219 15.367188 C 33.539062 15.0625 33.066406 15.046875 32.761719 15.328125 C 32.457031 15.613281 32.441406 16.085938 32.726562 16.390625 L 40.40625 24.621094 C 40.691406 24.921875 41.164062 24.9375 41.46875 24.65625 C 41.769531 24.375 41.789062 23.898438 41.503906 23.597656 Z M 33.824219 15.367188 "/>
								</g>
							</svg>
							<span class="title">Contact Queries</span>
						</a>
					</li> -->					
					<li class="nav-item pages<?php if(isset($subModuleName) && $subModuleName == "Pages" ){echo 'activated';} ?>

					<?php if(isset($subModuleName) && $subModuleName == "homepage" ){echo 'activated open';} ?>
					<!-- <?php if(isset($subModuleName) && $subModuleName == "privacy_policy" ){echo 'activated open';} ?>
					<?php if(isset($subModuleName) && $subModuleName == "terms_and_conditions" ){echo 'activated open';} ?>
					<?php if(isset($subModuleName) && $subModuleName == "faq" ){echo 'activated open';} ?>
					<?php if(isset($subModuleName) && $subModuleName == "pricing" ){echo 'activated open';} ?>
					<?php if(isset($subModuleName) && $subModuleName == "contact" ){echo 'activated open';} ?> -->
					">
						<a href="" class="nav-link nav-toggle" >
							<svg
								xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" width="45pt" height="45pt" viewBox="0 0 45 45" version="1.1">
								<g id="surface1">
									<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 38.792969 0 L 13.351562 0 C 12.011719 0 10.917969 1.089844 10.917969 2.433594 L 10.917969 3.570312 L 9.78125 3.570312 C 8.4375 3.570312 7.347656 4.660156 7.347656 6.003906 L 7.347656 7.140625 L 6.210938 7.140625 C 4.867188 7.140625 3.773438 8.230469 3.773438 9.570312 L 3.773438 42.566406 C 3.773438 43.910156 4.867188 45 6.210938 45 L 31.648438 45 C 32.988281 45 34.082031 43.910156 34.082031 42.566406 L 34.082031 41.429688 L 35.21875 41.429688 C 36.5625 41.429688 37.652344 40.339844 37.652344 38.996094 L 37.652344 37.859375 L 38.792969 37.859375 C 40.132812 37.859375 41.226562 36.769531 41.226562 35.429688 L 41.226562 2.433594 C 41.226562 1.089844 40.132812 0 38.792969 0 Z M 31.648438 43.242188 L 6.210938 43.242188 C 5.835938 43.242188 5.53125 42.941406 5.53125 42.566406 L 5.53125 9.570312 C 5.53125 9.199219 5.835938 8.898438 6.210938 8.898438 L 25.871094 8.898438 L 25.871094 14.464844 C 25.871094 14.949219 26.265625 15.34375 26.75 15.34375 L 32.324219 15.34375 L 32.324219 42.566406 C 32.324219 42.941406 32.019531 43.242188 31.648438 43.242188 Z M 31.078125 13.585938 L 27.628906 13.585938 L 27.628906 10.136719 Z M 35.894531 38.996094 C 35.894531 39.371094 35.59375 39.671875 35.21875 39.671875 L 34.082031 39.671875 L 34.082031 14.46875 C 34.082031 14.46875 34.078125 14.453125 34.078125 14.425781 C 34.074219 14.210938 33.988281 14.007812 33.835938 13.855469 C 33.832031 13.851562 27.371094 7.394531 27.371094 7.394531 C 27.371094 7.394531 27.359375 7.386719 27.347656 7.371094 C 27.183594 7.222656 26.972656 7.136719 26.75 7.140625 L 9.105469 7.140625 L 9.105469 6.003906 C 9.105469 5.628906 9.40625 5.328125 9.78125 5.328125 L 35.21875 5.328125 C 35.59375 5.328125 35.894531 5.628906 35.894531 6.003906 Z M 39.46875 35.429688 C 39.46875 35.800781 39.164062 36.101562 38.792969 36.101562 L 37.652344 36.101562 L 37.652344 6.003906 C 37.652344 4.660156 36.5625 3.570312 35.21875 3.570312 L 12.675781 3.570312 L 12.675781 2.433594 C 12.675781 2.0625 12.980469 1.757812 13.351562 1.757812 L 38.792969 1.757812 C 39.164062 1.757812 39.46875 2.0625 39.46875 2.433594 Z M 39.46875 35.429688 "/>
								</g>
							</svg>
							<span class="title">Pages</span>
							<span class="arrow "></span>
						</a>
						<ul class="sub-menu" >
							<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "homepage" ){echo 'activated';} ?>" >
						<a href="<?php echo BACKEND_HOMESLIDER_URL ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Homepage Slider</span>
						</a>
					</li>
					<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "pricing" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_EXAMS_EDIT ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Examination Courses</span>
						</a>
					</li> 
					 <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "contact" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_ACADEMIC_LISTING ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Academic Initiatives</span>
						</a>
					</li> 
					 <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "faq" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_INTERVENTION ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Intervention</span>
						</a>
					</li> 
					 <li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "terms_and_conditions" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_PHYSICIAN ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Physician Academy</span>
						</a>
					</li>					
					<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "privacy_policy" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_PARTNERS ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Partners</span>
						</a>
					</li>
					<li class="nav-item <?php if(isset($subModuleName) && $subModuleName == "privacy_policy" ){echo 'activated';} ?>" id="categories_li">
						<a href="<?php echo BACKEND_FELLOWSHIPS ?>" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">Conferences</span>
						</a>
					</li>	
						</ul>
					</li>
					<!-- <li class="nav-item">
						<a href="<?php echo BACKEND_EVENTS_EDIT ?>" class="nav-link nav-toggle">
							<i class="fa fa-calendar"></i>
							<span class="title">Events</span>
						</a>
					</li> -->
<!-- 					<li class="nav-item">
						<a href="<?php echo BACKEND_REVIEW_LIST ?>" class="nav-link nav-toggle">
							<i class="fa fa-calendar"></i>
							<span class="title">Reviews</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo BACKEND_CONTACT_QUERIES ?>" class="nav-link nav-toggle">
							<i class="fa fa-calendar"></i>
							<span class="title">Contact Queries</span>
						</a>
					</li>	
					<li id="users_li" class="nav-item <?php echo (isset($topModuleName) && $topModuleName == "Talent")?"open":""; ?>">
						<a href="javascript:;" class="nav-link nav-toggle">
							
							<i class="fa fa-black-tie"></i>
							<span class="title">Commision/Price Settings</span>
							<span class="arrow <?php echo (isset($topModuleName) && $topModuleName == "Talent")?"open":""; ?>"></span>
							
						</a>
						<ul class="sub-menu" <?php echo (isset($topModuleName) && $topModuleName == "Talent")?"style='display:block'":""; ?>>
							<li class="nav-item <?php echo (isset($page) && $page == "talent")?"sidebar-active-menu":""; ?>">
								<a href="<?php echo BACKEND_COMMISSION_DETAIL ?>" class="nav-link ">
									<i class="icon-users" aria-hidden="true"></i>
									<span class="title">Commission Settings</span>
								</a>
							</li>
							<li class="nav-item <?php echo (isset($page) && $page == "categories")?"sidebar-active-menu":""; ?>" id="categories_li">
								<a href="<?php echo BACKEND_GO_PRO_URL ?>" class="nav-link">
									<i class="icon-users" aria-hidden="true"></i>
										<span class="title">Go Pro</span>
								</a>
							</li>
							
							
						</ul>
					</li>	
					<li class="nav-item">
						<a href="<?php echo BACKEND_PROCESS_PAYMENT_URL	 ?>" class="nav-link nav-toggle">
							<i class="fa fa-calendar"></i>
							<span class="title">Process Payment</span>
						</a>
					</li> -->
						
							
						
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url()	 ?>admin6y34q/email_subscribers" class="nav-link nav-toggle">
							<i class="fa fa-calendar"></i>
							<span class="title">Subscribers</span>
						</a>
					</li> 
					<li class="nav-item">
						<a href="javascript:void(0)" onclick="logout();" class="nav-link nav-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="48.981" height="47.049" viewBox="0 0 48.981 47.049">
							  <g id="sign-out" transform="translate(0)">
							    <path id="Path_1222" data-name="Path 1222" d="M257.723,160.051l-2.079,2.079,6.312,6.312H241.119v2.941h20.837l-6.312,6.312,2.079,2.079,9.861-9.861Z" transform="translate(-218.603 -146.388)" />
							    <path id="Path_1223" data-name="Path 1223" d="M32.346,44.108H2.941V2.941H32.346v9.381h2.941V1.47A1.469,1.469,0,0,0,33.816,0H1.47A1.469,1.469,0,0,0,0,1.47V45.579a1.469,1.469,0,0,0,1.47,1.47H33.816a1.469,1.469,0,0,0,1.47-1.47V34.727H32.346Z" transform="translate(0)" />
							  </g>
							</svg>
							<span class="title">Logout</span>
						</a>
					</li>
					
					
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
			<!-- END SIDEBAR -->
		</div>