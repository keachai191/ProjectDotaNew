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


class AlbumController extends Controller
{

    public function index($userid)
    {
       // $id = \Input::get('user_id');


        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id','=',$userid)
            ->get();

        return view('album')->withAlbums($albums);

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $halfprice = $request->input('halfprice');
        $fullprice = $request->input('fullprice');
        $detail_al =$request->input('detail_al');
        $user_id = $request->input('user_id');
        $type_al = $request->input('type_al');
        $url_al = $request->input('url_al');

        $new_url_al = new Album();

        $new_url_al->halfprice = $halfprice;
        $new_url_al->fullprice = $fullprice;
        $new_url_al->detail_al = $detail_al;
        $new_url_al->user_id = $user_id;
        $new_url_al->type_al = $type_al;
        $new_url_al->url_al = $url_al;

        $new_url_al->save();


        $id = \Input::get('user_id');


        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id','=',$id)
            ->get();

        return view('album')->withAlbums($albums);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**$section = Section::find($id);
         * $all_albums = DB::table('albums')
         * ->join('albums','sections.id','=','albums.user_id')
         * ->where('sections.id',$id)
         * ->get();
         * return view('Album.albums',compact('section',$section,'all_albums',$all_albums));*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $albumid)

    {

        $halfprice = $request->input('halfprice');
        $fullprice = $request->input('fullprice');
        $detail_al = $request->input('detail_al');
        $type_al = $request->input('type_al');
        $url_al = $request->input('url_al');


        $new_url_al = Album::find($albumid);

        $new_url_al->halfprice = $halfprice;
        $new_url_al->fullprice = $fullprice;
        $new_url_al->detail_al =$detail_al;
        $new_url_al->type_al = $type_al;
        $new_url_al->url_al = $url_al;

        $new_url_al->save();

        $userid = \Input::get('user_id');


        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id','=',$userid)
            ->get();

       return redirect('Album'.$userid)->withAlbums($albums);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);

        $userid = \Input::get('user_id');


        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id','=',$userid)
            ->get();

        return redirect('Album'.$userid)->withAlbums($albums);
    }
}
