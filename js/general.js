(function($) {
    var $ = jQuery.noConflict();
    // Animation Slides
    jQuery(function() {
        jQuery('.mega-animate-slides>ul>li').hover(function() {
            jQuery(this).addClass('active');
            jQuery('.mega-animate-slides>ul>li').not(this).addClass('deActive');
        }, function() {
            jQuery(this).removeClass('active');
            jQuery('.mega-animate-slides>ul>li').not(this).removeClass('deActive');
        });
    });
    //  Number of Slides
    var $gallery = $('#imgSlider');
    var slideCount = null;
    var delay = 5000;
    $(document).ready(function() {
		
        $gallery.slick({
            speed: 250,
            autoplay: true,
            autoplaySpeed: delay,
            fade: true,
            cssEase: 'linear',
            swipe: true,
            swipeToSlide: true,
            touchThreshold: 10
        });
        var time = 2;
        var $bar,
            $slick,
            //isPause,
            tick,
            percentTime;
        $bar = $('.slider-progress .progress');
        $('.slider-wrapper').on({
            mouseenter: function() {
                isPause = true;
            },
            mouseleave: function() {
                isPause = false;
            }
        })

        function startProgressbar() {
            resetProgressbar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 20);
        }

        function interval() {
            //if(isPause === false) {
            percentTime += 1 / (time + 0.1);
            $bar.css({
                width: percentTime + "%"
            });
            if (percentTime >= 100) {
                $gallery.slick('slickNext');
                startProgressbar();
            }
            // }
        }

        function resetProgressbar() {
            $bar.css({
                width: 0 + '%'
            });
            clearTimeout(tick);
        }
        startProgressbar();
    });
    // Gallery
    $gallery.on('init', function(event, slick) {
        slideCount = slick.slideCount;
        setSlideCount();
        setCurrentSlideNumber(slick.currentSlide);
    });
    $gallery.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        setCurrentSlideNumber(nextSlide);
    });
    // Number of Slides
    function setSlideCount() {
        var $el = $('.slide-count-wrap').find('.total');
        if (slideCount < 10) {
            var add_zero = "0";
        } else {
            var add_zero = "";
        }
        $el.text(add_zero + slideCount);
    }

    function setCurrentSlideNumber(currentSlide) {
        var $el = $('.slide-count-wrap').find('.current');
        if (slideCount < 10) {
            var add_zero = "0";
        } else {
            var add_zero = "";
        }
        $el.text(add_zero + (currentSlide + 1));
    }
    // END: Number of Slides
    $(document).ready(function() {
        // Tabs
        if ($(".mobile-dropdown").length) {
            $(".mobile-dropdown__mobile-active").on("click", function(t) {
                t.preventDefault(),
                    $(this).closest(".mobile-dropdown").toggleClass("open")
            })
        }
		
		// Sticky Button On mobile
		if ($('.regBtn').length) {
			var stickyOffset = $(".site-header").outerHeight()
			var stickyTop = $('.regBtn').offset().top - stickyOffset;
			//alert(stickyTop)
			$(window).on('scroll', function() {
				if ($(window).scrollTop() >= stickyTop) {
					$('body').addClass('stickyTop').css('padding-bottom', stickyOffset);
				} else {
					$('body').removeClass('stickyTop').css('padding-bottom', stickyOffset);
				}
			});
		}
		
        /*if ($('.mobile-dropdown').length) {
            var stickyTop = $('.mobile-dropdown').offset().top;
            $(window).on('scroll', function() {
                if ($(window).scrollTop() >= stickyTop) {
                    $('.mobile-dropdown').addClass('fixedTop');
                } else {
                    $('.mobile-dropdown').removeClass('fixedTop');
                }
            });
        }*/
        // Sticky Header
        function stickyHeader() {
            if ($("#slide1").length) {
                stickyOffset_ = $(".banner").outerHeight(true);
            } else {
                stickyOffset_ = 0;
            }
            if ($(window).scrollTop() > stickyOffset_) {
                jQuery('#masthead').addClass('headerFix');
                jQuery('body').addClass('fixedBody');
                //$(".blankDiv").show();
                //jQuery('#masthead').slideDown(200);
            } else {
                jQuery('#masthead').removeClass('headerFix');
                jQuery('body').removeClass('fixedBody');
                //$(".blankDiv").hide();
                //jQuery('#masthead').slideUp(200);
            }
        }
        /*var $site_width = jQuery(".site-header").width();
        if($site_width < 700){
            $('.mega-toggle-on').click(function(e) {
                e.preventDefault();             
            })
        }*/
        jQuery(window).load(function() {
            /*jQuery('header.site-header').on({
                mouseenter: function() {
                    jQuery("body.home").addClass('whiteBg');
                },
                mouseleave: function() {
                    jQuery("body.home").removeClass('whiteBg');
                }
            })*/
            //hover
            jQuery('.staff-thumb-card .button').on({
                mouseenter: function() {
                    jQuery(this).parents(".staff-thumb-card").addClass('hover');
                },
                mouseleave: function() {
                    jQuery(this).parents(".staff-thumb-card").removeClass('hover');
                }
            })
            stickyHeader();
            /*var blankDiv = $("<div>", {
                class: "blankDiv"
            }).height(jQuery('#masthead').outerHeight(true)).insertAfter(jQuery('#masthead'));*/
            jQuery('.home .blankDiv').height('auto'); // For Home page only
            jQuery('.home.fixedBody .blankDiv').height(jQuery('#masthead').outerHeight(true)).insertAfter(jQuery('#masthead')).stop().animate() - 5000;
        });
        jQuery(window).scroll(function() {
            stickyHeader();
        });
        jQuery(window).resize(function() {
            stickyHeader();
        });
        var stickyOffset_ = 0;
        // Banner Slider        
        var delay = 5000;
        $('.slider-for').slick({
            infinite: true,
            arrows: false,
            dots: false,
            autoplay: false,
            autoplaySpeed: delay,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipe: false,
            asNavFor: '.slider-nav',
            fade: true
        });
        $('.slider-nav').slick({
            //infinite: false,
            arrows: false,
            dots: false,
            autoplay: false,
            autoplaySpeed: delay,
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            vertical: true,
            //verticalSwiping: true,
            swipe: false,
            centerMode: false,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 0,
                settings: {
                    vertical: false,
                    //verticalSwiping: false,
                    //slidesToShow: 1,
                    //slidesToScroll: 1,                
                    //centerMode: true,
                    focusOnSelect: true,
                    //infinite: true,
                }
            }, {
                breakpoint: 991,
                settings: {
                    vertical: false,
                    //verticalSwiping: false,
                    //slidesToShow: 1,
                    //slidesToScroll: 1,
                    //centerMode: true,
                    focusOnSelect: true,
                    //infinite: true,
                }
            }]
        });
        // Smooth Scroll
        jQuery('.smooth-scroll').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top - $(".site-header").outerHeight()
                    }, 1500);
                    setTimeout(function() {
                        $(".site-header").addClass("headerFix")
                    }, 1601)
                    return false;
                }
            }
        });
        jQuery('.back-to-top-link').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top - $(".site-header").outerHeight()
                    }, 1500);
                    return false;
                }
            }
        });
        /*if ($('#masthead').length) {
             var stickyTop = $('#masthead').offset().top
             $(window).on('scroll', function() {
                if ($(window).scrollTop() >= stickyTop) {
                    $('#masthead').addClass('fixedTop');
                } else {
                    $('#masthead').removeClass('fixedTop');
                }
             });
        }*/
        // Animate Button
        $('.btn').on('click', function() {
            var $target = $(event.currentTarget);
            $target.addClass('clicked');
            setTimeout(function() {
                $target.removeClass('clicked').fadeIn(600);
            }, 1200);
        });
        // VIDEO THUMBNAILS
        var startWindowScroll;
        $('.popup-youtube').magnificPopup({
            //disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade video-lightbox lightbox',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            callbacks: {
                beforeOpen: function() {
                    jQuery('html').css('overflow', 'hidden');
                },
                beforeClose: function() {
                    jQuery('html').css('overflow', 'auto');
                }
            }
        });
        // Equal Height
        $(".equalHeight").equalHeight();
        $(".quote-col").equalHeight();
        $(".equal .thumb-col").equalHeight();
        $(".thumb-col-row [class*='col-']").equalHeight();
		$(".staff-thumb-card").equalHeight();
		
        // Select Menu
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
        /*$( ".find-your-program .btn-group" ).append( "<em class='value-lable'></em>" );
        var valuelable = jQuery(".selectpicker").attr("title")
        $("em.value-lable").text(valuelable)*/
        // Mobile Menu
        $('.enumenu_ul').responsiveMenu({
            menuIcon_text: 'Menu',
            menuslide_overlap: true,
            menuslide_direction: 'right',
            onMenuopen: function() {}
        });
        // Search Bar       
        $(".close-search").click(function(e) {
            e.preventDefault(e);
            $(this).parents('.search-bar').slideUp();
            $("#asr-container").hide();
        });
        $(".search-box-link").click(function(e) {
            e.preventDefault(e);
            $('.search-bar').animate().stop().slideDown();
            $('body').removeClass('menu-open');
        });
        // Tabs
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            css3animation: 'animated fadeInLeft',
            removeHashfrmUrl: true,
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
            }
        });
		
		
		// Tabs     
		$(".tabs li").click(function(e) {
			e.preventDefault();
			var commentHeight;
			if ($(this).hasClass("active")) {
				/*$(this).removeClass('active').find(".tab-content").hide();
				 $(this).next().css("height", "auto");*/
			} else {
				$("ul.tabs li").removeClass("active");
				$(".tab-content").hide();
				$(".tab-content").css("height", "auto");
				$(this).addClass("active").find(".tab-content").fadeIn();
				commentHeight = $(".tab-content").outerHeight();
				$(".tab-link").height(commentHeight);
			}
		});
		$(".tabs").each(function() {
			$(this).find("li").eq(0).trigger('click');
		});
		// END: Tabs
	
				
    });
})(jQuery);
// STAFF LIGHTBOX
jQuery(document).ready(function() {
    var $ = jQuery.noConflict();
    $('.popup-with-zoom-anim').click(function(e) {
        $('body').addClass('mfp-popup');
        var items = [];
        $($(this).attr('href')).find('.slide').each(function() {
            items.push({
                src: $(this)
            });
        });
        var startAt = Number($(this).attr('data-index'));
        e.preventDefault();
        $.magnificPopup.open({
            callbacks: {
                open: function() {
                    $.magnificPopup.instance.goTo(startAt - 1);
                }
            },
            gallery: {
                enabled: true,
                /*navigateByImgClick: true,
                preload: [0, 1]*/
            },
            items: items,
            type: 'inline',
            mainClass: 'my-mfp-zoom-in lightbox staff-lightbox'
        });
    });
});

function scrollToDiv(elem) {
    var $ = jQuery.noConflict();
    
    var offset = 0
    if (obj.length > 0) {
        offset = obj.outerHeight();
    }
    $("html, body").animate({
        scrollTop: elem.offset().top - $("#masthead").outerHeight() - offset
    }, 500);
}
// sticky header - starts here 
var obj, objParent, sticky_clone, flag = true;
var stickyHeight = 0;
jQuery(document).ready(function() {
    var $ = jQuery.noConflict();
    if ($(".mobile-dropdown").length > 0) {
        obj = $(".mobile-dropdown");
        objParent = $(".horizontalTab-wrapper");
    }
    if (obj.length > 0) {
        sticky_clone = $("<div>", {
            "class": "sticky-clone"
        })
        $(sticky_clone).insertBefore(obj);
        stickyHeader();
        $(window).resize(function() {
            if ($("body").hasClass("sticky")) {
                $("body").removeClass("sticky");
                sticky_clone.innerHeight(obj.outerHeight());
                $("body").addClass("sticky");
                obj.css({
                    "top": $(".site-header").outerHeight() + "px"
                })
            } else {
                sticky_clone.innerHeight(obj.outerHeight());
                obj.css({
                    "top": "inherit"
                })
            }
            stickyHeader();
        });
        stickyHeight = obj.outerHeight();
        $(window).on("scroll", function(e) {
            stickyHeader();
        });
    }
});
jQuery(window).load(function() {
    var $ = jQuery.noConflict();
    if (obj.length > 0) {
        sticky_clone.innerHeight(obj.outerHeight());
        $(sticky_clone).hide();
    }
});

function stickyHeader() {
    var $ = jQuery.noConflict();
    // if (!$(".menu-toggle").is(':visible')) {
    var offsetHt = $(".site-header").outerHeight();
    if ($(window).scrollTop() >= objParent.offset().top - offsetHt && flag) {
        $(sticky_clone).height(obj.outerHeight()).show();
        $("body").addClass("sticky");
        obj.css({
            "top": $(".site-header").outerHeight() + "px"
        })
        flag = false
    } else if ($(window).scrollTop() <= objParent.offset().top - offsetHt && !flag) {
        $("body").removeClass('sticky');
        $(sticky_clone).hide();
        obj.css({
            "top": "inherit"
        })
        flag = true;
    }
    stickyHeight = obj.outerHeight();
    /*} else {
        $("body").removeClass('sticky');
        $(sticky_clone).hide();
        flag = true;
    }*/
}
// sticky header - ends here