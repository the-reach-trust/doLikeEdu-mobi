<li>
	<a class="no-decorate" title="" href="{{ route('quizzes.category', $category->category) }}">
		<figure>									
			<img src="/images/ic-{{ strtolower($category->name) }}.svg" alt="{{ $category->name }}">	
		</figure>
		<span>{{ $category->name }}</span>
	</a>
</li>