@extends('layouts.admin')
<br><br><br><br><br>
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>subject</th>
            <th>message</th>
            <th>date</th>
            <th></th>
            </thead>

            @foreach($contact as $c)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$c['name']}}</td>
                    <td>{{$c['email']}}</td>
                    <td>{{$c['subject']}}</td>
                    <td>{{$c['message']}}</td>
                    <td>{{$c['created_at']}}</td>
                    <td>
                        <a class="btn btn-block btn-info" href="mailto:{{$c['email']}}">answer</a>
                        <a class="btn btn-block btn-danger" href="{{url('/')}}/admin/contact/{{$c['id']}}/delete">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection