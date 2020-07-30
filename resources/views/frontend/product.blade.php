<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php @include 'frontend.inc_header';
$pageName = "product";?>
    @extends('layouts.main-style')

</head>

<script src="{{asset('assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/flexslider/jquery.flexslider.js')}}"></script>
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
    <!--------------- P R O D U C T S --------------->
    <div class="content-padding">
        <div class="container">
            <div class="product-padding">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="productBox-menu">
                            <div class="ribbonNavy mobile-none" id="product">
                                {{Session::get('lang') == 'en' ? "PRODUCTS" : "ผลิตภัณฑ์"}}</div>
                            <div class="row">
                                <div class="col">
                                    <div class="searchBox productPage">
                                        <input type="search shadow-none" id="input-search"
                                            placeholder="Search Products">
                                        <a href="javascript:void(0)" onclick='setQuerySearchString()'><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="product-acc">
                                        <ul>
                                            <li>
                                                <a>REFINE PRODUCT</a>
                                                <ul>
                                                    @if($category && $categorysub && $category_super_sub)
                                                    @foreach($category AS $index => $val)
                                                    <li>
                                                        @if(Session::get('lang') == 'en')
                                                        <a href="javascript:void(0)" style="color:white;"
                                                            onclick="fetchProductId(<?php echo $val->category_id ?>); set_text_header('<?php echo $val->category_name_en ?>')">{{ $val->category_name_en}}</a>
                                                        @else
                                                        <a href="javascript:void(0)" style="color:white;"
                                                            onclick="fetchProductId(<?php echo $val->category_id ?>); set_text_header('<?php echo $val->category_name_th ?>')">{{ $val->category_name_th}}</a>
                                                        @endif
                                                        <ul>
                                                            @foreach($categorysub AS $index_sub => $val_sub)
                                                            @if($val->category_id == $val_sub->category_id)
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    onclick="fetchProductId(<?php echo $val->category_id ?>,<?php echo $val_sub->categorysub_id ?>)">{{Session::get('lang') == 'en' ? $val_sub->categorysub_name_en	 : $val_sub->categorysub_name_th}}</a>
                                                                <ul>
                                                                    @foreach($category_super_sub AS $index_super_sub =>
                                                                    $val_super_sub)
                                                                    @if($val_sub->categorysub_id ==
                                                                    $val_super_sub->categorysub_id)
                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="fetchProductId(<?php echo $val->category_id ?>,<?php echo $val_sub->categorysub_id ?>,<?php echo $val_super_sub->categorysub_2_id ?>)">{{Session::get('lang') == 'en' ? $val_super_sub->categorysub_2_name_en : $val_super_sub->categorysub_2_name_th}}</a>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-12">
                        <div class="row">
                            <div class="col" id="header-title">

                            </div>
                        </div>
                        <div class="product-section">
                            <div class="row" id="product_row">

                            </div>
                        </div>
                        <!--------------- P A G E --------------->
                        <div class="row">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center" id="pagination-body">

                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php @include 'frontend.inc_topbutton';?>
    @include('frontend.inc_footer')

    <script type="text/javascript">
        // ACCORDION //
        $(document).ready(function () {
            $('.collapse.in').prev('.panel-heading').addClass('active');
            $('#abc')
            .on('show.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').addClass('active');
            })
            .on('hide.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').removeClass('active');
            });
        });



        // $(".product-acc a").click(function () {
        //     var link = $(this);
        //     var closest_ul = link.closest("ul");
        //     var parallel_active_links = closest_ul.find(".active")
        //     var closest_li = link.closest("li");
        //     var link_status = closest_li.hasClass("active");
        //     var count = 0;

        //     closest_ul.find("ul").slideUp(function () {
        //         if (++count == closest_ul.find("ul").length)
        //             parallel_active_links.removeClass("active");
        //     });

        //     if (!link_status) {
        //         closest_li.children("ul").slideDown();
        //         closest_li.addClass("active");
        //     }
        // })

    </script>

</body>

</html>
<script>
    function setQuerySearchString() {
        var search_value = document.getElementById("input-search").value
        window.history.pushState({
            path: window.location.href.split('?')[0] + `?search=${search_value}`
        }, '', window.location.href.split('?')[0] + `?search=${search_value}`)
        $('#header-title').html('<h2>Search</h2>')
        $.ajax({
            type: "POST",
            url: '/smj/ajax',
            data: {
                search: search_value
            },
            dataType: 'json',
            success: function (data, status) {
                var html = '';
                if (status === "success") {
                    // console.log(data)
                    renderPagination(data.product.last_page)
                    data.product.data.forEach((item, index) => {
                        html += `<div class="col-lg-6 col-md-6 col-12">
                                    <a class="productBox" href="{{url('product_detail/${item.product_id}')}}">
                                        <div class="model-name">
                                          ${item.product_code}
                                        </div>
                                        <img src="{{asset('assets/images/product/${item.product_img}')}}">
                                    </a>
                                </div>`
                    })
                }
                $("#product_row").html(html)
            },
            error: function (x, y, z) {
                alert('พบข้อผิดพลาด')
            }
        })
    }

    function set_text_header(name) {
        $('#header-title').html(`<h2>${name}</h2>`)
    }

    function fetchProductId(id, sub_id, super_sub_id) {
        $("#product_row").html('')
        var data = {}
        if (id && !sub_id && !super_sub_id) {
            data = {
                id: id
            }
        } else if (id && sub_id && !super_sub_id) {
            data = {
                id: id,
                sub_id: sub_id
            }
        } else if (id && sub_id && super_sub_id) {
            data = {
                id: id,
                sub_id: sub_id,
                super_sub_id: super_sub_id
            }
        } else {
            console.log('err')
        }

        function renderQueryStr() {
            var str = '';
            Object.keys(data).forEach((key, index) => {
                if (data[key]) {
                    if (index === 0) {
                        str += `?${key}=${data[key]}`
                    } else {
                        str += `&${key}=${data[key]}`
                    }
                }
            })
            return str;
        }
        $.ajax({
            type: "POST",
            url: '/smj/ajax',
            data: data,
            dataType: 'json',
            success: function (data, status) {
                var html = '';
                // console.log(data.product)
                if (status === "success") {
                    var session = '<?php echo Session::get('lang') ?>'
                    if(session == 'en') {
                        set_text_header(data.category_data[0].category_name_en)
                    }
                    else {
                        set_text_header(data.category_data[0].category_name_th)
                    }
                    console.log(data)
                    renderPagination(data.product.last_page)
                    data.product.data.forEach((item, index) => {
                        html += `<div class="col-lg-6 col-md-6 col-12">
                                    <a class="productBox" href="{{url('product_detail/${item.product_id}')}}">
                                        <div class="model-name">
                                          ${item.product_code}
                                        </div>
                                        <img src="{{asset('assets/images/product/${item.product_img}')}}">
                                    </a>
                                </div>`
                    })
                }
                window.history.pushState({
                    path: window.location.href.split('?')[0] + renderQueryStr()
                }, '', window.location.href.split('?')[0] + renderQueryStr())
                $("#product_row").html(html)
            },
            error: function (x, y, z) {
                console.log(x,y,z)
            }
        })
    }

    function renderPagination(pageLength) {
        var page = '';
        var pre = `<li class="page-item" id="page-pre">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>`
        var next = `<li class="page-item" id="page-next">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                     </li>`
        for (var i = 0; i < pageLength; i++) {
            if (i === 0) {
                page +=
                    `<li id='pagination-number-${i + 1}' onclick='onPaginationClick(this.id)' class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0)">${i + 1}</a></li>`
            } else {
                page +=
                    `<li id='pagination-number-${i + 1}' onclick='onPaginationClick(this.id)' class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0)">${i + 1}</a></li>`
            }

        }
        page = pre + page + next;
        $('#pagination-body').html(page);
    }

    function onPaginationClick(id) {
        const page_num = id.replace('pagination-number-', '')
        const str = ['id', 'sub_id', 'super_sub_id']
        var data = {};
        str.forEach((item) => {
            if (new URLSearchParams(window.location.search).get(item)) {
                data = {
                    ...data,
                    [item]: new URLSearchParams(window.location.search).get(item)
                }
            }
        })
        $.ajax({
            type: "POST",
            url: `/smj/ajax?page=${page_num}`,
            data: new URLSearchParams(window.location.search).get('search') ? {
                search: new URLSearchParams(window.location.search).get('search')
            } : data,
            dataType: 'json',
            success: function (data, status) {
                var html = '';
                if (status === "success") {
                    manageActivePagination(id)
                    data.product.data.forEach((item, index) => {
                        html += `<div class="col-lg-6 col-md-6 col-12">
                                    <a class="productBox" href="{{url('product_detail/${item.product_id}')}}">
                                        <div class="model-name">
                                          ${item.product_code}
                                        </div>
                                        <img src="{{asset('assets/images/product/${item.product_img}')}}">
                                    </a>
                                </div>`
                    })

                }
                $("#product_row").html(html)
            },
            error: function (x, y, z) {
                console.log(x,y,z)
            }
        })

    }

    function manageActivePagination(next) {
        $('.page-item').removeClass('active')
        $(`#${next}`).addClass('active')
    }

    window.onload = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            var id = new URLSearchParams(window.location.search).get('id')
            var sub_id = new URLSearchParams(window.location.search).get('sub_id')
            var super_sub_id = new URLSearchParams(window.location.search).get('super_sub_id')

        fetchProductId(id,sub_id,super_sub_id);

        window.addEventListener('popstate', (event) => {
        var id = new URLSearchParams(window.location.search).get('id')
        var sub_id = new URLSearchParams(window.location.search).get('sub_id')
        var super_sub_id = new URLSearchParams(window.location.search).get('super_sub_id')

        fetchProductId(id,sub_id,super_sub_id);
    });
    }



    function redirectByProductId(id, sub_id, super_sub_id) {
        if (super_sub_id) {
            window.location.href = location.origin + "/smj/product/" + `${id}/${sub_id}/${super_sub_id}`
        } else {
            window.location.href = location.origin + "/smj/product/" + `${id}/${sub_id}`
        }
    }


</script>