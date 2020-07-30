<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php @include('frontend.inc_header') ; $pageName="knowledge"; ?>@extends('layouts.main-style')</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')
    
    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/knowledge/banner-knowledge.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "KNOWLEDGE" : "สาระน่ารู้"}}</div>
    </div>
    
    
    <!--------------- K N O W L E D G E :: M A I N - P A G E --------------->
    <div class="content-padding">
        <div class="container">
            <div class="row"> 
            <?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
 ?>
        @if($knowledge)

            @foreach($knowledge AS $key =>$val)
            @php
           console_log($val);
            @endphp
            
             @if($key == 0)
                <div class="col">
                    <h4><?php echo DateTh($val->knowledge_date);?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="newsBox main">
                        <a class="img-width" href="{{url('knowledge_detail')}}/{{$val->knowledge_id}}"><img src="{{asset('assets/images/knowledge')}}/{{$val->knowledge_img}}"></a>
                        <div class="newsBox-info text-left">
                            <a class="news-topic big" href="{{url('knowledge_detail')}}/{{$val->knowledge_id}}">
                                <p>{{Session::get('lang') == 'en' ? $val->knowledge_topic_en : $val->knowledge_topic_th}}</p>
                            </a>
                            <div class="dateBox"><?php echo DateEng($val->knowledge_date); ?></div>
                            <div class="txt-content">
                            <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $val->knowledge_detail_en;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);                                       
                                          }else{
                                              $content = $val->knowledge_detail_th;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);     
                                          }
                                @endphp
                            {!!$matches[0]!!}</p>
                            </div> 
                        </div> 
                        <a class="buttonB sm" href="{{url('knowledge_detail')}}/{{$val->knowledge_id}}">READ MORE<i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                @else
                <div class="col-lg-5 col-12">
                    <div class="newsBox-blueBG">
                        <a class="news-topic" href="{{url('knowledge_detail')}}/{{$val->knowledge_id}}">
                            <p>{{Session::get('lang') == 'en' ? $val->knowledge_topic_en	 : $val->knowledge_topic_th}}</p>
                        </a>
                        <div class="dateBox"><?php echo DateEng($val->knowledge_date); ?></div>
                        <div class="txt-content">
                        <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $val->knowledge_detail_en;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);                                       
                                          }else{
                                              $content = $val->knowledge_detail_th;
                                              preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches);     
                                          }
                                @endphp
                            {!!$matches["0"]!!}</p>
                        </div>
                        <div class="img-width"><img src="{{asset('assets/images/knowledge')}}/{{$val->knowledge_img}}"></div>
                        <a class="buttonB sm" href="{{url('knowledge_detail')}}/{{$val->knowledge_id}}">READ MORE<i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>    
                 @endif

          @endforeach
        @endif
            </div>
            <div class="row">
                <div class="col">
                    <div class="doubleBD bottom">
                        <div class="content-center">
                            <a class="buttonB navy" href="{{url('knowledge_all')}}">VIEW ALL</a>
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