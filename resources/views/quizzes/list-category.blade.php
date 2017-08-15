<li>
	<a class="no-decorate" title="" href="{{ route('quizzes.category', $category->category) }}">
		<figure>									
			<img src="https://via.placeholder.com/180/ffffff/000000?text=Category+Image" alt="{{ $category->name}}">	
		</figure>
		<span>{{ $category->name }} ({{ $category->amount }})</span>
	</a>
</li>