@extends('layouts.master')

@section('title', config('app.name').' - Error')

@section('content')
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Authorization Error (#403)</h3>
        </div>

        <div class="box-body">
            <p>You are not authorized to access this function.</p>

            @if (isset($reason))
                <p>Reason: {{ $reason }}</p>
            @endif
        </div>

        <div class="box-footer">Please contact {!! Html::mailto(env('MAIL_SUPPORT_EMAIL')) !!} if you think this has been a mistake.</div>
    </div>
@stop
