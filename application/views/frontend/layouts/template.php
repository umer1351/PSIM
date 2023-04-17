<!DOCTYPE html>

<html lang="en">

	<head>

		<?php $this->load->view('frontend/elements/head'); ?>

	</head>

	<body class="<?php echo (isset($page))? $page:""; ?>">

  <?php $this->load->view('frontend/elements/header'); ?>


		<?php echo (isset($body_content))?$body_content:""; ?>

		 <?php echo (isset($modal))?$modal:""; ?>

        <?php $this->load->view('frontend/elements/footer'); ?>

	</body>

</html>

