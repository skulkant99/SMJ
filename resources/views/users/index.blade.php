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
                                <h4>USERS</h4>
                                <p class="text-muted m-b-10">Information USERS</p>
                                <ul class="breadcrumb-title b-t-default p-t-10"></ul>     
                           </div>
                           
                           {{-- block--}}
                           <div class="card-block">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="text-right">
                                           <div class="form-group">
                                               <a href="{{url('backoffice/users/create')}}" class="btn btn-dark" ><i class="fa fa-plus"></i> Add</a>                                            
                                           </div>       
                                       </div>
                                   </div>          
                               </div>

                             

                               <div class="dt-responsive table-responsive">        
                                   <table id="datatables" class="table table-striped table-bordered" width="100%">
                                       <thead>


                                        <tr>            
											<th class="text-center">Name</th>
											<th class="text-center">E-mail</th>
											<th class="text-center">Tel</th>
											<th class="text-center">#</th>                                                            
                                        </tr>


                                       </thead>


                                       <tbody>
								
                                       @if($data)
                                            @foreach($data AS $val)
													<tr>
														<td>{{$val->name}}</td>
														<td>{{$val->email}}</td>
														<td>{{$val->phone}}</td>
														<td class="text-center">
															<a href="{{url('backoffice/users/update/'.$val->id)}}" ><button type="button" class="btn btn-warning">Update</button></a>
															<button type="button" class="btn btn-danger" onclick="del({{$val->id}})"><i class="icon-trash"></i> Delete</button>
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
					window.location.href="del/users/"+id+"";
				}
			}
		});
	}


				
	
	

</script>


@endsection                   