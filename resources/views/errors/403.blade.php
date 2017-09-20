@extends('layouts.master')

@section('title', config('app.name').' - Error')

@section('content')
<div id="page">
    <div class="inner">
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 text-center">
                    @include( 'partials.progresspanel.lg' )

                    <div class="{{ get_body_class( Request::route(), true ) }}">

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
                        <span class="space"></span>

                        <a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg" role="button">Join DoLikeEdu</a>

                        <span class="space-2"></span>

                        <p class="mb-0">Have an account?</p>
                        <a href="{{ route('auth.login') }}" class="no-decorate body-text">Click here to login</a>
                        <br>
                    </div>
                </div>
                <div class="space-12"></div>
            </div>
        </div>
    </div>
</div>
@stop

