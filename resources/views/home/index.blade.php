@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
    WELCOME NAME HERE

    {{ print_r($content) }}
@stop