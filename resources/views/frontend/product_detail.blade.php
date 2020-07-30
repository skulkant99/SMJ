<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php @include 'frontend.inc_header';
$pageName = "product";?>
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="{{asset('assets/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/OwlCarousel/owl.theme.default.min.css')}}">

    @extends('layouts.main-style')
</head>
<link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<body>
    <div class="thetop"></div>
    @include('frontend.inc_topmenu')

    <!--------------- B A N N E R - T O P --------------->
    <div class="banner-top">
        <div class="img-width"><img src="{{asset('assets/images/product/banner-product.jpg')}}"></div>
        <div class="bannerBox d-flex justify-content-center">{{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}
        </div>
    </div>
    <?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}?>
    <!--------------- P R O D U C T S :: D E T A I L --------------->
    <div class="content-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>{{Session::get('lang') == 'en' ? $product->product_code	 : $product->product_code_th}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 offset-lg-1">
                    <div class="row">
                        <div class="col">
                            <div class="product-slide">
                                <div id="big" class="owl-carousel owl-theme">
                                    @if($productimg)
                                    @foreach($productimg AS $index => $key)
                                   <a class="image-gallery" data-fancybox="images"
                                        data-caption="{{$key->productimg_name_th}}"
                                        href="{{asset('assets/images/productimg')}}/{{$key->productimg_img}}">
                                            <img src="{{asset('assets/images/productimg')}}/{{$key->productimg_img}}">
                                    </a>
                                    @endforeach
                                    @endif

                                </div>
                                <div id="thumbs" class="owl-carousel owl-theme">
                                    @if($productimg)
                                    @foreach($productimg AS $key)
                                    <div class="image-gallery" data-fancybox="images-sub"><img
                                            src="{{asset('assets/images/productimg')}}/{{$key->productimg_img}}"></div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <h5 class="navy">PRODUCT DESCRIPTION</h5>
                        </div>
                    </div>
                    <div class="blueBox big mt-3">
                        <div class="row">
                            <div class="col">
                                <div class="txt-content txt-indent">

                                    <p>@php
                                        if(Session::get('lang') == 'en'){
                                        echo substr ($content = $product->product_detail_en,0,20);
                                        }else{
                                        echo substr ($content = $product->product_detail_th,0,20);
                                        }

                                        @endphp
                                        {!!$content!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col">
                            <h5 class="navy">ADDITIONAL INFORMATION</h5>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <p>@php
                                if(Session::get('lang') == 'en'){
                                $content = $product->product_table_en;
                                }else{
                                $content = $product->product_table_th;
                                }

                                @endphp
                                {!!$content!!}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php @include 'frontend.inc_topbutton';?>
    @include('frontend.inc_footer')




</body>

</html>