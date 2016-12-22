@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
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
                        <label>Category Parent</label>
                        <select class="form-control">
                            <option value="0" name=sltParent >Please Choose Category</option>
                            <?php cate_parent($parent,0,"--",$data["parent_ind"]) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Category Order</label>
                        <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Category Keywords</label>
                        <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyword',isset($data) ? $data['keywords'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription" value="{!! old('txtDescription',isset($data) ? $data['description'] : null) !!}" ></textarea>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
