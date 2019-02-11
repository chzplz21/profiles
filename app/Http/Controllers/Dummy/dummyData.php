<?php

namespace App\Http\Controllers\Dummy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\editProfile;
use App\Post;

class dummyData extends Controller
{

    public function index() {
       //pulls in dummy data from randomuser.me

        $json = array();
        $this->lines = array();

        for ($i = 0; $i<100; $i++) {
            $string = file_get_contents("https://randomuser.me/api/?nat=us");
            $json_a = json_decode($string, true);
            $json[] = $json_a["results"][0];
        }

        //var_dump($json);

        $this->bigArray = [];
        $tempArray = [];

        foreach($json as $person) {
            $tempArray["name"] = ucwords($person["name"]["first"] . " " . $person["name"]["last"]);
            $tempArray["created_at"] =  $person["registered"]["date"];
            $tempArray["email"] =  $person["email"];
            $tempArray["picture"] =  $person["picture"]["large"];
            $tempArray["city"] = ucwords($person["location"]["city"]);
            $tempArray["state"] = ucwords($person["location"]["state"]);
            $tempArray["phone"] = $person["phone"];
            $this->bigArray[] = $tempArray;
        }

        var_dump($this->bigArray);

        $string = file_get_contents(__DIR__  . "/words.txt");
        $this->lines = explode(PHP_EOL, $string);

        $this->insert();

       

    }


    function insert() {
        foreach ($this->bigArray as $person) {
          // $id = $this->insertIntoUsers($person);
           //$this->insertIntoProfile($person, $id);
           $this->insertIntoPosts();
        }

    }

    function insertIntoUsers($person) {
        $user = new User;
        $user->name = $person["name"];
        $user->email = $person["email"];
        $user->password = "wahwah97652#";
        $user->save();
        $id = $user->id;
        return $id;
    
    }


    function insertIntoProfile($person, $id) {
        $editProfile = new editProfile;
        $editProfile->userID = $id;
        $editProfile->image = $person["picture"];
        $editProfile->phone = $person["phone"];
        $editProfile->state = $person["state"];
        $editProfile->city = $person["city"];
        $editProfile->save();


    }

  
    function insertIntoPosts() {

        $array = [];
    
        $rand_keys = array_rand($this->lines, 100);
        shuffle($rand_keys);
        // var_dump($rand_keys);
        
        for ($i=0; $i<100; $i++) {
            $array[] = $this->lines[$rand_keys[$i]];
            var_dump($rand_keys[$i]);
        }

        $string = implode(", ", $array);
        
    
        /*
        $flight = Post::updateOrCreate(
            ['userID' => $id],
            ['postBody' => $string]
        );
        */

        /*
        $post = new Post;
        $post->userID = $id;
        $post->postBody = $string;
        $post->save();
        */

    }
    
}


?>