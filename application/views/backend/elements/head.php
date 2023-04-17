<!--************************* HEAD <Start> ************************* -->
<meta charset="utf-8" />
<title><?php echo 'PSIM'; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta name="description" content="PSIM - Admin panel">
<meta property="og:url"           content="" />
<meta property="og:type"          content="Website" />
<meta property="og:title"         content="PSIM - Admin panel" />
<meta property="og:description"   content="" />
<meta property="og:image"         content="https://dev.appstersinc.com/plaany/plaany_web/assets/frontend/img/logo.svg" />
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- <link rel="shortcut icon" href="<?php echo ASSET_IMAGES_BACKEND_DIR; ?>favicon.png"/> -->
<link rel="shortcut icon" href="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>favicon.png" />

<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
 <script src="https://cdn.tiny.cloud/1/q9r99nxbrk12h3k59bshcm417ilocu5ouzk8i55395xzxdiz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea#Details',
      height: 600,
      width: 800,
      plugins: ' advcode casechange export  linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable  ',
      toolbar: '  casechange checklist code   pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
  <script>
    tinymce.init({
      selector: 'textarea#DetailsAcademic',
      height: 600,
      width: 800,
      plugins: ' advcode casechange export  linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable  ',
      toolbar: '  casechange checklist code   pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
<style type="text/css">
	.d-none{
		display: none !important;

	}
	.red{
		color: red !important;
	}
</style>
<?php
	//CSS FILES
	
	$font_awesome = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'plugin/font-awesome/css/font-awesome.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($font_awesome);
	$simple_line_icon = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'plugin/simple-line-icons/simple-line-icons.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($simple_line_icon);
	$bootstrap = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap);
	$bootstrap_switch = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-switch.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_switch);
	$bootstrap_fileinput = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-fileinput.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_fileinput);
	$bootstrap_taginput = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-tagsinput.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_taginput);
	$bootstrap_taginput_type_ahead = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-tagsinput-typeahead.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_taginput_type_ahead);
	$bootstrap_daterange = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'daterangepicker.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_daterange);
	$bootstrap_datepicker = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-datepicker3.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_datepicker);
	$bootstrap_timepicker = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-timepicker.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_timepicker);
	$bootstrap_datetimepicker = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'bootstrap-datetimepicker.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($bootstrap_datetimepicker);
	$clockface = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'clockface.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($clockface);
	$morris = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'morris.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($morris);
	$fullcalendar = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'fullcalendar.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($fullcalendar);
	$jqvmap = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'jqvmap.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($jqvmap);
	$dropzone = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'dropzone.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($dropzone);
	$basic = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'basic.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($basic);
	$cubeportfolio = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'cubeportfolio.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($cubeportfolio);
	$components = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'components.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($components);
	$plugins = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'plugins.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($plugins);
	$profile = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'profile.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($profile);
	$portfolio = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'portfolio.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($portfolio);
	$layout = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'layout.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($layout);
	$custom = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'custom.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($custom);
 	$dataTables = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'plugin/datatables/datatables.min.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($dataTables);  
	$custom_style = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'custom-styles.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);
	echo link_tag($custom_style);
	$rateyo = array(
			  'href' => ASSET_CSS_BACKEND_DIR.'jquery.rateyo.css',
			  'rel' => 'stylesheet',
			  'type' => 'text/css'
	);

	echo link_tag($rateyo);

?>
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.min.js"></script> <!-- Jquery -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
    jQuery('#account_select_service').select2();
});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
<!--************************* HEAD <End> ************************* -->
