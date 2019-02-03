@extends('layouts.app')

@section('content')

    @foreach ($allPosts as $post)
        <a href = "/user/{{$post->userID}}">
            <div class = "singlePost">
                <div class = "imageHolder">
                    <img class = "imageItself" src = "{{$post->image}}">
                </div>
                <p class = "about">{{$post->postBody}}</p>

            </div>
        </a>
        

    @endforeach

@endsection