@extends('layouts.app')

@section('content')

@include('layouts.header')

@push('styles')
    
@endpush

<div class="container">
    <h3 style="text-align:center">Frequently Asked Questions</h3>
    <ul class="collapsible">
        @foreach ($faqs as $faq)
        <li>
            <div class="collapsible-header" style="background-color: #f0f1f2;border-bottom: 1px solid #881F27;
                color: #c42b32; font-size: 19px;"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                @if(!empty($faq->question))
                    {!! htmlspecialchars_decode($faq->question) !!}
                @endif
            </div>
            <div class="collapsible-body" style="border-bottom: 1px solid #881F27;">
                <span style="color: #000;font-size: 17px;">
                    @if(!empty($faq->answer))
                        {!! htmlspecialchars_decode($faq->answer) !!}   
                    @endif
                </span>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>
    
@endpush
@endsection