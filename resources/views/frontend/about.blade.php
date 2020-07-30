<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php @include('frontend.inc_header'); $pageName="about"; ?>@extends('layouts.main-style')
</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<body>
    <div class="thetop"></div>
    

    @include('frontend.inc_topmenu')
    
    <!--------------- B A N N E R - T O P --------------->
    <!--<div class="img-width"><img src="{{asset('assets/images/about/banner-about.jpg')}}"></div>-->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/about/banner-about.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "ABOUT US" : "เกี่ยวกับเรา"}}</div>
    </div>
    
    <!---------- A B O U T - U S ---------->
    <div class="aboutBG">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mobile-none">
                    <br>
                    <br>
                    <br>
                    <div class="about-img">
                        <div class="img-width mb-3"><img src="{{asset('assets/images/about/about01.jpg')}}"></div>
                        <div class="img-width"><img src="{{asset('assets/images/about/about02.jpg')}}"></div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hexagonBG">
                        <div class="about-txtBox">
                            <p><span>{{Session::get('lang') == 'en' ? "S.M.J. Inter Products CO., LTD" : "บริษัท เอส. เอ็ม. เจ. อินเตอร์โพรดักส์ จำกัด "}}</span> {{Session::get('lang') == 'en' ? "was established in 1998 as a Medical Devices distributor, Medical gases and Dental gases system specialist, Modular Theatre system designing and installation as well as Ceiling Pendant. Our company has been placed an entrusting from world leading manufacturers to be a representative dealer." : "เริ่มจดทะเบียนเป็นบริษัทเมื่อปี พ.ศ. 2541 บริษัทดำเนินกิจการนำเข้าอุปกรณ์ทางการแพทย์, ติดตั้งและระบบแก๊สทางการแพทย์ ระบบแก๊สทางทันตกรรม, ออกแบบและติดตั้งระบบห้องผ่าตัดสำเร็จรูป และชุดศูนย์รวมอุปกรณ์ทางการแพทย์ โดยได้รับความไว้วางใจให้เป็นตัวแทนจำหน่ายจากบริษัทผู้ผลิตชั้นนำระดับโลก "}}</p>
                            <p>{{Session::get('lang') == 'en' ? "Our company aims to seek the medical equipment which have been certified by CE Mark and FDA Approval as well as ISO 13485. Besides, medical gases products have been certified by NFPA 99 (National Fire Protection Association), UL Listed and CSA Certificated  in order to ensure that our customers (government and private sectors) receive the best quality and safety from our products and services. After medical gases system installation, we also provide Commissioning Test before operate the system since our engineer have been trained and certified by NFPA 99 to have a right in inspection, operation and management in medical gases system." : "บริษัทฯ ให้ความสำคัญกับการบริการก่อนและหลังการขาย โดยบริการให้คำปรึกษาและให้ลูกค้าสามารถทดลองผลิตภัณฑ์ก่อนการตัดสินใจสั่งซื้อ เพื่อให้ลูกค้าได้รับสินค้าที่ตรงตามความต้องการและการใช้งาน ทั้งนี้บริษัทฯ ยังให้ความใส่ใจกับการบริการหลังการขาย โดยการจัดอบรม ให้คำแนะนำกับผู้ใช้งาน รวมไปถึงการบริการซ่อมบำรุง เพื่อให้เกิดประสิทธิภาพสูงสุดในการใช้งาน"}}</p>
                            <p>{{Session::get('lang') == 'en' ? "Before and after-sale, service is another area that the company give precedence. We are willing to give advice to our customers and offer the product's trial for customers to choose the right products that serve their needs before making a decision. Moreover, we provide after-sale service by hosting relevance training for hospital staffs as well as maintenance service for customer assurance." : "บริษัทของเรา มุ่งเน้นในการสรรหาเครื่องมือและอุปกรณ์ทางการแพทย์ที่ได้รับรองความปลอดภัยจาก FDA Approval, CE Mark และมาตรฐาน ISO 13485 รวมถึงสินค้าทางระบบแก๊สทางการแพทย์ที่ผ่านการรับรองคุณภาพจาก National Fire Protection Association (NFPA99), UL Listed และ CSA Certificated เพื่อให้ลูกค้าทั้งภาครัฐและเอกชนได้รับสินค้าที่มีคุณภาพ และได้รับความปลอดภัยในการใช้งาน นอกจากนี้ภายหลังจากการติดตั้งระบบแก๊สทางการแพทย์ บริษัทฯ ยังมีบุคลากรที่ผ่านการอบรมตามมาตรฐาน NFPA 99 และมีสิทธิ์ในการตรวจสอบระบบแก๊สทางการแพทย์ก่อนส่งมอบงาน (Commissioning Test) และเปิดใช้งานระบบ"}}</p>
                            <p>{{Session::get('lang') == 'en' ? "The company has been accepted as reliable medical device products and services from public and private hospitals in Thailand for over 20 years. It can be illustrated by our track record and on-going project. Please find more details from our " : "ตลอดระยะเวลามากกว่า 20 ปี บริษัทฯ ได้ดำเนินกิจการเพื่อให้บรรลุเป้าหมายข้างต้น บริษัทฯ จึงประสบความสำเร็จอย่างต่อเนื่อง จนเป็นที่ยอมรับอย่างกว้างขวางทั้งในโรงพยาบาลรัฐบาลและเอกชน ทำให้บริษัทฯ ได้รับความน่าเชื่อถือ และไว้วางใจจากลูกค้าหลากหลายองค์กร สามารถชมรายระเอียดผลงานที่ผ่านมาของบริษัทฯ"}} <a href="{{url('references/14')}}">{{Session::get('lang') == 'en' ? "references" : "ได้ที่ผลงานของเรา"}}</a> {{Session::get('lang') == 'en' ? "page." : ""}}</p>
                        </div>
                    </div>   
                </div>
                <div class="col-12 mobile">
                    <div class="about-img">
                        <div class="img-width"><img src="{{asset('assets/images/about/about01.jpg')}}"></div>
                        <div class="img-width"><img src="{{asset('assets/images/about/about02.jpg')}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-line-through">
                        <h5 class="navy">{{Session::get('lang') == 'en' ? "OUR MAIN FOCUS AREA" : "สินค้าและบริการของเรา"}}</h5>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 offset-lg-0 offset-md-2">
                    <div class="blueBox">
                        <div class="Blue-roundBox">{{Session::get('lang') == 'en' ? "SYSTEM" : "งานระบบ"}}</div>
                        <ul class="list-content">
                            <li>{{Session::get('lang') == 'en' ? "Medical Gases" : "ระบบแก๊สทางการแพทย์"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Dental Gases" : "ระบบแก๊สทางทันตกรรม"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Modular Theatre" : "ระบบห้องผ่าตัดสำเร็จรูป"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Ceiling Pendant" : "ชุดศูนย์รวมอุปกรณ์ทางการแพทย์"}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-12 offset-lg-0 offset-md-2">
                    <div class="blueBox">
                        <div class="Blue-roundBox">{{Session::get('lang') == 'en' ? "MEDICAL EQUIPMENT" : "เครื่องมือทางการแพทย์"}}</div>
                        <ul class="list-content">
                            <li>{{Session::get('lang') == 'en' ? "Operating Theatre" : "ห้องผ่าตัด"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Intensive Care Unit" : "ผู้ป่วยวิกฤต"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Emergency Room" : "ห้องอุบัติเหตุและฉุกเฉิน"}}</li>
                            <li>{{Session::get('lang') == 'en' ? "Hospital Wards" : "หอผู้ป่วย"}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-12 offset-lg-0 offset-md-2">
                    <div class="blueBox wTopic">
                        <div class="topic">{{Session::get('lang') == 'en' ? "Service and Maintenance" : "งานบริการและซ่อมบำรุง"}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php @include('frontend.inc_topbutton'); ?>
    @include('frontend.inc_footer')

    
    
</body>
</html>