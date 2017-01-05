@extends('user.master')
@section('description','Simple Shop - Online Shopping')
@section('content')
        <!-- Category-->
        <div id="maincontainer">
          <section id="product">
            <div class="container">
             <!--  breadcrumb -->
              <ul class="breadcrumb">
                <li>
                  <a href="{{ url('/') }}">Trang chủ</a>
                  <span class="divider">/</span>
                </li>
                <li class="active">Tìm kiếm</li>
              </ul>
              <div class="row">
                <!-- Sidebar Start-->
                <!-- Sidebar End-->
                <!-- Category-->
                <div class="span9">
                  <!-- Category Products-->
                  <section id="category">
                    <div class="row">
                      <div class="span9">
                       <!-- Category-->
                        <section id="categorygrid">
                          <ul class="thumbnails grid">
                            @foreach($product_cate as $item_product_cate)
                            <li class="span3">
                              <a class="prdocutname" href="product.html">{!! $item_product_cate->name !!}</a>
                              <div class="thumbnail">
                                <span class="sale tooltip-test">Sale</span>
                                <a href="{!! url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img width="300" height="300" alt="" src="{!! asset('resources/upload/'.$item_product_cate->image) !!}"></a>
                                <div class="pricetag">
                                  <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                                  <div class="price">
                                    <div class="pricenew">{!! $item_product_cate->price !!} $</div>
                                    <div class="priceold"></div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            @endforeach
                          </ul>
                          <form>
                          <div class="pagination pull-right">
                            <ul>
                              @if($product_cate->currentPage() != 1)
                              <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage()-1)) !!}">Prev</a></li>
                              @endif
                              @for ($i=1;$i<=$product_cate->lastPage();$i=$i+1)
                              <li class="{!! ($product_cate->currentPage()==$i )?'active' : '' !!}">
                                <a href="{!! str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a>
                              </li>
                              @endfor
                              @if($product_cate->currentPage() != $product_cate->lastPage())
                              <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage()+1)) !!}">Next</a>
                                @endif
                              </li>
                            </ul>
                          </div>
                        </section>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </section>
        </div>

@endsection
