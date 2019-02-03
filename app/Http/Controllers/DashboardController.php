<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\editProfile;

class DashboardController extends Controller
{
    public function index()
    {  
        
        //Gets id for user
        $id = Auth::id();

        //Gets profile info for user
        $profileInfo =  editProfile::where('userID', $id)->first();
   

        //Gets all post data for user
        $postData = Post::where('userID', $id)->first();
       

        return view('dashboard.dashboard', ['postData' => $postData, 'profileInfo' => $profileInfo]);
    }
}
