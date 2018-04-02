@extends('layouts.index')
 
@section('main')
<div class="container">
		<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span>Sản phẩm</h4></div>
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
						<h4 class="price">{{ $p->price }}</h4>
					</div>
					<!-- hover -->
					<div class="slide-image-hover-box" style="margin: 0">
						<div class="icon-cart">
							<a href="{{ route('add-cart',['id'=>$p->id]) }}" class="add-cart-quick" title="Mua ngay" onclick="alert('Đã thêm vào giỏ hàng')">
								<img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
							</a>
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

	<!-- Show -->
	<div class="col-md-3 right-cat" style="font-size: 20px;">
		<div class="row">
			<div class="category" >
				<h3>DANH MỤC</h3>
				<ul class="" data-widget="tree" type="none">
			        <li class="">
			          <a href="{{ route('home') }}">
			          	<p>Trang chủ</p>
			          </a>
			        </li>
			        @foreach($cats as $c)
			        <li class="treeview">
			          <a href="#">
			            <p>{{ $c->name }}</p>
			          </a>
			          <ul class="treeview-menu">
			          	@php
			          	$catpr = App\Models\Category::Where(['status'=>'1','parent'=>$c->id])->get();
			          	@endphp
			          	@foreach($catpr as $cp)
			            <li><a href="{{ route('danh-muc',['id'=> $cp->id]) }}"><span class="glyphicon glyphicon-hand-right"></span>{{ $cp->name }}</a></li>
			            @endforeach
			          </ul>
			        </li>
			        @endforeach
			    </ul>
			</div>
			<div class="loc-gia">
				<h3>
					Lọc theo giá
				</h3>
				<form action="" method="post" accept-charset="utf-8">
					<p><input type="radio" id="pr0" name="price" value="0"> <label for="pr0" > < 500 </label></p>
					<p><input type="radio" id="pr1" name="price" value="1"> <label for="pr1"> 500 - 1000 </label></p>
					<p><input type="radio" id="pr2" name="price" value="2"> <label for="pr2" > 1000 - 5000 </label></p>
					<p><input type="radio" id="pr3" name="price" value="3"> <label for="pr3" > > 5000 </label></p>
					<p><button type="submit" class="btn btn-success">Lọc</button></p>
				</form>
			</div>
			<div class="hotpro">
				<h3>Sản phẩm nổi bật</h3>

				<?php $hot_pro = DB::table('products')->join('statuspro','statuspro.name_pro','=','products.name')->where('statuspro.id_status','2')->limit(3)->orderBy('products.updated_at','DESC')->select(['products.id','products.name','products.images','products.price','products.slug'])->get()?>
				@foreach($hot_pro as $h)
				<div class="prhot">
					<div class="col-md-4">
						<div class="row">
							<img src="{{ url('uploads/') }}/{{ $h->images }}" alt="" style="width: 100%; height: 80px;">
						</div>
					</div>
					<div class="col-md-8">
						<p><a href="{{ route('san-pham',['slug'=>$h->slug]) }}">{{ $h->name }}</a></p>
						<p>{{ $h->price }}</p>
						<div class="star">
							<i class="glyphicon glyphicon-star-empty" style="color: #ffcc00; font-size: 12px"></i>
							<i class="glyphicon glyphicon-star-empty" style="color: #ffcc00; font-size: 12px"></i>
							<i class="glyphicon glyphicon-star-empty" style="color: #ffcc00; font-size: 12px"></i>
							<i class="glyphicon glyphicon-star-empty" style="color: #ffcc00; font-size: 12px"></i>
							<i class="glyphicon glyphicon-star-empty" style="color: #ffcc00; font-size: 12px"></i>
						</div>
					</div>
				</div>
				@endforeach
				<div class="prhot"><a href="{{ route('khuyen-mai') }}" class="btn btn-success">Xem tất cả</a></div>
			</div>
		</div>
	</div>
<!-- menu -->
</div>
@stop()