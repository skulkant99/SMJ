

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
                                <h4>Update partner </h4>
                                <p class="text-muted m-b-10">Detail</p>
                                <ul class="breadcrumb-title b-t-default p-t-10">
                                    <li class="breadcrumb-item"><a href="#!">partner </i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Update partner </a></li>
                                </ul>					
                            </div>
                           
                           <!-- block -->
                            
                                    {{-- ฟอร์ม--}}  
                                    <div class="card-block" id="reload_add">
                                        <form action="{{url('backoffice/partner/update')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="id" value="{{$data->partner_id}}">
                                     
                                    
                                    
                                        <label>Link :</label><span style="color:red"></span>
                                        <input type="text" class="form-control" name="link" value="{{$data->partner_link}}" placeholder=""><br>
                                     
                                        {{-- ข้อมูล รูป --}}
                                        <div class="col-sm-12"> 
                                            <hr><label><b><i class="fa fa-tags"></i> Image Data </b></label>
                                            <br><label style="color:red"><b>*ขนาดรูปภาพ 300px*120px</b></label>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label text-right"></label>											
                                                <div class="col-sm-4">
                                                    <img src="{{URL::asset('/assets/images/partner')}}/{{$data->partner_img}}" id="imgfile" class="img-fluid img-responsive" style="width:200px;height:200px;" >                                          
                                                    <input type="hidden" name="oldimg" value="{{$data->partner_img}}" >
                                                </div>
                                            </div>
                                            <div class="form-group row"> 
                                                <label class="col-sm-2 col-form-label text-right">Image:</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control"  name="bannerimg" id="product_image_add"   onchange='readURL(this);'>
                                                    <!-- <span class="c-red">ขนาดรูปภาพ 400*400 (ควรใส่ขนาดรูปภาพที่กำหนดเพื่อการจัดการสวยงาม)</span>    -->
                                                </div> 
                                            </div>
                                        </div>

		
                

                                    
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

    


</script>




@endsection                   