@extends('dashboard.layout.master')
@section('content')
<div class="row layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
<div class="page-header">
    <div class="page-title">
        <h3>الطلبات</h3>
    </div>
</div>
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endforeach
<br>
<form action="{{route('orders.update',$order->id)}}" method="POST">
    @csrf 
    <div class="form-group mb-3">
        <input type="number" class="form-control" id="amount" @isset($order)
            value="{{$order->amount}}"
        @endisset aria-describedby="amount" placeholder="Order Amount" name="amount">
        <small id="amount" class="form-text text-muted">الكمية</small>
    </div>

    <div class="form-group form-check pl-0">
        
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="shop_type" name="shop_type" value="supermarket"  @if($order->shop_type == 'supermarket')
            checked
            @endif class="custom-control-input">
            <label class="custom-control-label" for="shop_type">supermarket</label>
            </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="shop_type " value="restaurant" @if($order->shop_type == 'restaurant')
            checked
            @endif class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">restaurant</label>
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary mt-3">حفظ</button>
</form>
</div>
</div>
</div>
@endsection
