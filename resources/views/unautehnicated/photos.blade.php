@extends('layouts.home')
@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">


                    <div class="row row-mt-15em">

                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Our industry </h1>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </header>

    <div class="gtco-section border-bottom">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2>Images</h2>
                </div>
            </div>
            <div id="photos">
            <div class="row">


                @foreach($photos as $image)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{url('/image/show/')}}/{{$image['id']}}">
                                <img src="{{asset('/')}}images/{{$image->img_name}}" alt="Image" class="img-responsive galery">
                               <div class="fh5co-text">
                                   <h2>{{$image['heading']}}</h2>

                                <p><strong>Likes: {{$image->likes}}</strong></p>
                                <p><strong>User: {{$image['users']->name}}</strong></p>
                            </div>
                        </a>
                    </div>
                @endforeach
                    <br>
                    <hr>

            </div>
                {{$photos->render()}}
            </div>
        </div>
    </div>
@endsection