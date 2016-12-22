<div class="headerstrip">
  <div class="container">
    <div class="row">
      <div class="span12">
        <a href="{{ url('/') }}" class="logo pull-left"><img src="{!! url('public/user/img/logo.png') !!}" alt="SimpleOne" title="SimpleOne"></a>
        <!-- Top Nav Start -->
        <div class="pull-left">
          <div class="navbar" id="topnav">
            <div class="navbar-inner">
              <ul class="nav-pills categorymenu" >
                <li><a class="home active" href="{{ url('/') }}">Home</a>
                </li>
                @if(Auth::check())
                <li><a href="#" title="">{!! Auth::user()->username !!}</a>
                </li>
                @if(Auth::user()->level=1)
                <li><a href="{!! url('admin/cate/list') !!}" title="">Quản lý</a>
                </li>
                @endif
                <li><a href="{!! url('auth/logout') !!}" title="">Thoát</a>
                </li>
                @else
                <li><a class="myaccount" href="{{ url('dang-nhap') }}">My Account</a>
                </li>
                <li><a class="register" href="{{ url('dang-ki') }}">Register</a>
                </li>
                @endif
                <li><a class="shoppingcart" href="{{ url('gio-hang') }}">Shopping Cart</a>
                </li>
                <li><a class="checkout" href="{{ url('check-out') }}">CheckOut</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Top Nav End -->
      </div>
    </div>
  </div>
</div>
@include('admin.blocks.error')
  <div class="col-lg-12">
    @if(Session::has('flash_message'))
    <div class="alert alert-danger">
      {!! Session::get('flash_message') !!}
    </div>
    @endif
  </div>
