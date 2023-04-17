       <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="<?php echo BACKEND_TALENT_URL ?>">
                            <img src="<?php echo ASSET_IMAGES_BACKEND_DIR ?>main-logo.png" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                            <form style="display:none" class="search-form" action="extra_search.php" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search here" name="query">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn md-skip submit">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END HEADER SEARCH BOX -->
                            
                            <!-- BEGIN USER PROFILE -->
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img src="<?php echo (!empty($common_data['user_data']['image']))? ASSET_UPLOADS_BACKEND_DIR.'users/'.$common_data['user_data']['image']:  ASSET_IMAGES_BACKEND_DIR.'profile-placeholder.png'?>" alt=""> </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <li>
                                        <a href="<?php echo BACKEND_EDIT_PROFILE_URL ?>">
                                            <i class="icon-user-following"></i> Edit Profile
                                            <!-- <span class="badge badge-danger">1</span> -->
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BACKEND_CHANGE_PASSWORD_URL ?>">
                                            <i class="icon-lock"></i> Change Password
                                            <!-- <span class="badge badge-danger">1</span> -->
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="logout();">
                                            <i class="icon-key"></i> Log Out </a>
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
                            </div>
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
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
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="<?php echo $moduleLink ?>"><?php echo $moduleName ?></a>
                        </li>
						<?php if (isset($subModuleName) && !empty($subModuleName)){?>
                        <li><?php echo $subModuleName ?></li>
						<?php } ?>
                    </ul>
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
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                         <!--   <li class="nav-item start" id="dashboard_li">
                                <a href="<?php //echo BACKEND_DASHBOARD_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>   -->                        
							<li id="users_li" class="nav-item <?php echo (isset($moduleName) && $moduleName == "Users")?"open":""; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title">Users</span>
									<span class="arrow"></span>
									<!--<?php if(isset($common_data['users_count']['total_users']) && $common_data['users_count']['total_users'] != 0){ ?>
                                    <span class="badge badge-danger badge-main-bar"><?php echo $common_data['users_count']['total_users'] ?></span>
									<?php } ?>
									<span class="arrow <?php echo (isset($moduleName) && $moduleName == "Users")?"open":""; ?>"></span>-->
                                </a>
								<ul class="sub-menu" <?php echo (isset($moduleName) && $moduleName == "Users")?"style='display:block'":""; ?>>
                                    <li class="nav-item <?php echo (isset($page) && $page == "talent")?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_TALENT_URL ?>" class="nav-link ">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            <span class="title">Talent</span>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo (isset($page) && $page == "employee")?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_EMPLOYEE_URL ?>" class="nav-link ">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <span class="title">Employer</span>
									<!--<?php if(isset($common_data['users_count']['total_users']) && $common_data['users_count']['total_users'] != 0){ ?>
                                    <span class="badge badge-danger badge-main-bar"><?php echo $common_data['users_count']['total_users'] ?></span>
									<?php } ?>-->
                                        </a>
                                    </li>
								</ul>
                            </li>
                            <!--<li class="nav-item" id="ads_li">
                                <a href="<?php //echo BACKEND_ADS_URL?>" class="nav-link nav-toggle">
                                    <i class="icon-bullhorn fa fa-bullhorn"></i>
                                    <span class="title">Ads</span>
                                </a>
                            </li>-->

                            <li class="nav-item" id="categories_li">
                                <a href="<?php echo BACKEND_CATEGORIES_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-tag"></i>
                                    <span class="title">Talent Categories</span>
                                </a>
                            </li>
							<li class="nav-item" id="price_package_li">
                                <a href="<?php echo BACKEND_PAYMENT_PACKAGES_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-wallet"></i>
                                    <span class="title">Price Packages</span>
                                </a>
                            </li>
							<li class="nav-item" id="coupon_li">
                                <a href="<?php echo BACKEND_COUPON_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-present"></i>
                                    <span class="title">Coupon Codes</span> 
                                </a>
							</li>
							<li class="nav-item" id="job_li">
                                <a href="<?php echo BACKEND_JOBS_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Jobs</span> 
                                </a>
							</li>
							<li class="nav-item" id="transaction_li">
                                <a href="<?php echo BACKEND_TRANSACTIONS_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-credit-card"></i>
                                    <span class="title">Talent Transactions</span> 
                                </a>
							</li>
							<li id="ads_li" class="nav-item <?php echo (isset($moduleName) && $moduleName == "Ads")?"open":""; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-bullhorn fa fa-bullhorn"></i>
                                    <span class="title">Ads</span>
									<span class="arrow"></span>
                                </a>
								<ul class="sub-menu" <?php echo (isset($moduleName) && $moduleName == "Ads")?"style='display:block'":""; ?>>
                                    <li class="nav-item <?php echo (isset($page) && $page == "website-ads")?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_ADS_URL ?>" class="nav-link ">
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            <span class="title">Website Ads</span>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo (isset($page) && $page == "youtube-ads")?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_YOUTUBE_ADS_URL ?>" class="nav-link ">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                            <span class="title">YouTube Ads</span>
                                        </a>
                                    </li>
								</ul>
                            </li>
							<!--<li class="nav-item" id="ads_li">
                                <a href="<?php echo BACKEND_ADS_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-bullhorn fa fa-bullhorn"></i>
                                    <span class="title">Ads</span> 
                                </a>
							</li>-->
                            <li class="nav-item" id="contact_li">
                                <a href="<?php echo BACKEND_CONTACT_US_URL ?>" class="nav-link nav-toggle">
                                    <i class="icon-call-end"></i>
                                    <span class="title">Contact</span>
                                </a>
                            </li>
							<li class="nav-item" id="pages_li">
                                <a href="javascript:void(0)" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title">Pages</span>
									<span class="arrow"></span>
                                </a>
								
								<ul class="sub-menu">
                                    <li class="nav-item <?php echo (isset($page_id) && $page_id == TERMS_CONDITIONS_ID)?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_PAGES_URL."/".TERMS_CONDITIONS_ID ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">Terms And Conditions</span>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo (isset($page_id) && $page_id == PRIVACY_POLICY_ID)?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_PAGES_URL."/".PRIVACY_POLICY_ID ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">Privacy Policy</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo (isset($page_id) && $page_id == HOW_IT_WORKS_ID)?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_PAGES_URL."/".HOW_IT_WORKS_ID ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">How it works</span>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo (isset($page) && $page == "about-us")?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_ABOUT_SECTIONS ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">About Us</span>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo ((isset($page) && $page == 'home-slider') || (isset($page) && $page == 'home-about'))?$page:""; ?>">
                                        <a href="<?php echo BACKEND_PAGES_URL."/".HOMEPAGE ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">Homepage</span>
											<span class="arrow"></span>
                                        </a>
										<ul class="sub-menu" <?php echo ((isset($page) && $page == 'home-slider') || (isset($page) && $page == 'home-about')) ? "style='display:block;'":""; ?>>
											<li class="nav-item <?php echo (isset($page) && $page == 'home-slider')?"sidebar-active-menu":""; ?>">
												<a href="<?php echo BACKEND_HOMESLIDER_URL ?>" class="nav-link ">
													<i class="icon-layers"></i>
													<span class="title">Homepage Slider</span>
												</a>
											</li>
											<li class="nav-item <?php echo (isset($page) && $page == 'home-about')?"sidebar-active-menu":""; ?>">
												<a href="<?php echo BACKEND_HOME_ABOUT_SECTIONS ?>" class="nav-link ">
													<i class="icon-layers"></i>
													<span class="title">About Sections</span>
												</a>
											</li>
										</ul>
                                    </li>
									
									<li class="nav-item <?php echo (isset($page_id) && $page_id == CONTACT_US)?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_PAGES_URL."/".CONTACT_US ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">Contact Us</span>
                                        </a>
                                    </li>
									 <li class="nav-item <?php echo (isset($page_id) && $page_id == FAQS_ID)?"sidebar-active-menu":""; ?>">
                                        <a href="<?php echo BACKEND_FAQ_PAGES_URL."/".FAQS_ID ?>" class="nav-link ">
                                            <i class="icon-layers"></i>
											<span class="title">FAQs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
							<li class="nav-item" id="settings_li">
                                <a href="#." class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Settings</span>
									<span class="arrow"></span>
                                </a>
                                <ul class="sub-menu" <?php echo (isset($page) && $page == 'general'  ? "style='display:block;'":""); ?>>
                                        <li class="nav-item <?php echo (isset($page) && $page == 'general')?"sidebar-active-menu":""; ?>">
                                                <a href="<?php echo BACKEND_SETTINGS_URL ?>" class="nav-link ">
                                                        <i class="icon-layers"></i>
                                                        <span class="title">General Settings</span>
                                                </a>
                                        </li>
                                        <li class="nav-item <?php echo (isset($page) && $page == 'settings')?"sidebar-active-menu":""; ?>">
                                                <a href="<?php echo BACKEND_TALENT_SETTINGS_URL ?>" class="nav-link ">
                                                        <i class="icon-layers"></i>
                                                        <span class="title">Talent Settings</span>
                                                </a>
                                        </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" onclick="logout();" class="nav-link nav-toggle">
                                    <i class="icon-key"></i>
                                    <span class="title">Logout</span>
                                </a>
                            </li>

                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>