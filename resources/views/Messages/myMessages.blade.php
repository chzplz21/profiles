@extends('layouts.app')

@section('content')
    
    <div class="col-md-6 userContainer">
        <h1>My Messages</h1>
        @if(count($messages))
            @foreach ($messages as $message)
              
                        <p><strong>Sender:</strong>
                            {{$message->name}}
                        </p>
                        <p><strong>Email:</strong>
                            {{$message->email}}
                        </p>
                        <p>
                        <strong> Message: </strong>
                            {{$message->message}}
                        </p>
                        <hr>
            @endforeach
        @else 
        <h2 class = "sorry">
          Sorry, you have no messages
        </h2>
        @endif
    </div>

@endsection