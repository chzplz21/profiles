<div class = "searchContainer">
    
    <h2>Add things that you like, seperate by commas!</h2>
    <form class = "searchBox" method = "get" action = "/search">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea name = "searchBody" class = "searchTextArea" placeholder = "Add something here"></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>