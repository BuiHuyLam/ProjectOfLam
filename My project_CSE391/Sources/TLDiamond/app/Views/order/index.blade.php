@extends('layouts.backend')
@section('title','QUẢN LÝ ĐƠN HÀNG')
@section('box-title','Danh sách')

@section('box-body')

	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Người đặt</th>
				<th>Người nhận</th>
				<th>Ngày đặt</th>
				<th>Trạng thái</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($order as $o)
			<tr>
				<td>{{ $o->id }}</td>
				<td>{{ $o->full_name }}</td>
				<td>
					@if($o->receiver_name)
					{{ $o->receiver_name }}
					@else
					{{ $o->full_name }}
					@endif
				</td>
				<td>{{ $o->created_at }}</td>
				<td>
					@if($o->status==0) Đang chờ duyệt
					@elseif($o->status==1) Đã duyệt
					@else OK
					@endif
				</td>
				<td>
					<a href="{{ route('backend.order-detail',['id'=>$o->id]) }}" class="btn btn-success">Xem</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

@stop()
