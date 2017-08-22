<nav class="navbar navbar-default">
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class( Request::route() ) }}">
				<ul class="nav navbar-nav">
					@include( 'layouts.nav-items' )
				</ul>
			</div>
		</div>
	</div>
</nav>