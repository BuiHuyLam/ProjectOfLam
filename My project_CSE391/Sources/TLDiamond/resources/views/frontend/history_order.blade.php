@extends('layouts.index')
@section('main')
<div class="panel panel-success container">
    <div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Lịch sử đơn hàng</h4></div>
    <div class="panel-heading">
        <h3 class="panel-title">Đơn hàng</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ten SP</th>
                <th>Người nhận</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($order as $o)
      		<tr>
      			<td>
      				{{ $o->id }}
      			</td>
      			<?php $pro = DB::table('order_detail')->join('products','products.id','=','order_detail.pro_id')->where('order_detail.order_id',$o->id)->get(); ?>
      			<td>
					@foreach($pro as $p)
						{{ $p->name }} x {{ $p->quantity }}<br>
					@endforeach
      			</td>
      			<td>{{ $o->full_name }}</td>
      			<td>{{ $o->amount }}</td>
      			<td>
					@if( $o->status==0 ) <span class="glyphicon glyphicon-hourglass"></span> Đang chờ xử lý
					@elseif( $o->status==1 ) <span class="glyphicon glyphicon-plane"></span> Đang vận chuyển
					@elseif( $o->status==2 ) <span class="glyphicon glyphicon-ok"></span> Đã nhận hàng
					@endif
      			</td>
      			@if( $o->status==0 )
      			<td>
      				<a href="{{ route('history-delete',['id'=>$o->id]) }}" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa đơn hàng này?')">Xóa</a>
      			</td>
      			@endif
      		</tr>
      		@endforeach
        </tbody>

        <tfoot>
            <tr>
                
            </tr>
        </tfoot>
    </table>
    </div>
    

    
</div>
@stop()