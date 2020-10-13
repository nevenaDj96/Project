@extends('layouts.home')
@section('content')

	<div class="gtco-loader"></div>
	<div class="page-inner">
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Welcome to Gally</span>
							<h1>
								Work Hard <br>
								Dream Big <br>
								<br>
								<small>
									<strong>
										<p class="bg-danger">
									@if (isset($errors))
										@if (count($errors) > 0)
												<strong>Whoops!</strong> There were some problems with your input.

										@endif
									@endif

										@if($message=Session::get('fail'))
											{{$message}}
										@endif
										@if($message=Session::get('success'))
											{{$message}}
										@endif
										</p>
									</strong>
								</small>

							</h1>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="signup">Sign up</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">Login</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<form action="{{Route('register')}}" method="post">
												{{csrf_field()}}
												<div class="row form-group">
													<div class="col-md-12">
														<label for="name">Name</label>
														<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
														@if ($errors->has('name'))
															<span class="help-block">
																<strong>{{ $errors->first('name') }}</strong></span>
														@endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Email</label>
														<input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
														@if ($errors->has('username'))
															<span class="help-block">
																<strong>{{ $errors->first('username') }}</strong></span>
														@endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Password</label>
														<input type="password" class="form-control" name="password" id="password">
														@if ($errors->has('password'))
															<span class="help-block">
																<strong>{{ $errors->first('password') }}</strong></span>
														@endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password2">Repeat Password</label>
														<input type="password" class="form-control" name="password2" id="password2">
														@if ($errors->has('password2'))
															<span class="help-block">
																<strong>{{ $errors->first('password2') }}</strong></span>
														@endif
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Sign up">
													</div>
												</div>
											</form>	
										</div>

										<div class="tab-content-inner" data-content="login">
											<form action="{{Route('login')}}" method="post">
												{{csrf_field()}}
												<div class="row form-group">
													<div class="col-md-12">
														<label for="email">Email</label>
														<input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
														@if ($errors->has('email'))
															<span class="help-block">
																<strong>{{ $errors->first('email') }}</strong></span>
														@endif

													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="pass">Password</label>
														<input type="password" class="form-control" name="pass" id="pass">
														@if ($errors->has('pass'))
															<span class="help-block">
																<strong>{{ $errors->first('pass') }}</strong></span>
														@endif
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Login">
													</div>
												</div>
											</form>	
										</div>

									</div>
								</div>
							</div>
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
					<h2>Top Images</h2>
					<p>Our six most liked pictures. Try to be the best!</p>
				</div>
			</div>
			<div class="row">

				@foreach($data['images'] as $image)
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{asset('/')}}images/{{$image->img_name}}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/')}}images/{{$image->img_name}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>{{$image->heading}}</h2>
							<p>{{$image->paragraph}}</p>
							<p><strong>Likes: {{$image->likes}}</strong></p>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>


	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Statistics</h2>
					<p>Numbers do not lie</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Creativity Fuel</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="{{$data['numberofimages']}}" data-speed="3000" data-refresh-interval="50">1</span>
						<span class="counter-label">BEAUTIFULL PHOTOS</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-briefcase"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="{{$data['numberofusers']}}" data-speed="3000" data-refresh-interval="50">1</span>
						<span class="counter-label">HAPPY CLIENTS</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="{{$data['likes']}}" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">lIKES</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>


	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new Images.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline" action="{{Route('subscribe')}}" method="post">
						{{csrf_field()}}
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="subemail" class="sr-only">Email</label>
								<input type="email" class="form-control" id="subemail" name="subemail" placeholder="Your Email">
							</div>

						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection