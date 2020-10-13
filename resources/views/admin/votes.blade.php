@extends('layouts.admin')
<br><br><br><br><br>
@section('content')

    <div class="container">
        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>img</th>
            <th>user name</th>
            <th>ocena</th>
            </thead>

            <tbody>

            @foreach($votes as $image)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset('/')}}images/{{$image['images']['img_name']}}" width="300px" height="300px"></td>
                    <td>{{$image['users']['name']}}</td>
                    <td>{{$image['ocena']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection