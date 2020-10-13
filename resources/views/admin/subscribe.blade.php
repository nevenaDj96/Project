@extends('layouts.admin')
<br><br><br><br><br>
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>email</th>
            <th>date</th>
            </thead>

            @foreach($sub as $q)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$q['email']}}</td>
                    <td>{{$q['created_at']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection