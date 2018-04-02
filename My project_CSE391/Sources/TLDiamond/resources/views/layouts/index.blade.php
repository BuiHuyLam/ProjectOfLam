<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TL-Diamond</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="{{ url('/') }}/public/backend/css/AdminLTE.css">
	<link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
</head>
<body>
<!-- header -->
	<header>
		<nav class="navbar navbar-default nav-top-header" role="navigation" style="background-color: #F7F6F1">
			<div class="container nav-top-header">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!-- Menu Đăng nhập -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				
					<!-- Menu trang chủ -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						<a class="navbar-brand" href="{{ route('home') }}">TL-Diamond</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class=""><a href="#"><span class="glyphicon glyphicon-phone-alt"> </span> Hotline: 123456789</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" method="GET" action="{{ route('seach-pro') }}">
							<div class="form-group">
								<input type="text" class="form-control" name="search_key" placeholder="Search" />
							</div>
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
						</form>
						
						<!-- Kiểm tra đăng nhập -->
						<li class="dropdown">
							@if(Auth::check() && Auth::user()->groups == 'customer')
							<!-- Đã đăng nhập -->
							<a href="#" class="dropdown-toggle user-login" data-toggle="dropdown">Xin chào {{ Auth::user()->username }} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-user"> </span> Quản lý tài khoản</a></li>
								<li><a href="{{route('history-order')}}"><span class="glyphicon glyphicon-piggy-bank"> </span> Lịch sử mua hàng</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Đánh giá</a></li>
								<li><a href="{{route('home-logout')}}"><span class="glyphicon glyphicon-off"></span> Đăng xuất</a></li>
							</ul>
						</li>
						@else 
						<!-- chưa đăng nhập -->
						<li><a href="{{route('home-login')}}" title="">Đăng nhập</a></li>
						@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav> <!-- nav-top-header -->
<!-- logo + icon giỏ hàng -->
		<div class="logo-header container">
			<div class="logo">
				<img src="{{ url('/') }}/public/images/icons/logo.png" width="250px"/></a>
			</div>
			<div class="gio-hang" id="cart-mini">
				<a href="{{ route('view-cart') }}" class="icon-gio-hang"><img src="{{ url('/') }}/public/images/icons/gio-hang.png" alt="" width="50px;"></a>
				<div class="count-pro"><strong>{{ $cart->quanti() }}</strong></div>
			</div>	
		</div>
<!-- end-logo -->
<!-- navbar -->
		<nav class="navbar navbar-default nav-home" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="nav-center">
					<div class="collapse navbar-collapse navbar-ex2-collapse">
						<ul class="nav navbar-nav">
							<li><a href="{{ route('home') }}">TRANG CHỦ</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">SẢN PHẨM <b class="caret"></b></a>
								<ul class="dropdown-menu my-menu">
									<li style="width: 900px;">
									<?php 
										$cate = App\Models\Category::Where('parent',0)->get()->toArray();?>
										@foreach ($cate as $c) 
											<div class="col-md-3 cat-parent">
												<div class="row">
													<ul type="none"><a href="{{ route('danh-muc-chinh',['id'=>$c['id']]) }}" class="menu-cat-parent">{{ $c['name'] }}</a>
														<div style="margin-top: 10px;">
															<?php $cat_p = App\Models\Category::Where('parent',	$c['id'])->get()->toArray();?>
															@foreach($cat_p as $cp)
																<li ><a href="{{ route('danh-muc',['id'=>$cp['id']]) }}" title="" class="cat-y">{{ $cp['name'] }}</a></li>
															@endforeach
														</div>
													</ul>
												</div>
											</div>
										@endforeach
									</li>
								</ul>
							</li>
							<li><a href="{{ route('gioi-thieu') }}">GIỚI THIỆU</a></li>
							<li><a href="{{ route('lien-he') }}">LIÊN HỆ</a></li>
							<li><a href="{{ route('khuyen-mai') }}"><span class="glyphicon glyphicon-flash"></span> KHUYẾN MÃI</a></li>

						</ul>
					</div><!-- /.navbar-collapse -->	
				</div>
			</div>
		</nav>
		<div style="width: 100%;">
		<!-- 	<div class="container" id="alert-cart" style="display: none">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Thêm sản phẩm vào giỏ hàng thành công
				</div>
			</div> -->
			@yield('main')
		</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="" alt="">
				<ul>
					<h3>Thông tin chung</h3>
					<li>Giới thiêu</li>
					<li>thông tin</li>
					<li>hệ thống cửa hàng</li>
					<li>Tuyển dụng</li>
					<li>liên hệ</li>
				</ul>
			</div>
			<div class="col-md-3">
				<img src="" alt="">
				<ul>
					<h3>Hỗ trợ khách hàng</h3>
					<li>Hướng dẫn mua hàng</li>
					<li>phương thức vận chuyển</li>
					<li>Chính sách bảo hàng</li>
					
				</ul>
			</div>
			<div class="col-md-3">
				<img src="" alt="">
				<ul>
					<h3>Thông tin khuyến mãi</h3>

					<li>Sản phẩm bán chạy</li>
					<li>Sản phẩm khuyến mãi</li>
					<li>Hot Deal</li>

				</ul>
			</div>
			<div class="col-md-3">
				<img src="" alt="">
				<ul>
					<h3>Tổng đài trợ giúp</h3>
					<li>
						Góp ý,thắc mắc,khiếu nại
					</li>
					<li>Email: jshfauhf@gmail.com</li>
					<li>Tổng đài: 0123345679</li>
					<li>Hotline: 321464</li>
				</ul>
			</div>
		</div>
		<div class="text-center" style="color: #aaa; margin-top: 20px;">
			© Bản quyền thuộc về TL - Diamond
		</div>
	</div>
</footer>
		<!-- Bootstrap & JQ offline -->
<script src="{{ url('/') }}/public/js/jquery.min.js"></script>
<script src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
		<!-- Bootstrap & JQ online -->
<!-- <script src="http://code.jquery.com/jquery.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<!-- JS slider hot deal in frontend -->
<script src="{{ url('/') }}/public/js/custom.js"></script>
	<!-- Bootstrap JavaScript -->
<script src="{{ url('/') }}/public/backend/js/adminlte.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/dashboard.js"></script>
	<!-- Ajax thêm sp vào giỏ hàng nhanh -->
<script src="{{ url('/') }}/public/js/ajax.js"></script>

<!-- Thông báo success -->
@if(Auth::check() && Session::has('success'))
<div class="modal fade" id="modal-id">
	<div class="alert alert-success text-center">
		<strong>{!! Session::get('success') !!}</strong> ...
	</div>
</div>

<script type="text/javascript">
	$('#modal-id').modal('show');
</script>
@endif
</html>