@extends('layouts.default')
@section('content')
    <div class="text-center title"><h1>{{trans('validation.product.products')}}</h1></div>
    <div class="container d-flex">
        <div class="col-md-12 col-md-offset-0">
            <div class="row align-items-start">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-sm-12">
                            <div class="products">
                                <div class="col-sm-12">
                                    <h2 class="text-center">{{$product->name}}</h2>
                                </div>
                                <div class="product_left-content">
                                    <p><span class="bold">{{trans('validation.product.price')}}</span>: {{$product->price}}</p>
                                    <p><span class="bold">{{trans('validation.product.manufacturer')}}</span>: {{$product->manufacturer['name']}}</p>
                                    <div><span class="bold">{{trans('validation.product.site')}}</span>: <a href="http://{{$product->site['name']}}" target="_blank">{{$product->site['name']}}</a></div>
                                </div>
                                <div class="product_right-content product-description">
                                    <p><span class="bold">{{trans('validation.product.description')}}</span>: {{str_limit($product->description, 600)}}</p>
                                </div>
                                <div class="text-center col-sm-12 product-butt">
                                    <a href="{{ route('product.select', $product->id) }}" class="btn btn-primary">{{trans('validation.product.info')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                <div class="col-sm-12 text-center">{{$products->links()}}</div>
{{--                    $products->links() - генерирет кнопки переода на страницы --}}

                @else
                    <div class="text-center"><h2>{{trans('validation.products.none')}}</h2></div>
                @endif
            </div>
        </div>
    </div>
@endsection