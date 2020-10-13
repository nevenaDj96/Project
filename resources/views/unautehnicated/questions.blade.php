

@extends('layouts.home')
@section('content')
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_6.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">See Our Answers</span>
							<h1>Ask for everything!</h1>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>


	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Frequently Ask Questions</h2>
					<form action="{{Route('question')}}" method="post">
						{{csrf_field()}}

						<div class="row form-group">
							<div class="col-md-12">
								<label for="quesiton">Dou you have any question?</label>
								<input type="text" class="form-control" name="quesiton" id="quesiton" value="{{old('quesiton')}}">
								@if ($errors->has('quesiton'))
									<span class="help-block">
									<strong>{{ $errors->first('quesiton') }}</strong></span>
								@endif
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">

								<input type="submit" class="form-control" value="ask">

							</div>
						</div>
					</form>

				</div>
			</div>
			<div id="questions" class="row">
				<div class="col-md-8 col-md-offset-2">
					<ul class="fh5co-faq-list">
						@foreach($questions as $q)
						<li>
							<h2>{{$q->question}}</h2>
							<p>{{$q->answer}}</p>
						</li>
						@endforeach

					</ul>
					{{$questions->render()}}
				</div>
			</div>
		</div>

	</div>
@endsection