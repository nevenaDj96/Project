
@extends('layouts.home')

@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_4.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="row row-mt-15em">

                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Nevena Đaković</h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="gtco-section border-bottom">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-6">

                    <div class="col-md-5 col-md-push-1 animate-box">
                        <div class="gtco-contact-info">
                            <h3>Contact Information</h3>
                            <ul>
                                <li class="address"> Belgrade </li>
                                <li class="email">example@gally.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="animate-box">

                  

                              <img src="{{asset('/')}}images/nevena.jpg" width="300px" height="350px" alt="Nevena" title="Nevena">
                        <br><br>
                        <p>

                                    Živim u Obrenovcu, rođena sam u Beogradu.<br>

                                    Išla sam u srednju Ekonomsku školu, a sada sam student „Visoke ICT škole“.<br>

                                    U slobodno vreme bavim se plivanjem, koje sam i jako dugo trenirala i takmičila se.<br>

                                    Takođe, u slobodno vreme volim da čitam, pišem i družim se.<br>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
