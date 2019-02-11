<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchRequestController extends SearchController
{
    public function search(Request $request) { 
       
        $searchString = $request->searchBody;
        $sortedUsers = $this->searchAll($searchString);
        return view('search.generalSearch',  ['sortedUsers' => $sortedUsers]);
    }
}
