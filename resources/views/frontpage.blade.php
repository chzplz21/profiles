@extends('layouts.app')

@section('content')
   
    @include('search.searchBox')
        <h2 class = "recentH2">Most Recent Profiles</h2>
        @foreach ($recentPosts as $user)
            @include('littleUserBox')
            
        @endforeach



@endsection

