<div class="row">
		<div class="col-md-6 userContainer">
            <div class="well profile">
            </div> 
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h2 class = "profileName">{{$profileUser[0]->name}}</h2>
                        <p><strong>Location: </strong> {{$profileUser[0]->location or "Nothing here yet"}}</p>
                        @if ($dashboard == true)
                            <a class = 'generalLink' href = "/myMessages">My Messages</a>
                        @else
                            <a class = 'generalLink' href = "/user/message/{{$profileUser[0]->id}}">Send Message</a>
                        @endif
                    
                    </div>             
                    <div class="col-sm-6 text-center">
                            <div class = "profileImage">
                                    <img class = "imageItself" src = "{{$profileUser[0]->image or asset('images/Anonymous_User.png')}}">
                             </div>
                    </div>
                    @if ($dashboard == true)
                        <a href = "/editProfile">
                            <button type="submit" class="btn btn-primary">Edit Profile</button>
                        </a>
                     @endif
                   
                </div>  
                @if ($dashboard != true)
                   
                    <div class = "col-sm-12 userPost"> 
                        <h3 class = "thingsLike">Things They Like:</h3>
                        {{$profileUser[0]->postBody or "Nothing here yet"}} 
                    </div>  
                @endif
              

                
        </div>


</div>   