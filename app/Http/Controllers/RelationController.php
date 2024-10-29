<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Photo;
use App\Models\Userdmeo;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;

class RelationController extends Controller
{
    public function index()
    {
        // $photo = Photo::create(
        //     ['name' => 'Photo']
        // );
        // dd($photo);

        // $userdemo = Userdmeo::create(
        //     ['name' => 'User Demo Is Greatefull']
        // );
        // dd($userdemo);

        // $photo = Userdmeo::find(2)->image()->create([
        //     'url' => 'google.com'
        // ]);
        // dd($photo);
        // $user = Userdmeo::first()
        //     ->image()->create([
        //         'url' => 'github.in'
        //     ]);
        // dd($user);
        $image = Image::orderBy('created_at', 'desc')->get();
        // $image = Image::get();
        dd($image);
    }
}
