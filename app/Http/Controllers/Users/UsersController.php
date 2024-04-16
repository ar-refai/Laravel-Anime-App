<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Show\Following;
use App\Models\Show\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function followedShows() {

        $user = User::find(Auth::user()->id);
        $forYouShows = Show::select()->orderBy('id','desc')->take(3)->get();
        $followedShows = $user->followedShows()->get();
        return view('shows/followed-shows',compact('followedShows','forYouShows'));

    }
}
