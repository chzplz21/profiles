@extends('layouts.app')

@section('content')

@include('search.searchBox')

    @foreach ($recentPosts as $user)
         @include('littleUserBox')
        
    @endforeach

@endsection