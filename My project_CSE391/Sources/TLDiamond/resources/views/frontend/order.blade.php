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
		padding: 5px 15px;
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
	<div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Đặt hàng</h4></div>
	<div class="col-md-7">
@if(Auth::check() && Auth::user()->groups == 'customer')
       
		<form action="" method="POST" role="form">
			<legend>Thông tin mua hàng</legend>

			<table>
				<tbody>
					
						<tr>
							<td class="td1"><p for="">Họ tên <span style="color: red">*</span></p></td>
							<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="full_name" value="{{ Auth::user()->username }}"></td>
						</tr>

						<tr>
							<td class="td1"><p for="">Email <span style="color: red">*</span></p></td>
							<td class="td2"><input type="email" class="form-control" style="width: 100%;height: 70%;" name="email" value="{{ Auth::user()->email }}"></td>
						</tr>
						<tr>
							<td class="td1"><p for="">Số điện thoại <span style="color: red">*</span></p></td>
							<td class="td2"><input type="number" class="form-control" style="width: 100%;height: 70%;" name="phone" value="{{ Auth::user()->phone }}"></td>
						</tr>
						<tr>
							<td class="td1"><p for="">Địa chỉ <span style="color: red">*</span></p></td>
							<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="addresss" value="{{ Auth::user()->address }}"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div class="checkbox">
									<label for="check">
										<input type="checkbox" id="check" name="check_nguoi_nhan"/>	Giao hàng địa chỉ khác
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td class="td1"><p for="">Ghi chú <span style="color: red">*</span></p></td>
							<td class="td2"><textarea name="note" style="width: 100%; height: 70%;" rows="7" style="resize: none;"></textarea></td>
						</tr>
					</tbody>
				</table>
		<div id="nguoi-nhan" style="display: none">
			<legend>Thông tin người nhận</legend>
			<table>
				<tbody>
					
						<tr>
							<td class="td1"><p for="">Họ tên <span style="color: red">*</span></p></td>
							<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="receiver_name" id="receiver_name" placeholder="Họ tên"></td>
						</tr>
						<tr>
							<td class="td1"><p for="">Số điện thoại <span style="color: red">*</span></p></td>
							<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="receiver_phone" id="receiver_phone" placeholder="Số điện thoại"></td>
						</tr>
						<tr>
							<td class="td1"><p for="">Địa chỉ <span style="color: red">*</span></p></td>
							<td class="td2"><input type="text" class="form-control" style="width: 100%;height: 70%;" name="receiver_add" id="receiver_add" placeholder="Địa chỉ"></td>
						</tr>	
				</tbody>
			</table>
		</div>


	
	</div>



	<div class="col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Đơn hàng</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form">
			
					<table class="table table-hover">
						<thead>
							<th></th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th  style="text-align: right;">Thành tiền</th>
						</thead>
						<tbody>
						@if(!empty($cart->items))
						
							@foreach($cart->items as $ca)	
							<tr>
								<td width="130px"><img src="{{ url('uploads/') }}/{{ $ca['images'] }}" alt="" width="100%"></td>
								<td>
									<h5>{{ $ca['name'] }}</h5>
									Giá: 
									{{ number_format($ca['price'],0,'','.') }}
								</td>
								<td>
									<h5>{{ $ca['quantity'] }}</h5>
								</td>
								<td style="text-align: right;"><h5>{{ number_format($ca['quantity']*$ca['price'],0,'','.') }}</h5></td>
							</tr>
							@endforeach
						@endif
							<tr>
								<td>Tổng:</td>
								<td></td>
								<td></td>
								<td  style="text-align: right;">{{ number_format($cart->total(),0,'','.') }}</td>
							</tr>
							<tr>
								<td>Phí vận chuyển:</td>
								<td></td>
								<td></td>
								<td style="text-align: right;">0</td>
							</tr>
							<tr>
								<td style="font-size: 20px;">Thanh toán:</td>
								<td></td>
								<td></td>
								<td style="text-align: right; font-weight: bold; font-size: 20px;">{{ number_format($cart->total(),0,'','.') }}</td>
							</tr>
						</tbody>
					</table>
				<div>
					
					<a href="{{route('view-cart')}}" style="margin: 10px; float: left; display: inline-block;" ><span class="glyphicon glyphicon-menu-left"></span>Quay về giỏ hàng</a>

					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-sm btn-success btnG" >Đặt hàng</button>
				</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
@else
<div class="container">
	<a href="{{route('home-login')}}">Vui lòng đăng nhập trước khi đặt hàng ...</a>
</div>
@endif

@stop()