<?php

namespace App\Http\Controllers;
use App\editProfile;
use Illuminate\Support\Facades\Log;


class GeneralCrud {

    
    public static function Update($userRecord, $request) {

        

       
         
         //  $request->file('image')->storeAs('public/assets/images', $imageName);  

    }


    public static function ImageInsert($userRecord, $request) {

        \Cloudinary::config(array( 
            "cloud_name" => "dsw7oawxn", 
            "api_key" => "678121375327622", 
            "api_secret" => "EOpofrqqqJCuxaTYLcAFVWMGPEY" 
          ));
        
        $file = $request->file('image');
        
        //Sends image to cloudinary
         $result = \Cloudinary\Uploader::upload($file, $options = array(
            array("width"=>300, "height"=>300)

         ));
         
         //Updates image in db with cloudinary url
         $userRecord->image = $result["url"];
         $userRecord->save();
         
    }

}


?>