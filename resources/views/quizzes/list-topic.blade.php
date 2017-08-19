<li>
	<a class="no-decorate" title="" href="{{ 'quizzes.topic', [$category_id,$topic->topic] ) }}">
		<figure>									
			<img src="https://via.placeholder.com/180/ffffff/000000?text=Category+Image" alt="{{ $category->name}}">	
		</figure>
		<span>{{ $topic->name }} ({{ $topic->amount }})</span>
	</a>
</li>