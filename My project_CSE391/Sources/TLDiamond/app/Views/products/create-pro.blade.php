@extends('layouts.backend')
@section('title','SẢN PHẨM')
@section('box-title','Thêm sản phẩm')

@section('box-body')

<div class="row">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<div class="col-md-9">
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" class="form-control" name="name" id="name" >
			</div>
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
			<div class="form-group">
				<label for="">Đường dẫn tĩnh</label>
				<input type="text" class="form-control" name="slug" id="slug">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea name="content" id="content" class="form-control" rows="3" ></textarea>
			</div>
			<div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 1</label>
						<input type="file" name="file1" class="choseImg" />
					</div>
					<!-- <div class="thumbnail">
						<img src="{{url('uploads/')}}/" alt="" id="img1">
					</div> -->
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 2</label>
						<input type="file" name="file2" class="choseImg" />
					</div>
					<!-- <div class="thumbnail">
						<img src="{{url('uploads/')}}/" alt="" id="img2">
					</div> -->
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 3</label>
						<input type="file" name="file3" class="choseImg" />
					</div>
					<!-- <div class="thumbnail">
						<img src="{{url('uploads/')}}/" alt="" id="img3">
					</div> -->
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 4</label>
						<input type="file" name="file4" class="choseImg" />
					</div>
					<!-- <div class="thumbnail">
						<img src="{{url('uploads/')}}/" alt="" id="img4">
					</div> -->
						</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="cat_id" id="inputCat_id" class="form-control" required>
					<option value="">Chọn danh mục</option>
				@foreach($cats as $cat)
					<option value="{{$cat->id}}" >{{$cat->name}}</option>
				@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="text" class="form-control" name="price" />
			</div>
			@if($errors->has('price'))
				<div class="help-block">
					{!!$errors->first('price')!!}
				</div>
			@endif
			<div class="form-group">
				<label for="">Giá khuyến mãi</label>
				<input type="text" class="form-control" name="price_sale" />
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" class="form-control">
					<option value="1" selected >Kích hoạt</option>
					<option value="0" >Không kích hoạt</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Độ hot</label><br>
				<table>
					<tr>
						<td width="90">
							<input type="radio" name="status_pro" value="1" id="checkbox0" /> <label for="checkbox0" >Không</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="status_pro" value="3" id="checkbox2"/> <label for="checkbox2" >Sale</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="status_pro" value="4" id="checkbox3"/> <label for="checkbox3" >Sale mạnh</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" name="status_sale" value="2" id="checkbox1" /> <label for="checkbox1" >Bán chạy</label>
						</td>
					</tr>
				</table>
			</div>
			<div class="form-group">
				<label for="" >Hình ảnh</label>
				<input type="file" name="file"  class="choseImg">
			</div>
			@if($errors->has('images'))
				<div class="help-block">
					{!!$errors->first('images')!!}
				</div>
			@endif
			<div class="thumbnail">
				<img src="{{url('uploads/')}}/" alt="" width="100%">
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="submit" class="btn btn-primary">Lưu lại</button>
		</div>
	</form>
	
</div>

@stop()

@section('box-footer')

@stop()