@extends('layouts.default')
@section('content')

{{--    TODO Выод продукта по id --}}
<div>
        <div><a href="{{route('product.index')}}">bac to home</a></div>
        <div>
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>
            <p>{{$product->manufacturer['name']}}</p>
            <p><a href="{{ route('product.select', $product->id) }}">{{$product->site['name']}}</a></p>
        </div>
</div>

@endsection