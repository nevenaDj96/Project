
	@extends('layouts.home')

	@section('content')
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_4.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						<div class="row row-mt-15em">

							<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
								<span class="intro-text-small">Don't be shy</span>
								<h1>Get In Touch</h1>
							</div>

						</div>

					</div>
				</div>
			</div>
		</header>
	<div class="gtco-section border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 animate-box">
					<h3>Get In Touch</h3>
					<form action="{{Route('contact')}}" onsubmit="return proveracontact()" method="post" name="contactform">
						{{csrf_field()}}
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="name">Name</label>
								<input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Your firstname">
								@if ($errors->has('name'))
									<span class="help-block bg-danger">
									<strong>{{ $errors->first('name') }}</strong></span>
								@endif
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Your email address">
								@if ($errors->has('email'))
									<span class="help-block bg-danger">
									<strong>{{ $errors->first('email') }}</strong></span>
								@endif
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="subject">Subject</label>
								<input type="text" id="subject" name="subject" class="form-control" value="{{old('subject')}}" placeholder="Your subject of this message">
								@if ($errors->has('subject'))
									<span class="help-block bg-danger">
									<strong>{{ $errors->first('subject') }}</strong></span>
								@endif
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something">{{old('message')}}</textarea>
								@if ($errors->has('message'))
									<span class="help-block bg-danger">
									<strong>{{ $errors->first('message') }}</strong></span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary">
						</div>

					</form>
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					<div class="gtco-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">350 West 17th Street, <br> New Jersy </li>
							<li class="phone"><a href="tel://1234567920">+ 1234 567 89</a></li>
							<li class="email"><a href="mailto:example@gally.com">example@gally.com</a></li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection
