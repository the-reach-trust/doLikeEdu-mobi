@if( config( 'front.progressiveDesktop' ) && Session::has( 'levelup_authentication' ) ) 
	<div id="idprogresspanel-alt" class="visible-lg">	
		<div class="text-center">
			@include( 'partials.progresspanel.content' )
		</div>
		<ul>
			@include( 'layouts.nav-items' )
			<li class="@activeif('help*')">
				<a href="{{ route('help.index') }}">
					<i class="fa fa-info" aria-hidden="true"></i>Help &amp; Terms</a>
				</li>
			</li>
			<li>
				<a href="{{ route('pages.index') }}">
					<i class="fa fa-bullhorn" aria-hidden="true"></i>TalkToEdu
				</a>
			</li>
		</ul>
	</div>
@endif