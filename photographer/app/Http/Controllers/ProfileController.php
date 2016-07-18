<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

class ProfileController extends Controller

{

    public function index($username)

    {

        session::put("UserName", $username);

        $id = DB::table('users')
            ->where('users.name', '=', $username)
            ->select('users.id')
            ->get();

        session::put("UserId", $id);


        $profiles = DB::table('users')
            ->where('users.name', '=', $username)
            ->get();
        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.name', '=', $username)
            ->get();


        return view('Profile')->withAlbums($albums)
            ->withProfiles($profiles);

    }


    public function showprofile($username)

    {
        session::put("UserName", $username);

        $id = DB::table('users')
            ->where('users.name', '=', $username)
            ->select('users.id')
            ->get();

        session::put("UserId", $id);

        $profiles = DB::table('users')
            ->where('users.name', '=', $username)
            ->get();
        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.name', '=', $username)
            ->get();
        $comment = DB::table('review')
            ->where('review.name_user', '=', $username)
            ->orderBy('review.created_at', 'DESC')
            ->get();
        $like  = DB::table('review')
            ->where('review.name_user', '=', $username)
            ->where('review.like','=','1')
            ->get();
        $unlike  = DB::table('review')
            ->where('review.name_user', '=', $username)
            ->where('review.like','=','2')
            ->get();


        $admin = DB::table('users')
        ->where('users.name', '=', $username)
        ->select('users.status')
        ->get();


        return view('ShowProfile')->withAlbums($albums)
            ->withProfiles($profiles)
            ->withComment($comment)
            ->withLike($like)
            ->withUnlike($unlike)
            ->withAdmin($admin);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        /*$url_al = $request->input('url_al');

        $newurl_al = new Album();
        $newurl_al -> $url_al = $url_al;

        $newurl_al ->save();

        return redirect('Album');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
