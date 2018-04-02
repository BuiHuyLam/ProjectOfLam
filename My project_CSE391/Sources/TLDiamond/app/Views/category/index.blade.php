@extends('layouts.backend')
@section('title','DANH MỤC')
@section('box-title','Danh mục')

@section('box-body')

<a href="{{ route('backend.category-create') }}" title="Thêm danh mục" class="btn btn-success" style="margin: 10px 0px 15px 0px ">Thêm mới</a>

<table class="table table-hover">
	<thead>
		<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Trạng Thái</th>
				<th>Danh mục cha</th>
				<th>Ngày tạo</th>
				<th></th>
			</tr>
	</thead>
	<tbody>
	@foreach($cats as $c)
			<tr>
				<td>{{$c->id}}</td>
				<td>{{$c->name}}</td>
				<td>
					@if($c->status==0) Không kích hoạt 
					@else($c->status==1) Kích hoạt 
					@endif
				</td>
				<td>
						@foreach($parentcat as $prc)
						@if($prc->id == $c->parent) {{ $prc->name }} @break
						@endif
						@endforeach
					</select>

				</td>
				<td>{{$c->created_at}}</td>
				<td>
					<a href="" class="label label-success" title="Sửa">Sửa</a>
					<a href="{{ route('backend.category-delete',['id'=> $c->id]) }}" class="label label-danger" onclick="return confirm('Bạn muốn xóa danh mục này')" title="Xóa">Xóa</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $cats->links() }}
@stop()

@section('box-footer')
