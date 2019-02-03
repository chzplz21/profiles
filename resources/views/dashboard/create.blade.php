@extends('layouts.app')

@section('content')

<div class = "container">

    <form method = "post" action = "submitPost" enctype = "multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name = "postBody" class = "textarea">
        </input>
        <input type = "file" name = "image"></input>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection