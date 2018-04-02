@extends('layouts.backend')


@section('box-body')
<div class="container">
	<form action="" method="POST" role="form">
		<legend>Create Category</legend>
	
		<div class="form-group">
			<label for="">Ten sản phẩm</label>
			<input type="text" class="form-control" name="name" placeholder="Input field" value="{{ old('name') }}" />
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
		</div> 
		<div class="form-group">
			<label>Danh mục cha:</label>
			<select name="parent">
				<option value="0">Không</option>
				@foreach($cats as $c)
				<option value="{{ $c->id }}">{{ $c->name }}</option>
				@endforeach 
			</select>
			@if($errors->has('parent'))
				<div class="help-block">
					{!!$errors->first('parent')!!}
				</div>
			@endif
		</div>

		<div class="form-group">
			<label>Trạng thái:</label>
			<p>
				<input type="radio" name="status" value="0" id="0" > <label for="0"> Không kích hoạt </label> / 
			<input type="radio" name="status" value="1" id="1"  checked/> <label for="1"> Kích hoạt </label>
			</p>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-success">Thêm</button>
	</form>
</div>

@stop()