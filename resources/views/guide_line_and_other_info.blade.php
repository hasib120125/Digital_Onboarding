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
    <div class="guideLineAndOtherInfo-tab-bar">
        <div class="container">
            <ul class="guideLineAndOtherInfo-tab">
                <li class="tab"><a class="active" href="#weare-tab1">Guiding Principle</a></li>
                <li class="tab"><a href="#weare-tab2">Code of Conduct</a></li>
                <li class="tab"><a href="#weare-tab3">Our Culture</a></li>
                <li class="tab"><a href="#weare-tab4">Our Facilities</a></li>
                <li class="tab"><a href="#weare-tab5">Medical Benefits</a></li>
                <li class="tab"><a href="#weare-tab6">IT Guideline</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="weare-tab1" class="guideLineAndOtherInfo-tab-content" style="padding-top: 10px;">
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
                        <p>{!! htmlspecialchars_decode($guidelinePrinciple->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab2" class="weare-tab-content" style="padding-top: 10px;">
             <div class="weare-content-wrap">
                
                @if (!empty($code_of_conducts->file_type))
                    @if ($code_of_conducts->file_type == 'pdf')
                        <object data="{{asset($code_of_conducts->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($code_of_conducts->file_type == 'jpg')
                        <object data="{{asset($code_of_conducts->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($code_of_conducts->file_type == 'mp4')
                        <video width="100%" src="{{asset($code_of_conducts->file_location)}}" controls=""></video>
                    @endif

                    @if ($code_of_conducts->file_type == 'm4v')
                        <video width="100%" src="{{asset($code_of_conducts->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">                
                    @if(!empty($code_of_conducts->message))
                        <p>{!! htmlspecialchars_decode($code_of_conducts->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab3" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                
                @if (!empty($robi_cultures->file_type))
                    @if ($robi_cultures->file_type == 'pdf')
                        <object data="{{asset($robi_cultures->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($robi_cultures->file_type == 'jpg')
                        <object data="{{asset($robi_cultures->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($robi_cultures->file_type == 'mp4')
                        <video width="100%" src="{{asset($robi_cultures->file_location)}}" controls=""></video>
                    @endif

                    @if ($robi_cultures->file_type == 'm4v')
                        <video width="100%" src="{{asset($robi_cultures->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">                
                    @if(!empty($robi_cultures->message))
                        <p>{!! htmlspecialchars_decode($robi_cultures->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab4" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                
                @if (!empty($robi_facilities->file_type))
                    @if ($robi_facilities->file_type == 'pdf')
                        <object data="{{asset($robi_facilities->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($robi_facilities->file_type == 'jpg')
                        <object data="{{asset($robi_facilities->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($robi_facilities->file_type == 'mp4')
                        <video width="100%" src="{{asset($robi_facilities->file_location)}}" controls=""></video>
                    @endif

                    @if ($robi_facilities->file_type == 'm4v')
                        <video width="100%" src="{{asset($robi_facilities->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">                
                    @if(!empty($robi_facilities->message))
                        <p>{!! htmlspecialchars_decode($robi_facilities->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab5" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                
                @if (!empty($medical_benifits->file_type))
                    @if ($medical_benifits->file_type == 'pdf')
                        <object data="{{asset($medical_benifits->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($medical_benifits->file_type == 'jpg')
                        <object data="{{asset($medical_benifits->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($medical_benifits->file_type == 'mp4')
                        <video width="100%" src="{{asset($medical_benifits->file_location)}}" controls=""></video>
                    @endif

                    @if ($medical_benifits->file_type == 'm4v')
                        <video width="100%" src="{{asset($medical_benifits->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">                
                    @if(!empty($medical_benifits->message))
                        <p>{!! htmlspecialchars_decode($medical_benifits->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        <div id="weare-tab6" class="weare-tab-content" style="padding-top: 10px;">
            <div class="weare-content-wrap">
                
                @if (!empty($it_guidelines->file_type))
                    @if ($it_guidelines->file_type == 'pdf')
                        <object data="{{asset($it_guidelines->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($it_guidelines->file_type == 'jpg')
                        <object data="{{asset($it_guidelines->file_location)}}" type="application/pdf" width="800" height="600">
                        </object>
                    @endif

                    @if ($it_guidelines->file_type == 'mp4')
                        <video width="100%" src="{{asset($it_guidelines->file_location)}}" controls=""></video>
                    @endif

                    @if ($it_guidelines->file_type == 'm4v')
                        <video width="100%" src="{{asset($it_guidelines->file_location)}}" controls=""></video>
                    @endif

                    @else
                    <div style="display:none"></div>
                @endif
            </div>
            <div class="guideline-description weare-description">                
                    @if(!empty($it_guidelines->message))
                        <p>{!! htmlspecialchars_decode($it_guidelines->message) !!}</p>   
                    @endif
                <a href="https://elearning.robi.com.bd/" target="_blank" class="btn-test-knowledge btn waves-effect waves-light">Test Your Knowledge</a>
            </div>
        </div>
        
    </div>
</div>

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>   
@endpush
@endsection