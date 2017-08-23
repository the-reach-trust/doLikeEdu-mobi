<li>
	<a class="no-decorate" title="" href="{{ route('quizzes.category', $category->category) }}">
		<figure>									
			<img src="/images/ic-science.svg" alt="{{ $category->name}}">	
		</figure>
		<span>{{ $category->name }} ({{ $category->amount }})</span>
	</a>
</li>