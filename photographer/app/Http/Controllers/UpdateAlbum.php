<?php

namespace App\Http\Controllers;


use App\Models\Album as Album;


class UpdateAlbumController extends Controller
{

    public function store(Request $request)
    {

        $user_id = $request ->input('user_id');

        $new_user = new Album();
        $new_user->user_id = $user_id;

        $new_user->save();

        return redirect('Album');

    }


}
