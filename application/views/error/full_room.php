<LINK REL=StyleSheet HREF="<?php echo base_url();?>styles/basic.css" TYPE="text/css" MEDIA=screen>
<script src="<?php echo base_url();?>js/my.script.js"></script>
<script src="<?php echo base_url();?>js/jquery.simplemodal.js"></script>
	

		<div id="basic-modal-content">
			<h3>Full Memory</h3>
			<p>You are favorite photos full</p>	
			<p>You can un favorite in favorites page</p>	
			<p><a href='./favorites'>Going to favorites</a></p>
		</div>
		
		
<script>
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	/*$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});*/
	$('#basic-modal-content').modal();
});
</script>
		