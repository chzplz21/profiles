<h2>Add things that you like, seperate by commas!</h2>
<form method = "get" action = "/search">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <textarea name = "searchBody" class = "dashboardTextArea">{{"Add Something Here"}}</textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>