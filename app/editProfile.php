<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class editProfile extends Model
{
    //
    public $table = "editprofile";
    protected $fillable = ['userID', 'about', 'image', 'location'];
}
