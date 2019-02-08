<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class frontController extends Controller
{
    public function index() {
        $allPosts = Post::all();
        
        $recentPosts = DB::table('users')->
        join('posts', 'users.id', '=', 'posts.userID')->
        join('editprofile', 'users.id', '=', 'editprofile.userID')->
        select('users.name', 'users.id', 'posts.postBody', 'editprofile.image', 'users.name')->
        orderBy('users.created_at', 'asc')->
        take(3)->
        get();

        $users = json_decode(json_encode($recentPosts), true);
        
        //$users["commonThings"] = "";
       
        return view('frontPage',  ['recentPosts' => $users]);

    }
}
