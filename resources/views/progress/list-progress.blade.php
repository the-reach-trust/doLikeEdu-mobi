@php $progress = ($category->completed/$category->amount)*100 @endphp
<li>
	<img src="/images/ic-{{ str_replace(' ', '_', strtolower($category->name)) }}.svg" alt="{{ $category->name }}">
	<h2>
		<a class="no-decorate theme-primary" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a>
	</h2>
	<p>{{ $category->amount }} Quizzes</p>
	<figure class="pie-wrapper pie-wrapper--solid progress-{{ intval( $progress ) }}"></figure>
</li>
