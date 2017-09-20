@php $progress = ($category->completed/$category->amount)*100 @endphp
<li>
	<img src="/images/ic-{{ str_replace(' ', '_', strtolower($category->name)) }}.svg" alt="{{ $category->name }}">
	<h2>
		<a class="no-decorate theme-primary" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a>
	</h2>
	<p>{{ $category->amount }} Quizzes</p>
	<div class="progress">
		<div class="progress-bar" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%;">
		</div>
	</div>
</li>
