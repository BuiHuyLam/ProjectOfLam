@extends('layouts.index')

@section('main')
<div class="panel panel-success container" style="padding-bottom: 50px;">
    <div class="link-nav">
        <h4>
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="glyphicon glyphicon-menu-right" style="color: #777"></span>
            <a href="">Sản phẩm</a> 
            <span class="glyphicon glyphicon-menu-right"></span>
            {{ $product->name }}
        </h4>
    </div>
    
    <div class="col-md-7 img">
        <div class="col-md-2 img-small">
           <img src="{{ url('/uploads') }}/{{ $product->images }}" width="100%" style="margin-bottom: 10px;" alt="" onclick="changeImg(this)"> 
           <img src="{{ url('/uploads') }}/{{ $product->images_hover1 }}" width="100%" style="margin-bottom: 10px;" alt="" onclick="changeImg(this)" > 
           <img src="{{ url('/uploads') }}/{{ $product->images_hover2 }}" width="100%" style="margin-bottom: 10px;" alt="" onclick="changeImg(this)"> 
           <img src="{{ url('/uploads') }}/{{ $product->images_hover3 }}" width="100%" style="margin-bottom: 10px;" alt="" onclick="changeImg(this)"> 
           <img src="{{ url('/uploads') }}/{{ $product->images_hover4 }}" width="100%" style="margin-bottom: 10px;" onclick="changeImg(this)"> 
        </div>
        <div class="col-md-10 img-big">
            <img src="{{ url('/uploads') }}/{{ $product->images }}" width="100%" id="big-img">
        </div>
    </div>

    <div class="col-md-5 panel-body" style="float: left; display: block;">
        <h2> {{ $product->name }}</h2>
        @if($product->price_sale)
            <s>Giá: {{number_format($product->price,0,'','.')}}</s>
            <h4><b>Giá: {{number_format($product->price_sale,0,'','.')}}</b></h4>
            @else
              <b>Giá: {{number_format($product->price,0,'','.')}}</b>
            @endif
            </p>
            <p>
                {!!$product->content!!}
            </p>
            <p>
                <a href="{{route('add-cart',['id'=>$product->id])}}" class="btn btn-success">Thêm vào giỏ hàng</a>
                <a href="" class="btn btn-danger">0986421127</a>
            </p>
    </div>
    <div style="float: left; display: block; margin: 120px">
    @foreach($pro as $p)
            <div class="col-md-4 slide-image pro-cat">
                <div class="row">
                    <div class="image">
                        <img src="{{ url('uploads') }}/{{ $p->images }}" width="100%"/>
                    </div>
                    <div class="content-pro">
                        <h4><a href="{{ route('san-pham',['slug'=>$p->slug]) }}" title="">{{ $p->name }}</a></h4>
                    </div>
                    <!-- hover -->
                    <div class="slide-image-hover-box" style="margin: 0">
                        <div class="icon-cart">
                            <a href="#show-pro-{{ $p->id }}" data-toggle="modal" title="Xem nhanh">
                                <img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="show-pro-{{ $p->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Sản phẩm</h4>
                        </div>
                        <div class="modal-body container">
                            <div class="col-md-3">
                                <img src="{{ url('uploads') }}/{{ $p->images }}" width="100%" />
                            </div>
                            <div class="col-md-9">
                                    <h3>{{ $p->name }}</h3>
                                    <h5>Tình trạng: Còn hàng | Mã SP: {{ $p->id }}</h5>
                                <p>{!!$p->content!!}</p>
                                <h3>Giá: {{number_format($p->price,0,'','.')}}đ </h3>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('add-cart',['id'=>$p->id]) }}" class=" add-cart-quick btn btn-success" id="click_cart" data-id='{{ $p->id }}'>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
</div>
<script language="javascript" src="{{ url('/') }}/public/js/slideImg.js"></script>

 <script type="text/javascript">
     function changeImg(img){
        var divBigImg = document.getElementById('big-img');
        divBigImg.src = img.src;
     }
 </script>

@stop()