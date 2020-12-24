@extends('layouts.default')
@section('content')
<div class="container content-container">
    <div class="col-sm-12">
        <div class="product">
            <div class="col-sm-12">
                <h2 class="text-center">{{$product->name}}</h2>
            </div>
            <div class="product_left-content">
                <p><span class="bold">{{trans('validation.product.price')}}</span>: {{$product->price}}</p>
                <p><span class="bold">{{trans('validation.product.manufacturer')}}</span>: {{$product->manufacturer['name']}}</p>
                <div><span class="bold">{{trans('validation.product.site')}}</span>: <a href="http://{{$product->site['name']}}" target="_blank">{{$product->site['name']}}</a></div>
            </div>
            <div class="product_right-content product-description">
                <p><span class="bold">{{trans('validation.product.description')}}</span>: {{$product->description}}</p>
            </div>
            <div class="text-center col-sm-12 product-butt">
                <div><a href="{{route('product.index')}}" class="btn btn-primary">{{trans('validation.product.come_back')}}</a></div>
            </div>
        </div>
    </div>
</div>

@endsection