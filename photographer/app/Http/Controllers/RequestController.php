<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Section;
use App\Models\UserFacebook;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Guzzle\Service\Builder;
use Illuminate\Foundation\Http\FormRequest;


class RequestController extends Controller
{
    public function index()
    {


    }

    public function store(Request $request)
    {

        $day = $request->input('start');
        $morning = $request->input('morning');
        $afternoon = $request->input('afternoon');
        $evening = $request->input('evening');
        $verify = $request->input('verify');


        if ($verify == 'เต็มวัน') {
            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);
                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = 'ช่วงเช้า';
                $new_request->afternoon = 'ช่วงบ่าย';
                $new_request->evening = 'ช่วงเย็น';
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }
        }


        if ($morning and $afternoon and $evening) {
            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);
                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }


        }

        if ($verify == 'ช่วงเช้า') {
            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.morning', '=', 'ช่วงเช้า')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $verify;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }

        }

        if ($morning) {

            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.morning', '=', 'ช่วงเช้า')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }

        }

        if ($verify == 'ช่วงบ่าย') {
            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.afternoon', '=', 'ช่วงบ่าย')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $verify;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }
        }

        if ($afternoon) {

            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.afternoon', '=', 'ช่วงบ่าย')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }
        }
        if ($verify == 'ช่วงเย็น') {
            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.evening', '=', 'ช่วงเย็น')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $verify;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }
        }

        if ($evening) {

            if (DB::table('requests')
                ->where('requests.start', '=', $day)
                ->where('requests.checkreques', '=', 3)
                ->where('requests.evening', '=', 'ช่วงเย็น')
                ->get()

            ) {
                session::put('checkday', 'success');
                session::put('time', $day);

                return redirect('/formreques' . session()->get('UserName'));
            } else {
                $profiles = DB::table('users')
                    ->where('users.name', '=', session()->get('UserName'))
                    ->get();

                $FacebookID = DB::table('users_facebook')
                    ->where('users_facebook.name', '=', session()->get('FacebookName'))
                    ->get();

                $checkreques = $request->input('checkreques');
                $checkview = $request->input('checkview');
                $name_facebook = $request->input('name_facebook');
                $url = $request->input('url');
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
                $new_request->url = $url;
                $new_request->start = $start;
                $new_request->end = $end;
                $new_request->title = $title;
                $new_request->morning = $morning;
                $new_request->afternoon = $afternoon;
                $new_request->evening = $evening;
                $new_request->detail_request = $detail_request;
                $new_request->facebook_avatar = session()->get('FacebookAvatar');
                $new_request->user_id = $profiles[0]->id;

                $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
                date_timezone_set($date, timezone_open('asia/bangkok'));
                $new_request->created_at = date_format($date, 'Y-m-d H:i:s');
                $new_request->updated_at = date_format($date, 'Y-m-d H:i:s');


                $new_request->save();

                $Lastid = $new_request->id;
                $new_request = \App\Models\Request::find($Lastid);
                $new_request->url = $url . $Lastid;


                $new_request->save();


                session::forget('UserPrimary');

                session::put('checkindex', 'success');

                return redirect('/formreques' . session()->get('UserName'));

            }
        }


    }


    public
    function update(Request $request, $requreid)
    {

        $checkreques = $request->input('checkreques');
        $checkview = $request->input('checkview');


        $new_request = \App\Models\Request::find($requreid);

        $new_request->checkreques = $checkreques;
        $new_request->checkview = $checkview;

        $new_request->save();

        $statDate = $new_request->start;
        $userID = $new_request->user_id;
        $morning = $new_request->morning;
        $afternoon = $new_request->afternoon;
        $evening = $new_request->evening;



        $new = \App\Models\Request::where('start', '=', $statDate)
            ->where('user_id', '=', $userID)
            ->where('checkreques', '=', 1)
            ->where('morning', '=', $morning)
            ->where('afternoon', '=', $afternoon)
            ->where('evening', '=', $evening)
            ->get();

        foreach ($new as $cNew) {
            $cNew->checkreques = 0;
            $cNew->checkview = 0;
            $cNew->save();
        }

        session::put('checksuccess', 'success');
        session::put('checkname', $name_facebook = $request->input('name_facebook'));

        return redirect('/home');
    }

    public
    function destroy(Request $request, $requreid)
    {
        $checkreques = $request->input('checkreques');
        $checkview = $request->input('checkview');


        $new_request = \App\Models\Request::find($requreid);

        $new_request->checkreques = $checkreques;
        $new_request->checkview = $checkview;

        $new_request->save();

        session::put('checkdelete', 'delete');
        session::put('checkname', $name_facebook = $request->input('name_facebook'));

        return redirect('/home');
    }


    public
    function  viewreques()
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/

        $requests = DB::table('requests')
            ->where('requests.name_facebook', '=', session()->get('FacebookName'))
            ->orderBy('requests.id','desc')
            ->get();

        return view('/recordreques')->withRequests($requests);


    }


    public
    function  Inforecord($id)
    {


        $info = DB::table('requests')
            ->where('requests.id', '=', $id)
            ->get();

        $profile = DB::table('requests')
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->where('requests.id', '=', $id)
            ->get();


        return view('/inforecord')->withInfo($info)
            ->withProfile($profile);


    }


}
