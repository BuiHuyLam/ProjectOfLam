@extends('layouts.backend')
@section('title','SẢN PHẨM')
@section('box-title','Sửa sản phẩm')

@section('box-body')

<div class="row">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<div class="col-md-9">
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" class="form-control" name="name" value="{{$model->name}}" id="name" >
			</div>
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
			<div class="form-group">
				<label for="">Đường dẫn tĩnh</label>
				<input type="text" class="form-control" name="slug" value="{{$model->slug}}" id="slug">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea name="content" id="content" class="form-control" rows="3" >{{$model->content}}</textarea>
			</div>
			<div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 1</label>
						<input type="file" name="file1" class="choseImg" />
					</div>
					<div class="thumbnail">
						<img src="{{url('uploads/')}}/{{$model->images_hover1}}" alt="" id="img1">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 2</label>
						<input type="file" name="file2" class="choseImg" />
					</div>
					<div class="thumbnail">
						<img src="{{url('uploads/')}}/{{$model->images_hover2}}" alt="" id="img2">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 3</label>
						<input type="file" name="file3" class="choseImg" />
					</div>
					<div class="thumbnail">
						<img src="{{url('uploads/')}}/{{$model->images_hover3}}" alt="" id="img3">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="" >Hình ảnh hover 4</label>
						<input type="file" name="file4" class="choseImg" />
					</div>
					<div class="thumbnail">
						<img src="{{url('uploads/')}}/{{$model->images_hover4}}" alt="" id="img4">
					</div>
						</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="cat_id" id="inputCat_id" class="form-control" required>
					<option value="">Chọn danh mục</option>
				@foreach($cats as $cat)
				@php
					$selected = $cat->id == $model->cat_id ? 'selected': '';
				@endphp
					<option value="{{$cat->id}}" {{$selected}}>{{$cat->name}}</option>
				@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="text" class="form-control" name="price" value="{{$model->price}}">
			</div>
			@if($errors->has('price'))
				<div class="help-block">
					{!!$errors->first('price')!!}
				</div>
			@endif
			<div class="form-group">
				<label for="">Giá khuyến mãi</label>
				<input type="text" class="form-control" name="price_sale" value="{{$model->price_sale}}" >
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" class="form-control">
					<option value="0" @if($model->status == 0) selected @endif>Không kích hoạt</option>
					<option value="1" @if($model->status == 1) selected @endif>Kích hoạt</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Độ hot</label><br>
				<?php $status_pro = App\Models\statuspro::where('name_pro',$model->name)->get();?>
				@php 
					function checked($status_pro,$value){
						foreach ($status_pro as $st) {
							if ($st->id_status==$value) {
								echo "checked";
								break;
							}
						}
					}
				@endphp
				<table>
					<tr>
						<td width="90">
							<input type="radio" name="status_pro" value="1" id="checkbox0" <?php checked($status_pro,1) ?> /> <label for="checkbox0" >Không</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="status_pro" value="3" id="checkbox2" <?php checked($status_pro,3) ?>/> <label for="checkbox2" >Sale</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="status_pro" value="4" id="checkbox3" <?php checked($status_pro,4) ?>/> <label for="checkbox3" >Sale mạnh</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" name="status_sale" value="2" id="checkbox1" <?php checked($status_pro,2) ?>/> <label for="checkbox1" >Bán chạy</label>
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
				<img src="{{url('uploads/')}}/{{$model->images}}" alt="">
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="submit" class="btn btn-primary">Lưu lại</button>
		</div>
	</form>
	
</div>

@stop()

