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

class ShowalbumController extends Controller
{
    public function index()
    {

        $id = \Input::get('user_id');


         $albums = DB::table('users')
             ->join('albums', 'users.id', '=', 'albums.user_id')
             ->where('users.id','=',$id)
             ->get();

         return view('album')->withAlbums($albums);



        /*->select('albums.user_id','albums.fullprice','albums.halfprice','albums.type_al','albums.url_al','albums.id')*/
    }

}
