/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    // window width
    var winWidth = $(window).width();

    // mobile menu breakpoint
    if (winWidth <= 1024) {
        // set all needed classes when we start
        $('.sub-menu').addClass('closed');

        //Hamburger animation
        $('.toggle-nav').click(function() {
            $(this).toggleClass('active');
            $('.menu').toggleClass('opened');
            $('.menu').toggleClass('active'); 
            $('.sub-menu').removeClass('opened');
            $('.sub-menu').addClass('closed');
            return false;
        });

        //Close navigation on anchor tap
        $('.active').click(function() {	
            $('.menu').addClass('closed');
            $('.menu').toggleClass('opened');
            $('.menu .sub-menu').removeClass('opened');
            $('.menu .sub-menu').addClass('closed');
        });	

        //Mobile menu accordion toggle for sub pages
        $('.menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-chevron-right"></span></div>');
        $('.menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');

        //Mobile menu accordion toggle for third-level pages
        $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"><span class="icon-chevron-right"></span></div>');
        $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close2"><span class="icon-chevron-left"></span> back</div>');

        $('.menu .accordion-toggle').click(function(event) {
            event.preventDefault();
            var currentMenuPosition = $(this).parent().position().top;
            $(this).siblings('.sub-menu').addClass('opened').css('top', '-' + currentMenuPosition + 'px');
            $(this).siblings('.sub-menu').removeClass('closed');
        });

        $('.menu .accordion-toggle2').click(function(event) {
            event.preventDefault();
            var currentMenuPosition = $(this).parent().position().top;
            $(this).siblings('.sub-menu').addClass('opened').css('top', '-' + currentMenuPosition + 'px');
            $(this).siblings('.sub-menu').removeClass('closed');
            
        });

        $('.child-close').click(function() {
            $(this).parent().toggleClass('opened');
            $(this).parent().toggleClass('closed');
        });

        $('.child-close2').click(function() {
            $(this).parent().toggleClass('opened');
            $(this).parent().toggleClass('closed');
        });
    }

    // desktop child click close parent subnav
    $('.menu > li.menu-item-has-children > .sub-menu > li > a').click(function(event) {
        $(this).closest('.sub-menu').css('display', 'none');
    });

    //add button before child links on landing page
    // $("<div class='all-pages'>View All Pages <span></span></div>").insertBefore('.children');
    // $('.all-pages').click(function() {
    //     $(this).toggleClass("active");
    //     $(this).parent().find('.children').toggleClass("active");
    //     $(this).parent().find('.children').slideToggle(400);
	// });

    // script to make accordions function
	$(".accordions").on("click", function() {
        // will (slide) toggle the related panel.
        $(this).find('.accordions_title').toggleClass("active");
        $(this).find('.accordions_content').toggleClass("active").slideToggle();
        $(this).toggleClass("active");

        if( $(this).hasClass('result-accordion') ) {
            if( $(this).hasClass('active') ) {
                $(this).find('.accordions_title').html('<p>Read Less <div class="icon-add"></div></p>');
            } else {
                $(this).find('.accordions_title').html('<p>Read More <div class="icon-add"></div></p>');
            }
        }
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	// $(document).ready(function() {
	// 	$('.menu-item-has-children').on('focusin', function() {
	// 		var subMenu = $(this).find('.sub-menu');
	// 		subMenu.css('display', 'block');

	// 		$(this).find('.sub-menu > li:last-child').on('focusout', function() {
	// 			console.log('blur!');
	// 			subMenu.css('display', 'none');
	// 		});
	// 	});
	// });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-search-icon').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

    // Attorney excerpt truncation + read more / read less toggle
    var excerptLimit = 212;

    $('.attorney-excerpt').each(function() {
        var $excerpt = $(this);
        var fullText = $.trim($excerpt.text());
        var $readMore = $excerpt.siblings('.attorney-read-more');

        if (fullText.length <= excerptLimit) {
            $readMore.hide();
            return;
        }

        // Truncate to 212 chars, then back up to the last space so we don't cut a word.
        var truncated = fullText.substring(0, excerptLimit);
        var lastSpace = truncated.lastIndexOf(' ');
        if (lastSpace > 0) {
            truncated = truncated.substring(0, lastSpace);
        }
        truncated = truncated.replace(/[.,;:!?\-—\s]+$/, '') + '…';

        $excerpt.data('full-text', fullText);
        $excerpt.data('truncated-text', truncated);
        $excerpt.text(truncated).addClass('is-truncated');
    });

    $(document).on('click', '.attorney-read-more', function() {
        var $btn = $(this);
        var $excerpt = $btn.siblings('.attorney-excerpt');
        var $label = $btn.find('.read-more-label');
        var $icon = $btn.find('.read-more-icon');

        if ($excerpt.hasClass('is-truncated')) {
            $excerpt.text($excerpt.data('full-text'))
            .removeClass('is-truncated')
            .addClass('is-expanded');
            $label.text('Read Less');
            $icon.addClass('icon-remove');
            $icon.removeClass('icon-add');
            $btn.attr('aria-expanded', 'true');
        } else {
            $excerpt.text($excerpt.data('truncated-text'))
            .removeClass('is-expanded')
            .addClass('is-truncated');
            $label.text('Read More');
            $icon.addClass('icon-add')
            $icon.removeClass('icon-remove')
            $btn.attr('aria-expanded', 'false');
        }
    });

    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
           $('header').addClass('scrolled');
        } else {
           $('header').removeClass('scrolled');
        }
    });

    if( $('.anchor-list').length ) {
        var anchorListEl = '';
        $('h2').each(function (index, item) {
            var anchorLink = $(item).text().toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            anchorListEl += '<li><a href="#' + anchorLink + '">' + $(item).text() + '</a></li>';

            $(this).attr('id', anchorLink);
        })
        $('.anchor-list').append(anchorListEl);
    };

    // Category Filter
    $('#cat').change(function () {

        var dropdown = document.getElementById("cat");
        if (dropdown.options[dropdown.selectedIndex].value) {
            var category = dropdown.options[dropdown.selectedIndex].value;
            filterPosts(category);
        }
    });
    $('.cn-pagination .page-numbers').click(function (e) {
        e.preventDefault();
        filterPosts('-1', $(this).attr('href'));
    });

    function filterPosts(category = '', paged = 1) {

        data = {
            action: 'filter_posts', category: category, paged: paged,
        };
        $('.faqs-list-js').fadeOut();
        $.post(gngf_vars.ajax_url, data, function (response) {

            if (response) {
                $('.faqs-list-js').html(response);
                $('.faqs-list-js').addClass('ajax-js');
                $('.ajax-js .cn-pagination .page-numbers').click(function (e) {
                    e.preventDefault();
                    filterPosts(category, $(this).attr('href'));
                });
                $('.faqs-list-js').fadeIn();

            }
        });
    }

});