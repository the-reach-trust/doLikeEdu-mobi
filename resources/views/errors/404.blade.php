@extends('layouts.master')

@section('title', config('app.name').' - Page Not Found')

@section('content')
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Page Not Found Error (#404)</h3>
        </div>

        <div class="box-body">
            <p>Page not found</p>

            @if(!empty($exception->getMessage()))
                <p>Reason: {{ $exception->getMessage() }}</p>
            @endif
        </div>

        <div class="box-footer">Please contact {!! Html::mailto(env('MAIL_SUPPORT_EMAIL')) !!} if you think this has been a mistake.</div>
    </div>
@stop