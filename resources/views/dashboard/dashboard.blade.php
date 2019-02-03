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
                    @if (count($profileInfo)) 
                        <div class = "imageHolder">
                            <img class = "imageItself" src = "{{$profileInfo->image}}">
                        </div>
                        <p>{{$profileInfo->about}}</p>

                    @endif
                <p><a href = "editProfile">Edit</a></p>
                </div>
                
                <div id = "posts">
                    <h3>Things I Like</h3>

                    <textarea>
                        @if (!count($postData)) 
                            There's nothing here yet friend!
                        @else 
                            {{$postData->postBody}}
                            <a href = "editPost/{{$postData->id}}">Update</a>
                        @endif
                    </textarea>

                    

            
                    @foreach ($postData as $item)
                        <div>
                            <div>
                            <textarea>
                            {{$item->postBody}}
                            </textarea>
                            </div>
                            <div class = "imageHolder">
                                <img class = "imageItself" src = "{{$item->image}}">
                            </div>
                            <a href = "editPost/{{$item->id}}">Update</a>
                            
                        </div>
                        
                    @endforeach
                </p>
            
            </div>
        </div>
    </div>
</div>
@endsection
