<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php @include('frontend.inc_header'); $pageName="contact"; ?>@extends('layouts.main-style')</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')
    
    <!--------------- G O O G L E - M A P --------------->
    <div class="googlemap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.2141321390845!2d100.72150145037214!3d13.826176690251723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d648faa7c0873%3A0x62a633c25c9e9083!2sS.M.J.%20INTER%20PRODUCTS%20CO.%2C%20LTD.!5e0!3m2!1sen!2sth!4v1582857634432!5m2!1sen!2sth" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    
    <div class="contactBG">
        <div class="container">
            <div class="row">
                <!---------- C O N T A C T - I N F O ---------->
                <div class="col-lg-6 col-12">
                    <div class="contact-part">
                        <div class="row">
                            <div class="col">
                                <div class="ribbonNavy" id="contact">{{Session::get('lang') == 'en' ? "CONTACT INFO" : "ติดต่อเรา"}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>{{Session::get('lang') == 'en' ? "S.M.J. INTER PRODUCTS CO., LTD" : "บริษัท เอส.เอ็ม.เจ. อินเตอร์โพรดักส์ จำกัด"}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul class="contact-info-section">
                                    <li>
                                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="contact-info">
                                            <div>{{Session::get('lang') == 'en' ? "HEAD OFFICE" : "สำนักงานใหญ่"}}</div>
                                            <p>{{Session::get('lang') == 'en' ? "29/8 Samwa Road, Minburi Bangkok 10510" : "29/8 ถนนสามวา แขวงมีนบุรี เขตมีนบุรี กรุงเทพมหานคร 10510"}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-icon"><i class="far fa-clock"></i></div>
                                        <div class="contact-info">
                                            <p>{{Session::get('lang') == 'en' ? "Monday - Saturday  8:00AM - 5:00 PM" : "วันจันทร์ – วันเสาร์ 8:00 น. – 17:00 น."}}</p>
                                        </div>
                                    </li>
                                    <li class="w50">
                                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                                        <div class="contact-info">
                                            <p>0-2918-6451</p>
                                        </div>
                                    </li>
                                    <li class="w50">
                                        <div class="contact-icon"><i class="fas fa-fax"></i></div>
                                        <div class="contact-info">
                                            <p>0-2918-6452 </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                        <div class="contact-info">
                                            <a href="mailto:info@smjip.com">info@smjip.com </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                <div class="row">
                    <div class="col">
                        <h5>{{Session::get('lang') == 'en' ? "DEPARTMENT CONTACT" : "ติดต่อแผนก"}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="contact-info-section" id="branch">
                            <li>{{Session::get('lang') == 'en' ? "Head Office :" :"สำนักงานใหญ่ :"}} <span>0-2918-6451</span></li>
                            <li>{{Session::get('lang') == 'en' ? "Engineering Department :" :"แผนกวิศวกรรมและซ่อมบำรุง :"}} <span>08-4427-8815</span></li>
                            <li>{{Session::get('lang') == 'en' ? "Sales and Marketing Department :" :"แผนกขายและการตลาด :"}} <span>08-4923-1976</span></li>
                            <li>{{Session::get('lang') == 'en' ? "Accounting and Finance Department : " :"แผนกบัญชีและการเงิน :"}} <span>08-4923-1946</span></li>
                            <li>{{Session::get('lang') == 'en' ? "Human Resources Department :" : "แผนกทรัพยากรบุคคล :"}} <span>08-9921-4118</span></li>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>
                <!---------- C O N T A C T - F O R M ---------->
                <div class="col-lg-6 col-12">
                     <form method="post" action="{{url('/contact/contact_us')}}">
                    <div class="input-form">  
                    {!! csrf_field() !!}
                    <div class="row">
                            <div class="col">
                                <div class="YBDtopic">{{Session::get('lang') == 'en' ? "CONTACT FORM" : "แบบฟอร์มการติดต่อ"}}</div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <p>{{Session::get('lang') == 'en' ? "Name" : "ชื่อ-นามสกุล"}}</p>
                                <input type="text" class="form-control shadow-none" name="name">
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <p>{{Session::get('lang') == 'en' ? "Email" : "อีเมล"}}</p>
                                <input type="text" class="form-control shadow-none"name="email">
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <p>{{Session::get('lang') == 'en' ? "Phone number" : "เบอร์โทรศัพท์"}}</p>
                                <input type="text" class="form-control shadow-none"name="phone_number">
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <p>{{Session::get('lang') == 'en' ? "Topic" : "เรื่อง"}}</p>
                                <input type="text" class="form-control shadow-none"name="topic">
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <p>{{Session::get('lang') == 'en' ? "Message" : "ข้อความ"}}</p>
                                <textarea class="form-control shadow-none"name="message"></textarea>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col">
                                <button class="buttonB" type="submit" id="submitContact" >SUBMIT</button>
                                <a class="buttonGR ml-3"  href="{{url('contact')}}">RESET</a>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>

            </div>
        </div>
    </div>
    
    <?php @include('frontend.inc_topbutton.php'); ?>
    @include('frontend.inc_footer')
    
</body>
</html>