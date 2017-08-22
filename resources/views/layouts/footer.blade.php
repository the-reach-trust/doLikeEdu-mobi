<footer id="footer-wrapper" @if( config( 'front.progressiveDesktop' ) ) class="sticky" @endif>
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">
				<nav class="text-center">
					<ul>
						<li class="@activeif('home*')">
							<a href="{{ route('home.index') }}">Home</a>
						</li>
						<li class="@activeif('profile*')">
							<a href="{{ route('profile.index') }}">Profile</a>
						</li>
						<li class="@activeif('help*')">
							<a href="{{ route('help.index') }}">Help &amp; Terms</a>
						</li>
						<li>
							<a href="{{ route('pages.index') }}">TalkToEdu</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>