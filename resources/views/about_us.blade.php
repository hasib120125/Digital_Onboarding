@extends('layouts.app')

@section('content')

@include('layouts.header')

@push('style')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    .wrap
        {
            padding-top: 30px;
        }
    
        .glyphicon
        {
            margin-bottom: 10px;
            margin-right: 10px;
        }
    
        small
        {
            display: block;
            color: #888;
        }
    
        .well
        {
            border: 1px solid blue;
        }
@endpush

<div class="guideline-wrap weare-wrap">
    <div class="weare-tab-bar">
        <div class="container">
            <ul class="weare-tab">
                <li class="tab"><a class="active" href="#weare-tab1">Message From CEO</a></li>
                <li class="tab"><a href="#weare-tab2">Organization Structure</a></li>
                <li class="tab"><a href="#weare-tab3">Meet the Leaders</a></li>

                <!-- <li class="tab"><a href="#weare-tab4">Divisions</a></li> -->
                <!-- <li class="tab"><a href="#weare-tab4">Divisions</a></li> -->

                {{-- <li class="tab"><a href="#weare-tab4">Divisions</a></li> --}}


                <!-- <li class="tab"><a href="#weare-tab4">Divisions</a></li> -->

            </ul>
        </div>
    </div>
    <div class="container">
        <div id="weare-tab1" class="weare-tab-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 offset-md-3">
                    <div class="well well-sm">
                        <div class="row" style="display: inline-flex; padding-top: 15px;">
                            <div class="col-sm-4 col-md-6 col-lg-7">
                                @if(!empty($ceoMessage->photo))
                                    <img src="{{url($ceoMessage->photo)}}" alt="" class="img-rounded img-fluid" />                                
                                @endif
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-5" style="padding-left: 20px;
                            margin-top: 60px;">
                                @if(!empty($ceoMessage->name))
                                    <h4>{{$ceoMessage->name}}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="weare-content-wrap">
                @if (!empty($ceoMessage->file_type))
                    @if ($ceoMessage->file_type == 'pdf')
                        <object data="{{asset($ceoMessage->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($ceoMessage->file_type == 'jpg')
                        <object data="{{asset($ceoMessage->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($ceoMessage->file_type == 'mp4')
                        <video width="100%" src="{{asset($ceoMessage->file_location)}}" controls=""></video>
                    @endif

                    @if ($ceoMessage->file_type == 'm4v')
                        <video width="100%" src="{{asset($ceoMessage->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
                
            <div class="guideline-description weare-description">
                @if(!empty($ceoMessage->message))
                    <p>{!! htmlspecialchars_decode($ceoMessage->message) !!}</p>
                @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab2" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                @if (!empty($orgStructure->file_type))
                    @if ($orgStructure->file_type == 'pdf')
                        <object data="{{asset($orgStructure->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($orgStructure->file_type == 'jpg')
                        <object data="{{asset($orgStructure->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($orgStructure->file_type == 'mp4')
                        <video width="100%" src="{{asset($orgStructure->file_location)}}" controls=""></video>
                    @endif

                    @if ($orgStructure->file_type == 'm4v')
                        <video width="100%" src="{{asset($orgStructure->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">
                @if(!empty($orgStructure->description))
                    <p>{!! htmlspecialchars_decode($orgStructure->description) !!}</p>
                @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab3" class="weare-tab-content">
            @include('layouts.meet_leader')
        </div>

        <div id="weare-tab4" class="weare-tab-content" style="padding-top: 10px;">


        {{-- <div id="weare-tab4" class="weare-tab-content" style="padding-top: 10px;">
        <!--
        <div id="weare-tab4" class="weare-tab-content" style="padding-top: 10px;">
        {{-- <div id="weare-tab4" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                <video width="100%" src="images/vdo.mp4" controls=""></video>
            </div>
            <div class="guideline-description weare-description">
                
                @if (!empty($divisionInfo->file_type))
                    @if ($divisionInfo->file_type == 'pdf')
                        <object data="{{asset($divisionInfo->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($divisionInfo->file_type == 'jpg')
                        <object data="{{asset($divisionInfo->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($divisionInfo->file_type == 'mp4')
                        <video width="100%" src="{{asset($divisionInfo->file_location)}}" controls=""></video>
                    @endif

                    @if ($divisionInfo->file_type == 'm4v')
                        <video width="100%" src="{{asset($divisionInfo->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
                
                <h3>Description</h3>
                @if(!empty($divisionInfo->message))
                    <p>{!! htmlspecialchars_decode($divisionInfo->message) !!}</p>
                @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div> 
        </div>
        -->
        </div> --}}

        </div>
    </div>
</div>

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>   
@endpush
@endsection
