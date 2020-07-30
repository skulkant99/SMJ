

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
                                <h4>Create Knowledge Banner</h4>
                                <p class="text-muted m-b-10">Detail</p>
                                <ul class="breadcrumb-title b-t-default p-t-10">
                                    <li class="breadcrumb-item"><a href="#!">Knowledge Banner</i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Create Knowledge Banner</a></li>
                                </ul>					
                            </div>
                           
                           <!-- block -->
                            <div class="card-block" id="reload_add">
                                <form method="post" action="{{url('backoffice/banner/create3')}} "enctype="multipart/form-data">
                                {!! csrf_field() !!}
                               
                                    {{-- ฟอร์ม--}}   


                                  
                                        
                                        
                                        {{-- ข้อมูลรูปภาพ --}}
                                        <div class="col-sm-12"> 
                                            <hr><label><b><i class="fa fa-tags"></i> Image Data </b></label>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label text-right"></label>											
                                                <div class="col-sm-4">
                                                    <img src="{{URL::asset('public/backend/img/wait_img.png')}}" id="imgfile" class="img-fluid img-responsive" style="width:200px;height:200px;" >                                          
                                                </div>
                                            </div>
                                            <div class="form-group row"> 
                                                <label class="col-sm-2 col-form-label text-right">Image:</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control"  name="bannerimg" id="product_image_add" required onchange='readURL(this);'>
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

    <!-- Date-range picker js -->
    <script src="{{URL::asset('bootstrap4/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}} "></script>
    <!-- Date-dropper js -->
    <script src="{{URL::asset('bootstrap4/bower_components/datedropper/js/datedropper.min.js')}} "></script>
    <!-- Color picker js -->
    <script src="{{URL::asset('bootstrap4/bower_components/spectrum/js/spectrum.js')}} "></script>
    <script src="{{URL::asset('bootstrap4/bower_components/jscolor/js/jscolor.js')}} "></script>
    <!-- Mini-color js -->
    <script src="{{URL::asset('bootstrap4/bower_components/jquery-minicolors/js/jquery.minicolors.min.js')}} "></script>
    <!-- Custom js -->
    <script src="{{URL::asset('bootstrap4/assets/pages/advance-elements/custom-picker.js')}} "></script>

<script>
    $(document).ready(function() {
            
        // Check product type
        $(".product-type").click(function(){
            if($(this).val() == 1) {
                $(".product-size").show();
                $(".product-color").show();
            }
            if($(this).val() == 2) {
                $(".product-color").show();
                $(".product-size").hide();
            }
            
            if($(this).val() == 3) {
                $(".product-color").hide();
                $(".product-size").show();
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