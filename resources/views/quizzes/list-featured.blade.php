<tr>
	<td>
		<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">
			<figure>
				<img src="{{ !empty($pages[$challenge->content_page]->logo) ? $pages[$challenge->content_page]->logo : $pages[$challenge->content_page]->coverimage }}" class="img-responsive">
			</figure>
		</a>
	</td>
	<td>
		<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">
			<div>
				<h2>
					<span class="theme-primary">{{ $pages[$challenge->content_page]->heading }}</span>
					<small class="theme-body-text">({{ $challenge->remaining_attempts }})</small>
				</h2>
				<p>{{ $challenge->points_max }} Points</p>
			</div>
		</a>
	</td>
	<td>
		@if( rand(0,1) ) <i class="fa fa-check-circle" aria-hidden="true"></i>
		@else &nbsp; @endif
	</td>
</tr>