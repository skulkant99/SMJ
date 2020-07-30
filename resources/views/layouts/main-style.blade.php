<?php
	if(empty($_title)) 			$_title ='';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>

<title>S.M.J. Inter Products</title>

<meta name="keywords" content="<?php echo $_keywords;?>" />
<meta name="description" content="<?php echo $_description;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robot" content="index, follow" />
<meta name="generator" content="Brackets">
<meta name='copyright' content='Orange Technology Solution co.,ltd.'>
<meta name='designer' content='Atthacha S.'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">


<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/layout.css')}}" media="screen,projection" />
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,600,700&display=swap&subset=thai"
    rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/OwlCarousel/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('assets/OwlCarousel/owl.theme.default.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('assets/hexagon/homeycombs.css')}}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/flexslider/flexslider.css')}}">


<script src="{{asset('assets/flexslider/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/OwlCarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/hexagon/jquery.homeycombs.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.main-banner').owlCarousel({
            loop: false,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 4500,
            autoplayHoverPause: false,
            smartSpeed: 2000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 0,
                    nav: false,
                    loop: false,
                    dots: false
                },
                640: {
                    items: 1,
                    slideBy: 1,
                    nav: false,
                    loop: false,
                    dots: false
                },
                1024: {
                    items: 1,
                    slideBy: 1,
                    loop: true,
                    nav: false,
                    dots: false
                }
            }
        })
    });
    $(document).ready(function () {
        $('.product-mobile').owlCarousel({
            loop: true,
            items: 1,
            slideBy: 1,
            margin: 5,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: false,
            smartSpeed: 2000,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 5
                },
                640: {
                    items: 2,
                    slideBy: 1,
                    margin: 10
                },
                1024: {
                    items: 2,
                    slideBy: 1,
                    margin: 10
                }
            }
        })
    });
    $(document).ready(function () {
        $('.activity-slide').owlCarousel({
            loop: true,
            margin: 5,
            autoplay: false,
            autoplayTimeout: 4500,
            autoplayHoverPause: false,
            smartSpeed: 2000,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 5
                },
                640: {
                    items: 2,
                    slideBy: 1,
                    margin: 10
                },
                1024: {
                    items: 2,
                    slideBy: 2,
                    margin: 10
                }
            }
        })
    });
    $(document).ready(function () {
        $('.partner-slide').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: false,
            autoplayTimeout: 1500,
            autoplayHoverPause: false,
            smartSpeed: 1000,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2,
                    margin: 5
                },
                640: {
                    items: 4,
                    slideBy: 2,
                    margin: 10
                },
                1024: {
                    items: 4,
                    slideBy: 1,
                    margin: 20
                }
            }
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var bigimage = $("#big");
        var thumbs = $("#thumbs");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage
            .owlCarousel({
            items: 1,
            slideSpeed: 3500,
            smartSpeed: 1500,
            nav: true,
            autoplay: false,
            dots: false,
            loop:false,
            rewind: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        })
            .on("changed.owl.carousel", syncPosition);
        thumbs
            .on("initialized.owl.carousel", function() {
            thumbs
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
            .owlCarousel({
            items: 5,
            margin: 10,
            dots: false,
            nav: false,
            loop:false,
            navText: [
                '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
            ],
            smartSpeed: 200,
            slideSpeed: 1500,
            slideBy: 1,
            responsiveRefreshRate: 100,
            responsive: {
                0: {
                    items: 3,
                    margin: 6
                },
                640: {
                    items: 3,
                    margin: 6
                },
                1024: {
                    items: 4
                },
                1200:{
                    items: 5
                }
            }
        })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = el.item.index;
            //var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
//                if (current < 0) {
//                    current = count;
//                }
//                if (current > count) {
//                    current = 0;
//                }
            //to this
            thumbs
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumbs.find(".owl-item.active").length - 1;
            var start = thumbs
            .find(".owl-item.active")
            .first()
            .index();
            var end = thumbs
            .find(".owl-item.active")
            .last()
            .index();

            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }
        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }
        thumbs.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true); 
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.honeycombs').honeycombs({
            combWidth: 285,
            margin: 7
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".product-acc a").click(function () {
            var link = $(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;

            closest_ul.find("ul").slideUp(function () {
                if (++count == closest_ul.find("ul").length)
                    parallel_active_links.removeClass("active");
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
        })
    })
</script>

<!----- TOP BUTTON ----->
<div class="scrolltop">
    <div class="scroll icon"><i class="fas fa-chevron-up"></i></div>
</div>

<script type="text/javascript">
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scrolltop:hidden').stop(true, true).fadeIn();
        } else {
            $('.scrolltop').stop(true, true).fadeOut();
        }
    });
    $(function () {
        $(".scroll").click(function () {
            $("html,body").animate({
                scrollTop: $(".thetop").offset().top
            }, "1000");
            return false
        })
    })
</script>

<script type="text/javascript">
    var menu_width;
    jQuery(document).ready(
        function () {
            initMenu();
        });

    function initMenu() {
        menu_width = $("#menu .menu").width();
        $(".menu-back").click(function () {
            var _pos = $(".menu-slider").position().left + menu_width;
            var _obj = $(this).closest(".submenu");
            $(".menu-slider").stop().animate({
                left: _pos
            }, 300, function () {
                _obj.hide();
            });
            return false;
        });

        $(".menu-anchor").click(function () {
            var _d = $(this).data('menu');
            $(".submenu").each(function () {
                var _d_check = $(this).data('menu');
                if (_d_check == _d) {
                    $(this).show();
                    var _pos = $(".menu-slider").position().left - menu_width;

                    $(".menu-slider").stop(true, true).animate({
                        left: _pos
                    }, 300);
                    return false;
                }
            });
            return false;
        });
    }

    $(document).ready(function () {
        $('.btn_join_us').click(function (event) {
            $('.login').hide();
            $('.join_us').fadeIn();
            event.preventDefault();
        });
        $('.btn_login').click(function (event) {
            $('.join_us').hide();
            $('.login').fadeIn();
            event.preventDefault();
        });

        $('.searchbtn').click(function (event) {
            if ($(".searchBox-mobile").is(":hidden")) {
                $(this).addClass("active");
                $(".searchBox-mobile").fadeIn();
            } else {
                //if (Modernizr.mq('(max-width: 991px)')) {
                $('.searchbox').fadeOut();
                $(this).removeClass("active");
                //}
            }
            event.stopPropagation();
        });

        $('.close_search').click(function (event) {
            $('.searchBox-mobile').fadeOut();
            $('.searchbtn').removeClass("active");
        });

        $('.wrap_search_form').click(function (event) {
            event.stopPropagation();
        });

        $(".searchBox-mobile").css('top', $('.topbar_menu').outerHeight());
    });
</script>

<script type="text/javascript">
    // ACTIVE MENU //
    $(function () {
        var getPage = '<?php echo($pageName); ?>';
        $(".mainmenu li").each(function () {
            var getMenu = $(this).attr("data-page");
            if (getPage == getMenu) {
                $(this).addClass('active');
            }
        });
    });
</script>


<script type="text/javascript">
    // collapse //
    $(document).ready(function () {
        $('.collapse.in').prev('.panel-heading').addClass('active');
        $('#accordion')
            .on('show.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').addClass('active');
                $('#ref01').attr('class');
                $('#ref02').attr('class');
            })
            .on('hide.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').removeClass('active');
                $('#ref01').attr('class');
                $('#ref02').attr('class');
            });
    });
</script>

<script type="text/javascript">
    // collapse //
    $(document).ready(function () {
        $('.collapse.in').prev('.panel-heading').addClass('active');
        $('#accordion-2')
            .on('show.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').addClass('active');
                $('#job01').attr('class');
                $('#job02').attr('class');
            })
            .on('hide.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').removeClass('active');
                $('#job01').attr('class');
                $('#job02').attr('class');
            });
    });
</script>



<!-- FANCYBOX -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>