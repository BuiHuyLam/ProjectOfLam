@extends('layouts.backend')
@section('title','QUẢNG CÁO')
@section('box-title','Thêm hình ảnh')

@section('box-body')
<div class="container">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<table class="table table-hover">
			<tbody>
				<tr>
					<td>Tên</td>
					<td>
						<input type="text" name="name"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('name'))
							<div class="help-block">
								{!!$errors->first('name')!!}
							</div>
						@endif
					</td>
				</tr>
				<tr>
					<td>Ảnh</td>
					<td>
						<input type="file" name="file"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('images'))
							<div class="help-block">
								{!!$errors->first('images')!!}
							</div>
						@endif
					</td>
				</tr>
				<tr>
					<td>Trạng thái</td>
					<td>
						<input type="radio" name="status" value="1" id="st1" checked /> <label for="st1"> Kích hoạt</label> / 
						<input type="radio" name="status" value="0" id="st0" /> <label for="st0"> Không kích hoạt</label>
					</td>
				</tr>
				<tr>
					<td>Số thứ tự</td>
					<td>
						<input type="number" name="sort"/> 
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('sort'))
							<div class="help-block">
								{!!$errors->first('sort')!!}
							</div>
						@endif
					</td>
				</tr>
				<tr>
					<td>Đường dẫn</td>
					<td>
						<input type="text" name="link"/> 
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-success">Thêm</button>
	</form>
</div>

@stop()