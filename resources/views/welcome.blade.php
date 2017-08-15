@extends('layouts.master')

@section('title', config('app.name').' - Welcome')

@section('content')
	<div class="container">
		<div class="row">			
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 text-center">
				<span class="space-3"></span>
					<div id="affiliates" class="max-width-350">
						<div>
							<img src="/images/logo-namibia.png" class="img-responsive" />
						</div>
						<div></div>
						<div>
							<img src="/images/logo-unicef.png" class="img-responsive" />
						</div>
					</div>
				<figure>
					<span class="space-7"></span>
					<img src="/images/badge-main-transparent-large.png" width="160">
					<span class="space-1"></span>
				</figure>

				<h1>Welcome</h1>
				<p>Pratice makes perfect.</p>
				<span class="space"></span>

				<a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg" role="button">Join DoLikeEdu</a>

				<span class="space-2"></span>

				<p class="mb-0">Have an account?</p>
				<a href="{{ route('auth.login') }}" class="no-decorate body-text">Click here to login</a>
				<br>
			</div>
		</div>
	</div>	
@stop
