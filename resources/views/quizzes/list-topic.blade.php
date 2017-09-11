<li class="{{ ( is_topic_page( $topic->topic ) ) ? 'active' : '' }}">
	<a class="no-decorate" title="" href="{{ route('quizzes.topic', [$category_id,$topic->topic]) }}">
		<span>{{ $topic->name }}</span>
	</a>
</li>