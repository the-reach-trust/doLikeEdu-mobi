<div>
	<img src="https://via.placeholder.com/100x50">
	<br/>
	<a href="{{ route('home.index') }}" class="@activeif('home')">Home</a> |
	<a href="{{ route('quizzes.index') }}" class="@activeif('quizzes')">Quizzes</a> |
	<a href="{{ route('profile.index') }}" class="@activeif('profile')">Profile</a> |
	<a href="{{ route('progress.index') }}" class="@activeif('progress')">Progress</a>
</div>