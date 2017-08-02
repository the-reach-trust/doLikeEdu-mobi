@extends('layouts.master')

@section('title', config('app.name').' - Error')

@section('content')
    <h3>Not Found Error (#404)</h3>

    <div>
        <p>Page not found</p>

        @if (isset($reason))
            <p>Reason: {{ $reason }}</p>
        @endif
    </div>

    <div>Please contact {!! Html::mailto(env('MAIL_SUPPORT_EMAIL')) !!} if you think this has been a mistake.</div>
@stop
