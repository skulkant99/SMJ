<div class="row">
    <div class="col">
                <div class="product-acc">
            <ul>
                <li>
                    <a>REFINE PRODUCT</a>
                    <ul>
                        <li>
                        <a>Medical Gases System</a>
                        <ul>
                            <li><a>Outlet</a>
                                <ul>
                                    <li><a href="">Wall Outlet</a></li>
                                    <li><a href="">Ceiling Outlet</a></li>
                                    <li><a href="">Console Outlet</a></li>
                                </ul>
                            </li>
                            <li><a>Alarm System</a>
                                <ul>
                                    <li><a href="">Digital Area Alarm</a></li>
                                    <li><a>Master Alarm</a>
                                        <ul>
                                            <li><a href="">Master Alarm</a></li>
                                            <li><a href="">Digital Master Alarm</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Combination Alarm</a></li>
                                </ul>
                            </li>
                            <li><a>Valve and Zone Valve Box</a>
                                <ul>
                                    <li><a href="">Valve with Extensions</a></li>
                                    <li><a href="">Zone Valve Box</a></li>
                                </ul>
                            </li>
                            <li><a>O.R. Equipment</a>
                                <ul>
                                    <li><a href="">Gas Control Panel</a></li>
                                    <li><a href="">Hose</a></li>
                                    <li><a href="">The Retractable Ceiling Column</a></li>
                                    <li><a href="">The Rigid Ceiling Column</a></li>
                                </ul>
                            </li>
                            <li><a>Gas Manifold</a>
                                <ul>
                                    <li><a href="">Gas Manifold</a></li>
                                </ul>
                            </li>
                            <li><a>Main Equipment</a>
                                <ul>
                                    <li><a>Medical Air Compressor</a>
                                        <ul>
                                            <li><a href="">Oil Less Rotary Scroll Air</a></li>
                                            <li><a href="">Oil Less Reciprocating Piston Air Compressor</a></li>
                                            <li><a href="">Instrument Air / Lubricated</a></li>
                                        </ul>
                                    </li>
                                    <li><a>Medical Vacuum</a>
                                        <ul>
                                            <li><a href="">Claw Vane Vacuum</a></li>
                                            <li><a href="">Rotary Vane Vacuum </a></li>
                                        </ul>
                                    </li>
                                    <li><a>Waste Anesthetic Gas Disposal (WAGD)</a>
                                        <ul>
                                            <li><a href="">Claw Vane Vacuum</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a>Dental Gases System</a>
                        <ul>
                            <li class="active"><a>Dental Air Compressed</a>
                                <ul>
                                    <li class="active"><a>Compressed Air for Clinic</a>
                                        <ul>
                                            <li><a href="">P12000</a></li>
                                            <li><a href="">P9000</a></li>
                                            <li><a href="">P12000</a></li>
                                        </ul>
                                    </li>
                                    <li><a>Oil Less Compressor</a>
                                        <ul>
                                            <li><a href="">Tornado</a></li>
                                            <li><a href="">Duo</a></li>
                                            <li><a href="">Trio</a></li>
                                            <li><a href="">Duo Tandem</a></li>
                                            <li><a href="">Quattro Tandem</a></li>
                                            <li><a href="">Quattro P20</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a>Dental Suction</a>
                                <ul>
                                    <li><a>Clinic Suction</a>
                                        <ul>
                                            <li><a href="">V18000</a></li>
                                            <li><a href="">V15000</a></li>
                                            <li><a href="">V12000</a></li>
                                            <li><a href="">V9000</a></li>
                                            <li><a href="">V6000</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Amalgam Separator</a></li>
                                </ul>
                            </li>
                            <li><a>Hygiene</a>
                                <ul>
                                    <li><a href="">Orotol Plus 30 L</a></li>
                                </ul>
                            </li>
                            <li><a>Dental Visual Display</a>
                                <ul>
                                    <li><a href="">Dental Visual Display</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>Modular Theatre System</a>
                    </li>
                    <li>
                        <a>Ceiling Pendant</a>
                    </li>
                    <li>
                        <a>Medical Equipment</a>
                    </li>
                    <li>
                        <a>Operating Light</a>
                    </li>
                    <li>
                        <a>Operating Table</a>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $(".product-acc a").click(function() {
            var link = $(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;

            closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length)
                    parallel_active_links.removeClass("active");
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
        })
    })
</script>