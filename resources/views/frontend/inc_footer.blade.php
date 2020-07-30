<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12">
                <!-- ADDRESS -->
                <div class="row">
                    <div class="col">
                        <ul class="footer-contact">
                            <li>
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="footer-info">
                                        <span>{{Session::get('lang') == 'en' ? "S.M.J. Inter Products Co.,Ltd." : "บริษัท เอส.เอ็ม.เจ. อินเตอร์โพรดักส์ จำกัด"}}</span>
                                        <p>{{Session::get('lang') == 'en' ? "29/8 Samwa Road, Minburi, Bangkok 10510" : "29/8 ถนนสามวา แขวงมีนบุรี เขตมีนบุรี กรุงเทพมหานคร 10510"}}</p>
                                        <p><i class="far fa-clock"></i>{{Session::get('lang') == 'en' ? "Monday - Saturday  8:00 AM - 5:00 PM" : "วันจันทร์ – วันเสาร์ 8:00 น. – 17:00 น."}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- EMAIL -->
                <div class="row">
                    <div class="col">
                        <ul class="footer-contact">
                            <li>
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="footer-info">
                                    <a href="mailto:info@smjip.com">info@smjip.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>     
            </div>
            <!-- PHONE -->
            <div class="col-lg-3 col-12">
                <ul class="footer-contact">
                    <li>
                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="footer-info">
                            <span>{{Session::get('lang') == 'en' ? "Head Office" : "สำนักงานใหญ่"}}</span>
                            <p>(+66)-2918-6451</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- MOBILE -->
            <div class="col-lg-4 col-12">
                <ul class="footer-contact">
                    <li>
                        <div class="contact-icon"><i class="fas fa-mobile-alt"></i></div>
                        <div class="footer-info">
                            <span>{{Session::get('lang') == 'en' ? "Medical Gases System" : "งานระบบแก๊สทางการแพทย์"}}</span>
                            <p>(+66)8-4427-8815</p>
                        </div>
                        <div class="footer-info">
                            <span>{{Session::get('lang') == 'en' ? "Medical Equipment" : "เครื่องมือและอุปกรณ์ทางการแพทย์"}}</span>
                            <p>(+66)8-4923-1976</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
            
    </div>
</footer>
<div class="copyright">© 2020 S.M.J. Inter Products Co., ltd.<span> All Rights Reserved.</span></div>