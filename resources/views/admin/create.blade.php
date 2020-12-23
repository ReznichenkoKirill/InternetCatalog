@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    <div><a href="{{route('admin.index')}}">come back!</a></div>
                    <div class="panel-body">
                        <form action="{{route('admin.save')}}" method="POST">
                            {{csrf_field()}}
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name">
                            <label for="description">description</label>
                            <textarea id="description" name="description"></textarea>
                            <label for="manufacturer">manufacturer</label>
                            <select name="manufacturer_id" id="manufacturer">
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                @endforeach
                            </select>
                            <label for="price">price</label>
                            <input type="number" id="price" name="price">
                            <label for="site">site</label>
                            <select name="site_id" id="site">
                                @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
