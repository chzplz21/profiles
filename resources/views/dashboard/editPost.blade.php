@extends('layouts.app')

@section('content')

<div class = "container">

<form method = "post" action = "finishedEdit/{{$postData->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea name = "body" class = "textarea">
          {{$postData->postBody}}
        </textarea>
        <div class = "imageHolder">
            <img class = "imageItself" src = "{{$postData->image}}">
        </div>
        <input type = "file" name = "image"></input>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection