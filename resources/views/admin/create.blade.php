@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('validation.admin.creating')}}</div>
                    <div><a href="{{route('admin.index')}}" class="btn btn-primary">{{trans('validation.admin.come_back')}}</a></div>
                    <div class="panel-body">
                        @include('errors')
                        <form action="{{route('admin.save')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group col-sm-12">
                            <label for="name" class="col-sm-2 col-form-label">{{trans('validation.product.name')}}</label>
                            <input type="text" id="name" name="name" class="col-sm-10">
                            </div>

                            <div class="form-group col-sm-12">
                            <label for="description" class="col-sm-2 col-form-label">{{trans('validation.product.description')}}</label>
                            <textarea id="description" name="description" class="col-sm-10"></textarea>
                            </div>

                            <div class="form-group col-sm-12">
                            <label for="price" class="col-sm-2 col-form-label">{{trans('validation.product.price')}}</label>
                            <input type="number" id="price" name="price" class="col-sm-10">
                            </div>

                            <div class="form-group col-sm-12">
                            <label for="manufacturer" class="col-sm-2 col-form-label">{{trans('validation.product.manufacturer')}}</label>
                            <input type="text" name="manufacturer" id="manufacturer" class="col-sm-10">
                            </div>

                            <div class="form-group col-sm-12">
                            <label for="site" class="col-sm-2 col-form-label">{{trans('validation.product.site')}}</label>
                            <input type="text" name="site" id="site" class="col-sm-10">
                            </div>

                            <div class="form-group col-sm-12 text-center">
                            <input type="submit" value="{{trans('validation.admin.create')}}" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
