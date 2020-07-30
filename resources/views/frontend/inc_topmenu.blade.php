<header class="mobile-none">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a class="mainlogo" href="{{url('/')}}"><img src="{{asset('assets/images/smjLogo.png')}}"></a>
            </div>
            <div class="col-9">
                <div class="top-menu">
                    <ul class="social">
                        <li><a class="facebook" href="https://www.facebook.com/smj.interproduct" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a class="line" data-fancybox href="{{asset('assets/images/SMJ-QRcode.jpg')}}"><img
                                    src="{{asset('assets/images/icon/icon-lineWH.svg')}}"></a></li>
                        <li><a href="mailto:info@smjip.com "><i class="fas fa-envelope"></i></a></li>
                    </ul>

                    <div class="dropdown menuDropdown">
                        <button class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="Lang"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @php
                            if(Session::get('lang') == 'en'){
                            $flag = 'flagEN.png';
                            $laug_name = 'ENG';
                            }
                            else{
                            $flag = 'flagTH.png';
                            $laug_name = 'THA';
                            }
                            @endphp
                            <img src="{{asset('assets/images/icon/').'/'.$flag}}">{!!$laug_name!!}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Lang">
                            <li><a href="{{url('/en')}}">ENG</a></li>
                            <li><a href="{{url('/th')}}">THA</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mainmenu-section mobile-none">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="mainmenu">
                    <li data-page="home"><a
                            href="{{url('/')}}">{{Session::get('lang') == 'en' ? "HOME" : "หน้าหลัก"}}</a></li>
                    <li data-page="about"><a
                            href="{{url('about')}}">{{Session::get('lang') == 'en' ? "ABOUT US" : "เกี่ยวกับเรา"}}</a>
                    </li>
                    <li data-page="product"><a
                            href="{{url('product/30?id=30')}}">{{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}</a>
                    </li>
                    <li data-page="reference"><a
                            href="{{url('references/14')}}">{{Session::get('lang') == 'en' ? "REFERENCES" : "ผลงานของเรา"}}</a>
                    </li>
                    <li data-page="knowledge"><a
                            href="{{url('knowledge')}}">{{Session::get('lang') == 'en' ? "KNOWLEDGE" : "สาระน่ารู้"}}</a>
                    </li>
                    <li data-page="activity"><a
                            href="{{url('activity')}}">{{Session::get('lang') == 'en' ? "ACTIVITIES" : "ข่าวสารและกิจกรรม"}}</a>
                    </li>
                    <li data-page="career"><a
                            href="{{url('career')}}">{{Session::get('lang') == 'en' ? "CAREER" : "ร่วมงานกับเรา"}}</a>
                    </li>
                    <li data-page="contact"><a
                            href="{{url('contact')}}">{{Session::get('lang') == 'en' ? "CONTACT US" : "ติดต่อเรา"}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------- RESPONSIVE - TOP MENU --------------------------------------------->
<div class="header-mobile mobile">
    <div class="container-fluid">
        <div class="row">
            <!-- NAV - MENU -->
            <div class="col-3">
                <div class="mobile-nav">
                    <button type="button" class="btn btn-demo shadow-none" data-toggle="modal"
                        data-target="#menuMobile">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal left fade" id="menuMobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-header">
                            <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                            <a class="mainlogo" href="{{url('/')}}"><img
                                    src="{{asset('assets/images/smjLogo.png')}}"></a>
                        </div>

                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="menu">
                                    <div class="menu-box">
                                        <div class="menu-wrapper-inner">
                                            <div class="menu-wrapper">
                                                <div class="menu-slider">
                                                    <div class="menu">
                                                        <ul>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('/')}}">{{Session::get('lang') == 'en' ? "HOME" : "หน้าหลัก"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('about')}}">{{Session::get('lang') == 'en' ? "ABOUT US" : "เกี่ยวกับเรา"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('product/30?id=30')}}"
                                                                        class="menu-anchor gray"
                                                                        data-menu="1">{{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}</a>
                                                                    <img class="detail"
                                                                        src="{{asset('assets/images/icon/icon-chevronR.svg')}}">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('references/14')}}"
                                                                        class="menu-anchor gray"
                                                                        data-menu="2">{{Session::get('lang') == 'en' ? "REFERENCES" : "ผลงานของเรา"}}</a>
                                                                    <img class="detail"
                                                                        src="{{asset('assets/images/icon/icon-chevronR.svg')}}">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('knowledge')}}">{{Session::get('lang') == 'en' ? "KNOWLEDGE" : "สาระน่ารู้"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('activity')}}">{{Session::get('lang') == 'en' ? "ACTIVITIES" : "ข่าวสารและกิจกรรม"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('career')}}">{{Session::get('lang') == 'en' ? "CAREER" : "ร่วมงานกับเรา"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item">
                                                                    <a href="{{url('contact')}}">{{Session::get('lang') == 'en' ? "CONTACT US" : "ติดต่อเรา"}}</a>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        <ul class="social">
                                                            <li><a class="facebook"
                                                                    href="https://www.facebook.com/smj.interproduct"
                                                                    target="_blank"><i
                                                                        class="fab fa-facebook-f"></i></a></li>
                                                            <li><a class="line" data-fancybox
                                                                    href="{{asset('assets/images/SMJ-QRcode.jpg')}}"><img
                                                                        src="{{asset('assets/images/icon/icon-lineWH.svg')}}"></a>
                                                            </li>
                                                            <li><a href="mailto:info@smjip.com"><i
                                                                        class="fas fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="submenu menu" data-menu="1">
                                                        <div class="submenu-back">
                                                            <div class="menu-item">
                                                                <a href="#" class="menu-back">BACK</a>
                                                                <img class="detail"
                                                                    src="{{asset('assets/images/icon/icon-chevronL.svg')}}">
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=30')}}">{{Session::get('lang') == 'en' ? "Medical Gases System" : "ระบบแก๊สทางการแพทย์"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=31')}}">{{Session::get('lang') == 'en' ? "Dental Gases System" : "ระบบแก๊สทางทันตกรรม"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=32')}}">{{Session::get('lang') == 'en' ? "Modular Theatre System" : "ระบบห้องผ่าตัดสำเร็จรูป"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=33')}}">{{Session::get('lang') == 'en' ? "Ceiling Pendant" : "อุปกรณ์ทางการแพทย์"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=34')}}">{{Session::get('lang') == 'en' ? "Medical Equipment" : " เครื่องมือและอุปกรณ์ทางการแพทย์"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=35')}}">{{Session::get('lang') == 'en' ? "Operating Light" : "โคมไฟผ่าตัด"}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('product/30?id=36')}}">{{Session::get('lang') == 'en' ? "Operating Table" : "เตียงผ่าตัด"}}</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="submenu menu" data-menu="2">
                                                        <div class="submenu-back">
                                                            <div class="menu-item">
                                                                <a href="#" class="menu-back">BACK</a>
                                                                <img class="detail"
                                                                    src="{{asset('assets/images/icon/icon-chevronL.svg')}}">
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/14')}}">{{Session::get('lang') == 'en' ? "MEDICAL GASES SYSTEM" : "ระบบแก๊สทางการแพทย์"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/15')}}">{{Session::get('lang') == 'en' ? "DENTAL GASES SYSTEM" : "ระบบแก๊สทางทันตกรรม"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/16')}}">{{Session::get('lang') == 'en' ? "MODULAR THEATRE SYSTEM" : "ระบบห้องผ่าตัดสำเร็จรูป"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/17')}}">{{Session::get('lang') == 'en' ? "CEILING PENDANT" : "ชุดศูนย์รวมอุปกรณ์ทางการแพทย์"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/18')}}">{{Session::get('lang') == 'en' ? "MEDICAL EQUIPMENT" : "เครื่องมือและอุปกรณ์ทางการแพทย์"}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="menu-item"><a
                                                                        href="{{url('references/19')}}">{{Session::get('lang') == 'en' ? "SERVICE AND MAINTENANCE" : "การบริการและการซ่อมบำรุง"}}</a></div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div><!-- modal-content -->
                    </div><!-- modal-dialog -->
                </div><!-- modal -->

            </div>

            <!-- MAIN LOGO -->
            <div class="col-6">
                <a class="mainlogo" href="{{url('/')}}"><img src="{{asset('assets/images/smjLogo.png')}}"></a>
            </div>

            <!-- LANG -->
            <div class="col-3 pl-0">
                <div class="dropdown menuDropdown">
                    <button class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="Lang"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @php
                        if(Session::get('lang') == 'en'){
                        $flag = 'flagEN.png';
                        $laug_name = 'ENG';
                        }
                        else{
                        $flag = 'flagTH.png';
                        $laug_name = 'THA';
                        }
                        @endphp
                        <img src="{{asset('assets/images/icon/').'/'.$flag}}">{!!$laug_name!!}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="Lang">
                        <li><a href="{{url('/en')}}">ENG</a></li>
                        <li><a href="{{url('/th')}}">THA</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

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
        var getPage = '<?php echo ($pageName); ?>';
        $(".mainmenu li").each(function () {
            var getMenu = $(this).attr("data-page");
            if (getPage == getMenu) {
                $(this).addClass('active');
            }
        });
    });
</script>