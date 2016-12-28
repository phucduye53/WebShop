@extends('user.master')
@section('description','Simple Shop - Online Shopping')
@section('content')
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Hàng nổi bật</span><span class="subtext">Những hàng nổi bật gần đây</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! $item->price !!} $</div>
              <div class="priceold"></div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Hàng bán chạy</span><span class="subtext"> Hàng bán chạy</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! $item->price !!} $</div>
              <div class="priceold"></div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection
