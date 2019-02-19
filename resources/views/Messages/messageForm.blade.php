@extends('layouts.app')


@section('content')


<div class="col-md-6 userContainer">
        @if(count($errors))
        <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{$error}}
            <br>
        @endforeach

        </div>

        @endif

    <h1>Contact {{$user->name}}</h1>

        <form method = "post" action = "/messageSent/{{$userID}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name = "email" class="form-control"  placeholder="Email" value="{{ old('email') }}">
                    
                </div>
                <div class="form-group">
                    <label for= "name">Name</label>
                    <input name = "name" class="form-control"  placeholder="Name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Message</label>
                    <textarea name= "message"  placeholder="Message" class="form-control bottom" rows="5" id="comment" value="{{ old('msg') }}"></textarea>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
        </form>

</div>


@endsection