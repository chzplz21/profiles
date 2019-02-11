
<div class = "card col-sm-3 littleUserBox">
    <a href = "/user/{{$user["id"]}}">
        <div class = "singlePost">
            <div class = "imageHolder">
                <img class = "imageItself" src = "{{$user["image"] or ""}}">
            </div>
            <p>
                Name: 
                <span class = "description">
                    {{$user["name"]}}
                </span>
            </p>
            
            @isset($user['commonThings'])
              <p>Amount of things you have in common:
                <span class = "description">
                    {{$user["amount"]}}
                </span>
              </p>
              <p>
                  What You Have in common: 
                  <span class = "description">
                    {{$user["commonThings"]}}
                  </span>
               </p>
            @endisset
            
            <p>Things They Like: 
                <span class = "description">
                  {{$user["postBody"]}}
                </span>
           </p>

        </div>
    </a>
</div>