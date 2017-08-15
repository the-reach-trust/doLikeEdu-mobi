@extends('layouts.master')

@section('title', config('app.name').' - Terms')

@section('content')

<div class="container">
	<div class="row">
		<div class="{{ get_body_class() }}">
			<h2>The Basics</h2>
			<h4>What is DoLikeEdu?</h4>
			Learning has never been more fun! DoLikeEdu helps you ace your schoolwork.
			DoLikeEdu is a mobile learning solution that helps Namibian high school learners improve their academic performance, strengthen their social skills and foster good learning behaviour.
			<h4>How can DoLikeEdu help me?</h4>
			DoLikeEdu is modelled on schools of excellence. Namibian learners have access to:
			<ul>
				<li>A Content library of FREE curriculum-aligned content that is structured around subjects and topics for Grade 11 and 12</li>
				<li>Daily quizzes that help you with your schoolwork</li>
				<li>An Advice section that helps you deal with a wide variety of everyday issues, exam stress, time management, career guidance as well as a directory of national support services and online tools</li>
			</ul>
			<h4>How do I use the app?</h4>
			DoLikeEdu is fun and easy to use. All you have to do to access the content and features is to sign up is submit your contact number and create a password. Once you are registered you can easily move between sections Daily Quizzes, Quiz Store and Advice section.
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
