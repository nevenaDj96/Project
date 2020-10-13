@extends('layouts.admin')
<br><br><br><br><br>
@section('content')

    <div class="container">
    <table class="table table-bordered">
        <thead>
        <th>id</th>
        <th>img</th>
        <th>user</th>
        <th>heading</th>
        <th>paragraph</th>
        <th></th>
        </thead>

        <tbody>

        @foreach($images as $image)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset('/')}}images/{{$image['img_name']}}" width="300px" height="300px"></td>
                <td>{{$image['users']['name']}}</td>
                <td>{{$image['heading']}}</td>
                <td>{{$image['paragraph']}}</td>
                <td><a class="btn btn-primary" href="{{url('/')}}/admin/image/delete/{{$image['id']}}"> delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
 @endsection