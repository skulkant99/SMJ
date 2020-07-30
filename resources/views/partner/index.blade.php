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
                                <h4>PARTNER</h4>
                                <p class="text-muted m-b-10">Information PARTNER</p>
                                <ul class="breadcrumb-title b-t-default p-t-10"></ul>     
                           </div>
                           
                           {{-- block--}}
                           <div class="card-block">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="text-right">
                                           <div class="form-group">
                                               <a href="{{url('backoffice/partner/create/partner')}}" class="btn btn-dark" ><i class="fa fa-plus"></i> Add</a>                                            
                                           </div>       
                                       </div>
                                   </div>          
                               </div>

                              
                               <div class="dt-responsive table-responsive">        
                                   <table id="datatables" class="table table-striped table-bordered" width="100%">
                                       <thead>


                                        <tr> 
											<th class="text-center" style="width: 100px;">Sort</th>
											<th class="text-center"style="width: 200px;">Status</th>
											<th class="text-center">Link</th>        
											<th class="text-center">Image</th>
											<th class="text-center">#</th>                                                            
                                        </tr>
										
                                       </thead>

									   	<label><button type="button" class="btn btn-success"><i class="fa fa-check-square"></i></button> Show on page Home / <button type="button" class="btn btn-warning"><i class="fa fa-minus-square"></i></button> Don't show on page Home</label>
                                       <tbody>
										@if($data)
                                            @foreach($data AS $key)
                                            <tr>

												<td><input style="text-align: center;" type="text" class="form-control change_sort" value="{{$key->partner_sort}}" ref="{{$key->partner_id}}"></td>
												<td id="td_status">
																@if($key->partner_status == 1)
																	<button type="button" class="btn btn-success" onclick="ajax_unset({{$key->partner_id}})"><i class="fa fa-check-square"></i></button>
																@else
																	<button type="button" class="btn btn-warning" onclick="ajax_set({{$key->partner_id}})"><i class="fa fa-minus-square"></i></button>
																@endif
												</td>


												<td>{{$key->partner_link}}</td>
                                                <td><img src="{{asset('assets/images/partner')}}/{{$key->partner_img}}" height="100px" ></td>
                                                    <td class="text-center">
														<a href="{{url('backoffice/partner/update/'.$key->partner_id)}}" ><button type="button" class="btn btn-warning">Update</button></a>
                                                        <button type="button" class="btn btn-danger" onclick="del({{$key->partner_id}})"><i class="icon-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                          @endforeach  

                                        @endif

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
					window.location.href="del/partner/"+id+"";
				}
			}
		});
	}

	function ajax_set(id){
					console.log(id);
					$.ajax("{{url('ajax_setpartner')}}/"+id,{
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
					$.ajax("{{url('ajax_unsetpartner')}}/"+id,{
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
						$.get('{{url("ajax_partnersort")}}'+'/'+id+'/'+sort,function(data){
							window.location.reload();
						});
					});
				});


</script>


@endsection                   