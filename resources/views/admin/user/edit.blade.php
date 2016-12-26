@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                                <label>Tài khoản</label>
                                <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($data) ? $data['username'] : null) !!}" disabled />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Hãy nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Hãy nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Hãy nhập Email" value="{!! old('txtEmail',isset($data) ? $data['email'] : null) !!}"/>
                            </div>
                            @if(Auth::user()->id != $id)
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" type="radio"
                                    @if($data["level"]==1)
                                      checked="checked"
                                    @endif
                                    >Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio"
                                    @if($data["level"]==2)
                                      checked="checked"
                                    @endif
                                    >Thành viên
                                </label>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-default">Chỉnh sửa</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()
