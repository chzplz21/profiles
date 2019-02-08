
@if(count($sortedUsers) > 0)
   <h2>Here are the folks you have something in common with:</h2>
    @foreach ($sortedUsers as $user) {
        @include('littleUserBox')

    @endforeach
@else 
   Sorry you don't have anything in common with anybody!
@endif

