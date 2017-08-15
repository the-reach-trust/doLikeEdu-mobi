@extends('layouts.master')

@section('title', config('app.name').' - User Accounts')

@section('content')

<div class="container">
	<div class="row">
		<div class="{{ get_body_class() }}">
			<h2>User Accounts</h2>
			<h4>How do I sign up to DoLikeEdu?</h4>
			DoLikeEdu is available as a mobi site and you can access it online at <a href="http://www.dolikeedu.mobi">www.dolikeedu.mobi</a>. 
			<h4>What information can I add and/or edit in my DoLikeEdu profile?</h4>
			In Settings you can access your DoLikeEdu profile. From the menu options in this section you can select <i>Edit my Profile</i> to edit your: Grade and School.
			To choose / edit your school, simply type in the name of your school and we will provide you with options from a database of listed schools from the Ministry of Education, Arts and Culture in Namibia.
		</div>
	</div>
</div>

@stop
