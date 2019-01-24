@extends('layouts.app')

@section('content')
<div class="info-content-wrap">
    <div class="info-content-col joining-doc-col">
        <div class="info-content-box">
            <div class="info-head">
                <span class="info-icon"><img src="{{asset('assets/images/doc-icon.png')}}" alt="" /></span>
                <h2>Pre-Joining Documentation</h2>
                <a class="btn-trigger" href="javascript:void(0)"><i class="material-icons">expand_more</i></a>
            </div>
            <div class="info-dropdown">
                <span class="close">X</span>
                <div class="info-content">
                    <h3>Mandatory before Joining Date</h3>
                    <ul>
                        @if(!empty($checklists))
                            @foreach ($checklists as $checklist)
                                <li>{{$checklist->document_name}}</li>
                            @endforeach  
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="info-content-col about-col">
        <a href="{{ route('logout') }}" class="exit-btn" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><img src="{{asset('assets/images/exit-icon.png')}}" alt="" /></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="info-content-box">
            <div class="info-head">
                <span class="info-icon"><img src="{{asset('assets/images/icon-!.png')}}" alt="" /></span>
                <h2>About Robi</h2>
                <a class="btn-trigger" href="javascript:void(0)"><i class="material-icons">expand_more</i></a>
            </div>
            @if(!empty($about_robi->message))
                <div class="info-dropdown">   
                    <span class="close">X</span>
                    <div class="info-content">
                        <li style="list-style: none;">
                                @if (!empty($about_robi->file_type))
                                @if ($about_robi->file_type == 'pdf')
                                    <object data="{{asset($about_robi->file_location)}}" type="application/pdf" width="400" height="200">
                                    </object>
                                @endif
            
                                @if ($about_robi->file_type == 'jpg')
                                    <object data="{{asset($about_robi->file_location)}}" type="application/pdf" width="400" height="200">
                                    </object>
                                @endif
            
                                @if ($about_robi->file_type == 'mp4')
                                    <video width="100%" src="{{asset($about_robi->file_location)}}" height="200" width="200" controls=""></video>
                                @endif
            
                                @if ($about_robi->file_type == 'm4v')
                                    <video width="100%" src="{{asset($about_robi->file_location)}}" height="200" width="200" controls=""></video>
                                @endif
            
                                @else
                                <div style="display:none"></div>
                            @endif
                        </li>
                        <li style="list-style: none;">{!! htmlspecialchars_decode($about_robi->message) !!}</li>
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection
