<!--************************* FOOTER <Start> ************************* -->
<footer>
</footer>

<!--SCRIPT FILES -->

<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.min.js"></script> <!-- Jquery -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap.min.js"></script> <!-- Bootstrap -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.slimscroll.min.js"></script> <!-- jquery slim scroll -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.blockui.min.js"></script> <!-- jquery block ui -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-switch.min.js"></script> <!-- bootstrap switch -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.validate.min.js"></script> <!-- jquery validate -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>additional-methods.min.js"></script> <!-- additional methods -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>select2.full.min.js"></script> <!-- select2 -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.backstretch.min.js"></script> <!-- jquery backstretch -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>app.min.js"></script> <!-- app -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>login/login-5.js"></script> <!-- login-4 -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>script.js"></script> <!-- theme Script -->
<?php 

//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>
<!--************************* FOOTER <End> ************************* -->
<script>
$("input").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        $("form").submit();
    }
});
</script>

<?php 
/* End of file footer.php */
/* Location: ./application/views/backend/elements/footer.php */
?>