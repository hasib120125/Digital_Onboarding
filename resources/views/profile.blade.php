@extends('layouts.app')

@section('content')
<div class="profile-wrap">
    <div class="row">
        <a class="exit-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><img alt="" src="{{asset('assets/images/exit-icon2.png')}}"></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        {!! Form::open(['id'=>'model-form','route' => 'create-user-profile','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="col s3 profile-sidebar">
            @if(!empty($profile->name))
                <h4 style="text-align:center">{{$profile->name}}!</h4>
            @endif
            <div class="profile-img-box">
                <img id="blah" src="{{asset('assets/images/avatar.jpg')}}" alt="your image" style="width: 140px;
                height: 140px; border-radius: 70px;"/>
                
                <input type='file' name="file" onchange="readURL(this);"/>

                @if(!empty($profile->designation))
                    <p class="profile-group" style="padding-top: 45px;">{{$profile->designation}}</p>
                @endif

                @if(!empty($profile->department->name))
                    <p class="profile-area">{{$profile->department->name}} Department</p>
                @endif

                @if(!empty($profile->division->name))
                    <p class="profile-area">{{$profile->division->name}} Division</p>
                @endif
            </div>
        </div>
        <div class="col s9 profile-content">
                @if ($errors->any())
                <div class="materialert error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="profile-form">
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::hidden('user_id', $profile->id) !!}
                        {!! Form::text('preffered_name', null, array('placeholder' => 'your name','class' => 'validate')) !!}
                        <label for="preffered_name">Preffered name</label>
                        @if($errors->has('preffered_name'))
                            <span class="help-block" style="color:#fff">{{ $errors->first('preffered_name')}}</span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        {!! Form::text('date_of_birth', null, array('placeholder' => 'select date','class' => 'datepicker', 'id' => 'date')) !!}
                        <label for="date_of_birth">Birth date</label>
                        @if($errors->has('date_of_birth'))
                            <span class="help-block" style="color:#fff">{{ $errors->first('date_of_birth')}}</span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        {!! Form::textarea('hobbies', null, array('placeholder' => 'hobby list','class' => 'materialize-textarea', 'id' => 'hobbies')) !!}
                        <label for="hobbies">Hobbies</label>
                        @if($errors->has('hobbies'))
                            <span class="help-block" style="color:#fff">{{ $errors->first('hobbies')}}</span>
                        @endif
                    </div>
 
                    <div class="row submit-btn-row">
                        <div class="input-field col s12">
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

@push('scripts')
    <script>
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush