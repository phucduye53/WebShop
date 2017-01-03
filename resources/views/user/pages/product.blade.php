@extends('user.master')
@section('description','Simple Shop - Online Shopping')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/'.$product_detail->image) !!}">
                <img src="{!! asset('resources/upload/'.$product_detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($images as $item_image)
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/detail/'.$item_image->image) !!}">
                <img  src="{!! asset('resources/upload/detail/'.$item_image->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/'.$product_detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($images as $item_image)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/detail/'.$item_image->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone">{!! $product_detail->name !!}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>{!! $product_detail->price !!}</div>
              </div>
              <ul class="productpagecart">
                <li><a class="cart" href="{!! url('mua-hang',[$product_detail->id,$product_detail->alias]) !!}">Thêm vào giỏ</a>
                </li>
              </ul>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Chi tiết</a>
                  </li>
                  <li><a href="#review">Viết nhận xét</a>
                  </li>
                  <li><a href="#producttag">Nhận xét</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <ul class="listoption3">
                      {!! $product_detail->description !!}
                    </ul>
                  </div>
                  <div class="tab-pane" id="review">
                    <h3>Thêm nhận xét</h3>
                    <form action="{!! route('review') !!}" method="POST" class="form-horizontal">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                      <fieldset>
                        <div class="control-group">
                          <label class="control-label">Tên người dùng</label>
                          <div class="controls">
                            @if(Auth::check())
                            <input type="text"  name="username" value="{!! Auth::user()->username !!}" readonly>
                            @else
                            <input type="text"  name="username" >
                            @endif
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Nhật xét</label>
                          <div class="controls">
                            <input type="text" style="height:50px;" name="text">
                          </div>
                          <div class="controls" hidden>
                            <input type="text" style="height:50px;" name="id" value="{!! $product_detail->id !!}">
                          </div>
                        </div>
                      </fieldset>
                      <input type="submit" class="btn btn-orange" value="Thêm">
                    </form>
                  </div>
                  <div class="tab-pane" id="producttag">
                    @foreach($product_review as $review)
                      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="panel panel-white post panel-shadow">
                              <div class="post-heading">
                                <div class="pull-left image">
                                  <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                                </div>
                                <div class="pull-left meta">
                                  <div class="title h5">
                                    <a href="#"><b>{!! $review->username !!}</b></a>
                                    đã nhận xét
                                  </div>
                                  <h6 class="text-muted time">
                                    {!!
                                     $review->created_at
                                  !!}
                                  </h6>
                                    <p>
                                      {!! $review->text !!}
                                    </p>
                                  </div>
                                </div>
                                <div class="post-description">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <div class="pagination pull-right">
                        <ul>
                          @if($product_review->currentPage() != 1)
                          <li><a href="{!! str_replace('/?','?',$product_review->url($product_review->currentPage()-1)) !!}">Prev</a></li>
                          @endif
                          @for ($i=1;$i<=$product_review->lastPage();$i=$i+1)
                          <li class="{!! ($product_review->currentPage()==$i )?'active' : '' !!}">
                            <a href="{!! str_replace('/?','?',$product_review->url($i)) !!}">{!! $i !!}</a>
                          </li>
                          @endfor
                          @if($product_review->currentPage() != $product_review->lastPage())
                          <li><a href="{!! str_replace('/?','?',$product_review->url($product_review->currentPage()+1)) !!}">Next</a>
                            @endif
                          </li>
                        </ul>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach($product_cate as $item_product_cate)
        <li class="span3">
          <a class="prdocutname" href="product.html">{!! $item_product_cate->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href=href="{!! url('mua-hang',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img alt="" src="img/product1.jpg"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! asset('resources/upload/'.$item_product_cate->image) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!! $item_product_cate->price !!}</div>
                <div class="priceold"></div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
</div>
@endsection
