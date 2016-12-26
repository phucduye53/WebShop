@extends('admin.master')
@section('content')

                  <!-- /.col-lg-12 -->
                  <div id="page-wrapper">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Kho
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
                                  <form action="{!! route('admin.cate.postAdd') !!}" method="POST">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                      <div class="form-group" >
                                          <label>Thuộc về mặt hàng</label>
                                          <select class="form-control" name="sltParent">
                                              <option value="0">Hãy chọn mặt hàng thuộc về</option>
                                              <?php cate_parent($parent); ?>
                                              ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Tên mặt hàng</label>
                                          <input class="form-control" name="txtCateName" placeholder="Nhập tên mặt hàng" />
                                      </div>
                                      <div class="form-group">
                                          <label>Tag</label>
                                          <input class="form-control" name="txtOrder" placeholder="Nhập tag" />
                                      </div>
                                      <div class="form-group">
                                          <label>Từ khóa</label>
                                          <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa" />
                                      </div>
                                      <div class="form-group">
                                          <label>Mô tả</label>
                                          <textarea class="form-control" rows="3" name="txtDescription"  ></textarea>
                                      </div>
                                      <div class="form-group">

                                      <button type="submit" class="btn btn-default">Thêm mặt hàng</button>
                                  <form>
                              </div>
                          </div>
                          <!-- /.row -->
                      </div>
                      <!-- /.container-fluid -->
                  </div>
@endsection()
