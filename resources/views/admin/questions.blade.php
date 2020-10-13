@extends('layouts.admin')
<br><br><br><br><br>
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Created at</th>

            <th></th>
            </thead>

            @foreach($questions as $q)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$q['question']}}</td>
                    <td>{{$q['answer']}}
                    @if($q['answer']=== null)
                            <form action="{{url('/admin')}}/answer/{{$q['id']}}/reply" method="post">
                                {{csrf_field()}}
                                <input type="text" placeholder="Answer" name="answer" required>

                                <button class="btn btn-link" type="submit">reply</button>
                            </form>
                        @endif
                    </td>
                    <td>{{$q['created_at']}}</td>
                    <td>
                        <a class="btn btn-block btn-danger" href="{{url('/')}}/admin/questions/{{$q['id']}}/delete">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection