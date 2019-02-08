

<a href = "/user/{{$user["id"]}}">
    <div class = "singlePost">
        <p>
            Name: {{$user["name"]}}
        </p>
        <div class = "imageHolder">
            <img class = "imageItself" src = "{{$user["image"] or ""}}">
        </div>
        @isset($user['commonThings'])
         <p>What You Have in common: {{$user["commonThings"]}}
        @endisset
        
        <p class = "about">{{$user["postBody"]}}</p>

    </div>
</a>