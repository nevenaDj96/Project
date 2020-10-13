@extends('layouts.admin')
<br><br><br><br><br>
@section('content')
    <div class="container">
<table class="table table-bordered">
    <thead>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>role</th>
    <th>registered at</th>
    <th></th>
    </thead>

    @foreach($users as $user)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['roles']['name']}}</td>
        <td>{{$user['created_at']}}</td>
        <td>
            <a class="btn btn-block btn-danger" href="{{url('/')}}/admin/home/user/{{$user['id']}}/delete">delete</a>
            @if($user['roles']['name'] !== 'admin')
            <a class="btn btn-block btn-info" href="{{url('/')}}/admin/home/user/{{$user['id']}}/role">make admin</a>
            @else
                <a class="btn btn-block btn-default" href="{{url('/')}}/admin/home/user/{{$user['id']}}/role/user">make user</a>
             @endif

        </td>
    </tr>
     @endforeach
</table>
    </div>
@endsection