(function ($) {
    "use strict";
    
    /* ============================================================ */
    /* Gallery Popup
    /* ============================================================ */
    $(document).ready(function() {
        $('.popup-img').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-fade',
            preloader: true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });

    /* ==============================================
    SCROLL -->
    =============================================== */
    function onePageNavs($selector) {
        var $navSelector = $($selector);
        $navSelector
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            if ( location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname ) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 0
                    }, 1000);
                }
            }
        });
    }
    onePageNavs('.sidebar ul li a');


    $(document).ready(function () {
        var AFFIX_TOP_LIMIT = 390;
        var AFFIX_OFFSET = 0;
        var $menu = $("#menu"),
        $btn = $("#menu-toggle");
    
        $("#menu-toggle").on("click", function () {
            $menu.toggleClass("open");
            return false;
        });
    
        $(".sidebar").each(function () {
            var $affixNav = $(this),
                $container = $affixNav.parent(),
                affixNavfixed = false,
                originalClassName = this.className,
                current = null,
                $links = $affixNav.find("a");
            function getClosestHeader(top) {
                var last = $links.first();
                if (top < AFFIX_TOP_LIMIT) {
                    return last;
                }
    
                for (var i = 0; i < $links.length; i++) {
                    var $link = $links.eq(i),
                        href = $link.attr("href");
    
                    if (href.charAt(0) === "#" && href.length > 1) {
                        var $anchor = $(href).first();
    
                        if ($anchor.length > 0) {
                            var offset = $anchor.offset();
    
                            if (top < offset.top - AFFIX_OFFSET) {
                                return last;
                            }
                            last = $link;
                        }
                    }
                }
                return last;
            }    
    
            $(window).on("scroll", function (evt) {
                var top = window.scrollY,
                    height = $affixNav.outerHeight(),
                    max_bottom = $container.offset().top + $container.outerHeight(),
                    bottom = top + height + AFFIX_OFFSET;
    
                if (affixNavfixed) {
                    if (top <= AFFIX_TOP_LIMIT) {
                        $affixNav.removeClass("fixed");
                        affixNavfixed = false;
                    } else if (bottom > max_bottom) {
                        $affixNav.css("top", (max_bottom - height) - top);
                    } else {
                        $affixNav.css("top", AFFIX_OFFSET);
                    }
                } else if (top > AFFIX_TOP_LIMIT) {
                    $affixNav.addClass("fixed");
                    affixNavfixed = true;
                }    
                var $current = getClosestHeader(top);
                if (current !== $current) {
                    $affixNav.find(".cc-active").removeClass("cc-active");
                    $current.addClass("cc-active");
                    current = $current;
                }
            });
        });
    });

})(jQuery);
