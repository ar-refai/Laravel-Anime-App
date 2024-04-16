<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Show\Comments;
use App\Models\Show\Following;
use App\Models\Show\Show;
use App\Models\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment($id) {
        $cmt = new Comments();
        $cmt->show_id = $id;
        $cmt->user_id = Auth::user()->id;
        $cmt->content = request()->get('content');
        $cmt->save();
        $anime = Show::find($id);
        $randomShows = Show::select()
                    ->orderBy('id','asc')
                    ->take(4)
                    ->get();
        $comments = Comments::with('user')
                    ->orderBy('id','asc')
                    ->where('show_id',$id)
                    ->get();
        $commentsNumber = Comments::select('*')->where('show_id',$id)->count();

        $viewsCount = View::where('show_id',$id)->count();
        $validateFollowing = Following::where('user_id',Auth::user()->id)
        ->where('show_id',$id)
        ->count();
        return view('shows/anime-details',
        compact( 'id' ,
        'anime' ,
        'randomShows',
        'comments' ,
        'viewsCount',
        'validateFollowing',
        'commentsNumber'));


    }
}

