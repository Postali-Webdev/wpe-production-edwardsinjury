/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('#awards').slick({
		dots: false,
		infinite: true,
        arrows:false,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 800,
		slidesToShow: 6,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
              breakpoint: 821,
              settings: {
                    slidesToShow: 3,
                }
            },
            {
              breakpoint: 601,
              settings: {
                    slidesToShow: 2,
                }
            }
        ]
	});

	$('.hp-results').slick({
		dots: false,
		infinite: true,
		arrows: true,
		fade: false,
		autoplay: false,
		speed: 600,
		slidesToShow: 4,
		slidesToScroll: 1,
		swipeToSlide: true,
		cssEase: 'ease-in-out',
		prevArrow: $('.hp-results-prev'),
		nextArrow: $('.hp-results-next'),
		responsive: [
			{
				breakpoint: 1025,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 601,
				settings: {
					slidesToShow: 1.2,
                    arrows:false,
                    dots:true,
                    autoplay: true,
                    speed: 2000,
				}
			}
		]
	});

	$('.media-logos').slick({
		speed: 9000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        infinite: true,
        arrows:false
	});

	// Overflow cards: act as a horizontal slick scroller on mobile only (<= 600px)
	function initOverflowCardsSlider() {
		var $slider = $('.overflow-cards');
		if (!$slider.length) {
			return;
		}

		if ($(window).width() <= 600) {
			if (!$slider.hasClass('slick-initialized')) {
				$slider.slick({
					dots: false,
					arrows: false,
					infinite: true,
					autoplay: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					swipeToSlide: true,
					cssEase: 'ease-in-out',
					speed: 800
				});
			}
		} else if ($slider.hasClass('slick-initialized')) {
			$slider.slick('unslick');
		}
	}

	initOverflowCardsSlider();
	$(window).on('resize', initOverflowCardsSlider);

});