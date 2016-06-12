<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{


    public function update(Request $request, $reviewid)

    {

        $detail = $request->input('detail');
        $like = $request->input('like');



        $new_url_al = Review::find($reviewid);

        $new_url_al->detail = $detail;
        $new_url_al->like = $like;


        $new_url_al->save();

        $userid = \Input::get('user_id');


        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id', '=', $userid)
            ->get();

        return redirect('/recordreview' . $userid)->withAlbums($albums);
    }


}
