@extends('layouts.app')

@section('content')
<div class="profile-wrap">
    <div class="row">
        <div class="col s3 profile-sidebar">
                @if(!empty($profile->preffered_name))
                    <h2 style="text-align: center;">{{$profile->preffered_name}}</h2>
                @endif
            <div class="profile-img-box">
                    @if(!empty($profile->profile_image))
                        <div class="profile-img"><img src="{{url($profile->profile_image)}}" alt="" width="161px" height="148px"/></div>
                        @else 
                        <div class="profile-img"><img alt="" src="{{asset('assets/images/profile_avatar.jpg')}}"></div>
                    @endif
            {!! Form::open(['route' => ['user-profile-update',$profile->user_id], 'method'=>'PATCH', 'enctype' => 'multipart/form-data']) !!}

                {!! Form::file('file', ['placeholder' => 'Select Profile Picture']) !!}
            </div>
        </div>  
        <div class="col s9 profile-content">
            <div class="profile-form">
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('preffered_name', $profile->preffered_name, array('placeholder' => 'your name','class' => 'validate')) !!}
                        <label for="preffered_name">Preffered name</label>
                        @if($errors->has('preffered_name'))
                        <span class="help-block" style="color:#fff">{{ $errors->first('preffered_name')}}</span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        {!! Form::text('date_of_birth', $profile->date_of_birth, array('placeholder' => 'select date','class' => 'datepicker', 'id' => 'date')) !!}
                        <label for="date_of_birth">Birth date</label>
                        @if($errors->has('date_of_birth'))
                        <span class="help-block" style="color:#fff">{{ $errors->first('date_of_birth')}}</span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        {!! Form::textarea('hobbies', $profile->hobbies, array('placeholder' => 'hobby list','class' => 'materialize-textarea', 'id' => 'hobbies', 'required' => 'required')) !!}
                        <label for="hobbies">Hobbies</label>
                        @if($errors->has('hobbies'))
                            <span class="help-block" style="color:#fff">{{ $errors->first('hobbies')}}</span>
                        @endif
                    </div>
 
                    <div class="row submit-btn-row">
                        <div class="input-field col s12">
                            <a href="{{route('user-dashboard')}}" class="btn waves-effect waves-light">Back</a>
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection