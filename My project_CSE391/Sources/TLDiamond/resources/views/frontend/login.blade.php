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
		margin-top: 10px;
		padding: 10px 15px;
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
	<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Đăng nhập tài khoản</h4></div>
	<div class="col-md-6">
		<form action="" method="POST" role="form">
			<legend>Đăng nhập tài khoản</legend>
			<table>
				<tbody>
					<tr>
						<td class="td1"><p for="">Email <span style="color: red">*</span></p></td>
						<td class="td2"><input type="email" class="form-control" style="width: 100%;height: 70%;" name="email"></td>
					</tr>
					<tr>
						<td class="td1"><p for="">Mặt khẩu <span style="color: red">*</span></p></td>
						<td class="td2"><input type="password" class="form-control" style="width: 100%;height: 70%;" name="password"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<label>
				                <input type="checkbox" value="remember" value="1"> Remember me
				            </label>
				        </td>
					</tr>
				@if(Session::has('error'))
					<tr>
						<td></td>
					    <td><div class="alert alert-danger">
					      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					      {!!Session::get('error')!!}
					    </div>
					    </td>
					</tr>	
				 @endif
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<button type="submit" class="btn btn-success btnG" style="float: right">Đăng nhập</button>	
						</td>
					</tr>
					<tr>
						<td></td>
						<td><div style="margin-top: 30px; "><a style="color: #999;" href="{{route('registrater')}}" ><span>Quên mật khẩu?</span></a></div></td>
					</tr>
					<tr>
						<td></td>
						<td><div style="margin-top: 5px;"><a style="color: #999;" href="{{route('registrater')}}" ><span>Đăng ký tài khoản mới.</span></a></div></td>
					</tr>

				</tbody>
			</table>
		</form>

	</div>
@stop