<?php

namespace App\Http\Controllers;

use App\Post;
use App\editProfile;
use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileVisitorController extends Controller
{
    public function index ($id) {

        $profileUser= DB::table('users')->
        join('posts', 'users.id', '=', 'posts.userID')->
        join('editprofile', 'users.id', '=', 'editprofile.userID')->
        select('users.name', 'users.id', 'posts.postBody', 'editprofile.image', 'users.name')->
        where('users.id', '=', $id)->get();
      
      
        //Gets profile info for user
        /*
        $profileInfo =  editProfile::where('userID', $id)->first();
        //Gets all post data for user
        $postData = Post::where('userID', $id)->get();
        */
        return view('visitor.profileVisitor',  ['profileUser' => $profileUser]);
        
    }

    public function showMessageForm($id) {
        return view('dashboard.messageForm',  ['userID' => $id]);
    }

    //After contact message has been sent
    public function messageReceived(Request $request, $id) {

        $validator =  $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        
        $message = new Messages;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->userID = $id;
        $message->save();

        return redirect()->route('messageSuccess');

    }

    //Redirected view after successful contact form submit
    public function success() {
        $message = "Thanks, your message has been sent!";
        return view('dashboard.message', ['message' => $message]);
    }


}
