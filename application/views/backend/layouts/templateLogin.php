<!DOCTYPE html>
<html lang="en">
<!--
Project Name: Plaany
Project URI: 
Description: 
Author: Zohaib Shahid
Author URI: 
Version: 1.0
Created: December 06, 2015
Last Modified: November 30, 2017

-->
	<head>
		<?php $this->load->view('backend/elements/login/head'); ?>
	</head>
	<body class="login">
		<?php echo (isset($body_content))?$body_content:''; ?>
		<?php $this->load->view('backend/elements/login/footer'); ?>
		<?php 
		//This line of code will enable js functions to call CI's XAJAX functions
		echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
		?>
	</body>
</html>
