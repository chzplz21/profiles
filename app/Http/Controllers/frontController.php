<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Users;

class frontController extends Controller
{
    public function index() {
        $allPosts = Post::all();
       
       
        return view('frontPage',  ['allPosts' => $allPosts]);

    }
}
