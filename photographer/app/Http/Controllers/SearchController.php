<?php
namespace App\Http\Controllers;
use App\Models\Album as Album ;
use App\Models\Photographer;
use App\Models\Calendar;
use App\Models\Request;
use App\Models\Review;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;
class SearchController extends Controller
{
    public function  getName()
    {

        header('content-type:text/html; charset=utf-8');

        $money = \Input::get('money');
        $helf = \Input::get('time');
        $helf1 = \Input::get('time2');
        $date = \Input::get('date');
        $name = \Input::get('name');
        $idpro = \Input::get('idpro');
        if($idpro == ""){
        if($money != ""){
            if($name = $name){ //เงิน ชื่อ
                if($helf=="1"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)

                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->orwhere(function ($query) {
                                $query->where('start', '<=', session()->get('data'))
                                    ->where('end', '>=', session()->get('data'));
                            })
                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }



                }
                if($helf=="0"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->orwhere(function ($query) {
                                $query->where('start', '<=', session()->get('data'))
                                    ->where('end', '>=', session()->get('data'));
                            })
                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }



                }else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '<=', session()->get('data'))
                        ->where('end', '>=', session()->get('data'))
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();


                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('fullprice','<=',$money)
                        ->where('name','like','%'.$name.'%')
                        ->where('fullprice','!=',0)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->where('name_user','like','%'.$name.'%')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }

                    $user = User::with(['likes'])
                        ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();






                }}

            if($name == ''){ //เงิน ไม่มีชื่อ
                if($helf=="1"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice', '<=', $money)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('halfprice', '<=', $money)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->where('halfprice', '<=', $money)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->where('halfprice', '<=', $money)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                }
                if($helf=="0"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice', '<=', $money)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice', '<=', $money)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->where('fullprice', '<=', $money)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->where('fullprice', '<=', $money)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                }





                else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '<=', session()->get('data'))
                        ->where('end', '>=', session()->get('data'))

                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();




                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('fullprice','!=',0)
                        ->where('fullprice', '<=', $money)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }


                    $user = User::with(['likes'])
                        ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                }}}







        if($money == ""){ //ไม่มีเงิน ชื่อ
            if($name = $name){
                if($helf=="1"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();


                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }}

                if($helf=="0"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->where('morning','=','0')

                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();


                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }}


                else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '<=', session()->get('data'))
                        ->where('end', '>=', session()->get('data'))

                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->Where('name','like','%'.$name.'%')
                        ->where('fullprice','!=',0)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }


                    $user = User::with(['likes'])
                        ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                }}

            if($name == ''){ //ไม่มีเงิน ไม่มีชื่อ
                if($helf=="1"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))


                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();

                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {

                        $date = Calendar::
                                where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();


                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();




                    }
                }
                if($helf=="0"){
                    session::put('data', \Input::get('date'));
                    if($helf1==0) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->where('morning','=','0')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('morning','=','0')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    if($helf1==1) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->whereNotNull('morning')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==2) {
                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))


                            ->whereNotNull('afternoon')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();

                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)

                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();
                    }
                    else if($helf1==3) {

                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->whereNotNull('evening')
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();


                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();




                    }
                }






                else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '<=', session()->get('data'))
                        ->where('end', '>=', session()->get('data'))

                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();




                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('fullprice','!=',0)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }


                    $user = User::with(['likes'])
                        ->whereIn('id', $finalID)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();




                }}}}












        if($idpro != ""){
            if($money != ""){
                if($name = $name){ //เงิน ชื่อ รหัส
                    if($helf=="1"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->orwhere(function ($query) {
                                    $query->where('start', '<=', session()->get('data'))
                                        ->where('end', '>=', session()->get('data'));
                                })
                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }



                    }
                    if($helf=="0"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->orwhere(function ($query) {
                                    $query->where('start', '<=', session()->get('data'))
                                        ->where('end', '>=', session()->get('data'));
                                })
                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','<=',$money)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }



                    }else if ($helf=="2") {
                        session::put('data', \Input::get('date'));

                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();


                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','<=',$money)
                            ->where('name','like','%'.$name.'%')
                            ->where('id','=',$idpro)
                            ->where('fullprice','!=',0)
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->where('user_id','=',$idpro)
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();






                    }}

                if($name == ''){ //เงิน ไม่มีชื่อ
                    if($helf=="1"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('halfprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','!=',0)
                                ->where('halfprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice','!=',0)
                                ->where('halfprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                    }
                    if($helf=="0"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();

                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('fullprice', '<=', $money)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                    }





                    else if ($helf=="2") {
                        session::put('data', \Input::get('date'));

                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();




                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('fullprice','!=',0)
                            ->where('fullprice', '<=', $money)
                            ->where('id','=',$idpro)
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('user_id','=',$idpro)
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }


                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                    }}}







            if($money == ""){ //ไม่มีเงิน ชื่อ
                if($name = $name){
                    if($helf=="1"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();


                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }}

                    if($helf=="0"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->where('morning','=','0')

                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();


                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('name','like','%'.$name.'%')
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('name_user','like','%'.$name.'%')
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }

                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }}


                    else if ($helf=="2") {
                        session::put('data', \Input::get('date'));

                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->Where('name','like','%'.$name.'%')
                            ->where('id','=',$idpro)
                            ->where('fullprice','!=',0)
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('user_id','=',$idpro)
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }


                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                    }}

                if($name == ''){ //ไม่มีเงิน ไม่มีชื่อ
                    if($helf=="1"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))


                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();

                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {

                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();


                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();




                        }
                    }
                    if($helf=="0"){
                        session::put('data', \Input::get('date'));
                        if($helf1==0) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->where('morning','=','0')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->where('id','=',$idpro)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->where('morning','=','0')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        if($helf1==1) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))

                                ->whereNotNull('morning')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();
                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('morning')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==2) {
                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))


                                ->whereNotNull('afternoon')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();

                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('afternoon')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();
                        }
                        else if($helf1==3) {

                            $date = Calendar::
                            where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'))
                                ->whereNotNull('evening')
                                ->select('user_id')
                                ->groupBy('user_id')
                                ->get();


                            $id = [];
                            foreach ($date as $d) {
                                $id[] = $d->user_id;
                            }
                            $user = User::whereNotIn('id', $id)
                                ->where('id','=',$idpro)
                                ->where('fullprice','!=',0)
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();



                            $idUser = [];
                            foreach ($user as $user) {
                                $idUser[] = $user->id;
                            }

                            $finalID = [];
                            foreach($idUser as $idUser){
                                $requests = Request::
                                where('user_id','=',$idUser)
                                    ->where('checkreques','=',3)
                                    ->where('start','=',session()->get('data'))
                                    ->where('user_id','=',$idpro)
                                    ->whereNotNull('evening')
                                    ->get();
                                if(count($requests) == 0){
                                    $finalID[] = $idUser;
                                }
                            }




                            $user = User::with(['likes'])
                                ->whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                                ->orderBy('halfprice', 'ASC')
                                ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                                ->get();




                        }
                    }






                    else if ($helf=="2") {
                        session::put('data', \Input::get('date'));

                        $date = Calendar::
                        where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'))

                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();




                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('id','=',$idpro)
                            ->where('fullprice','!=',0)
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('user_id','=',$idpro)
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }


                        $user = User::with(['likes'])
                            ->whereIn('id', $finalID)
                            ->orderBy('fullprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();




                    }}}}
        session::put('money', $money);
        session::put('helf', $helf);
        session::put('helf1', $helf1);
        session::put('name', $name);
        session::put('idpro', $idpro);

        return view('showsearch')->with('photo',$user)
            ->with('money',$money)
            ->with('helf',$helf)
            ->with('helf1',$helf1)
            ->with('user_id',$id)
            ->with('idpro',$idpro)
            ->with('date',\Input::get('date'));



    }
}