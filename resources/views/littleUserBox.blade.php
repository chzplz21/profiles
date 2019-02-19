
<div class = "col-sm-3 littleUserBox">
    <a href = "/user/{{$user["id"]}}">
        <div class = "singlePost">
            <div class = "imageHolder">
                <img class = "imageItself" src = "{{$user["image"] or ""}}">
            </div>
            <p>
                <span class = "userLabel"> Name: </span>
                <span class = "description">
                    {{$user["name"]}}
                </span>
            </p>
            <p>
                    <span class = "userLabel">Location: </span>
                    <span class = "description">
                        {{$user["location"]}}
                    </span>
                </p>
            
            @isset($user['commonThings'])
              <p><span class = "userLabel">Amount of things you have in common:</span>
                <span class = "description">
                    {{$user["amount"]}}
                </span>
              </p>
              <p>
                 <span class = "userLabel">What You Have in common:</span>
                  <span class = "description commonThings highlight">
                    {{$user["commonThings"]}}
                  </span>
               </p>
            @endisset
            
            <p><span class = "userLabel">Things They Like:</span>
                <span class = "description allThings">
                  {{$user["postBody"]}}
                </span>
           </p>

        </div>
    </a>
</div>