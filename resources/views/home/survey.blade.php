@extends('layouts.master')

@section('title', config('app.name').' - Help')

@section('content')
<style type="text/css">
.iframe-container {
    position: relative;
    padding-bottom: 86%;
    height: 0;
}
.iframe-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
	<div id="page">
		<div class="inner">
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

					<div class="{{ get_body_class( Request::route(), true ) }}">
						<div class="iframe-container">
							<iframe src="https://docs.google.com/forms/d/e/{{ getenv('GOOGLE_SURVEY_ID') }}/viewform?embedded=true">Loading...</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
