@extends('layouts.app')

@section('content')

<div class = "container">

    <form method = "post" action = "updateProfile" enctype = "multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         About Me
        <textarea name = "about" class = "textarea">
            {{$aboutDetails->about or "Tell us about yourself"}}
        </textarea>
        <div class = "imageHolder">
            <img src = "{{$aboutDetails->image or ""}}">
        </div>
        <input type = "file" name = "image"></input>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection