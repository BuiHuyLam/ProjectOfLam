@extends('layouts.index')
@section('main')
	<style type="text/css" media="screen">
	.td1{
		font-size: 18px;
		width: 150px; 
		text-align: right;
		padding-right: 20px;" 
	}
	.td2{
		height: 70px;
		width: 400px; 	
	}
	button{
		float: right;
	}
	.btnG{
		padding: 15px 25px;
		font-size: 18px;
		background: #7fcbc9;
		border-color: #7fcbc9;
		border-radius: 0;
	}
	.btnG:hover{
		background-color: #6dbfc9;
		border-color: #6dbfc9
	}
	
	
</style>
<div class="container">
	<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Đăng ký tài khoản</h4></div>
	<div class="col-md-6">
		<form action="" method="POST" role="form">
			<legend>Đăng ký tài khoản</legend>
			<table>
				<tbody>
					<tr>
						<td class="td1"><p for="">Họ tên <span style="color: red">*</span></p></td>
						<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="username" id="username_rs"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('username'))
								<div class="help-block">
									{!!$errors->first('username')!!}
								</div>
							@endif
						</td>
					</tr>



					<tr>
						<td class="td1"><p for="">Email <span style="color: red">*</span></p></td>
						<td class="td2"><input type="email" class="form-control" style="width: 100%;height: 70%;" name="email" id="email_rs"></td>
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
						<td class="td1"><p for="">Mật khẩu <span style="color: red">*</span></p></td>
						<td class="td2"><input type="password" class="form-control" style="width: 100%;height: 70%;" name="password" id="password_rs"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('password'))
								<div class="help-block">
									{!!$errors->first('password')!!}
								</div>
							@endif
						</td>
					</tr>



					<tr>
						<td class="td1"><p for="">Nhập lại mật khẩu <span style="color: red">*</span></p></td>
						<td class="td2"><input type="password" class="form-control" style="width: 100%;height: 70%;" name="password_rp" id="password_rp_rs"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('password_rp'))
								<div class="help-block">
									{!!$errors->first('password_rp')!!}
								</div>
							@endif
						</td>
					</tr>



					<tr>
				 		<td class="td1"><p for="">Số điện thoại <span style="color: red">*</span></p></td>
						<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="phone" id="phone_rs"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('phone'))
								<div class="help-block">
									{!!$errors->first('phone')!!}
								</div>
							@endif
						</td>
					</tr>


					<tr>
						<td class="td1"><p for="">Địa chỉ <span style="color: red">*</span></p></td>
						<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="address" id="add_rs"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							@if($errors->has('address'))
								<div class="help-block">
									{!!$errors->first('address')!!}
								</div>
							@endif
						</td>
					</tr>
					

					<tr>
						<td></td>
						<td>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<button type="submit" class="btn btn-success btnG">Đăng ký</button>
						</td>
					</tr>
					
				</tbody>
			</table>
		</form>
	</div>
@stop