<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class frontController extends Controller
{
    public function index() {
        $allPosts = Post::all();
        
        $recentPosts = DB::table('users')->
        join('posts', 'users.id', '=', 'posts.userID')->
        join('editprofile', 'users.id', '=', 'editprofile.userID')->
        select('users.name', 'users.id', 'posts.postBody', 'editprofile.image', 'users.name')->
        inRandomOrder()->
        take(4)->
        get();

        $users = json_decode(json_encode($recentPosts), true);

        //var_dump($users);   
        
        //$users["commonThings"] = "";

       
       
        return view('frontPage',  ['recentPosts' => $users]);

    }
}
