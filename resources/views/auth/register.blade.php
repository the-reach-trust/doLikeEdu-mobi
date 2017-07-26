@extends('layouts.master')

@section('title', config('app.name').' - register')

@section('content')
    <div class="box-body">
        {{ Form::open([
            'method' => 'POST',
            'route' => ['auth.register']
        ]) }}

        @include('partials.forms.auth-register')

        {{ Form::submit('Register', array('class' => 'btn')) }}

        {{ Form::close() }}
    </div>
    <a href="/terms">Terms</a>
@stop