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
    
    <!--------------- A C T I V I T I E S :: M A I N - P A G E --------------->
    <div class="content-padding">
        <div class="container">
<div class="row">
        @if($activities)
        @foreach($activities AS $key =>$val)
            @if($key == 0)

                <div class="col-12 col-lg-12">
                    <h4><?php echo DateTh($val->activities_date); ?></h4>
                </div>
                <div class="col-lg-5 col-12">
                        <div class="activity-bigBox">
                            <div class="img-width"><img src="{{asset('assets/images/activities')}}/{{$val->activities_img}}"></div>
                            <div class="activity-bigBox-info">
                                <a class="news-topic big" href="{{url('activity_detail')}}/{{$val->activities_id}}">
                                    <p>{{Session::get('lang') == 'en' ? $val->activities_topic_en	 : $val->activities_topic_th}}</p>
                                </a>
                                <div class="dateBox-section">
                                    <div class="dateBox"><?php echo DateEng($val->activities_date); ?></div>
                                </div>
                                <div class="txt-content">
                                <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $val->activities_detail_en;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);                                       
                                          }else{
                                              $content = $val->activities_detail_th;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);     
                                          }
                                @endphp
                            {!!$matches[0]!!}</p>
                                </div>
                                <a class="buttonB navy sm" href="{{url('activity_detail')}}/{{$val->activities_id}}">READ MORE<i class="fas fa-long-arrow-alt-right"></i></a> 
                            </div>
                        </div> 
                    </div>
            @else
            <div class="col-lg-4 col-12"><div class="activityBox">
                                    <a class="news-topic" href="{{url('activity_detail')}}/{{$val->activities_id}}">
                                        <p>{{Session::get('lang') == 'en' ? $val->activities_topic_en	 : $val->activities_topic_th}}</p>
                                    </a>
                                    <div class="dateBox-section">
                                        <div class="dateBox"><?php echo DateEng($val->activities_date); ?></div>
                                    </div>
                                    <a class="img-width" href="{{url('activity_detail')}}/{{$val->activities_id}}"><img src="{{asset('assets/images/activities')}}/{{$val->activities_img}}"></a>
                                    <div class="txt-content">
                                    <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $val->activities_detail_en;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);                                       
                                          }else{
                                              $content = $val->activities_detail_th;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);     
                                          }
                                @endphp
                            {!!$matches[0]!!}</p>
                                    </div>
                                    <a class="buttonB sm" href="{{url('activity_detail')}}/{{$val->activities_id}}">READ MORE<i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                        </div>
            @endif
            @endforeach
        @endif
        </div> 
            <div class="row">
                <div class="col">
                    <div class="doubleBD bottom mt-5">
                        <div class="content-center">
                            <a class="buttonB navy" href="{{url('activity_all')}}">VIEW ALL</a>
                        </div>
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

    <!-- function Date -->
                                 <?php
                                        function DateTh($strDate){
                                        $strYear    = date("Y",strtotime($strDate));
                                        $strMonth   = date("n",strtotime($strDate));
                                        $strDay    = date("j",strtotime($strDate));
                                        $strMonthCut  = array("","January","February","March","April","May","June","July","August","September","October","November","December");
                                        $strMonthEng = $strMonthCut[$strMonth];
                                        //return "$strDay $strMonthEng $strYear";
                                        return " $strMonthEng  $strYear";
                                        //        <div class="descnews_date">June. 06, 2019</div>
                                        }    
                                    ?>


                                    
    
</body>
</html>