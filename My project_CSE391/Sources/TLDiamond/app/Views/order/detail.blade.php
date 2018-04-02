@extends('layouts.backend')
@section('title','QUẢN LÝ ĐƠN HÀNG')
@section('box-title','Đơn hàng')

@section('box-body')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Đơn hàng {{ $order->id }}</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th  style="text-align: right;">Thành tiền</th>
				</thead>
				<tbody>
					@foreach($detail as $d)	
					<?php $pro = App\Models\Products::find($d->pro_id); ?>
					<tr>
						<td>
							<h5>{{ $d->pro_id }}</h5>
						</td>
						<td>
							<h5>{{ $pro->name }}</h5>
						</td>
						<td>{{ $d->price }}</td>
						<td>
							<h5>{{ $d->quantity }}</h5>
						</td>
						<td style="text-align: right;"><h5>{{ number_format($d->quantity*$d->price,0,'','.') }}</h5></td>
					</tr>
					@endforeach
				
					<tr>
						<td>Tổng:</td>
						<td></td>
						<td></td>
						<td></td>
						<td  style="text-align: right;">{{ number_format($order->amount,0,'','.') }}</td>
					</tr>
					<tr>
						<td>Phí vận chuyển:</td>
						<td></td>
						<td></td>
						<td></td>
						<td style="text-align: right;">0</td>
					</tr>
					<tr>
						<td style="font-size: 20px;">Thanh toán:</td>
						<td></td>
						<td></td>
						<td></td>
						<td style="text-align: right; font-weight: bold; font-size: 20px;">{{ number_format($order->amount,0,'','.') }}</td>
					</tr>
				</tbody>
			</table>
		</div>				
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin khách hàng</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-6">
				<h4>Người đặt</h4>
				<table>
					<tbody>
						<tr>
							<td width="150px"><p>Họ tên</p></td>
							<td><p>{{ $order->full_name }}</p></td>
						</tr>
						<tr>
							<td><p>Số điện thoại</p></td>
							<td><p>{{ $order->phone }}</p></td>
						</tr>
						<tr>
							<td><p>Địa chỉ</p></td>
							<td><p>{{ $order->address }}</p></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h4>Người nhận</h4>
				<table>
					<tbody>
						<tr>
							<td width="150px"><p>Họ tên</p></td>
							<td><p>
								@if($order->receiver_name) {{ $order->receiver_name }}
								@else {{ $order->full_name }}
								@endif
							</p></td>
						</tr>
						<tr>
							<td><p>Số điện thoại</p></td>
							<td><p>
								@if($order->receiver_phone) {{ $order->receiver_phone }}
								@else {{ $order->phone }}
								@endif
							</p></td>
						</tr>
						<tr>
							<td><p>Địa chỉ</p></td>
							<td><p>
								@if($order->receiver_add) {{ $order->receiver_add }}
								@else {{ $order->address }}
								@endif
							</p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<div class="order" style="float: right;">
	<form action="" method="post" accept-charset="utf-8">
		<p><input type="radio" name="status" value="0" id="st0" @if($order->status==0) checked @endif /> <label for="st0"> Đang chờ xử lý</label></p>
		<p><input type="radio" name="status" value="1" id="st1" @if($order->status==1) checked @endif/> <label for="st1"> Đã tiếp nhận đơn hàng</label></p>
		<p><input type="radio" name="status" value="2" id="st2" @if($order->status==2) checked @endif/> <label for="st2"> Đã giao hàng</label></p>
		<p><button style="float: right; padding: 5px 20px; font-size: 22px;" class="btn btn-success" type="submit">Lưu</button></p>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>

</div>



@stop()