@extends('layouts.default')
@section('content')
    <h1>Products</h1>
    {{--    TODO Выод всех продуктов --}}
    <div>
        @foreach($products as $product)
            <div>
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <p>{{$product->price}}</p>
                <p>{{$product->manufacturer['name']}}</p>
                <div><a href="{{$product->site['name']}}" target="_blank">{{$product->site['name']}}</a></div>
                <div><a href="{{ route('product.select', $product->id) }}">READ MORE!</a></div>
            </div>

        @endforeach
    </div>

@endsection