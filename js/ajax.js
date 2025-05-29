  var $ = jQuery.noConflict();
  jQuery(document).ready(function($){
        $.ajaxSetup({cache:false});
        $("a.page-ajax").click(function(e){ // line 5
            e.preventDefault();
            //alert("hello");
            pageurl = $(this).attr('href');
            if(pageurl!=window.location) {
                window.history.pushState({path: pageurl}, '', pageurl);
            }
            /*var post_id = $(this).attr("rel")
            $(".abc").load(pageurl); // line 12
            return false;*/
            jQuery("ul.page-ajax li").removeClass('active');
            jQuery(this).parent().addClass('active');
            var page_id = jQuery(this).attr('rel');
            var nonce = jQuery(this).attr("data-nonce");
            var action = 'ajaxify_pages';
            
            //alert(page_id);
            jQuery.ajax({
                type : "post",
                datatype : "json",
                url : ajax_object.ajax_url,
                data : {
                    action : action,
                    page_id : page_id,
                    nonce : nonce,
                },
                success: function(data){
                    jQuery("div.program-data").html(data);
                    scrollToDiv(jQuery("div.program-data"));

                    // extra js for flexible section retrived on program page

                    // Image Slider //
                    var $gallery = $('#imgSlider');
                    var slideCount = null;
                    var delay = 5000;
                        //$gallery.slick().unslick();
                        $gallery.slick({
                            speed: 250,
                            autoplay: true,
                            autoplaySpeed: delay,
                            fade: true,
                            cssEase: 'linear',
                            swipe: true,
                            swipeToSlide: true,
                            touchThreshold: 10,
                        });

                    // Gallery
                    $gallery.on('init', function(event, slick) {
                        slideCount = slick.slideCount;
                        setSlideCount();
                        setCurrentSlideNumber(slick.currentSlide);
                    });
                    $gallery.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                        setCurrentSlideNumber(nextSlide);
                        slideCount = slick.slideCount;
                        setSlideCount();
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
                    // Image Slider end //

                    // Staff Card //

                    $('.popup-with-zoom-anim').click(function(e) {
                        //alert("hello");
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

                    // Staff Card end //

                    // video gallery 
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
                    // video gallery end

                    // bloquote side image
                    $(".quote-col").equalHeight();
                    // bloquote side image end

                    // extra js stylesheet section retrived on program page
                    
                },
                error: function(error){
                    console.log("error ouccured");
                },
            });
           // return false;
        });
    });

jQuery(document).ready(function($){
    var pgurl = window.location.href;
    //alert(pgurl);
    $("ul.page-ajax li").each(function(){
      if($(this).find('a').attr("href") == pgurl ){
        $(this).addClass("active");
      }

    })
});

jQuery(document).ready(function($){
    //alert("hekl");
    var pgurl = window.location.href;
    //alert(pgurl);
    $("ul.category-post li").removeClass("active");
    //alert($("ul.category-post li:first").find('a').attr("href"));
    $("ul.category-post li:not(:first-child)").each(function(){
        //alert($(this).find('a').attr("href"));
      /*if($(this).find('a').attr("href") == pgurl || (pgurl.indexOf($(this).find('a').attr("href")) > -1 && pgurl >= $("ul.category-post li:first").find('a').attr("href") ) ){
        $(this).addClass("active");
        $("ul.category-post li:first").removeClass("active");
      }*/
      if($(this).find('a').attr("href") == pgurl || (pgurl.indexOf($(this).find('a').attr("href")) > -1) ){
        $(this).addClass("active");
        $("ul.category-post li:first").removeClass("active");
      }
    })
});
jQuery(document).ready(function($){
    $('#event-category').change(function() {
        //alert("hello");
        $("#form1").submit();
    });
});

jQuery(document).ready(function($){
    $('#events').change(function() {
       // alert("hello");
        $("#form2 ").submit();
    });
});
  
jQuery(document).ready(function(){
    var $ = jQuery.noConflict();
    jQuery(".categoryBox").on("change",function(){
        var cat_id = jQuery("select.categoryBox").val();
        var action = 'program_category_dropdown';
        $("div.selectMenu .dropdown-toggle").addClass('active');
        //alert(cat_id);
        if(cat_id == "Age"){
            jQuery(".program-box").attr("disabled",true);
            jQuery(".program-box").addClass('disabled')
            jQuery(".program-box button").addClass('disabled')
        } else {
            jQuery(".program-box").attr("disabled",false);
            jQuery(".program-box").removeClass('disabled')
            jQuery(".program-box button").removeClass('disabled')
        }
        
        
        //alert(page_id);
        jQuery.ajax({
            type : "post",
            datatype : "json",
            url : ajax_object.ajax_url,
            data : {
                action : action,
                cat_id : cat_id,
            },
            success: function(data){
                jQuery("div.program-box-wrapper").html(data);
                jQuery("select.program-box").selectpicker('refresh');
            },
            error: function(error){
                console.log("error ouccured");
            },
        });
    })

    jQuery(".program-box-wrapper").on("change",function(){
        var program_id = jQuery("select.program-box").val();
        var action = 'program_post_dropdown';
        $("div.selectMenu .dropdown-toggle").addClass('active');
        
        jQuery.ajax({
            type : "post",
            datatype : "json",
            url : ajax_object.ajax_url,
            data : {
                action : action,
                program_id : program_id,
            },
            success: function(data){
                jQuery("div.view-program-wrapper").html(data);
            },
            error: function(error){
                console.log("error ouccured");
            },
        });
    })

   // empty p tag
    $('p').each(function() {
        var $this = $(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
            $this.remove();
    });

    $("ul.page-ajax li a.page-ajax").click(function(){
        var title = $(this).text();
        $("ul.page-ajax span.mobile-dropdown__mobile-active").text(title);
        $("div.mobile-dropdown").removeClass('open');
        var horizantalTab = $("#horizontalTab").outerHeight(true);
        var menu = $(".site-header").outerHeight(true);
        var window_heghit = $(window).height();
        //alert(window_heghit);
        var totalheight = window_heghit - horizantalTab;
        //alert($("ul.page-ajax").offset().top - totalheight);
        //alert(menu + horizantalTab);
        //$('#horizontalTab').addClass('fixedprogram');
        /*var stickyTop = $('.mobile-dropdown').offset().top;
        //alert(stickyTop);
                $(window).on('scroll', function() {
                if ($(window).scrollTop() >= stickyTop) {
                    $('.mobile-dropdown').addClass('fixedTop');                 
                } else {
                    $('.mobile-dropdown').removeClass('fixedTop');
                }
            });*/
            /*if($("#horizontalTab").hasClass("fixedTop")){
                $('html, body').animate({
                    scrollBottom: $("#horizontalTab").offset().top - horizantalTab
                },1000);
            }
            $('html, body').animate({
                    scrollTop: $("#horizontalTab").offset().top - horizantalTab
                },1000);*/


            /*var target = 'mobile-dropdown';
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    //scrollTop: $("#horizontalTab").offset().top - horizantalTab
                    scrollTop: 850
                }, 1000);
            }*/

           
            
        //alert(title);
    })

    

    // program
        /*$(function () {
            $('ul.page-ajax li a.page-ajax').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if ($(".menu-icon").is(":visible") && $(".menu-icon").hasClass("active")) {
                        $(".menu-icon").trigger("click");
                    }
                    if (target.length) {
                        $('.enumenu_ul li').removeClass("active");
                        $(this).parent().addClass("active");
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - $(".header-main").outerHeight(true)
                        }, 1000, function () {
                            var t = target.offset().top
                            if (t != $(window).scrollTop()) {
                                $('html, body').stop().animate({
                                    scrollTop: target.offset().top - $(".header-main").outerHeight(true)
                                }, 100);
                            }
                        });
                        return false;
                    }
                }
            });
        });*/
    // program
    $(".back-to-top-link").on("click",function(e){
        e.preventDefault();
        $("header#masthead").removeClass("headerFix");
    });

     /*document.body.setAttribute("class", "noscroll");

    document.getElementById("overlay").style.display = "block";
    document.getElementById("spinner").style.display = "block";


    window.onload = function() {
      document.getElementById("spinner").style.display = "none";
      document.getElementById("overlay").style.display = "none";

      document.body.className = document.body.className.replace(/\bnoscroll\b/,'');
    }
    */
    if(!jQuery("a").hasClass("prev")){
       $("div.nav-links").prepend('<a class="prev page-numbers prev-nav"></a>');
    }
    if(!jQuery("a").hasClass("next")){
       $("div.nav-links").append('<a class="next page-numbers next-nav"></a>');
    }
    // remove link on mobile mega menu
    //var $size = jQuery(".site-header").width();
    //$( ".mega-menu-item" ).click(function(e) {
      // your on click code here
      //e.preventDefault();
      //alert("hello");
    //});
    
    //alert($size);
    //if($size <= 700){
        //alert("sdfds");
        //jQuery(".has-children a").removeAttr("href");
    //}
});
