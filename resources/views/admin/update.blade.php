@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('validation.admin.edition')}}</div>
                    <div><a href="{{route('admin.index')}}" class="btn btn-primary">{{trans('validation.admin.come_back')}}</a></div>
                    <div class="panel-body">
                        @include('errors')
                        <div class="text-center"><h4>{{trans('validation.product.id')}} {{$product->id}}</h4></div>
                        <form action="{{route('admin.saveChange')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                                <input type="hidden" name="id" value="{{$product->id}}" class="col-sm-2 col-form-label">
							<div class="form-group col-sm-12">
							<label for="name" class="col-sm-2 col-form-label">{{trans('validation.product.name')}}</label>
								<input type="text" id="name" name="name" class="col-sm-10" value="{{$product->name}}">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="description" class="col-sm-2 col-form-label">{{trans('validation.product.description')}}</label>
								<textarea id="description" name="description" class="col-sm-10">{{$product->description}}</textarea>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="manufacturer" class="col-sm-2 col-form-label">{{trans('validation.product.manufacturer')}}</label>
                                <input type="text" name="manufacturer" id="manufacturer" class="col-sm-10" value="{{$product->manufacturer->name}}">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="price" class="col-sm-2 col-form-label">{{trans('validation.product.price')}}</label>
                                <input type="number" id="price" name="price" class="col-sm-10" value="{{$product->price}}">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="site"
                                       class="col-sm-2 col-form-label">{{trans('validation.product.site')}}</label>
                                <input type="text" name="site" id="site" class="col-sm-10" value="{{$product->site->name}}">
                            </div>

                            <div class="form-group col-sm-12 text-center">
                                <input type="submit" value="{{trans('validation.admin.save')}}" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection