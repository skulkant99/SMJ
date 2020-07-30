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
                                <h4>KNOWLEDGE</h4>
                                <p class="text-muted m-b-10">Information KNOWLEDGE</p>
                                <ul class="breadcrumb-title b-t-default p-t-10"></ul>     
                           </div>
                           
                           {{-- block--}}
                           <div class="card-block">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="text-right">
                                           <div class="form-group">
                                               <a href="{{url('backoffice/knowledge/create/knowledge')}}" class="btn btn-dark" ><i class="fa fa-plus"></i> Add</a>                                            
                                           </div>       
                                       </div>
                                   </div>          
                               </div>

                              
                               <div class="dt-responsive table-responsive">        
                                   <table id="datatables" class="table table-striped table-bordered" width="100%">
                                       <thead>


                                        <tr>
											<!-- <th class="text-center" style="width: 100px;">Sort</th>             -->
											<th class="text-center">Date</th>
                                            <th class="text-center">Topic (ภาษาไทย/English)</th>
											<th class="text-center">#</th>                                                            
                                        </tr>


                                       </thead>


                                       <tbody>
										@if($data)
                                            @foreach($data AS $key)
                                            <tr>
											<!-- <td><input style="text-align: center;" type="text" class="form-control change_sort" value="{{$key->knowledge_sort}}" ref="{{$key->knowledge_id}}"></td> -->
											<td><?php echo DateEng($key->knowledge_date); ?></td>
                                            <td>{{$key->knowledge_topic_th}} / {{$key->knowledge_topic_en}}</td>
										
                                            <td class="text-center">
											<a href="{{url('backoffice/knowledge/update/'.$key->knowledge_id)}}" ><button type="button" class="btn btn-warning">Update</button></a>
                                                            <button type="button" class="btn btn-danger" onclick="del({{$key->knowledge_id}})"><i class="icon-trash"></i> Delete</button>
														</td>
                                            </tr>
                                          @endforeach  

                                        @endif

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
					window.location.href="del/knowledge/"+id+"";
				}
			}
		});
	}

				
	$(document).ready(function(){
		$('.change_sort').change(function(){
			var id = $(this).attr('ref');
			var sort = $(this).val();
			$.get('{{url("ajax_knowledgesort")}}'+'/'+id+'/'+sort,function(data){
				window.location.reload();
			});
		});
	});





	

</script>


@endsection                   