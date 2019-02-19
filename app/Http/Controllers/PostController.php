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
    public function update(Request $request)
    {
        $userID = Auth::id();
        $postUpdate = Post::where('userID', $userID)->first();
        $postUpdate->postBody = strtolower($request->postBody);
        $postUpdate->save();

        return redirect()->route('dashboard');
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
