@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
    <h3><a href="{{ route('auth.logout') }}">logout</a></h3>
@stop