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
                    <h4>Type</h4>
                    <p class="text-muted m-b-10">Information Type</p>
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
                            <th class="text-center" style="width: 100px;">Sort</th>
                            <th class="text-center">Type (ภาษาไทย/English)</th>
                            <th class="text-center">#</th>
                          </tr>


                        </thead>


                        <tbody>
                          @if($data)
                          @foreach($data AS $key)
                          <tr>
                            <td><input style="text-align: center;" type="text" class="form-control change_sort"
                                value="{{$key->type_sort}}" ref="{{$key->type_id}}"></td>
                            <td>{{$key->type_name_th}} / {{$key->type_name_en}} </td>
                            <td class="text-center">
                              <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editModal{{$key->type_id}}"> Update</button>
                              <button type="button" class="btn btn-danger" onclick="del_type({{$key->type_id}})"><i
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

<!-- Modal -->
<div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Create Type</h4>
      </div>
      <form method="post" action="{{url('ajax_createreferences')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="modal-body">


          <label>Type (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_th"><br>

          <label>Type (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_en"><br>


          {{-- ข้อมูลรูปภาพ --}}
          <div class="col-sm-12">
            <hr><label><b><i class="fa fa-tags"></i> Image Data </b></label>
            <br><label style="color:red"><b>*ขนาดรูปภาพ 80px*80px</b></label>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label text-right"></label>
              <div class="col-sm-4">
                <img src="{{URL::asset('public/backend/img/wait_img.png')}}" id="imgfile"
                  class="img-fluid img-responsive" style="width:200px;height:200px;">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label text-right">Image:</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" name="bannerimg" id="product_image_add" required
                  onchange='readURL(this);'>
                <!-- <span class="c-red">ขนาดรูปภาพ 400*400 (ควรใส่ขนาดรูปภาพที่กำหนดเพื่อการจัดการสวยงาม)</span>    -->
              </div>
            </div>
          </div>
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

<div class="modal fade" id="editModal{{$key->type_id}}" tabindex="-1" role="dialog"
  aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Update Type</h4>
      </div>
      <form method="post" action="{{url('ajax_updatereferences')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$key->type_id}}">

        <div class="modal-body">

          <label>Type (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_th" value="{{$key->type_name_th}}"><br>

          <label>Type (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_en" value="{{$key->type_name_en}}"><br>

          {{-- ข้อมูลรูปภาพ --}}
          <div class="col-sm-12">
            <hr><label><b><i class="fa fa-tags"></i> Image Data </b></label>
            <br><label style="color:red"><b>*ขนาดรูปภาพ 80px*80px</b></label>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label text-right"></label>
              <div class="col-sm-4">
                <img src="{{URL::asset('assets/images/type')}}/{{$key->type_img}}" id="file"
                  class="img-fluid img-responsive" style="width:200px;height:200px;">
                <input type="hidden" name="oldimg" value="{{$key->type_img}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label text-right">Image :</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" name="bannerimg" id="product_image" onchange='readURLs(this);'>
              </div>
            </div>
          </div>
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
</div>

@endforeach
@endif


@endsection

@section('script')

<script>
  function del_type(id) {
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
          window.location.href = "type/del/" + id + "";
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


  $(document).ready(function () {
    $('.change_sort').change(function () {
      var id = $(this).attr('ref');
      var sort = $(this).val();
      $.get('{{url("ajax_typesort")}}' + '/' + id + '/' + sort, function (data) {
        window.location.reload();
      });
    });
  });
</script>


@endsection