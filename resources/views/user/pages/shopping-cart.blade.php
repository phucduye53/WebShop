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
        <li class="active"> Giỏ hàng</li>
      </ul>
      <h1 class="heading1"><span class="maintext">Giỏ hàng</span><span class="subtext"> Tất cả sản phẩm có trong giỏ</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Hình ảnh</th>
            <th class="name">Tên sản phẩm</th>
            <th class="quantity">Số Lượng</th>
              <th class="total">Tùy chỉnh</th>
            <th class="price">Đơn giá</th>
            <th class="total">Tổng</th>

          </tr>
          <form method="POST" action"">
            <input name="_token" type="hidden" value="{!! csrf_token() !!}">
          @foreach($content as $item)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item['options']['img']) !!}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{!! $item["name"] !!}</a></td>
            <td class="quantity"><input class="span1 qty" type="text" size="1" value='{!! $item["qty"] !!}' name="quantity[40]" /></td>
             <td class="total">
               <a href="#" class="updatecart" id="{!! $item['rowid'] !!}"><img class="tooltip-test" data-original-title="Update" src="{!! asset('public/user/img/update.png') !!}" alt="" ></a>
              <a href="{!! url('xoa-san-pham',['id'=>$item['rowid']]) !!}"><img class="tooltip-test" data-original-title="Remove"  src="{!! asset('public/user/img/remove.png') !!}" alt=""></a>
            </td>
            <td class="price">{!! number_format($item["price"],0,",",".") !!}</td>
            <td class="total">{!! number_format($item["price"]*$item["qty"],0,",",".") !!}</td>
          </tr>
          @endforeach
        </form>



        </table>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Tổng tiền :</span></td>
                <td><span class="bold totalamout">{!! number_format($total,0,",",".") !!}</span></td>
              </tr>
            </table>
            <a href="{{ url('check-out') }}"type="button"  class="btn btn-orange pull-right">Thanh toán</a>
            <a href="{{ url('/') }}" type="button" class="btn btn-orange pull-right mr10">Tiếp tục mua hàng </a>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection
