

@extends('backend/inc_main'){{-- main.blade.php --}}

@section('title','| Backoffice')

@section('stylesheet')
      <!-- Color Picker css -->
      <link rel="stylesheet" href="{{URL::asset('bootstrap4/bower_components/spectrum/css/spectrum.css')}}" />
      <!-- Mini-color css -->
      <link rel="stylesheet" href="{{URL::asset('bootstrap4/bower_components/jquery-minicolors/css/jquery.minicolors.css')}}" />
@endsection

@section('content')

<style>
    .modal-lg {
        max-width: 1200px !important;
    }

    .modal {
        overflow: auto !important;
    }
    .td_colum{
        column-width:300px ;
        white-space: normal;
    }

    .select2-container--open{
        z-index:10000;
    }
    .fileinput-upload{
		display: none !important;
	}
</style>

   {{-- content --}}
   <div class="pcoded-content">
       <div class="pcoded-inner-content">
           <div class="main-body">
               <div class="page-wrapper">
                   <div class="page-body">
                       <div class="card tabs-card">
                            {{-- header --}}
                            <div class="card-header">
                                <h4>Update Product</h4>
                                <p class="text-muted m-b-10">Detail</p>
                                <ul class="breadcrumb-title b-t-default p-t-10">
                                    <li class="breadcrumb-item"><a href="#!">Product</i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Update Product</a></li>
                                </ul>
                            </div>

                           <!-- block -->

                                    {{-- ฟอร์ม--}}
                                    <div class="card-block" id="reload_add">
                                        <form action="{{url('backoffice/product/update')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$data->product_id}}">





                                        <label>code (English) :</label><span style="color:red"></span>
                                        <input type="text" class="form-control" name="code" value="{{$data->product_code}}" placeholder="English"><br>

                                        <label>code (ภาษาไทย) :</label><span style="color:red"></span>
                                        <input type="text" class="form-control" name="code_th" value="{{$data->product_code_th}}" placeholder="ภาษาไทย"><br>

                                        <label>category :</label><span style="color:red"></span>
                                        <select class="form-control" name="type" id="category">
                                            <option value="">Please select...</option>
                                            @if($data2)
                                            @foreach($data2 AS $key)
                                                        <option value="{{$key->category_id}}"{{$data->category_id == $key->category_id ? 'selected' : ''}}>{{$key->category_name_th}} / {{$key->category_name_en}}</option>
                                            @endforeach
                                            @endif
                                           </select><br>


                                        <label>sub category 1 :</label><span style="color:red"></span>
                                        <select class="form-control" name="type1" id="subcategory">
                                            <option value="">Please select...</option>
                                            @if($categorysub)
                                            @foreach($categorysub AS $key)
                                                        <option value="{{$key->categorysub_id}}"{{$data->categorysub_id == $key->categorysub_id ? 'selected' : ''}}>{{$key->categorysub_name_th}} / {{$key->categorysub_name_en}}</option>
                                            @endforeach
                                            @endif
                                           </select><br>

                                        <label>sub category 2 :</label><span style="color:red"></span>
                                        <select class="form-control" name="type2" id="subcategory2">
                                            <option value="">Please select...</option>
                                            @if($categorysub2)
                                            @foreach($categorysub2 AS $key)
                                                        <option value="{{$key->categorysub_2_id}}"{{$data->categorysub_2_id == $key->categorysub_2_id ? 'selected' : ''}}>{{$key->categorysub_2_name_th}} / {{$key->categorysub_2_name_en}}</option>
                                            @endforeach
                                            @endif

                                           </select><br>

                                        <div class ="row">

                                        <!-- ขวา-->
                                            <div class="col-md-6">

                                            <!-- <label>Name (ภาษาไทย) :</label><span style="color:red"></span>
                                            <input type="text" class="form-control" name="name_th" value="{{$data->product_name_th}}" placeholder="ภาษาไทย"><br>
                                             -->

                                            <label>Detail (ภาษาไทย) :</label><span style="color:red"></span>
                                            <textarea type="text" id="detail_th" rows="4" cols="50" class="form-control"  name="detail_th" placeholder="รายละเอียด">{{$data->product_detail_th}}</textarea><br>

                                            <label>ADDITIONAL INFORMATION (ภาษาไทย)  :</label><span style="color:red"></span>
                                            <textarea type="text" id="detail_th1" rows="4" cols="50" class="form-control" name="detail_th1" placeholder="">{{$data->product_table_th}}</textarea><br>

                                            </div>
                                         <!-- ซ้าย-->
                                            <div class="col-md-6">

                                            <!-- <label>Name (English) :</label><span style="color:red"></span>
                                            <input type="text" class="form-control" name="name_en" value="{{$data->product_name_en}}" placeholder="English"><br>
                                             -->

                                            <label>Detail (English) :</label><span style="color:red"></span>
                                            <textarea type="text" id="detail_en" rows="4" cols="50" class="form-control" name="detail_en" placeholder="รายละเอียด">{{$data->product_detail_en}}</textarea><br>

                                            <label>ADDITIONAL INFORMATION (English)  :</label><span style="color:red"></span>
                                            <textarea type="text" id="detail_en1" rows="4" cols="50" class="form-control" name="detail_en1" placeholder="">{{$data->product_table_en}}</textarea><br>

                                            </div>
                                        </div>

                                        {{-- ข้อมูลรูปภาพ --}}
                                        <div class="col-sm-12">
                                            <hr><label><b><i class="fa fa-tags"></i> Image Data </b></label>
                                            <br><label style="color:red"><b>*ขนาดรูปภาพ 800px*600px</b></label>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label text-right"></label>
                                                <div class="col-sm-4">
                                                    <img src="{{URL::asset('/assets/images/product')}}/{{$data->product_img}}" id="imgfile" class="img-fluid img-responsive" style="width:200px;height:200px;" >
                                                    <input type="hidden" name="oldimg" value="{{$data->product_img}}" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label text-right">Image:</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control"  name="bannerimg" id="product_image_add" onchange='readURL(this);'>
                                                    <!-- <span class="c-red">ขนาดรูปภาพ 400*400 (ควรใส่ขนาดรูปภาพที่กำหนดเพื่อการจัดการสวยงาม)</span>    -->
                                                </div>
                                            </div>
                                        </div>







         <!-- เพิ่มรูป -->
										<button type="button" class="btn btn-primary" onclick="addgallery()"><i class="fa fa-plus"></i> Add Image</button>
                                            <input type="hidden" id="countimg" value="0"><br>

                                                <div id="listg">
                                                </div>
                                            </div>



        <!-- แสดงโชว์รูป -->


                                    <div class="row">
									<div class="col-md-6">
									<table class="table table-bordered" >
									<thead>
                                   		<tr>
                                            <th class="text-center">Caption</th>
                                        	<th class="text-center">Image</th>
                                        	<th class="text-center" style="width:5%">#</th>
                                        </tr>
									</thead>

                                     <tbody id="productimg">

									 @if($productimg)
									 @foreach($productimg AS $key)
									 <tr>

                                            <td class="text-center">
                                                    <div class="col-md-11">
                                                            <input type="" class="form-control"  value="{{$key->productimg_name_th}}" ><br>
                                                    </div>
                                            <td class="text-center">
												<div class="col-md-11">
													<img src="{{asset('assets/images/productimg')}}/{{$key->productimg_img}}" width="120px" height="90px" />
												</div>
											<td class="text-center">
												<div class="col-md-1">
													<button type="button" class="btn btn-danger" onclick="delete_productimg({{$key->productimg_id}})">delete</button>
												</div>

                                    </td>
									</tr>
									@endforeach
									@endif

									</table>
                                     </div> </tbody>






                                    {{-- สิ้นสุดฟอร์ม --}}

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" onclick="window.history.back();"><i class="fa fa-history"></i> Cancel</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                        <!-- Footer -->
                        <div class="text-muted">
			                Copyright &copy; 2019. <a href="https://www.orange-thailand.com" target="_blank">Orange Technology Solution</a>
                        </div>
		                <!-- /footer -->
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection

@section('script')

<link type="text/css" rel="stylesheet" href="{{asset('assets/summernote/summernote.css')}}">
<script type="text/javascript" src="{{asset('assets/summernote/summernote.js')}}"></script>

<script>




$(document).ready(function() {

$('#category').change(function(){
    var item = '';
    //var item = '<option value="">--SELECT--</option>';
    var category_id = $(this).val();
    $.ajaxSetup({
        async: false
    });
    $.ajax("{{url('get_subcategory')}}",{
        type: 'POST',
        data:{
            'category_id': category_id,
            '_token': "{{ csrf_token() }}"
        },
        success: function(data){
            $('#subcategory').empty();
            if(data){
                $.each(data,function(k,v){
                item += '<option value="'+v.categorysub_id+'">'+v.categorysub_name_th+' / '+v.categorysub_name_en+'</option>';
                });
                $('#subcategory').append(item);
            }

        }

    });
});

        $('#detail_th').summernote({

            toolbar: [

			['style', ['style']],
			['fontsize', ['fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
            ],

            fontNames: [
                'Prompt', 'Poppins', 'Arial Black', 'Lucida Grande', 'Lucida Sans', 'Tahoma',
            ],

            height:250,
            callbacks: {
            onImageUpload: function(files, editor, welEditable) {
                console.log(files[0]);
                sendFile(files[0], editor, welEditable,data_id='#detail');

            },
            onpaste: function (e , editor, welEditable) {
                setTimeout(function(){
                    if(navigator.userAgent.search("Firefox") >= 0){
                        var checkfirst = 0;
                        $('.note-editable').contents().each(function(){
                            if(this.nodeType === Node.COMMENT_NODE) {
                                $(this).remove();
                                checkfirst = 1;
                            }
                        });
                        if(checkfirst == 0){
                        $('.note-editable *').contents().each(function(){
                            if(this.nodeType === Node.COMMENT_NODE) {
                                $(this).remove();
                                checkfirst = 1;
                            }
                        });
                        }
                    }
                    $('.note-editable *').contents().each(function(){
                        if($(this).get(0).localName == 'span'){
                        $(this).get(0).style['cssText'] = '';
                        }
                    });
                }, 1000);
            }
            }
        });

        $('#detail_th1').summernote({

        toolbar: [

			['style', ['style']],
			['fontsize', ['fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
        ],

        fontNames: [
            'Prompt', 'Poppins', 'Arial Black', 'Lucida Grande', 'Lucida Sans', 'Tahoma',
        ],

        height:250,
        callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            console.log(files[0]);
            sendFile(files[0], editor, welEditable,data_id='#detail');

        },
        onpaste: function (e , editor, welEditable) {
            setTimeout(function(){
                if(navigator.userAgent.search("Firefox") >= 0){
                    var checkfirst = 0;
                    $('.note-editable').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    if(checkfirst == 0){
                    $('.note-editable *').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    }
                }
                $('.note-editable *').contents().each(function(){
                    if($(this).get(0).localName == 'span'){
                    $(this).get(0).style['cssText'] = '';
                    }
                });
            }, 1000);
        }
        }
    });

        $('#detail_en').summernote({

        toolbar: [

			['style', ['style']],
			['fontsize', ['fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
        ],

        fontNames: [
            'Prompt', 'Poppins', 'Arial Black', 'Lucida Grande', 'Lucida Sans', 'Tahoma',
        ],

        height:250,
        callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            console.log(files[0]);
            sendFile(files[0], editor, welEditable,data_id='#detail');

        },
        onpaste: function (e , editor, welEditable) {
            setTimeout(function(){
                if(navigator.userAgent.search("Firefox") >= 0){
                    var checkfirst = 0;
                    $('.note-editable').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    if(checkfirst == 0){
                    $('.note-editable *').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    }
                }
                $('.note-editable *').contents().each(function(){
                    if($(this).get(0).localName == 'span'){
                    $(this).get(0).style['cssText'] = '';
                    }
                });
            }, 1000);
        }
        }
    });

    $('#detail_en1').summernote({

        toolbar: [

			['style', ['style']],
			['fontsize', ['fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
        ],

        fontNames: [
            'Prompt', 'Poppins', 'Arial Black', 'Lucida Grande', 'Lucida Sans', 'Tahoma',
        ],

        height:250,
        callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            console.log(files[0]);
            sendFile(files[0], editor, welEditable,data_id='#detail');

        },
        onpaste: function (e , editor, welEditable) {
            setTimeout(function(){
                if(navigator.userAgent.search("Firefox") >= 0){
                    var checkfirst = 0;
                    $('.note-editable').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    if(checkfirst == 0){
                    $('.note-editable *').contents().each(function(){
                        if(this.nodeType === Node.COMMENT_NODE) {
                            $(this).remove();
                            checkfirst = 1;
                        }
                    });
                    }
                }
                $('.note-editable *').contents().each(function(){
                    if($(this).get(0).localName == 'span'){
                    $(this).get(0).style['cssText'] = '';
                    }
                });
            }, 1000);
        }
        }
    });
    });

    // Delete colum tr || ลบข้อมูล
    $(document).on('click', '.delete-row', function() {
        var tr_Product  = $('.table-bordered').find('.tr-productorder').length;
        if(tr_Product > 1){
            $(this).closest('.tr-productorder').fadeOut(function() {
                this.remove();
            });
        }
    });

    // On change upload || อัพโหลดรูปภาพ # UL.2/2
    $(document).on('change', '.choosefileimahe', function() {
        previewProduct(this);
    });

    // Preview img upload || รีวิวรูปภาพที่อัพโหลด # UL.1/2
    function previewProduct(position) {
        var inputFile   = $(position).closest('.tr-productorder').find('#preview');

        inputFile.attr('src', position.value);
        if (position.files && position.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                inputFile.attr('src', e.target.result);
            }
            reader.readAsDataURL(position.files[0]);
        }
    }

    // Read Image || รีวิวรูปภาพสินค้า
    function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#imgfile')
				.attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

    // Reload Add
    function waitme_add(){
		$('#reload_add').waitMe({
			effect: 'rotation',
			text: 'Please wait..',
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: '',
			waitTime: -1,
			source: '',
			textPos: 'vertical',
			fontSize: '',
			onClose: function() {}
		});

	}

    function addbranch(){
			var newcount = parseInt($('#countrow').val()) + 1;
			var row = '';
				row += '<div class="row" id="rowb'+newcount+'">';
				row += '<div class="col-md-1">';
				row += '</div>';
				row += '<div class="col-md-8">';
				row += '<lable>list product</lable>';
				row += '<input type="text" class="form-control" name="list[]">';
				row += '</div>';
				row += '<div class"col-md-1">';
				row += '<br>';
				row +='<button type="button" class="btn btn-danger" onclick="delmain('+newcount+')">Delete</button>';
				row += '</div>';
				row+='<br>';
				row+='</div>';
			$('#countrow').val(newcount);

			$('#prob').append(row);
			}

		//############ ลบ ################
        function delmain(row){
            $('#rowb'+row).remove();

}

    function addbranchs(){
            var newcount = parseInt($('#countbranch').val()) + 1;
            var row = '';
            var row = '';
                row+='<table class="table table-bordered" id="rowb'+newcount+'">';
                row+='<thead bgcolor="#EBF5FB">';
                row+='<tr>';
                row+='<th class="text-center">Construct</th>';
                row+='<th class="text-center">Construct</th>';
                row+='<th class="text-center">Construct</th>';
                row+='<th class="text-center"><a href="javascript:;" onclick="addsub('+newcount+')"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>';
                row+='<input type="hidden" id="subrow" value="0">';
                row+='</tr>';
                row+='<tr>';
                row+='<th class ="text-center">';
                row+='<input type="text" class="form-control" placeholder="หัวข้อโครงสร้าง" name="constructth[]">';
                row+='</th>';
                row+='<th class ="text-center">';
                row+='<input type="text" class="form-control" placeholder="หัวข้อโครงสร้าง" name="constructen[]">';
                row+='</th>';
                row+='<th class ="text-center">';
                row+='<input type="text" class="form-control" placeholder="หัวข้อโครงสร้าง" name="constructthh[]">';
                row+='</th>';
                row+='<th class="text-center"><a href="javascript:;" onclick="delmain('+newcount+')"><i class="fa fa-trash text-danger" data-popup="tooltip" title="Delete"></i></a></th>';
                row+='</thead>';
                row+='<tbody id="subrow'+newcount+'">';
                row+='</tbody>';
                row+='</table><br>';


            $('#countbranch').val(newcount);

            $('#main-blist').append(row);
            }

            function delsub(row){
                $('#sub'+row).remove();
            }

            function addsub(rowm){
                var subcount = parseInt($('#subrow').val()) + 1;
                var row='';

                    //sub
                    row+='<tr id="sub'+subcount+'">';
                    row+='<td class="text-center">';
                    row+='<input type="text" class="form-control" placeholder="โครงสร้าง" name="subth'+rowm+'[]">';
                    row+='</td>';
                    row+='<td class="text-center">';
                    row+='<input type="text" class="form-control" placeholder="โครงสร้าง" name="suben'+rowm+'[]">';
                    row+='</td>';
                    row+='<td class="text-center">';
                    row+='<input type="text" class="form-control" placeholder="โครงสร้าง" name="subthh'+rowm+'[]">';
                    row+='</td>';
                    row+='<td class="text-center"><a href="javascript:;" onclick="delsub('+subcount+')"><i class="fa fa-trash text-danger" data-popup="tooltip" title="Delete"></i></a></td>';
                    row+='</tr>';


                $('#subrow').val(subcount);
                $('#subrow'+rowm).append(row);

            }


			function addgallery(){
				var newcount = parseInt($('#countimg').val()) + 1;
				var text = '';
				text+='<div class="row" style="margin-top:1%" id="rowg'+newcount+'">';
				text+='<div class="col-sm-10 col-xs-12">';
                text+='<label>Caption :</label><span style="color:red"></span>';
                text+='<input type="text" class="form-control" name="name_tha[]" ><br>';
				text+='<input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="newsgallery[]" id="gallery'+newcount+'" onchange="setimage(this,'+newcount+')"><br>';
				text+='<img id="img-gallery'+newcount+'" src="{{asset("assets/images/300px-No_image_available.svg.webp")}}" alt="your image" style="height:130px;" name="newsgallery[]" />';
				text+='</div>';
				text+='<div class="col-sm-2 col-xs-12">';
				text+='<button type="button" class="btn btn-danger btn-xs" onclick="delg('+newcount+')"><i class="fa fa-times"></i></button>';
				text+='</div>';
				text+='</div>';

				$('#listg').append(text);
				$('#countimg').val(newcount);


			}

			function delg(row){
        	$('#rowg'+row).remove();
    		}


        function setimage(ele,row){
                console.log(ele.files[0]);
                if (ele.files && ele.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('#img-gallery'+row).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(ele.files[0]);
                }
    }




	function delete_productimg(id){
		bootbox.confirm({
			title: "ยืนยัน?",
			message: "คุณต้องการลบรายการนี้ หรือไม่?",
			buttons:{
				cancel: {
				label: '<i class="fa fa-times"></i> ยกเลิก',
				className: 'btn-danger'
				},
				confirm:{
				label: '<i class="fa fa-check"></i> ยืนยัน',
				className: 'btn-success'
				}
			},
			callback: function (result){
				if(result == true){
					$.get('{{url("backoffice/del/productimg_del")}}'+'/'+id,function(data){
						$('#productimg').load(document.URL + ' #productimg');
					});

				}
			}

		});
	}


    function del_list(id){
		bootbox.confirm({
			title: "ยืนยัน?",
			message: "คุณต้องการลบรายการนี้ หรือไม่?",
			buttons:{
				cancel: {
				label: '<i class="fa fa-times"></i> ยกเลิก',
				className: 'btn-danger'
				},
				confirm:{
				label: '<i class="fa fa-check"></i> ยืนยัน',
				className: 'btn-success'
				}
			},
			callback: function (result){
				if(result == true){
					$.get('{{url("backoffice/del/list_del")}}'+'/'+id,function(data){
						$('#prob').load(document.URL + ' #prob');
					});

				}
			}

		});
	}

    function del(id){
		bootbox.confirm({
			title: "ยืนยัน?",
			message: "คุณต้องการลบรายการนี้ หรือไม่?",
			buttons:{
				cancel: {
					label: '<i class="fa fa-times"></i> ยกเลิก',
					className: 'btn-danger'
				},
				confirm:{
					label: '<i class="fa fa-check"></i> ยืนยัน',
					className: 'btn-success'
				}
			},
			callback: function (result){
				if(result == true){
//					window.location.href="imgremove/"+id+"";
                    $.get('{{url("delconmain")}}'+'/'+id,function(data){
				    $('#main-blist').load(document.URL +  ' #main-blist');
			         });
				}
			}
		});
	}

    function delsub(id){
		bootbox.confirm({
			title: "ยืนยัน?",
			message: "คุณต้องการลบรายการนี้ หรือไม่?",
			buttons:{
				cancel: {
					label: '<i class="fa fa-times"></i> ยกเลิก',
					className: 'btn-danger'
				},
				confirm:{
					label: '<i class="fa fa-check"></i> ยืนยัน',
					className: 'btn-success'
				}
			},
			callback: function (result){
				if(result == true){
//					window.location.href="imgremove/"+id+"";
                    $.get('{{url("delconsub")}}'+'/'+id,function(data){
				    $('#main-blist').load(document.URL +  ' #main-blist');
			         });
				}
			}
		});
	}

</script>




@endsection
