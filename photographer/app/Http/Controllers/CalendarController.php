<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;
use DB;

class CalendarController extends Controller
{

    public function send()
    {
        $id = Auth::user()->id;
        $sum = [];

        $calendars = Calendar::where('user_id', '=', $id)
            ->select("title", "start", "end", "url", "morning", "afternoon", "evening", "id")
            ->get();

        foreach ($calendars as $calendar) {
            $calendar->title = $calendar->title . "\n\n" . $calendar->morning . " " . " " . $calendar->afternoon . " " . " " . $calendar->evening . "\n\n";
            $calendar->end = $calendar->end->addHours(24);
            $sum[] = $calendar;
        }


        $calens = DB::table('requests')
            ->where('user_id', '=', $id)
            ->where('requests.checkreques', '=', '3')
            ->select("title", "start", "end", "morning", "afternoon", "evening", "url")
            ->get();
        foreach ($calens as $calen) {
            $calen->title = $calen->title . "\n\n" . $calen->morning ." " . " " . $calen->afternoon . " " . " " . $calen->evening;
            $sum[] = $calen;

        }

        return $sum;
    }


    public function sendHome(Request $request)
    {
        $id = Auth::user()->id;

        $sum = [];
        $calendars = Calendar::where('user_id', '=', $id)
            ->select("title", "start", "end", "url", "morning", "afternoon", "evening", "id")
            ->get();

        foreach ($calendars as $calendar) {
            $calendar->title = $calendar->title . "\n\n\n";
            $calendar->end = $calendar->end->addHours(24);
            $sum[] = $calendar;
        }

        $calens = DB::table('requests')
            ->where('user_id', '=', $id)
            ->where('requests.checkreques', '=', '3')
            ->select("title", "start", "end", "morning", "afternoon", "evening", "url")
            ->get();
        foreach ($calens as $calen) {
            $calen->title = $calen->title . "\n\n\n";
            $sum[] = $calen;


        }

        return $sum;
    }

    public function Showprofile()
    {

        $ID = session()->get('UserId');

        $sum = [];

        $calendars = Calendar::where('user_id', '=', $ID[0]->id)
            ->select("title", "start", "end", "morning", "afternoon", "evening")
            ->get();

        foreach ($calendars as $calendar) {
            $calendar->title = $calendar->title . "\n\n\n";
            $calendar->end = $calendar->end->addHours(24);
            $sum[] = $calendar;
        }

        $calens = DB::table('requests')
            ->where('user_id', '=', $ID[0]->id)
            ->where('requests.checkview', '=', '0')
            ->select("title", "start", "end", "morning", "afternoon", "evening")
            ->get();
        foreach ($calens as $calen) {
            $calen->title = $calen->title . "\n\n\n";
            $sum[] = $calen;

        }

        return $sum;
    }


    public function store(Request $request)
    {

        $title = $request->input('title');
        $user_id = $request->input('user_id');
        $url = $request->input('url');
        $start = $request->input('start');
        $end = $request->input('end');
        $morning = $request->input('morning');
        $afternoon = $request->input('afternoon');
        $evening = $request->input('evening');

        $calendar = new Calendar();

        $calendar->title = $title;
        $calendar->user_id = $user_id;
        $calendar->url = $url;
        $calendar->start = $start;
        $calendar->end = $end;
        $calendar->morning = $morning;
        $calendar->afternoon = $afternoon;
        $calendar->evening = $evening;

        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));
        $calendar->created_at =date_format($date, 'Y-m-d H:i:s');
        $calendar->updated_at =date_format($date, 'Y-m-d H:i:s');

        $calendar->save();


        $Lastid = $calendar->id;
        $calendar = Calendar::find($Lastid);
        $calendar->url = $url . $Lastid;

        $calendar->save();

        return redirect('Calendar')->withCalendars($calendar);


    }

    public function updatecalendar(Request $request, $id)
    {

        $title = $request->input('title');
        $user_id = $request->input('user_id');
        $url = $request->input('url');
        $start = $request->input('start');
        $end = $request->input('end');
        $morning = $request->input('morning');
        $afternoon = $request->input('afternoon');
        $evening = $request->input('evening');

        $calendar = Calendar::find($id);

        $calendar->title = $title;
        $calendar->user_id = $user_id;
        $calendar->url = $url;
        $calendar->start = $start;
        $calendar->end = $end;
        $calendar->morning = $morning;
        $calendar->afternoon = $afternoon;
        $calendar->evening = $evening;

        $calendar->save();

        $Lastid = $calendar->id;
        $calendar = Calendar::find($Lastid);
        $calendar->url = $url . $Lastid;

        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));
        $calendar->created_at =date_format($date, 'Y-m-d H:i:s');
        $calendar->updated_at =date_format($date, 'Y-m-d H:i:s');

        $calendar->save();

        $calendar = Calendar::where('id', '=', $id)
            ->select("title", "start", "end", "url", "morning", "afternoon", "evening", "id", "user_id")
            ->get();
        return redirect('Calendar')->withCalendars($calendar);


    }

    public function editcalendar($id)
    {

        $calendars = Calendar::where('id', '=', $id)
            ->select("title", "start", "end", "url", "morning", "afternoon", "evening", "id")
            ->get();
        return view('editcalendar')->withCalendars($calendars);

    }
    public function infocustomer($id)
    {
        $info = \App\Models\Request::where('requests.id','=',$id)
        ->get();


        $profile = DB::table('requests')
            ->join('users','requests.user_id','=','users.id')
            ->where('requests.id', '=', $id)
            ->get();


        return view('infocustomer')->withInfo($info)
            ->withProfile($profile);

    }


    public function destroy($id)
    {

        Calendar::destroy($id);
        $calendars = Calendar::where('id', '=', $id)
            ->get();

        return redirect('Calendar')->withCalendars($calendars);
    }
}