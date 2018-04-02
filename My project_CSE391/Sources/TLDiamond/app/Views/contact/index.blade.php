@extends('layouts.backend')
@section('title','Liên hệ')
@section('box-title','Danh sách liên hệ')

@section('box-body')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Nội dung</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contact as $c)
			<tr>
				<td>{{ $c->id }}</td>
				<td>{{ $c->name }}</td>
				<td>{{ $c->email }}</td>
				<td>{{ $c->phone }}</td>
				<td>{{ $c->content }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop()