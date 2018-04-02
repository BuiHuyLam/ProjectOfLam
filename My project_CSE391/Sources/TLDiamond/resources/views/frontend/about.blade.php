@extends('layouts.index')

@section('main')
	<div class="container">
		<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Giới thiệu</h4></div>
		<div><img src="{{ url('/') }}/public/images/icons/logo-name.png" alt="" width="200px"></div>
		<div class="about-content">
			<p>Sản phẩm của chúng tôi mang lại cho quý hàng sự sang trọng, thanh lịch và đầy quý phái</p>
		</div>
	</div>
@stop()