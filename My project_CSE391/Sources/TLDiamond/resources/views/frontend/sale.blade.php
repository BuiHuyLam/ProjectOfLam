@extends('layouts.index')
 
@section('main')
<div class="container">
	
</div>
<div class="container">
	<div class="col-md-9 left">
		<div class="row">
	<h3>Sản phẩm nổi bật</h3>
	<?php $hot_pro = DB::table('products')->join('statuspro','statuspro.name_pro','=','products.name')->where('statuspro.id_status','2')->orderBy('products.updated_at','DESC')->select(['products.id','products.name','products.images','products.price','products.slug','products.content','products.price_sale'])->get()?>
		@foreach($hot_pro as $h)
			<div class="col-md-4 slide-image pro-cat">
				<div class="row">
					<div class="image">
						<img src="{{ url('uploads') }}/{{ $h->images }}" width="100%"/>
					</div>
					<div class="content-pro">
						<h4><a href="{{ route('san-pham',['slug'=>$h->slug]) }}" title="">{{ $h->name }}</a></h4>
						@if($h->price_sale)
						<h4 class="price">Giá: {{ number_format($h->price_sale,0,'','.') }}đ</h4>
						<h5 class=""><s>Giá: {{ number_format($h->price,0,'','.') }}đ</s></h5>
						@else
						<h4 class="price" style="margin-bottom: 35px;">Giá: {{ number_format($h->price,0,'','.') }}đ</h4>
						@endif
					</div>
					<!-- hover -->
					<div class="slide-image-hover-box" style="margin: 0">
						<div class="icon-cart">
							<a href="#show-pro-{{ $h->id }}" data-toggle="modal" title="Xem nhanh">
								<img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
							</a>
						</div>
					</div>
				</div>
			</div>
		<div class="modal fade" id="show-pro-{{ $h->id }}">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Sản phẩm</h4>
					</div>
					<div class="modal-body container">
						<div class="col-md-3">
							<img src="{{ url('uploads') }}/{{ $h->images }}" width="100%" />
						</div>
						<div class="col-md-9">
								<h3>{{ $h->name }}</h3>
								<h5>Tình trạng: Còn hàng | Mã SP: {{ $h->id }}</h5>
							<p>{!!$h->content!!}</p>
							<h3>Giá: {{number_format($h->price,0,'','.')}}đ </h3>
						</div>
					</div>
					<div class="modal-footer">
						<a href="{{ route('add-cart',['id'=>$h->id]) }}" class=" add-cart-quick btn btn-success" id="click_cart" data-id='{{ $h->id }}'>Thêm vào giỏ hàng</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach

			<?php $flash_sale = DB::table('products')->join('statuspro','statuspro.name_pro','=','products.name')->where('statuspro.id_status','4')->orderBy('products.updated_at','DESC')->select(['products.id','products.name','products.images','products.price','products.slug'])->get()?>
			@if(!empty($flash_sale))
				<div style="width: 100%; display: block; float: left;">
					<h2><span class="glyphicon glyphicon-flash"></span>Siêu giảm giá</h2>
				@foreach($flash_sale as $p)	
					<div class="col-md-4 slide-image pro-cat">
						<div class="row">
							<div class="image">
								<img src="{{ url('uploads') }}/{{ $p->images }}" width="100%"/>
							</div>
							<div class="content-pro">
								<h4><a href="{{ route('san-pham',['slug'=>$p->slug]) }}" title="">{{ $p->name }}</a></h4>
								@if($h->price_sale)
								<h4 class="price">Giá: {{ number_format($h->price_sale,0,'','.') }}đ</h4>
								<h5 class=""><s>Giá: {{ number_format($h->price,0,'','.') }}đ</s></h5>
								@else
								<h4 class="price" style="margin-bottom: 35px;">Giá: {{ number_format($h->price,0,'','.') }}đ</h4>
								@endif
							</div>
							<!-- hover -->
							<div class="slide-image-hover-box" style="margin: 0">
								<div class="icon-cart">
									<a href="{{ route('add-cart-quick',['id'=>$p->id]) }}" title="Mua ngay">
										<img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			@endif
			 
			<?php $pro_sale = DB::table('products')->join('statuspro','statuspro.name_pro','=','products.name')->where('statuspro.id_status','3')->orderBy('products.updated_at','DESC')->select(['products.id','products.name','products.images','products.price', 'products.slug'])->get()?>
			@if(!empty($pro_sale))
			<div style="width: 100%; display: block; float: left;">
				<h2>Giảm giá</h2>
			@foreach($pro_sale as $p)
			<div class="col-md-4 slide-image pro-cat">
				<div class="row">
					<div class="image">
						<img src="{{ url('uploads') }}/{{ $p->images }}" width="100%"/>
					</div>
					<div class="content-pro">
						<h4><a href="{{ route('san-pham',['slug'=>$p->slug]) }}" title="">{{ $p->name }}</a></h4>
						@if($h->price_sale)
						<h4 class="price">Giá: {{ number_format($h->price_sale,0,'','.') }}đ</h4>
						<h5 class=""><s>Giá: {{ number_format($h->price,0,'','.') }}đ</s></h5>
						@else
						<h4 class="price" style="margin-bottom: 35px;">Giá: {{ number_format($h->price,0,'','.') }}đ</h4>
						@endif
					</div>
					<!-- hover -->
					<div class="slide-image-hover-box" style="margin: 0">
						<div class="icon-cart">
							<a href="{{ route('add-cart-quick',['id'=>$p->id]) }}" title="Mua ngay">
								<img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			</div>
			@endif
		</div>
	</div>

	<!-- Show -->
	@include ('frontend.menu-right');
<!-- menu -->
</div>
@stop()