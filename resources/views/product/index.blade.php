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
										<h4>PRODUCT</h4>
										<p class="text-muted m-b-10">Information PRODUCT</p>
										<ul class="breadcrumb-title b-t-default p-t-10"></ul>
									</div>

									{{-- block--}}
									<div class="card-block">
										<div class="row">
											<div class="col-md-12">
												<div class="text-right">
													<div class="form-group">
														<a href="{{url('backoffice/product/create')}}"
															class="btn btn-dark"><i class="fa fa-plus"></i> Add</a>
													</div>
												</div>
											</div>
										</div>


										<div class="dt-responsive table-responsive">
											<table id="datatables" class="table table-striped table-bordered"
												width="100%">
												<thead>

													<tr>
														<!-- <th class="text-center" style="width: 100px;">Sort</th> -->
														<th class="text-center">Code (English/ภาษาไทย)</th>
														<th class="text-center">Category (English/ภาษาไทย)</th>
														<!-- <th class="text-center">Name (English/ภาษาไทย)</th> -->
														<th class="text-center">#</th>
													</tr>


												</thead>


												<tbody>
													@if($data)
													@foreach($data AS $key)
													<tr>
														<!-- <td><input style="text-align: center;" type="text"
																class="form-control change_sort"
																value="{{$key->product_sort}}"
																ref="{{$key->product_id}}"></td> -->
														<td>{{$key->product_code}} / {{$key->product_code_th}} </td>
														<td>{{$key->category_name_en}} / {{$key->category_name_th}}
														</td>
														<!-- <td>{{$key->product_name_th}} / {{$key->product_name_en}} </td> -->

														<td class="text-center">
															<a
																href="{{url('backoffice/product/update/'.$key->product_id)}}"><button
																	type="button"
																	class="btn btn-warning">Update</button></a>
															<button type="button" class="btn btn-danger"
																onclick="del({{$key->product_id}})"><i
																	class="icon-trash"></i> Delete</button>
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
	function del(id) {
		bootbox.confirm({
			title: "ยืนยัน?",
			message: "คุณต้องการลบรายการนี้ หรือไม่?",
			buttons: {
				cancel: {
					label: '<i class="fa fa-times"></i> ยกเลิก',
					className: 'btn-danger'
				},
				confirm: {
					label: '<i class="fa fa-check"></i> ยืนยัน',
					className: 'btn-success'
				}
			},
			callback: function (result) {
				if (result == true) {
					window.location.href = "del/product/" + id + "";
				}
			}
		});
	}


	$(document).ready(function () {
		$('.change_sort').change(function () {
			var id = $(this).attr('ref');
			var sort = $(this).val();
			$.get('{{url("ajax_productsort")}}' + '/' + id + '/' + sort, function (data) {
				window.location.reload();
			});
		});
	});


	$(document).ready(function () {
		$('.change_sort').change(function () {
			var id = $(this).attr('ref');
			var sort = $(this).val();
			$.get('{{url("ajax_productsort")}}' + '/' + id + '/' + sort, function (data) {
				window.location.reload();
			});
		});
	});
</script>


@endsection