<h1>{{ $dailys_complete ? 'Well done, ' : 'Hello' }} {{ 'name_here' }}</h1>
@if($dailys_complete)
	<p>You finished all of today's featured quizzes. Nice work!</p>
@else
	<p>You're flying through the list!</p>
@endif
<div class="row">
	<div class="col-xs-4"><p class="h1">{{ '1' }}</p></div>
	<div class="col-xs-4"><p class="h1">{{ $points->level }}</p></div>
	<div class="col-xs-4"><p class="h1">{{ $points->points }}</p></div>
</div>
<div class="row">
	<div class="col-xs-4"><h5>QUIZZES</h5></div>
	<div class="col-xs-4"><h5>POINTS</h5></div>
	<div class="col-xs-4"><h5>LEVEL</h5></div>
</div>