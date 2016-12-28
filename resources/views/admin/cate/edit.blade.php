@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kho hàng
                    <small>Chỉnh sửa</small>
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
                <form action="" method="POST">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="form-group">
                        <label>Mặt hàng thuộc về</label>
                        <select class="form-control" name=sltParent>
                            <option value="0"  >Hãy chọn mặt hàng thuộc về</option>
                            <?php cate_parent($parent,0,"--",$data["parent_ind"]) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên mặt hàng</label>
                        <input class="form-control" name="txtCateName" placeholder="Nhập tên mặt hàng" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <input class="form-control" name="txtOrder" placeholder="Nhập tags" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input class="form-control" name="txtKeyword" placeholder="Nhập key words" value="{!! old('txtKeyword',isset($data) ? $data['keywords'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescription" value="{!! old('txtDescription',isset($data) ? $data['description'] : null) !!}" ></textarea>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" class="btn btn-default">Chỉnh sửa</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
