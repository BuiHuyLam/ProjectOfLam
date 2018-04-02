@extends('layouts.index')

@section('main')
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
			</ol>

			<div class="carousel-inner">
				<div class="item">
					<img src="{{ url('/') }}/public/images/Banner/20170601112906_banner-trang-chu-mono-salsa.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Nhẫn cưới</h1>
							<p><a class="btn btn-lg btn-primary" href="{{ route('danh-muc',['id'=>'10']) }}" role="button">Xem ngay</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="{{ url('/') }}/public/images/Banner/banner-trang-suc-bac-2017.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Nhẫn kim cương</h1>
							<p><a class="btn btn-lg btn-primary" href="{{ route('danh-muc',['id'=>'11']) }}" role="button">Xem ngay</a></p>
						</div>
					</div>
				</div>
				<div class="item active">
					<img src="{{ url('/') }}/public/images/Banner/BANNER3.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Nhẫn vàng</h1>
							<p><a class="btn btn-lg btn-primary" href="{{ route('danh-muc',['id'=>'9']) }}" role="button">Xem ngay</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<!-- end-carousel -->
	</header>
<main>
	<div class="product">
		<div class="container">
			<div class="row">
				<h3></h3>
				<div class="col-md-6">
					<div>
						<a href="{{ route('danh-muc',['id'=>'12']) }}"><img src="{{ url('/') }}/public/images/banner-bo-suu-tap-sunshine-love.jpg" alt="" width='555' height='720'></a>
					</div>
					<div>
						<a href=""><img src="{{ url('/') }}/public/images/bao-chi-noi-ve-chung-toi.jpg" alt="" width='555' height='325'></a>
					</div>
				</div>
				<div class="col-md-6">
					<div>
						<a href="{{ route('danh-muc',['id'=>'5']) }}"><img src="{{ url('/') }}/public/images/home-banner-trang-suc.jpg" alt="" width='555' height='555'></a>
					</div>
					<div>
						<a href="{{ route('danh-muc',['id'=>'9']) }}"><img src="{{ url('/') }}/public/images/home-banner-nhan-nam.jpg" alt="" width='555' height='490'></a>
					</div>
				</div>
				<div class="quang-cao">
					<div class="col-md-4">
						<a href=""><img src="{{ url('/') }}/public/images/review.jpg" alt="" width='1140' height='306'></a>
					</div>
				</div>
			</div>
			<!-- end-row -->
		</div>
		<!-- end-container -->
	</div>
	<!-- end-product -->
	<div class="container">
		<h3 style="text-align: center;">Hot deal</h3>
		<div class="slide-holder" >
			<div class="slide-pager">
				<div class="slide-control-prev"><img src="{{ url('/') }}/public/images/icons/left-icon.png" alt=""></div>
				<div class="slide-control-next"><img src="{{ url('/') }}/public/images/icons/right-icon.png" alt=""></div>
			</div>
			<div class="slide-container">
				<div class="slide-stage">
					
					<?php $hot_pro = DB::table('products')->join('statuspro','statuspro.name_pro','=','products.name')->where('statuspro.id_status','2')->orderBy('products.updated_at','DESC')->select(['products.id','products.name','products.images','products.price','products.slug','products.content'])->get()?>
				@foreach($hot_pro as $h)
					<div class="slide-image slide-size">
						<div style="margin-top: 30px; margin-left: 20px;">
							<div class="image">
								<img src="{{ url('uploads') }}/{{ $h->images }}" style="width: 242px; height: 200px;" />
							</div>
							<div class="content-pro">
								<h4><a href="{{ route('san-pham',['slug'=>$h->slug]) }}" title="">{{ $h->name }}</a></h4>
								<h4 class="price">{{ $h->price }}</h4>
								<div class="star">
									<span class="glyphicon glyphicon-star-empty" style="color: #ffcc00"></span>
									<span class="glyphicon glyphicon-star-empty" style="color: #ffcc00"></span>
									<span class="glyphicon glyphicon-star-empty" style="color: #ffcc00"></span>
									<span class="glyphicon glyphicon-star-empty" style="color: #ffcc00"></span>
									<span class="glyphicon glyphicon-star-empty" style="color: #ffcc00"></span>
								</div>
							</div>
						</div>
						<!-- hover -->
						<div class="slide-image-hover-box">
							<div class="icon-cart">
								<a data-toggle="modal" href="#show-pro-{{ $h->id }}" >
									<img src="{{ url('/')}}/public/images/icons/cart.png" alt="" width="45px;">
								</a>

							</div>
						</div>
						<!-- endhover -->
						<div class="status-pro">
							<img src="{{ url('/')}}/public/images/icons/hotdeal.png" alt="" width="90px;">
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
					
				</div>
			</div>
		</div>
	</div>
	<div class="container foot-main">
		<div class="row">
			<div class="col-md-7">
				<div class="footer-banner">
					<div class="icon">
						<img src="{{ url('/') }}/public/images/email.png" alt="" width="75px">
					</div>
					<div class="content-email">
						<h3>
							KẾT NỐI HÔM NAY NHẬN NGAY ƯU ĐÃI
						</h3>
						<div>Hãy luôn là khách hàng đầu tiên cập nhật những chương trình ưu đãi hấp dẫn</div>
						<div>và xu hướng thời trang hot nhất</div>	
					</div>
			</div>
			</div>
			<div class="col-md-4 dk-email">
				<div  class="">
				<form class="navbar-form navbar-left" role="search"">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email của bạn">
					</div>
					<button type="submit" class="btn btn-success">Đăng ký</button>
				</form>
				</div>
			</div>
		</div>
	</div>

	

</main>

@stop()