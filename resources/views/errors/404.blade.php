@extends('layouts.master')

@section('title', config('app.name').' - Page Not Found')

@section('content')
<div id="page">
    <div class="inner">
        <div class="space"></div>
        <div class="container">
            <div class="row">

                @include( 'partials.progresspanel.lg' )

                <div class="{{ get_body_class( Request::route(), true ) }}">

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
                    <div class="space-12"></div>
                    <div class="box-footer">Go back <a href="/">Home</a></div>
                </div>
            </div>
            <div class="space-12"></div>
        </div>
    </div>
</div>
@stop
