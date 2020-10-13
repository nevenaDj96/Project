@extends('layouts.home')
@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="row row-mt-15em">

                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Welcome</span>
                            @php
                            $session=session()->get('user');
                            @endphp
                            <h1>{{$session[0]['name']}} </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
      <center>
          <h3>
              @if(session('fail'))

                  <div class="alert alert-danger">
                      {{session('fail')}}
                  </div>

              @endif
              @if(session('success'))

                  <div class="alert alert-success">
                      {{session('success')}}
                  </div>

              @endif
          </h3>
      </center>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
            <h2>Share your photos</h2>
            <form action="{{Route('user.upload')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="image">Upload new image</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{old('image')}}">
                        @if ($errors->has('image'))
                            <span class="help-block">
									<strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="heading">Heading</label>
                        <input type="text" class="form-control" name="heading" id="heading" value="{{old('heading')}}">
                        @if ($errors->has('heading'))
                            <span class="help-block">
									<strong>{{ $errors->first('heading') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="paragraph">Paragraph</label>
                        <input type="text" class="form-control" name="paragraph" id="paragraph" value="{{old('paragraph')}}">
                        @if ($errors->has('paragraph'))
                            <span class="help-block">
									<strong>{{ $errors->first('paragraph') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">

                        <input type="submit" class="btn btn-block btn-primary" value="upload">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Heading</th>
                <th scope="col">Paragraph</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $img)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td><img src="{{asset('')}}images/{{$img['img_name']}}" width="300px" height="300px" alt=""></td>
                <td>{{$img['heading']}}</td>
                <td>{{$img['paragraph']}}</td>
                <td>
                    <a href="{{url('/user/image/edit')}}/{{$img['id']}}"  class="btn btn-default btn-block" > edit </a>
                    <br>
                    <a href="{{url('/user/image/delete')}}/{{$img['id']}}"  class="btn btn-primary btn-block"> delete </a>

                </td>
            </tr>
             @endforeach

            </tbody>
        </table>

    </div>


@endsection