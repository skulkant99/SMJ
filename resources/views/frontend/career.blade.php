<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php @include('frontend.inc_header'); $pageName="career"; ?>@extends('layouts.main-style')</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')
    
    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/career/banner-career.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "CAREER" : "ร่วมงานกับเรา"}}</div>
    </div>
    
    <!---------- C A R E E R ---------->
    <div class="content-padding curve">
        <div class="container">
            <div class="BheaderTB">
                <div class="mobile-none">
                    <div class="row">
                        <div class="col-6">{{Session::get('lang') == 'en' ? "JOB TITLE" : "ตำแหน่ง"}}</div>
                        <div class="col-5">{{Session::get('lang') == 'en' ? "DEPARTMENT" : "แผนก"}}</div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div class="mobile">
                    <div class="row">
                        <div class="col-12">CAREER POSITON</div>
                    </div>
                </div>
            </div>
            <?php
            function console_log($output, $with_script_tags = true) {
                $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
            ');';
                if ($with_script_tags) {
                    $js_code = '<script>' . $js_code . '</script>';
                }
                echo $js_code;
            } ?>
            <div class="width100">
                <div class="row">
                    <div class="col">
                        <div class="career-acc">
                            <div class="panel-group" id="accordion-2" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                @if($career)
                                            @foreach($career AS $index => $key)
                                    <!-- JOB :: 01 -->
                                    <div class="panel-heading" role="tab" id="headingOne{{$key->career_id}}">
                                        <div class="row">
                                            <div class="col-lg-6 col-10">
                                                <div class="job-position">{{Session::get('lang') == 'en' ? $key->career_title_en	 : $key->career_title_th}}</div>
                                                <div class="mobile-department mobile"><span>Department :</span>Engineering</div>
                                                <div class="post-on"><i class="fas fa-pencil-alt"></i><span>{{Session::get('lang') == 'en' ? "Post on" : "โพสต์เมื่อ"}} :</span><?php echo DateEng($key->career_date); ?></div>
                                            </div>
                                            <div class="col-lg-5 mobile-none">{{Session::get('lang') == 'en' ? $key->career_department_en	 : $key->career_department_th}}</div>
                                            <div class="col-lg-1 col-2">
                                                <a id="job01" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$key->career_id}}" aria-expanded="true" aria-controls="collapseOne"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseOne{{$key->career_id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{$key->career_id}}">
                                        <div class="panel-body">

                                        @if($key->career_detail_th1 || $key->career_detail_en1)    
                                            <div class="row">
                                                <div class="col">
                                                    <div class="topicB-line">{{Session::get('lang') == 'en' ? "Job Description " : "รายละเอียดงาน"}}</div>
                                                    <ul class="job-detail">
                                                   <p>@php
                                                        if(Session::get('lang') == 'en'){
                                                            $content = $key->career_detail_en1;
                                                        }else{
                                                            $content = $key->career_detail_th1;
                                                        }

                                                        @endphp
                                                            {!!$content!!}</p>
                                                        <!-- <li>Malesuada fames ac turpis egestas. In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas.</li>
                                                        <li>In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas. Scelerisque purus semper eget duis. Placerat orci nulla pellentesque dignissim enim sit amet venenatis.</li>
                                                        <li>Tortor posuere ac ut consequat. Bibendum est ultricies integer quis auctor. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis.</li>
                                                        <li>Blandit massa enim nec dui nunc mattis. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin.</li>
                                                        <li>Tellus at urna condimentum mattis. At in tellus integer feugiat scelerisque varius morbi enim nunc.</li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                            @if($key->career_detail_th2 || $key->career_detail_en2)                   
                                            <div class="row">
                                                <div class="col">
                                                    <div class="topicB-line">{{Session::get('lang') == 'en' ? "Qualifications " : "คุณสมบัติ"}}</div>
                                                    <ul class="job-detail">
                                                    <p>@php
                                                        if(Session::get('lang') == 'en'){
                                                            $content = $key->career_detail_en2;
                                                        }else{
                                                            $content = $key->career_detail_th2;
                                                        }

                                                        @endphp
                                                            {!!$content!!}</p>
                                                        <!-- <li>Malesuada fames ac turpis egestas. In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas.</li>
                                                        <li>Tortor posuere ac ut consequat. Bibendum est ultricies integer quis auctor. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis.</li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                            @if($key->career_detail_th3 || $key->career_detail_en3)
                                            <div class="row">
                                                <div class="col">
                                                    <div class="topicB-line">{{Session::get('lang') == 'en' ? "Responsibility " : "หน้าที่"}}</div>
                                                    <ul class="job-detail">
                                                    <p>@php
                                                        if(Session::get('lang') == 'en'){
                                                            $content = $key->career_detail_en3;
                                                        }else{
                                                            $content = $key->career_detail_th3;
                                                        }

                                                        @endphp
                                                            {!!$content!!}</p>
                                                        <!-- <li>Malesuada fames ac turpis egestas. In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas.</li>
                                                        <li>In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas. Scelerisque purus semper eget duis. Placerat orci nulla pellentesque dignissim enim sit amet venenatis.</li>
                                                        <li>Tellus at urna condimentum mattis. At in tellus integer feugiat scelerisque varius morbi enim nunc.</li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                            @if($key->career_detail_th4 || $key->career_detail_en4)
                                            <div class="row">
                                                <div class="col">
                                                    <div class="topicB-line">{{Session::get('lang') == 'en' ? " Additional Information" : "เพิ่มเติม"}} </div>
                                                    <ul class="job-detail">
                                                    <p>@php
                                                        if(Session::get('lang') == 'en'){
                                                            $content = $key->career_detail_en4;
                                                        }else{
                                                            $content = $key->career_detail_th4;
                                                        }

                                                        @endphp
                                                            {!!$content!!}</p>
                                                        <!-- <li>Malesuada fames ac turpis egestas. In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas.</li>
                                                        <li>In iaculis nunc sed augue lacus. Morbi tincidunt ornare massa eget egestas. Scelerisque purus semper eget duis. Placerat orci nulla pellentesque dignissim enim sit amet venenatis.</li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="topBD-Y">
                                                <form method="post" action="{{url('/career/upload_resume')}}" enctype="multipart/form-data">
                                                    <div class="row">
                                                        {!! csrf_field() !!}
                                                        <div class="col-lg-9 col-md-6 col-12">
                                                            <p>{{Session::get('lang') == 'en' ? "Interested candidates, please attach resume (.jpg,.png) " : "สนใจกรุณาส่งประวัติส่วนตัว (.jpg,.png)"}}</p>
                                                            <input id="upload-file" type="file" name="resume_image" >
                                                            <input type="text" value="<?php echo $key->career_id ?>" name="career_id" style="opacity:0">
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <button class="buttonB btn" type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                @endif 

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--------------- P A G E --------------->
            <div class="width100">
                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                            
                         {{ $career->links() }}
                                <!-- <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
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
    </div>
    
    <?php @include('frontend.inc_topbutton'); ?>
    @include('frontend.inc_footer')
    
    <script type="text/javascript">
        // collapse //
        $(document).ready(function() {
            $('.collapse.in').prev('.panel-heading').addClass('active');
            $('#accordion-2')
                .on('show.bs.collapse', function(a) {
                $(a.target).prev('.panel-heading').addClass('active');
                $('#job01').attr('class');
                $('#job02').attr('class');
            })
                .on('hide.bs.collapse', function(a) {
                $(a.target).prev('.panel-heading').removeClass('active');
                $('#job01').attr('class');
                $('#job02').attr('class');
            });
        });
    </script>

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