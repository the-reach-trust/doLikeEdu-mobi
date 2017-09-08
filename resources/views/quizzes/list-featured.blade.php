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
				</h2>
				<p>{{ $challenge->points_max }} Points</p>
			</div>
		</a>
	</td>
	<td class="text-center" width="72">
		@if( $challenge->remaining_attempts == 0 ) <i class="fa fa-check-circle" aria-hidden="true"></i>
		@else &nbsp; @endif
	</td>
</tr>