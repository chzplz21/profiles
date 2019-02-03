<?php

namespace App\Http\Controllers;

//Facade for the logged in user
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//posts model
use App\Post;
use App\editProfile;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Stores post to db
    public function store(Request $request)
    {
        Log::info($request);

        $this->validate($request, [
            'postBody' => 'required'
        ]);
      
        //Gets user part of request
        $totalRequest = $request->user();
        //Gets user id of user
        $userID = $totalRequest["attributes"]["id"];
        //Gets body of post
        $postBody = $request["body"];
        //Eloquent mass assignment insert into Post
        $newRecord = Post::create($request->all());
       
        $newRecord->userID = $userID;
        $newRecord->save();


        /*
        $post = new Post;
        $post->userID = $userID;
        $post->postBody = $postBody;
        $post->save();
        */

        //Redirects to great job page
        return redirect()->route('greatJob');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //id of specific post 
       $postID = $id;
       //id of current user (based on their session)
       $userID = Auth::id();
      
       $postData = Post::where('userID', $userID )->where('id', $postID)->first();
      
      
       return view('dashboard.editPost', ['postData' => $postData]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        $userID = Auth::id();
        $postData = Post::where('userID', $userID )->where('id', $id)->first();
        $postData->update($request->all());    
        //GeneralCrud::ImageInsert($postData, $request);
        */
        $userID = Auth::id();
        $editPost = Post::firstOrCreate(['userID' => $userID]);
        $postUpdate = Post::where('userID', $userID)->first();
        //Mass Assignment update
        $postUpdate->update($request->all());
        $message = "You successfully updated your post info";
   
        return view('dashboard.message',  ['message' => $message]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userID = Auth::id();
        $postData = Post::where('userID', $userID )->where('id', $id)->delete();
        return view('dashboard.deleted');
        
    }

    //Redirected view after successful post submit
    public function success() {
        return view('dashboard.greatJob');
    }

    

}
