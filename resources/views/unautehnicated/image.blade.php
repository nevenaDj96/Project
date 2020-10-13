@extends('layouts.home')
@section('content')
    <header id="gtco-header" role="banner" style="background-image: url({{asset('/images')}}/{{$podaci[0]['img_name']}})">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="row row-mt-15em">
                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <script>var brojlajkova="{{$podaci[0]['likes']}}";</script>
                            <h1>Likes:
                                <span id="numberoflikes">
                                    <script>
                                        document.write(brojlajkova);
                                    </script>
                                </span>

                                <span id="imglikes">
                                    @isset($like)
                                @if($like==0)
                                    <button class="btn btn-default" onclick="like()">Like </button>
                                @else
                                    <button class="btn btn-default" onclick="unlike()">Unlike</button>
                                @endif

                                        @endisset
                                </span>
                                <br>
                                Rating:

                                <span id="rating">
                                     @isset($rez)
                                        {{$rez}}
                                     @else
                                             none
                                     @endisset
                                </span>

                            </h1>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </header>
    <br><br><br>

    <div class="container text-center">
<table class="table">
    <tbody>

        <td>

            <form action="" id="anketa">
                <input type="hidden" value="{{$podaci[0]['id']}}" id="img_id">
            <div class="radio radio-primary">
                <input type="radio" name="radio1" id="radio1" value="1">
                <label for="radio1">
                    1
                </label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" name="radio1" id="radio2" value="2">
                <label for="radio2">
                    2
                </label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" name="radio1" id="radio2" value="3">
                <label for="radio2">
                    3
                </label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" name="radio1" id="radio2" value="4">
                <label for="radio2">
                    4
                </label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" name="radio1" id="radio2" value="5">
                <label for="radio2">
                    5
                </label>
            </div>
              @if(session()->has('user'))
                    <input type="button" class="btn btn-default" onclick="anketa()" value="vote!">
                  @else <p>You need to login first</p>
                  @endif
            </form>

        </td>
         <td>
             <br>
          <h4> {{$podaci[0]['heading']}}</h4>
             <br>
           <h5>{{$podaci[0]['paragraph']}}</h5>
         </td>

    </tbody>
</table>


    </div>
@endsection