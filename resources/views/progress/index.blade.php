@extends('layouts.master')

@section('title', config('app.name').' - Progress')

@section('content')

	<div id="page" class="bg-pattern">
		<div class="inner">
			<div class="space"></div>
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

					<div class="{{ get_body_class( Request::route(), true ) }}">

						<ul class="list progress-list">
							@foreach ($categories as $category)
								@include( 'progress.list-progress' )
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<span class="space-9"></span>
		</div>		
	</div>
@stop