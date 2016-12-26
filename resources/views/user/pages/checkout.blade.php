@extends('user.master')
@section('description','Simple Shop - Online Shopping')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->
      <ul class="breadcrumb">
        <li>
          <a href="{{ url('/') }}">Trang chủ</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Thanh toán</li>
      </ul>
      <div class="row">
        <!-- Account Login-->
        <div class="span9">
          <div class="checkoutsteptitle">Điền thông tin thanh toán<a class="modify">Ẩn</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form action="{{ route('checkout') }}" class="form-horizontal" method="post" id="checkout-form">
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''}}">
                  {{ Session::get('error') }}
                </div>
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Số tài khoản<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="" data-stripe="number" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Tháng hết hạn</label>
                      <div class="controls">
                        <input type="text" class=""  value="" data-stripe="exp_month" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Năm hết hạn</label>
                      <div class="controls">
                        <input type="text" class=""  value="" data-stripe="exp_year" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >CVC<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="" data-stripe="cvc" required>
                      </div>
                    </div>
                </fieldset>
            </div>
          </div>
          <div class="checkoutsteptitle">Xem hóa đơn<a class="modify">Ẩn</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="image">Hình ảnh</th>
                  <th class="name">Tên sản phẩm</th>
                  <th class="quantity">Số lượng</th>
                  <th class="price">Đơn giá</th>
                  <th class="total">Tổng giá</th>
                </tr>
                  <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                  @foreach($content as $item)
                <tr>
                  <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item['options']['img']) !!}" height="50" width="50"></a></td>
                  <td  class="name"><a href="#">{!! $item["name"] !!}</a></td>
                  <td class="quantity"><input type="text" size="1" value='{!! $item["qty"] !!}' name="quantity[40]" class="span1" readonly>
                    <td class="price">{!! number_format($item["price"],0,",",".") !!}</td>
                    <td class="total">{!! number_format($item["price"]*$item["qty"],0,",",".") !!}</td>

                </tr>
                  @endforeach()
              </table>
            </div>
            <div class="row">
              <div class="pull-right">
                <div class="span4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tbody>
                      <tr>
                        <td><span class="extra bold totalamout">Số tiền :</span></td>
                        <td><span class="bold totalamout">{!! number_format($total,0,",",".") !!} $</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
              <button type="submit" class="btn btn-orange pull-right">Mua Ngay</button>
            </form>
        </div>
        <!-- Sidebar Start-->
        <div class="span3">

        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript" src="{!! url('public/user/js/checkout.js') !!}"></script>
@endsection
