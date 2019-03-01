<div class = "searchContainer">
    
    <h2>Add things that you like, seperated by commas!</h2>
    <h3>Each thing must be only one word</h3>
    <form class = "searchBox" method = "get" action = "{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea name = "postBody" class = "searchTextArea" id = "searchArea" placeholder = "Ex. Dogs, Computers, Baseball, etc.">{{$searchString or ""}}</textarea> 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>