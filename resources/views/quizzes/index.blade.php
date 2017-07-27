@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	@foreach ($categories as $category)
		<div>
			{{ print_r($category) }}
		</div>
	@endforeach

	@foreach ($challenges_featured as $featchal)
		{{ print_r($featchal) }}
	@endforeach
@stop