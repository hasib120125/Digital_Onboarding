@extends('layouts.auth')
@section('page-title', 'Login - Digital On Boarding')
@section('content')
<div class="login-form center-block {{ $errors->has('username')? 'has-error':''}}">
        {!! Form::open(['id'=>'model-form','route' => 'login','method'=>'POST']) !!}
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('username', null, array('placeholder' => 'username','class' => 'form-control')) !!}
                    @if($errors->has('username'))
			        <span class="help-block" style="color:#fff">{{ $errors->first('username')}}</span>
			        @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row submit-btn-row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="submit">Login</button>
                </div>
            </div>
        {!! Form::close() !!}
</div>
@endsection
