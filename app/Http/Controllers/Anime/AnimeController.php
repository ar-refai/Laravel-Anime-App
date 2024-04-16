<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Episode\Episode;
use App\Models\Show\Comments;
use App\Models\Show\Following;
use App\Models\Show\Show;
use App\Models\User;
use App\Models\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{

    // MAIN ROUTE METHOD
    public function animeDetails($id){
        $anime = Show::find($id);

        // RANDOM SUGGESTIONS
        $randomShows = Show::select()
        ->orderBy('id','desc')
        ->where('id','!=',$id)
        ->take(4)
        ->get();

        $commentsNumber =
        Comments::select('*')->where('show_id',$id)->count();
        $comments =
        Comments::with('user')
                ->orderBy('id','asc')
                ->where('show_id',$id)
                ->get();
        // FOR FOLLOWING ANY SHOW
        if(!Auth::check())
            return redirect()->route('login');
        else
        $validateFollowing = Following::where('user_id',Auth::user()->id)
                                        ->where('show_id',$id)
                                        ->count();

        $userViewsCount = View::where('user_id',Auth::user()->id)
                ->where('show_id',$id)
                ->count();
        // VIEW ADDED FOR EVERY VISIT
        if(!Auth::check())
            return redirect()->route('login');
        elseif($userViewsCount == 0)
            $views = View::create([
                'show_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            // TOTAL VIEWS FOR SHOW
            $viewsCount = View::where('show_id',$id)->count();

        return view('shows/anime-details',
                    compact(
                            'anime',
                        'randomShows',
                        'comments' ,
                        'validateFollowing',
                        'viewsCount',
                        'commentsNumber'));
    }

    // ON FOLLOWING A SHOW METHOD
    public function followExc(Request $request, $id) {
        $currUser = Auth::user()->id;

        // Retrieve the record based on the composite key
        $followingShow = Following::where('user_id', $currUser)
                                    ->where('show_id', $id)
                                    ->first();

        if ($followingShow) {
            {
                // If the record exists, delete it
                Following::where('user_id', $currUser)
                ->where('show_id', $id)
                ->delete();
                return back();
            }
        } else {
            // If the record doesn't exist, create a new one
            Following::create([
                'show_id' => $id,
                'user_id' => $currUser,
            ]);
        }

        return back();
    }

    // ON WATCHING EPISODE
    public function animeWatching ($show_id , $episode_id) {


        $show = Show::find($show_id);

        $episode = Episode::find($episode_id)->where('show_id', $show_id)->first();
        $episodes = Episode::select()
                            ->where('show_id', $show_id)
                            ->get();

        $comments = Comments::with('user')
                            ->orderBy('id','asc')
                            ->where('show_id',$show_id)
                            ->get();

        return view('shows/anime-episode',
                    compact(
                        'show',
                    'episode',
                    'comments',
                    'episodes',
                ));
    }
    public function category($category_title) {
        $shows = Show::where('genre' , $category_title)
                    ->get();
        $forYouShows = Show::select()
                    ->orderBy('id','asc')
                    ->take(4)
                    ->get();
        return view('shows/category',compact('shows','category_title','forYouShows'));

    }

    public function searchShows (Request $request) {
        $show = $request->get('show');
        $searches = Show::where('name', 'like' , "%$show%")
                    ->orWhere('genre', 'like' , "%$show%")
                    ->get();
        $forYouShows = Show::select()
                    ->orderBy('id','asc')
                    ->take(4)
                    ->get();
        return view('shows/searches',compact('searches','forYouShows'));
    }

}
