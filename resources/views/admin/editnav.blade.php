@extends('layouts.admin')
@section('content')
    <br>   <br>   <br>   <br>   <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">

            <form action="{{Route('nav.update')}}" method="post">
                {{csrf_field()}}

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url" id="url" value="{{$nav[0]['url']}}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$nav[0]['name']}}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-block btn-primary" value="{{$nav[0]['id']}}" name="id"> update </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection