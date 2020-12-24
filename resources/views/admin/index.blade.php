@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('validation.admin.panel')}}</div>
                    <div><a href="{{route('admin.getEmptyProduct')}}" class="btn btn-primary">{{trans('validation.admin.create')}}</a></div>
                    <div class="panel-body">
                        @include('errors')
                        @if(count($products)>0)
                            <table class="table">
                                <tr>
                                    <th colspan="1" class="text-center">{{trans('validation.product.name')}}</th>
                                    <th colspan="2" class="text-center">{{trans('validation.product.manufacturer')}}</th>
                                    <th colspan="1" class="text-center">{{trans('validation.product.price')}}</th>
                                    <th colspan="2" class="text-center">{{trans('validation.admin.action')}}</th>
                                </tr>
                            @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">{{$product->manufacturer['name']}}</td>
                                        <td class="text-center"><a href="http://{{$product->site->name}}" target="_blank">{{$product->site->name}}</a></td>
                                        <td class="text-center">{{$product->price}}</td>
                                        <td class="text-center">
                                            <form action="{{route('admin.getProduct', $product->id)}}" method="GET">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$product->id}}">
                                                <input type="submit" value="{{trans('validation.admin.change')}}" class="btn btn-warning">
                                            </form>
                                        </td>
                                        <td>
                                            <!-- TODO make validation if admin id === product id, admin can delete this product -->
                                            <form action="{{route('admin.delete', $product->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$product->id}}">
                                                <input type="hidden" name="owner_id" value="{{$product->owner_id}}">
                                                <input type="submit" value="{{trans('validation.admin.delete')}}" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
