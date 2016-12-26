@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input class="form-control" name="txtUser" placeholder="Hãy nhập tên tài khoản" value="{!! old('txtUser') !!}"/>
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
                                <input type="email" class="form-control" name="txtEmail" placeholder="Hãy nhập Email" value="{!! old('txtEmail') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Quyền hạn</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Thành viên
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm tài khoản</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()
