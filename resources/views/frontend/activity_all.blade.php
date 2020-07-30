<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php @include('frontend.inc_header'); $pageName="activity";?> @extends('layouts.main-style')</head> 
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')
    
    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/activity/banner-activity.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "ACTIVITIES" : "ข่าวสารและกิจกรรม"}}</div>
    </div>
    
    <!--------------- A C T I V I T I E S - A L L --------------->
    <div class="content-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>ALL ACTIVITIES</h4>
                </div>
            </div>
            <div class="row">
            @if($activities)
                @foreach($activities AS $key)
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="newsBox">
                        <a class="img-width" href="{{url('activity_detail')}}/{{$key->activities_id}}"><img src="{{asset('assets/images/activities')}}/{{$key->activities_img}}"></a>
                        <div class="newsBox-info">
                            <a class="news-topic" href="{{url('activity_detail')}}/{{$key->activities_id}}">
                                <p>{{Session::get('lang') == 'en' ? $key->activities_topic_en	 : $key->activities_topic_th}}</p>
                            </a>
                            <div class="content-center">
                                <div class="dateBox"><?php echo DateEng($key->activities_date); ?></div>
                            </div>
                            <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $key->activities_detail_en;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);                                       
                                          }else{
                                              $content = $key->activities_detail_th;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);     
                                          }
                                        @endphp
                                {!!$matches[0]!!}</p>
                        </div> 
                    </div>
                </div>
            @endforeach
        @endif
        </div>
            <!--------------- P A G E --------------->
        
            <div class="row">
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                         {{ $activities->links() }}
                            <!-- <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li> -->
                            <!-- <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>
                
        </div>
    </div>
        
    <?php @include('fronend.inc_topbutton'); ?>
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