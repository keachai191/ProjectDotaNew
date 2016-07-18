<?php
namespace App\Http\Controllers;

use App\Models\Album as Album;
use App\Models\Photographer;
use App\Models\Calendar;
use App\Models\Request;
use App\Models\Review;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;

class mutiSearchController extends Controller
{
    public function  getName()
    {
        header('content-type:text/html; charset=utf-8');
        $date = \Input::get('date');
        $helf = \Input::get('time');
        $helf1 = \Input::get('time2');

        session::put('data', $date);

        session::put('helf', $helf);

        session::put('helf1', $helf1);

        $result = [];

        foreach ($date as $index => $dat) {

            $result[][] = $date[$index] . "," . $helf[$index] . "," . $helf1[$index];
        }



        foreach ($result as $index2 => $resul) {

            for ($j = $index2 + 1; $j < count($result); $j++) {
                if ( count(array_diff($result[$index2], $result[$j])) == 0) {

                    return back()->withErrors('Fail DateTime');
                }
            }
        }



        $data = [];
        foreach ($date as $index => $dat) {
            if ($helf[$index] == 0) {
                if ($helf1[$index] == "0") {
                    $calen = Calendar::
                    where('start', '<=', $dat)
                        ->where('end', '>=', $dat)
                        ->where('morning','=','0')
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $data[] = $calen;
                }
                if ($helf1[$index] == "morning") {
                    $calen = Calendar::
                    where('start', '<=', $dat)
                        ->where('end', '>=', $dat)
                        ->whereNotNull('morning')
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $data[] = $calen;
                }
                if ($helf1[$index] == "afternoon") {
                    $calen = Calendar::
                    where('start', '<=', $dat)
                        ->where('end', '>=', $dat)
                        ->whereNotNull('afternoon')
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $data[] = $calen;
                }
                if ($helf1[$index] == "evening") {
                    $calen = Calendar::
                    where('start', '<=', $dat)
                        ->where('end', '>=', $dat)
                        ->whereNotNull('evening')
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $data[] = $calen;
                }}
            if ($helf[$index] == 1) {
                if ($helf1[$index] == "0") {
                    $calen = Calendar::
                    where('start', '<=', $dat)
                        ->where('end', '>=', $dat)
                        ->where('morning','=','0')
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $data[] = $calen;
                }
            if ($helf1[$index] == "morning") {
                $calen = Calendar::
                where('start', '<=', $dat)
                    ->where('end', '>=', $dat)
                    ->whereNotNull('morning')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
                $data[] = $calen;
            }
            if ($helf1[$index] == "afternoon") {
                $calen = Calendar::
                where('start', '<=', $dat)
                    ->where('end', '>=', $dat)
                    ->whereNotNull('afternoon')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
                $data[] = $calen;
            }
            if ($helf1[$index] == "evening") {
                $calen = Calendar::
                where('start', '<=', $dat)
                    ->where('end', '>=', $dat)
                    ->whereNotNull('evening')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
                $data[] = $calen;
            }}
            if ($helf[$index] == 2) {
                $calen = Calendar::
                where('start', '<=', $dat)
                    ->where('end', '>=', $dat)
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
                $data[] = $calen;
            }
        }
        $id = [];
        foreach ($data as $d) {

            foreach ($d as $dd) {
                $id[] = $dd->user_id;
            }

        }

        $user = User::whereNotIn('id', $id)
            ->where('fullprice', '!=', 0)
            ->select('id', 'name', 'fullprice', 'halfprice', 'phonenumber', 'website', 'image')
            ->get();

        $idUsers = [];
        foreach ($user as $user) {
            $idUsers[] = $user->id;
        }


        $finalID = [];


        foreach ($idUsers as $idUser) {

            $temp = [];
            $checkTemp = 0;

            foreach ($date as $index => $dat) {
                if ($helf[$index] == 0) {
                    if ($helf1[$index] == 0) {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->where('morning','=','0')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }

                    if ($helf1[$index] == "morning") {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->whereNotNull('morning')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }
                    if ($helf1[$index] == "afternoon") {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->whereNotNull('afternoon')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }
                    if ($helf1[$index] == "evening") {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->whereNotNull('evening')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }
                }
                if ($helf[$index] == 1) {
                    if ($helf1[$index] == 0) {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->where('morning','=','0')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }

                    if ($helf1[$index] == "morning") {
                    $requests = Request::
                    where('user_id', '=', $idUser)
                        ->where('checkreques', '=', 3)
                        ->where('start', '=', $dat)
                        ->whereNotNull('morning')
                        ->get();

                    /* if(count($requests) != 0 )*/
                    $temp[] = $requests;

                }
                    if ($helf1[$index] == "afternoon") {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->whereNotNull('afternoon')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }
                    if ($helf1[$index] == "evening") {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->whereNotNull('evening')
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;

                    }
                }
                if ($helf[$index] == 2) {
                        $requests = Request::
                        where('user_id', '=', $idUser)
                            ->where('checkreques', '=', 3)
                            ->where('start', '=', $dat)
                            ->get();

                        /* if(count($requests) != 0 )*/
                        $temp[] = $requests;


                }
            }


            foreach ($temp as $temper) {
                if (count($temper) != 0) {
                    $checkTemp++;
                }
            }

            if ($checkTemp == 0) {
                $finalID[] = $idUser;

            }

        }

        $user = User::with(['likes'])
            ->whereIn('id', $finalID)
            ->select('id', 'name', 'fullprice', 'halfprice', 'phonenumber', 'website', 'image')
            ->get();




        return view('mutishowsearch')->with('photo', $user)
            ->with('user_id', $id);


    }
}