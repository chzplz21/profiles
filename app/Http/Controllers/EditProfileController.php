<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\editProfile;
use App\Http\Controllers\GeneralCrud;
use Illuminate\Support\Facades\Auth;




class EditProfileController extends Controller
{
   
    public function create()
    {
        $id = Auth::id();
        $userDetails = editProfile::where('userID', $id)->first();
        return view('dashboard.editProfile', ['userDetails' => $userDetails]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        //Creates record, if hasn't been created before
        $id = Auth::id();
       
        //Update
        $aboutUpdate = editProfile::where('userID', $id)->first();
        //Mass Assignment update
        $aboutUpdate->update($request->all());       
        //Static method for image inserts
        if ($request->file()) {
            GeneralCrud::ImageInsert($aboutUpdate, $request);
        }

        $message = "Great job, you've updated your profile";
        return redirect()->route('dashboard');
    }

}
