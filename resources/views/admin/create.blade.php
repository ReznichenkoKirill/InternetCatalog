@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    <div><a href="{{route('admin.index')}}">come back!</a></div>
                    <div class="panel-body">
                        @include('errors')
                        <form action="{{route('admin.save')}}" method="POST">
                            {{csrf_field()}}
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name">
                            <label for="description">description</label>
                            <textarea id="description" name="description"></textarea>

                            <label for="price">price</label>
                            <input type="number" id="price" name="price">
{{--                            ADD new--}}
                            <label for="manufacturer">manufacturer</label>
                            <input type="text" name="manufacturer" id="manufacturer">
                            <label for="site">site</label>
                            <input type="text" name="site" id="site">

                            <input type="submit" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
