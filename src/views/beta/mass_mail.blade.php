@extends('betaup::beta.betaup')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

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
