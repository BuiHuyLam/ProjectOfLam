@extends('layouts.index')
 
@section('main')
<div class="container">
		<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="">Danh mục</a> <span class="glyphicon glyphicon-menu-right"></span> {{ $cate[0]['name'] }}</h4></div>
	</div>
<div class="container">
	<div class="col-md-9 left">
		<div class="row">
			@foreach($pro as $p)
			<div class="col-md-4 slide-image pro-cat">
				<div class="row">
					<div class="image">
						<img src="{{ url('uploads') }}/{{ $p->images }}" width="100%"/>
					</div>
					<div class="content-pro">
						<h4><a href="{{ route('san-pham',['slug'=>$p->slug]) }}" title="">{{ $p->name }}</a></h4>
						@if($p->price_sale)
						<h4 class="price">Giá: {{ number_format($p->price_sale,0,'','.') }}đ</h4>
						<h5 class=""><s>Giá: {{ number_format($p->price,0,'','.') }}đ</s></h5>
						@else
						<h4 class="price" style="margin-bottom: 35px;">Giá: {{ number_format($p->price,0,'','.') }}đ</h4>
						@endif
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
			<div class="text-center">
				{{ $pro->links() }}
			</div>
	</div>
<div class="modal fade" id="add-success">
	<div class="alert alert-success text-center">
		<strong>{!! Session::get('success') !!}</strong> ...
	</div>
</div>
	<!-- Show -->
	@include ('frontend.menu-right');
<!-- menu -->
</div>
@stop()