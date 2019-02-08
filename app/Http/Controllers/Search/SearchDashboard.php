<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchDashboard extends SearchController
{
    public function search($searchString, $id) { 
        $sortedUsers = $this->searchAll($searchString);
        //Removes themselves from sortedUsers array
        foreach($sortedUsers as $subkey => $user) {
            if ($user["id"] == $id) {
                unset($sortedUsers[$subkey]);
            }
        }
        return $sortedUsers;
    }
}
