@extends('layouts.master')

@section('title', config('app.name').' - Help')

@section('content')

	<div id="page">
		<div class="inner">
			<div class="space"></div>
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

					<div class="{{ get_body_class( Request::route(), true ) }}">
					
						<div class="list earn-points">
							<a href="{{ route('help.about') }}">
								<span class="h2">The Basics</span>
							</a>

							<a href="{{ route('help.accounts') }}">
								<span class="h2">User Accounts</span>
							</a>

							<a href="{{ route('help.terms') }}">
								<span class="h2">Terms &amp; Conditions</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="space-12"></div>
		</div>
	</div>
@stop