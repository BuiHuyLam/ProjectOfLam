@extends('layouts.backend')
@section('title','TÀI KHOẢN QUẢN TRỊ')
@section('box-title','Danh sách')

@section('box-body')
	<div class="container">
		<a href="{{ route('backend.user-create') }}" title="Thêm danh mục" class="btn btn-success" style="margin: 10px 0px 15px 0px ">Thêm mới</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>username</th>
					<th>Email</th>
					<th>Trạng thái</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($user as $u)
				<tr>
					<td>{{ $u->id }}</td>
					<td>{{ $u->username }}</td>
					<td>{{ $u->email }}</td>
					<td>
						{{ $u->status }}
					</td>
					<td>
						<a href="{{ route('backend.user-delete',['id'=>$u->id]) }}" title="Xóa" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
@stop()