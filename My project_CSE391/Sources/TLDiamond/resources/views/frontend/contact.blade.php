@extends('layouts.index')

@section('main')
<div class="container">
	<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Liên hệ</h4></div>
	<div class="col-md-6">
		<form action="" method="POST" role="form">
			<legend>Thông tin khách hàng</legend>
			<table>
				<tbody>
					<tr>
						<td class="td1"><p for="">Tên <span style="color: red">*</span></p></td>
						<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="name"></td>
					</tr>
					<tr>
						<td></td>
						<td>@if($errors->has('name'))
								<div class="help-block">
									{!!$errors->first('name')!!}
								</div>
							@endif</td>
					</tr>

					<tr>
						<td class="td1"><p for="">Email <span style="color: red">*</span></p></td>
						<td class="td2"><input type="email" class="form-control" style="width: 100%;height: 70%;" name="email"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('email'))
								<div class="help-block">
									{!!$errors->first('email')!!}
								</div>
							@endif
						</td>
					</tr>

					<tr>
						<td class="td1"><p for="">Số điện thoại</p></td>
						<td class="td2"><input type="text" class="form-control" style="width: 100%; height: 70%;" name="phone"></td>
					</tr>
					<tr>
						<td class="td1"><p for="">Nội dung</p></td>
						<td class="td2"><textarea name="content" style="width: 100%; height: 70%;" rows="7" style="resize: none;"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('content'))
								<div class="help-block">
									{!!$errors->first('content')!!}
								</div>
							@endif
						</td>
					</tr>
					<tr>
						<td><input type="hidden" name="_token" value="{{ csrf_token() }}"></td>
						<td><button type="submit" class="btn btn-success btnG">GỬI LIÊN HỆ</button></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<!-- from -->
	<div class="col-md-6 info">
		<h2><img src="{{ url('/') }}/public/imgs/logo-name.png" alt="" width="250px;"></h2>
		<h4><span class="glyphicon glyphicon-user"> </span> Bộ phận Tư vấn khách hàng:</h4>
		<p>- Hotline: <a href="">0961497601</a></p>
		<p>- Email: <a href="">tldiamond@gmail.com</a></p>
	</div>
	<!-- contact -->
</div>
@stop() 