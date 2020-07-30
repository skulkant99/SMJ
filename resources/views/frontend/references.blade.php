<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head> <?php @include('frontend.inc_header'); $pageName="reference"; ?>@extends('layouts.main-style')</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')

    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/reference/banner-reference.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">
            {{Session::get('lang') == 'en' ? "REFERENCES" : "ผลงานของเรา"}}</div>
    </div>

    <!---------- R E F E R E N C E S ---------->
    <div class="content-padding">
        <div class="container">

            <!---------- R E F E R E N C E - T O P I C ---------->
            <div class="row">
                <div class="col">
                    <!---------- MOBILE - NONE ---------->
                    <ul class="topicRef-icon mobile-none">


                        @if($type)
                        @foreach($type AS $key => $item)
                        <li id="topic-ref-{!!$item->type_id!!}">
                            <a href="{{url('references')}}/{{$item->type_id}}" onclick="type({{$item->type_id}})">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/type')}}/{{$item->type_img}}">
                                    </div>
                                </div>
                                <p>{{Session::get('lang') == 'en' ? $item->type_name_en	 : $item->type_name_th}}</p>
                            </a>
                        </li>
                        @endforeach
                        @endif

                        <!-- <a href="#">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/reference/icon-dentalgases.png')}}"></div>
                                </div>
                                <p>Dental Gases <br>System</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/reference/icon-modulartheatre.png')}}"></div>
                                </div>
                                <p>MODULAR THEATRE <br>System</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/reference/icon-ceilingpendant.png')}}"></div>
                                </div>
                                <p>CEILING PENDANT</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/reference/icon-medicalequipment.png')}}"></div>
                                </div>
                                <p>MEDICAL EQUIPMENT</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="ref-iconBD">
                                    <div class="icon"><img src="{{asset('assets/images/reference/icon-maintenance.png')}}"></div>
                                </div>
                                <p>SERVICE AND MAINTENANCE</p>
                            </a>
                        </li> -->


                    </ul>

                    <!---------- MOBILE ---------->
                    <div class="dropdown projectDropdown mobile">
                        <button class="btn btn-secondary dropdown-toggle shadow-none" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            select references
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if($type)
                            @foreach($type AS $key)
                            <a class="dropdown-item"
                                href="{{url('references')}}/{{$key->type_id}}">{{Session::get('lang') == 'en' ? $key->type_name_en	 : $key->type_name_th}}</a>
                            <!-- <a class="dropdown-item" href="#">Dental Gases System</a>
                            <a class="dropdown-item" href="#">Modular Theatre System</a>
                            <a class="dropdown-item" href="#">Ceiling Pendant</a>
                            <a class="dropdown-item" href="#">Medical Equipment</a>
                            <a class="dropdown-item" href="#">Service and Maintenance</a> -->
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="ref-topic">
                        <div class="icon"><img src="{{asset('assets/images/type')}}/{{$type2->type_img}}"></div>
                        {{Session::get('lang') == 'en' ? $type2->type_name_en	 : $type2->type_name_th}}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="ref-acc">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">

                                @if($references)
                                @foreach($references AS $index => $key)
                                <!-- REFERENCE :: 01 -->
                                <div class="panel-heading" role="tab" id="headingOne{{$key->references_id}}">
                                    <div class="row">
                                        <div class="col">
                                            <a id="ref01" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseOne{{$key->references_id}}" aria-expanded="true"
                                                aria-controls="collapseOne"><i
                                                    class="fas fa-angle-double-right"></i>{{Session::get('lang') == 'en' ? $key->references_name_en	 : $key->references_name_th}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne{{$key->references_id}}" class="panel-collapse collapse"
                                    role="tabpanel" aria-labelledby="headingOne{{$key->references_id}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content txt-indent">
                                                    <p>@php
                                                        if(Session::get('lang') == 'en'){
                                                        echo substr ($content = $key->references_detail_en,0,20);
                                                        }else{
                                                        echo substr ($content = $key->references_detail_th,0,20);
                                                        }

                                                        @endphp
                                                        {!!$content!!} </p>
                                                </div>
                                            </div>
                                        </div>

                                        @php

                                        $referencesimg =
                                        DB::table('referencesimg')->where('references_id',$key->references_id)->get();

                                        @endphp

                                        <div class="row">
                                            <div class="col-lg-10 col-md-10 col-12 offset-lg-1 offset-md-1">
                                                <ul class="ref-gallery">
                                                    @if($referencesimg)
                                                    @foreach ($referencesimg AS $item)
                                                    <li>
                                                        <a data-fancybox="images-<?php echo $index; ?>"
                                                            class="image-gallery"
                                                            data-caption="{{$item->referencesimg_name_th}}"
                                                            href="{{asset('assets/images/referencesimg')}}/{{$item->referencesimg_img}}"><img
                                                                class="image-gallery"
                                                                src="{{asset('assets/images/referencesimg')}}/{{$item->referencesimg_img}}"></a>
                                                    </li>
                                                    @endforeach
                                                    @endif

                                                    <!-- <li>
                                                        <a data-fancybox="gallery" data-caption="Master Alarm" href="{{asset('assets/images/reference/ref-02.jpg')}}"><img src="{{asset('assets/images/reference/ref-02.jpg')}}"></a>
                                                    </li>

                                                    <li>
                                                        <a data-fancybox="gallery" data-caption="Medical Air Compressor Plant (Package Unit from OHIO Medical / USA)" href="{{asset('assets/images/reference/ref-03.jpg')}}"><img src="{{asset('assets/images/reference/ref-03.jpg')}}"></a>
                                                    </li>

                                                    <li>
                                                        <a data-fancybox="gallery" data-caption="Surgical Air Compressor Plant (Package Unit from OHIO Medical / USA)" href="{{asset('assets/images/reference/ref-04.jpg')}}"><img src="{{asset('assets/images/reference/ref-04.jpg')}}"></a>
                                                    </li> -->
                                                </ul>
                                            </div>
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
    </div>

    <?php @include('frontend.inc_topbutton'); ?>
    @include('frontend.inc_footer')

    <script type="text/javascript">
        // collapse //
        window.onload = function () {
            var id = window.location.pathname.slice(-2);
            var el = document.getElementById("topic-ref-" + id);
            el.classList.add("active")
        }
    </script>

</body>

</html>