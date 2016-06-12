<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Section;
use App\Models\UserFacebook;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class RequestController extends Controller
{
    public function index()
    {


    }

    public function store(Request $request)
    {


        $profiles = DB::table('users')
            ->where('users.name', '=', session()->get('UserName'))
            ->get();


        $FacebookID = DB::table('users_facebook')
            ->where('users_facebook.name', '=', session()->get('FacebookName'))
            ->get();


        $checkreques = $request->input('checkreques');
        $checkview = $request->input('checkview');
        $name_facebook = $request->input('name_facebook');
        $start = $request->input('start');
        $end = $request->input('end');
        $title = $request->input('title');
        $morning = $request->input('morning');
        $afternoon = $request->input('afternoon');
        $evening = $request->input('evening');
        $detail_request = $request->input('detail_request');

        $new_request = new \App\Models\Request();

        $new_request->checkreques = $checkreques;
        $new_request->checkview = $checkview;
        $new_request->name_facebook = $name_facebook;
        $new_request->facebook_id = $FacebookID[0]->id;
        $new_request->facebook_email = session()->get('FacebookEmail');
        $new_request->name_user = session()->get('UserName');
        $new_request->start = $start;
        $new_request->end = $end;
        $new_request->title = $title;
        $new_request->morning = $morning;
        $new_request->afternoon = $afternoon;
        $new_request->evening = $evening;
        $new_request->detail_request = $detail_request;
        $new_request->facebook_avatar = session()->get('FacebookAvatar');
        $new_request->user_id = $profiles[0]->id;


        $new_request->save();


        return redirect('/viewreques');
    }

    public function update(Request $request, $requreid)
    {

        $checkreques = $request->input('checkreques');
        $checkview = $request->input('checkview');

        $new_request = \App\Models\Request::find($requreid);

        $new_request->checkreques = $checkreques;
        $new_request->checkview = $checkview;

        $new_request->save();

        return redirect('/home');
    }

    public function destroy($id)

    {
        \App\Models\Request::destroy($id);

        return redirect('/viewreques');
    }


    public function  viewreques()
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/

        $requests = DB::table('requests')
            ->where('requests.name_facebook', '=', session()->get('FacebookName'))
            ->orderBy('start')
            ->get();


        return view('/recordreques')->withRequests($requests);

    }


}
