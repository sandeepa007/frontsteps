<div class="wrap">
<img src="<?php echo get_template_directory_uri()."/img/dashbord-logo.png";?>" />
<h2>Import Demo</h2>

<div style="margin-top:-5px;">
	<input type="button" class="button-primary setuppages" value="Import Demo">
</div>
<div class="clear"></div>

<small>Note: Permalink Settings should be set to Post name for the menu structure to function correctly.</small>

<div class="clear"></div>
<span class="spinner" style="float:left;"></span>
<div class="clear"></div>
</div>

<div id="dlg-result" style="display:none; width:600px">
	<div id="dlg-txtresult" style="padding:10px; height:300px; overflow: auto"></div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		var template = '{{#logs}}<div class="default-page {{#success}}success{{/success}}{{^success}}failure{{/success}}">{{&msg}}</div>{{/logs}}';
	
		//$("#tabs").tabs();
		$(".setuppages").on("click", function () {
			if (confirm("Are you sure you want to setup the default pages?\nThis will overwrite any changes you might have made on default pages!") ) {
                
                $(".spinner").addClass("is-active");
				// $('#dlg-result').dialog({width:700});
				// $('#dlg-txtresult').html('<h5>Processing, do not close this window !</h5>');
				$('.setuppages').attr('disabled',true);
				
				$.ajax({
				    url: "<?php echo get_template_directory_uri()."/inc/import-data.php";?>",
				    //dataType: 'jsonp',
				    	success:  function(data, textStatus, xhr){
				    		
				    		if(xhr.status == 200)
				    		{
									var url = "<?php echo get_template_directory_uri()."/inc/import-complete.init";?>";
									$.ajax({
										dataType: "json",
										type: "GET",
										url: url,          
										success: function( data ) { 
											
											$.each(data, function(i,v) {
												var type = v.success ? 'success' : 'failure';

												$('#wpbody-content').append( '<div class="default-page '+type+'">'+v.msg+'</div>' ); 
											});
					                        
					                        $(".spinner").removeClass("is-active");

											$('#wpbody-content').append('<b>Done!</b>');

											$('.setuppages').hide();
											
										},
										error: function() {
					                        $(".spinner").removeClass("is-active");
											$('#wpbody-content').append( "Unexpected error, please try again later." );
											$('.setuppages').removeAttr('disabled');
										}
									});
								}
								else
								{
									$(".spinner").removeClass("is-active");
									$('#wpbody-content').append( "Unexpected error, please try again later." );
									$('.setuppages').removeAttr('disabled');
								}
    						}
						});
				}
		}); 
	});
</script>
