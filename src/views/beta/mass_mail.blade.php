@extends('betaup::beta.betaup')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 text-center">
            <!-- Short introductory (optional) -->
            <h3 class="tagline">
                Mass-Mail allows lets you contact all subscribed user with a single form.<br>
                You can choose between active and inactive users, based on their activation status.
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 text-center">

            {{ Form::open(array('url' => \Config::get('betaup::config.uri').'/massmail', 'class'=>'form-signin')); }}

            <h2 class="form-signin-heading">Mass mail</h2>

            <ul class="errors">
                @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
                @endforeach
            </ul>

            <label class="checkbox-inline">
                {{ Form::checkbox('active', '1', false) }} Activated
            </label>
            <label class="checkbox-inline">
                 {{ Form::checkbox('inactive', '1', false) }} Inactive
            </label>

            {{Form::label('subject', 'Subject', array('class'=>'sr-only'))}}
            {{Form::text('subject', '', array('placeholder' => 'Subject', 'class' => 'form-control' ))}}

            {{Form::label('email_message', 'Message', array('class'=>'sr-only'))}}
            {{Form::textarea('email_message', '', array('placeholder' => 'Message', 'class' => 'form-control' ))}}

            {{Form::submit('Send', array('class' => 'btn btn-lg btn-primary btn-block'))}}

            {{Form::close();}}
        </div> 
    </div> 
</div> <!-- /container -->
@stop
