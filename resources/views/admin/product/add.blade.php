@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
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
                            <label>Category Parent</label>
                          <select class="form-control" name="sltParent">
                              <option value="">Please Choose Category</option>
                              <?php cate_parent($cate,0,"--",old('sltParent')) ?>  ?>
                          </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages" value="{!! old('fImages') !!}" >
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords"  value="{!! old('txtKeywords') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      @for($i=1;$i<=10;$i++)
                      <div class="form-group">
                        <label>Image Product Detail{!! $i !!}</label>
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
