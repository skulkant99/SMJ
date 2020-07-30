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
                    <h4>CATEGORY</h4>
                    <p class="text-muted m-b-10">Information CATEGORY</p>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                  </div>

                  {{-- block--}}
                  <div class="card-block">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="text-right">
                          <div class="form-group">
                            <button type="button" class="btn btn-dark " data-toggle="modal"
                              data-target="#favoritesModal"><i class="fa fa-plus-square"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="dt-responsive table-responsive">
                      <table id="datatables" class="table table-striped table-bordered" width="100%">
                        <thead>


                          <tr>
                            <th class="text-center">CATEGORY (English/ภาษาไทย)</th>
                            <th class="text-center">#</th>
                          </tr>


                        </thead>


                        <tbody>
                          @if($data)
                          @foreach($data AS $key)
                          <tr>
                            <td>{{$key->category_name_en}} / {{$key->category_name_th}}</td>
                            <td class="text-center">
                              <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editModal{{$key->category_id}}"> Update</button>
                              <button type="button" class="btn btn-danger"
                                onclick="del_category({{$key->category_id}})"><i class="icon-trash"></i> Delete</button>
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

<!-- Modal -->
<div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Create Category</h4>
      </div>
      <form method="post" action="{{url('ajax_createcategory')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="modal-body">


          <label>CATEGORY (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_th"><br>

          <label>CATEGORY (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_en"><br>


          {{-- ข้อมูลรูปภาพ --}}
          <!-- <div class="col-sm-12"> 
                                  <hr><label><b><i class="fa fa-tags"></i> Image Data หน้า Home </b></label>
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
                                         
                                      </div> 
                                  </div>
                              </div> -->




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;
          <span class="pull-right">
            <button type="submit" class="btn btn-primary">
              Save
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- แก้ไข --}}

@if($data)
@foreach($data AS $key)

<div class="modal fade" id="editModal{{$key->category_id}}" tabindex="-1" role="dialog"
  aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Update Category</h4>
      </div>
      <form method="post" action="{{url('ajax_updatecategory')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$key->category_id}}">
        <div class="modal-body">


          <label>CATEGORY (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_th" value="{{$key->category_name_th}}"><br>

          <label>CATEGORY (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_en" value="{{$key->category_name_en}}"><br>



          {{-- ข้อมูลรูปภาพ --}}
          <!-- <div class="col-sm-12"> 
                                  <hr><label><b><i class="fa fa-tags"></i> Image Data หน้า Home </b></label>
                                  <div class="form-group row">
                                      <label class="col-sm-2 col-form-label text-right"></label>											
                                      <div class="col-sm-4">
                                          <img src="{{URL::asset('/assets/images/categoryimg')}}/{{$key->category_img}}" id="img" class="img-fluid img-responsive" style="width:200px;height:200px;" >                                          
                                      </div>
                                  </div>
                                  <div class="form-group row"> 
                                      <label class="col-sm-2 col-form-label text-right">Image:</label>
                                      <div class="col-sm-6">
                                          <input type="file" class="form-control"  name="img" id="image_add" required onchange='readURLs(this);'>
                                         
                                      </div> 
                                  </div>
                              </div>-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;
          <span class="pull-right">
            <button type="submit" class="btn btn-primary">
              Save
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>

@endforeach
@endif


@endsection

@section('script')

<script>
  function del_category(id) {
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
          window.location.href = "category/del/" + id + "";
        }
      }
    });
  }

  // Delete colum tr || ลบข้อมูล 
  $(document).on('click', '.delete-row', function () {
    var tr_Product = $('.table-bordered').find('.tr-productorder').length;
    if (tr_Product > 1) {
      $(this).closest('.tr-productorder').fadeOut(function () {
        this.remove();
      });
    }
  });

  // On change upload || อัพโหลดรูปภาพ # UL.2/2
  $(document).on('change', '.choosefileimahe', function () {
    previewProduct(this);
  });

  // Preview img upload || รีวิวรูปภาพที่อัพโหลด # UL.1/2
  function previewProduct(position) {
    var inputFile = $(position).closest('.tr-productorder').find('#preview');

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

  // Read Image || รีวิวรูปภาพสินค้า
  function readURLs(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img')
          .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }


  // Read Image || รีวิวรูปภาพสินค้า
  function readURLimg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#file')
          .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Read Image || รีวิวรูปภาพสินค้า
  function readURLimage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#productimg')
          .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }



  // Reload Add
  function waitme_add() {
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
      onClose: function () {}
    });
  }
</script>


@endsection