@extends('layouts.app')

@section('content')

@include('layouts.header')

<div class="profile-info-wrap">
    <div class="container">
        <div class="profile-info-box">
                @if(!empty($userProfile->profile_image))
                    <div class="profile-img"><img alt="" src="{{url($userProfile->profile_image)}}"></div>
                    @else 
                    <div class="profile-img"><img alt="" src="{{asset('assets/images/profile_avatar.jpg')}}"></div>
                @endif

            <div class="profile-info">
                    @if(!empty($userProfile->preffered_name))
                        <p class="profile-name">{{$userProfile->preffered_name}}</p>
                    @endif

                    @if(!empty($profile->designation))
                        <p class="profile-group">{{$profile->designation}}</p>
                    @endif

                    @if(!empty($profile->department->name))
                        <p class="profile-area">{{$profile->department->name}} Department</p>
                    @endif

                    @if(!empty($profile->division->name))
                        <p class="profile-area">{{$profile->division->name}} Division</p>
                    @endif
            </div>
        </div>
        <span id="success-msg" style="color:white; font-size:20px;"></span>
        <span hidden id="emp_state_id">{{$profile->emp_state_id}}</span>
    </div>
</div>

<div class="dashboard-content-wrap">
    <div class="container">
        <ul class="profile-tab">
            <li class="tab"><a class="active" href="#day1">Day 1</a></li>
            <li class="tab"><a href="#day14">Day 14</a></li>
            <li class="tab"><a href="#day30">Day 30</a></li>
            <li class="tab"><a href="#day90">Day 90</a></li>
        </ul>
        <div id="day1" class="profile-tab-content">
            <div class="profile-info-form">
                {!! Form::open(['id'=>'day1-form','class'=>'form-horizontal','route' => 'cheklist-feedback-store','method'=>'POST','data-val'=> false]) !!}
                {!! Form::hidden('user_id', $profile->id) !!} 
                <div class="row">
                    @foreach ($checklists as $checklist)
                        @if($checklist->emp_state_id == 2)
                            <p>
                                <label>
                                    <input type="checkbox" name="checklist[]" value="{{$checklist->id}}" {{$profile->checklistFeedback->contains('checklist_id', $checklist->id) ? 'checked disabled' : ''}} class="filled-in" />
                                    <span>{{$checklist->document_name}}</span>
                                </label>
                            </p>
                        @endif
                    @endforeach
                    <div class="input-field col s12 submit-btn-row">
                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div id="day14" class="profile-tab-content">
            <div class="profile-info-form">
              {!! Form::open(['id'=>'day14-form','class'=>'form-horizontal','route' => 'cheklist-feedback-store','method'=>'POST']) !!}
              {!! Form::hidden('user_id', $profile->id) !!}
                    <div class="row">
                        @foreach ($checklists as $checklist)
                            @if($checklist->emp_state_id == 3)
                                <p>
                                    <label>
                                        <input type="checkbox" name="checklist[]" value="{{$checklist->id}}" {{$profile->checklistFeedback->contains('checklist_id', $checklist->id) ? 'checked disabled' : ''}} class="filled-in" />
                                        <span>{{$checklist->document_name}}</span>
                                    </label>
                                </p>
                            @endif
                        @endforeach
                        <div class="input-field col s12 submit-btn-row">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div id="day30" class="profile-tab-content">
            <div class="profile-info-form">
              {!! Form::open(['id'=>'day30-form','class'=>'form-horizontal','route' => 'cheklist-feedback-store','method'=>'POST']) !!}
              {!! Form::hidden('user_id', $profile->id) !!}
                    <div class="row">
                            @foreach ($checklists as $checklist)
                            @if($checklist->emp_state_id == 4)
                                <p>
                                    <label>
                                        <input type="checkbox" name="checklist[]" value="{{$checklist->id}}" {{$profile->checklistFeedback->contains('checklist_id', $checklist->id) ? 'checked disabled' : ''}} class="filled-in" />
                                        <span>{{$checklist->document_name}}</span>
                                    </label>
                                </p>
                            @endif
                        @endforeach
                        <div class="input-field col s12 submit-btn-row">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div id="day90" class="profile-tab-content">
            <div class="profile-info-form">
              {!! Form::open(['id'=>'day90-form','class'=>'form-horizontal','route' => 'cheklist-feedback-store','method'=>'POST']) !!}
              {!! Form::hidden('user_id', $profile->id) !!}
                    <div class="row">
                        @foreach ($checklists as $checklist)
                            @if($checklist->emp_state_id == 5)
                                <p>
                                    <label>
                                        <input type="checkbox" name="checklist[]" value="{{$checklist->id}}" {{$profile->checklistFeedback->contains('checklist_id', $checklist->id) ? 'checked disabled' : ''}} class="filled-in" />
                                        <span>{{$checklist->document_name}}</span>
                                    </label>
                                </p>
                            @endif
                        @endforeach
                        <div class="input-field col s12 submit-btn-row">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
