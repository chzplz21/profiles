<?php

namespace App\Http\Controllers;

use App\Post;
use App\editProfile;
use App\Messages;
use Illuminate\Http\Request;

class ProfileVisitorController extends Controller
{
    public function index ($id) {
      
        //Gets profile info for user
        $profileInfo =  editProfile::where('userID', $id)->first();
        //Gets all post data for user
        $postData = Post::where('userID', $id)->get();
        return view('dashboard.profileVisitor',  ['profileInfo' => $profileInfo, 'postData' => $postData]);
        
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
