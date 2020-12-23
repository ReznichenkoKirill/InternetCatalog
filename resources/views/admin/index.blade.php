@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    <div><a href="{{route('admin.getEmptyProduct')}}">create new!</a></div>
                    <div class="panel-body">
                        Your Application's Landing Page.
                        @if(count($products)>0)
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Manufacturer</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->manufacturer['name']}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            <form action="{{route('admin.getProduct', $product->id)}}" method="GET">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$product->id}}">
                                                <input type="submit" value="Change">
                                            </form>
                                        </td>
                                        <td>
                                            <!-- TODO make validation if admin id === product id, admin can delete this product -->
                                            <form action="{{route('admin.delete', $product->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$product->id}}">
                                                <input type="hidden" name="owner_id" value="{{$product->owner_id}}">
                                                <input type="submit" value="delete">
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
