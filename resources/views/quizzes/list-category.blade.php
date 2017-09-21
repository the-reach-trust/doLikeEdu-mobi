<li class="{{ ( is_category_page( $category->category ) ) ? 'active' : '' }}">
	<a class="no-decorate" title="" href="{{ route('quizzes.category', $category->category) }}">
		<figure>									
			<img src="/images/ic-{{ str_replace(' ', '_', strtolower($category->name)) }}.svg" alt="{{ $category->name }}">	
		</figure>
		<span>{{ $category->name }}</span>
	</a>
</li>