<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;
use DB;

class CalendarController extends Controller
{


    public function send()
    {
        $id = Auth::user()->id;

        $calendars = Calendar::select("title", "start", "end", "url", "morning", "afternoon", "evening", "id")
            ->where('user_id', '=', $id)
            ->get();

        foreach ($calendars as $calendar) {
            $calendar->title = $calendar->title . "\n\n" . $calendar->morning . "\n " . $calendar->afternoon . "\n" . $calendar->evening;
        }
        return $calendars;
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


    public function destroy($id)
    {

        Calendar::destroy($id);
        $calendars = Calendar::where('id', '=', $id)
            ->get();

        return redirect('Calendar')->withCalendars($calendars);
    }
}