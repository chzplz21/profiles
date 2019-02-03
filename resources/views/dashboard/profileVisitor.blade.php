@extends('layouts.app')


@section('content')
    <div class = "message">
        <a href = "/user/message/{{$profileInfo->userID}}">Send Message</a>
    </div>

    @if (count($profileInfo)) 
        <div class = "imageHolder">
            <img class = "imageItself" src = "{{$profileInfo->image}}">
        </div>
        <p>{{$profileInfo->about}}</p>

    @endif
    
    @if (count($profileInfo)) 
        @foreach ($postData as $item)
        <div>
            <div>
                {{$item->postBody}}
            </div>
            <div class = "imageHolder">
                <img class = "imageItself" src = "{{$item->image}}">
            </div>
            
        </div>
        @endforeach
    @endif


@endsection