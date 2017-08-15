@extends('layouts.master')

@section('title', config('app.name').' - Help')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">
				<div class="list earn-points">
					<a href="{{ route('help.about') }}">
						<span class="h2">The Basics</span>
					</a>

					<a href="{{ route('help.terms') }}">
						<span class="h2">Terms</span>
					</a>
				</div>
			</div>
		</div>
	</div>
@stop