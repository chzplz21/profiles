<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\editProfile;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {  
        //Gets id for user
        $id = Auth::id();
        //Log::info($id);

        //$user = User::where('id', $id)->first();
        $user = DB::table('users')->join('posts', 'users.id', '=', 'posts.userID')->where('users.id', '=', $id)->get();
       
        /*
        if (!count($user)) {
            $user = User::where('id', $id)->first();
        }
        */
        Log::info($user);

        /*
        //Gets profile info for user
        $profileInfo =  editProfile::where('userID', $id)->first();
   
        //Gets all post data for user
        $postData = Post::where('userID', $id)->first();
       */

        return view('dashboard.dashboard', ['user' => $user]);
    }
}
