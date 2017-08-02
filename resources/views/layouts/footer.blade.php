<span class="space"></span>
<footer id="footer-wrapper">
	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }}">
				<nav class="text-center">
					<ul>
						<li class="@activeif('home')">
							<a href="{{ route('home.index') }}">Home</a>
						</li>
						<li class="@activeif('profile')">
							<a href="{{ route('profile.index') }}">Profile</a>
						</li>
						<li class="@activeif('terms')">
							<a href="/terms">Help & Terms</a>
						</li>
						<li>
							<a href="#">TalkToEdu</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>