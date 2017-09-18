@extends('layouts.master')

@section('title', config('app.name').' - Report a Problem')

@section('content')

<div id="page">
	<div class="inner">
		<div class="space"></div>
		<div class="container">
			<div class="row">

				@include( 'partials.progresspanel.lg' )

				<div class="{{ get_body_class( Request::route(), true ) }}">
					<h2>Report a Problem</h2>
					<p>
						Should you have any queries please contact our support team on:
					</p>
					<p>
						<a href="mailto:dolikeedu@thereachtrust.org">
							dolikeedu@thereachtrust.org
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="space-12"></div>
	</div>
</div>

@stop