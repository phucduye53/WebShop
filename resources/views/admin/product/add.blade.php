@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                      @include('admin.blocks.error')
                      <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                        <div class="alert alert-danger">
                          {!! Session::get('flash_message') !!}
                        </div>
                        @endif
                      </div>
                      <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                        <div class="alert alert-danger">
                          {!! Session::get('flash_message') !!}
                        </div>
                        @endif
                      </div>
                        <form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <div class="form-group">
                            <label>Loại hàng hóa</label>
                          <select class="form-control" name="parent" id="parent">
                                @foreach($cate as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                          </select>
                          <label>Loại mặt hàng</label>
                          <select class="form-control" name="subcate" id="subcate">

                          </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="txtName" placeholder="Hãy nhập tên sản phẩm" value="{!! old('txtName') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Giá ( USD )</label>
                                <input class="form-control" name="txtPrice" placeholder="Hãy nhập giá" value="{!! old('txtPrice') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="fImages" value="{!! old('fImages') !!}" >
                            </div>
                            <div class="form-group">
                                <label>Từ khóa</label>
                                <input class="form-control" name="txtKeywords" placeholder="Nhập keywords"  value="{!! old('txtKeywords') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm sản phẩm</button>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      @for($i=1;$i<=10;$i++)
                      <div class="form-group">
                        <label>Hình phụ cho sản phẩm{!! $i !!}</label>
                        <input type="file" name="fProductDetail[]"/>
                    </div>
                      @endfor
                </div>
                  </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
        <!-- /#page-wrapper -->

@section('script')
  <script>
  $(document).ready(function(){
  $("#parent").change(function(){

    var id = $(this).val();
    $.get("ajax/subcate/"+id, function(data){
      $("#subcate").html(data);
    });
  });
});
  </script>
@endsection
