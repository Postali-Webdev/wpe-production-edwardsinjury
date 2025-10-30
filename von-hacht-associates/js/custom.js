;(function ($) {
    var scrollOut;

    $(document).on('ready', function () {

        $('.successes__slider-text').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            adaptiveHeight: true,
            asNavFor: '.successes__slider-images',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    adaptiveHeight: true,
                    slidesToShow: 1,
                }
            },]
        });

        $('.successes__slider-images').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            adaptiveHeight: true,
            centerMode: true,
            asNavFor: '.successes__slider-text',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    fade: false,
                }
            },]
        });


        $('.more').readmore({
            speed: 400,
            collapsedHeight: 372,
            moreLink: '<a href="#" class="reade-more">Read more</a>',
            lessLink: '<a href="#" class="reade-more reade-more--less">Read less</a>',
            heightMargin: 16
        });

        if ($(window).width() > 350) {
            $('.more-2').readmore({
                speed: 400,
                collapsedHeight: 360,
                moreLink: '<a href="#" class="reade-more">Read more</a>',
                lessLink: '<a href="#" class="reade-more reade-more--less">Read less</a>',
                heightMargin: 16
            });
        } else {
            $('.more-2').readmore({
                speed: 400,
                collapsedHeight: 347,
                moreLink: '<a href="#" class="reade-more">Read more</a>',
                lessLink: '<a href="#" class="reade-more reade-more--less">Read less</a>',
                heightMargin: 16
            });
        }

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

        $('.single_tab').each(function () {
            let height = $(this).find('.hide-in-open').height();
            $(this).css('paddingBottom', `${height + 34}px`);
        });

        $('.single_tab__title').click(function () {
            $(this).parent().find('.hide-in-open').slideToggle();
            $(this).parent().find('.single_tab__content').slideToggle();
            $(this).parents('.single_tab').toggleClass('active').toggleClass('open');
        });

        $('.genesis-sidebar-title.screen-reader-text').remove();

        $('.team-tab-li').click(function () {
            var $this = $(this);
            if (!$this.hasClass('open')) {
                $('.team-tab-li.open').removeClass('open');
                $('.team-tab-content.open').removeClass('open');

                $this.addClass('open');
                var $this_data = $this.data('tab-id');
                $('.' + $this_data).addClass('open');

            }
        });

        $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 120
            }, 500);
        });

        $('.responsive-menu-search-box').removeAttr('placeholder');


        $('.parallax').jarallax({
            speed: 0.5, disableParallax: /iPad|iPhone|iPod|Android/,
        });


        $('.post-categories__button').on('click', function () {

            $('.post-categories__button').removeClass('post-categories__button-active');
            $(this).addClass('post-categories__button-active');


            var block = $('.announcement-wrapper');
            var items = block.find('.announcement-list');
            var urlButton = $(this).attr('data-category');
            items.each(function () {
                $(this).removeClass('announcement-list-active');
                if ($(this).attr('data-cat') == urlButton) {
                    $(this).addClass('announcement-list-active');
                }
            });
        });

        // function filterPosts(category = '', paged = 1) {
        //
        //   data = {
        //     action: 'filter_announcement',
        //     category: category,
        //     paged: paged,
        //   };
        //   $('.faqs-list-js').fadeOut();
        //   $.post(gngf_vars.ajax_url, data, function (response) {
        //
        //     if (response) {
        //       $('.faqs-list-js').html(response);
        //       $('.faqs-list-js').addClass('ajax-js');
        //       $('.ajax-js .cn-pagination .page-numbers').click(function (e) {
        //         e.preventDefault();
        //         filterPosts(category, $(this).attr('href'));
        //       });
        //       $('.faqs-list-js').fadeIn();
        //
        //     }
        //   });
        // }

        $("body").on('click', '.video__play-img', function (ev) {
            var block = $(this).parents('.announcement__video');
            var items = block.find('.link-video');
            var itemsBG = block.find('.video__placeholder');
            var itemsButton = block.find('.video__play-img');
            items.each(function () {
                items[0].src += '&autoplay=1';
                itemsBG.hide();
                itemsButton.hide();

            });
            ev.preventDefault();
        });


        var block = $('.animate-wrapper');
        var items = block.find('.animate-inner');

        items.each(function () {
            let firstCol = $(this).find('.first-col');
            let secondCol = $(this).find('.second-col');
            let val1 = firstCol.attr('data-height');
            let val2 = secondCol.attr('data-height');
            let percentCol1 = val1 * val2 / 100
            let percentCol2 = val2 * 100 / 100
            firstCol.css({'height': percentCol1 + "%", "visibility": "visible"});
            secondCol.css({'height': percentCol2 + "%", "visibility": "visible"});

        });


    });


    $("body").on('click', '.file-video-play', function () {

        var block = $(this).parents('.announcement__video');
        var items = block.find('.file-play');
        var itemsBG = block.find('.file-video');
        var itemsButton = block.find('.file-video-play');
        items.each(function () {
            items[0].src += '?play';
            items[0].play();
            console.log(items)
            itemsBG.hide();
            itemsButton.hide();
        });


    });

// Scripts which runs after all elements load

    $(window).on('load', function () {


        $('.parallax').jarallax({
            speed: 0.5, disableParallax: /iPad|iPhone|iPod|Android/,
        });

    });

// Scripts which runs at window resize

    $(window).on('resize', function () {
        $('.single_tab').each(function () {
            let height = $(this).find('.hide-in-open').height();
            $(this).css('paddingBottom', `${height + 34}px`);
        });
    });

// Scripts which runs on scrolling

    $(window).on('scroll', function () {


    });

    /*!
    * @preserve
    *
    * Readmore.js jQuery plugin
    * Author: @jed_foster
    */
    !function (t) {
        "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(function (t) {
        "use strict";

        function e(t, e, i) {
            var o;
            return function () {
                var n = this, a = arguments, s = function () {
                    o = null, i || t.apply(n, a)
                }, r = i && !o;
                clearTimeout(o), o = setTimeout(s, e), r && t.apply(n, a)
            }
        }

        function i(t) {
            var e = ++h;
            return String(null == t ? "rmjs-" : t) + e
        }

        function o(t) {
            var e = t.clone().css({
                    height: "auto", width: t.width(), maxHeight: "none", overflow: "hidden"
                }).insertAfter(t), i = e.outerHeight(),
                o = parseInt(e.css({maxHeight: ""}).css("max-height").replace(/[^-\d\.]/g, ""), 10),
                n = t.data("defaultHeight");
            e.remove();
            var a = o || t.data("collapsedHeight") || n;
            t.data({expandedHeight: i, maxHeight: o, collapsedHeight: a}).css({maxHeight: "none"})
        }

        function n(t) {
            if (!d[t.selector]) {
                var e = " ";
                t.embedCSS && "" !== t.blockCSS && (e += t.selector + " + [data-readmore-toggle], " + t.selector + "[data-readmore]{" + t.blockCSS + "}"), e += t.selector + "[data-readmore]{transition: height " + t.speed + "ms;overflow: hidden;}", function (t, e) {
                    var i = t.createElement("style");
                    i.type = "text/css", i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(t.createTextNode(e)), t.getElementsByTagName("head")[0].appendChild(i)
                }(document, e), d[t.selector] = !0
            }
        }

        function a(e, i) {
            this.element = e, this.options = t.extend({}, r, i), n(this.options), this._defaults = r, this._name = s, this.init(), window.addEventListener ? (window.addEventListener("load", c), window.addEventListener("resize", c)) : (window.attachEvent("load", c), window.attachEvent("resize", c))
        }

        var s = "readmore", r = {
            speed: 100,
            collapsedHeight: 200,
            heightMargin: 16,
            moreLink: '<a href="#">Read More</a>',
            lessLink: '<a href="#">Close</a>',
            embedCSS: !0,
            blockCSS: "display: block; width: 100%;",
            startOpen: !1,
            blockProcessed: function () {
            },
            beforeToggle: function () {
            },
            afterToggle: function () {
            }
        }, d = {}, h = 0, c = e(function () {
            t("[data-readmore]").each(function () {
                var e = t(this), i = "true" === e.attr("aria-expanded");
                o(e), e.css({height: e.data(i ? "expandedHeight" : "collapsedHeight")})
            })
        }, 100);
        a.prototype = {
            init: function () {
                var e = t(this.element);
                e.data({defaultHeight: this.options.collapsedHeight, heightMargin: this.options.heightMargin}), o(e);
                var n = e.data("collapsedHeight"), a = e.data("heightMargin");
                if (e.outerHeight(!0) <= n + a) return this.options.blockProcessed && "function" == typeof this.options.blockProcessed && this.options.blockProcessed(e, !1), !0;
                var s = e.attr("id") || i(), r = this.options.startOpen ? this.options.lessLink : this.options.moreLink;
                e.attr({
                    "data-readmore": "", "aria-expanded": this.options.startOpen, id: s
                }), e.after(t(r).on("click", function (t) {
                    return function (i) {
                        t.toggle(this, e[0], i)
                    }
                }(this)).attr({
                    "data-readmore-toggle": s, "aria-controls": s
                })), this.options.startOpen || e.css({height: n}), this.options.blockProcessed && "function" == typeof this.options.blockProcessed && this.options.blockProcessed(e, !0)
            }, toggle: function (e, i, o) {
                o && o.preventDefault(), e || (e = t('[aria-controls="' + this.element.id + '"]')[0]), i || (i = this.element);
                var n = t(i), a = "", s = "", r = !1, d = n.data("collapsedHeight");
                n.height() <= d ? (a = n.data("expandedHeight") + "px", s = "lessLink", r = !0) : (a = d, s = "moreLink"), this.options.beforeToggle && "function" == typeof this.options.beforeToggle && this.options.beforeToggle(e, n, !r), n.css({height: a}), n.on("transitionend", function (i) {
                    return function () {
                        i.options.afterToggle && "function" == typeof i.options.afterToggle && i.options.afterToggle(e, n, r), t(this).attr({"aria-expanded": r}).off("transitionend")
                    }
                }(this)), t(e).replaceWith(t(this.options[s]).on("click", function (t) {
                    return function (e) {
                        t.toggle(this, i, e)
                    }
                }(this)).attr({"data-readmore-toggle": n.attr("id"), "aria-controls": n.attr("id")}))
            }, destroy: function () {
                t(this.element).each(function () {
                    var e = t(this);
                    e.attr({"data-readmore": null, "aria-expanded": null}).css({
                        maxHeight: "", height: ""
                    }).next("[data-readmore-toggle]").remove(), e.removeData()
                })
            }
        }, t.fn.readmore = function (e) {
            var i = arguments, o = this.selector;
            return e = e || {}, "object" == typeof e ? this.each(function () {
                if (t.data(this, "plugin_" + s)) {
                    var i = t.data(this, "plugin_" + s);
                    i.destroy.apply(i)
                }
                e.selector = o, t.data(this, "plugin_" + s, new a(this, e))
            }) : "string" == typeof e && "_" !== e[0] && "init" !== e ? this.each(function () {
                var o = t.data(this, "plugin_" + s);
                o instanceof a && "function" == typeof o[e] && o[e].apply(o, Array.prototype.slice.call(i, 1))
            }) : void 0
        }
    });


}(jQuery));

