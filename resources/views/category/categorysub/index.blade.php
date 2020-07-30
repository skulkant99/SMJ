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
                    <h4>SUB CATEGORY </h4>
                    <p class="text-muted m-b-10">Information SUB CATEGORY </p>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                  </div>

                  {{-- block--}}
                  <div class="card-block">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="text-right">
                          <div class="form-group">
                            <button type="button" class="btn btn-dark" data-toggle="modal"
                              data-target="#favoritesModal"><i class="fa fa-plus-square"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="dt-responsive table-responsive">
                      <table id="datatables" class="table table-striped table-bordered" width="100%">
                        <thead>


                          <tr>
                            <th class="text-center">CATEGORY</th>
                            <th class="text-center">SUB CATEGORY</th>
                            <th class="text-center">#</th>
                          </tr>


                        </thead>


                        <tbody>

                          @if($data)
                          @foreach($data AS $key)
                          <tr>
                            <td>{{$key->category_name_en}} / {{$key->category_name_th}} </td>
                            <td>{{$key->categorysub_name_en}} / {{$key->categorysub_name_th}}</td>
                            <td class="text-center">
                              <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editModal{{$key->category_id}}"> Update</button>
                              <button type="button" class="btn btn-danger"
                                onclick="del_categorysub({{$key->categorysub_id}})"><i class="icon-trash"></i>
                                Delete</button>
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
      <form method="post" action="{{url('ajax_createsub')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">

          <label>Category :</label><span style="color:red"></span>
          <select class="form-control" name="type">
            <option value="">Please select...</option>
            @if($data2)
            @foreach($data2 AS $type)
            <option value="{{$type->category_id}}">{{$type->category_name_en}} / {{$type->category_name_th}}</option>
            @endforeach
            @endif
          </select><br>

          <label>Sub Category (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_th"><br>

          <label>Sub Category (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" name="name_en"><br>






        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancal</button>&nbsp;&nbsp;&nbsp;
          <span class="pull-right">
            <button type="submit" class="btn btn-primary">
              Create
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
      <form method="post" action="{{url('ajax_updatecategorysub')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$key->categorysub_id}}">
        <input type="hidden" name="id" value="{{$key->category_id}}">


        <div class="modal-body">
          <label>category :</label><span style="color:red"></span>
          <select class="form-control" name="type" id="category">
            <option value="{{$type->category_id}}">Please select...</option>
            @if($data2)
            @foreach($data2 AS $type)
            <option value="">{{$type->category_name_en}} / {{$type->category_name_th}}</option>
            @endforeach
            @endif
          </select><br>
          <label>Sub Category (ภาษาไทย) :</label><span style="color:red"></span>
          <input type="text" class="form-control" value="{{$key->categorysub_name_th}}" name="name_th"><br>

          <label>Sub Category (English) :</label><span style="color:red"></span>
          <input type="text" class="form-control" value="{{$key->categorysub_name_en}}" name="name_en"><br>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancal</button>&nbsp;&nbsp;&nbsp;
          <span class="pull-right">
            <button type="submit" class="btn btn-primary">
              Create
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
  function del_categorysub(id) {
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
          window.location.href = "categorysub/del/" + id + "";
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
</script>


@endsection