@extends('layouts.backend')
@section('title','Trang chủ')

@section('box-body')
	@if(Session::has('success'))
	    <div class="alert alert-success">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      {!!Session::get('success')!!}
	    </div>
	  @endif
@stop()