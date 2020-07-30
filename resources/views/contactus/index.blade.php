@extends('backend/inc_main') {{-- main.blade.php --}}

 @section('title','| All Tags')

@section('stylesheet')
     {{-- <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css"> --}}
 @endsection 

@section('content')
 
	{{-- content --}}
	<div class="pcoded-content">
		<div class="pcoded-inner-content">
			<!-- Main-body start -->
			<div class="main-body">
				<div class="page-wrapper">
					

					<!-- Page body start -->
					<div class="page-body">
						<div class="row">
							<div class="col-lg-12">
								<!-- Default card start -->
								<div class="card">
									<div class="card-block">
                                    {{-- header --}}
                           <div class="card-header">
                                <h4>CONTACT US</h4>
                                <p class="text-muted m-b-10">Information CONTACT US</p>
                                <ul class="breadcrumb-title b-t-default p-t-10"></ul>     
                           </div>
                           
                           {{-- block--}}
     
                              

                               <div class="dt-responsive table-responsive">        
                                   <table id="datatables" class="table table-striped table-bordered" width="100%">
                                       <thead>


                                        <tr>            
                                         
											<th class="text-center"style="width: 200px;">Name</th>
                                            <th class="text-center"style="width: 200px;">Email</th>
                                            <th class="text-center"style="width: 200px;">Phone number</th>
                                            <th class="text-center"style="width: 200px;">Topic</th>
                                            <th class="text-center"style="width: 200px;">Message</th>
                                            <th class="text-center"style="width: 200px;">Date / Time</th>
                                                               
                                        </tr>
                                       </thead>


                                       <tbody>
										@if($data)
                                            @foreach($data AS $key)
                                        <tr>
                                            <td>{{$key->contactus_name}}</td>
											<td>{{$key->contactus_email}}</td>
											<td>{{$key->contactus_phone_number}}</td>
											<td>{{$key->contactus_topic}}</td>
                                            <td>{{$key->contactus_message}}</td>
                                            <td><?php echo DateThai($key->created_at); ?></td>

                                        </tr>
                                           
                                          @endforeach  

                                        @endif

                                        <?php
                                        function DateThai($strDate){
                                        $strYear    = date("Y",strtotime($strDate))+543;
                                        $strMonth   = date("n",strtotime($strDate));
                                        $strDay    = date("j",strtotime($strDate));
                                        $strTime   = date("H:i",strtotime($strDate));
                                        $strMonthCut  = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                        $strMonthThai = $strMonthCut[$strMonth];
                                        return "$strDay $strMonthThai  $strYear / $strTime";
                                        }    
                                        ?>

									</tbody>

                                   </table>   
                               </div>                           
                           </div>
									</div>
								</div>
								<!-- Default card end -->
							</div>
						</div>
					</div>
					<!-- Page body end -->
				</div>
			</div>
			<!-- /Main-body start -->
		</div>
	</div>
	


 
 
@endsection 

@section('script')

<script>

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
					window.location.href="del/banner/"+id+"";
				}
			}
		});
	}


				function ajax_set(id){
					console.log(id);
					$.ajax("{{url('ajax_setbanner')}}/"+id,{
						async: false,
						type: 'get',
						dataType: 'json',
						success: function(data){
							$('#datatables').load(document.URL +  ' #datatables');
						}
					});
				}

				function ajax_unset(id){
					console.log(id);
					$.ajax("{{url('ajax_unsetbanner')}}/"+id,{
						async: false,
						type: 'get',
						dataType: 'json',
						success: function(data){
							$('#datatables').load(document.URL +  ' #datatables');
						}
					});
				}


				
		$(document).ready(function(){
		$('.change_sort').change(function(){
			var id = $(this).attr('ref');
			var sort = $(this).val();
			$.get('{{url("ajax_bannersort")}}'+'/'+id+'/'+sort,function(data){
				window.location.reload();
			});
		});
	});


	

</script>


@endsection                   