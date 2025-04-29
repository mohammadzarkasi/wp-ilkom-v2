// Wait DOM
jQuery(document).ready(function($) {
	// ########## About screen ##########
	$('.wt-demo-video').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('wt-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('wt-mfp-shown');
			}
		}
	});
	// ########## Custom CSS screen ##########
	$('.wt-custom-css-originals a').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('wt-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('wt-mfp-shown');
			}
		}
	});
	// Enable ACE editor
	if ($('#sunrise-field-custom-css-editor').length > 0) {
		var editor = ace.edit('sunrise-field-custom-css-editor'),
			$textarea = $('#sunrise-field-custom-css').hide();
		editor.getSession().setValue($textarea.val());
		editor.getSession().on('change', function() {
			$textarea.val(editor.getSession().getValue());
		});
		editor.getSession().setMode('ace/mode/css');
		editor.setTheme('ace/theme/monokai');
		editor.getSession().setUseWrapMode(true);
		editor.getSession().setWrapLimitRange(null, null);
		editor.renderer.setShowPrintMargin(null);
		editor.session.setUseSoftTabs(null);
	}
	// ########## Add-ons screen ##########
	var addons_timer = 0;
	$('.wt-addons-item').each(function() {
		var $item = $(this),
			delay = 300;
		$item.click(function(e) {
			window.open($(this).data('url'));
			e.preventDefault();
		});
		addons_timer = addons_timer + delay;
		window.setTimeout(function() {
			$item.addClass('animated bounceIn').css('visibility', 'visible');
		}, addons_timer);
	});
	// ########## Examples screen ##########
	// Disable all buttons
	$('#wt-examples-preview').on('click', '.wt-button', function(e) {
		if ($(this).hasClass('wt-example-button-clicked')) alert(wt_options_page.not_clickable);
		else $(this).addClass('wt-example-button-clicked');
		e.preventDefault();
	});
	var open = $('#wt_open_example').val(),
		nonce = $('#wt_examples_nonce').val(),
		$example_window = $('#wt-examples-window'),
		$example_preview = $('#wt-examples-preview');
	$('.wt-examples-group-title, .wt-examples-item').each(function() {
		var $item = $(this),
			delay = 200;
		if ($item.hasClass('wt-examples-item')) {
			$item.on('click', function(e) {
				var code = $(this).data('code'),
					id = $(this).data('id');
				$item.magnificPopup({
					type: 'inline',
					alignTop: true,
					callbacks: {
						open: function() {
							// Change z-index
							$('body').addClass('wt-mfp-shown');
						},
						close: function() {
							// Change z-index
							$('body').removeClass('wt-mfp-shown');
							$example_preview.html('');
						}
					}
				});
				var wt_example_preview = $.ajax({
					url: ajaxurl,
					type: 'get',
					dataType: 'html',
					data: {
						action: 'wt_example_preview',
						code: code,
						id: id,
						nonce: nonce
					},
					beforeSend: function() {
						if (typeof wt_example_preview === 'object') wt_example_preview.abort();
						$example_window.addClass('wt-ajax');
						$item.magnificPopup('open');
					},
					success: function(data) {
						$example_preview.html(data);
						$example_window.removeClass('wt-ajax');
					}
				});
				e.preventDefault();
			});
			// Open preselected example
			if ($item.data('id') === open) $item.trigger('click');
		}
	});
	$('#wt-examples-window').on('click', '.wt-examples-get-code', function(e) {
		$(this).hide();
		$(this).parent('.wt-examples-code').children('textarea').slideDown(300);
		e.preventDefault();
	});
	// ########## Cheatsheet screen ##########
	$('.wt-cheatsheet-switch').on('click', function(e) {
		$('body').toggleClass('wt-print-cheatsheet');
		e.preventDefault();
	});
});