@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
                <div id = "about">
                  
                    <h3> About Me </h3>
                    @if (count($user)) 
                        <div class = "imageHolder">
                            <img class = "imageItself" src = "">
                        </div>
                        <p></p>

                    @endif
                <p><a href = "editProfile">Edit</a></p>
                </div>
                
                <div id = "posts">
                    <h3>Things I Like</h3>

                    <form method = "post" action = "/dashboard/editPost/{{$user[0]->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                        <textarea name = "postBody" class = "textarea">
                            {{$user[0]->postBody}}
                        </textarea>
                
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  

            
                    
                
            
            </div>
        </div>
    </div>
</div>
@endsection
