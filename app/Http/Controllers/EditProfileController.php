<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\editProfile;
use App\Http\Controllers\GeneralCrud;




class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.editProfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Updates the "edit profile" area
    public function store(Request $request)
    {  

        Log::info($request);
        //Creates record, if hasn't been created before
        $id = $request->user()->id;
        $editProfile = editProfile::firstOrCreate(['userID' => $id]);
        //Update
        $aboutUpdate = editProfile::where('userID', $id)->first();
        //Mass Assignment update
        $aboutUpdate->update($request->all());       
        //Static method for image inserts
        GeneralCrud::ImageInsert($aboutUpdate, $request);

        $message = "Great job, you've updated your profile";
        return view('dashboard.message',  ['message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
