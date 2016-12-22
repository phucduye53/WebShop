@extends('admin.master')
@section('content')

                  <!-- /.col-lg-12 -->
                  <div id="page-wrapper">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Category
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
                                  <form action="{!! route('admin.cate.postAdd') !!}" method="POST">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                      <div class="form-group" >
                                          <label>Category Parent</label>
                                          <select class="form-control" name="sltParent">
                                              <option value="0">Please Choose Category</option>
                                              <?php cate_parent($parent); ?>
                                              ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Category Name</label>
                                          <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                                      </div>
                                      <div class="form-group">
                                          <label>Category Order</label>
                                          <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
                                      </div>
                                      <div class="form-group">
                                          <label>Category Keywords</label>
                                          <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" />
                                      </div>
                                      <div class="form-group">
                                          <label>Category Description</label>
                                          <textarea class="form-control" rows="3" name="txtDescription"  ></textarea>
                                      </div>
                                      <div class="form-group">

                                      <button type="submit" class="btn btn-default">Category Add</button>
                                      <button type="reset" class="btn btn-default">Reset</button>
                                  <form>
                              </div>
                          </div>
                          <!-- /.row -->
                      </div>
                      <!-- /.container-fluid -->
                  </div>
@endsection()
