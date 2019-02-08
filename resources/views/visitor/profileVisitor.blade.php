@extends('layouts.app')


@section('content')
    <div class = "message">
        <a href = "/user/message/{{$profileUser[0]->id}}">Send Message</a>
    </div>

   <p>Name: {{$profileUser[0]->name}} </p>
    <div class = "imageHolder">
        <img class = "imageItself" src = "{{$profileUser[0]->image}}">
    </div>
    <p>About: {{$profileUser[0]->about or "Nothing here yet"}}</p>

    <div>
        <p> Post:  {{$profileUser[0]->postBody or "Nothing here yet"}} </p>
    </div>
    
        




@endsection