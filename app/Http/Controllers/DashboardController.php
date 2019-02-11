<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\editProfile;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Search\SearchDashboard;

class DashboardController extends Controller
{
    public function index()
    {  
        //Gets id for user
        $id = Auth::id();
        //Log::info($id);

        $user = User::where('id', $id)->first();
        //Gets profile info for user
        $profileInfo =  editProfile::where('userID', $id)->first();
   
        //Gets all post data for user
        $postData = Post::where('userID', $id)->first();

        if (count($postData)) {
      
            $search = new SearchDashboard;
            $sortedUsers = $search->search($postData->postBody, $id);
           
        }else {
           $sortedUsers = "";
        }

        return view('dashboard.dashboard', ['user' => $user, 'profileInfo' => $profileInfo, 'postData' => $postData, 
        'sortedUsers' => $sortedUsers]);
    }
}
