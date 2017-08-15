@extends('layouts.master')

@section('title', config('app.name').' - Progress')

@section('content')
	<div class="bg-pattern header-displacement">
		<span class="space"></span>
		<div class="container">
			<div class="row">
				<div class="{{ get_body_class() }}">
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
@stop