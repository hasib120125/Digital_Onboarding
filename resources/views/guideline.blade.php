@extends('layouts.app')

@section('content')

@include('layouts.header')

<div class="guideline-wrap weare-wrap">
    <div class="weare-tab-bar">
        <div class="container">
            <ul class="weare-tab">
                <li class="tab"><a class="active" href="#weare-tab1">Guideline & Other Information</a></li>
                <!-- <li class="tab"><a href="#weare-tab2">Line Manager Guideline</a></li> -->
                <!-- <li class="tab"><a href="#weare-tab2">Line Manager Guideline</a></li> -->
                {{-- <li class="tab"><a href="#weare-tab2">Line Manager Guideline</a></li> --}}
                <!-- <li class="tab"><a href="#weare-tab2">Line Manager Guideline</a></li> -->
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="weare-tab1" class="weare-tab-content" style="padding-top: 12px;">
            <div class="weare-content-wrap">
                @if (!empty($guidelinePrinciple->file_type))
                    @if ($guidelinePrinciple->file_type == 'pdf')
                        <object data="{{asset($guidelinePrinciple->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($guidelinePrinciple->file_type == 'jpg')
                        <object data="{{asset($guidelinePrinciple->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($guidelinePrinciple->file_type == 'mp4')
                        <video width="100%" src="{{asset($guidelinePrinciple->file_location)}}" controls=""></video>
                    @endif

                    @if ($guidelinePrinciple->file_type == 'm4v')
                        <video width="100%" src="{{asset($guidelinePrinciple->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
                
            </div>
            <div class="guideline-description weare-description">
                
                    @if(!empty($guidelinePrinciple->message))
                        <h3>Description</h3>
                        <p>{!! htmlspecialchars_decode($guidelinePrinciple->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>

        {{-- <div id="weare-tab2" class="weare-tab-content" style="padding-top: 12px;">
            <div class="weare-content-wrap">
                @if (!empty($lineManager->file_type))
                    @if ($lineManager->file_type == 'pdf')
                        <object data="{{asset($lineManager->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($lineManager->file_type == 'jpg')
                        <object data="{{asset($lineManager->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($lineManager->file_type == 'mp4')
                        <video width="100%" src="{{asset($lineManager->file_location)}}" controls=""></video>
                    @endif
                    
                    
                    @if ($lineManager->file_type == 'm4v')
                        <video width="100%" src="{{asset($lineManager->file_location)}}" controls=""></video>
                    @endif

                    @if ($lineManager->file_type == 'pptx')
                        <iframe src="{{asset($lineManager->file_location)}}" width="870px" height="523px"></iframe>
                    @endif

                    @if ($lineManager->file_type == 'ppt')
                        <iframe src="{{asset($lineManager->file_location)}}" width="870px" height="523px"></iframe>
                    @endif

                    @if ($lineManager->file_type == 'doc')
                        <iframe src="{{asset($lineManager->file_location)}}" width="870px" height="523px"></iframe>
                    @endif

                    @if ($lineManager->file_type == 'docx')
                        <iframe src="{{asset($lineManager->file_location)}}" width="870px" height="523px"></iframe>
                    @endif

                    @else
                    <div style="display:none"></div>
                    
                @endif
            </div>
            <div class="guideline-description weare-description">
                
                    @if(!empty($lineManager->message))
                        <h3>Description</h3>
                        <p>{!! htmlspecialchars_decode($lineManager->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div> --}}
    </div>
</div>
@endsection
