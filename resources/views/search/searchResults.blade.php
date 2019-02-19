    
    
        <div class = "row">
                <div class = "resultsContainer">
                    @if(!empty($sortedUsers))

                    <h2>Here are the folks you have something in common with:</h2>

                        @foreach ($sortedUsers as $key => $user) 
                           
                             @if ($key % 4==0) 
                                <div class="row flexRow d-flex">
                            @endif
                                    @include('littleUserBox')
                               <?php $key++ ?>
                            @if ($key % 4 == 0)
                                </div>
                            @endif
                                    

                        @endforeach

                    @else 
                    <h2 class = "sorry">
                        @if(!empty($searchString))
                            Sorry, no one else likes {{$searchString}}
                        @else 
                            Sorry, you don't have anything in common with anybody.
                        @endif
                    </h2>
                    @endif
              </div>
        </div>





