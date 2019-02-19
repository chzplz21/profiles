@extends('layouts.app')

@section('content')

<div class = "container">


        <div class="row">
                <div class="col-md-6 userContainer">
                    <div class="well profile">
                    </div> 
                        <div class="col-sm-12">
                           <form method = "post" action = "updateProfile" enctype = "multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-sm-6">
                                 
                                       
                                    <p><strong>Location:</strong> 
                                    <input class = "block"  name = "location" value ="{{$userDetails->location}}"></input> 
                                    </p>
                                   
                                
                                </div>             
                                <div class="col-sm-6 text-center">
                                        <div class = "profileImage">
                                                <img class = "imageItself" src = "{{asset('images/Anonymous_User.png')}}">
                                                <input class = "top" type = "file" name = "image"></input>
                                        </div>
                                        
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form> 
                        </div>  
                      
                        
        
                        
                </div>
        
        
        </div>   




        

</div>
@endsection