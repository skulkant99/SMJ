
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php @include 'frontend.inc_header';
$pageName = "home";?>
    <!-- OwlCarousel -->

    @extends('layouts.main-style')

</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
      @include('frontend.inc_topmenu')

    <!---------- B A N N E R - S L I D E ---------->

    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="main-banner owl-carousel owl-theme">
                @if($banner)
                            @foreach($banner AS $key)
                            <div class="items"><img src="{{asset('assets/images/banner')}}/{{$key->banner_img}}"></div>
                            @endforeach
                        @endif
                    <!-- <div class="items"><img src="{{asset('assets/images/index/banner01.jpg')}}"></div>
                    <div class="items"><img src="{{asset('assets/images/index/banner02.jpg')}}"></div>
                    <div class="items"><img src="{{asset('assets/images/index/banner03.jpg')}}"></div> -->
                </div>
            </div>
        </div>
    </div>

    <!---------- I N D E X :: A B O U T ---------->
    <div class="index-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="SMJ-txt">
                        <div>S.M.J.</div>
                        Inter Products</div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="index-about-txt">
                        <div class="quote-top">“</div>
                        <p>{{Session::get('lang') == 'en' ? "More than 20 years, as a Medical and Dental Gases System specialists as well as Medical equipment distributor, we give precedence to innovation, efficiency, safety and reliability to our customers." : "บริษัทฯ เป็นผู้เชี่ยวชาญด้านการติดตั้งและตรวจสอบระบบแก๊สทางการแพทย์ ระบบแก๊สทางทันตกรรม รวมถึงเป็นตัวแทนจำหน่ายอุปกรณ์และเครื่องมือทางการแพทย์จากต่างประเทศมามากกว่า 20 ปี พวกเรามุ่งเน้นและให้ความสำคัญกับนวัตกรรมที่ทันสมัย การทำงานที่มีประสิทธิภาพและความปลอดภัย เพื่อให้ลูกค้าของเรามีความมั่นใจและเชื่อมั่นในบริการของเรา"}}</p>
                        <div class="quote-bottom">”</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!---------- I N D E X :: P R O D U C T - P C ---------->
        <div class="width100 mobile-none">
            <div class="row">
                <div class="col px-0">
                    <div class="hexagon-section">
                        <div class="honeycombs">
                            <h1 class="navy">{{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}</h1>
                            <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-45.png')}}">
                            </div>
                            <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-25.pn')}}g">
                            </div>
                            <a class="comb" href="{{url('product/30?id=30')}}">
                                <img src="{{asset('assets/images/index/hex-01MedicalGases.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Medical Gases System" : "ระบบแก๊สทางการแพทย์"}}</span>
                            </a>
                             <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-wh.png')}}">
                            </div>
                            <a class="comb" href="{{url('product/30?id=33')}}">
                                <img src="{{asset('assets/images/index/hex-04CeilingPendant.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Ceiling Pendant" : "ชุดศูนย์รวมอุปกรณ์       ทางการแพทย์"}}</span>
                            </a>
                            <a class="comb" href="{{url('product/30?id=31')}}">
                                <img src="{{asset('assets/images/index/hex-02DentalGases.png')}}">
                              <span>{{Session::get('lang') == 'en' ? "Dental Gases System" : "ระบบแก๊สทางทันตกรรม"}}</span>
                            </a>
                            <a class="comb" href="{{url('product/30?id=34')}}">
                                <img src="{{asset('assets/images/index/hex-05MedicalEquipment.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Medical Equipment" : " เครื่องมือและอุปกรณ์ทางการแพทย์"}}</span>
                            </a>
                            <a class="comb" href="{{url('product/30?id=32')}}">
                                <img src="{{asset('assets/images/index/hex-03ModularTheatre.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Modular Theatre System" : "ระบบห้องผ่าตัดสำเร็จรูป"}}</span>
                            </a>
                            <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-25.png')}}">
                            </div>
                            <a class="comb" href="{{url('product/30?id=35')}}">
                                <img src="{{asset('assets/images/index/hex-06OperatingLight.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Operating Light" : "โคมไฟผ่าตัด"}}</span>
                            </a>
                            <a class="comb" href="{{url('product/30?id=36')}}">
                                <img src="{{asset('assets/images/index/hex-07OperatingTable.png')}}">
                                <span>{{Session::get('lang') == 'en' ? "Operating Table" : "เตียงผ่าตัด"}}</span>
                            </a>
                            <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-25.png')}}">
                            </div>
                            <div class="comb no-pointer not-appear">
                                <img src="{{asset('assets/images/index/hex-wh.png')}}">
                            </div>
                            <div class="comb no-pointer">
                                <img src="{{asset('assets/images/index/hex-45.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!---------- I N D E X :: P R O D U C T - M O B I L E ---------->
        <div class="mobile">
            <div class="row">
                <div class="col pt-5">
                    <h1 class="navy">{{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-mobile owl-carousel owl-theme">
                        <a class="items" href="{{url('product/30?id=30')}}">
                            <img src="{{asset('assets/images/index/01MedicalGases.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Medical Gases System" : "ระบบแก๊สทางการแพทย์"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=31')}}">
                            <img src="{{asset('assets/images/index/02DentalGases.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Dental Gases System" : "ระบบแก๊สทางทันตกรรม"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=32')}}">
                            <img src="{{asset('assets/images/index/03ModularTheatre.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Modular Theatre System" : "ระบบห้องผ่าตัดสำเร็จรูป"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=33')}}">
                            <img src="{{asset('assets/images/index/04CeilingPendant.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Ceiling Pendant" : "อุปกรณ์ทางการแพทย์"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=34')}}">
                            <img src="{{asset('assets/images/index/05MedicalEquipment.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Medical Equipment" : " เครื่องมือและอุปกรณ์ทางการแพทย์"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=35')}}">
                            <img src="{{asset('assets/images/index/06OperatingLight.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Operating Light" : "โคมไฟผ่าตัด"}}</div>
                        </a>
                        <a class="items" href="{{url('product/30?id=36')}}">
                            <img src="{{asset('assets/images/index/07OperatingTable.jpg')}}">
                            <div class="product-type">{{Session::get('lang') == 'en' ? "Operating Table" : "เตียงผ่าตัด"}}</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- I N D E X :: A C T I V I T Y & K N O W L E D G E ---------->
    <div class="index-newsBG">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="row">
                        <div class="col">
                            <h1>{{Session::get('lang') == 'en' ? "ACTIVITIES " : "ข่าวสารและกิจกรรม"}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="activity-slide owl-carousel owl-theme">
                        @if($activities)
                            @foreach($activities AS $key)
                            <div class="items">
                                <div class="newsBox index">
                                    <a class="img-width" href="{{url('activity_detail')}}/{{$key->activities_id}}"><img src="{{asset('assets/images/activities')}}/{{$key->activities_img}}"></a>
                                    <div class="newsBox-info">
                                        <a class="news-topic" href="{{url('activity_detail')}}/{{$key->activities_id}}">
                                            <p>{{Session::get('lang') == 'en' ? $key->activities_topic_en	 : $key->activities_topic_th}}</p>
                                        </a>
                                        <div class="content-center">
                                            <div class="dateBox"> <?php echo DateEng($key->activities_date); ?></div>
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
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="row">
                        <div class="col">
                            <div class="ribbonY">{{Session::get('lang') == 'en' ? "KNOWLEDGE" : "สาระน่ารู้"}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="index-knowledge-section">
                        @if($knowledge)
                            @foreach($knowledge AS $key)
                                <div class="index-knowledge">
                                    <a href="{{url('knowledge_detail')}}/{{$key->knowledge_id}}">{{Session::get('lang') == 'en' ? $key->knowledge_topic_en	 : $key->knowledge_topic_th}}</a>
                                    <div class="dateBox"> <?php echo DateEng($key->knowledge_date); ?></div>
                                </div>
                            @endforeach
                        @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="content-center">
                                <a class="buttonB hoverY" href="{{url('knowledge_all')}}">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- I N D E X :: P A R T N E R ---------->
    <div class="content-padding partner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 id="partner">OUR PARTNERS</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="partner-slide owl-carousel owl-theme">
                        @if($partner)
                            @foreach($partner AS $key)
                            <a class="items" rel="stylesheet" href="{{$key->partner_link}}" target="_blank"><img src="{{asset('assets/images/partner')}}/{{$key->partner_img}}"></a>
                            @endforeach
                        @endif
                        <!-- <a class="items" rel="stylesheet" href="https://www.bowa-medical.com/" target="_blank"><img src="{{asset('assets/images/index/p-bowa.jpg')}}"></a>
                        <a class="items" rel="stylesheet" href="https://www.htgroup.de/en/home.html" target="_blank"><img src="{{asset('assets/images/index/p-htgroup.jpg')}}"></a>
                        <a class="items" rel="stylesheet" href="https://www.duerrdental.com/en/home/" target="_blank"><img src="{{asset('assets/images/index/p-durrdental.jpg')}}"></a>
                        <a class="items" rel="stylesheet" href="https://www.xenios-ag.com/" target="_blank"><img src="{{asset('assets/images/index/p-xenios.jpg')}}"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php @include 'frontend.inc_topbutton';?>
    @include('frontend.inc_footer')

      <!-- function Date -->
                                     <?php
function DateEng($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthEng = $strMonthCut[$strMonth];
    //return "$strDay $strMonthEng $strYear";
    return "$strDay $strMonthEng  $strYear";
    //        <div class="descnews_date">June. 06, 2019</div>
}
?>



</body>
</html>