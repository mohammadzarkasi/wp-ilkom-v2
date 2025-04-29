jQuery(document).ready(function($) {
	 	
	  "use strict";	
	  if($('#page_template').length > 0){
		$('#page_template').live('change', function(){

			if( $(this).val() == 'page-templates/one-page.php'  ){
				$('#universh_onepage_meta_box').show();
				$('#universh_meta_box').hide();
			}else{
				$('#universh_onepage_meta_box').hide();
			}

			return false;
		})

		$('#page_template').trigger('change');
	}		    
	
});
