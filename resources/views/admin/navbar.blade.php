@extends('layouts.admin')
<br><br><br><br><br>
@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form action="{{route('nav.store')}}" method="post">
                    {{ csrf_field() }}

                    <div class="panel-heading"><h2>Navigation</h2></div>
                    <div class="panel-body">
                        <div class="form-group">

                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" required>

                            <label for="url">url</label>
                            <input type="text" class="form-control" name="url" required>

                            <br>
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>url</th>
            <th>name</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($nav as $i  )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$i['url']}}</td>
                    <td>{{$i['name']}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/')}}/admin/nav/delete/{{$i['id']}}"> delete</a>
                        <a class="btn btn-info" href="{{url('/')}}/admin/nav/edit/{{$i['id']}}"> edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection