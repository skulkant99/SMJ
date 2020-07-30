

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
                                <h4>Create Career </h4>
                                <p class="text-muted m-b-10">Detail</p>
                                <ul class="breadcrumb-title b-t-default p-t-10">
                                    <li class="breadcrumb-item"><a href="#!">Career </i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Create Career </a></li>
                                </ul>					
                            </div>
                           
                           <!-- block -->
                            
                                    {{-- ฟอร์ม--}}  
                                    <div class="card-block" id="reload_add">
                                        <form action="{{url('backoffice/career/create')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}


                                        
                                                <label>Date :</label><span style="color:red"></span>
                                                <input type="date" class="form-control" name="date" placeholde="Date"><br>
                                    
                                        <div class ="row">

                                        
                                            <!-- ขวา-->
                                                <div class="col-md-6">

                                                <label>JOB TITLE (ภาษาไทย) :</label><span style="color:red"></span>
                                                <input type="text" class="form-control" name="title_th" placeholder="ภาษาไทย"><br>
                                                
                                                <label>DEPARTMENT (ภาษาไทย) :</label><span style="color:red"></span>
                                                <textarea type="text" id="" rows="4" cols="50" class="form-control" name="department_th" placeholder="Detail"></textarea><br>

                                                <label>Job Description (ภาษาไทย) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_th" rows="4" cols="50" class="form-control" name="detail_th1" placeholder="Detail"></textarea><br>

                                                <label>Qualification (ภาษาไทย) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_th1" rows="4" cols="50" class="form-control" name="detail_th2" placeholder="Detail"></textarea><br>

                                                <label> Responsibility (ภาษาไทย) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_th2" rows="4" cols="50" class="form-control" name="detail_th3" placeholder="Detail"></textarea><br>

                                                <label>Additional Information (ภาษาไทย) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_th3" rows="4" cols="50" class="form-control" name="detail_th4" placeholder="Detail"></textarea><br>
                                                
                                            

                                                </div>
                                            <!-- ซ้าย-->
                                                <div class="col-md-6">

                                                <label>JOB TITLE (English) :</label><span style="color:red"></span>
                                                <input type="text" class="form-control" name="title_en" placeholder="English"><br>
                                                
                                                <label>DEPARTMENT (English) :</label><span style="color:red"></span>
                                                <textarea type="text" id="" rows="4" cols="50" class="form-control" name="department_en" placeholder="Detail"></textarea><br>

                                                 
                                                <label>Job Description (English) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_en" rows="4" cols="50" class="form-control" name="detail_en1" placeholder="Detail"></textarea><br>

                                                <label>Qualification (English) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_en1" rows="4" cols="50" class="form-control" name="detail_en2" placeholder="Detail"></textarea><br>

                                                <label> Responsibility (English) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_en2" rows="4" cols="50" class="form-control" name="detail_en3" placeholder="Detail"></textarea><br>

                                                <label>Additional Information (English) :</label><span style="color:red"></span>
                                                <textarea type="text" id="detail_en3" rows="4" cols="50" class="form-control" name="detail_en4" placeholder="Detail"></textarea><br>


                                                </div>
                                        </div>
                                     

                                     
<!-- เพิ่ม Job Description-->
											<!-- <button type="button" class="btn btn-primary" onclick="addbranch()">
                                               <i class="fa fa-plus"></i> Add Job Description
                                            </button>
											<input type="hidden" class="countrow" value="0"><br><br>
                                            <div id="prob">
                                            </div> -->

<!-- เพิ่ม Qualification-->
											<!-- <button type="button" class="btn btn-primary" onclick="addbranch1()">
                                               <i class="fa fa-plus"></i> Add Qualifications
                                            </button>
											<input type="hidden" class="countrow1" value="0"><br><br>
                                            <div id="prob1">
                                            </div> -->

<!-- เพิ่ม Responsibility-->
											<!-- <button type="button" class="btn btn-primary" onclick="addbranch2()">
                                               <i class="fa fa-plus"></i> Add Responsibility
                                            </button>
											<input type="hidden" class="countrow2" value="0"><br><br>
                                            <div id="prob2">
                                            </div> -->

<!-- เพิ่ม Additional Information-->
											<!-- <button type="button" class="btn btn-primary" onclick="addbranch3()">
                                               <i class="fa fa-plus"></i> Add Additional Information
                                            </button>
											<input type="hidden" class="countrow3" value="0"><br><br>
                                            <div id="prob3">
                                            </div> -->
                                            
                

                                    
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

    $('#detail_th2').summernote({
		
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


    $('#detail_th3').summernote({
		
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

    $('#detail_en2').summernote({
		
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

    $('#detail_en3').summernote({
		
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

    
			



</script>




@endsection                   