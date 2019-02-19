<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchDashboard extends SearchController
{

    public function search($searchString, $id) {
       //Gets id for user
        $searchString = $searchString;
        $sortedUsers = $this->searchAll($searchString);
        //Removes themselves from sortedUsers array
        foreach($sortedUsers as $subkey => $user) {
            if ($user["id"] == $id) {
                unset($sortedUsers[$subkey]);
                $sortedUsers = array_values($sortedUsers);
            }
        }

       

        return $sortedUsers;

    }
    
}
