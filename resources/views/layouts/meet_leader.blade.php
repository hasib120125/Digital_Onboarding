@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/leader.css')}}">
@endpush

<div class="id-card-wrapper">
    @foreach ($meetLeader as $leader)
    <div class="id-card" style="margin-bottom: 14px;">
        <div class="profile-row">
            <div class="dp">
                @if(!empty($leader->picture))
                    <img src="{{url($leader->picture)}}" style="border-radius: 80px;">
                    @else
                    <img src="{{asset('assets/images/profile_avatar.jpg')}}" style="border-radius: 120px;">
                @endif
            </div>
            <div class="desc">
                @if(!empty($leader->name))
                    <h4 style="font-size: 1.28rem;line-height: 110%;margin: 0px 0 3px 0;"> {{$leader->name}} </h4>
                @endif
                <p>{{$leader->designation}} || {{$leader->department}} </p>
                <p>
                    @if(!empty($leader->short_profile))
                        {!! htmlspecialchars_decode($leader->short_profile) !!}
                    @endif
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
