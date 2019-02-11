<?php

namespace App\Http\Controllers\Dummy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class dummyUpdate extends Controller
{
    function update() {
        $string = file_get_contents(__DIR__  . "/words.txt");
        $lines = explode(PHP_EOL, $string );
        $arrayCount = count($lines);
        //Minus 1 to include all indexes in array
        $arrayCount = $arrayCount - 1;
        echo $arrayCount;
        $posts = Post::all();

        foreach($posts as $post) {
                $array = [];

                for ($i=0; $i<100; $i++) {
                    $randomNumber = rand (0, $arrayCount);

                    $array[] = $lines[$randomNumber];
                    //var_dump($rand_keys[$i]);
                }

                $string = implode(", ", $array);
                    
                $post->postBody = $string;
                $post->save();
                
        }
    
    }
    
}



