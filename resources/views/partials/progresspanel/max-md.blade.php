<div id="idprogresspanel" @if( config( 'front.progressiveDesktop' ) ) class="hidden-lg" @endif>
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">
				<div class="text-center">
					@include( 'partials.progresspanel.content' )
				</div>
			</div>
		</div>
	</div>
</div>