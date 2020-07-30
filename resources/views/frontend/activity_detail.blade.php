<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php @include('frontend.inc_header'); $pageName="activity"; ?> @extends('layouts.main-style')</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')
    
    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/activity/banner-activity.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "ACTIVITIES" : "ข่าวสารและกิจกรรม"}}</div>
    </div>
    
    <!--------------- A C T I V I T I E S - D E T A I L --------------->
    <div class="content-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>{{Session::get('lang') == 'en' ? $activities->activities_topic_en	 : $activities->activities_topic_th}}</h3>
                    <div class="content-center mb-5">
                        <div class="dateBox"><?php echo DateEng($activities->activities_date); ?></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width mb-4">
                        <img src="{{asset('assets/images/activities')}}/{{$activities->activities_img}}" alt="">
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width borderWH"><img src="{{asset('assets/images/activity/activity01.jpg')}}"></div>
                </div>
            </div> -->

            <div class="row">
                <div class="col">
                    <div class="txt-content">
                        <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $activities->activities_detail_en;
                                          }else{
                                              $content = $activities->activities_detail_th;
                                          }

                                @endphp
                            {!! $content !!}</p>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width borderWH"><img src="{{asset('assets/images/activity/activity02.jpg')}}"></div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class="col">
                    <div class="txt-content">
                        <p>Lacus laoreet non curabitur gravida arcu ac tortor dignissim. Mauris nunc congue nisi vitae suscipit tellus mauris a. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Pellentesque habitant morbi tristique senectus et netus. Ultricies integer quis auctor elit sed vulputate mi sit amet. At elementum eu facilisis sed odio morbi quis commodo odio. Volutpat est velit egestas dui. Adipiscing elit duis tristique sollicitudin nibh. Felis imperdiet proin fermentum leo vel orci porta non. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi etiam. Tortor aliquam nulla facilisi cras fermentum odio eu. Amet justo donec enim diam vulputate ut pharetra sit amet. Laoreet id donec ultrices tincidunt.</p>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col">
                    <div class="doubleBD">
                        <ul class="share">
                            <li><a>Share<i class="fas fa-share-alt"></i></a></li>
                            <li><a style="cursor:pointer" class="facebook" onClick="MyWindow=window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a style="cursor:pointer" class="twitter" onClick="MyWindow=window.open('https://twitter.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><i class="fab fa-twitter"></i></a></li>
                            <li><a style="cursor:pointer" class="line" onClick="MyWindow=window.open('https://lineit.line.me/share/ui?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><img src="{{asset('assets/images/icon/icon-lineWH.svg')}}"></a></li>
                            <li><a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fas fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="content-center">
                        <a class="buttonB" href="{{url('activity_all')}}">BACK</a>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
        
    <?php @include('frontend.inc_topbutton'); ?>
    @include('frontend.inc_footer')

     <!-- function Date -->
     <?php
                                        function DateEng($strDate){
                                        $strYear    = date("Y",strtotime($strDate));
                                        $strMonth   = date("n",strtotime($strDate));
                                        $strDay    = date("j",strtotime($strDate));
                                        $strMonthCut  = array("","January","February","March","April","May","June","July","August","September","October","November","December");
                                        $strMonthEng = $strMonthCut[$strMonth];
                                        //return "$strDay $strMonthEng $strYear";
                                        return "$strDay $strMonthEng  $strYear";
                                        //        <div class="descnews_date">June. 06, 2019</div>
                                        }    
                                    ?>

                                    
    
</body>
</html>