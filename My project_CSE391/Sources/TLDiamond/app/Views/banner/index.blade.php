@extends('layouts.backend')
@section('title','QUẢNG CÁO')
@section('box-title','Danh sách')

@section('box-body')
<a href="{{ route('backend.banner-create') }}" title="Thêm mới" class="btn btn-success" style="margin: 10px 0px 15px 0px ">Thêm mới</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Ảnh</th>
				<th>Tên</th>
				<th>Nội dung</th>
				<th>Số thứ tự</th>
				<th>Trạng thái</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($banner as $b)
			<tr>
				<td>{{ $b->id }}</td>
				<td>
					<img src="{{ url('uploads/') }}/{{ $b->images }}" alt="">
				</td>
				<td>{{ $b->name }}</td>
				<td>{{ $b->content }}</td>
				<td>{{ $b->sort }}</td>
				<td>
					@if($b->status==0) Không kích hoạt
					@else Kích hoạt
					@endif
				</td>
				<td>
					<a href="">Sửa</a>
					<a href="">Xóa</a>
				</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
@stop()