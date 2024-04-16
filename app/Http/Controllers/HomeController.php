<?php

namespace App\Http\Controllers;

use App\Models\Show\Comments;
use App\Models\Show\Show;
use App\Models\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shows = Show::select()
                    ->orderBy('id','asc')
                    ->take(3)
                    ->get();
        $trendShows = Show::select()
                    ->orderBy('id','desc')
                    ->take(6)
                    ->get();
        $adventureShows = Show::select()
                    ->orderBy('id','desc')
                    ->where('genre','adventure')
                    ->take(6)
                    ->get();
        $actionShows = Show::select()
                    ->orderBy('id','desc')
                    ->where('genre','action')
                    ->take(6)
                    ->get();
        $recentShows = Show::select()
                    ->orderBy('id','desc')
                    ->take(6)
                    ->get();
        $forYouShows = Show::select()
                    ->orderBy('id','asc')
                    ->take(4)
                    ->get();
        // $comments = Comments::with('user')
        //             ->orderBy('id','asc')
        //             ->where('show_id',$id)
        //             ->get();
        // $viewsCount = View::where('show_id',$id)->count();
        return view('home',compact('shows'
            ,'trendShows'
            ,'adventureShows'
            ,'actionShows'
            ,'recentShows'
            ,'forYouShows'
        ));
    }

}
