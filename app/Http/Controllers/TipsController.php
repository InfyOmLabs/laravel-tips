<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Carbon\Carbon;

class TipsController extends Controller
{
    public function directDump()
    {
        $users = User::all();

        dd($users);

        User::all()->dd();
    }

    public function toBase()
    {
        $users = User::all();

//        $users = User::toBase()->get();

//        dd($users);

        return view('welcome');
    }

    public function eagerLoading()
    {
        $users = User::with('posts')->get();

//        $users = User::with('posts:id,title')->get();

        return view('welcome');
    }

    public function combinedWhere()
    {
        $user = User::whereFirstName('Sadye')
            ->whereEmail('kale.dicki@example.com')
            ->first();

//        $user = User::whereFirstNameAndEmail('Sadye', 'kale.dicki@example.com')
//            ->first();

        dd($user->toArray());
    }

    public function appendToModel()
    {
        $user = User::first();

        dd($user->toArray());
    }

    public function withViewData()
    {
        $user = User::first();

//        return view('view_data', ['user' => $user]);

        return view('view_data')->withUser($user);
    }

    public function cacheHelper()
    {
        $user = retrieve_first_user();

        return view('view_data')->withUser($user);
    }

    public function subQuery()
    {
//        $posts = Post::limit(25)->get();
//        $posts = Post::with(['comments'])->limit(25)->get();

        $posts = Post::addSelect(['last_comment' => Comment::select('comment')
            ->whereColumn('post_id', 'posts.id')
            ->orderBy('created_at', 'desc')
            ->limit(1)
        ])->limit(25)->get();

        return view('posts')->withPosts($posts);
    }

}
