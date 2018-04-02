	@extends('layouts.backend')
@section('title','SẢN PHẨM')
@section('box-title','Danh mục')

@section('box-body')
<a href="{{ route('backend.products-create') }}" title="Thêm mới sản phẩm" class="btn btn-success" style="margin: 10px 0px 15px 0px ">Thêm mới</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên sản phẩm</th>
			<th>Ảnh</th>
			<th>Giá</th>
			<th>Giá sale</th>
			<th>Loại sản phẩm</th>
			<th>Trạng thái</th>
			<th>Độ hot</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@foreach($products as $pro)
		<tr>
			<td>{{ $pro->id }}</td>
			<td>{{ $pro->name }}</td>
			<td><img src="{{ url('/uploads') }}/{{ $pro->images }}" alt="" width="60"></td>
			<td>{{ $pro->price }}</td>
			<td>{{ $pro->price_sale }}</td>
			<td>
			@foreach($cats as $c)
			@if($c->id == $pro->cat_id) {{ $c->name }} @break @endif
			@endforeach
			</td>
			<td>
				@if($pro->status == 0) Không kích hoạt
				@else Kích hoạt
				@endif
			</td>
			<td>
				<?php $status_hot= App\Models\statuspro::where('name_pro',$pro->name)->get() ?>
				@foreach($status_hot as $hot)
					@if($hot->id_status == 1) Không <br> @endif
					@if($hot->id_status == 2) Bán chạy <br> @endif
					@if($hot->id_status == 3) Sale <br> @endif
					@if($hot->id_status == 4) Sale mạnh <br>@endif
				@endforeach
			</td>
			<td>
				<a href="{{route('backend.products-edit',['id'=>$pro->id])}}" title="Sửa" class="btn btn-primary">Sửa</a>
				<a href="{{route('backend.products-delete',['id'=>$pro->id])}}" title="Xóa" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa sản phẩm này không?')">Xóa</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
	<div class="text-center">
		{{ $products->links() }}		
	</div>

@stop()

@section('box-footer')

@stop()