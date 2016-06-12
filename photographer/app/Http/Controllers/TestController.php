<?php


namespace App\Http;


class TestController  extends Controller
{

    public function index()

    {
        $id = Auth::user()->id;
        $albums = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.user_id')
            ->where('users.id', '=', $id)
            ->get();

        $requests = DB::table('users')
            ->join('requests', 'users.id', '=', 'requests.user_id')
            ->where('users.id', '=', $id)
            ->where('requests.checkview', '=', '1')
            ->get();

        return view('photographer')->withAlbums($albums)
            ->withRequests($requests);

    }

    public function messagebox()
    {

        $id = Auth::user()->id;

        $requests = DB::table('users')
            ->join('requests', 'users.id', '=', 'requests.user_id')
            ->where('users.id', '=', $id)
            ->where('requests.checkview', '=', '1')
            ->get();

        return view('messagebox')->withRequests($requests);
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