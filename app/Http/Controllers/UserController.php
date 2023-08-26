<?php

namespace App\Http\Controllers;

use App\Models\User;


class Controller extends BaseController
{
    public function index(User $user)
{
    $posts=Post::where('user_id', \Auth::user()->id)->get();
    return view('users.index')->with(['posts' => $user->getByUser()]);
}
}
