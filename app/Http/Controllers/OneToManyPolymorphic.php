<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\UploadPost;
use App\Models\UploadVideo;
use Illuminate\Http\Request;

class OneToManyPolymorphic extends Controller
{
    public function index()
    {
        $up_post = UploadPost::create(
            [
                'title' => 'FirstPolymorphic',
                'body' => 'dummy'
            ]
        );
        dd($up_post);

        $up_video = UploadVideo::create([
            'title' => 'aaa',
            'url' => 'abcd'
        ]);
        dd($up_video);

        $up_post = UploadPost::find(1)->comment()->create([
            'body' => 'xyz'
        ]);
        dd($up_post);

        $up_video = UploadVideo::find(1)->comment()->create([
            'body' => 'videourl'
        ]);
        dd($up_video);
    }
}
