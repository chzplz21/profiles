<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\editProfile;
use App\Messages;
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
       

        //Gets all post data for user
        $postData = Post::where('userID', $id)->first();

        $profileUser= DB::table('users')->
        join('posts', 'users.id', '=', 'posts.userID')->
        join('editprofile', 'users.id', '=', 'editprofile.userID')->
        select('users.name', 'users.id', 'posts.postBody', 'editprofile.image', 'editprofile.location', 'users.name')->
        where('users.id', '=', $id)->get();


        if (count($postData)) {
            $search = new SearchDashboard;
            $sortedUsers = $search->search($postData->postBody, $id);
            $searchString = $postData->postBody;
        }else {
           $sortedUsers = "";
           $searchString = "";
        }

        
        return view('dashboard.dashboard', ['profileUser' => $profileUser, 'searchString' => $searchString, 
        'sortedUsers' => $sortedUsers, "action" => "/dashboard/search", "dashboard" => true]);
        
    }

    public function showMessages() {
        $id = Auth::id();
        $messages = Messages::where('userID', $id)->get();
        return view('Messages.myMessages', ['messages' =>  $messages]);




    }






}
