<li class="@activeif('home')">
	<a href="{{ route('home.index') }}">
		<i class="fa fa-home" aria-hidden="true"></i>Home
	</a>
</li>
<li class="@activeif('quizzes*')">
	<a href="{{ route('quizzes.index') }}">
		<i class="fa fa-book" aria-hidden="true"></i>Quizzes
	</a>
</li>
<li class="@activeif('profile*')">
	<a href="{{ route('profile.index') }}">
		<i class="fa fa-user" aria-hidden="true"></i>Profile
	</a>
</li>
<li class="@activeif('progress*')">
	<a href="{{ route('progress.index') }}">
		<i class="fa fa-tasks" aria-hidden="true"></i>Progress
	</a>
</li>
