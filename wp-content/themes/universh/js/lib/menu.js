!function(a){"use strict";var b,c={action:function(){},runOnLoad:!1,duration:500},d=c,e=!1,f={};f.init=function(){for(var b=0;b<=arguments.length;b++){var c=arguments[b];switch(typeof c){case"function":d.action=c;break;case"boolean":d.runOnLoad=c;break;case"number":d.duration=c}}return this.each(function(){d.runOnLoad&&d.action(),a(this).resize(function(){f.timedAction.call(this)})})},f.timedAction=function(a,c){var f=function(){var a=d.duration;if(e){var c=new Date-b;if(a=d.duration-c,0>=a)return clearTimeout(e),e=!1,void d.action()}g(a)},g=function(a){e=setTimeout(f,a)};b=new Date,"number"==typeof c&&(d.duration=c),"function"==typeof a&&(d.action=a),e||f()},a.fn.afterResize=function(a){return f[a]?f[a].apply(this,Array.prototype.slice.call(arguments,1)):f.init.apply(this,arguments)}}(jQuery);
// Theme
window.theme = {};


// Menu
(function(theme, $) {
	
	"use strict";

	theme = theme || {};

	var initialized = false;

	$.extend(theme, {

		Nav: {

			defaults: {
				wrapper: $('#mainMenu'),
				mobileMenuScroll: true,
				fixParentItems: true,
				scrollDelay: 600,
				scrollAnimation: 'easeOutQuad'
			},

			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}

				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, this.$wrapper.data('plugin-options'));

				return this;
			},

			build: function() {
				// Responsive Menu Events
				this.responsiveNavFixes();

				// Mega Menu
				this.megaMenu();

				// Scroll to Current Item
				this.mobileMenuScroll();

				// Withput Submenu
				this.fixParentItems();

				return this;
			},

			events: function() {
				var self = this;

				// Mobile Redirect - (Avoid the Dropdown from Bootstrap)
				$('.mobile-redirect').on('click', function() {
					if ($(window).width() < 991) {
						self.location = $(this).attr('href');
					}
				});

				// Anchors Position
				$('[data-hash]').on('click', function(e) {
					e.preventDefault();

					$('body').addClass('scrolling');
					var target = $(this).attr('href')
						delay = 0;

					if($(document).scrollTop() == 0) {
						$(document).scrollTop($('#header').height());
						delay = 200;
					}

					setTimeout(function() {

						if ($(window).width() < 991 && $('.nav-main-collapse').hasClass('in')) {
							$('.nav-main-collapse').collapse('hide');
							self.scrollToTarget(target);
							return this;
						}

						self.scrollToTarget(target);

					}, 200);

					return this;
				});

				return this;
			},

			scrollToTarget: function(target) {
				var self = this,
					header = $('#header'),
					headerHeight = header.height(),
					topGap = headerHeight;

				$('html, body').animate({
					scrollTop: $(target).offset().top - topGap
				}, self.options.scrollDelay, self.options.scrollAnimation, function() {
					$('body').removeClass('scrolling');
				});

				return this;
			},

			responsiveNavFixes: function() {
				var self = this,
					addActiveClass = false;

				self.$wrapper.find('.dropdown-toggle[href]:not([href=#])').each(function() {
					$(this)
						.addClass('disabled')
						.parent()
						.prepend(
							$('<a />')
								.addClass('dropdown-toggle extra')
								.attr('href', '#')
								.append(
									$('<i />')
										.addClass('fa fa-caret-down')
								)
						);
				});

				self.$wrapper.find('li.dropdown > a:not(.disabled), li.dropdown-submenu > a:not(.disabled)').on('click', function(e) {

					e.preventDefault();

					if ($(window).width() > 991) {
						return this;
					}

					addActiveClass = $(this).parent().hasClass('resp-active');

					self.$wrapper.find('.resp-active').removeClass('resp-active');

					if (!addActiveClass) {
						$(this).parents('li').addClass('resp-active');
					}

					return this;

				});
			},

			megaMenu: function() {
				$(document).on('click', '.mega-menu .dropdown-menu', function(e) {
					e.stopPropagation()
				});
			},

			mobileMenuScroll: function() {
				var self = this;

				this.$wrapper.find('> li > a:not(.disabled)').on('click', function() {
					if ($(window).width() < 991 && self.options.mobileMenuScroll && !$('body').hasClass('sticky-menu-active') && !$('#header').hasClass('fixed')) {
						$('html, body').animate({
							scrollTop: $(this).offset().top
						}, 600, 'easeOutQuad');
					}
				});
			},

			fixParentItems: function() {
				if (!this.options.fixParentItems) {
					return this;
				}

				this.$wrapper.find('> li.dropdown').each(function() {
					if (!$(this).find('ul').get(0)) {
						$(this).removeClass('dropdown');
						$(this).find('.dropdown-toggle').removeClass('dropdown-toggle');
					}
				});
			}

		}

	});

}).apply(this, [window.theme, jQuery]);


// Sticky Menu
(function(theme, $) {
	
	"use strict";

	theme = theme || {};

	var initialized = false;

	$.extend(theme, {

		StickyMenu: {

			defaults: {
				wrapper: $('#header'),
				stickyEnabled: true,
				stickyEnableOnBoxed: true,
				stickyEnableOnMobile: true,
				stickyWithGap: true,
				stickyChangeLogoSize: true,
				stickyBodyPadding: true,
				menuAfterHeader: false,
				alwaysStickyEnabled: false,
				logoPaddingTop: 28,
				logoSmallWidth: 82,
				logoSmallHeight: 40
			},

			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}

				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, this.$wrapper.data('plugin-options'));

				return this;
			},

			build: function() {
				if (!this.options.stickyEnableOnBoxed && $('body').hasClass('boxed') || !this.options.stickyEnabled) {
					return this;
				}

				var self = this,
					$body = $('body'),
					$header = self.$wrapper,
					$headerContainer = $header.parent(),
					$headerNavItems = $header.find('ul.nav-main > li > a'),
					$logoWrapper = $header.find('.logo'),
					$logo = $logoWrapper.find('img'),
					logoWidth = $logo.attr('width'),
					logoHeight = $logo.attr('height'),
					logoPaddingTop = parseInt($logo.attr('data-sticky-padding') ? $logo.attr('data-sticky-padding') : self.options.logoPaddingTop),
					logoSmallWidth = parseInt($logo.attr('data-sticky-width') ? $logo.attr('data-sticky-width') : self.options.logoSmallWidth),
					logoSmallHeight = parseInt($logo.attr('data-sticky-height') ? $logo.attr('data-sticky-height') : self.options.logoSmallHeight),
					headerHeight = $header.height(),
					stickyGap = 0;

				if (this.options.menuAfterHeader) {
					$headerContainer.css('min-height', $header.height());
				}

				$(window).afterResize(function() {
					$headerContainer.css('min-height', $header.height());
				});

				self.checkStickyMenu = function() {

					if ((!self.options.stickyEnableOnBoxed && $body.hasClass('boxed')) || ($(window).width() < 991 && !self.options.stickyEnableOnMobile)) {
						self.stickyMenuDeactivate();
						$header.removeClass('fixed')
						return false;
					}

					if (self.options.stickyWithGap) {
						stickyGap = ((headerHeight - 15) - logoSmallHeight);
					} else {
						stickyGap = 0;
					}

					// Menu After Header
					if (!this.options.menuAfterHeader) {

						if ($(window).scrollTop() > stickyGap) {
							self.stickyMenuActivate();
						} else {
							self.stickyMenuDeactivate();
						}

					} else {

						if ($(window).scrollTop() > $headerContainer.offset().top) {
							$header.addClass('fixed');
						} else {
							$header.removeClass('fixed');
						}

					}

				}

				self.stickyMenuActivate = function() {

					if ($body.hasClass('sticky-menu-active')) {
						return false;
					}

					$logo.stop(true, true);

					$body.addClass('sticky-menu-active').removeClass('sticky-menu-deactive');

					if (self.options.stickyBodyPadding) {
						$body.css('padding-top', headerHeight);
					}

					// Flat Menu Items
					if ($header.hasClass('flat-menu')) {
						$headerNavItems.addClass('sticky-menu-active');
					}

					if (self.options.stickyChangeLogoSize) {

						$logoWrapper.addClass('logo-sticky-active');

						$logo.animate({
							width: logoSmallWidth,
							height: logoSmallHeight,
							top: logoPaddingTop + 'px'
						}, 200, function() {
							$.event.trigger({
								type: "stickyMenu.active"
							});						
						});

					}

				}

				self.stickyMenuDeactivate = function() {

					if ($body.hasClass('sticky-menu-active')) {

						$body.removeClass('sticky-menu-active').addClass('sticky-menu-deactive');

						if (self.options.stickyBodyPadding) {
							$body.css('padding-top', 0);


						}

						// Flat Menu Items
						if ($header.hasClass('flat-menu')) {
							$headerNavItems.removeClass('sticky-menu-active');
						}

						if (self.options.stickyChangeLogoSize) {

							$logoWrapper.removeClass('logo-sticky-active');

							$logo.animate({
								width: logoWidth,
								height: logoHeight,
								top: '0px'
							}, 200, function() {
								$.event.trigger({
									type: "stickyMenu.deactive"
								});						
							});

						}

					}

				}

				if (!self.options.alwaysStickyEnabled) {

					$body.addClass('sticky-menu-deactive');

					self.checkStickyMenu();

				} else {

					$body.addClass('sticky-menu-active always-sticky').removeClass('sticky-menu-deactive');

					if (self.options.stickyBodyPadding) {
						$body.css('padding-top', headerHeight);
					}

				}

				return this;
			},

			events: function() {
				var self = this;

				if (!this.options.stickyEnableOnBoxed && $('body').hasClass('boxed') || !this.options.stickyEnabled) {
					return this;
				}

				if (!self.options.alwaysStickyEnabled) {
					$(window).on('scroll resize', function() {
						self.checkStickyMenu();
					});
				}

				return this;
			}

		}

	});

}).apply(this, [window.theme, jQuery]);


// Commom Partials
(function($) {

	'use strict';

	// Sticky Menu
	if (typeof theme.StickyMenu !== 'undefined') {
		theme.StickyMenu.initialize();
	}

	// Nav Menu
	if (typeof theme.Nav !== 'undefined') {
		theme.Nav.initialize();
	}
	
		// Account
	if (typeof theme.Account !== 'undefined') {
		theme.Account.initialize();
	}
	
}).apply(this, [jQuery]);



/* Active Class for Menu */
$(function() {
	"use strict";
	 var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
	 $("#header nav ul li a").each(function(){
		  if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
			  $(this).addClass("active");
			  var parent = $(this).parents('.dropdown');
			  $("#header nav ul li").removeClass('active');
			  $(parent).addClass('active');
		  }
	 })
});
