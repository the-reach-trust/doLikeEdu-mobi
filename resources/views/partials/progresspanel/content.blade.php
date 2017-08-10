<h1>{{ $dailys_complete ? 'Well done, ' : 'Hello' }} {{ 'name_here' }}</h1>
@if($dailys_complete)
	<p>You finished all of today's featured quizzes. Nice work!</p>
@else
	<p>You're flying through the list!</p>
@endif
<div class="row">
	<div class="col-xs-4"><h3>{{ '1' }}</h3></div>
	<div class="col-xs-4"><h3>{{ '1' }}</h3></div>
	<div class="col-xs-4"><h3>{{ '100' }}</h3></div>
</div>
<div class="row">
	<div class="col-xs-4"><h5>QUIZ</h5></div>
	<div class="col-xs-4"><h5>POINTS</h5></div>
	<div class="col-xs-4"><h5>LEVEL</h5></div>
</div>