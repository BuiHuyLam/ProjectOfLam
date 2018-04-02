@extends('layouts.backend')
@section('title','TÀI KHOẢN QUẢN TRỊ')
@section('box-title','Thêm tài khoản')

@section('box-body')
<div class="container">
	<form action="" method="POST" role="form">
		<table class="table table-hover">
			<tbody>
				<tr>
					<td>Tài khoản</td>
					<td>
						<input type="text" name="username" placeholder="" />
					</td>
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
					<td>Mật khẩu</td>
					<td>
						<input type="password" name="password"/>
					</td>
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
					<td>Nhập lại mật khẩu</td>
					<td>
						<input type="password" name="password_rp"/>
					</td>
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
					<td>Email</td>
					<td>
						<input type="email" name="email" />
					</td>
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
					<td>Trạng thái</td>
					<td>
						<input type="radio" name="status" value="1" id="yes" checked> <label for="yes" checked>Kích hoạt</label> / 
						<input type="radio" name="status" value="0" id="no"/> <label for="no">Không kích hoạt</label> 
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-success">Thêm</button>
	</form>
</div>
@stop()

@section('box-footer')

@stop()