<?php


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

    public function update()
    {

        return view('AlbumUpdate')->withAlbums($albums);

    }
}