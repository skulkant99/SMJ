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
    
    <!--------------- K N O W L E D G E - D E T A I L --------------->

   
    <div class="content-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="BDyellow">{{Session::get('lang') == 'en' ? $knowledge->knowledge_topic_en : $knowledge->knowledge_topic_th}}</h3>
                    <div class="content-center mb-5">
                        <div class="dateBox"><?php echo DateEng($knowledge->knowledge_date); ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width mb-4">
                        <img src="{{asset('assets/images/knowledge')}}/{{$knowledge->knowledge_img}}" alt="">
                    </div>
                </div>
            </div>
                        
            <!-- <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width borderWH"><img src="{{asset('assets/images/knowledge/knowledge01.jpg')}}"></div>
                </div>
            </div> -->
            <div class="row">
                <div class="col">
                    <div class="txt-content">
                        <p>@php
                                          if(Session::get('lang') == 'en'){
                                              $content = $knowledge->knowledge_detail_en;
                                          }else{
                                              $content = $knowledge->knowledge_detail_th;
                                          }

                                @endphp
                                {!! $content !!}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="img-width borderWH"><img src="{{asset('assets/images/knowledge/knowledge02.jpg')}}"></div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col">
                    <div class="txt-content">
                        <p>Purus faucibus ornare suspendisse sed. Morbi tristique senectus et netus. Odio eu feugiat pretium nibh ipsum consequat nisl. Amet justo donec enim diam vulputate ut pharetra. Et egestas quis ipsum suspendisse ultrices gravida. Diam quis enim lobortis scelerisque fermentum dui faucibus in ornare. Quam vulputate dignissim suspendisse in est ante in nibh mauris. Tortor at auctor urna nunc id cursus metus. Fames ac turpis egestas integer eget aliquet nibh. Adipiscing vitae proin sagittis nisl rhoncus. Proin libero nunc consequat interdum varius sit amet. At augue eget arcu dictum varius duis at consectetur lorem. Massa enim nec dui nunc mattis enim ut tellus elementum. Purus sit amet volutpat consequat mauris. Imperdiet nulla malesuada pellentesque elit eget. Aliquam ut porttitor leo a diam sollicitudin tempor. Elementum tempus egestas sed sed risus. Eget mi proin sed libero enim sed faucibus turpis in. In cursus turpis massa tincidunt dui. Arcu non odio euismod lacinia at quis risus.</p>
                        <p>Lectus arcu bibendum at varius vel pharetra vel turpis. Amet tellus cras adipiscing enim eu turpis. Nisi lacus sed viverra tellus in. Ultrices in iaculis nunc sed augue lacus viverra vitae congue. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Scelerisque felis imperdiet proin fermentum leo vel orci porta. Ac odio tempor orci dapibus ultrices in iaculis nunc. Facilisi cras fermentum odio eu feugiat pretium. Congue nisi vitae suscipit tellus. Neque viverra justo nec ultrices. Purus in massa tempor nec feugiat nisl. Eu scelerisque felis imperdiet proin fermentum leo vel. Posuere ac ut consequat semper viverra nam. Dui nunc mattis enim ut. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis. Sapien et ligula ullamcorper malesuada proin.</p>
                    </div>
                </div>
            </div> -->

       

            <div class="row">
                <div class="col">
                    <div class="doubleBD">
                        <ul class="share">
                            <li><a>Share<i class="fas fa-share-alt"></i></a></li>
                            <li><a style="cursor:pointer" class="facebook" onClick="MyWindow=window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a style="cursor:pointer" class="twitter" onClick="MyWindow=window.open('https://twitter.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><i class="fab fa-twitter"></i></a></li>
                            <li><a style="cursor:pointer" class="line" onClick="MyWindow=window.open('https://lineit.line.me/share/ui?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>','MyWindow','width=600,height=300'); return false;"><img src="{{asset('assets/images/icon/icon-lineWH.svg')}}"></a></li>
                            <li><a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fas fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="content-center">
                        <a class="buttonB" href="{{url('knowledge_all')}}">BACK</a>
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
    
</body>
</html>
