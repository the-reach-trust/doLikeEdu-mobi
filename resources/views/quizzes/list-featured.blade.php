<tr>
	<td>
		<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">
			<figure>
				@if(isset($counter) && $counter == true)
					<figcaption>
						{{ $loop->iteration }}
					</figcaption>
				@endif
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
				<p>{{ $challenge->points_max }} Points @if($challenge->type == ChallengeType::FEATURED) <span class="btn btn-danger btn-xs"> FEATURED </span> @endif </p>
			</div>
		</a>
	</td>
	<td class="text-center" width="72">
		@if( $challenge->remaining_attempts == 0 ) <i class="fa fa-check-circle" aria-hidden="true"></i>
		@else &nbsp; @endif
	</td>
</tr>