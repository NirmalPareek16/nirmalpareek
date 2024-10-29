<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manytag;
use App\Models\Manypost;
use App\Models\ManyVideo;
use App\Models\Taggable;
use Illuminate\Http\Request;

class ManyToManyPolymorphic extends Controller
{
    public function index()
    {
        // $many_post = Manypost::create([
        //     'name' => 'This is third Post'
        // ]);
        // dd($many_post);

        // $many_video = ManyVideo::create([
        //     'name' => 'Second Video Uploaded'
        // ]);
        // dd($many_video);

        // $many_tag = Manytag::create([
        //     'name' => 'india'
        // ]);
        // dd($many_tag);



        // $tag = Manytag::create(['name' => 'Laravel']);

        // $photo = Manypost::create(['name' => 'php.jpg']);

        // $video = ManyVideo::create(['name' => 'Laravel.mp4']);

        // $photo->tags()->attach($tag->id);







        // $tag = Manytag::create(['name' => 'Laravel Framework']);

        // $post = Manypost::create(['name' => 'laravelframework.jpg']);
        // $post->tags()->attach([$tag->id]);

        // $video = ManyVideo::create(['name' => 'laravelframework.mp4']);
        // $video->tags()->attach([$tag->id]);

        // $taggable = Taggable::find(1);
        // dd($taggable);
    }
}
