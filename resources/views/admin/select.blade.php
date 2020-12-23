@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <form action="{{route('admin.save')}}" method="POST">
                        {{csrf_field()}}
{{--                        {{method_field('')}}--}}
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                        <label for="description"></label>
                        <textarea type="text" id="description" name="description"></textarea>
                        <select name="manufacturer_id">
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                <!-- TODO get manufacturers -->
                            @endforeach
                        </select>
                        <label for="price"></label>
                        <input type="text" id="price" name="price">
                        <select name="site_id">
                        @foreach($sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                        <!-- TODO get sites -->
                        @endforeach
                        </select>
                        <input type="submit" value="SAVE">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
