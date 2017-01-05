@extends('admin.master')
@section('content')

        <style>
        .img_current{width:150px;}
        .img_detail{width:150px;margin-bottom: 20px}
        .icon_del{position: relative;top:-55px;left:-20px;}
        </style><!-- Page Content -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                      <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data" >
                    <div class="col-lg-7" style="padding-bottom:120px">
                          @include('admin.blocks.error')
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
                                <input class="form-control" name="txtName" placeholder="Hãy nhập tên sản phẩm" value="{!! old('txtName',isset($product) ? $product['name'] :null ) !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Giá (USD)</label>
                                <input class="form-control" name="txtPrice" placeholder="Hãy nhập giá cả" value="{!! old('txtPrice',isset($product) ? $product['price'] :null ) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Giói thiệu</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] :null ) !!}</textarea>
                                <script type="text/javascript">ckeditor('txtIntro')</script>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] :null ) !!}</textarea>
                                <script type="text/javascript">ckeditor('txtContent')</script>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh hiện tại</label>
                                <img src={!! asset('resources/upload/'.$product['image']) !!} class="img_current">
                                <input type="hidden" name="img_current" value="{!! $product['image'] !!}" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh mới</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Từ khóa</label>
                                <input class="form-control" name="txtKeywords" placeholder="Hãy nhập key words" value="{!! old('txtKeywords',isset($product) ? $product['keywords'] :null ) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name=txtDescription>{!! old('txtDescription',isset($product) ? $product['description'] :null ) !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>

                    </div>
                     <div class='col-md-1'></div>
                      <div class='col-md-4'>
                        @foreach($product_image as $key=>$item)
                        <div class="form-group" id="{!! $key !!}">
                      <img src={!! asset('resources/upload/detail/'.$item['image']) !!} class="img_detail" idHinh="{!! $item['id'] !!}"
                      id="{!! $key !!}" />
                      <a herf="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-cirle icon_del"><i class="fa fa-times"></i></a>
                    </div>
                      @endforeach
                          <button type="button" class="btn btn-primary" id="addImages">Thêm ảnh</button>
                                            <div id="insert"></div>
                      </div>
                        <form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()

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
