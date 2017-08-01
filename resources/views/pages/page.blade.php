@extends('layouts.master')

@section('title', config('app.name').' - Page')

@section('content')
    <a class="" title="" href="{{ route('home.index') }}">Back to DoLikeEdu</a>
    <h2> {{$page->heading}} </h2>

    @if(!empty($page->content))
        <div>
            {{ $page->content }}
        </div>
    @endif


    @if(!empty($page->child))
        <h3>Child pages</h3>
        @foreach ($page->child as $child)
            <img src="{{ !empty($child->logo) ? $child->logo : '' }}">
            <a class="" title="" href="{{ route('pages.page', $child->id) }}">{{ $child->heading }}</a><br/>
        @endforeach
    @endif

    <!--
    {{ print_r($page) }}
    -->
@stop