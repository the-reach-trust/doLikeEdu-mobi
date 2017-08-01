<div id="branding">
	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }}">
				<img src="https://via.placeholder.com/100x50">
				<span><strong>DoLike</strong>Edu</span>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }}">
				<ul class="nav navbar-nav">
					<li class="@activeif('home')">
						<a href="{{ route('home.index') }}">Home</a>
					</li>
					<li class="@activeif('quizzes')">
						<a href="{{ route('quizzes.index') }}">Quizzes</a>
					</li>
					<li class="@activeif('profile')">
						<a href="{{ route('profile.index') }}">Profile</a>
					</li>
					<li class="@activeif('progress')">
						<a href="{{ route('progress.index') }}">Progress</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>