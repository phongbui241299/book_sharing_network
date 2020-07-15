@extends('master')
@section('content')
    <div class="container index">
        <h3 class="font-2 font-w500 title_name">Thành viên </h3>
        @foreach($user as $mem)

            @if($mem->role == 0)

                <div class="d-flex profile__admin" >
            <div class="profile__admin_images" style="width: 21%">
                <a href="{{route('profile',$mem->user_id)}}">
                <img src="/{{$mem->avatar}}" alt="" width="100px" height="100px" style="border-radius: 90px;">
                </a>
            </div>
            <div class="profile__admin_info">
                <p class="font-3"><a href="{{route('profile',$mem->user_id)}}">{{$mem->user_name}}</a></p>
                <p class="font-3">{{$mem->city_name}}, {{$mem->district_name}}, {{$mem->ward_name}}</p>
            </div>
        </div>
            @else
            @endif

                @endforeach
    </div>
    <@endsection

