jQuery(document).ready(function ($) {
	// Prepare items arrays for lightbox
	$('.wt-lightbox-gallery').each(function () {
		var slides = [];
		$(this).find('.wt-slider-slide, .wt-carousel-slide, .wt-custom-gallery-slide').each(function (i) {
			$(this).attr('data-index', i);
			slides.push({
				src: $(this).children('a').attr('href'),
				title: $(this).children('a').attr('title')
			});
		});
		$(this).data('slides', slides);
	});
	// Enable sliders
	$('.wt-slider').each(function () {
		// Prepare data
		var $slider = $(this);
		// Apply Swiper
		var $swiper = $slider.swiper({
			wrapperClass: 'wt-slider-slides',
			slideClass: 'wt-slider-slide',
			slideActiveClass: 'wt-slider-slide-active',
			slideVisibleClass: 'wt-slider-slide-visible',
			pagination: '#' + $slider.attr('id') + ' .wt-slider-pagination',
			autoplay: $slider.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $slider.data('mousewheel'),
			speed: $slider.data('speed'),
			calculateHeight: $slider.hasClass('wt-slider-responsive-yes'),
			loop: true
		});
		// Prev button
		$slider.find('.wt-slider-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$slider.find('.wt-slider-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable carousels
	$('.wt-carousel').each(function () {
		// Prepare data
		var $carousel = $(this),
			$slides = $carousel.find('.wt-carousel-slide');
		// Apply Swiper
		var $swiper = $carousel.swiper({
			wrapperClass: 'wt-carousel-slides',
			slideClass: 'wt-carousel-slide',
			slideActiveClass: 'wt-carousel-slide-active',
			slideVisibleClass: 'wt-carousel-slide-visible',
			pagination: '#' + $carousel.attr('id') + ' .wt-carousel-pagination',
			autoplay: $carousel.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $carousel.data('mousewheel'),
			speed: $carousel.data('speed'),
			slidesPerView: ($carousel.data('items') > $slides.length) ? $slides.length : $carousel.data('items'),
			slidesPerGroup: $carousel.data('scroll'),
			calculateHeight: $carousel.hasClass('wt-carousel-responsive-yes'),
			loop: true
		});
		// Prev button
		$carousel.find('.wt-carousel-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$carousel.find('.wt-carousel-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable lightbox
	$('.wt-lightbox-gallery').on('click', '.wt-slider-slide, .wt-carousel-slide, .wt-custom-gallery-slide', function (e) {
		e.preventDefault();
		var slides = $(this).parents('.wt-lightbox-gallery').data('slides');
		$.magnificPopup.open({
			items: slides,
			type: 'image',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1],
				tPrev: wt_magnific_popup.prev,
				tNext: wt_magnific_popup.next,
				tCounter: wt_magnific_popup.counter
			},
			tClose: wt_magnific_popup.close,
			tLoading: wt_magnific_popup.loading
		}, $(this).data('index'));
	});
});