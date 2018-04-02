@extends('layouts.index')

@section('main')
<div class="panel panel-success container">
    <div class="link-nav"><h4><a href="{{ route('home') }}">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Giỏ hàng</h4></div>
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin giỏ hàng</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên SP</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if(count($cart->items))
        @foreach($cart->items as $item)
        @php
            $tt = $item['quantity']*$item['price'];
        @endphp
            <tr>
                <td>1</td>
                <td>
                    <img src="{{url('uploads')}}/{{$item['images']}}" alt="" width="50">
                </td>
                <td>{{$item['name']}}</td>
                <td>
                <form action="{{route('update')}}" class="form-inline">
                    <div class="form-group">
                       <input type="number" name="quantity" value="{{$item['quantity']}}">
                       <button type="submit" class="btn btn-success" style="padding: 2px 9px; margin-left: 10px;">Cập nhật</button>
                       <input type="hidden" name="id" value="{{$item['id']}}">
                    </div>
                </form>
                   
                </td>
                <td>{{number_format($item['price'],0,'','.')}}đ</td>
                <td>{{number_format($tt,0,'','.')}}đ</td>
                <td>
                    
                    <a href="{{route('remove',['id'=>$item['id']])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa sản phẩm này?')">Xóa</a>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>

        <tfoot>
            <tr>
                <th colspan="4" style="text-align: center">Tổng tiền</th>
                <th colspan="2">{{number_format($cart->total(),0,'','.')}}đ</th>
            </tr>
        </tfoot>
    </table>
    </div>
    

    <div class="text-center">
        <a href="{{route('home')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
        <a href="{{route('clear')}}" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng?')">Xóa toàn bộ giỏ hàng</a>
        <a href="{{route('order')}}" class="btn btn-success">Mua ngay</a>
    </div>
</div>
@stop()