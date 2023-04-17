<!DOCTYPE html>
<html lang="en">
<!--
Project Name: Stop Type 02
Project URI: 
Description: 
Author: 
Author URI: 
Version: 1.0
Created: September 09, 2016
Last Modified: 
-->
	<head>
		<?php  $this->load->view('backend/elements/head'); ?>
	</head>
	<body class="<?php echo (isset($page) && !empty($page) && $page == "pages") ? 'page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-full-width':'page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'?>">
		<?php $this->load->view('backend/elements/headerSurveys'); ?>
		<?php echo (isset($body_content))?$body_content:''; ?>
		<?php echo (isset($modal))?$modal:''; ?>
        <?php $this->load->view('backend/elements/footer'); ?>
	</body>
</html>
<?php 
//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>