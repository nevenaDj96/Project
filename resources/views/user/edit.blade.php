@extends('layouts.home')
@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="row row-mt-15em">

                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Here you can edit your post, Dear</span>
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

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
            <h2>Share your photos</h2>
            <div class="row form-group">
                <div class="col-md-12">
                    <p>curently image</p>
                    <img src="{{asset('/')}}images/{{$podaci[0]['img_name']}}" alt="">
                </div>
            </div>
            <form action="{{Route('user.update')}}" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="heading" id="heading" value="{{$podaci[0]['heading']}}">
                        @if ($errors->has('heading'))
                            <span class="help-block">
									<strong>{{ $errors->first('heading') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="paragraph">Paragraph</label>
                        <input type="text" class="form-control" name="paragraph" id="paragraph" value="{{$podaci[0]['paragraph']}}">
                        @if ($errors->has('paragraph'))
                            <span class="help-block">
									<strong>{{ $errors->first('paragraph') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-block btn-primary" value="{{$podaci[0]['id']}}" name="id"> upload </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection