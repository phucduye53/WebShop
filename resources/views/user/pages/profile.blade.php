@extends('user.master')
@section('description','Simple Shop - Online Shopping')
@section('content')
<div class="span9">
  <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
  <form action="" method="POST" class="form-horizontal">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
    <h3 class="heading3">Your Personal Details</h3>
    <div class="registerbox">
      <fieldset>
        <div class="control-group">
          <label class="control-label"><span class="red">*</span> Tài khoản:</label>
          <div class="controls">
            <input type="text"  class="input-xlarge" name="txtUser" id="username" value="{!! $data['username'] !!}" disabled="">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label"><span class="red">*</span> Email:</label>
          <div class="controls">
            <input type="text"  class="input-xlarge" name="txtEmail" id="email" value="{!! $data['email'] !!}">
          </div>
        </div>
      </fieldset>
    </div>
    <h3 class="heading3">Your Password</h3>
    <div class="registerbox">
      <fieldset>
        <div class="control-group" hidden>
          <label  class="control-label"><span class="red">*</span> Mật khẩu cũ : </label>
          <div class="controls">
            <input type="password"  class="input-xlarge" name="txtReOldPass" id="password" value="{!! $data['password'] !!}">
          </div>
        </div>
        <div class="control-group">
          <label  class="control-label"><span class="red">*</span> Mật khẩu cũ : </label>
          <div class="controls">
            <input type="password"  class="input-xlarge" name="txtOldPass" id="password">
          </div>
        </div>
        <div class="control-group">
          <label  class="control-label"><span class="red">*</span> Mật khẩu mới</label>
          <div class="controls">
            <input type="password"  class="input-xlarge" name="txtPass" id="password">
          </div>
        </div>
        <div class="control-group">
          <label  class="control-label"><span class="red">*</span> Nhập lại mật khẩu :</label>
          <div class="controls">
            <input type="password"  class="input-xlarge" name="txtRePass" id="rpassword">
          </div>
        </div>
      </fieldset>
    </div>
    <div class="pull-right">
      <input type="Submit" class="btn btn-orange" value="Continue">
    </div>
  </form>
  <div class="clearfix"></div>
  <br>
</div>

@endsection
