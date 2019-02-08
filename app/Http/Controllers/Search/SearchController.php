<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    private $bigIntersection = [];

    public function searchAll($searchString) {
        $allUsers = DB::table('users')->
        join('posts', 'users.id', '=', 'posts.userID')->
        join('editprofile', 'users.id', '=', 'editprofile.userID')->
        select('users.name', 'users.id', 'posts.postBody', 'editprofile.image', 'users.name')->get()->toArray();

        $requestArray = explode(",", $searchString);
        //loops through every user post
        foreach ($allUsers as $user) {
            $this->Compare($requestArray, $user);
        }
        $this->getTopThree();
        return $this->bigIntersection;
          
    }

    //Compares request array with all user post arrays
    private function Compare ($requestArray, $user) {
        $user = json_decode(json_encode($user), true);
        $userArray = explode(",", $user["postBody"]);
        $intersection = array_intersect($requestArray, $userArray);

        if (count($intersection)) {
            $intersection = implode(",", $intersection);
            $tempArray = array("amount" => count($intersection), "commonThings" => $intersection);
            $this->bigIntersection[] = array_merge($tempArray, $user);
        }
        
        
    }

    //Sorts the bigIntersection array
    private function getTopThree() {
       
        $commonThings = array_column($this->bigIntersection, 'amount');    
        array_multisort($commonThings, SORT_DESC, $this->bigIntersection);
     
    }


    private function showBig() {
         
    }


}
