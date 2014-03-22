@extends('betaup::beta.betaup')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            {{ Form::open(array('url' => \Config::get('betaup::config.uri'), 'class'=>'form-signin')) }}

            <h2 class="form-signin-heading">Sign Up</h2>

            <ul class="errors">
                @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
                @endforeach
            </ul>

            @if($refer_code = Route::input('refer_code'))
            {{ Form::hidden('referer', $refer_code) }}
            @endif

            {{Form::label('email', 'Description', array('class'=>'sr-only'))}}
            {{Form::email('email','', array('placeholder' => 'Email address', 'class' => 'form-control' ))}}
            {{Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block'))}}

            {{Form::close()}}

        </div>
    </div>
    @if(\Config::get('betaup::config.social_icons') === 'true')
    <div class="row">            
        <div id="social-icons" class="text-center">
            <a class="twitter" href="{{{ \Config::get('betaup::config.twitter_profile') }}}"><span class="fa fa-twitter"></span></a>
            <a class="facebook" href="{{{ \Config::get('betaup::config.facebook_profile') }}}"><span class="fa fa-facebook"></span></a>
        </div>
    </div>
    @endif
</div><!-- /container -->
@stop
