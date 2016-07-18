<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\UserFacebook;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = DB::table('users')
            ->orderBy('status', 'desc')
            ->get();

        $facebooks = UserFacebook::all();

        return view('admin')->withUsers($users)
            ->withFacebooks($facebooks);
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
        //
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
    public function update(Request $request, $userid)
    {


        $status = $request->input('status');

        $newstatus = User::find($userid);


        $newstatus->status = $status;

        $newstatus->save();

        return redirect('/admin');

    }

    public function updateFacebook(Request $request, $userid)
    {

        $status = $request->input('status');

        $newstatus = UserFacebook::find($userid);

        $newstatus->status = $status;

        $newstatus->save();

        return redirect('/admin');

    }
    public function administrator($id)
    {
        $this->middleware('admin');


        $profiles = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id', '=', $id)
            ->get();
        $comment = DB::table('review')
            ->where('review.user_id', '=', $id)
            ->get();
        $requests = DB::table('requests')
            ->where('requests.user_id', '=', $id)
            ->orderBy('start')
            ->get();


        return view('administrator')->withAlbums($albums)
            ->withProfiles($profiles)
            ->withComment($comment)
            ->withRequests($requests);

    }


    public function destroyreques($id)
    {
        \App\Models\Request::destroy($id);

        $userid = \Input::get('user_id');

        return redirect('administrator'.($userid));
    }
    public function destroyalbum($id)
    {
        \App\Models\Album::destroy($id);

        $userid = \Input::get('user_id');

        return redirect('administrator'.($userid));
    }
    public function updatecomment(Request $request, $id)
    {


        $userid = \Input::get('user_id');

        $detail = $request->input('detail');

        $newcomment = \App\Models\Review::find($id);

        $newcomment->detail = $detail;

        $newcomment->save();

        return redirect('administrator'.($userid));

        return redirect('administrator'.($userid));


    }
}
